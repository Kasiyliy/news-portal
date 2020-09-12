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


Route::group(['namespace' => 'Auth'], function () {
    Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'RegisterController@register']);
    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
});

Route::group(['namespace' => 'Core'], function () {
//    Route::get('/', ['uses' => 'PageController@welcome', 'as' => 'welcome']);
    Route::get('/system-files/{image}', ['uses' => 'FileController@files', 'as' => 'system.files'])->where('image', '(.*)');
});
Route::group(['namespace' => 'Front'], function () {
    Route::get('/', ['uses' => 'MainController@index', 'as' => 'welcome']);
    Route::get('/news', ['uses' => 'MainController@news', 'as' => 'news']);
    Route::get('/news/{id}', ['uses' => 'MainController@newsDetail', 'as' => 'news.detail'])->where('id', '[0-9]+');
    Route::get('/groups', ['uses' => 'MainController@groups', 'as' => 'groups']);
    Route::get('/guide', ['uses' => 'MainController@guide', 'as' => 'guide']);
    Route::get('/business', ['uses' => 'MainController@business', 'as' => 'business']);
    Route::get('/prominent/{id}', ['uses' => 'MainController@prominentDetail', 'as' => 'prominent.detail'])->where('id', '[0-9]+');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Core'], function () {
        Route::get('/home', ['uses' => 'PageController@home', 'as' => 'home']);
    });

    Route::group(['namespace' => 'System'], function () {
        Route::get('/profile', ['uses' => 'UserController@profile', 'as' => 'user.profile']);
        Route::post('/change-password', ['uses' => 'UserController@changePassword', 'as' => 'change.password']);
        Route::post('/update-profile', ['uses' => 'UserController@updateProfileInfo', 'as' => 'update.profile']);
    });
});


