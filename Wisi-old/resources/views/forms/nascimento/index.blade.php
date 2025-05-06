@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Nascimentos
        @endslot
        @slot('route_title')
            {{route('nascimento.searchForm')}}
        @endslot
        @slot('route_category')
            {{route('nascimento.searchForm')}}
        @endslot
        @slot('category')
            Resultados
        @endslot
    @endcomponent
@endsection
@section('content')
    @include('forms.nascimento.modal')
    @include('forms.nascimento.alert-modal-delete')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-profile-1"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Nascimentos
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('nascimento.searchForm')}}" class="btn btn-outline-primary m-btn btn-sm m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-fast-backward"></i>
															<span>
																Voltar
															</span>
														</span>
                                </a>
                            </li>
                        </ul>
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
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>

                        <tr>
                            <th title="Field #2">
                                Filho
                            </th>
                            <th title="Field #2">
                                Pai
                            </th>
                            <th title="Field #3">
                                Mãe
                            </th>
                            <th title="Field #4">
                                PRQ / CRC
                            </th>
                            <th title="Field #5">
                                Data
                            </th>
                            <th title="Field #6">
                                Liv
                            </th>
                            <th title="Field #7">
                                Folha
                            </th>
                            <th title="Field #7">
                                Registo
                            </th>
                            <th title="Field #8">Ações</th>
                        </tr>
                        </thead>

                        <tbody >
                        @foreach($results as $item)
                        <tr>
                            <td>
                                {{$item->filho}}
                            </td>
                            <td >
                                {{$item->pai}}
                            </td>
                            <td>
                                {{$item->mae}}
                            </td>
                            <td>
                                {{$item->paroquia}}
                            </td>
                            <td>
                                {{$item->data}}
                            </td>
                            <td>
                                {{$item->livro}}
                            </td>
                            <td>
                                {{$item->folha}}
                            </td>
                            <td>
                                {{$item->nRegisto}}
                            </td>
                            <td>
                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#modal-view-{{$item->id}}" title="Ver detalhes">
                                    <i class="la la-commenting"></i>
                                </a>
                                @if (Auth::user()->acessos->where('modulo_id',1)->where('outros','>=',2)->first() || (Auth::user()->acessos->where('modulo_id',1)->where('proprios','>=',2)->first() && $item->user_id == Auth::user()->id))
                                <a href="{{route('nascimento.edit',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar detalhes">
                                    <i class="la la-edit"></i>
                                </a>
                                @endif
                                @if (Auth::user()->acessos->where('modulo_id',1)->where('outros','=',4)->first() || (Auth::user()->acessos->where('modulo_id',1)->where('proprios','=',4)->first() && $item->user_id == Auth::user()->id))
                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#delete-view-{{$item->id}}" title="Apagar">
                                    <i class="la la-trash"></i>
                                </a>
                                @endif
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