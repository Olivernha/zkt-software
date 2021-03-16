<?php

use App\Http\Controllers\Stock\StockController;
use App\Http\Controllers\Stock\SupplierController;
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
Route::group(['middleware' => ['auth:sanctum', 'stock']], function () {
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    Route::resource('supplier', SupplierController::class);
    Route::resource('user',UserController::class);
});
