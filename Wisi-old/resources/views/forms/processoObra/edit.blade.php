@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Processo de obras
        @endslot
        @slot('route_title')
            {{route('processoObra.advancedSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('processoObra.advancedSearchForm')}}
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
													<i class="flaticon-suitcase"></i>
												</span>
                                <h3 class="m-portlet__head-text">
                                   Editando o registo
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('processoObra.update',['id'=>$registo->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Cota
                                </label>
                                <div class="col-lg-3">
                                    <input type="number" class="form-control m-input{{ $errors->has('cota') ? ' is-invalid' : '' }}" value="{{$registo->cota or old('cota')}}" name="cota"/>
                                    @if ($errors->has('cota'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cota') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-lg-2 col-form-label">
                                    N.º documento
                                </label>
                                <div class="col-lg-3">
                                    <input type="number" class="form-control m-input{{ $errors->has('documento') ? ' is-invalid' : '' }}" value="{{$registo->numero_documento or old('documento')}}" name="documento"/>
                                    @if ($errors->has('documento'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    N.º Volume
                                </label>
                                <div class="col-lg-3">
                                    <input type="number" class="form-control m-input{{ $errors->has('volume') ? ' is-invalid' : '' }}" value="{{$registo->volume or old('volume')}}" name="volume"/>
                                    @if ($errors->has('volume'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('volume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-lg-2 col-form-label">
                                    N.º Projeto
                                </label>
                                <div class="col-lg-3">
                                    <input type="number" class="form-control m-input{{ $errors->has('projeto') ? ' is-invalid' : '' }}" value="{{$registo->numero_projeto or old('projeto')}}" name="projeto"/>
                                    @if ($errors->has('projeto'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('projeto') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Entidade
                                </label>
                                <div class="col-lg-8">
                                    <select class="form-control m-select2{{ $errors->has('entidade') ? ' is-invalid' : '' }}" id="m_select2_clear_1" name="entidade">
                                        @if($entidade->count() >0)
                                            <option value="{{$registo->entidade_id}}">{{$registo->entidade->nome}}</option>
                                            @foreach($entidade as $item)
                                                @if (\Illuminate\Support\Facades\Input::old('entidade') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">ERRO 404!</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('entidade'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('entidade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
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
                                    Tipo obra
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input{{ $errors->has('tipo_obra') ? ' is-invalid' : '' }}" value="{{$registo->tipo_obra or old('tipo_obra')}}" name="tipo_obra"/>
                                    @if ($errors->has('tipo_obra'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tipo_obra') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Objeto
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('objeto') ? ' is-invalid' : '' }}" name="objeto" value="{{$registo->objeto or old('objeto')}}">
                                    @if ($errors->has('objeto'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('objeto') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Concelho
                                </label>
                                <div class="col-lg-3">
                                    <select class="form-control m-select2{{ $errors->has('concelho') ? ' is-invalid' : '' }}" id="m_select2_clear_2" name="concelho">
                                        <option value="{{$registo->concelho}}">{{$registo->concelho}}</option>
                                        <option value="Não consta">Não consta</option>
                                        <option value="Calheta">Calheta</option>
                                        <option value="Camara de Lobos">Câmara de Lobos</option>
                                        <option value="Funchal">Funchal</option>
                                        <option value="Machico">Machico</option>
                                        <option value="Ponta do Sol">Ponta do Sol</option>
                                        <option value="Porto Moniz">Porto Moniz</option>
                                        <option value="Porto Santo">Porto Santo</option>
                                        <option value="Ribeira Brava">Ribeira Brava</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                        <option value="Santana">Santana</option>
                                        <option value="São Vicente">São Vicente</option>
                                    </select>
                                    @if ($errors->has('concelho'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('concelho') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label class="col-lg-2 col-form-label">
                                    Freguesia
                                </label>
                                <div class="col-lg-3">
                                    <select class="form-control m-select2{{ $errors->has('freguesia') ? ' is-invalid' : '' }}" id="m_select2_clear_3" name="freguesia">
                                        @if($freguesia->count() >0)
                                            <option value="{{$registo->freguesia_id}}">{{$registo->freguesia->nome}}</option>
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
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Sítio
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('sitio') ? ' is-invalid' : '' }}" name="sitio" value="{{$registo->sitio or old('sitio')}}">
                                    @if ($errors->has('sitio'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sitio') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Localização
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('localizacao') ? ' is-invalid' : '' }}" name="localizacao" value="{{$registo->localizacao or old('localizacao')}}">
                                    @if ($errors->has('localizacao'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('localizacao') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12 col-md-9 col-sm-12">
                                    <label class="col-lg-2 col-form-label">
                                        Observações :
                                    </label>
                                    <textarea name="observacao" class="form-control" data-provide="markdown" rows="10">{{$registo->observacao or old('observacao')}}</textarea>
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