@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Depósitos
        @endslot
        @slot('route_title')

        @endslot
        @slot('route_category')

        @endslot
        @slot('category')
            Pesquisa
        @endslot
    @endcomponent
@endsection
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
										<span class="m-portlet__head-icon">
											<i class="fa flaticon-diagram"></i>
										</span>
                    <h3 class="m-portlet__head-text">
                        Estatística
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body ">
<div class="container text-center">
    <h5> <span style="text-decoration: underline">Data da pesquisa : {{$inicio}}</span> @if(!empty($fim)) a @endif <span style="text-decoration: underline">{{$fim}}</span></h5>
</div>
            <div class="m-pricing-table-1 m-pricing-table-1--fixed">
                <div class="m-pricing-table-1__items row">
                    <div class="m-pricing-table-1__item col-lg-4">
                        <div class="m-pricing-table-1__visual">
                            <div class="m-pricing-table-1__hexagon1"></div>
                            <div class="m-pricing-table-1__hexagon2"></div>
                            <span class="m-pricing-table-1__icon m--font-brand">
													<i class="fa flaticon-time-2"></i>
												</span>
                        </div>
                        <span class="m-pricing-table-1__price">
												{{$notificadas}}
											</span>
                        <h2 class="m-pricing-table-1__subtitle">
                            Requisições em processamento
                        </h2>
                    </div>
                    <div class="m-pricing-table-1__item col-lg-4">
                        <div class="m-pricing-table-1__visual">
                            <div class="m-pricing-table-1__hexagon1"></div>
                            <div class="m-pricing-table-1__hexagon2"></div>
                            <span class="m-pricing-table-1__icon m--font-brand">
													<i class="fa flaticon-interface-5"></i>
												</span>
                        </div>
                        <span class="m-pricing-table-1__price">
												{{$concluidas}}
											</span>
                        <h2 class="m-pricing-table-1__subtitle">
                           Requisições concluídas
                        </h2>
                    </div>
                    <div class="m-pricing-table-1__item col-lg-4">
                        <div class="m-pricing-table-1__visual">
                            <div class="m-pricing-table-1__hexagon1"></div>
                            <div class="m-pricing-table-1__hexagon2"></div>
                            <span class="m-pricing-table-1__icon m--font-brand">
													<i class="fa flaticon-close"></i>
												</span>
                        </div>
                        <span class="m-pricing-table-1__price">
												{{$anuladas}}
											</span>
                        <h2 class="m-pricing-table-1__subtitle">
                            Requisições anuladas
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection