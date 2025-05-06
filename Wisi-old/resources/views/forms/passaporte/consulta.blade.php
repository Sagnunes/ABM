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
    @include('forms.passaporte.consulta-alert-modal-delete')
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
                                Detalhes do registo
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
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('passaporte.store')}}" method="post">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="container">
                            <table style="width:100%" class="table table-hover">
                                <tr>
                                    <th>N.º Caixa:</th>
                                    <td>{{$registo->numeroCaixa}}</td>
                                </tr>
                                <tr>
                                    <th>N.º Processo:</th>
                                    <td>{{$registo->numeroProcesso}}</td>
                                </tr>
                                <tr>
                                    <th>N.º Passaporte:</th>
                                    <td>{{$registo->numeroPassaporte}}</td>
                                </tr>
                                <tr>
                                    <th>Folhas:</th>
                                    <td>{{$registo->folha}}</td>
                                </tr>
                                <tr>
                                    <th>Ano:</th>
                                    <td>{{$registo->ano}}</td>
                                </tr>
                                <tr>
                                    <th>Mês:</th>
                                    <td>{{$registo->mes}}</td>
                                </tr>
                                <tr>
                                    <th>Carta de pessoal:</th>
                                    @if($registo->cartaPessoal === 1)
                                        <td>Sim, quantidade {{$registo->cartaPessoalQuantidade}}</td>
                                    @else
                                        <td>Não</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Nº de Saida</th>
                                    <td>{{$registo->numeroSaida}}</td>
                                </tr>

                                <tr>
                                    <th>Destino:</th>
                                    <td>{{$registo->destino->nome}}</td>
                                </tr>
                                <tr>
                                    <th>Requerente :</th>
                                    <td>{{$registo->requerente}}</td>
                                </tr>
                                <tr>
                                    <th>BI do requerente:</th>
                                    <td>{{$registo->bi}}</td>
                                </tr>
                                <tr>
                                    <th>Pai :</th>
                                    <td>{{$registo->requerentePai}}</td>
                                </tr>
                                <tr>
                                    <th>Mãe :</th>
                                    <td>{{$registo->requerenteMae}}</td>
                                </tr>
                                <tr>
                                    <th>Naturalidade:</th>
                                    <td>{{$registo->naturalidade->nome}}</td>
                                </tr>
                                <tr>
                                    <th>Idade :</th>
                                    <td>{{$registo->idade}}</td>
                                </tr>
                                <tr>
                                    <th>Data nascimento:</th>
                                    <td>{{$registo->dataBatismoNascimento}}</td>
                                </tr>
                                <tr>
                                    <th>Estado civil</th>
                                    <td>{{$registo->estadoCivil}}</td>
                                </tr>
                                <tr>
                                    <th>Cônjuge :</th>
                                    <td>{{$registo->conjuge}}</td>
                                </tr>
                                <tr>
                                    <th>Pai do cônjuge :</th>
                                    <td>{{$registo->conjugePai}}</td>
                                </tr>
                                <tr>
                                    <th>Mãe do cônjuge:</th>
                                    <td>{{$registo->conjugeMae}}</td>
                                </tr>
                                <tr>
                                    <th>Acompanhantes:</th>
                                    <td>
                                        @foreach($acompanhantes as $item)
                                            {{$item->categoria_acompanhante->nome}}-{{$item->nome}} <br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Observações:</th>
                                    @if(empty($registo->observacao))
                                        <td class="text-info">Sem informação</td>
                                    @else
                                        <td>{{$registo->observacao}}</td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <a href="{{url()->previous()}}" class="btn btn-outline-primary ">
														<span>
															<i class="la la-fast-backward"></i>
															<span>
																Voltar
															</span>
														</span>
                                    </a>
                                    @if (Auth::user()->acessos->where('modulo_id',4)->where('outros','>=',3)->first() || (Auth::user()->acessos->where('modulo_id',4)->where('proprios','>=',3)->first() && $item->user_id == Auth::user()->id))

                                        <a href="{{route('passaporte.edit',['id'=>$registo->id])}}" class="btn btn-outline-info ">
															<span>
																Editar
															</span>
                                        </a>
                                    @endif
                                    @if (Auth::user()->acessos->where('modulo_id',4)->where('outros','=',4)->first() || (Auth::user()->acessos->where('modulo_id',4)->where('proprios','=',4)->first() && $item->user_id == Auth::user()->id))

                                        <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete" title="Apagar">
															<span>
																Apagar
															</span>
                                        </a>
                                    @endif
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