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
Route::group(['namespace' => 'Api'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/register', 'AuthController@register');
    Route::get('/feed', 'PostController@feed');
    Route::get('/feed/{id}', 'PostController@show');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::resource('/post', 'PostController');
        Route::get('/profile',function (Request  $request){
            return $request->user();
        });
    });
});
