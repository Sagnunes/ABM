@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Judiciais
        @endslot
        @slot('route_title')
            {{route('judicial.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('judicial.create')}}
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
													<i class="flaticon-book"></i>
												</span>
                                <h3 class="m-portlet__head-text">
                                    Novo registo de judiciais
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('judicial.store')}}" method="post">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    N.º Caixa
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input{{ $errors->has('caixa') ? ' is-invalid' : '' }}"  value="{{old('caixa')}}" name="caixa"/>
                                    @if ($errors->has('caixa'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('caixa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-lg-2 col-form-label">
                                    N.º Doc.
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input{{ $errors->has('numero') ? ' is-invalid' : '' }}" value="{{old('numero')}}" name="numero"/>
                                    @if ($errors->has('numero'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    N.º Processo
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input{{ $errors->has('numeroProcesso') ? ' is-invalid' : '' }}" value="{{old('numeroProcesso')}}" name="numeroProcesso">
                                    @if ($errors->has('numeroProcesso'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numeroProcesso') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Data Inicial
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input{{ $errors->has('dataInicial') ? ' is-invalid' : '' }}" value="{{old('dataInicial')}}" name="dataInicial">
                                    @if ($errors->has('dataInicial'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataInicial') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-lg-2 col-form-label">
                                    Data Final
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input{{ $errors->has('dataFinal') ? ' is-invalid' : '' }}" value="{{old('dataFinal')}}" name="dataFinal">
                                    @if ($errors->has('dataFinal'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataFinal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row justify-content-center">
                                <label class="col-lg-1 col-form-label">
                                    Tribunal
                                </label>
                                <div class="col-lg-4">
                                    <select class="form-control m-select2{{ $errors->has('tribunal') ? ' is-invalid' : '' }}" id="m_select2_clear_1" name="tribunal">
                                        @if($tribunal->count() >0)
                                            <option value=""></option>
                                            @foreach($tribunal as $item)
                                                @if (\Illuminate\Support\Facades\Input::old('tribunal') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">ERRO 404!</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('tribunal'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tribunal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-lg-1 col-form-label">
                                    Juizo
                                </label>
                                <div class="col-lg-4">
                                    <select class="form-control m-select2{{ $errors->has('juizo') ? ' is-invalid' : '' }}" id="m_select2_clear_2" name="juizo">
                                        @if($juizo->count() >0)
                                            <option value=""></option>
                                            @foreach($juizo as $item)
                                                @if (\Illuminate\Support\Facades\Input::old('juizo') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">ERRO 404!</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('juizo'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('juizo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row justify-content-center">
                                <label class="col-lg-1 col-form-label">
                                    Classe.
                                </label>
                                <div class="col-lg-4">
                                    <select class="form-control m-select2{{ $errors->has('classificacao') ? ' is-invalid' : '' }}" id="m_select2_clear_3" name="classificacao">
                                        @if($classificacao->count() >0)
                                            <option value=""></option>
                                            @foreach($classificacao as $item)
                                                @if (\Illuminate\Support\Facades\Input::old('classificacao') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">ERRO 404!</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('classificacao'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('classificacao') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-lg-1 col-form-label">
                                    Ofício
                                </label>
                                <div class="col-lg-4">
                                    <select class="form-control m-select2{{ $errors->has('oficio') ? ' is-invalid' : '' }}" id="m_select2_clear_4" name="oficio">
                                        @if($oficio->count() >0)
                                            <option value=""></option>
                                            @foreach($oficio as $item)
                                                @if (\Illuminate\Support\Facades\Input::old('oficio') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">ERRO 404!</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('oficio'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('oficio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row justify-content-center">
                                <label class="col-lg-1 col-form-label">
                                    Tipologia
                                </label>
                                <div class="col-lg-4">
                                    <select class="form-control m-select2{{ $errors->has('tipologia') ? ' is-invalid' : '' }}" id="m_select2_clear_5" name="tipologia">
                                        @if($tipologia->count() >0)
                                            <option value=""></option>
                                            @foreach($tipologia as $item)
                                                @if (\Illuminate\Support\Facades\Input::old('tipologia') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">ERRO 404!</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('tipologia'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tipologia') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-lg-1 col-form-label">
                                    Freguesia
                                </label>
                                <div class="col-lg-4">
                                    <select class="form-control m-select2{{ $errors->has('freguesia') ? ' is-invalid' : '' }}" id="m_select2_clear_6" name="freguesia">
                                        @if($freguesia->count() >0)
                                            <option value=""></option>
                                            @foreach($freguesia as $item)
                                                @if (\Illuminate\Support\Facades\Input::old('freguesia') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">ERRO 404!</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('freguesia'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('freguesia') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Interveniente 1
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('autor') ? ' is-invalid' : '' }}"  value="{{old('autor')}}" name="autor"/>
                                    @if ($errors->has('autor'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('autor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Interveniente 2
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('reu') ? ' is-invalid' : '' }}" value="{{old('reu')}}" name="reu"/>
                                    @if ($errors->has('reu'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('reu') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Ámbito e contéudo:
                                </label>
                                <div class="col-lg-12 col-md-9 col-sm-12">
                                    <textarea name="assuntos" class="form-control{{ $errors->has('assuntos') ? ' is-invalid' : '' }}" data-provide="markdown" rows="6">{{old('assuntos')}}</textarea>
                                    @if ($errors->has('assuntos'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('assuntos') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Apensos:
                                </label>
                                <div class="col-lg-12 col-md-9 col-sm-12">
                                    <textarea name="apensos" class="form-control{{ $errors->has('apensos') ? ' is-invalid' : '' }}" data-provide="markdown" rows="10">{{old('apensos')}}</textarea>
                                    @if ($errors->has('apensos'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('apensos') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group ">
                                <label class="col-lg-2 col-form-label">
                                    Observações:
                                </label>
                                <div class="col-lg-12 col-md-9 col-sm-12">
                                    <textarea name="observacao" class="form-control" data-provide="markdown" rows="10"></textarea>
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