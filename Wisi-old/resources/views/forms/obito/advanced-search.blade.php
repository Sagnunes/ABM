@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Óbitos
        @endslot
        @slot('route_title')
            {{route('obito.advancedSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('obito.advancedSearchForm')}}
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
													<i class="flaticon-interface-9"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Pesquisa
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('obito.advancedSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Conservatória
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2" id="m_select2_1" name="obito[local]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
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
                                Livro :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="obito[livro]"/>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Folha :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="obito[folha]"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="obito[data]"/>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Nome :
                            </label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control m-input" name="obito[falecido]">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Pai :
                            </label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control m-input" name="obito[pai]"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Mãe :
                            </label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control m-input" name="obito[mae]">
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Observações :
                        </label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control m-input" name="obito[obs]">
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