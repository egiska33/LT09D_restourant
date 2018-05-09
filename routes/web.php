<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//loginas su facebook
Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/reservation', 'ReservationController@create')->name('reservation.create')->middleware('auth');
Route::post('/reservation', 'ReservationController@store')->name('reservation.store')->middleware('auth');

Route::get('/profile', 'OrderController@profile')->name('profile')->middleware('auth');
Route::post('/cart', 'CartController@ajaxAdd')->name('cart.add');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/checkout', 'OrderController@checkout')->name('cart.checkout')->middleware('auth');
Route::get('/cart/{id}', 'CartController@deleteByOne')->name('cart.deleteByOne');
Route::get('cartDelete/{id}', 'CartController@deleteByItem')->name('cart.deleteByItem');

Route::group(['middleware'=> ['auth'], 'prefix'=>'admin'], function (){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('/menu', 'MenuController');
    Route::resource('/dish', 'DishController');
});


