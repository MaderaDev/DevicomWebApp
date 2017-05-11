<?php

use Illuminate\Http\Request;

Route::get('/', 'ApiController@check');

Route::get('/synchronisation', 'ApiController@synchronisation');

Route::get('/client', 'ApiController@client');

Route::post('/client','ApiController@storeClient');

Route::post('/auth','ApiController@auth');

Route::post('/devis', 'ApiController@storeDevis');
Route::get('/devis', 'ApiController@DevisList');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


