<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdminController;


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
    $product=Product::all();
    return view('landing.index', compact('product'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/redirect', [HomeController::class, 'redirect']);

Route::prefix('supplier')
    ->controller(SupplierController::class)
    ->group(function (){
        Route::get('/','index')->name('products');
        Route::get('/dashboard', 'showDashboard')->name('show.products');
        Route::get('/order', 'showOrder')->name('show.orders');
        Route::get('/add','add');
        Route::get('/edit/{id}','edit')->name('edit.products');
        Route::put('/edit/{id}','update')->name('update.products');
        Route::post('/store ', 'store');
        Route::delete('/{id}','destroy')->name('delete.products');
        Route::delete('/order/{id}','destroyOrder')->name('delete.order');
    });
// Route::get('/dashboard',[SupplierController::class, 'getDashboard'])->name('dashboard.products');

Route::post('/add_item/{id}', [HomeController::class, 'add_item']);
Route::get('/cart', [HomeController::class, 'showItem'])->name('showItem');
Route::DELETE('/remove/{id}', [HomeController::class, 'destroyItem'])->name('destroy.item');
Route::get('cash_order', [HomeController::class, 'cashOrder']);
Route::get('stripe/{totalPrice}', [HomeController::class, 'stripe']);
Route::post('stripe/{totalPrice}', [HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('shop', [HomeController::class, 'showShops'])->name('detail.shop');
Route::get('getTransactions', [HomeController::class, 'getTransactions'])->name('detail.transaction');
Route::get('getHistory',[HomeController::class, 'getHistory'])->name('history.transaction');
Route::get('transactions', [AdminController::class, 'showTransactions']);
Route::get('transactions/{id}', [AdminController::class, 'delivery_status']);





