<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
    <!-- BEGIN: Aside Menu -->
    <div
            id="m_ver_menu"
            class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light "
            data-menu-vertical="true"
            data-menu-scrollable="false" data-menu-dropdown-timeout="500"
    >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            @include('includes.modulos.painel-controlo')
            @if(Auth::user()->permissao_modulo(17))
                @include('includes.modulos.noticias')
                @include('forms.noticias.create-modal')
            @endif
            {{--<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">--}}
                {{--<a  href="{{route('qualidade.index')}}" class="m-menu__link m-menu__toggle">--}}
                    {{--<i class="m-menu__link-icon flaticon-list-1"></i>--}}
                    {{--<span class="m-menu__link-text">--}}
										{{--Qualidade--}}
									{{--</span>--}}
                    {{--<i class="m-menu__ver-arrow la la-angle-right"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            @if(Auth::user()->permissao_modulo(1) || Auth::user()->permissao_modulo(2) || Auth::user()->permissao_modulo(3) || Auth::user()->permissao_modulo(4) || Auth::user()->permissao_modulo(5) || Auth::user()->permissao_modulo(6) || Auth::user()->permissao_modulo(2))
                <li class="m-menu__section">
                    <h4 class="m-menu__section-text">
                        Arquivo
                    </h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
            @endif
            {{--Modulo dos nascimentos--}}
            @if(Auth::user()->permissao_modulo(1))
                @include('includes.modulos.nascimentos')
            @endif
            @if(Auth::user()->permissao_modulo(2))
                @include('includes.modulos.casamentos')
            @endif
            @if(Auth::user()->permissao_modulo(3))
                @include('includes.modulos.notariais')
            @endif
            @if(Auth::user()->permissao_modulo(4))
                @include('includes.modulos.passaportes')
            @endif
            {{--@if(Auth::user()->permissao_modulo(5))--}}
                {{--@include('includes.modulos.cmfun')--}}
            {{--@endif--}}
            @if(Auth::user()->permissao_modulo(6))
                @include('includes.modulos.processoObras')
            @endif

            @if(Auth::user()->permissao_modulo(7))
                @include('includes.modulos.financas')
            @endif
            @if(Auth::user()->permissao_modulo(8))
                @include('includes.modulos.judicial')
            @endif
            @if(Auth::user()->permissao_modulo(9))
                @include('includes.modulos.obitos')
            @endif
            @if(Auth::user()->permissao_modulo(10) || Auth::user()->permissao_modulo(11))
                <li class="m-menu__section">
                    <h4 class="m-menu__section-text">
                        Requisições
                    </h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
            @endif
            @if(Auth::user()->permissao_modulo(10))
                @include('includes.modulos.aprovisionamento')
            @endif
            @if(Auth::user()->permissao_modulo(11))
                @include('includes.modulos.deposito')
            @endif
            @if(Auth::user()->permissao_modulo(12))
                <li class="m-menu__section">
                    <h4 class="m-menu__section-text">
                        SPCR
                    </h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
                @include('includes.modulos.marcaagua')
            @endif
            @if(Auth::user()->permissao_modulo(15))
                <li class="m-menu__section">
                    <h4 class="m-menu__section-text">
                        Certidões
                    </h4>
                </li>
                @include('includes.modulos.emolumento')
            @endif
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Gestão
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            @if(Auth::user()->permissao_modulo(16))
                @include('includes.modulos.leitores')
            @endif
            @include('includes.modulos.informatica')
            @include('includes.modulos.assiduidade')

            @if(Auth::user()->permissao_modulo(14)|| Auth::user()->permissao_modulo(17)|| Auth::user()->permissao_for_template(10,4)|| Auth::user()->permissao_modulo(13)||
            Auth::user()->permissao_modulo(12)|| Auth::user()->permissao_for_template(11,4))
                <li class="m-menu__section">
                    <h4 class="m-menu__section-text">
                        Painel Administrativo
                    </h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
            @endif
            @if(Auth::user()->permissao_for_template(17,4))
                @include('includes.modulos.gestao.noticias')
            @endif
            @if(Auth::user()->permissao_for_template(11,4))
                @include('includes.modulos.gestao.depositos')
            @endif
            @if(Auth::user()->permissao_for_template(13,4))
                @include('includes.modulos.gestao.qualidade')
            @endif
            @if(Auth::user()->permissao_for_template(13,4))
                @include('includes.modulos.gestao.assiduidade')
            @endif
            @if(Auth::user()->permissao_for_template(14,4))
                @include('includes.modulos.gestao.administracao')
                @include('includes.modulos.gestao.servicos')
            @endif
            @if(Auth::user()->permissao_for_template(12,4))
                @include('includes.modulos.gestao.marcaagua')
            @endif
            @if(Auth::user()->permissao_for_template(10,4))
                @include('includes.modulos.gestao.aprovisionamento')
            @endif
            @if(Auth::user()->permissao_for_template(18,4))
                @include('includes.modulos.gestao.requisicoes')
            @endif
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
