@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Notícias
        @endslot
        @slot('route_title')
            {{route('noticias.index')}}
        @endslot
        @slot('route_category')

        @endslot
        @slot('category')
            Editar
        @endslot
    @endcomponent
@endsection
@section('content')
    <div class="m-form m-form--fit m-form--label-align-right">
        <div class="m-portlet__body">
            {{--BEGIN : FORM--}}
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="m-portlet__head-text" style="color: #564ec0; font-weight: lighter">
                                Editando o registo
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('noticias.update',['id'=>$registo->id])}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('put')
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Título
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('titulo') ? ' is-invalid' : '' }}" value="{{$registo->titulo}}" name="titulo">
                                @if ($errors->has('titulo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @else
                                    <span class="m-form__help">
                                        Inserir o título
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row m--margin-top-10">
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="descricao" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" data-provide="markdown" rows="10">{{$registo->descricao}}</textarea>
                                @if ($errors->has('descricao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @else
                                    <span class="m-form__help">
														inserir a descrição
													</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success">
                                        Guardar
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#m_modal_1">
                                        Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            {{--END : FORM--}}
        </div>
    </div>
    {{--BEGIN : MODAL--}}
    @include('includes.alert-modal-close')
    {{--END : MODAL--}}
@endsection