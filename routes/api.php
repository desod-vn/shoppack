<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => 'auth:api'], function () {

    //Thư mục
    Route::resource('/category', 'CategoryController')->except(['index', 'show']);
    //Đăng xuất
    Route::post('/logout', 'UserController@logout');
    //Xem trang cá nhân
    Route::get('/user/{user}', 'UserController@show');
    //Xem trang cá nhân
    Route::post('/user/update/{user}', 'UserController@update');
});

// --- Group ---
Route::group([],function() {
    //Get all categories
    Route::get('category', 'CategoryController@index');
    // Get category by id
    Route::get('category/{category}', 'CategoryController@show');

});