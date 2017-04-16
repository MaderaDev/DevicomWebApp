<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('gammes', 'GammesController@show');
    Route::get('modules', 'ModulesController@show');
    Route::get('paiements', 'PaiementsController@show');
    Route::get('paiements/devis/{id}', 'PaiementsController@devis')->name('devis');
    Route::post('paiements/devis/{id}/apply', 'PaiementsController@applyDevis')->name('applyDevis');
});