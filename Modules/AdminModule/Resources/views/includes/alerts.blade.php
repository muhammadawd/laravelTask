@if(session()->has('success'))
    <script>
        iziToast.success({
            title: '{{__('admin.success')}}',
            message: '{{session()->get('success')}}',
            position: '{{app()->getLocale() == 'ar' ? 'bottomLeft': 'bottomRight'}}',
        });
    </script>
@endif

@if(session()->has('info'))
    <script>
        iziToast.info({
            title: '{{__('admin.info')}}',
            message: '{{session()->get('info')}}',
            position: '{{app()->getLocale() == 'ar' ? 'bottomLeft': 'bottomRight'}}',
        });
    </script>
@endif

@if(session()->has('error'))
    <script>
        iziToast.error({
            title: '{{__('admin.error')}}',
            message: '{{session()->get('error')}}',
            position: '{{app()->getLocale() == 'ar' ? 'bottomLeft': 'bottomRight'}}',
        });
    </script>
@endif