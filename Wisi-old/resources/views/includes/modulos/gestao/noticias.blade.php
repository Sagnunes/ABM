<li class="m-menu__item  m-menu__item--submenu {{ request()->is('noticias') ? 'm-menu__item--active' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
    <a  href="{{route('noticias.index')}}" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-speech-bubble"></i>
        <span class="m-menu__link-text">
										Notícias
									</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
</li>