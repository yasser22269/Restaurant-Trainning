<?php

use App\Http\Controllers\Employee\EmployeeController;
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

Auth::routes();
Route::group(['middleware'=>['guest']], function(){
    Route::get('/', function()
    {
        return view('auth.login');
    });
});

Route::group(
    [
        'middleware' => ['auth' ]
    ], function(){
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function()
    {
        return view('index');
    });
    Route::resource('/table', TablesController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('Attribute', AttributeController::class);
    Route::resource('Product', ProductController::class);
    Route::resource('employee', EmployeeController::class);
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

});



// 8061b896b34f6f8b476ba8810faf3b1104ea50ce

