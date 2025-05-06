@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Notáriais
        @endslot
        @slot('route_title')
            {{route('notariais.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('notariais.basicSearchForm')}}
        @endslot
        @slot('category')
            Editar
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
													<i class="flaticon-folder-2"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Notariais <br><span class="m-form__help text-lighter" style="text-decoration: underline">
														Alterando o registo com o número {{$registo->id}}
													</span>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{url()->previous()}}" class="btn btn-outline-primary m-btn btn-sm m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-fast-backward"></i>
															<span>
																Voltar
															</span>
														</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('notariais.update',['id'=>$registo->id])}}" method="post">
                   @csrf
                    @method('put')
                    {{  Form::hidden('url',URL::previous())  }}
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data
                            </label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control m-input{{ $errors->has('data') ? ' is-invalid' : '' }}" value="{{$registo->data or old('data')}}" name="data"/>
                                @if ($errors->has('data'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Cota original
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('cota') ? ' is-invalid' : '' }}"  value="{{$registo->cotaAntiga or old('cota')}}" name="cota"/>
                                @if ($errors->has('cota'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label" id="local">
                                Cartório
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('cartorio') ? ' is-invalid' : '' }}" id="m_select2_clear_1" name="cartorio">
                                    @if($cartorio->count() >0)
                                        <option value="{{$registo->cartorio_id}}">{{$registo->cartorio->nome}}</option>
                                        @foreach($cartorio as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('cartorio') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('cartorio'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cartorio') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Notário
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('notario') ? ' is-invalid' : '' }}" id="m_select2_clear_2" name="notario">
                                    @if($notario->count() >0)
                                        <option value="{{$registo->notario_id}}">{{$registo->notario->nome}}</option>
                                        @foreach($notario as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('notario') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('notario'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('notario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Livro
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('livro') ? ' is-invalid' : '' }}" value="{{$registo->livro or old('livro')}}" name="livro"/>
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
                                <input type="text" class="form-control m-input{{ $errors->has('folha') ? ' is-invalid' : '' }}" value="{{$registo->folha or old('folha')}}" name="folha"/>
                                @if ($errors->has('folha'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row m--margin-top-10">
                            <label class="col-lg-2 col-form-label">
                                Tipologia
                            </label>
                            <div class="col-lg-8">
                                <select class="form-control m-select2{{ $errors->has('tipologia') ? ' is-invalid' : '' }}" id="m_select2_clear_3" name="tipologia">
                                    @if($tipologia->count() >0)
                                        <option value="{{$registo->tipologiaNotario_id}}">{{$registo->tipologia->nome}}</option>
                                        @foreach($tipologia as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('tipologia') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('tipologia'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tipologia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <label class="col-lg-3 col-form-label">
                                1.º Outorgante
                            </label>
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="outorgante" class="form-control{{ $errors->has('outorgante') ? ' is-invalid' : '' }}" data-provide="markdown" rows="7">{{$registo->outorgante or old('outorgante')}}</textarea>
                                @if ($errors->has('outorgante'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('outorgante') }}</strong>
                                    </span>
                                @else

                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label class="col-lg-3 col-form-label">
                                Outros Outorgante
                            </label>
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="outros" class="form-control{{ $errors->has('outros') ? ' is-invalid' : '' }}" data-provide="markdown" rows="7">{{$registo->outros or old('outros')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                                Objeto Transicional
                            </label>
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="objTrans" class="form-control{{ $errors->has('objTrans') ? ' is-invalid' : '' }}" data-provide="markdown" rows="7">{{$registo->objTrans or old('objTrans')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row m--margin-top-10">
                            <label class="col-lg-3 col-form-label">
                                Observações
                            </label>
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="observacao" class="form-control{{ $errors->has('observacao') ? ' is-invalid' : '' }}" data-provide="markdown" rows="10">{{$registo->observacao or old('observacao')}}</textarea>
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