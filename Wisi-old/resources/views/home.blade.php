@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Painel
        @endslot
        @slot('route_title')
            {{route('home')}}
        @endslot
        @slot('route_category')

        @endslot
        @slot('category')
            Consulta
        @endslot

    @endcomponent
@endsection
@section('content')
    <div class="row">
        @if($tarefas->count() > 0)
        <div class="col-xl-4">
            <!--begin:: Widgets/Tasks -->
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Lembretes
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body ">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget2_tab1_content">
                            <div class="m-widget2">
                                @if($tarefas->count() >0)
                                    @foreach($tarefas as $tarefa)
                                        <div class="m-widget2__item m-widget2__item--@if($tarefa->prioridade == 1)accent @elseif($tarefa->prioridade==2)danger @elseif(empty($tarefa->prioridade))info @endif">
                                            <div class="m-widget2__checkbox">
                                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">

                                                </label>
                                            </div>
                                            <div class="m-widget2__desc">
															<span class="m-widget2__text">
																{{decrypt($tarefa->tarefa)}}
															</span>
                                            </div>
                                            <div class="m-widget2__actions">
                                                <div class="m-widget2__actions-nav">
                                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
                                                        <a href="#" class="m-dropdown__toggle">
                                                            <i class="la la-ellipsis-h"></i>
                                                        </a>
                                                        <div class="m-dropdown__wrapper">
                                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                            <div class="m-dropdown__inner">
                                                                <div class="m-dropdown__body">
                                                                    <div class="m-dropdown__content">
                                                                        <ul class="m-nav">
                                                                            <li class="m-nav__item">
                                                                                <a href="{{route('tarefa.completed',['id'=>$tarefa->id])}}" class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-paper-plane"></i>
                                                                                    <span class="m-nav__link-text">
																									Completar
																								</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="m-nav__item">
                                                                                <a href="{{route('tarefa.nullified',['id'=>$tarefa->id])}}" class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-cancel"></i>
                                                                                    <span class="m-nav__link-text">
																									Cancelar
																								</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-info text-center">Nenhum lembrete</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Tasks -->
        </div>
            <div class="col-xl-8">
            @else
                    <div class="col-xl-12">
        @endif
            <!--begin:: Widgets/Support Tickets -->
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Notícias
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget3">
                        @if($noticias->count()>0)
                            @foreach($noticias as $noticia)
                                <div class="m-widget3__item">
                                    <div class="m-widget3__header">
                                        <div class="m-widget3__user-img">
                                            <span class="fa flaticon-light" style="color: #4cce2b;"></span>
                                        </div>
                                        <div class="m-widget3__info">
														<span class="m-widget3__username">
															<span style="font-weight: bolder;text-transform: uppercase; text-decoration: underline">{{$noticia->titulo}}</span>  <span class="m-widget3__time" style="font-weight: lighter">
															- {{$noticia->created_at->diffForHumans()}}
														</span>
														</span>

                                        </div>
                                        <span class="m-widget3__status m--font-info">
                                            @if($noticia->created_at->isToday()) Recente @endif

													</span>
                                    </div>
                                    <div class="m-widget3__body">
                                        <p class="m-widget3__text">
                                            {!! $noticia->descricao !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-info text-center">Nenhuma notícia</p>
                        @endif
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Support Tickets -->
        </div>
    </div>
    @if(Auth::user()->permissao_for_template(10,4))
        <div class="row">
            <div class="col-xl-6">
                <!--begin:: Widgets/Audit Log-->
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Pedidos de aprovisionamento
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_widget4_tab1_content">
                                <div class="m-scrollable" data-scrollable="true" data-max-height="400" style="height: 400px; overflow: hidden;">
                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
                                            @if($aprosionamentos->count()>0)
                                                @foreach($aprosionamentos as $pedido)
                                                    <div class="m-list-timeline__item">
                                                        <span class="m-list-timeline__badge m-list-timeline__badge--@if($pedido->estado == 1)info @elseif($pedido->estado==2)warning @elseif($pedido->estado==3)success @endif"></span>
                                                        <span class="m-list-timeline__text">
																	{{$pedido->user->name}}
                                                            @if($pedido->estado==1)
                                                                <span class="m-badge m-badge--info m-badge--wide">
																		Novo
																	</span>
                                                            @endif
																</span>
                                                        <span class="m-list-timeline__time">
																	{{$pedido->created_at->diffForHumans()}}
																</span>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-info">Nenhum aprovisionamento registado.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="m_widget4_tab2_content"></div>
                            <div class="tab-pane" id="m_widget4_tab3_content"></div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Audit Log-->
            </div>
            <div class="col-xl-6">
                <!--begin:: Widgets/Audit Log-->
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                   Stock
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_widget4_tab1_content">
                                <div class="m-scrollable" data-scrollable="true" data-max-height="400" style="height: 400px; overflow: hidden;">
                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
                                            @if($produtos_stock_fim->count()>0)
                                                @foreach($produtos_stock_fim as $item)
                                                    @if($item->stock_min >= $item->stock)
                                                    <div class="m-list-timeline__item">
                                                        <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                                        <span class="m-list-timeline__text">
																	{{$item->nome}}
																</span>
                                                        <span class="m-list-timeline__time text-danger m--font-bold">
																	ALERTA
																</span>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p class="text-info">Nenhum produto fora de stock.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="m_widget4_tab2_content"></div>
                            <div class="tab-pane" id="m_widget4_tab3_content"></div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Audit Log-->
            </div>
        </div>
    @endif
    @if(Auth::user()->permissao_for_template(11,4))
        <div class="row">
            <div class="col-xl-8">
                <!--begin:: Widgets/Audit Log-->
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Depósitos
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_widget4_tab1_content">
                                <div class="m-scrollable" data-scrollable="true" data-max-height="400" style="height: 400px; overflow: hidden;">
                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
                                            @if($depositos->count()>0)
                                                @foreach($depositos as $pedido)
                                                    <div class="m-list-timeline__item">
                                                        <span class="m-list-timeline__badge m-list-timeline__badge--@if($pedido->estado == 1)info @elseif($pedido->estado==3)warning @elseif($pedido->estado==5)success @endif"></span>
                                                        <span class="m-list-timeline__text">
																	{{$pedido->user->name}} - <strong>{{$pedido->fundo->nome}}</strong>
                                                            @if($pedido->estado==1)
                                                                <span class="m-badge m-badge--info m-badge--wide">
																		Novo
																	</span>
                                                            @endif
																</span>
                                                        <span class="m-list-timeline__time">
																	{{$pedido->created_at->diffForHumans()}}
																</span>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-info">Nenhum depósito registado</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="m_widget4_tab2_content"></div>
                            <div class="tab-pane" id="m_widget4_tab3_content"></div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Audit Log-->
            </div>
            <div class="col-xl-4">
                <!--begin:: Widgets/Inbound Bandwidth-->
                <div class="m-portlet m-portlet--bordered-semi m-portlet--half-height m-portlet--fit " style="min-height: 300px">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Em processamento
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin::Widget5-->
                        <div class="m-widget20">
                            <div class="m-widget20__number m--font-warning">
                                {{$deposito_processamento->count()}}
                            </div>
                            <div class="m-widget20__chart" style="height:160px;">

                            </div>
                        </div>
                        <!--end::Widget 5-->
                    </div>
                </div>
                <!--end:: Widgets/Inbound Bandwidth-->
                <div class="m--space-30"></div>
                <!--begin:: Widgets/Outbound Bandwidth-->
                <div class="m-portlet m-portlet--bordered-semi m-portlet--half-height m-portlet--fit " style="min-height: 300px">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Concluídos
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin::Widget5-->
                        <div class="m-widget20">
                            <div class="m-widget20__number m--font-success">
                                {{$deposito_completado->count()}}
                            </div>
                            <div class="m-widget20__chart" style="height:160px;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif

    <!--End::Section-->
    <!--End::Section-->
@endsection
