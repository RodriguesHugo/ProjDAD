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
Route::post('workers/editAccount/{id}', 'UserControllerAPI@editAccount');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('users/me', 'UserControllerAPI@myProfile');
Route::get('/items', 'ItemAPIController@index');
Route::post('login', 'LoginControllerAPI@login')->name('login');
Route::middleware('auth:api')->post('logout', 'LoginControllerAPI@logout');

Route::middleware(['auth:api','manager'])->post('registerAccount', 'UserControllerAPI@registerAccount');

//Route::patch('users/confirmRegistration/{id}', 'UserControllerAPI@confirmRegistration');
