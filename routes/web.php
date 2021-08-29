<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


//fire base controller routes

Route::get('firebase','FirebaseController@index');
Route::get('class','FirebaseController@class');
Route::post('get','FirebaseController@get')->name('get.data');
Route::get('show','FirebaseController@show');
Route::get('edit/{key}','FirebaseController@edit');
Route::post('store/{key}','FirebaseController@store')->name('key.update');
//fire store controller
Route::get('firestor','FirestoreController@index');
//task Routs
//signUp route
Route::get('sign_up','UserController@signupIndex');
Route::post('signup_store','UserController@signupstore')->name('user.signup');
//signIn Route
Route::get('sign_in','UserController@signinIndex');
Route::post('signin_store','UserController@signinstore')->name('user.signin');
//middleware
Route::group(['middleware' => ['userauth']], function () {
  //user route
Route::get('user','UserController@index')->name('users.index');
Route::get('edits/{user}','UserController@edit')->name('users.edit');
Route::post('user_update/{user}','UserController@update')->name('users.update');

//order routs
Route::get('view_order/{uid}','OrderController@index')->name('order.index');
Route::post('status_update','OrderController@statusUpdte')->name('status_update');
Route::get('showdetail/{key}/{uid}','OrderController@showDetail')->name('order.showdetail');
Route::get('product_detail','OrderController@productDetail')->name('order.product_detail');
//exchange route
Route::get('exchange','ExchangeController@index')->name('exchange.index');
Route::get('edit','ExchangeController@edit')->name('excahnge.edit');
Route::post('update','ExchangeController@update')->name('exchange.update');
//recomendation route
Route::get('recomendation','RecomendationController@index')->name('recomendation.index');
Route::post('insert','RecomendationController@store')->name('recomendation.store');
//warehouse route
Route::get('warehouse','WarehouseController@index')->name('warehouse.index');
Route::get('edit_warehouse/{key}','WarehouseController@edit')->name('warehouse.edit');
Route::post('update_warehouse','WarehouseController@update')->name('warehouse.update');

//logistic rooute
Route::get('logistic','LogisticController@index')->name('logistic.index');
Route::get('edit_logistic/{key}','LogisticController@edit')->name('logistic.edit');
Route::post('update_logistic/{key}','LogisticController@update')->name('logistic.update');
//dashboard route
Route::get('/','DashboardController@index')->name('dashboard.index');
Route::get('detail_dash','DashboardController@ordersInformation')->name('dashboard.detail');
//user logout
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('sign_in');
});
 });
