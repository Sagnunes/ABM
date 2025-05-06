@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Casamentos
        @endslot
        @slot('route_title')
            {{route('casamento.searchForm')}}
        @endslot
        @slot('route_category')
            {{route('casamento.searchForm')}}
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
													<i class="flaticon-users"></i>
												</span>
                                <h3 class="m-portlet__head-text">
                                    Casamentos <br><span class="m-form__help text-lighter" style="text-decoration: underline">
														Alterando o registo com o número {{$registo->nRegisto}} do livro {{$registo->livro}} folha - {{$registo->folha}}
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
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('casamento.update',['id'=>$registo->id])}}" method="post">
                        @csrf
                        @method('put')
                        {{  Form::hidden('url',URL::previous())  }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" id="local">
                                    Conservatória
                                </label>
                                <div class="col-lg-5">
                                    <select class="form-control m-select2{{ $errors->has('local') ? ' is-invalid' : '' }}" id="m_select2_clear_1" name="local">
                                        <option value="{{$registo->localParoquial_id}}">{{$registo->localParoquial->nome}}</option>
                                        @if($local->count() >0)
                                            <option value=""></option>
                                            @foreach($local as $item)
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
                                    <input type="text" class="form-control m-input{{ $errors->has('livro') ? ' is-invalid' : '' }}" value="{{$registo->livro or old('livro')}}" name="livro">
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
                                    <input type="text" class="form-control m-input{{ $errors->has('folha') ? ' is-invalid' : '' }}" value="{{$registo->folha or old('folha')}}" name="folha">
                                    @if ($errors->has('folha'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folha') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Número de Registo
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input{{ $errors->has('nRegisto') ? ' is-invalid' : '' }}" name="nRegisto" value="{{$registo->nRegisto or old('nRegisto')}}">
                                    @if ($errors->has('nRegisto'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nRegisto') }}</strong>
                                    </span>
                                    @endif

                                </div>
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
                            </div>

                            <span class="m--font-info" style="margin:1%">Informações do marido :</span>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Nome
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('marido') ? ' is-invalid' : '' }}" value="{{$registo->marido  or old('marido')}}" name="marido">
                                    @if ($errors->has('marido'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('marido') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Pai
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('paiMarido') ? ' is-invalid' : '' }}" value="{{$registo->paiMarido or old('paiMarido')}}" name="paiMarido">
                                    @if ($errors->has('paiMarido'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paiMarido') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Mãe
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('maeMarido') ? ' is-invalid' : '' }}" value="{{$registo->maeMarido or old('maeMarido')}}" name="maeMarido">
                                    @if ($errors->has('maeMarido'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('maeMarido') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <span class="m--font-info" style="margin:1%">Informações da mulher :</span>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Nome
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('mulher') ? ' is-invalid' : '' }}" value="{{$registo->mulher or old('mulher')}}" name="mulher">
                                    @if ($errors->has('mulher'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mulher') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Pai
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('paiMulher') ? ' is-invalid' : '' }}" value="{{$registo->paiMulher or old('paiMulher')}}" name="paiMulher">
                                    @if ($errors->has('paiMulher'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paiMulher') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Mãe
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('maeMulher') ? ' is-invalid' : '' }}" value="{{$registo->maeMulher or old('maeMulher')}}" name="maeMulher">
                                    @if ($errors->has('maeMulher'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('maeMulher') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group m-form__group row m--margin-top-10">
                                <div class="col-lg-12 col-md-9 col-sm-12">
                                    <textarea name="observacao" class="form-control" data-provide="markdown" rows="10">{{$registo->observacao}}</textarea>
                                    <span class="m-form__help">
														observações
													</span>
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