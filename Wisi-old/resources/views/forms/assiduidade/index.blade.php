@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Assiduidade
        @endslot
        @slot('route_title')

        @endslot
        @slot('route_category')
            @if(Auth::user()->permissao_for_template(13,4))
             {{route('assiduidade.basicSearchForm')}}
            @else 
             {{route('assiduidade.userSearchForm')}}            
        @endif    
        @endslot
        @slot('category')
        @if(Auth::user()->permissao_for_template(13,4))
            Pesquisar novamente
            @else 
            Consulta
        @endif    
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
        <a href="{{route('assiduidade.basicSearchForm')}}" class="m-nav__link">
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
												<span class="m-portlet__head-icon">
													<i class="flaticon-calendar-3"></i>
												</span>
                    <h3 class="m-portlet__head-text">
                       Assiduidade
                    </h3>
                </div>
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
                            <td style="clear: both;">
                                <span style="font-weight: bold; "> {{date('Y-m-d', strtotime($dado->datahora))}}</span> 
                            </td>                
                            <td style="clear: both;">
                        @endif
                            @if ($dado->evento=='entrada')
                            <a href="#" style="text-decoration:none; pointer-events: none;
                             cursor: default;border-radius:10px; border: 2px solid green;background-color: green;
                             justify-content: center; color: white; padding: 2px 2px 2px 2px; margin-right:1px;">{{date('H:i', strtotime($dado->datahora))}}</a>
                            @else
                            <a href="#" style="text-decoration:none; pointer-events: none;
                            cursor: default;border-radius:10px; border: 2px solid red;background-color: red;
                            color: white;justify-content: center; margin-right:1px; padding: 2px 2px 2px 2px;">{{date('H:i', strtotime($dado->datahora))}}</a>
                            @endif
                    @endforeach
                </tbody>
            </table>
            <br>
            <p> Dados atualizados até {{$data->lastData}} </p>
            <!--end: Datatable -->
        </div>
    </div>
</div>
@endsection