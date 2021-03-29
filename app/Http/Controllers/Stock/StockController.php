<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class StockController extends Controller
{
    //
    public function index(){
        return Inertia::render('components/stock/index');
    }
    public function viewStock(){
        $product = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->select('categories.category_name',
                'products.id','products.product_name','products.product_code','products.image','products.selling_price','products.product_quantity')
            ->whereNull('products.deleted_at')
            ->orderBy('products.id','DESC')
            ->paginate(15);
        return Inertia::render('components/stock/viewStock/index',['product'=>$product]);
    }

}
