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


Route::group(['as' => 'web.', 'namespace' => 'Web\V1'], function () 
{
	// Route::get('/', 'OrderController@get_create')->name('get_create');
    Route::post('/order/create', 'OrderController@create_order')->name('create_order');
    Route::get('/get/orders', 'OrderController@index')->name('orders.index');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
