@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Assiduidade
        @endslot
        @slot('route_title')

        @endslot
        @slot('route_category')
{{route('assiduidade.basicSearchForm')}}
        @endslot
        @slot('category')
            Pesquisa
        @endslot
    @endcomponent
@endsection
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                <p class="text-info">Dados atualizados até {{$data->lastData}}</p>
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
        action="{{route('assiduidade.basicSearch')}}" method="get">
        {{csrf_field()}}
        <div class="m-portlet__body">

            <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label" id="local">
                    Nome do funcionário:
                </label>
                <div class="col-lg-5">
                    <select class="form-control m-select2{{ $errors->has('nrCartao') ? ' is-invalid' : '' }}" id="m_select2_1" name="nrCartao">
                        @if($registos->count() >0)
                            <option value=""></option>
                            @foreach($registos as $item)
                                @if (\Illuminate\Support\Facades\Input::old('nrCartao') == $item->id)
                                    <option value="{{$item->nCartao}}" selected>{{$item->name}} - {{$item->nCartao}}</option>
                                @else
                                    <option value="{{$item->nCartao}}">{{$item->name}} - {{$item->nCartao}}</option>
                                @endif
                            @endforeach
                        @else
                            <option value="">ERRO 404!</option>
                        @endif
                    </select>
                    @if ($errors->has('nrCartao'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('local') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-formlabel" for="inlineFormInput">Data:</label>
                    <div class="col-lg-3">
                    <input type="date" class="form-control {{ $errors->has('dataInicial') ? ' is-invalid' : '' }}" id="inlineFormInput" placeholder="aa-mm-dd" name="dataInicial" value="{{old('dataInicial')}}">
                    @if ($errors->has('dataInicial'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('dataInicial') }}</strong>
                    </div>
                    @endif
                    <span class="m-form__help">
                        Inserir inicial
                    </span>
                </div>
                <div class="col-lg-3">
                   
                    <input type="date" class="form-control {{ $errors->has('dataFinal') ? ' is-invalid' : '' }}" id="inlineFormInput" placeholder="aa-mm-dd" name="dataFinal" value="{{old('dataFinal')}}">
                    @if ($errors->has('dataFinal'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('dataFinal') }}</strong>
                    </div>
                    @endif
                    
                    <span class="m-form__help">
                        Inserir final
                    </span>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection