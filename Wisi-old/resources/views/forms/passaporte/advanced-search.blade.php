@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Passaportes
        @endslot
        @slot('route_title')
            {{route('passaporte.advancedSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('passaporte.advancedSearchForm')}}
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
													<i class="flaticon-interface-5"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Pesquisa
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('passaporte.advancedSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Caixa :
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input" name="caixa">
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Processo :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="processo">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Passaporte N.º :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="passaporte">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Ano :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="ano">
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Mês :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="mes">
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <label class="col-lg-2 col-form-label">
                                Destino :
                            </label>
                            <div class="col-lg-7">
                                <select class="form-control m-select2" id="m_select2_1" name="destino">
                                    @if($destino->count() >0)
                                        <option value=""></option>
                                        @foreach($destino as $item)
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
                                Requerente :
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input"  name="requerente" />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Pai :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="pai">
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Mãe :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="mae">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Naturalidade:
                            </label>
                            <div class="col-lg-7">
                                <select class="form-control m-select2" id="m_select2_2" name="naturalidade">
                                    @if($naturalidade->count() >0)
                                        <option value=""></option>
                                        @foreach($naturalidade as $item)
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
                                Cônjuge :
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control m-input" name="conjuge">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Observações :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="observacao">
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