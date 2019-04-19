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

Route::post('galleries', 'GalleryController@store')->middleware('auth:api');;
Route::get('galleries/{id}', 'GalleryController@get')->middleware('auth:api');;
Route::post('galleries/{id}/comments', 'CommentController@store')->middleware('auth:api');;
Route::delete('comments/{id}', 'CommentController@delete')->middleware('auth:api');
Route::delete('galleries/{id}', 'GalleryController@delete')->middleware('auth:api');;
Route::put('galleries/{id}', 'GalleryController@update')->middleware('auth:api');;
Route::get('galleries', 'GalleryController@index');


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
