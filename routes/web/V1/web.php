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
    Route::get('/prominent', ['uses' => 'MainController@prominent', 'as' => 'prominent']);
    Route::get('/prominent/{id}', ['uses' => 'MainController@prominentDetail', 'as' => 'prominent.detail'])->where('id', '[0-9]+');
    Route::get('/resource', ['uses' => 'MainController@resource', 'as' => 'resource']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Core'], function () {
        Route::get('/home', ['uses' => 'PageController@home', 'as' => 'home']);
    });
    Route::group(['namespace' => 'System', 'prefix' => 'admin'], function () {
        Route::get('/about-us', ['uses' => 'AboutUsController@index', 'as' => 'about_us.index']);
        Route::post('/about-us/update', ['uses' => 'AboutUsController@update', 'as' => 'about_us.update']);

        //Guide
        Route::get('/guide', ['uses' => 'GuideController@index', 'as' => 'guide.index']);
        Route::post('/guide/store', ['uses' => 'GuideController@store', 'as' => 'guide.store']);
        Route::post('/guide/update/{id}', ['uses' => 'GuideController@update', 'as' => 'guide.update'])->where('id','[0-9]+');
        Route::post('/guide/delete/{id}', ['uses' => 'GuideController@delete', 'as' => 'guide.delete'])->where('id','[0-9]+');

        Route::get('/guide/contents/{category_id}', ['uses' => 'GuideController@content', 'as' => 'guide.content.index'])->where('category_id', '[0-9]+');
        Route::get('/guide/contents/create/{category_id}', ['uses' => 'GuideController@contentCreate', 'as' => 'guide.content.create'])->where('category_id', '[0-9]+');
        Route::get('/guide/contents/edit/{id}', ['uses' => 'GuideController@contentEdit', 'as' => 'guide.content.edit'])->where('id', '[0-9]+');
        Route::post('/guide/contents/store/{category_id}', ['uses' => 'GuideController@contentStore', 'as' => 'guide.content.store'])->where('category_id', '[0-9]+');
        Route::post('/guide/contents/update/{id}', ['uses' => 'GuideController@contentUpdate', 'as' => 'guide.content.update'])->where('id', '[0-9]+');
        Route::post('/guide/contents/delete/{id}', ['uses' => 'GuideController@contentDelete', 'as' => 'guide.content.delete'])->where('id', '[0-9]+');


    });

    Route::group(['namespace' => 'System'], function () {
        Route::get('/profile', ['uses' => 'UserController@profile', 'as' => 'user.profile']);
        Route::post('/change-password', ['uses' => 'UserController@changePassword', 'as' => 'change.password']);
        Route::post('/update-profile', ['uses' => 'UserController@updateProfileInfo', 'as' => 'update.profile']);
    });
});


