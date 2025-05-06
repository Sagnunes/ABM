@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Processos de Qualidade
        @endslot
        @slot('route_title')
            #
        @endslot
        @slot('route_category')
            #
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
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Editar o registo : {{$results->tipo}}
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >

                    <form action="{{route('processo.update',['id'=>$results->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Nome
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{$results->tipo}}">
                                    @if ($errors->has('nome'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
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
                                            Alterar
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#m_modal_1">
                                            Fechar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--end::Form-->
            </div>


            {{--END : FORM--}}
        </div>
    </div>
    {{--BEGIN : MODAL--}}
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title m--font-danger " id="exampleModalLabel">
                        Atenção!
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                    </button>
                </div>
                <div class="modal-body m--font-bolder text-center">
                    <h3>
                        Tem a certeza que quer fechar?
                    </h3> <h4>pode perder os dados inseridos?</h4>

                </div>
                <div class="modal-footer">
                    <a href="{{route('processo.index')}}" class="btn btn-success">Sim</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Não
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--END : MODAL--}}
@endsection