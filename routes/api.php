<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

header('Content-Type: application/json; charset=UTF-8', true);


Route::post('/sendConsults', 'Fronted\ConsultsController@sendConsults')->name('consults.sendConsults');
Route::post('/massage', 'Fronted\Contact_usController@form')->name('contact_us.form');


Route::prefix('Blog')->group(function () {
    Route::get('/allBlogs', 'Api\BlogController@allBlogs')->name('Blog.allBlogs');
    Route::get('/singleBlog/{blog_id}', 'Api\BlogController@singleBlog')->name('Blog.singleBlog');
});

Route::prefix('About')->group(function () {
    Route::get('/About_us', 'Api\AboutController@About_us')->name('About.About_us');
});