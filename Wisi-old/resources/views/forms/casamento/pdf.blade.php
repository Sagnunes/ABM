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
                                    <div class="m-invoice__logo">
                                        <a href="#" class="text-dark">
                                            <h2>
                                                Casamentos
                                            </h2>
                                        </a>
                                        <a href="#">
                                            <img src="{{asset('imgs/logo-Minimal.png')}}">
                                        </a>
                                    </div>
                                    <span class="m-invoice__desc">
															<span>

															</span>
															<span>

															</span>
														</span>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
																<span class="m-invoice__subtitle">
																	Data de impressão
																</span>
                                            <span class="m-invoice__text">
																{{Carbon\Carbon::now()->toDateString()}}
																</span>
                                        </div>
                                        <div class="m-invoice__item">
																<span class="m-invoice__subtitle">
																	Impressão feita por :
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
                                    <table class="table">
                                        <tr>
                                            <th>Conservatória:</th>
                                            <td >{{$registo->localparoquial->nome}}</td>
                                        </tr>

                                        <tr>
                                            <th>Livro:</th>
                                            <td >{{$registo->livro}}</td>
                                        </tr>
                                        <tr>
                                            <th>Folha:</th>
                                            <td >{{$registo->folha}}</td>
                                        </tr>
                                        <tr>
                                            <th> N.º de registo:</th>
                                            <td >{{$registo->nRegisto}}</td>
                                        </tr>
                                        <tr>
                                            <th>Data :</th>
                                            <td >{{$registo->data}}</td>
                                        </tr>
                                        <tr>
                                            <th> Nome do marido:</th>
                                            <td >{{$registo->marido}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nome do pai do marido:</th>
                                            <td >{{$registo->paiMarido}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nome da mãe do marido:</th>
                                            <td >{{$registo->maeMarido}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nome da mulher:</th>
                                            <td >{{$registo->mulher}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nome do pai da mulher:</th>
                                            <td >{{$registo->paiMulher}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nome da mãe do mulher:</th>
                                            <td >{{$registo->maeMulher}}</td>
                                        </tr>
                                        <tr>
                                            <th>Observação :</th>
                                            @if(empty($registo->observacao))
                                                <td class="text-info">Sem informação</td>
                                            @else
                                                <td >{{$registo->observacao}}</td>
                                            @endif
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