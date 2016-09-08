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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/categorias/todas',  [
    'as'=>'json.categorias',
    'uses'=> 'JsonController@getCategories'
]);

Route::get('/produtosDelivery/{categ}/{begin?}/{end?}',  [
    'as'=>'json.produtosDelivery',
    'uses'=> 'JsonController@produtosDelivery'
]);

Route::get('/partnerProviderId/{id}',  [
    'as'=>'json.partnerProviderId',
    'uses'=> 'JsonController@partnerProviderId'
]);

Route::get('/appVersion',  [
    'as'=>'json.appVersion',
    'uses'=> 'JsonController@appVersion'
]);

Route::get('/advice',  [
    'as'=>'json.appVersion',
    'uses'=> 'JsonController@advice'
]);

Route::post('/ordem',  [
    'as'=>'json.ordem',
    'uses'=> 'JsonController@ordem'
]);