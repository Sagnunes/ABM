@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Qualidade
        @endslot
        @slot('route_title')

        @endslot
        @slot('route_category')

        @endslot
        @slot('category')
            Gestão
        @endslot
    @endcomponent
@endsection
@section('content')
    @include('forms.qualidade.alert-modal-delete')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text" style="color: #564ec0; font-weight: lighter">
                                Registos de qualidade
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
                        <a href="#" class="float-right" data-toggle="modal" data-target="#modal-qualidade">Novo</a>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>
                        <tr>
                            <th title="Field #2">
                                Processo
                            </th>
                            <th title="Field #3">
                                Grupo
                            </th>
                            <th title="Field #7">
                                Título
                            </th>
                            <th>Acção</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $item)
                            <tr>
                                <td >
                                    {{$item->processo->tipo}}
                                </td>
                                <td>
                                    {{$item->grupo}}
                                </td>
                                <td>
                                    {{$item->titulo}}
                                </td>
                                <td>
                                    @if($item->visivel == 0)
                                        <a href="{{route('qualidade.visivel',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Ficar visivel">
                                            <i class="la la-eye-slash"></i>
                                        </a>
                                    @else
                                        <a href="{{route('qualidade.invisivel',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Ficar invisivel">
                                            <i class="la la-eye"></i>
                                        </a>
                                    @endif
                                    <a href="{{route('qualidade.edit',['id'=>$item->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar detalhes">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#delete-view-{{$item->id}}" title="Apagar">
                                        <i class="la la-trash"></i>
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
    <div class="modal fade" id="modal-qualidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Novo documento
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                    </button>
                </div>
                <form action="{{route('qualidade.store')}}" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">
                                Processo:
                            </label>
                            <select name="processo" class="custom-select">
                                @foreach($processos as $item)
                                    <option value="{{$item->id}}">{{$item->tipo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">
                                Grupo:
                            </label>
                            <input type="text" class="form-control{{ $errors->has('grupo') ? ' is-invalid' : '' }}" id="recipient-name" name="grupo" value="{{old('grupo')}}">
                            @if ($errors->has('grupo'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('grupo') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">
                                Titulo:
                            </label>
                            <input type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" id="recipient-name" name="titulo" value="{{old('titulo')}}" required>
                            @if ($errors->has('titulo'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">
                                Ficheiro:
                            </label>
                            <input type="file" class="form-control{{ $errors->has('ficheiro') ? ' is-invalid' : '' }}" id="recipient-name" name="ficheiro" value="{{old('ficheiro')}}" required>
                            @if ($errors->has('ficheiro'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ficheiro') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">
                                Versão:
                            </label>
                            <input type="text" class="form-control{{ $errors->has('versao') ? ' is-invalid' : '' }}" id="recipient-name" name="versao" value="{{old('versao')}}" required>
                            @if ($errors->has('versao'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('versao') }}</strong>
                                    </span>
                            @endif
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
@endsection