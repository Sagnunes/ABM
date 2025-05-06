@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Marca de água
        @endslot
        @slot('route_title')
            {{route('marcaagua.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('marcaagua.create')}}
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
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="m-portlet__head-text" style="color: #564ec0; font-weight: lighter">
                                Novo registo de marcas de água
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('marcaagua.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Tema
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('tema') ? ' is-invalid' : '' }}" value="{{old('tema')}}" name="tema"/>
                                @if ($errors->has('tema'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tema') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Sub Tema
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('subTema') ? ' is-invalid' : '' }}" value="{{old('subTema')}}" name="subTema"/>
                                @if ($errors->has('subTema'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('subTema') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Cota
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('cota') ? ' is-invalid' : '' }}" value="{{old('cota')}}" name="cota"/>
                                @if ($errors->has('cota'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cota') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <label class="col-lg-1 col-form-label">
                                Fundo
                            </label>
                            <div class="col-lg-4">
                                <select class="form-control m-select2{{ $errors->has('fundo') ? ' is-invalid' : '' }}" id="m_select2_3" name="fundo">
                                    @if($fundo->count() >0)
                                        @foreach($fundo as $item)
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
                                Resumo
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('resumo') ? ' is-invalid' : '' }}" value="{{old('resumo')}}" name="resumo">
                                @if ($errors->has('resumo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('resumo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data
                            </label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control m-input{{ $errors->has('data') ? ' is-invalid' : '' }}" value="{{old('data')}}" name="data"/>
                                @if ($errors->has('data'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <label class="col-lg-2 col-form-label">
                                Fólio
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('folio') ? ' is-invalid' : '' }}" value="{{old('folio')}}" name="folio"/>
                                @if ($errors->has('folio'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folio') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-2 col-sm-12">
                                Ficheiro
                            </label>
                            <div class="col-lg-8">
                                <input type="file" class="form-control m-input{{ $errors->has('file') ? ' is-invalid' : '' }}" value="{{old('file')}}" name="file"/>
                                @if ($errors->has('file'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group m-form__group row m--margin-top-10">
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="descricao" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" data-provide="markdown" rows="10">{{old('descricao')}}</textarea>
                                @if ($errors->has('descricao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @else
                                    <span class="m-form__help">
														inserir a descrição
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


            {{--END : FORM--}}
        </div>
    </div>
    {{--BEGIN : MODAL--}}
    @include('includes.alert-modal-close')
    {{--END : MODAL--}}
@endsection