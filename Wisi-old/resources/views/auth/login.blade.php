<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Wisi | Login
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="{{asset('css/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('imgs/favicon.png')}}" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
        <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside" style="min-width: 40%">
            <div class="m-stack m-stack--hor m-stack--desktop">
                <div class="m-stack__item m-stack__item--fluid">
                    <div class="m-login__wrapper">
                        <div class="m-login__logo" style="margin-top: -32%">
                            <a href="#">
                                <img src="{{asset('imgs/WISI_letring_azul.png')}}">

                            </a>
                        </div>
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">

                                </h3>
                            </div>
                            <div class="m-login__form m-form">
                                <form action="{{route('login')}}" method="post">
                                    @csrf
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" placeholder="Email" name="email" autocomplete="off" value="{{old('email')}}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input m-login__form-input--last {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="row m-login__form-sub">
                                        <div class="col m--align-left">
                                            <label class="m-checkbox m-checkbox--success">
                                                <input type="checkbox" name="remember">
                                                Lembrar-me
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col m--align-right">
                                            <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                                Esqueceu password ?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="m-login__form-action">
                                        <button  class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--air" type="submit">
                                            Entrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="m-login__signup">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    Inscrever-se
                                </h3>
                                <div class="m-login__desc">
                                    Digite seus detalhes para criar sua conta:
                                </div>
                            </div>
                            <form class="m-login__form m-form" action="{{route('register')}}" method="post">
                                @csrf
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input{{ $errors->has('name') ? ' has-error' : '' }}" type="text" placeholder="Nome" name="name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input{{ $errors->has('email') ? ' has-error' : '' }}" type="text" placeholder="Email" name="email" autocomplete="off" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input{{ $errors->has('password') ? ' has-error' : '' }}" type="password" placeholder="Password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirmar Password" name="password_confirmation">
                                </div>

                                <div class="m-login__form-action">
                                    <button class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--air">
                                        Criar
                                    </button>
                                    <button id="m_login_signup_cancel" class="btn btn-outline-success  m-btn m-btn--pill m-btn--custom" type="submit">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="m-login__forget-password">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    Esqueceu a password ?
                                </h3>
                                <div class="m-login__desc">
                                    Insira seu e-mail para redefinir sua senha:
                                </div>
                            </div>
                            <form class="m-login__form m-form" action="{{route('password.email')}}" method="post">
                                @csrf
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                                </div>
                                <div class="m-login__form-action">
                                    <button class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--air">
                                        Guardar
                                    </button>
                                    <button id="m_login_forget_password_cancel" class="btn btn-outline-success m-btn m-btn--pill m-btn--custom">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="m-stack__item m-stack__item--center">
                    <div class="m-login__account">
								<span class="m-login__account-msg">
                                    Não tem conta?
								</span>
                        &nbsp;&nbsp;
                        <a href="javascript:;" id="m_login_signup" class="m-link m-link--success m-login__account-link">
                            Criar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1 m-login__content" style="background-image: url({{asset('imgs/fundo.jpg')}})">


        </div>
    </div>
</div>
<!-- end:: Page -->
<!--begin::Base Scripts -->
<script src="{{asset('js/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('js/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="{{asset('js/login.js')}}" type="text/javascript"></script>
<!--end::Page Snippets -->
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "500",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif
    @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}");
    @endif
    @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}");
    @endif
</script>
</body>
<!-- end::Body -->
</html>
