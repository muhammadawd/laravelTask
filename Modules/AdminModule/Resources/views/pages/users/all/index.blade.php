@extends('adminmodule::layouts.adminMaster')

@section('styles')
    <!-- end of plugin styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{Html::style('assetsUi/css/scroller.bootstrap.min.css')}}
    {{Html::style('assetsUi/css/colReorder.bootstrap.min.css')}}
    {{Html::style('assetsUi/css/dataTables.bootstrap.css')}}
    {{Html::style('assetsUi/css/dataTables.bootstrap.css')}}
    {{Html::style('assetsUi/css/responsive.dataTables.min.css')}}
    {{Html::style('assetsUi/css/tables.css')}}
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('adminmodule::pages.users.all.templates.header')
                @include('adminmodule::pages.users.all.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    {{Html::script('assetsUi/js/datatable/jquery.dataTables.js')}}
    {{Html::script('assetsUi/js/datatable/dataTables.tableTools.js')}}
    {{Html::script('assetsUi/js/datatable/dataTables.colReorder.js')}}
    {{Html::script('assetsUi/js/datatable/dataTables.bootstrap.js')}}
    {{Html::script('assetsUi/js/datatable/dataTables.buttons.min.js')}}
    {{Html::script('assetsUi/js/datatable/jquery.dataTables.min.js')}}
    {{Html::script('assetsUi/js/datatable/dataTables.responsive.min.js')}}
    {{Html::script('assetsUi/js/datatable/dataTables.rowReorder.min.js')}}
    {{Html::script('assetsUi/js/datatable/buttons.colVis.min.js')}}
    {{Html::script('assetsUi/js/datatable/buttons.html5.min.js')}}
    {{Html::script('assetsUi/js/datatable/buttons.bootstrap.min.js')}}
    {{Html::script('assetsUi/js/datatable/buttons.print.min.js')}}
    {{Html::script('assetsUi/js/datatable/dataTables.scroller.min.js')}}

    <script>
        $(document).ready(function () {
            setTimeout(() => {
                $('#_2').trigger("click");
                $('#_21').trigger("click");

            }, 60);
        });
    </script>
    <script>

        let table = $('#data_table');

        table.dataTable({
            "responsive": true,
            "sort": false,
            "paging": false,
            "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>", // datatable layout without  horizobtal scroll
            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            }],
            "order": [
                [1, 'asc']
            ],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5
        });



    </script>
    <script>

        function deleteUser(id) {
            Swal.fire({
                type: 'warning',
                title: '{{__('admin.are_sure')}}',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: '{{__('admin.yes')}}',
                cancelButtonText: '{{__('admin.no')}}',
                showLoaderOnConfirm: true,
                preConfirm: (allow) => {
                    if (allow) {
                        $.ajax({
                            url: "{{route('handleDeleteUser')}}",
                            method: "delete",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id
                            },
                            success: function (response) {
                                if (response.status) {
                                    location.reload()
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    // Swal.fire({
                    //     title: `${result.value.login}'s avatar`,
                    //     imageUrl: result.value.avatar_url
                    // })
                }
            })
        }
    </script>
@endsection