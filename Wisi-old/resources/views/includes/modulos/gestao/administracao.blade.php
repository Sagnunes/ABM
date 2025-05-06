<li class="m-menu__item {{ request()->is('utilizadores') ? 'm-menu__item--active' : ''}}" aria-haspopup="true" >
    <a  href="{{route('utilizadores.index')}}" class="m-menu__link ">
        <i class="m-menu__link-icon flaticon-rocket"></i>
        <span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Administração
											</span>
                                            <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger" title="@if ($utilizadores_por_validar->count() ===0) Nenhum utilizador por validar. @else Tem {{$utilizadores_por_validar->count()}} utilizadores por validar.@endif">
													{{$utilizadores_por_validar->count()}}
												</span>
											</span>
										</span>
									</span>
    </a>
</li>