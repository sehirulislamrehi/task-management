@extends("backend.template.layout")

@section('per_page_css')
<link href="{{ asset('backend/css/datatable/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    #assigned-to-loader {
        display: none;
    }
</style>
@endsection

@section('body-content')
<div class="br-mainpanel">
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item active" href="#">All Task</a>
        </nav>
    </div>


    <div class="br-pagebody">
        <div class="card card-primary mb-3">
            <div class="card-body">
                <div class="row">
                    @include("backend.modules.task_module.tasks.widgets.search")
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                @if( can("add_task") )
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" data-content="{{ route('task.add.modal') }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                            Add
                        </button>
                    </div>
                </div>
                @endif
            </div>
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table display responsive nowrap no-footer dtr-inline collapsed custom-datatable" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Assigned To</th>
                                    <th>Assigned By</th>
                                    <th>Created At</th>
                                    <th>Time Taken (H:M)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('per_page_js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('backend/js/custom-script.min.js') }}"></script>
<script src="{{ asset('backend/js/datatable/jquery.validate.js') }}"></script>
<script src="{{ asset('backend/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{  asset('backend/js/ajax_form_submit.js') }}"></script>
<script>
    let debounce_timer;
</script>
<script>
    $(function() {
        $('.custom-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: {
                url: "{{ route('task.data') }}",
                type: 'GET',
                data: function(data) {
                    data.task_name = $('#search-task_name').val();
                    data.status = $('#search-status').val();
                    data.start_date = $('#search-start_date').val();
                    data.due_date = $('#search-due_date').val();
                    data.assign_to_email = $('#search-assign_to_email').val();
                    data.assign_by_email = $('#search-assign_by_email').val();
                    data.created_date = $('#search-created_date').val();
                    data.type = $('#search-type').val();
                }
            },
            order: [
                [0, 'DESC']
            ],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'start_date',
                    name: 'start_date',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'due_date',
                    name: 'due_date',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'assigned_to',
                    name: 'assigned_to',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'assigned_by',
                    name: 'assigned_by',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'time_taken',
                    name: 'time_taken',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>
<script>
    function doSearch() {
        $(".custom-datatable").DataTable().ajax.reload();
    }
</script>
<script>
    function clearSearch() {
        $('input').val('');
        $('select').val('').trigger('update');
        doSearch();
    }
</script>
@endsection