@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Aprovisionamento
        @endslot
        @slot('route_title')
            {{route('aprovisionamento.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('aprovisionamento.basicSearchForm')}}
        @endslot
        @slot('category')
            Resultados
        @endslot
    @endcomponent
@endsection
@section('content')
    @include('forms.aprovisionamento.modal')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                               Gestão de aprovisionamento
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">

                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input" placeholder="Filtrar..." id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
														</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('aprovisionamento.basicSearchForm')}}" class="float-right">Pesquisa</a>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" >
                        <thead>

                        <tr>
                            <th title="Field #4">
                                Data
                            </th>
                            <th title="Field #5">
                                Utilizador
                            </th>
                            <th class="">
                                Estado
                            </th>
                            <th title="Field #8">Ações</th>
                        </tr>
                        </thead>

                        <tbody >
                        @foreach($results as $item)
                        <tr>
                            <td style="padding: 0">
                                {{$item->created_at}}
                            </td>
                            <td>
                                {{$item->utilizador}}
                            </td>
                            @if($item->estado ==1)
                                <td>
                                    <span class="text-info" style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline">Novo</span>
                                </td>
                            @elseif($item->estado ==2)
                                <td>
                                    <span class="text-warning" style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline">Em processamento</span>
                                </td>
                            @elseif($item->estado ==3)
                                <td>
                                    <span class="text-success" style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline">Concluido</span>
                                </td>
                            @endif
                            <td>
                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#modal-view-{{$item->id}}" title="Ver detalhes">
                                    <i class="la la-commenting"></i>
                                </a>
                                @if($item->estado ===1)
                                    <a href="{{route('aprovisionamento.edit',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Em processamento">
                                        <i class="la la-exchange"></i>
                                    </a>
                                @elseif($item->estado ===2)
                                <a href="{{route('aprovisionamento.completed',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Concluir">
                                    <i class="la la-check-square-o"></i>
                                </a>
                                @endif
                                <a href="{{route('aprovisionamento.pdf',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Gerar pdf" target="_blank">
                                    <i class="la la-file-pdf-o"></i>
                                </a>
                                <a href="{{route('aprovisionamento.nullified',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Anular">
                                    <i class="la la-ban"></i>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable -->

                </div>
            </div>
        </div>
    </div>

@endsection