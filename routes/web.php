<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'users'], function() {
    
    // List all users registered
    Route::get('', 'UserController@index')->name('list.users');

    // Show all datas of a specific user
    Route::get('{id}', 'UserController@show')->name('show.user');

    // Add a new user
    Route::post('', 'UserController@create')->name('create.user');

    // Update an existing user
    Route::put('{id}', 'UserController@edit')->name('edit.user');

    // Delete user
    Route::delete('{id}', 'UserController@delete')->name('delete.user');

});