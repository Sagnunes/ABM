@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Emolumentos
        @endslot
        @slot('route_title')
            {{route('emolumento.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('emolumento.create')}}
        @endslot
        @slot('category')
            Inserir
        @endslot
    @endcomponent
@endsection
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-open-box"></i>
												</span>
                    <h3 class="m-portlet__head-text">
                        Novo registo de emolumento
                    </h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('emolumento.store')}}" method="post">
            @csrf
            <div class="m-portlet__body">
                <div class="form-group m-form__group row ">
                    <label class="col-lg-2 col-form-label">
                        Requerente
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control m-input{{ $errors->has('requerente') ? ' is-invalid' : '' }}" name="requerente" value="{{old('requerente')}}"/>
                        @if ($errors->has('requerente'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('requerente') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <label class="col-lg-2 col-form-label">
                        Teor - Natureza do documento
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control m-input{{ $errors->has('teorDoc') ? ' is-invalid' : '' }}" name="teorDoc" value="{{old('teorDoc')}}"/>
                        @if ($errors->has('teorDoc'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('teorDoc') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <label class="col-lg-2 col-form-label">
                        Data
                    </label>
                    <div class="col-lg-3">
                        <input type="date" class="form-control m-input{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" value="{{old('data')}}"/>
                        @if ($errors->has('data'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <label class="col-lg-2 col-form-label">
                        Livro
                    </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input{{ $errors->has('livro') ? ' is-invalid' : '' }}" name="livro" value="{{old('livro')}}"/>
                        @if ($errors->has('livro'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('livro') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <label class="col-lg-2 col-form-label">
                        Cota
                    </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input{{ $errors->has('cota') ? ' is-invalid' : '' }}" name="cota" value="{{old('cota')}}"/>
                        @if ($errors->has('cota'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cota') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <label class="col-lg-2 col-form-label">
                        N.º Registo
                    </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input{{ $errors->has('registo') ? ' is-invalid' : '' }}" name="registo" value="{{old('registo')}}"/>
                        @if ($errors->has('registo'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('registo') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <label class="col-lg-2 col-form-label">
                        Folha
                    </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input{{ $errors->has('folha') ? ' is-invalid' : '' }}" name="folha" value="{{old('folha')}}"/>
                        @if ($errors->has('folha'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folha') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <label class="col-lg-2 col-form-label">
                        N.º Processo
                    </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input{{ $errors->has('processo') ? ' is-invalid' : '' }}" name="processo" value="{{old('processo')}}"/>
                        @if ($errors->has('processo'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('processo') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <label class="col-lg-2 col-form-label">
                       Ano
                    </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input{{ $errors->has('ano') ? ' is-invalid' : '' }}" name="ano" value="{{old('ano')}}"/>
                        @if ($errors->has('ano'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ano') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <label class="col-lg-2 col-form-label">
                        Pagamento
                    </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input{{ $errors->has('pagamento') ? ' is-invalid' : '' }}" name="pagamento" value="{{old('pagamento')}}" }}/>
                        @if ($errors->has('pagamento'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('pagamento') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <label class="col-lg-2 col-form-label">
                        Valor
                    </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control m-input{{ $errors->has('valor') ? ' is-invalid' : '' }}" name="valor" value="{{old('valor')}}"/>
                        @if ($errors->has('valor'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('valor') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">
                                Guardar
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
@endsection