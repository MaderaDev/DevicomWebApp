<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('gammes', 'GammesController@show');
    Route::get('modules', 'ModulesController@show');
    Route::get('paiements', 'PaiementsController@show');
});