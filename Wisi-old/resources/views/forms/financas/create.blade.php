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
            {{route('financas.create')}}
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
													<i class="flaticon-piggy-bank"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Novo registo de sucessões e doações
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('financas.store')}}" method="post">
                    @csrf
                    <div class="m-portlet__body">

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                N.º Caixa
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('caixa') ? ' is-invalid' : '' }}"  value="{{old('caixa')}}" name="caixa"/>
                                @if ($errors->has('caixa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('caixa') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label">
                                N.º Capilha
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('capilha') ? ' is-invalid' : '' }}" value="{{old('capilha')}}" name="capilha"/>
                                @if ($errors->has('capilha'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('capilha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                N.º Processo
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('processo') ? ' is-invalid' : '' }}"  value="{{old('processo')}}" name="processo"/>
                                @if ($errors->has('processo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('processo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Entidade
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('entidade') ? ' is-invalid' : '' }}" id="m_select2_clear_1" name="entidade">
                                    <option value=""></option>
                                    <option value="1º Repartição de Finanças da Calheta">1º Repartição de Finanças da Calheta</option>
                                    <option value="1º Repartição de Finanças da Câmara de Lobos">1º Repartição de Finanças da Câmara de Lobos</option>
                                    <option value="1º Repartição de Finanças do Funchal">1º Repartição de Finanças do Funchal</option>
                                    <option value="2º Repartição de Finanças do Funchal">2º Repartição de Finanças do Funchal</option>
                                    <option value="1º Repartição de Finanças de Machico">1º Repartição de Finanças de Machico</option>
                                    <option value="1º Repartição de Finanças da Ponta de Sol">1º Repartição de Finanças da Ponta de Sol</option>
                                    <option value="1º Repartição de Finanças do Porto Moniz">1º Repartição de Finanças do Porto Moniz</option>
                                    <option value="1º Repartição de Finanças do Porto Santo">1º Repartição de Finanças do Porto Santo</option>
                                    <option value="1º Repartição de Finanças da Ribeira Brava">1º Repartição de Finanças da Ribeira Brava</option>
                                    <option value="1º Repartição de Finanças de Santa Cruz">1º Repartição de Finanças de Santa Cruz</option>
                                    <option value="1º Repartição de Finanças de Santana">1º Repartição de Finanças de Santana</option>
                                    <option value="1º Repartição de Finanças de São Vicente">1º Repartição de Finanças de São Vicente</option>
                                </select>
                                @if ($errors->has('entidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('entidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Tipo processo
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('tipo') ? ' is-invalid' : '' }}" id="m_select2_clear_2" name="tipo">
                                    <option value=""></option>
                                    <option value="Sucessões">Sucessões</option>
                                    <option value="Doação">Doação</option>
                                    <option value="Outro">Outro</option>
                                </select>
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Nome
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('nome') ? ' is-invalid' : '' }}"  value="{{old('nome')}}" name="nome"/>
                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Estado Civil
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('estadoCivil') ? ' is-invalid' : '' }}" id="m_select2_clear_3" name="estadoCivil">
                                    <option value=""></option>
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
                                Morada
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control m-input{{ $errors->has('morada') ? ' is-invalid' : '' }}"  value="{{old('morada')}}" name="morada"/>
                                @if ($errors->has('morada'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('morada') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Freguesia
                            </label>
                            <div class="col-lg-3">
                                <select class="form-control m-select2{{ $errors->has('freguesia') ? ' is-invalid' : '' }}" id="m_select2_clear_4" name="freguesia">
                                    @if($freguesia->count() >0)
                                        <option value=""></option>
                                        @foreach($freguesia as $item)
                                            @if (\Illuminate\Support\Facades\Input::old('freguesia') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">ERRO 404!</option>
                                    @endif
                                </select>
                                @if ($errors->has('freguesia'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('freguesia') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label">
                               Data Óbito
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('obito') ? ' is-invalid' : '' }}"  value="{{old('obito')}}" name="obito"/>
                                @if ($errors->has('obito'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('obito') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Data inicial <br>(instauração)
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('inicial') ? ' is-invalid' : '' }}"  value="{{old('inicial')}}" name="inicial"/>
                                @if ($errors->has('inicial'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inicial') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Data final <br> (liquidação)
                            </label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input{{ $errors->has('final') ? ' is-invalid' : '' }}" value="{{old('final')}}" name="final"/>
                                @if ($errors->has('final'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('final') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row m--margin-top-10">
                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="observacao" class="form-control" data-provide="markdown" rows="10"></textarea>
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