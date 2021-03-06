<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:Api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::any('seller','Api\SellerController@getSeller');
//Route::any('goods','Api\GoodsController@getGoods');
//Route::any('ratings','Api\RatingController@getSellerRating');

Route::group(['namespace' => 'Api','middleware' => ['wechat.oauth']], function () {
    Route::any('order-create','OrderController@create');
});
