<!--Fonts css-->
{{Html::style('assetsUi/css/flaticons.css')}}

<!-- core css-->
{{Html::style('assetsUi/css/bootstrap.min.css')}}
{{Html::style('assetsUi/css/bootstrap-grid.min.css')}}
{{Html::style('assetsUi/css/bootstrap-reboot.min.css')}}
@if(app()->getLocale() == 'ar')
    <!--ar-->
    {{Html::style('assetsUi/css/bootstrap-rtl.css')}}
    <!--ar-->
@endif
{{Html::style('assetsUi/css/animate.css')}}
{{Html::style('assetsUi/css/iziToast.min.css')}}
{{Html::style('assetsUi/css/sweetalert2.min.css')}}
{{Html::style('assetsUi/css/app.css')}}
{{Html::style('assetsUi/css/slider-menu.jquery.css')}}
{{Html::style('assetsUi/css/slider-menu.theme.jquery.css')}}
@if(app()->getLocale() == 'ar')
    <!--ar-->
    {{Html::style('assetsUi/css/adg3-skeleton-nav-rtl.css')}}
    <!--ar-->
@else
    {{Html::style('assetsUi/css/adg3-skeleton-nav.css')}}
@endif
{{Html::style('assetsUi/css/bundle.css')}}
@if(app()->getLocale() == 'ar')
    <!--ar-->
    {{Html::style('assetsUi/css/ar.css')}}
    <!--ar-->
@else
    {{Html::style('assetsUi/css/main.css')}}
@endif