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
                        <div class="form-group m-form__group row justify-content-center">
                            <div class="col-lg-3">
                                <label>
                                    Processo
                                </label>
                                <select class="form-control m-select2{{ $errors->has('processo') ? ' is-invalid' : '' }}" id="m_select2_1" name="processo">
                                    <option value="{{$registo->processo_id}}">{{$registo->processo->tipo}}</option>
                                    @if($processos->count() >0)
                                        <option value=""></option>
                                        @foreach($processos as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('processo') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('processo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('processo') }}</strong>
                                    </span>
                                @else
                                    <span class="m-form__help">
														Escolher o processo
													</span>
                                @endif

                            </div>
                            <div class="col-lg-3">
                                <label>
                                    Grupo
                                </label>
                                <input type="text" class="form-control m-input{{ $errors->has('grupo') ? ' is-invalid' : '' }}" value="{{$registo->grupo or old('grupo')}}" name="grupo">
                                @if ($errors->has('grupo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('grupo') }}</strong>
                                    </span>
                                @else
                                    <span class="m-form__help">
														Inserir o grupo em que se insere o ficheiro
													</span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group m-form__group row justify-content-center">
                            <div class="col-lg-3">
                                <label>
                                    Título
                                </label>
                                <input type="text" class="form-control m-input{{ $errors->has('titulo') ? ' is-invalid' : '' }}" value="{{$registo->titulo or old('titulo')}}" name="titulo">
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
                            <div class="col-lg-3">
                                <label>
                                    Versão
                                </label>
                                <input type="text" class="form-control m-input{{ $errors->has('versao') ? ' is-invalid' : '' }}" value="{{$registo->versao or old('versao')}}" name="versao">
                                @if ($errors->has('versao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('versao') }}</strong>
                                    </span>
                                @else
                                    <span class="m-form__help">
														Inserir a versão do ficheiro
													</span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group m-form__group row justify-content-center">
                            <div class="col-lg-5">
                                <label>
                                    Ficheiro
                                </label>
                                <input type="file" class="form-control m-input{{ $errors->has('ficheiro') ? ' is-invalid' : '' }}" value="{{old('ficheiro')}}" name="ficheiro">
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