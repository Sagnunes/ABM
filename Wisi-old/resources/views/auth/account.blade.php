@extends('layouts.app')
@section('breadcrumbs')
    @component('includes.breadcrumbs')
        @slot('title')
            Dados da conta
        @endslot
        @slot('route_title')
            #
        @endslot
        @slot('route_category')
            #
        @endslot
        @slot('category')
            {{Auth::user()->name}}
        @endslot
    @endcomponent
@endsection
@section('content')

    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Your Profile
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img src="{{asset(Auth::user()->profile->imagem)}}" alt=""/>
                                </div>
                            </div>
                            <div class="m-card-profile__details">
												<span class="m-card-profile__name">
                                                        {{Auth::user()->name}}
												</span>
                                <a href="" class="m-card-profile__email m-link">
                                    {{Auth::user()->email}}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link {{ request()->is('perfil/*/') ? 'active' : ''}}"  href="{{route('utilizadores.show',['email'=>$user->email])}}" >
                                        <i class="flaticon-share m--hide"></i>
                                        Perfil
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link {{ request()->is('perfil/conta/*') ? 'active' : ''}}"  href="{{route('utilizadores.account',['email'=>$user->email])}}" >
                                        <i class="flaticon-share m--hide"></i>
                                        Conta
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('utilizadores.saveAccount',['id'=>$user->id])}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                                1. Dados da conta
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Email
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" value="{{$user->email}}" name="email" disabled>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Senha
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" >
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    Guardar
                                                </button>
                                                &nbsp;&nbsp;
                                                <a href="{{route('home') }}" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                    Voltar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection