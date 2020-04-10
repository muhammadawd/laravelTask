{{Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}
{{Html::script('assetsUi/js/bootstrap.min.js')}}
{{Html::script('assetsUi/js/bootstrap.bundle.min.js')}}
{{Html::script('assetsUi/js/iziToast.min.js')}}
{{Html::script('assetsUi/js/sweetalert2.all.min.js')}}
{{Html::script('assetsUi/js/slider-menu.jquery.min.js')}}
{{Html::script('assetsUi/js/scripts.js')}}

<script>

    $(".arabicnumber").on('input propertychange paste', function (e) {
        //if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        if (e.which != 8 && e.which != 0 && (e.which < 96 || e.which > 105)) {
            return false;
        }

        //---------------Arabic Numbers--------------------
        var yas = $(this).val();
        yas = (yas.replace(/[٠١٢٣٤٥٦٧٨٩]/g, function (d) {
            return d.charCodeAt(0) - 1632;
        }).replace(/[٠١٢٣٤٥٦٧٨٩]/g, function (d) {
            return d.charCodeAt(0) - 1776;
        }));
        if (isNaN(yas)) {
            yas = "";
        }
        $(this).val(yas);
        //---------------Arabic Numbers END------------------

    });
</script>