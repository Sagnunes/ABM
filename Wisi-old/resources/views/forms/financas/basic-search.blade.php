@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Sucessões e doações
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
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('financas.basicSearch')}}" method="get">
                    @csrf
                  <div class="m-portlet__body">
                      <div class="m-form__group form-group row">
                          <label class="col-3 col-form-label">
                          </label>
                          <div class="col-9">
                              <div class="m-radio-inline">
                                  <label class="m-radio">
                                      <input type="radio" name="tag[]" value="1" class="">
                                      Sucessão
                                      <span></span>
                                  </label>
                                  <label class="m-radio">
                                      <input type="radio" name="tag[]" value="2">
                                      Doação
                                      <span></span>
                                  </label>
                                  <label class="m-radio">
                                      <input type="radio" name="tag[]" value="3">
                                      Outro
                                      <span></span>
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="form-group m-form__group row offset-1">
                          <label class="col-lg-2 col-form-label">
                              Datas
                          </label>
                          <div class="col-lg-2">
                              <input type="text" class="form-control m-input" name="dataInicial" placeholder="Data inicial"/>
                          </div>
                          <label class="col-lg-0 col-form-label" id="local">

                          </label>
                          <div class="col-lg-2">
                              <input type="text" class="form-control m-input" name="dataFinal" placeholder="Data final"/>
                          </div>
                      </div>
                      <div class="form-group m-form__group row offset-1">
                          <label class="col-lg-2 col-form-label">
                              Entidade
                          </label>
                          <div class="col-lg-4">
                              <input type="text" class="form-control m-input" name="entidade">
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
                                    <a href="{{route('financas.advancedSearchForm')}}" class="float-right">Pesquisa</a>
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