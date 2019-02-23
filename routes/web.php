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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('login')->group(function (){
    Route::name('login.')->group(function () {
        Route::get('/', function() {
            return redirect('/login/user');
        });
        Route::get('user', 'UsersController@formLogin')->name('user');
        Route::post('user', 'UsersController@authenticate')->name('user.auth');
        Route::get('restaurant', 'RestaurantsController@formLogin')->name('restaurant');
        Route::post('restaurant', 'RestaurantsController@authenticate')->name('restaurant.auth');
    });
});

Route::prefix('register')->group(function (){
    Route::name('register.')->group(function () {
        Route::get('/', function() {
            return redirect('/register/user');
        });
        Route::get('user', 'UsersController@formRegister')->name('user');
        Route::post('user', 'UsersController@store')->name('user.simpan');
        Route::get('restaurant', 'RestaurantsController@formRegister')->name('restaurant');
        Route::post('restaurant', 'RestaurantsController@store')->name('restaurant.simpan');
    });
});