<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
});


