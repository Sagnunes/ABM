<li class="m-menu__item  m-menu__item--submenu {{ request()->is('emolumento/create') || request()->is('emolumento/pesquisa') ? 'm-menu__item--active' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
    <a  href="#" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-open-box"></i>
        <span class="m-menu__link-text">
										Emolumento
									</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Emolumento
												</span>
											</span>
            </li>
            @if(Auth::user()->permissao_for_template(15,3))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('emolumento.create')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Criar
												</span>
                    </a>
                </li>
            @endif
            @if(Auth::user()->permissao_for_template(15,1))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="{{route('emolumento.basicSearchForm')}}" class="m-menu__link ">
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