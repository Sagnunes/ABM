<li class="m-menu__item  m-menu__item--submenu {{ request()->is('financas/create') || request()->is('financas/pesquisa') || request()->is('financas/pesquisa-avancada') ? 'm-menu__item--active' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
    <a  href="#" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-piggy-bank"></i>
        <span class="m-menu__link-text">
										Sucessões e doações
									</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Finanças
												</span>
											</span>
            </li>
            @if(Auth::user()->permissao_for_template(7,3))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('financas.create')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Criar
												</span>
                    </a>
                </li>
            @endif
            @if(Auth::user()->permissao_for_template(7,1))
                {{--<li class="m-menu__item " aria-haspopup="true" >--}}
                    {{--<a  href="{{route('financas.basicSearchForm')}}" class="m-menu__link ">--}}
                        {{--<i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
                            {{--<span></span>--}}
                        {{--</i>--}}
                        {{--<span class="m-menu__link-text">--}}
													{{--Pesquisa--}}
												{{--</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('financas.advancedSearchForm')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Pesquisa
												</span>
                    </a>
                </li>
            @endif
            @if(Auth::user()->permissao_for_template(7,4))
                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                    <a  href="#" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Extras
												</span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="m-menu__submenu ">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                                                    Freguesias
                                                                </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="{{route('freguesia.create')}}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                                                Criar
                                                                            </span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="{{route('freguesia.index')}}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                                                Consulta
                                                                            </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>

    </div>
</li>