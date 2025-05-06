@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Assiduidade
        @endslot
        @slot('route_title')

        @endslot
        @slot('route_category')

        @endslot
        @slot('category')
            Pesquisa
        @endslot
    @endcomponent
@endsection
@section('subtitle-menu')
<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
    <li class="m-nav__item m-nav__item--home">
        <a href="#" class="m-nav__link m-nav__link--icon">
            <i class="m-nav__link-icon la la-home"></i>
        </a>
    </li>
    <li class="m-nav__separator">
        -
    </li>
    <li class="m-nav__item">
        <a href="#" class="m-nav__link">
            <span class="m-nav__link-text">
                Pesquisar novamente
            </span>
        </a>
    </li>
</ul>
@endsection
<!-- END: Subheader -->
@section('content')
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                <i class="la la-ellipsis-h m--font-brand"></i>
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__section m-nav__section--first">
                                                    <span class="m-nav__section-text">
                                                        Quick Actions
                                                    </span>
                                                </li>
                                                
                                                <li class="m-nav__item">
                                                    <a href="" class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-share"></i>
                                                        <span class="m-nav__link-text">
                                                            Create Post
                                                        </span>
                                                    </a>
                                                </li>
                                                
                                                <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                                <li class="m-nav__item m--hide">
                                                    <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                        Submit
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Filtrar..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <table class="m-datatable" id="html_table" width="100%">
                <thead>
                    <tr>
                        <th title="">
                            Data
                        </th>
                        <th title="">
                            Eventos
                        </th>
                      </tr>
                </thead>
                <tbody>
                    <?php $dataatual=''?>
                    @foreach($dados as $dado)
                        @if(date('Y-m-d', strtotime($dataatual)) != date('Y-m-d', strtotime($dado->datahora)))
                            @if($dataatual!='')
                                </td>
                            </tr>
                            @endif
                        <?php $dataatual=date('Y-m-d', strtotime($dado->datahora)) ?>
                        <tr>
                            <td style="text-align: justify;">
                                <span style="font-weight: bold; "> {{date('Y-m-d', strtotime($dado->datahora))}}</span> 
                            </td>                
                            <td style="text-align: justify;">
                        @endif
                            @if ($dado->evento=='entrada')
                            <span style="color:green; display: inline-block; font-weight:bold; "> {{date('H:i', strtotime($dado->datahora))}} </span>
                            @else
                            <span style="color:red; display: inline-block;font-weight:bold;"> {{date('H:i', strtotime($dado->datahora))}} </span>
                            @endif
                    @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <p> Dados atualizados até </p>
            <!--end: Datatable -->
        </div>
    </div>
</div>
@endsection