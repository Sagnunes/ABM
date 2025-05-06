@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            CMFUN
        @endslot
        @slot('route_title')
            {{route('cmfunchal.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('cmfunchal.create')}}
        @endslot
        @slot('category')
            Inserir
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
												<span class="m-portlet__head-icon">
													<i class="flaticon-tabs"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Novo registo de CM Funchal
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('cmfunchal.store')}}" method="post">
                    @csrf
                    <div class="m-portlet__body">

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Fundo
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2{{ $errors->has('fundo') ? ' is-invalid' : '' }}" id="m_select2_1" name="fundo">
                                    @if($fundo->count() >0)
                                        <option value=""></option>
                                        @foreach($fundo as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('fundo') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('fundo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fundo') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Escolher um fundo
													</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Cota
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('cota') ? ' is-invalid' : '' }}"  name="cota" value="{{old('cota')}}"/>
                                @if ($errors->has('cota'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cota') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inserir a cota
													</span>
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Cód Referência
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('codRef') ? ' is-invalid' : '' }}" name="codRef" value="{{old('codRef')}}"/>
                                @if ($errors->has('codRef'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('codRef') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inserir o código de referência
													</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                DIM e Suporte
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('dimSuporte') ? ' is-invalid' : '' }}"  name="dimSuporte" value="{{old('dimSuporte')}}"/>
                                @if ($errors->has('dimSuporte'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dimSuporte') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inserir o dim e suporte
													</span>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Nível Descrição
                            </label>
                            <div class="col-lg-3">
                                <select name="nivelDescricao" id="m_select2_3" class="form-control m-select2{{ $errors->has('nivelDescricao') ? ' is-invalid' : '' }}">
                                    <option value=""></option>
                                    <option value="1">Documento Simples</option>
                                    <option value="2">Documento Composto</option>
                                </select>
                                @if ($errors->has('nivelDescricao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nivelDescricao') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Escolher o nível
													</span>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Área Org - Func
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('areaOrg') ? ' is-invalid' : '' }}" id="m_select2_4" name="areaOrg" >
                                    @if($area->count() >0)
                                        <option value=""></option>
                                        @foreach($area as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('areaOrg') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('areaOrg'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('areaOrg') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Escolher a área
													</span>
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Série
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('serie') ? ' is-invalid' : '' }}"  name="serie" value="{{old('serie')}}"/>
                                @if ($errors->has('serie'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('serie') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inserir a série ou subsérie
													</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Título original
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('tituloOriginal') ? ' is-invalid' : '' }}"  name="tituloOriginal" value="{{old('tituloOriginal')}}"/>
                                @if ($errors->has('tituloOriginal'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tituloOriginal') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inserir a série ou subsérie
													</span>
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Título
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('titulo') ? ' is-invalid' : '' }}"  name="titulo" value="{{old('titulo')}}"/>
                                @if ($errors->has('titulo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inserir a série ou subsérie
													</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Estado de conservação
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input{{ $errors->has('estado') ? ' is-invalid' : '' }}"  name="estado" value="{{old('estado')}}"/>
                                @if ($errors->has('estado'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inserir o estado de conservação
													</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Datas
                            </label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control m-input{{ $errors->has('dataInicial') ? ' is-invalid' : '' }}" name="dataInicial" value="{{old('dataInicial')}}"/>
                                @if ($errors->has('dataInicial'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataInicial') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inicial
													</span>
                            </div>

                            <div class="col-lg-3">
                                <input type="date" class="form-control m-input{{ $errors->has('dataFinal') ? ' is-invalid' : '' }}" name="dataFinal" value="{{old('dataFinal')}}"/>
                                @if ($errors->has('dataFinal'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataFinal') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Final
													</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Âmbito e Conteúdo
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input{{ $errors->has('ambito') ? ' is-invalid' : '' }}"  name="ambito" value="{{old('ambito')}}"/>
                                @if ($errors->has('ambito'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ambito') }}</strong>
                                    </span>
                                @endif
                                <span class="m-form__help">
														Inserir o ãmbito e o conteúdo
													</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row m--margin-top-10">
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="observacao" class="form-control" data-provide="markdown" rows="10"></textarea>
                                <span class="m-form__help">
														Observações
													</span>
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