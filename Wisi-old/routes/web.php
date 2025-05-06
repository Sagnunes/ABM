<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::post('requisicoes/reproducao-documentos',[
    'uses'=>'RequisicoesController@storeReproducao',
    'as'=>'requisicoes.reproducao.documentos'
]);
Route::post('requisicoes/leitura',[
    'uses'=>'RequisicoesController@storeLeitura',
    'as'=>'requisicoes.leitura'
]);
Route::post('requisicoes/autorizacao',[
    'uses'=>'RequisicoesController@storeAutorizacao',
    'as'=>'requisicoes.autorizacao'
]);
Route::get('requisicoes/gestao',[
    'uses'=>'RequisicoesController@gestao',
    'as'=>'requisicoes.gestao'
]);
Route::resource('requisicoes', 'RequisicoesController', ['only' => ['create','store', 'update','destroy','edit','index']]);

Route::group(['middleware'=>'auth'], function (){

    Route::get('/', function () {
        return redirect('/home');
    });

    Route::resource('utilizadores','UtilizadoresController',['only' => ['create','store', 'update','destroy','index']]);
    Route::get('perfil/{email}',[
        'uses'=>'UtilizadoresController@show',
        'as'=>'utilizadores.show'
    ]);
    Route::get('perfil/conta/{email}',[
        'uses'=>'UtilizadoresController@account',
        'as'=>'utilizadores.account'
    ]);
    Route::put('guardar/{id}',[
        'uses'=>'UtilizadoresController@saveAccount',
        'as'=>'utilizadores.saveAccount'
    ]);
    Route::post('utilizador/validar/{id}',[
        'uses'=>'UtilizadoresController@validation',
        'as'=>'utilizadores.validation'
    ]);
    Route::resource('acessos','AcessosController',['only' => ['edit','update','destroy','show']]);

//<editor-fold desc="NOTARIAIS">
    Route::get('notariais/pesquisa','NotoriaisController@basicSearchForm')->name('notariais.basicSearchForm');
    Route::get('notariais/resultado-pesquisa','NotoriaisController@basicSearch')->name('notariais.basicSearch');
    Route::get('notariais/pesquisa-avancada','NotoriaisController@advancedSearchForm')->name('notariais.advancedSearchForm');
    Route::get('notariais/resultado-pesquisa-avancada','NotoriaisController@advancedSearch')->name('notariais.advancedSearch');
    Route::resource('notariais', 'NotoriaisController', ['only' => ['create','store', 'update','destroy','edit']]);
//</editor-fold>


//<editor-fold desc="CMFUN">
    Route::get('cmfunchal/pesquisa','CMFUNController@basicSearchForm')->name('cmfunchal.basicSearchForm');
    Route::get('cmfunchal/resultado-pesquisa','CMFUNController@basicSearch')->name('cmfunchal.basicSearch');
    Route::get('cmfunchal/pesquisa-avancada','CMFUNController@advancedSearchForm')->name('cmfunchal.advancedSearchForm');
    Route::get('cmfunchal/resultado-pesquisa-avancada','CMFUNController@advancedSearch')->name('cmfunchal.advancedSearch');
    Route::resource('cmfunchal', 'CMFUNController', ['only' => ['create','store','update','destroy','edit']]);
//</editor-fold>

//region processo obras
    Route::get('processoObra/pesquisa-avancada','ProcessoObraController@advancedSearchForm')->name('processoObra.advancedSearchForm');
    Route::get('processoObra/resultado-pesquisa-avancada','ProcessoObraController@advancedSearch')->name('processoObra.advancedSearch');
    Route::resource('processoObra', 'ProcessoObraController', ['only' => ['create','store', 'update','destroy','edit']]);
//endregion

    Route::get('obito/pesquisa','ObitoController@basicSearchForm')->name('obito.basicSearchForm');
    Route::get('obito/resultado-pesquisa','ObitoController@basicSearch')->name('obito.basicSearch');
    Route::get('obito/pesquisa-avancada','ObitoController@advancedSearchForm')->name('obito.advancedSearchForm');
    Route::get('obito/resultado-pesquisa-avancada','ObitoController@advancedSearch')->name('obito.advancedSearch');
    Route::resource('obito', 'ObitoController', ['only' => ['create','store', 'update','destroy','edit']]);

    Route::get('deposito/pesquisa','DepositoController@basicSearchForm')->name('deposito.basicSearchForm');
    Route::get('deposito/resultado-pesquisa','DepositoController@basicSearch')->name('deposito.basicSearch');
    Route::get('deposito/estado/{id}/{status}','DepositoController@changeStatusOfDeposito')->name('deposito.changeStatusOfDeposito');
    Route::get('deposito/visualizar/{id}','DepositoController@consulta')->name('deposito.consulta_por_id');
    Route::get('deposito/estatistica','DepositoController@estatistica')->name('deposito.estatistica');
    Route::get('deposito/estatistica-por-user','DepositoController@utilizadorEstatistica')->name('deposito.userEstatistica');
    Route::get('deposito/estatistica-resultados','DepositoController@estatisticaResultados')->name('deposito.estatistica.resultados');
    Route::get('deposito/estatistica-resultados-utilizador','DepositoController@utilizadorEstatisticaResultado')->name('deposito.estatistica.user.resultados');
    Route::get('deposito/pdf/{id}','DepositoController@createPDF')->name('deposito.pdf');
    Route::resource('deposito', 'DepositoController', ['only' => ['index','create','store', 'update','destroy','edit']]);

    Route::get('marcaagua/pesquisa','MarcaAguaController@basicSearchForm')->name('marcaagua.basicSearchForm');
    Route::get('marcaagua/resultado-pesquisa','MarcaAguaController@basicSearch')->name('marcaagua.basicSearch');
    Route::resource('marcaagua', 'MarcaAguaController', ['only' => ['create','store', 'update','destroy','index','edit']]);

    Route::get('aprovisionamento/pdf/{id}','AprosionamentoController@createPDF')->name('aprovisionamento.pdf');
    Route::get('aprovisionamento/processing/{id}','AprosionamentoController@processing')->name('aprovisionamento.processing');
    Route::get('aprovisionamento/completed/{id}','AprosionamentoController@completed')->name('aprovisionamento.completed');
    Route::get('aprovisionamento/nullified/{id}','AprosionamentoController@nullified')->name('aprovisionamento.nullified');
    Route::get('aprovisionamento/pesquisa','AprosionamentoController@basicSearchForm')->name('aprovisionamento.basicSearchForm');
    Route::get('aprovisionamento/resultado-pesquisa','AprosionamentoController@basicSearch')->name('aprovisionamento.basicSearch');
    Route::get('aprovisionamento/menu/{id}','AprosionamentoController@menu')->name('aprovisionamento.menu');
    Route::get('aprovisionamento/estado/{id}','AprosionamentoController@estado_por_id')->name('aprovisionamento.estado_por_id');
    Route::get('aprovisionamento/estatistica','AprosionamentoController@estatistica')->name('aprovisionamento.estatistica');
    Route::get('aprovisionamento/estatistica-resultados','AprosionamentoController@estatisticaResultados')->name('aprovisionamento.estatistica.resultados');
    Route::resource('aprovisionamento', 'AprosionamentoController', ['only' => ['index','create','store','edit','update','destroy']]);

    Route::get('produto/pesquisa','ProdutosController@basicSearchForm')->name('produto.basicSearchForm');
    Route::get('produto/resultado-pesquisa','ProdutosController@basicSearch')->name('produto.basicSearch');
    Route::resource('produto', 'ProdutosController', ['only' => ['create','store', 'update','destroy','edit']]);

    Route::get('judicial/pesquisa','JudicialController@basicSearchForm')->name('judicial.basicSearchForm');
    Route::get('judicial/resultado-pesquisa','JudicialController@basicSearch')->name('judicial.basicSearch');
    Route::get('judicial/pesquisa-avancada','JudicialController@advancedSearchForm')->name('judicial.advancedSearchForm');
    Route::get('judicial/resultado-pesquisa-avancada','JudicialController@advancedSearch')->name('judicial.advancedSearch');
    Route::resource('judicial', 'JudicialController', ['only' => ['create','store', 'update','destroy','edit']]);




    Route::get('financas/pesquisa','FinancasController@basicSearchForm')->name('financas.basicSearchForm');
    Route::get('financas/resultado-pesquisa','FinancasController@basicSearch')->name('financas.basicSearch');
    Route::get('financas/pesquisa-avancada','FinancasController@advancedSearchForm')->name('financas.advancedSearchForm');
    Route::get('financas/resultado-pesquisa-avancada','FinancasController@advancedSearch')->name('financas.advancedSearch');
    Route::resource('financas', 'FinancasController', ['only' => ['create','store', 'update','destroy','edit']]);

    Route::get('emolumento/pesquisa','EmolumentoController@basicSearchForm')->name('emolumento.basicSearchForm');
    Route::get('emolumento/resultado-pesquisa','EmolumentoController@basicSearch')->name('emolumento.basicSearch');
    Route::get('emolumento/pdf/{inicial}/{final}','EmolumentoController@pdf')->name('emolumento.pdf');
    Route::resource('emolumento', 'EmolumentoController', ['only' => ['create','store', 'update','destroy','index','edit']]);

    Route::resource('noticias', 'NoticiasController', ['only' => ['create','store', 'update','destroy','index','edit']]);
    Route::get('noticias/pesquisa','NoticiasController@basicSearchForm')->name('noticias.basicSearchForm');
    Route::get('noticias/resultado-pesquisa','NoticiasController@basicSearch')->name('noticias.basicSearch');

    Route::get('tarefa/completed/{id}','TarefaController@completed')->name('tarefa.completed');
    Route::get('tarefa/nullified/{id}','TarefaController@nullified')->name('tarefa.nullified');
    Route::resource('tarefa', 'TarefaController', ['only' => ['store']]);



//region Extras
    Route::resource('tribunal', 'TribunalController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('tribunal/{slug}',[
        'uses'=>'TribunalController@edit',
        'as'=>'tribunal.edit'
    ]);
    Route::resource('varajuizo', 'VaraJuizoController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('varajuizo/{slug}',[
        'uses'=>'VaraJuizoController@edit',
        'as'=>'varajuizo.edit'
    ]);
    Route::resource('classificacao', 'ClassificacaoController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('classificacao/{slug}',[
        'uses'=>'ClassificacaoController@edit',
        'as'=>'classificacao.edit'
    ]);
    Route::resource('oficiosessao', 'OficioSessaoController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('oficiosessao/{slug}',[
        'uses'=>'OficioSessaoController@edit',
        'as'=>'oficiosessao.edit'
    ]);
    Route::resource('tipologiajudicial', 'TipologiaJudicialController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('tipologiajudicial/{slug}',[
        'uses'=>'TipologiaJudicialController@edit',
        'as'=>'tipologiajudicial.edit'
    ]);
    Route::resource('municipio', 'MunicipioController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('municipio/{slug}',[
        'uses'=>'MunicipioController@edit',
        'as'=>'municipio.edit'
    ]);
    Route::resource('freguesia', 'FreguesiaController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('freguesia/{slug}',[
        'uses'=>'FreguesiaController@edit',
        'as'=>'freguesia.edit'
    ]);
    Route::resource('crc', 'CRCController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('crc/{slug}',[
        'uses'=>'CRCController@edit',
        'as'=>'crc.edit'
    ]);
    Route::resource('cartorio', 'CartorioController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('cartorio/{slug}',[
        'uses'=>'CartorioController@edit',
        'as'=>'cartorio.edit'
    ]);
    Route::resource('notario', 'NotarioController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('notario/{slug}',[
        'uses'=>'NotarioController@edit',
        'as'=>'notario.edit'
    ]);
    Route::resource('naturalidade', 'NaturalidadeController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('naturalidade/{slug}',[
        'uses'=>'NaturalidadeController@edit',
        'as'=>'naturalidade.edit'
    ]);
    Route::resource('destino', 'DestinoController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('destino/{slug}',[
        'uses'=>'DestinoController@edit',
        'as'=>'destino.edit'
    ]);
    Route::resource('tipologianotario', 'TipologiaNotarioController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('tipologianotario/{slug}',[
        'uses'=>'TipologiaNotarioController@edit',
        'as'=>'tipologianotario.edit'
    ]);
    Route::resource('modulo', 'ModuloController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('modulo/{slug}',[
        'uses'=>'ModuloController@edit',
        'as'=>'modulo.edit'
    ]);
    Route::resource('areaorg', 'AreaOrgController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('areaorg/{slug}',[
        'uses'=>'AreaOrgController@edit',
        'as'=>'areaorg.edit'
    ]);
    Route::resource('processo', 'ProcessoController', ['only' => ['create','store','index','destroy','update','edit']]);

    Route::resource('servicos', 'ServicoController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('servicos/{slug}',[
        'uses'=>'ServicoController@edit',
        'as'=>'servicos.edit'
    ]);

    Route::resource('fundo', 'FundoController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('fundo/{slug}',[
        'uses'=>'FundoController@edit',
        'as'=>'fundo.edit'
    ]);
    Route::resource('entidade', 'EntidadeController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('entidade/{slug}',[
        'uses'=>'EntidadeController@edit',
        'as'=>'entidade.edit'
    ]);
    Route::resource('categoriaAcompanhante', 'CategoriaAcompanhanteController', ['only' => ['create','store','index','destroy','update']]);
    Route::get('categoriaAcompanhante/{slug}',[
        'uses'=>'CategoriaAcompanhanteController@edit',
        'as'=>'categoriaAcompanhante.edit'
    ]);
    Route::get('qualidade/gestao',[
        'uses'=>'QualidadeController@gestao',
        'as'=>'qualidade.gestao'
    ]);
    Route::get('qualidade/visivel/{id}',[
        'uses'=>'QualidadeController@seen',
        'as'=>'qualidade.visivel'
    ]);
    Route::get('qualidade/invisivel/{id}',[
        'uses'=>'QualidadeController@unseen',
        'as'=>'qualidade.invisivel'
    ]);
    Route::resource('qualidade','QualidadeController',['only' => ['index','store','destroy','edit','update']]);

    Route::get('leitores/biblioteca',[
        'uses'=>'LeitoresController@showBiblioteca',
        'as'=>'leitores.biblioteca'
    ]);
    Route::get('leitores/arquivo',[
        'uses'=>'LeitoresController@showArquivo',
        'as'=>'leitores.arquivo'
    ]);
    Route::get('leitores/pesquisa','LeitoresController@basicSearchForm')->name('leitores.basicSearchForm');
    Route::get('leitores/resultado-pesquisa','LeitoresController@basicSearch')->name('leitores.basicSearch');
    Route::resource('leitores', 'LeitoresController', ['only' => ['create','store', 'update','destroy','edit']]);

    Route::get('assiduidade/gestao','AssiduidadeController@basicSearchForm')->name('assiduidade.basicSearchForm');
    Route::get('assiduidade','AssiduidadeController@userSearchForm')->name('assiduidade.userSearchForm');
    Route::get('assiduidade/resultado-pesquisa','AssiduidadeController@basicSearch')->name('assiduidade.basicSearch');


//endregion
    Route::get('/home', 'HomeController@index')->name('home');
});