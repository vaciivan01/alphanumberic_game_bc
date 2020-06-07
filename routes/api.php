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
Route::middleware('cors:api')->get('gameOption/{id}', 'GameOptionController@show');

// create the game options
Route::middleware('cors:api')->post('gameOption', 'GameOptionController@create');

// create the user
Route::middleware('cors:api')->post('users', 'AuthController@register'); // Signup

// get the user
Route::middleware('cors:api')->get('users', 'AuthController@login'); // Signin


