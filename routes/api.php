<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::middleware('auth:api')->group(function () {
    Route::get('/blogs', 'BlogController@index');
    Route::post('/blogs', 'BlogController@store');
    Route::get('/blogs/{blog}', 'BlogController@show');
    Route::put('/blogs/{blog}', 'BlogController@update');
    Route::delete('/blogs/{blog}', 'BlogController@destroy');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
