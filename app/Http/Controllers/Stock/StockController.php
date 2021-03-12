<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StockController extends Controller
{
    //
    public function index(){
        return Inertia::render('components/stock/index');
    }
}
