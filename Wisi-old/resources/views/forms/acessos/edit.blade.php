@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Acessos
        @endslot
        @slot('route_title')
            #
        @endslot
        @slot('route_category')
            #
        @endslot
        @slot('category')
            {{$registo->name}}
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
                                Está a dar acesso á : {{$registo->name}}
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >

                    <form action="{{route('acessos.update',['id'=>$registo->id])}}" method="post">
                        @csrf
                        @method('put')
                      <div class="m-portlet__body">
                          <div id="m_repeater_3">
                              <div class="form-group  m-form__group row">
                                  <label  class="col-lg-0 col-form-label">

                                  </label>
                                  <div data-repeater-list="acessos" class="col-lg-9">
                                      <div data-repeater-item class="row m--margin-bottom-10">
                                          <div class="col-lg-4">
                                              <div class="input-group">
                                                  <select name="modulo" id="" class="form-control">
                                                      @if($modulos->count() >0)
                                                         @foreach($modulos as $item)
                                                              <option value="{{$item->id}}">{{$item->nome}}</option>
                                                          @endforeach
                                                      @else
                                                          <option value="">Dados indisponiveis</option>
                                                      @endif
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-lg-3">
                                              <div class="input-group">
                                                  <input type="number" class="form-control form-control-danger" placeholder="próprios" name="proprios">
                                              </div>
                                          </div>
                                          <div class="col-lg-3">
                                              <div class="input-group">
                                                  <input type="number" class="form-control form-control-danger" placeholder="outros" name="outros">
                                              </div>
                                          </div>
                                          <div class="col-lg-2">
                                              <a href="#" data-repeater-delete="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
                                                  <i class="la la-remove"></i>
                                              </a>
                                          </div>
                                      </div>
                                  </div>


                                      <div class="col">
                                          <div data-repeater-create="" class="btn btn btn-primary m-btn m-btn--icon">
																<span>
																	<i class="la la-plus"></i>
																	<span>
																		Adicionar
																	</span>
																</span>
                                          </div>
                                      </div>

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
                </div>

                <!--end::Form-->
            </div>

            <div class="m-portlet m-portlet--collapsed m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_7">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-cogwheel-2"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Legendas
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#"  data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon">
                                    <i class="la la-angle-down"></i>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item">
                                <a href="#" data-portlet-tool="remove" class="m-portlet__nav-link m-portlet__nav-link--icon">
                                    <i class="la la-close"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="350" style="overflow:hidden; height: 300px">
                        Os acessos estão divididos em dois grupos: os próprios e os dos outros e são caraterizados por níveis.
                        <div class="m-separator m-separator--space m-separator--dashed"></div>
                        Os níveis vão de 0 a 4 , 0 não tem acesso e 4 é o acesso máximo.
                        <div class="m-separator m-separator--space m-separator--dashed"></div>
                        Legenda de cada nivel:<br><br>
                        1- Ler<br>
                        2- Editar <br>
                        3- Criar <br>
                        4- Apagar <br>

                        <div class="alert alert-info text-center offset-2" role="alert" style="width: 70%">
                            <strong>
                                Informação :
                            </strong>
                            O utilizador não pode ter mais acesso no campo "outros" do que nos próprios
                        </div>

                    </div>
                </div>
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