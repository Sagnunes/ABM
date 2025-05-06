@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Notariais
        @endslot
        @slot('route_title')
            {{route('notariais.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('notariais.advancedSearchForm')}}
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
													<i class="flaticon-folder-2"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Pesquisa
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('notariais.advancedSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Cota atual
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="livro"/>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Cota original
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="cota"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="data"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Cartório
                            </label>
                            <div class="col-lg-8">
                                <select class="form-control m-select2" id="m_select2_1" name="cartorio" >
                                    @if($cartorio->count() >0)
                                        <option value=""></option>
                                        @foreach($cartorio as $item)
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
                                Tipologia
                            </label>
                            <div class="col-lg-8">
                                <select class="form-control m-select2" id="m_select2_3" name="tipologia" >
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
                        {{--<div class="form-group m-form__group row">--}}
                        {{--<label class="col-lg-2 col-form-label">--}}
                        {{--Cartório--}}
                        {{--</label>--}}
                        {{--<div class="col-lg-3">--}}
                        {{--<select class="form-control m-select2" id="m_select2_1" name="cartorio" >--}}
                        {{--@if($cartorio->count() >0)--}}
                        {{--<option value=""></option>--}}
                        {{--@foreach($cartorio as $item)--}}
                        {{--<option value="{{ $item->id }}">{{ $item->nome }}</option>--}}
                        {{--@endforeach--}}
                        {{--@else--}}
                        {{--<option value="">ERRO 404!</option>--}}
                        {{--@endif--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--<label class="col-lg-2 col-form-label">--}}
                        {{--Notário--}}
                        {{--</label>--}}
                        {{--<div class="col-lg-3">--}}
                        {{--<select class="form-control m-select2" id="m_select2_2" name="notario" >--}}
                        {{--@if($notario->count() >0)--}}
                        {{--<option value=""></option>--}}
                        {{--@foreach($notario as $item)--}}
                        {{--<option value="{{ $item->id }}">{{ $item->nome }}</option>--}}
                        {{--@endforeach--}}
                        {{--@else--}}
                        {{--<option value="">ERRO 404!</option>--}}
                        {{--@endif--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                1.º Outorgante
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="outorgante"/>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Outros outorgantes
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="outros"/>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Objeto Trans.
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="objTrans"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Observações
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