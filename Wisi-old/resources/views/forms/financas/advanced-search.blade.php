@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Sucessões e doações
        @endslot
        @slot('route_title')
            {{route('financas.advancedSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('financas.advancedSearchForm')}}
        @endslot
        @slot('category')
            Pesquisa
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
													<i class="flaticon-piggy-bank"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Sucessões e doações
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('financas.advancedSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                N.º Caixa
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('caixa') ? ' is-invalid' : '' }}"  value="{{old('caixa')}}" name="financas[caixa]"/>
                                @if ($errors->has('caixa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('caixa') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label">
                                N.º Capilha
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('capilha') ? ' is-invalid' : '' }}" value="{{old('capilha')}}" name="financas[capilha]"/>
                                @if ($errors->has('capilha'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('capilha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                N.º Processo
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('processo') ? ' is-invalid' : '' }}"  value="{{old('processo')}}" name="financas[processo]"/>
                                @if ($errors->has('processo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('processo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label" id="local">
                                Entidade
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2{{ $errors->has('entidade') ? ' is-invalid' : '' }}" id="m_select2_2" name="financas[entidade]">
                                    @if($entidade->count() >0)
                                        <option value=""></option>
                                        @foreach($entidade as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('entidade') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('entidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('entidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Nome
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('nome') ? ' is-invalid' : '' }}"  value="{{old('nome')}}" name="financas[nome]"/>
                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Freguesia
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('freguesia') ? ' is-invalid' : '' }}" id="m_select2_1" name="financas[freguesia]">
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
                            <label class="col-lg-2 col-form-label">
                                Data Óbito
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('obito') ? ' is-invalid' : '' }}"  value="{{old('obito')}}" name="financas[obito]"/>
                                @if ($errors->has('obito'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('obito') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data inicial <br>(instauração)
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('inicial') ? ' is-invalid' : '' }}"  value="{{old('inicial')}}" name="financas[inicial]"/>
                                @if ($errors->has('inicial'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inicial') }}</strong>
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
                                    <button type="submit" class="btn btn-info">
                                        Pesquisar
                                    </button>
                                    <a href="{{route('financas.basicSearchForm')}}" class="float-right">Pesquisa</a>
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
@endsection