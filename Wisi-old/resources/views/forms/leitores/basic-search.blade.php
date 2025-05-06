@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Leitores
        @endslot
        @slot('route_title')

        @endslot
        @slot('route_category')
           
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
													<i class="flaticon-squares-3"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Estatística
                            </h3>
                        </div>
                    </div>

                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('leitores.basicSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data inicial
                            </label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control m-input{{ $errors->has('inicial') ? ' is-invalid' : '' }}" value="{{old('inicial')}}" name="inicial">

                            </div>
                            <label class="col-lg-2 col-form-label">
                                Data final
                            </label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control m-input{{ $errors->has('final') ? ' is-invalid' : '' }}" value="{{old('final')}}" name="final">
                            </div>
                        </div>
                    </div>
                    <div class="m-form__group form-group row">
                        <label class="col-3 col-form-label">
                        </label>
                        <div class="col-9">
                            <div class="m-radio-inline">
                                <label class="m-radio">
                                    <input type="radio" name="tag[]" value="1">
                                    Arquivo
                                    <span></span>
                                </label>
                                <label class="m-radio">
                                    <input type="radio" name="tag[]" value="2">
                                    Biblioteca
                                    <span></span>
                                </label>
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