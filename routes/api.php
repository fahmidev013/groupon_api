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

Route::get('products/{language_id}', 'ProductController@index');
Route::get('products/{language_id}/{product_id}', 'ProductController@show');
Route::post('products', 'ProductController@create');
Route::put('products/{product_id}', 'ProductController@update');

Route::get('categories/{language_id}', 'CategoryController@index');
Route::get('categories/{language_id}/{category_id}', 'CategoryController@show');
Route::post('categories', 'CategoryController@create');
Route::put('categories/{category_id}', 'CategoryController@update');

Route::get('locations', 'LocationController@index');
Route::get('locations/{location_id}', 'LocationController@show');
Route::post('locations', 'LocationController@create');
Route::put('locations/{location_id}', 'LocationController@update');
