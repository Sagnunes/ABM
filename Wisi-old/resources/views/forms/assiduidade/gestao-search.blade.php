@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Assiduidade
        @endslot
        @slot('route_title')
            #
        @endslot
        @slot('route_category')
            #
        @endslot
        @slot('category')
            Gestão
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
                    <h5 class="m-portlet__head-text">
                    <p class="text-info">Dados atualizados até {{$data->lastData}}</p>
                    </h5>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
              action="{{route('assiduidade.basicSearch')}}" method="get">
            {{csrf_field()}}
            <div class="m-portlet__body">

                <div class="form-group m-form__group row">
                    <div class="col-lg-4">
                        <label class="important" for="exampleSelect1">Nrº do cartão:</label>
                        <select class="form-control m-input" id="exampleSelect1" type="text" class="form-control {{ $errors->has('nrCartao') ? ' is-invalid' : '' }}" name="nrCartao" value="{{old('nrCartao')}}">
                            @foreach($registos as $item)
                                <option value="{{$item->cartao}}">{{$item->cartao}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('nrCartao'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nrCartao') }}</strong>
                            </div>
                        @endif
                        <span class="m-form__help">
                        Inserir número do cartão
                    </span>
                    </div>
                    <div class="col-lg-4">
                        <label class="important" for="inlineFormInput">Data inicial:</label>
                        <input type="date" class="form-control {{ $errors->has('dataInicial') ? ' is-invalid' : '' }}" id="inlineFormInput" placeholder="aa-mm-dd" name="dataInicial" value="{{old('dataInicial')}}">
                        @if ($errors->has('dataInicial'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('dataInicial') }}</strong>
                            </div>
                        @endif
                        <span class="m-form__help">
                        Inserir data
                    </span>
                    </div>
                    <div class="col-lg-4">
                        <label class="important" for="inlineFormInput">Data final:</label>
                        <input type="date" class="form-control {{ $errors->has('dataFinal') ? ' is-invalid' : '' }}" id="inlineFormInput" placeholder="aa-mm-dd" name="dataFinal" value="{{old('dataFinal')}}">
                        @if ($errors->has('dataFinal'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('dataFinal') }}</strong>
                            </div>
                        @endif

                        <span class="m-form__help">
                        Inserir data
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