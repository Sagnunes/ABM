@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Processo de obras
        @endslot
        @slot('route_title')
            {{route('processoObra.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('processoObra.basicSearchForm')}}
        @endslot
        @slot('category')
            Pesquisa
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
                            <h3 class="m-portlet__head-text">
                                Pesquisa
                            </h3>

                        </div>

                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('processoObra.basicSearch')}}" method="get">
                    @csrf
                   <div class="m-portlet__body">
                       <div class="form-group m-form__group row">
                           <label class="col-lg-2 col-form-label">
                               Entidade:
                           </label>
                           <div class="col-lg-3">
                               <select class="form-control m-select2{{ $errors->has('entidade') ? ' is-invalid' : '' }}" id="m_select2_3" name="entidade">
                                   @if($entidade->count() >0)
                                       <option value=""></option>
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
                               @else
                                   <span class="m-form__help">
														Escolher a entidade
													</span>
                               @endif
                           </div>
                           <label class="col-lg-2 col-form-label">
                               Data:
                           </label>
                           <div class="col-lg-3">
                               <input type="number" class="form-control m-input" name="data">
                           </div>
                       </div>
                       <div class="form-group m-form__group row">
                           <label class="col-lg-2 col-form-label">
                               Concelho:
                           </label>
                           <div class="col-lg-3">
                               <select class="form-control m-select2{{ $errors->has('concelho') ? ' is-invalid' : '' }}" id="m_select2_2" name="concelho">
                                   <option selected></option>
                                   <option value="Não consta">Não consta</option>
                                   <option value="Calheta">Calheta</option>
                                   <option value="Camara de Lobos">Camara de Lobos</option>
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
                               @else
                                   <span class="m-form__help">
														Escolher o concelho
													</span>
                               @endif
                           </div>
                           <label class="col-lg-2 col-form-label">
                               Freguesia:
                           </label>
                           <div class="col-lg-3">
                               <select class="form-control m-select2{{ $errors->has('freguesia') ? ' is-invalid' : '' }}" id="m_select2_13" name="freguesia">
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
                               @else
                                   <span class="m-form__help">
														Escolher a freguesia
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
                                    <button type="submit" class="btn btn-info">
                                        Pesquisar
                                    </button>
                                    <a href="{{route('processoObra.advancedSearchForm')}}" class="float-right">Pesquisa</a>
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

@endsection