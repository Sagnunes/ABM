<?php
/**
 * Created by PhpStorm.
 * User: Nunes
 * Date: 7/4/2018
 * Time: 10:19 AM
 */


Route::get('pesquisa','PassaporteController@advancedSearchForm')->name('passaporte.advancedSearchForm');

Route::get('resultado-pesquisa','PassaporteController@advancedSearch')->name('passaporte.advancedSearch');

Route::get('resultado-acompahantes/{id}','PassaporteController@consultaAcompanhantes')->name('passaporte.consultaAcompanhantes');

Route::delete('apagar-acompahantes/{id}','PassaporteController@apagarAcompanhante')->name('passaporte.apagarAcompanhante');

Route::resource('passaporte', 'PassaporteController', ['only' => ['store', 'update','destroy']]);

Route::get('consulta-geral/{id}','PassaporteController@consulta')->name('passaporte.consulta');

Route::get('inserir','PassaporteController@create')->name('passaporte.create');

Route::get('registo/{id}/editar','PassaporteController@edit')->name('passaporte.edit');