<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
    <a  href="#" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-speech-bubble"></i>
        <span class="m-menu__link-text">
										Notícias
									</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Notícias
												</span>
											</span>
            </li>
            @if(Auth::user()->permissao_for_template(17,1))
                <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="#" class="m-menu__link " data-toggle="modal" data-target="#m_modal_4">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                        </i>
                        <span class="m-menu__link-text">
													Adicionar
												</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>