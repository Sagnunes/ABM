@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Aprovisionamento
        @endslot
        @slot('route_title')
            {{route('aprovisionamento.create')}}
        @endslot
        @slot('route_category')
            {{route('aprovisionamento.create')}}
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
													<i class="flaticon-truck"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Nova requisição
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right " action="{{route('aprovisionamento.store')}}" method="post">
                    @csrf
                    <div class="m-portlet__body">

                        {{--<div id="m_repeater_3">--}}
                            {{--<div class="form-group  m-form__group row">--}}
                                {{--<label  class="col-lg-0 col-form-label">--}}

                                {{--</label>--}}
                                {{--<div data-repeater-list="aprosionamento" class="col-lg-9">--}}
                                    {{--<div data-repeater-item class="row m--margin-bottom-10">--}}
                                        {{--<div class="col-lg-7">--}}
                                            {{--<div class="input-group">--}}
                                                {{--<select name="produto"  class="form-control custom-select">--}}
                                                    {{--<option value="">Selecione uma opção</option>--}}
                                                    {{--@if($registos->count() > 0)--}}
                                                        {{--@foreach($registos as $item)--}}
                                                                {{--<option value="{{$item->id}}">{{$item->nome}}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--@else--}}
                                                        {{--<option value="">ERRO 404!</option>--}}
                                                    {{--@endif--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-3">--}}
                                            {{--<div class="input-group">--}}

                                                {{--<input type="number" class="form-control form-control-danger" placeholder="Quantidade" name="quantidade">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-2">--}}
                                            {{--<a href="#" data-repeater-delete="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">--}}
                                                {{--<i class="la la-remove"></i>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-lg-3"></div>--}}
                                {{--<div class="col">--}}
                                    {{--<div data-repeater-create="" class="btn btn btn-primary m-btn m-btn--icon">--}}
																{{--<span>--}}
																	{{--<i class="la la-plus"></i>--}}
																	{{--<span>--}}
																		{{--Adicionar--}}
																	{{--</span>--}}
																{{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group m-form__group row">
                            <label class="col-lg-1 col-form-label">
                                Produtos
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_1" name="produtos[]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                                <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg- col-form-label">
                                Quantidade :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" value="{{ old('quantidade')}}" name="quantidade[]"/>
                                @if ($errors->has('quantidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-1 col-form-label">
                                Produtos
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_2" name="produtos[]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg- col-form-label">
                                Quantidade :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" value="{{ old('quantidade')}}" name="quantidade[]"/>
                                @if ($errors->has('quantidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-1 col-form-label">
                                Produtos
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_3" name="produtos[]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg- col-form-label">
                                Quantidade :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" value="{{ old('quantidade')}}" name="quantidade[]"/>
                                @if ($errors->has('quantidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-1 col-form-label">
                                Produtos
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_4" name="produtos[]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg- col-form-label">
                                Quantidade :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" value="{{ old('quantidade')}}" name="quantidade[]"/>
                                @if ($errors->has('quantidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-1 col-form-label">
                                Produtos
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_12" name="produtos[]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg- col-form-label">
                                Quantidade :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" value="{{ old('quantidade')}}" name="quantidade[]"/>
                                @if ($errors->has('quantidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-1 col-form-label">
                                Produtos
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_13" name="produtos[]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg- col-form-label">
                                Quantidade :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" value="{{ old('quantidade')}}" name="quantidade[]"/>
                                @if ($errors->has('quantidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-1 col-form-label">
                                Produtos
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_14" name="produtos[]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg- col-form-label">
                                Quantidade :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" value="{{ old('quantidade')}}" name="quantidade[]"/>
                                @if ($errors->has('quantidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-1 col-form-label">
                                Produtos
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_15" name="produtos[]">
                                    @if($registos->count() >0)
                                        <option value=""></option>
                                        @foreach($registos as $item)
                                            <option value="{{$item->id}}">{{$item->nome}}</option>
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg- col-form-label">
                                Quantidade :
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" value="{{ old('quantidade')}}" name="quantidade[]"/>
                                @if ($errors->has('quantidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row m--margin-top-10">
                            <label class="col-lg- col-form-label">
                                Observações :
                            </label>
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="observacao" class="form-control" data-provide="markdown" rows="4"></textarea>
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


            {{--END : FORM--}}
        </div>
    </div>
    {{--BEGIN : MODAL--}}
    @include('includes.alert-modal-close')
    {{--END : MODAL--}}
@endsection