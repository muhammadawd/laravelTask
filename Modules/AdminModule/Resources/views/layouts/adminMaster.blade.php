<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assetsUi/images/logo.png')}}" rel="icon">
    @include('adminmodule::includes.styles')
    @yield('styles')
    <title>{{$page_title ?? ''}}</title>
    <script>
        window.back_menu = "{{__('admin.back')}}";
    </script>
</head>
<body class="direction">
<div id="adg3-navigation"
     data-mobile-nav>

    <nav class="skeleton-nav position-fixed">
{{--        @include('adminmodule:::includes.sideloader')--}}
        @include('adminmodule::includes.sideslides')
    </nav>

    @yield('content')

    <div class="drop-backup"></div>
</div>
@include('adminmodule::includes.scripts')
@include('adminmodule::includes.alerts')
@yield('scripts')
</body>
</html>