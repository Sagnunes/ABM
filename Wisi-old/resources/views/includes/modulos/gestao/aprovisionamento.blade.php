
<li class="m-menu__item  m-menu__item--submenu {{ request()->is('aprovisionamento') ? 'm-menu__item--active' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
	<a  href="#" class="m-menu__link m-menu__toggle">
		<i class="m-menu__link-icon flaticon-truck"></i>
		<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Aprovisionamento
											</span>
                                            <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger" title="@if($novos_pedido_aprovisionamento->count()===0)
														<i class='m-menu__ver-arrow la la-angle-right'></i> @else Tem {{$novos_pedido_aprovisionamento->count()}} pedidos novos @endif">
													{{$novos_pedido_aprovisionamento->count()}}
												</span>
											</span>
										</span>
									</span>
	</a>
	<div class="m-menu__submenu ">
		<span class="m-menu__arrow"></span>
		<ul class="m-menu__subnav">
			<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
														Aprovisionamento
												</span>
											</span>
			</li>
			<li class="m-menu__item " aria-haspopup="true" >
				<a  href="{{route('produto.create')}}" class="m-menu__link ">
					<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
					</i>
					<span class="m-menu__link-text">
                                                                                Novo produto
                                                                            </span>
				</a>
			</li>
			<li class="m-menu__item " aria-haspopup="true" >
				<a  href="{{route('produto.basicSearchForm')}}" class="m-menu__link ">
					<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
					</i>
					<span class="m-menu__link-text">
                                                                                Pesquisar produtos
                                                                            </span>
				</a>
			</li>
			<li class="m-menu__item " aria-haspopup="true" >
				<a  href="{{route('aprovisionamento.basicSearchForm')}}" class="m-menu__link ">
					<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
					</i>
					<span class="m-menu__link-text">
                                                                                Pesquisar requisições
                                                                            </span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
					</i>
					<span class="m-menu__link-text">
                                                                    Gestão
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
                                                                    Produtos
                                                                </span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									@foreach($menu_aprovisionamento as $item)
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="{{route('aprovisionamento.menu',['id'=>$item->id])}}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
                                                                                {{$item->nome}}
                                                                            </span>
											</a>
										</li>
									@endforeach
								</ul>
							</div>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('aprovisionamento.estado_por_id',['id'=>1])}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                                                                Novas
                                                                            </span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('aprovisionamento.estado_por_id',['id'=>2])}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                                                                Processamento
                                                                            </span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('aprovisionamento.estado_por_id',['id'=>3])}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                                                                Concluídas
                                                                            </span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('aprovisionamento.estado_por_id',['id'=>4])}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                                                                Anuladas
                                                                            </span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="m-menu__item " aria-haspopup="true" >
				<a  href="{{route('aprovisionamento.estatistica')}}" class="m-menu__link ">
					<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
					</i>
					<span class="m-menu__link-text">
                                                                                Estatística
                                                                            </span>
				</a>
			</li>
		</ul>

	</div>
</li>