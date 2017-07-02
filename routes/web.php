<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('gammes', 'GammesController@show');
    Route::get('modules', 'ModuleController@index')->name('modules');
    Route::get('clients', 'ClientController@index')->name('client');
    Route::get('modules/create', 'ModuleController@create')->name('modules.create');
    Route::get('modules/{id}', 'ModuleController@edit')->name('modules.edit');
    Route::post('modules/create', 'ModuleController@store')->name('modules.store');
    Route::post('modules/storeEdit', 'ModuleController@storeEdit')->name('modules.storeEdit');
    Route::get('paiements', 'PaiementsController@show');
    Route::get('paiements/devis/{id}', 'PaiementsController@devis')->name('devis');
    Route::get('paiements/devis/export/{id}', 'PaiementsController@pdf')->name('pdf');

    Route::post('paiements/devis/{id}/apply', 'PaiementsController@applyDevis')->name('applyDevis');
});