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

Route::group(['prefix' => 'user'], function() {
    
    Route::get('/', 'UserController@index');

    Route::get('{id}', 'UserController@show');

    Route::post('/', 'UserController@create');

    Route::put('{id}', 'UserController@edit');

    Route::delete('{id}', 'UserController@delete');

});