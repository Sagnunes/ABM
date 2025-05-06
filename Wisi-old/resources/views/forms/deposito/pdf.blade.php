@include('includes.styles')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="m-invoice__logo" style="padding: 0;margin: 0">
                                        <a href="#" class="text-dark">
                                            <h4>
                                                GAA
                                            </h4>
                                            <span>Gestão de Arquivos e Acesso</span>
                                        </a>
                                        <a href="#">
                                            <img src="{{asset('imgs/logo-Minimal.png')}}">
                                        </a>
                                    </div>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
																<span class="m-invoice__subtitle">
																	Data de impressão
																</span>
                                            <span class="m-invoice__text">
																	{{Carbon\Carbon::now()}}
																</span>
                                        </div>
                                        <div class="m-invoice__item">
																<span class="m-invoice__subtitle">
																	Impressão feita por
																</span>
                                            <span class="m-invoice__text">
															{{Auth::user()->name}}
																</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="m-invoice__body m-invoice__body--centered">
                                <div class="table-responsive">
                                    <table style="width:100%" class="table">
                                        <tr>
                                            <th>N.º Requisição :</th>
                                            <td>{{$dados->cod_referencia}}</td>
                                        </tr>
                                        <tr>
                                            <th>Requisitante :</th>
                                            <td>{{$dados->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Fundo</th>
                                            <td>{{$dados->fundo->nome}}</td>
                                        </tr>
                                        @if(!empty($dados->titulo))
                                            <tr>
                                                <th>Titulo</th>
                                                <td>{{$dados->titulo}}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Cota</th>
                                            <td>{{$dados->cotaI}} @if(!empty($dados->cotaF)) - {{$dados->cotaF}} @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Localização</th>
                                            <td>{{$dados->D.'-'.$dados->B.'-'.$dados->E.'-'.$dados->P}}</td>
                                        </tr>
                                        <tr>
                                            <th>Unidades de instalação</th>
                                            <td>{{$dados->totalUI}}</td>
                                        </tr>
                                        @if(!empty($dados->observacao))
                                            <tr>
                                                <th>Observação</th>
                                                <td>{{$dados->observacao}}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Data de devolução prevista</th>
                                            <td>{{$dados->dataDevolucao}}</td>
                                        </tr>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<hr color="Black" width="100%">
<br><br><br>
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="m-invoice__logo" style="padding: 0">
                                        <a href="#" class="text-dark">
                                            <h4>
                                                GAA
                                            </h4>
                                            <span>Gestão de Arquivos e Acesso</span>
                                        </a>
                                        <a href="#">
                                            <img src="{{asset('imgs/logo-Minimal.png')}}">
                                        </a>
                                    </div>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
																<span class="m-invoice__subtitle">
																	Data de impressão
																</span>
                                            <span class="m-invoice__text">
																	{{Carbon\Carbon::now()}}
																</span>
                                        </div>
                                        <div class="m-invoice__item">
																<span class="m-invoice__subtitle">
																	Impressão feita por
																</span>
                                            <span class="m-invoice__text">
															{{Auth::user()->name}}
																</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="m-invoice__body m-invoice__body--centered">
                                <div class="table-responsive">
                                    <table style="width:100%" class="table">
                                        <tr>
                                            <th>N.º Requisição :</th>
                                           <td>{{$dados->cod_referencia}}</td>
                                        </tr>
                                        <tr>
                                            <th>Requisitante :</th>
                                            <td>{{$dados->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Fundo</th>
                                            <td>{{$dados->fundo->nome}}</td>
                                        </tr>
                                        @if(!empty($dados->titulo))
                                            <tr>
                                                <th>Titulo</th>
                                                <td>{{$dados->titulo}}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Cota</th>
                                            <td>{{$dados->cotaI}} @if(!empty($dados->cotaF)) - {{$dados->cotaF}} @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Localização</th>
                                            <td>{{$dados->D.'-'.$dados->B.'-'.$dados->E.'-'.$dados->P}}</td>
                                        </tr>
                                        <tr>
                                            <th>Unidades de instalação</th>
                                            <td>{{$dados->totalUI}}</td>
                                        </tr>
                                        @if(!empty($dados->observacao))
                                            <tr>
                                                <th>Observação</th>
                                                <td>{{$dados->observacao}}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Data de devolução prevista</th>
                                            <td>{{$dados->dataDevolucao}}</td>
                                        </tr>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts')