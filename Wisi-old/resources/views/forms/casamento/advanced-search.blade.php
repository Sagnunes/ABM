@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Casamentos
        @endslot
        @slot('route_title')
            {{route('casamento.searchForm')}}
        @endslot
        @slot('route_category')
            {{route('casamento.searchForm')}}
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
													<i class="flaticon-users"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Pesquisa
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('casamento.searchQuery')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Conservatória
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2" id="m_select2_1" name="casamento[local]">
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
                                <input type="text" class="form-control m-input" name="casamento[livro]"/>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Folha :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="casamento[folha]"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Número do registo:
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input" name="casamento[nRegisto]">
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Data :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="casamento[data]"/>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Marido :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="casamento[marido]"/>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Mulher :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="casamento[mulher]">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Pai do marido :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="casamento[paiMarido]"/>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Mãe do marido :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="casamento[maeMarido]">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Pai da mulher :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="casamento[paiMulher]"/>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Mãe da mulher :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="casamento[maeMulher]">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Observações :
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input" name="casamento[observacao]">
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