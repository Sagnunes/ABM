@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Passaportes
        @endslot
        @slot('route_title')
            {{route('passaporte.advancedSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('passaporte.advancedSearchForm')}}
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
													<i class="flaticon-interface-5"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Passaportes <br><span class="m-form__help text-lighter" style="text-decoration: underline">
														Alterando o registo com o número de processo {{$registo->numeroProcesso}}
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
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('passaporte.update',['id'=>$registo->id])}}" method="post">
                    @csrf
                    @method('put')
                    {{  Form::hidden('url',URL::previous())  }}
                    <div class="m-portlet__body">

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Caixa
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('caixa') ? ' is-invalid' : '' }}" value="{{$registo->numeroCaixa or old('caixa')}}" name="caixa"/>
                                @if ($errors->has('caixa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('caixa') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Processo
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('processo') ? ' is-invalid' : '' }}" value="{{$registo->numeroProcesso or  old('processo')}}" name="processo"/>
                                @if ($errors->has('processo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('processo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Passaporte
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('passaporte') ? ' is-invalid' : '' }}" value="{{$registo->numeroPassaporte or  old('passaporte')}}" name="passaporte"/>
                                @if ($errors->has('passaporte'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('passaporte') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Folhas
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('folha') ? ' is-invalid' : '' }}" value="{{$registo->folha or  old('folha')}}" name="folha"/>
                                @if ($errors->has('folha'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Ano
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('ano') ? ' is-invalid' : '' }}" value="{{$registo->ano or  old('ano')}}" name="ano"/>
                                @if ($errors->has('ano'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ano') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Mês
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2 {{ $errors->has('mes') ? ' is-invalid' : '' }}" id="m_select2_clear_2" name="mes">
                                    @if($meses->count() >0)
                                        @if(!empty($registo->mes))
                                            <option value="{{$registo->mes}}">{{$registo->meses->nome}}</option>
                                        @else
                                            <option value=""></option>
                                        @endif
                                        @foreach($meses as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('mes') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('mes'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label" id="local">
                                Nº de saída
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2 {{ $errors->has('numeroSaida') ? ' is-invalid' : '' }}" id="m_select2_clear_7" name="numeroSaida">
                                    <option value="{{$registo->numeroSaida}}">{{$registo->numeroSaida}}</option>
                                    <option value="0">0</option>
                                    <option value="1">1. ª</option>
                                    <option value="2">2. ª</option>
                                    <option value="Outras">Outras</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label" id="local">
                                Destino
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('destino') ? ' is-invalid' : '' }}" id="m_select2_clear_3" name="destino">
                                    <option value="{{$registo->destino_id}}">{{$registo->destino->nome}}</option>
                                    @if($destino->count() >0)
                                        <option value=""></option>
                                        @foreach($destino as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('destino') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('naturalidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('destino') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <span class="m--font-info ">Dados do requerente :</span>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Requerente
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('requerente') ? ' is-invalid' : '' }}" value="{{$registo->requerente or old('requerente')}}" name="requerente"/>
                                @if ($errors->has('requerente'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('requerente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label" id="local">
                                BI
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('bi') ? ' is-invalid' : '' }}" value="{{$registo->bi or old('bi')}}" name="bi"/>
                                @if ($errors->has('bi'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label" id="local">
                                Pai
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('requerentePai') ? ' is-invalid' : '' }}" value="{{$registo->requerentePai or  old('requerentePai')}}" name="requerentePai"/>
                                @if ($errors->has('requerentePai'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('requerentePai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Mãe
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('requerenteMae') ? ' is-invalid' : '' }}" value="{{$registo->requerenteMae or  old('requerenteMae')}}" name="requerenteMae"/>
                                @if ($errors->has('requerenteMae'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('requerenteMae') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Naturalidade
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2 {{ $errors->has('naturalidade') ? ' is-invalid' : '' }}" id="m_select2_clear_4" name="naturalidade">
                                    <option value="{{$registo->naturalidade_id}}">{{$registo->naturalidade->nome}}</option>
                                    @if($naturalidade->count() >0)
                                        @foreach($naturalidade as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('naturalidade') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('naturalidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('naturalidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Idade
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('idade') ? ' is-invalid' : '' }}" value="{{$registo->idade or old('idade')}}" name="idade"/>
                                @if ($errors->has('idade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('idade') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label" id="local">
                                Data Nascimento
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('data') ? ' is-invalid' : '' }}" value="{{$registo->dataBatismoNascimento or old('data')}}" name="data" placeholder="YYYY-MM-DD"/>
                                @if ($errors->has('data'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-grup m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Estado Civil
                            </label>
                            <div class="col-lg-5">
                                <select class="form-control m-select2{{ $errors->has('estadoCivil') ? ' is-invalid' : '' }}" id="m_select2_clear_5" name="estadoCivil">
                                    <option value="{{$registo->estadoCivil}}">{{$registo->estadoCivil}}</option>
                                    <option value="Não consta">Não consta</option>
                                    <option value="Solteiro(a)">Solteiro(a)</option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                    <option value="Viúvo(a)">Viúvo(a)</option>
                                    <option value="Separado(a)">Separado(a)</option>
                                </select>
                                @if ($errors->has('estadoCivil'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('estadoCivil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Cônjuge
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('conjuge') ? ' is-invalid' : '' }}" value="{{$registo->conjuge or old('conjuge')}}" name="conjuge">
                                @if ($errors->has('conjuge'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('conjuge') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <span class="m--font-info">Dados do cônjuge :</span>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label" id="local">
                                Pai
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('conjugePai') ? ' is-invalid' : '' }}" value="{{$registo->conjugePai or old('conjugePai')}}" name="conjugePai"/>
                                @if ($errors->has('conjugePai'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('conjugePai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Mãe
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('conjugeMae') ? ' is-invalid' : '' }}" value="{{$registo->conjugeMae or old('conjugeMae')}}" name="conjugeMae"/>
                                @if ($errors->has('conjugeMae'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('conjugeMae') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <span class="m--font-info">Acompanhante : </span>
                        @if($acompanhantes->count() > 0 )
                            @foreach($acompanhantes as $value)
                                <div class="form-group m-form__group row">
                                    <input name="id[]" type="hidden" value="{{$value->id}}">
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <select name="categoriaAcompanhante[]" class="custom-select">
                                                <option value="{{$value->categoria_id}}">{{$value->categoria_acompanhante->nome}}</option>
                                                @if($categoria->count() >0)
                                                    @foreach($categoria as $item)
                                                        @if (\Illuminate\Support\Facades\Input::old('categoria') == $item->id)
                                                            <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="">ERRO 404!</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-danger" placeholder="Nome" name="nomeAcompanhante[]" value="{{$value->nome}}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div id="m_repeater_3" style="margin-top: 1%">
                            <div class="form-group  m-form__group row">
                                <div data-repeater-list="acompanhante" class="col-lg-12">
                                    <div data-repeater-item class="row m--margin-bottom-10">
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <select name="categoria" class="custom-select">
                                                    @if($categoria->count() >0)
                                                        <option value=""></option>
                                                        @foreach($categoria as $item)
                                                            @if (\Illuminate\Support\Facades\Input::old('categoria') == $item->id)
                                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                            @else
                                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">ERRO 404!</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-danger" placeholder="Nome" name="nomeAcompanhante">
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <a href="#" data-repeater-delete="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
                                                <i class="la la-remove"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col">
                                    <div data-repeater-create="" class="btn btn btn-primary m-btn m-btn--icon">
																<span>
																	<i class="la la-plus"></i>
																	<span>
																		Novo
																	</span>
																</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Carta pessoal
                        </label>
                        <div class="col-lg-3">
                            <select class="form-control m-select2 {{ $errors->has('cartaPessoal') ? ' is-invalid' : '' }}" id="m_select2_clear_1" name="cartaPessoal">
                                @if($registo->cartaPessoal === 1)
                                    <option value="{{$registo->cartaPessoal}}">Sim</option>
                                    <option value="0">Não</option>
                                @elseif($registo->cartaPessoal === 0)
                                    <option value="{{$registo->cartaPessoal}}">Não</option>
                                    <option value="1">Sim</option>
                                @else
                                    <option value=""></option>
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                @endif
                            </select>
                            @if ($errors->has('cartaPessoal'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cartaPessoal') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <label class="col-lg-2 col-form-label" id="local">
                            C. Pessoal Quantidade
                        </label>
                        <div class="col-lg-3">
                            <select class="form-control m-select2 {{ $errors->has('cartaPessoalQuantidade') ? ' is-invalid' : '' }}" id="m_select2_clear_6" name="cartaPessoalQuantidade">
                                <option value="{{$registo->cartaPessoalQuantidade}}">{{$registo->cartaPessoalQuantidade}}</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @if ($errors->has('cartaPessoalQuantidade'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cartaPessoalQuantidade') }}</strong>
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