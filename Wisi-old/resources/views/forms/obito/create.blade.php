@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Óbitos
        @endslot
        @slot('route_title')
            {{route('obito.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('obito.create')}}
        @endslot
        @slot('category')
            Inserir
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
                                Novo registo de óbitos
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('obito.store')}}" method="post">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label" id="local">
                                Conservatória
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2{{ $errors->has('tipologia') ? ' is-invalid' : '' }}" id="m_select2_clear_1" name="local">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('local') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('local'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('local') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Livro
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input{{ $errors->has('livro') ? ' is-invalid' : '' }}" value="{{old('livro')}}" name="livro"/>
                                @if ($errors->has('livro'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('livro') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Folha
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input{{ $errors->has('folha') ? ' is-invalid' : '' }}" value="{{old('folha')}}" name="folha"/>
                                @if ($errors->has('folha'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                N.º de Registo
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input{{ $errors->has('nRegisto') ? ' is-invalid' : '' }}" name="nRegisto" value="{{old('nRegisto')}}">
                                @if ($errors->has('nRegisto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nRegisto') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <label class="col-lg-2 col-form-label">
                                N.º de Processo
                            </label>
                            <div class="col-lg-3">
                                <input type="number" class="form-control m-input{{ $errors->has('numero') ? ' is-invalid' : '' }}" id="" value="{{old('numero')}}" name="numero"/>
                                @if ($errors->has('numero'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data
                            </label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control m-input{{ $errors->has('data') ? ' is-invalid' : '' }}" value="{{old('data')}}"  name="data"/>
                                @if ($errors->has('data'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <span class="m--font-info m-2">Dados do falecido : </span>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Nome
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('nome') ? ' is-invalid' : '' }}" id="" value="{{old('nome')}}" name="nome"/>
                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Pai
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('paiFalecido') ? ' is-invalid' : '' }}" value="{{old('paiFalecido')}}" name="paiFalecido"/>
                                @if ($errors->has('paiFalecido'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paiFalecido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Mae
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('maeFalecido') ? ' is-invalid' : '' }}" value="{{old('maeFalecido')}}" name="maeFalecido"/>
                                @if ($errors->has('maeFalecido'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('maeFalecido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Estado civil
                            </label>
                            <div class="col-lg-4">
                                <select class="form-control m-select2{{ $errors->has('estadocivil') ? ' is-invalid' : '' }}" id="m_select2_clear_2" name="estadocivil">
                                    <option selected></option>
                                    <option value="1">Solteiro(a)</option>
                                    <option value="2">Casado(a)</option>
                                    <option value="3">Divorciado(a)</option>
                                    <option value="4">Viúvo(a)</option>
                                    <option value="4">Separado(a) </option>
                                </select>
                                @if ($errors->has('estadocivil'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('estadocivil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Cônjuge
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('conjuge') ? ' is-invalid' : '' }}" id="" value="{{old('conjuge')}}" name="conjuge"/>
                                @if ($errors->has('conjuge'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('conjuge') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row m--margin-top-10">
                            <label class="col-lg-2 col-form-label">
                                Observações
                            </label>
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="observacao" class="form-control" data-provide="markdown" rows="10"></textarea>
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


            {{--END : FORM--}}
        </div>
    </div>
    {{--BEGIN : MODAL--}}
    @include('includes.alert-modal-close')
    {{--END : MODAL--}}
@endsection