<?php

use App\Http\Controllers\Stock\CategoryController;
use App\Http\Controllers\Stock\ExpenseController;
use App\Http\Controllers\Stock\OrderController;
use App\Http\Controllers\Stock\PosController;
use App\Http\Controllers\Stock\ProductController;
use App\Http\Controllers\Stock\StockController;
use App\Http\Controllers\Stock\SupplierController;
use App\Http\Controllers\Stock\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return Inertia::render('Dashboard');
})->name('dashboard');
//
Route::group(['middleware' => ['auth:sanctum', 'supplier']], function () {
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    Route::resource('supplier', SupplierController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('expense', ExpenseController::class);
    Route::resource('customer', CustomerController::class);

    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/orderdone',[PosController::class,'OrderDone'])->name('pos.orderDone');

    Route::get('/viewStock',[StockController::class,'viewStock'])->name('stock.view');
    Route::get('/order',[OrderController::class,'todayOrder'])->name('stock.order');
    Route::get('/view-details/{id}',[OrderController::class,'OrderDetails'])->name('order.details');
    Route::get('/searchOrder',[OrderController::class,'searchOrder'])->name('searchOrder.index');
//    Route::Get('/today/sell', [PosController::class,'TodaySell']);
//    Route::Get('/today/income',  [PosController::class,'TodayIncome']);
//    Route::Get('/today/due',  [PosController::class,'TodayDue']);
//    Route::Get('/today/expense', [PosController::class,'TodayExpense']);
//    Route::Get('/today/stockout',  [PosController::class,'Stockout']);
});
