<?php


Route::resource('/painel/produtos', 'Painel\ProdutoController');
Route::get('/painel/produtos/testes', 'Painel\ProdutoController@tests');

Route::group(['namespace' => 'Site'], function() {

    Route::get('/categoria/{id}', 'siteController@categoria');
    Route::get('/categoria2/{id?}', 'siteController@categoriaOp');

    Route::get('/', 'siteController@index');
    Route::get('/contato', 'siteController@contato');
});


