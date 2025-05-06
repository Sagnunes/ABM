<li class="m-menu__item {{ request()->is('home') ? 'm-menu__item--active' : ''}}" aria-haspopup="true" >
    <a  href="{{route('home')}}" class="m-menu__link ">
        <i class="m-menu__link-icon flaticon-line-graph"></i>
        <span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Painel de controle
											</span>
                                            <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger" title="@if($novas_noticias->count()===0)Não há notícias novas. @else Existe {{$novas_noticias->count()}} novas notícias @endif">
													{{$novas_noticias->count()}}
												</span>
											</span>
										</span>
									</span>
    </a>
</li>