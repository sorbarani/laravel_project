<?php

use App\Http\Controllers\post;
use App\Http\Controllers\test;
use Illuminate\Support\Facades\Route;
use APP\Http\Controllers\UserController;

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

Route::get('/hello/{name}', [test::class, 'show']);
// Route::get('/hello/{name}', [UserController::class, 'show']);

// Route::get('/hello/{name?}', function($name =" "){
//     return "hello $name";
// });

Route::get('/form', function () {
    return view('home');
});

Route::post('/form-submit', [post::class, 'store']);

