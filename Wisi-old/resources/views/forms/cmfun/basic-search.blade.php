@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            CM FUNCHAL
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
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('cmfunchal.basicSearch')}}" method="get">
                    @csrf
                    <div class="form-group m-form__group row ">
                        <label class="col-lg-3 col-form-label">
                            Área Org - Func
                        </label>
                        <div class="col-lg-5">
                            <select class="form-control m-select2" id="m_select2_4" name="areaOrg" >
                                @if($area->count() >0)
                                    <option value=""></option>
                                    @foreach($area as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                    @endforeach
                                @else
                                    <option value="">ERRO 404!</option>
                                @endif
                            </select>
                            <span class="m-form__help">
														escolher a opção
													</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row ">
                        <label class="col-lg-3 col-form-label">
                            Título
                        </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control m-input"  name="titulo" />
                            <span class="m-form__help">
														inserir o título
													</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row ">
                        <label class="col-lg-3 col-form-label">
                            Data
                        </label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control m-input" name="data" placeholder="Y-m-d"/>
                            <span class="m-form__help">
														inserir a data
													</span>
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
                                    <a href="{{route('cmfunchal.advancedSearchForm')}}" class="float-right">Pesquisa</a>
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