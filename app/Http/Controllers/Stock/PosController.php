<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Product;
class PosController extends Controller
{
    protected $route = 'components/stock/pos/';

    public function index()
    {
        $product=Product::all();
        return Inertia::render($this->route . 'index',['product'=>$product]);
    }

    public function GetProduct($id)
    {

        $product = DB::table('products')
            ->where('category_id', $id)
            ->get();
        return response()->json($product);

    }

    public function OrderDone(Request $request)
    {

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['qty'] = $request->qty;
        $data['sub_total'] = $request->subtotal;
        $data['tax'] = $request->tax;
        $data['total'] = $request->total;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        $data['payby'] = $request->payby;
        $data['order_date'] = date('d/m/Y');
        $data['order_month'] = date('F');
        $data['order_year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        $carts = collect($request->cart);

        $odata = array();
        foreach ($carts as $cart) {
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $cart["id"];
            $odata['pro_quantity'] = $cart["quantity"];
            $odata['product_price'] = $cart["price"];
            $odata['sub_total'] = $cart['quantity'] * $cart["price"];
            DB::table('order_details')->insert($odata);


            DB::table('products')
                ->where('id', $cart["id"])
                ->update(['product_quantity' => DB::raw('product_quantity -' . $cart["quantity"])]);

        }
        return redirect()->route('pos.index');

    }


    public function SearchOrderDate(Request $request)
    {
        $orderdate = $request->date;
        $newdate = new DateTime($orderdate);
        $done = $newdate->format('d/m/Y');

        $order = DB::table('orders')
            ->join('customers', 'orders.customer_id', 'customers.id')
            ->select('customers.name', 'orders.*')
            ->where('orders.order_date', $done)
            ->get();

        return response()->json($order);

    }


    public function TodaySell()
    {
        $date = date('d/m/Y');
        $sell = DB::table('orders')->where('order_date', $date)->sum('total');
        return response()->json($sell);
    }

    public function TodayIncome()
    {
        $date = date('d/m/Y');
        $income = DB::table('orders')->where('order_date', $date)->sum('pay');
        return response()->json($income);
    }

    public function TodayDue()
    {
        $date = date('d/m/Y');
        $todaydue = DB::table('orders')->where('order_date', $date)->sum('due');
        return response()->json($todaydue);
    }


    public function TodayExpense()
    {
        $date = date('d/m/Y');
        $expense = DB::table('expenses')->where('expense_date', $date)->sum('amount');
        return response()->json($expense);
    }

    public function Stockout()
    {

        $product = DB::table('products')->where('product_quantity', '<', '1')->get();
        return response()->json($product);

    }


}
