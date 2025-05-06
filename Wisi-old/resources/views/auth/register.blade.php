@extends('layouts.app')
@section('subtitle')
    Utilizadores
@endsection
@section('subtitle-menu')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home">
            <a href="{{route('home')}}" class="m-nav__link m-nav__link--icon"> <i class="m-nav__link-icon la la-home"></i>        </a>
        </li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item">
            <a href="" class="m-nav__link">	<span class="m-nav__link-text">	Utilizadores</span> </a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item">
            <a href="" class="m-nav__link"><span class="m-nav__link-text">Inserir</span></a>
        </li>
    </ul>
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
                                Novo registo de utilizador
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >

                    <form action="{{route('utilizadores.store')}}" method="post">
                        <div class="m-portlet__body">
                            @csrf
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Nome
                                </label>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <input type="text" class="form-control m-input{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome">
                                    @if ($errors->has('nome'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                    @endif
                                    <span class="m-form__help">
														Inserir o nome
													</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Email
                                </label>
                                <div class="col-lg-6 col-md-6 col-sm-12">

                                    <input type="text" class="form-control m-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                    <span class="m-form__help">
														Inserir o email
													</span>
                                </div>
                            </div>
                            @foreach($modulos as $item)
                            <div class="form-group m-form__group row">
                                <div class="m-checkbox-list offset-2">
                                    <label class="m-checkbox m-checkbox--check-bold">
                                        <input type="checkbox" >
                                        {{$item->nome}}
                                        <span></span>
                                    </label>
                                </div>

                                <div class="col-lg-4 col-md-9 col-sm-12 offset-1" style="margin-left: auto;">
                                    <select class="form-control" name="param">
                                        <option value="">Leitura</option>
                                        <option value="">Leitura + Escrita</option>
                                        <option value="">Leitura + Escrita + Editar</option>
                                    </select>
                                </div>
                            </div>
                            @endforeach
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
                    <a href="" class="btn btn-success">Sim</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Não
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--END : MODAL--}}
@endsection