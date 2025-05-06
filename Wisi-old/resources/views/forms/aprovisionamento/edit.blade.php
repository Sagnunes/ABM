@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Aprovisionamento
        @endslot
        @slot('route_title')
            {{route('aprovisionamento.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('aprovisionamento.basicSearchForm')}}
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
                                    Colocar pedido em processamento
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('aprovisionamento.update',['id'=>$id->aprosionamento_id])}}" method="post">
                        @csrf
                        @method('put')
                       <div class="m-portlet__body">
                           <table class="table">
                               <thead>
                               <tr>
                                   <th scope="col">Produto</th>
                                   <th scope="col">Quantidade</th>
                                   <th scope="col">Entregue</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($registos as $item)
                                   <tr>
                                       <td>{{$item->produto->nome}}</td>
                                       <td>{{$item->quantidade}}</td>
                                       <td><input type="number" name="quantidade[]" value="{{$item->quantidade_entregue}}" class="form-control" style="width: 30%;"></td>
                                       <td><input type="hidden" name="id[]" value="{{$item->id}}" class="form-control" style="width: 30%;"></td>
                                   </tr>
                               @endforeach
                               </tbody>
                           </table>
                       </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-success">
                                            Concluir
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