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
            Biblioteca
        @endslot
    @endcomponent
@endsection
@section('content')
    @include('forms.leitores.alert-modal-delete')
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
															DATA
														</span>
                                            <span class="m-invoice__text text-dark">
																{{\Carbon\Carbon::now()->toDateString()}}
														</span>
                                        </div>
                                        <div class="m-invoice__item">
														<span class="m-invoice__subtitle">

														</span>
                                            <span class="m-invoice__text">

														</span>
                                        </div>
                                        <div class="m-invoice__item">
														<span class="m-invoice__subtitle">
                                                        <a href="" onclick="localtion.href=location.href"><span class="flaticon-refresh"></span> Recarregar a página</a>
														</span>
                                            <span class="m-invoice__text">

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
                                                Hora
                                            </th>
                                            <th>

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($results as $item)
                                            <tr>

                                                <td>
                                                    {{$item->nLeitor}}
                                                </td>
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
														Total de registos hoje : {{$results->count()}}
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