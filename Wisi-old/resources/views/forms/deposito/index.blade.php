@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Depósito
        @endslot
        @slot('route_title')
            {{route('deposito.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('deposito.index')}}
        @endslot
        @slot('category')
            Gestão
        @endslot
    @endcomponent
@endsection
@section('content')
    @include('forms.deposito.modal')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text" style="color: #564ec0; font-weight: lighter">
                                Gestão de deposito
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
                        <a href="{{route('deposito.basicSearchForm')}}" class="float-right">Pesquisa</a>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <table class="m-datatable" >
                        <thead>
                        <tr>
                            <th title="Field #4">
                                Nº requisição
                            </th>
                            <th title="Field #5">
                                Requisitante
                            </th>
                            <th title="Field #5">
                                Fundo
                            </th>
                            <th>Cota</th>
                            <th>
                                Data
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
                                <td>
                                    {{$item->cod_referencia}}
                                </td>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    {{$item->fundo->nome}}
                                </td>
                                @if(!empty($item->cotaF))
                                    <td>
                                        {{$item->cotaI}}-{{$item->cotaF}}
                                    </td>
                                @else
                                    <td>
                                        {{$item->cotaI}}
                                    </td>
                                @endif
                                <td>
                                    {{$item->created_at}}
                                </td>
                                <td>
                                    @if($item->estado ==1)
                                        <span class="text-info" style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline">Novo</span>
                                    @elseif($item->estado ==2)
                                        <span style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline; color: #5c64ca;" >Lido</span>
                                    @elseif($item->estado ==3)
                                        <span class="text-warning" style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline">Notificado</span>
                                    @elseif($item->estado ==4)
                                        <span style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline; color: #ff4954">Por devolver</span>
                                    @elseif($item->estado ==5)
                                        <span class="text-success" style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline">Concluido</span>
                                    @elseif($item->estado ==6)
                                        <span class="text-danger" style="font-weight: bolder; text-transform: uppercase ; text-decoration: underline">Anulado</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#modal-view-{{$item->id}}" title="Ver detalhes">
                                        <i class="la la-commenting"></i>
                                    </a>

                                    @if($item->estado <=2)
                                        <a href="{{route('deposito.changeStatusOfDeposito',['id'=>$item->id,'status'=>3])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Notificar">
                                            <i class="la la-mail-forward"></i>
                                        </a>
                                    @endif
                                    @if($item->estado ==3)
                                        <a href="{{route('deposito.changeStatusOfDeposito',['id'=>$item->id,'status'=>4])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Por devolver">
                                            <i class="la la-truck"></i>
                                        </a>
                                    @endif
                                    @if($item->estado ==4)
                                        <a href="{{route('deposito.changeStatusOfDeposito',['id'=>$item->id,'status'=>5])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Concluir">
                                            <i class="la la-check-circle"></i>
                                        </a>
                                    @endif
                                    <a href="{{route('deposito.changeStatusOfDeposito',['id'=>$item->id,'status'=>6])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Anular">
                                        <i class="la la-eraser"></i>
                                    </a>
                                    <a href="{{route('deposito.pdf',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Gerar pdf" target="_blank">
                                        <i class="la la-file-pdf-o"></i>
                                    </a>
                                    <a href="{{route('deposito.edit',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar detalhes">
                                        <i class="la la-edit"></i>
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