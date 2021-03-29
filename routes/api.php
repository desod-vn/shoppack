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


//Bài viết
Route::resource('/article', 'ArticleController');
//Thư mục
Route::resource('/category', 'CategoryController');

Route::group(['middleware' => 'auth:api'], function () {
    //Đăng xuất
    Route::post('/logout', 'UserController@logout');
    //Xem trang cá nhân
    Route::get('/user', 'UserController@user');
});
