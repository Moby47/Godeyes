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


Route::Post('/signup', 'authController@reg');
Route::Post('/signin', 'authController@login');

Route::Post('/check-in', 'riderController@checkIn');
Route::Get('/logs/{id}', 'riderController@logs');
//Route::Get('/load-more-log/{id}/{count}', 'riderController@loadMoreLog');
Route::Get('/week/{id}', 'riderController@week');
Route::Get('/month/{id}', 'riderController@month');
Route::Get('/total/{id}', 'riderController@total');
Route::Get('/success-data/{id}', 'riderController@success');


Route::Post('/add-captain', 'captainController@addCaptain');
Route::get('/get-captains', 'captainController@getCaptains');