<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductController;

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
    return view('index');
});
    Route::resource('/table', TablesController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('Attribute', AttributeController::class);
    Route::resource('Product', ProductController::class);

