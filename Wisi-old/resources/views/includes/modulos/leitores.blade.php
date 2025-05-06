<li class="m-menu__item  m-menu__item--submenu {{ request()->is('leitores/create') || request()->is('leitores/pesquisa') || request()->is('leitores/arquivo') || request()->is('leitores/biblioteca ') ? 'm-menu__item--active' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
    <a  href="#" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-user-add"></i>
        <span class="m-menu__link-text">
										Leitores
									</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Leitores
												</span>
											</span>
            </li>
            @if(Auth::user()->permissao_for_template(16,1))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('leitores.create')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Inserir
												</span>
                    </a>
                </li>
            @endif
            @if((Auth::user()->permissao_for_template(16,1) && Auth::user()->profile->servico_id == 7) || Auth::user()->permissao_for_template(16,4))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('leitores.arquivo')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Arquivo
												</span>
                    </a>
                </li>
            @endif
            @if((Auth::user()->permissao_for_template(16,1) && Auth::user()->profile->servico_id == 1) || Auth::user()->permissao_for_template(16,4))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('leitores.biblioteca')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Biblioteca
												</span>
                    </a>
                </li>
            @endif
            @if(Auth::user()->permissao_for_template(16,4))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('leitores.basicSearchForm')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Pesquisa
												</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>