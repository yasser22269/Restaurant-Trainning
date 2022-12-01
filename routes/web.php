<?php

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReservationController;

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

    Route::resource('Reservations', ReservationController::class);
    Route::resource('employee', EmployeeController::class);
//    Route::post('changePassword', [EmployeeController::class, 'changePassword'])->name('changePassword');
    Route::patch('employee/{id}', 'EmployeeController@changePassword')->name('employee.changePassword');
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

});
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/',[SettingController::class,'index'])->name('index');
            Route::put('/{settings}/update',[SettingController::class,'update'])->name('update');
        });



