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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


Route::post('/getAllCategories', 'CategoryController@getAllCategories')->middleware('auth:api');

Route::post('/getAllActivities', 'ActivityController@getAllActivities')->middleware('auth:api');
Route::post('/addActivity', 'ActivityController@addActivity')->middleware('auth:api');

Route::post('/getSummaryForLastMonth', 'SummaryController@addActivity')->middleware('auth:api');
Route::post('/getSummaryForLastYear', 'SummaryController@addActivity')->middleware('auth:api');
Route::post('/getSummaryForSetAmountOfDays', 'SummaryController@addActivity')->middleware('auth:api');
