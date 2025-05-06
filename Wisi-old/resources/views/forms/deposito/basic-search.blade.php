@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Depósito
        @endslot
        @slot('route_title')
            {{route('deposito.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('deposito.basicSearchForm')}}
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
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="m-portlet__head-text" style="color: #564ec0; font-weight: lighter">
                                Pesquisa
                            </h3>

                        </div>

                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('deposito.basicSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                N.º Requisição
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="nRequisicao"/>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Cota
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input" name="cota"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Fundo
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2" id="m_select2_3" name="fundo" >
                                    @if($fundo->count() >0)
                                        <option value=""></option>
                                        @foreach($fundo as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Requisitante
                            </label>
                            <div class="col-lg-4">
                                <select class="form-control m-select2" id="m_select2_4" name="requisitante" >
                                    @if($utilizador->count() >0)
                                        <option value=""></option>
                                        @foreach($utilizador as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="m-form__group form-group row">
                            <label class="col-1 col-form-label">
                            </label>
                            <div class="col-9">
                                <div class="m-radio-inline">
                                    <label class="m-radio">
                                        <input type="radio" name="tag[]" value="1">
                                        Novo
                                        <span></span>
                                    </label>
                                    <label class="m-radio">
                                        <input type="radio" name="tag[]" value="2">
                                        Lido
                                        <span></span>
                                    </label>
                                    <label class="m-radio">
                                        <input type="radio" name="tag[]" value="3">
                                        Notificado
                                        <span></span>
                                    </label>
                                    <label class="m-radio">
                                        <input type="radio" name="tag[]" value="4">
                                        Por devolver
                                        <span></span>
                                    </label>
                                    <label class="m-radio">
                                        <input type="radio" name="tag[]" value="5">
                                        Concluido
                                        <span></span>
                                    </label>
                                    <label class="m-radio">
                                        <input type="radio" name="tag[]" value="6">
                                        Anulados
                                        <span></span>
                                    </label>
                                </div>
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