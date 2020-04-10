<div class="d-flex  position-fixed h-100 nav-main">
    <div class="skeleton-nav--left">
        <div class="skeleton-nav--left-top">
            <ul class="skeleton-nav--items">
                <li class="nav-item-hover">
                    <a href="">
                        <i class="la la-home icon-lg text-white"></i>
                    </a>
                </li>
                <li class="nav-item-hover">
                    <a href="" class="menulinks" data-toggle="#search_container">
                        <i class="la la-search icon-md text-white"></i>
                    </a>
                </li>
                <li class="nav-item-hover">
                    <a href="" class="menulinks" data-toggle="#notification_container">
                        {{--<label class="red-alarm"></label>--}}
                        <i class="la la-bell-o icon-md text-white"></i>
                    </a>
                </li>
                <li class="nav-item-hover">
                    <a href="" class="menulinks" data-toggle="#logger_container">
                        <label class="red-alarm"></label>
                        <i class="la la-list-ol icon-md text-white"></i>
                    </a>
                </li>
                <li class="skeleton--icon"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
            </ul>
        </div>
        <div class="skeleton-nav--left-bottom">
            <div class="skeleton-nav--left-bottom-wrapper">
                <div class="skeleton-nav--item-help nav-item-hover">
                    <a href="" class="">
                        <i class="la la-user icon-md text-white"></i>
                    </a>
                </div>
                <div class="skeleton-nav--item-profile nav-item-hover">
                    {{--<a href="{{app()->getLocale() == 'ar' ? route('setEn') : route('setAr')}}" class="">--}}
                    <a href="">
                        <i class="la la-language icon-md text-white"></i>
                    </a>
                </div>
                <div class="skeleton-nav--item-profile nav-item-hover">
                    <a href="" class="">
                        <i class="la la-info-circle icon-md text-white"></i>
                    </a>
                </div>
                <div class="skeleton-nav--item-profile nav-item-hover">
                    <a href="{{route('logout')}}" class="">
                        <i class="la la-sign-out icon-md text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="skeleton-nav--right">
        <div id="desktop_toggle" class="menu-toggle d-none d-md-block">
            <i class="la la-bars"></i>
        </div>
        <ul class="skeleton-nav--items-wide">
            <li class="skeleton--icon-logo-container">
                <div class="skeleton--icon-container bg-transparent">
                    <a href="">
                        <img src="{{asset('assetsUi/images/logo.png')}}" class="position-relative"
                             style="width: 105px;top: 4px"
                             alt="">
                    </a><br>
                </div>
                <div class="skeleton--icon-description bg-transparent text-right p-1">
                    <strong class="text-uppercase">{{__('admin.welcome')}}</strong>
                    <br>
                    <span>({{auth('web')->user()->username ?? '-'}})</span>
                </div>
                <div class="skeleton--icon-logo"></div>
            </li>
            <li class="m-0">
                <div class="slider">

                    <ul class="my-menu">

                        <li><a id="_2" href="#">
                                <i class="la la-globe fa-2x"></i>
                                <span>{{__('admin.dashboard')}}</span>
                            </a>
                            <ul>
                                <li><a id="_21" href="#">{{__('admin.users_module')}}</a>
                                    <ul>
                                        {{--@can('create-violation',auth()->user())--}}
                                        <li id="_211" data-vertical="true"><a href="#">{{__('admin.users')}}</a>
                                            <ul>
                                                <li>
                                                    <a href="{{route('createUser')}}">{{__('admin.add_user')}}</a>
                                                <li>
                                                    <a href="{{route('allUsers')}}">{{__('admin.all_users')}}</a>
                                                {{--@endcan--}}
                                            </ul>
                                    </ul>
                            </ul>

                    </ul><!-- .my-menu -->

                </div>
            </li>
        </ul>
    </div>
</div>