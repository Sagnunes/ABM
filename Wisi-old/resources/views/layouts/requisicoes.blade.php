<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Arquivo regional da madeira</title>

    <!-- Styles -->
    <link href="{{asset('css/core.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/thesaas.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="icon" href="{{asset('favicon.ico')}}">
</head>

<body class="thesaas-sections-split">
<!-- Topbar -->
<nav class="topbar topbar-nav topbar-expand-md topbar-sticky">
    <div class="container">

        <div class="topbar-left">
            <button class="topbar-toggler">&#9776;</button>
            <a class="topbar-brand" href="">
                <img class="logo-default" src="{{asset('imgs/logo-Minimal.png')}}" alt="logo">
            </a>
        </div>

    </div>
</nav>
<!-- END Topbar -->
<!-- Header -->
<header class="header header-inverse" style="background-image: url({{asset('imgs/fundo-modificado.png')}})" data-overlay="2">
    <div class="container text-center">

        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2" style="height: 200px">



            </div>
        </div>

    </div>
</header>
<!-- END Header -->
<!-- Main container -->
<main class="main-content">
    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | CTA 3
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <h6 class="section-info" id="cta-3"><a href="#cta-3"></a></h6>
    <section class="section text-center">
        <div class="container">

            <div class="row">
                <div class="col-12 offset-md-3 col-md-6">

                    <br>
                    <h3 class="fw-900 mb-20">Requisição de leitura</h3>
                    <p class="lead text-muted">Página desginada a requisição de livros</p>
                    <br>
                    <a class="btn btn-lg btn-round btn-info" href="#"  data-toggle="modal" data-target="#modal-leitura">Requisitar</a>
                </div>
            </div>

        </div>
    </section>

    <section class="section text-center">
        <div class="container">

            <div class="row">
                <div class="col-12 offset-md-3 col-md-6">

                    <br>
                    <h3 class="fw-900 mb-20">Requisição de reprodução de documentos</h3>
                    <p class="lead text-muted">Página desginada a requisição de livros</p>
                    <br>
                    <a class="btn btn-lg btn-round btn-info" href="#" data-toggle="modal" data-target="#modal-documentos">Requisitar</a>
                </div>
            </div>

        </div>
    </section>

    <section class="section text-center">
        <div class="container">

            <div class="row">
                <div class="col-12 offset-md-3 col-md-6">

                    <br>
                    <h3 class="fw-900 mb-20">Autorização temporária de leitura</h3>
                    <p class="lead text-muted">Página desginada a requisição de livros</p>
                    <br>
                    <a class="btn btn-lg btn-round btn-info" href="#" data-toggle="modal" data-target="#modal-autorizacao">Criar</a>
                </div>
            </div>

        </div>
    </section>

</main>
<!-- END Main container -->
<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-12 col-lg-3">
                <p class="text-center text-lg-left">

                </p>
            </div>

            <div class="col-12 col-lg-6">

            </div>

            <p>Wisi 2018 &copy; - Todos os direitos reservados</p>
        </div>
    </div>
</footer>
<!-- END Footer -->
@include('forms.requisicoes.reproducao-modal');
@include('forms.requisicoes.leitura-modal');
@include('forms.requisicoes.autorizacao-modal');


<!-- Scripts -->
<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('js/thesaas.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
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
</html>
