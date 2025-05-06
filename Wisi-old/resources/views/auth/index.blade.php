@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Utilizadores
        @endslot
        @slot('route_title')
            {{route('utilizadores.index')}}
        @endslot
        @slot('route_category')
            {{route('utilizadores.index')}}
        @endslot
        @slot('category')
            Resultados
        @endslot
    @endcomponent
@endsection
@section('content')
    @include('auth.alert-modal-delete')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Registos dos utilizadores
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
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>

                        <tr>
                            <th title="Field #2">
                                Nome
                            </th>
                            <th title="Field #2">
                                Email
                            </th>
                            <th title="Field #8">Ações</th>
                        </tr>
                        </thead>

                        <tbody >
                        @foreach($results as $item)
                            <tr>
                                <td >
                                    {{$item->name}}
                                </td>
                                <td >
                                    {{$item->email}}
                                </td>
                                <td>
                                    @if($item->status ==0)
                                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#modal-view-{{$item->id}}" title="Ver detalhes">
                                            <i class="la la-unlock-alt"></i>
                                        </a>
                                    @else
                                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Validado">
                                            <i class="la la-unlock"></i>
                                        </a>

                                        <a href="{{route('acessos.show',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Acessos">
                                            <i class="la la-get-pocket"></i>
                                        </a>
                                        @if (Auth::user()->acessos->where('modulo_id',14))
                                            <a href="{{route('acessos.edit',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Dar acessos">
                                                <i class="la la-plus"></i>
                                            </a>
                                        @endif
                                        @if (Auth::user()->acessos->where('modulo_id',14))

                                            <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill float-right " data-toggle="modal" data-target="#delete-view-{{$item->id}}" title="Apagar">
                                                <i class="la la-trash"></i>
                                            </a>
                                        @endif
                                    @endif
                                </td>

                            </tr>
                            <div class="modal fade " id="modal-view-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Validar {{$item->name}}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                                            </button>
                                        </div>
                                        <form action="{{route('utilizadores.validation',['id'=>$item->id])}}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="recipient-name" class="form-control-label">
                                                        Serviço:
                                                    </label>
                                                    <select type="text" class="form-control{{ $errors->has('local') ? ' is-invalid' : '' }}" id="recipient-name" name="local">
                                                        <option value="">Escolher a opção</option>
                                                        @foreach($servicos as $item)
                                                            <option value="{{$item->id}}">{{$item->sigla.' - '. $item->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="m-form__group form-group">
                                                    <label >

                                                    </label>
                                                    <div class="m-checkbox-list">
                                                        <label class="m-checkbox m-checkbox--state-success">
                                                            <input type="checkbox" name="validacao" value="1">
                                                            Validar
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <span class="m-form__help">
																	Escolher a opção para validar o utilizador.
																</span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Fechar
                                                </button>
                                                <button type="submit" class="btn btn-success">
                                                    Guardar
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>

@endsection