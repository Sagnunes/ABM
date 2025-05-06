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
                                                    Aprovisionamento
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
																	DATA
																</span>
                                                <span class="m-invoice__text">
																	@for($i = 0, $iMax = 1; $i < $iMax; $i++)
                                                                        {{$dados[$i]->data}}
                                                    @endfor
																</span>
                                            </div>
                                            <div class="m-invoice__item">
																<span class="m-invoice__subtitle">
																	Requerente
																</span>
                                                <span class="m-invoice__text">
																	@for($i = 0, $iMax = 1; $i < $iMax; $i++)
                                                        {{$dados[$i]->utilizador}}
                                                    @endfor
																</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="m-invoice__body m-invoice__body--centered">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>
                                                    Produto
                                                </th>
                                                <th>
                                                    Quantidade Pedida
                                                </th>
                                                <th>
                                                    Entregue
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dados as $item)
                                                <tr>
                                                    <td>{{$item->nome}}</td>
                                                    <td>{{$item->quantidade}}</td>
                                                    <td>{{$item->quantidade_entregue}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @for($i = 0, $iMax = 1; $i < $iMax; $i++)
                                            <span>Observação :</span> <br> <br>
                                            {{$dados[$i]->observacao}}
                                        @endfor
                                    </div>
                                </div>
                                <div class="m-invoice__footer">
                                    <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>
                                                    Responsável pelo aprovisionamento
                                                </th>
                                                <th>

                                                </th>
                                                <th></th>
                                                <th>
                                                  Assinatura do Requisitante
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <hr width="250px" style="margin-left: -10px">
                                                </td>
                                                <td>

                                                </td>
                                                <td></td>
                                                <td>
                                                    <hr width="320px" style="margin-bottom: 5px;margin-right: 5px">
                                                </td>
                                            </tr>
                                            </tbody>
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