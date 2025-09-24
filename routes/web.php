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
Route::post('offers/{offer}', [OfferController::class, 'update'])->name('offers.update');
Route::get('/offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
/* End */

//Orders Routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/{product}', [OrderController::class, 'store'])->name('orders.store');
Route::post('/orders/{order}/offer', [OrderController::class, 'set_offer'])->name('orders.setoffer');

/* End */

//Brands routes
Route::get('/brands-form', function(){
    return view('brands-form');
});
Route::get('/brand-update/{brand}', function(Brand $brand){
    return view('brand-update', compact('brand'));
});

Route::get('/brands-list', [BrandController::class, 'index']);

Route::post('/brand-submit',[BrandController::class, 'store']);

Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');

Route::post('/update/{brand}',[BrandController::class, 'update'])->name('brand.update');

Route::get('/brand-delete/{brand}',[BrandController::class, 'delete']);

Route::get('/brand/{brand}', [BrandController::class, 'show']);
