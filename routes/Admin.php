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

        /** Videos */
        Route::prefix('Videos')->group(function () {
            Route::get('/index', 'VideoController@index')->name('Videos.index');
            Route::get('/allData', 'VideoController@allData')->name('Videos.allData');
            Route::post('/create', 'VideoController@create')->name('Videos.create');
            Route::get('/edit/{id}', 'VideoController@edit')->name('Videos.edit');
            Route::post('/update', 'VideoController@update')->name('Videos.update');
            Route::get('/destroy/{id}', 'VideoController@destroy')->name('Videos.destroy');
        });

        /** User */
        Route::prefix('User')->group(function () {
            Route::get('/index', 'UserController@index')->name('User.index');
            Route::get('/allData', 'UserController@allData')->name('User.allData');
            Route::get('/destroy/{id}', 'UserController@destroy')->name('User.destroy');
            Route::get('/show/{id}', 'UserController@show')->name('User.show');
        });

        /** Sliders */
        Route::prefix('Sliders')->group(function () {
            Route::get('/index', 'SlidersController@index')->name('Sliders.index');
            Route::get('/allData', 'SlidersController@allData')->name('Sliders.allData');
            Route::post('/create', 'SlidersController@create')->name('Sliders.create');
            Route::get('/edit/{id}', 'SlidersController@edit')->name('Sliders.edit');
            Route::post('/update', 'SlidersController@update')->name('Sliders.update');
            Route::get('/destroy/{id}', 'SlidersController@destroy')->name('Sliders.destroy');
        });

        /** Main_info */
        Route::prefix('Main_info')->group(function () {
            Route::get('/index', 'Main_infoController@index')->name('Main_info.index');
            Route::get('/allData', 'Main_infoController@allData')->name('Main_info.allData');
            Route::get('/edit/{id}', 'Main_infoController@edit')->name('Main_info.edit');
            Route::post('/update', 'Main_infoController@update')->name('Main_info.update');
        });
    });
});

