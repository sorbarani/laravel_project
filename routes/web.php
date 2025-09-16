<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\test;
use App\Http\Controllers\BrandController;
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
Route::get('/products', [ProductController::class, 'index']);

Route::get('/product-form', function () {
    $brand = Brand::all();
    return view('product-form', compact('brand'));
});

Route::post('/product-submit', [ProductController::class, 'store']);
Route::get('/product/{product}', [OrderController::class, 'create']);
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
