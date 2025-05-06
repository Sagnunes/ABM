@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Qualidade
        @endslot
        @slot('route_title')
            {{route('qualidade.index')}}
        @endslot
        @slot('route_category')
            {{route('qualidade.index')}}
        @endslot
        @slot('category')
            Documentos
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
                            <h3 class="m-portlet__head-text">
                                Árvore da qualidade
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">
                    <div id="m_tree_2" class="tree-demo offset-1">
                        <ul>
                            <li data-jstree='{ "opened" : true }'>
                                Manual da qualidade
                                <ul >
                                        @foreach($manual as $item)
                                        <li data-jstree='{ "type" : "file" }'>
                                           <a href="{{$item->url}}">{{$item->grupo.' - '.$item->titulo.' - Versão: '.$item->versao}}</a>
                                        </li>
                                        @endforeach
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li data-jstree='{ "opened" : true }'>
                                Procedimentos de gestão de Qualidade
                                <ul >
                                    <li data-jstree='{ "opened" : false }'>
                                        <a href="">PGQ 01</a>
                                        <ul>
                                            @foreach($pgq_1 as $item)
                                                <li data-jstree='{ "type" : "file" }'>
                                                   <a href="{{$item->url}}">{{$item->grupo.' - '.$item->titulo.' - Versão: '.$item->versao}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "opened" : false }'>
                                        <a href="">PGQ 02</a>
                                        <ul>
                                            @foreach($pgq_2 as $item)
                                                <li data-jstree='{ "type" : "file" }'>
                                                   <a href="{{$item->url}}">{{$item->grupo.' - '.$item->titulo.' - Versão: '.$item->versao}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "opened" : false }'>
                                        <a href="">PGQ 03</a>
                                        <ul>
                                            @foreach($pgq_3 as $item)
                                                <li data-jstree='{ "type" : "file" }'>
                                                   <a href="{{$item->url}}">{{$item->grupo.' - '.$item->titulo.' - Versão: '.$item->versao}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "opened" : false }'>
                                        <a href="">PGQ 04</a>
                                        <ul>
                                            @foreach($pgq_4 as $item)
                                                <li data-jstree='{ "type" : "file" }'>
                                                    <a href="{{$item->url}}">{{$item->grupo.' - '.$item->titulo.' - Versão: '.$item->versao}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "opened" : false }'>
                                        <a href="">PGQ 05</a>
                                        <ul>
                                            @foreach($pgq_5 as $item)
                                                <li data-jstree='{ "type" : "file" }'>
                                                   <a href="{{$item->url}}">{{$item->grupo.' - '.$item->titulo.' - Versão: '.$item->versao}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "opened" : false }'>
                                        <a href="">PGQ 06</a>
                                        <ul>
                                            @foreach($pgq_6 as $item)
                                                <li data-jstree='{ "type" : "file" }'>
                                                   <a href="{{$item->url}}">{{$item->grupo.' - '.$item->titulo.' - Versão: '.$item->versao}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "opened" : false }'>
                                        <a href="">PGQ 07</a>
                                        <ul>
                                            @foreach($pgq_7 as $item)
                                                <li data-jstree='{ "type" : "file" }'>
                                                   <a href="{{$item->url}}">{{$item->grupo.' - '.$item->titulo.' - Versão: '.$item->versao}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
