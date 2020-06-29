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


Route::Post('/create-rider', 'riderController@createRider');
Route::Post('/check-in', 'riderController@checkIn');
Route::Get('/logs/{surname}', 'riderController@logs');
Route::Get('/load-more-log/{surname}/{count}', 'riderController@loadMoreLog');

Route::Post('/add-captain', 'captainController@addCaptain');
Route::get('/get-captains', 'captainController@getCaptains');