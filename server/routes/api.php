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

Route::group(['middleware' => 'cors'], function () {
    // get list of notices
    Route::get('notices','NoticeController@index');

    // get specific notice
    Route::get('notices/{id}','NoticeController@show');

    // create new notice
    Route::post('notices','NoticeController@store');

    // update existing notice
    Route::put('notices/{id}','NoticeController@update');

    // delete a notice
    Route::delete('notices/{id}','NoticeController@destroy');
});