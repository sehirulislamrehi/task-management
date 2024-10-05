<div class="modal-header pd-y-20 pd-x-25">
    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add new task</h6>
</div>
<div class="modal-body pd-25">
    <form action="{{ route('task.add') }}" method="post" class="ajax-form" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <!-- Name -->
            <div class="col-md-12 form-group">
                <label>Name</label><label class="required">*</label>
                <input class="form-control" type="text" name="name">
            </div>

            <!-- Description -->
            <div class="col-md-12 form-group">
                <label>Description</label><label class="required">*</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>

            <!-- Status -->
            <div class="col-md-12 form-group">
                <label>Status</label><label class="required">*</label>
                <select class="form-control" name="status">
                    @foreach( $all_task_status as $status )
                    <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Start Date -->
            <div class="col-md-6 col-12 form-group">
                <label>Start Date</label><label class="required">*</label>
                <input class="form-control" type="date" name="start_date">
            </div>

            <!-- Due Date -->
            <div class="col-md-6 col-12 form-group">
                <label>Due Date</label><label class="required">*</label>
                <input class="form-control" type="date" name="due_date" id="due_date">
            </div>

            <!-- Assigned To -->
            <div class="col-md-12 form-group">
                <label>Assigned To</label><label class="required">*</label>
                <img src="{{ asset('backend/images/loading.gif') }}" id="assigned-to-loader" width="15" alt="">
                <select class="form-control chosen" id="assigned-to" name="assigned_to">
                    <option value="" selected disabled>Search via email</option>
                </select>
            </div>

            <!-- Image -->
            <div class="col-md-12 form-group">
                <label>Image</label>
                <input class="form-control-file" type="file" name="image">
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 form-layout-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
</div>

<link href="{{ asset('backend/css/chosen/choosen.min.css') }}" rel="stylesheet">
<script src="{{ asset('backend/js/chosen/choosen.min.js') }}"></script>
<script>
    $(document).ready(function domReady() {
        $(".chosen").chosen();
    });

    $(document).on('keyup', '.chosen-search input', function() {
        document.getElementById("assigned-to-loader").style.display = "inline-block"

        let input_element = $(this);

        clearTimeout(debounce_timer);

        debounce_timer = setTimeout(function() {
            user_account_search(input_element);
        }, 1000);

    });

    function user_account_search(input_element) {
        const search_value = input_element.val()
        let route = "{{ route('task.get.user.by.email',['email' => ':email']) }}"
        route = route.replace(':email', search_value)
        if (!search_value) {
            document.getElementById("assigned-to-loader").style.display = "none"
            return;
        }

        fetch(route, {
                method: 'GET',
                data: {
                    email: search_value
                }
            })
            .then(response => response.json())
            .then(response => {

                $("#assigned-to").empty()

                $("#assigned-to").append(`
                    <option value="" selected disabled>Search via email</option>
                `);
                response.data.map((value, key) => {
                    $("#assigned-to").append(`
                        <option value="${value.id}">${value.name} - ${value.email}</option>
                    `);
                })

                $("#assigned-to").trigger("chosen:updated");
                document.getElementById("assigned-to-loader").style.display = "none"
            })
            .catch(response => {
                swal("", `${response.message}`, "error")
                document.getElementById("assigned-to-loader").style.display = "none"
            })
    }
</script>