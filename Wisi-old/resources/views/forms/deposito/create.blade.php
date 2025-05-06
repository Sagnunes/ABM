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
            {{route('deposito.create')}}
        @endslot
        @slot('category')
            Requisitar
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
                                   Nova requisição
                                </h3>
                            </div>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('deposito.store')}}" method="post">
                        @csrf
                        <div class="m-portlet__body">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Fundo
                                </label>
                                <div class="col-lg-8">
                                    <select class="form-control m-select2{{ $errors->has('fundo') ? ' is-invalid' : '' }}" id="m_select2_1" name="fundo">
                                        <option value=""></option>
                                        @if($registos->count() >0)
                                            @foreach($registos as $item)
                                                @if (\Illuminate\Support\Facades\Input::old('fundo') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">ERRO 404!</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('fundo'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fundo') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Título
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input{{ $errors->has('titulo') ? ' is-invalid' : '' }}" id="" value="{{old('titulo')}}" name="titulo"/>
                                    @if ($errors->has('titulo'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Cota
                                </label>
                                <div class="input-group col-lg-4">
                                    <input type="text" class="form-control m-input{{ $errors->has('cotaInicial') ? ' is-invalid' : '' }}" placeholder="Inicial" name="cotaInicial" value="{{old('cotaInicial')}}"/>
                                    <div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-minus"></i>
													</span>

                                    </div>
                                    <input type="text" class="form-control{{ $errors->has('cotaFinal') ? ' is-invalid' : '' }}" placeholder="Final" name="cotaFinal" value="{{old('cotaFinal')}}" />
                                    @if ($errors->has('cotaFinal') || $errors->has('cotaInicial'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cotaFinal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row justify-content-center">
                                <label class="col-lg-0 col-form-label">
                                    D
                                </label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control m-input{{ $errors->has('D') ? ' is-invalid' : '' }}" id="" value="{{old('D')}}" name="D"/>
                                    @if ($errors->has('D'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('D') }}</strong>
                                    </span>
                                    @endif
                                    <span class="m-form__help">
														Inserir o número do depósito
													</span>
                                </div>
                                <label class="col-lg-0 col-form-label">
                                    B
                                </label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control m-input{{ $errors->has('B') ? ' is-invalid' : '' }}" value="{{old('B')}}" name="B"/>
                                    @if ($errors->has('B'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('B') }}</strong>
                                    </span>
                                    @endif
                                    <span class="m-form__help">
														Inserir o número do bloco
													</span>
                                </div>
                                <label class="col-lg-0 col-form-label">
                                    E
                                </label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control m-input{{ $errors->has('E') ? ' is-invalid' : '' }}" id="" value="{{old('E')}}" name="E"/>
                                    @if ($errors->has('E'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('E') }}</strong>
                                    </span>
                                    @endif
                                    <span class="m-form__help">
														Inserir o número da estante
													</span>
                                </div>
                                <label class="col-lg-0 col-form-label">
                                    P
                                </label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control m-input{{ $errors->has('P') ? ' is-invalid' : '' }}" id="" value="{{old('P')}}" name="P"/>
                                    @if ($errors->has('P'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('P') }}</strong>
                                    </span>
                                    @endif
                                    <span class="m-form__help">
														Inserir o número da prateleira
													</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Total UI
                                </label>
                                <div class="col-lg-3">
                                    <input type="number" class="form-control m-input{{ $errors->has('totalUI') ? ' is-invalid' : '' }}" value="{{old('totalUI')}}" name="totalUI"/>
                                    @if ($errors->has('totalUI'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('totalUI') }}</strong>
                                    </span>
                                    @endif
                                    <span class="m-form__help">
														Inserir o número da unidades instalação
													</span>
                                </div>
                                <label class="col-lg-2 col-form-label">
                                   Data
                                </label>
                                <div class="col-lg-3">
                                    <input type="date" class="form-control m-input{{ $errors->has('dataDevolucao') ? ' is-invalid' : '' }}" value="{{old('dataDevolucao')}}" name="dataDevolucao"/>
                                    @if ($errors->has('dataDevolucao'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataDevolucao') }}</strong>
                                    </span>
                                    @endif
                                    <span class="m-form__help">
														Inserir a data em que será devolvido
													</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" style="margin: 0">
                                    Observações
                                </label>
                                <div class="col-lg-12 col-md-9 col-sm-12">
                                    <textarea name="observacao" class="form-control" data-provide="markdown" rows="5"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-success">
                                            Enviar
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#m_modal_1">
                                            Fechar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-brand alert-dismissible fade show" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-exclamation-1"></i>
                        <span></span>
                    </div>
                    <div class="m-alert__text">
                        <strong>
                            Documentos de apoio :
                        </strong>
                        <a href="{{asset('storage/uploads/deposito/gestao.pdf')}}" target="_blank" > Gestão de deposito</a> , <a href="{{asset('storage/uploads/deposito/roteiro.xlsx')}}" target="_blank">Roteiro Topográfico</a>
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                {{--<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">--}}
                    {{--<div class="m-alert__icon">--}}
                        {{--<i class="flaticon-exclamation-1"></i>--}}
                        {{--<span></span>--}}
                    {{--</div>--}}
                    {{--<div class="m-alert__text">--}}
                        {{--<strong>--}}
                            {{--Atenção :--}}
                        {{--</strong>--}}
                        {{--A gestão de depósitos informa que a documentação requisitada estará disponível e poderá ser levantada entre as <strong>10h</strong> e as <strong>11h30h</strong>--}}

                    {{--</div>--}}
                    {{--<div class="m-alert__close">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--END : FORM--}}
            </div>
        </div>
        {{--BEGIN : MODAL--}}
        @include('includes.alert-modal-close')
        {{--END : MODAL--}}
@endsection