@extends('backend.template.layout')
@section('per_page_css')
<link rel="stylesheet" href="{{ asset('backend/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugin/select2/css/select2.min.css') }}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">{{ $user->fullname }}</li>
                    <li class="breadcrumb-item active">Service Center</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <!-- Button -->
        @if(can("user_service_center"))
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary my-3 btn btn-outline-dark float-right" data-content="{{route('admin.user-module.user.service.center.add.modal', $user->id)}}" data-target="#myModal" data-toggle="modal" style="cursor: pointer;">
                    <i class="fas fa-plus"></i>&nbsp;
                    Assign
                </a>
            </div>
        </div>
        @endif

        <!-- search -->
        <div class="row">
            <div class="col-12">
                @include('backend.modules.user_module.user.pages.service_center.widgets.search-widget')
            </div>
        </div>

        <!-- Listing -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table id="dataGrid" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>BusinessUnit</th>
                                                <th>ServiceCenter</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
@section('per_page_js')
<script src="{{ asset('backend/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugin/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/js/custom-script.min.js') }}"></script>
<script src="{{ asset('backend/js/ajax_form_submit.js') }}"></script>
<script src="{{ asset('backend/plugin/select2/js/select2.full.min.js') }}"></script>

<!-- For hiding and showing collapsing card -->
<script>
    //Initialize Select2 Elements
    $('.select2').select2()

    // Trigger the function on page load to handle any pre-selected values
    // Event handler for reload button click
    $('#submitBtn').on('click', function() {
        // Reload the DataTable using AJAX
        $('#dataGrid').DataTable().ajax.reload();
    });

    // Event handler for clear button click
    $('button[type="reset"]').on('click', function() {
        // Reset all input fields
        $('form').find(':input').val('');

        // Reset Select2 elements
        $('.select2').val(null).trigger('change');

        // Reload the DataTable using AJAX
        $('#dataGrid').DataTable().ajax.reload();

    });

    $(function() {
        $('#dataGrid').DataTable({
            processing: true,
            serverSide: true,
            pagination: 10,
            ajax: {
                url: "{{ route('admin.user-module.user.get.service.center.data', $user->id) }}",
                data: function(data) {
                    data.service_center_id = $('#service_center_id').val();
                }
            },
            order: [
                [0, 'Desc']
            ],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'business_unit_id',
                    name: 'business_unit_id',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'service_center_id',
                    name: 'service_center_id',
                    orderable: false,
                    searchable: true,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

            ]
        });
    });
</script>
<script>
    function businessUnitChange(e) {
        const businessUnitId = e.value
        const serviceCenterSelectDom = "#service_center_id";
        let route = "{{ route('admin.user-module.user.service.center.by.bu',':id') }}"
        route = route.replace(":id", businessUnitId)

        fetch(route)
            .then(response => response.json())
            .then(response => {
                successResponseProcess(response, false, false)

                $(serviceCenterSelectDom).empty()
                let options = '<option selected disabled value="">Select Option</option>';
                $.each(response.data, ((key, value) => {
                    options += `<option value="${value.service_center_id}">${value.service_center_name}</option>`
                }))
                $(serviceCenterSelectDom).append(options)

            })
            .catch(response => {
                errorResponseProcess(response, false, false)
            })

    }
</script>
@endsection