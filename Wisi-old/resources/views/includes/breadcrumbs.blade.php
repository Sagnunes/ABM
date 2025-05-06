<div class="mr-auto">
    <h3 class="m-subheader__title m-subheader__title--separator">
        {{--@yield('subtitle') --}}{{$title}}
    </h3>
    {{--@yield('subtitle-menu')--}}
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home">
            <a href="{{route('home')}}" class="m-nav__link m-nav__link--icon"> <i class="m-nav__link-icon la la-home"></i>        </a>
        </li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item">
            <a href="{{$route_title}}" class="m-nav__link">	<span class="m-nav__link-text">	{{$title}}</span> </a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item">
            <a href="{{$route_category}}" class="m-nav__link"><span class="m-nav__link-text">{{$category}}</span></a>
        </li>
    </ul>
</div>