@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Emolumentos
        @endslot
        @slot('route_title')
            {{route('emolumento.basicSearchForm')}}
        @endslot
        @slot('route_category')
            {{route('emolumento.basicSearchForm')}}
        @endslot
        @slot('category')
            Resultados
        @endslot
    @endcomponent
@endsection
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-users"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                Emolumentos
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('emolumento.pdf',['inicial'=>$inicial,'final'=>$final])}}" class="btn btn-danger m-btn btn-sm m-btn--custom m-btn--icon m-btn--pill m-btn--air" target="_blank">
														<span>
															<i class="la la-file-pdf-o"></i>
															<span>
																Gerar PDF
															</span>
														</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>
                        <tr>
                            <th title="Field #2">
                                Número
                            </th>
                            <th title="Field #3">
                                Data
                            </th>
                            <th title="Field #4">
                                Requerente
                            </th>
                            <th title="Field #5">
                                Teor Documento
                            </th>
                            <th>
                                Processo
                            </th>
                            <th title="Field #6">
                                Livro
                            </th>
                            <th title="Field #6">
                                Cota
                            </th>
                            <th title="Field #6">
                                Registo
                            </th>
                            <th title="Field #6">
                                Folha
                            </th>
                            <th title="Field #6">
                                Ano
                            </th>
                            <th title="Field #6">
                                Pagamento
                            </th>
                            <th>
                                Valor
                            </th>
                            <th>
                                Utilizador
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $item)
                            <tr>
                                <td>
                                    {{$item->id}}
                                </td>
                                <td>
                                    {{$item->data}}
                                </td>
                                <td>
                                    {{$item->requerente}}
                                </td>
                                <td>
                                    {{$item->teorDocumento}}
                                </td>
                                <td>
                                    {{$item->nProcesso}}
                                </td>
                                <td>
                                    {{$item->livro}}
                                </td>
                                <td>
                                    {{$item->cota}}
                                </td>
                                <td>
                                    {{$item->registo}}
                                </td>
                                <td>
                                    {{$item->folha}}
                                </td>
                                <td>
                                    {{$item->ano}}
                                </td>
                                <td>
                                    {{$item->pagamento}}
                                </td>
                                <td>
                                    {{$item->valor}}
                                </td>
                                <td>
                                    {{$item->utilizador}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>

@endsection