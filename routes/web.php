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

Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Custom Admin login register route by Animesh
|--------------------------------------------------------------------------
*/
Route::namespace('Admin\Auth')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin\Auth" Namespace
    Route::name('admin.')->group(function () {
    	Route::GET('admin', 'LoginController@showLoginForm')->name('login');
    });

    Route::POST('admin', 'LoginController@login');

    Route::prefix('admin-password')->group(function () {
    	Route::name('admin.password.')->group(function () {
    	    Route::POST('email', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
    	    Route::GET('reset', 'ForgotPasswordController@showLinkRequestForm')->name('request');
    	    Route::POST('reset','ResetPasswordController@reset')->name('update');
    	    Route::GET('reset/{token}','ResetPasswordController@showResetForm')->name('reset');
    	});
    });

    Route::prefix('admin')->group(function () {
    	Route::name('admin.')->group(function () {
    	    Route::GET('register','RegisterController@showRegistrationForm')->name('register');
    	});
    	Route::POST('register','RegisterController@register');
        
    });

});

Route::namespace('Admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

    Route::prefix('admin')->group(function () {
    	Route::name('admin.')->group(function () {
    	    Route::GET('home', 'AdminController@index')->name('home');
    	});
        
    });

    /*
    |--------------------------------------------------------------------------
    | End Custom login register route
    |--------------------------------------------------------------------------
    */
    Route::POST('import', 'AdminController@importExcel')->name('admin.importexcel');
    Route::POST('file-upoalds', 'AdminController@storeTicFile')->name('admin.storetic');
});

/*
|--------------------------------------------------------------------------
| User Side route by Animesh
|--------------------------------------------------------------------------
*/
Route::POST('tic-search', 'HomeController@searchTic')->name('search');


Route::fallback(function () {
    //The fallback route should always be the last route registered by your application.
    abort(404);
});