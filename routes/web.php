<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\test;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use APP\Http\Controllers\UserController;
use App\Models\Brand;
use App\Models\Product;

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

Route::get('/', function(){
    return view('welcome');
});

//Products Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
/* End */

//Offer Routes
Route::get('/offers', [OfferController::class , 'index'])->name('offers.index');
Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
Route::post('/offers', [OfferController::class, 'store'])->name('offers.store');
Route::get('/offers/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
Route::patch('offers/{offer}', [OfferController::class, 'update'])->name('offers.update');
Route::delete('/offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
/* End */

//Orders Routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/{product}', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::post('/orders/{order}/offer', [OrderController::class, 'set_offer'])->name('orders.setoffer');

/* End */

//Brands routes
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::patch('brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
/* End */
