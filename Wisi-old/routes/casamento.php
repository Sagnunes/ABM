<?php
/**
 * Created by PhpStorm.
 * User: Nunes
 * Date: 6/25/2018
 * Time: 2:40 PM
 */

Route::group(['middleware'=>'auth'], function (){

    Route::get('pesquisa','CasamentoController@searchForm')->name('casamento.searchForm');

    Route::get('resultado-pesquisa','CasamentoController@searchQuery')->name('casamento.searchQuery');

    Route::get('pdf/{id}','CasamentoController@pdf')->name('casamento.pdf');

    Route::get('inserir','CasamentoController@create')->name('casamento.create');

    Route::get('registo/{id}/editar','CasamentoController@edit')->name('casamento.edit');

    Route::resource('casamento', 'CasamentoController', ['only' => ['store', 'update','destroy']]);

});
