<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class OrderController extends Controller
{
    //
    public function todayOrder(){
        $data = date('d/m/Y');
        $order = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->where('order_date',$data)
            ->select('customers.name','orders.*')
            ->orderBy('orders.id','DESC')->paginate(15);
        return Inertia::render('components/stock/order/index',['order'=>$order]);
    }
    public function OrderDetails($id){
        //return response()->json($id);
        $order = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->where('orders.id',$id)
            ->select('customers.name','customers.phone','customers.address','orders.*')
            ->first();
        return Inertia::render('components/stock/order/view-details',['order'=>$order]);

    }
    public function searchOrder(){
        return Inertia::render('components/stock/order/searchOrder')
    }
}
