<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\front\FrontProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;

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
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/',[SettingController::class,'index'])->name('index');
        Route::put('/{settings}/update',[SettingController::class,'update'])->name('update');
    });
    Route::resource('frontProducts', FrontProductController::class);
    Route::get('fetchProduct', [FrontProductController::class,'fetchProduct']);
    Route::get('showDetails/{id}', [FrontProductController::class, 'showDetailsOfProduct']);
