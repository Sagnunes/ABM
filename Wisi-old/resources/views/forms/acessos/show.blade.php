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
            {{$user->name}}
        @endslot
    @endcomponent
@endsection
@section('content')
    @include('forms.acessos.alert-modal-delete')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text" style="color: #564ec0; font-weight: lighter">
                                Listagem dos acessos da conta {{$user->email}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                @if($results->count()>0)
                    <!--end: Search Form -->
                        <!--begin: Datatable -->

                        <table class="m-datatable" id="html_table" width="100%">
                            <thead>

                            <tr>
                                <th title="Field #2">
                                    Modulo
                                </th>
                                <th title="Field #2">
                                    Próprios
                                </th>
                                <th title="Field #2">
                                    Outros
                                </th>
                                <th title="Field #8" class="text-center">Ações</th>

                            </tr>
                            </thead>

                            <tbody >
                            @foreach($results as $item)
                                <tr>
                                    <td >
                                        {{$item->modulo}}
                                    </td>
                                    <td >
                                        {{$item->proprios}}
                                    </td>
                                    <td >
                                        {{$item->outros}}
                                    </td>
                                    <td>
                                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill float-right" data-toggle="modal" data-target="#delete-view-{{$item->id}}" title="Apagar">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info text-center w-50 offset-2" role="alert">
                            <strong>
                                Informação!
                            </strong>
                            Utilizador escolhido não tem nenhum acesso atribuido.
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <a href="{{route('utilizadores.index')}}" type="submit" class="btn btn-info">
                                            Voltar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
                <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>

@endsection