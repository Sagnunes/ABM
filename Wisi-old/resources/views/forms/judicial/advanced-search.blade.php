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
            {{route('judicial.advancedSearchForm')}}
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
													<i class="flaticon-book"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Pesquisa
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('judicial.advancedSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                N.º Processo:
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="numeroProcesso">
                            </div>
                            <label class="col-lg-2 col-form-label">
                                N.º Caixa :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="caixa">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="data">
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Freguesia :
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2" id="m_select2_2" name="freguesia" >
                                    @if($freguesia->count() >0)
                                        <option value=""></option>
                                        @foreach($freguesia as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Tribunal :
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2" id="m_select2_3" name="tribunal" >
                                    @if($tribunal->count() >0)
                                        <option value=""></option>
                                        @foreach($tribunal as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Juizo :
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2" id="m_select2_13" name="juizo" >
                                    @if($juizo->count() >0)
                                        <option value=""></option>
                                        @foreach($juizo as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Ofício :
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2" id="m_select2_16" name="oficio" >
                                    @if($oficio->count() >0)
                                        <option value=""></option>
                                        @foreach($oficio as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Classificação :
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2" id="m_select2_17" name="classificacao" >
                                    @if($classificacao->count() >0)
                                        <option value=""></option>
                                        @foreach($classificacao as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">

                            <label class="col-lg-2 col-form-label">
                                Tipologia :
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2" id="m_select2_4" name="tipologia" >
                                    @if($tipologia->count() >0)
                                        <option value=""></option>
                                        @foreach($tipologia as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Interveniente 1 :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="autor"/>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Interveniente 2 :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="reu">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Âmbito e conteúdo :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="assunto"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Apensos :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="apensos"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Observações :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="observacao"/>
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
                                    {{--<a href="{{route('judicial.basicSearchForm')}}" class="float-right">Pesquisa</a>--}}
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