@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Judiciais
        @endslot
        @slot('route_title')
            {{route('financas.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('financas.basicSearchForm')}}
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
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('judicial.basicSearch')}}" method="get">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Autor :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="autor"/>
                                <span class="m-form__help">
														inserir o nome do autor
													</span>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Réu :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="reu">
                                <span class="m-form__help">
														inserir o nome do réu
													</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="data"/>
                                <span class="m-form__help">
														inserir a data do processo
													</span>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Processo :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input" name="processo">
                                <span class="m-form__help">
														inserir o número do processo
													</span>
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
                                    <a href="{{route('judicial.advancedSearchForm')}}" class="float-right">Pesquisa</a>
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