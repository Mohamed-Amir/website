<?php

Route::post('/admin/login', 'AuthController@login')->name('admin.login');

Route::prefix('Admin')->group(function () {
    Route::get('/login', function () {
        return view('Admin.loginAdmin');
    });
    Route::group(['middleware' => 'roles', 'roles' => ['Admin']], function () {

        Route::get('/logout/logout', 'AuthController@logout')->name('user.logout');
        Route::get('/home', 'AuthController@index')->name('admin.dashboard');

        // Profile Route
        Route::prefix('profile')->group(function () {
            Route::get('/index', 'profileController@index')->name('profile.index');
            Route::post('/index', 'profileController@update')->name('profile.update');
        });

        // Admin Routes
        Route::prefix('Admin')->group(function () {
            Route::get('/index', 'AdminController@index')->name('Admin.index');
            Route::get('/allData', 'AdminController@allData')->name('Admin.allData');
            Route::post('/create', 'AdminController@create')->name('Admin.create');
            Route::get('/edit/{id}', 'AdminController@edit')->name('Admin.edit');
            Route::post('/update', 'AdminController@update')->name('Admin.update');
            Route::get('/destroy/{id}', 'AdminController@destroy')->name('Admin.destroy');
        });

        /** Blog */
        Route::prefix('Blog')->group(function () {
            Route::get('/index', 'BlogController@index')->name('Blog.index');
            Route::get('/allData', 'BlogController@allData')->name('Blog.allData');
            Route::post('/create', 'BlogController@create')->name('Blog.create');
            Route::get('/edit/{id}', 'BlogController@edit')->name('Blog.edit');
            Route::post('/update', 'BlogController@update')->name('Blog.update');
            Route::get('/destroy/{id}', 'BlogController@destroy')->name('Blog.destroy');
        });

        /** About */
        Route::prefix('About')->group(function () {
            Route::get('/index', 'AboutController@index')->name('About.index');
            Route::get('/allData', 'AboutController@allData')->name('About.allData');
            Route::get('/edit/{id}', 'AboutController@edit')->name('About.edit');
            Route::post('/update', 'AboutController@update')->name('About.update');
        });

        /** Services */
        Route::prefix('Services')->group(function () {
            Route::get('/index', 'ServiceController@index')->name('Services.index');
            Route::get('/allData', 'ServiceController@allData')->name('Services.allData');
            Route::post('/create', 'ServiceController@create')->name('Services.create');
            Route::get('/edit/{id}', 'ServiceController@edit')->name('Services.edit');
            Route::post('/update', 'ServiceController@update')->name('Services.update');
            Route::get('/destroy/{id}', 'ServiceController@destroy')->name('Services.destroy');
        });

        /** Consults */
        Route::prefix('Consults')->group(function () {
            Route::get('/index', 'ConsultsController@index')->name('Consults.index');
            Route::get('/allData', 'ConsultsController@allData')->name('Consults.allData');
            Route::get('/destroy/{id}', 'ConsultsController@destroy')->name('Consults.destroy');
            Route::get('/show/{id}', 'ConsultsController@show')->name('Consults.show');

        });

        /** Contact_us */
        Route::prefix('Contact_us')->group(function () {
            Route::get('/index', 'Contact_usController@index')->name('Contact_us.index');
            Route::get('/allData', 'Contact_usController@allData')->name('Contact_us.allData');
            Route::get('/edit/{id}', 'Contact_usController@edit')->name('Contact_us.edit');
            Route::post('/update', 'Contact_usController@update')->name('Contact_us.update');

        });

        /** Contact_form */
        Route::prefix('Contact_form')->group(function () {
            Route::get('/index', 'MassagesController@index')->name('Contact_form.index');
            Route::get('/allData', 'MassagesController@allData')->name('Contact_form.allData');
            Route::get('/destroy/{id}', 'MassagesController@destroy')->name('Contact_form.destroy');
            Route::get('/show/{id}', 'MassagesController@show')->name('Contact_form.show');

        });
});
});

