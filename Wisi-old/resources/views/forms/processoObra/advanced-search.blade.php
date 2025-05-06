@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Processo de obras
        @endslot
        @slot('route_title')
            {{route('processoObra.advancedSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('processoObra.advancedSearchForm')}}
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
													<i class="flaticon-suitcase"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Pesquisa
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('processoObra.advancedSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Cota
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input{{ $errors->has('cota') ? ' is-invalid' : '' }}" value="{{old('cota')}}" name="processoObra[cota]"/>
                                @if ($errors->has('cota'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cota') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label">
                                N.º documento
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input{{ $errors->has('documento') ? ' is-invalid' : '' }}" value="{{old('documento')}}" name="processoObra[documento]"/>
                                @if ($errors->has('documento'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                N.º Projeto
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input{{ $errors->has('projeto') ? ' is-invalid' : '' }}" value="{{old('projeto')}}" name="processoObra[projeto]"/>
                                @if ($errors->has('projeto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('projeto') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Entidade
                            </label>
                            <div class="col-lg-8">
                                <select class="form-control m-select2{{ $errors->has('entidade') ? ' is-invalid' : '' }}" id="m_select2_3" name="processoObra[entidade]">
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
                                Data
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('data') ? ' is-invalid' : '' }}" value="{{old('data')}}" name="processoObra[data]"/>
                                @if ($errors->has('data'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <label class="col-lg-2 col-form-label">
                                Tipo obra
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('tipo_obra') ? ' is-invalid' : '' }}" value="{{old('tipo_obra')}}" name="processoObra[tipo_obra]"/>
                                @if ($errors->has('tipo_obra'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tipo_obra') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Objeto
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('objeto') ? ' is-invalid' : '' }}" name="processoObra[objeto]" value="{{old('objeto')}}">
                                @if ($errors->has('objeto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('objeto') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Freguesia
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('freguesia') ? ' is-invalid' : '' }}" id="m_select2_13" name="processoObra[freguesia]">
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
                                Sítio
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('sitio') ? ' is-invalid' : '' }}" name="processoObra[sitio]" value="{{old('sitio')}}">
                                @if ($errors->has('sitio'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sitio') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Observações :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="processoObra[observacao]">
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