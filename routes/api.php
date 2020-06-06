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

// get the game options
Route::get('gameOption/{id}', 'GameOptionController@show');

// create the user
Route::post('user/{email}/{password}', 'UserController@create');

// get the user
// Route::get('user/{email}/{password}', 'UserController@show');


