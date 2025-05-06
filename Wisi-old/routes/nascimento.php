<?php
/**
 * Created by PhpStorm.
 * User: Nunes
 * Date: 6/26/2018
 * Time: 11:26 AM
 */

Route::get('pesquisa','NascimentoController@searchForm')->name('nascimento.searchForm');

Route::get('resultado-pesquisa','NascimentoController@searchQuery')->name('nascimento.searchQuery');

Route::get('inserir','NascimentoController@create')->name('nascimento.create');

Route::get('registo/{id}/editar','NascimentoController@edit')->name('nascimento.edit');

Route::resource('nascimento', 'NascimentoController', ['only' => ['store', 'update','destroy','index']]);