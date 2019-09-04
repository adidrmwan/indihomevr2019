<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'API\UserController@details');
});

Route::get('file/download/{id}','API\UserController@download');

Route::get('file','API\UserController@get_all_game');
Route::get('file/{id}','API\UserController@get_detail_game');
Route::get('user/{id}','API\UserController@get_user');

Route::get('file/{id}/banner','API\UserController@show_banner');
Route::get('file/{id}/logo','API\UserController@show_logo');

Route::post('/purchase','API\UserController@store_purchase');
Route::get('/purchase/check/{user_id}/{game_id}','API\UserController@get_purchase');
