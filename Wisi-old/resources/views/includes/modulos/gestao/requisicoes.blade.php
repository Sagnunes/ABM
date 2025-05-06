<li class="m-menu__item  m-menu__item--submenu {{ request()->is('deposito') ? 'm-menu__item--active' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
    <a  href="#" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-information"></i>
        <span class="m-menu__link-text">
										Requisições
									</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
														Requisições
												</span>
											</span>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('requisicoes.gestao')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">
													Gestão
												</span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                <a  href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">
                                                                    Fundos
                                                                </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true" >
                            <a  href="{{route('fundo.create')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                                                Criar
                                                                            </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true" >
                            <a  href="{{route('fundo.index')}}" class="m-menu__link ">
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