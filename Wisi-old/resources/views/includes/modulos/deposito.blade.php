<li class="m-menu__item  m-menu__item--submenu {{ request()->is('deposito/create') ? 'm-menu__item--active' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
    <a  href="#" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-squares-3"></i>
        <span class="m-menu__link-text">
										Depósito
									</span>

        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Depósito
												</span>
											</span>
            </li>
            @if(Auth::user()->permissao_for_template(11,1))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('deposito.create')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Requisitar
												</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>