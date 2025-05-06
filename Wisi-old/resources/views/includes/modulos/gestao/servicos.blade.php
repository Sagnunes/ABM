<li class="m-menu__item  m-menu__item--submenu {{request()->is('servicos/create') || request()->is('servicos/index') ? 'm-menu__item--active' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
    <a  href="#" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-network"></i>
        <span class="m-menu__link-text">
										Serviços
									</span>
        <span class="m-menu__link-badge">

											</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
														Serviços
												</span>
											</span>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('servicos.create')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">
													Criar
												</span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('servicos.index')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">
													Consultar
												</span>
                </a>
            </li>
        </ul>

    </div>
</li>