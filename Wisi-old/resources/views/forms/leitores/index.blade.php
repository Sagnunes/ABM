@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Leitores
        @endslot
        @slot('route_title')
            #
        @endslot
        @slot('route_category')
            #
        @endslot
        @slot('category')
            Arquivo
        @endslot
    @endcomponent
@endsection
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-1">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head " style="background-image: url({{asset('imgs/fundo-modificado.png')}});">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="m-invoice__logo">
                                        <a href="#">
                                            <h1 style="color: #061f5c">

                                            </h1>
                                        </a>
                                        <a href="#">
                                            <img  src="{{asset('imgs/logo-Minimal.png')}}">
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
														<span class="m-invoice__subtitle text-dark">
															Total de registos
														</span>
                                            <span class="m-invoice__text" style="color: rgb(254, 33, 190); font-weight: bolder; font-size: 25px;">
															{{$results->count()}}
														</span>
                                        </div>
                                        <div class="m-invoice__item  text-dark">
														<span class="m-invoice__subtitle">

														</span>
                                            <span class="m-invoice__text  text-dark">

														</span>
                                        </div>
                                        <div class="m-invoice__item text-dark">
														<span class="m-invoice__subtitle">
                                                            Local da pesquisa
														</span>
                                            <span class="m-invoice__text text-dark" style="text-decoration: underline; font-weight: bolder">
                                                           @if($local[0] == 1)
                                                    Arquivo Regional da Madeira
                                                @elseif ($local[0] == 2)
                                                    Biblioteca Pública da Madeira
                                                               @else
                                                               Não foi escolhido nenhum local.
                                                @endif
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
                                                Número do leitor
                                            </th>
                                            <th>
                                                Dia
                                            </th>
                                            <th>
                                                Hora
                                            </th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($results as $item)
                                            <tr>

                                                <td>
                                                    {{$item->nLeitor}}
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($item->created_at)->format('H:i') }}
                                                </td>
                                                <td>
                                                    <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#delete-view-{{$item->id}}" title="Apagar">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="m-invoice__footer">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="m-invoice__content">
													<span>

													</span>
                                        <span>
														<span>

														</span>
														<span>

														</span>
													</span>
                                        <span>
														<span>

														</span>
														<span>

														</span>
													</span>
                                        <span>
														<span>

														</span>
														<span>

														</span>
													</span>
                                    </div>
                                    <div class="m-invoice__content">
													<span>

													</span>
                                        <span class="m-invoice__price">

													</span>
                                        <span>
														Total de registos :  {{$results->count()}}
													</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection