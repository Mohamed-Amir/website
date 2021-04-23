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

Route::group(['prefix' => LaravelLocalization::setLocale(),

    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {




Route::get('/', function () {
    $current =1;
    return view('home',compact('current'));
});
/** General pages */
Route::get('/about', 'GeneralController@about')->name('General.about');



/**consults*/
Route::get('/consults', 'ConsultsController@requestConsults')->name('consults.requestConsults');

/**contact_us*/
Route::get('/contact_us', 'Contact_usController@contact_us')->name('contact_us.contact_us');

/**blog*/
Route::get('/allBlogs', 'BlogsController@allBlogs')->name('blog.allBlogs');
Route::get('/singleBlog/{id}', 'BlogsController@singleBlog')->name('blog.singleBlog');
});