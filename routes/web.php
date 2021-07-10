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


Auth::routes();




Route::get('/', function () {
    $active =1;
    return view('home',compact('active'));
});

/** General pages */
Route::get('/about', 'GeneralController@about')->name('General.about');
Route::get('/question', 'GeneralController@question')->name('General.question');
Route::get('/singleVideo/{id}', 'GeneralController@singleVideo')->name('General.singleVideo');
Route::get('/loginForm', 'GeneralController@loginForm')->name('General.loginForm');
Route::get('/logged', 'UserController@logged')->name('user.logged');
Route::get('/register', 'UserController@register')->name('user.register');
Route::get('/logout/logout', 'UserController@logout')->name('user.logout');

