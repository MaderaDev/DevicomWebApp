<?php


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('gammes', 'GammesController@show');
Route::get('modules', 'ModulesController@show');
Route::get('paiements', 'PaiementsController@show');