<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Assign service center to {{ $user->fullname }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{route('admin.user-module.user.service.center.add', $user->id)}}">
        @csrf
        <div class="row">

            <!-- business unit -->
            <div class="col-md-12 form-group">
                <label>Business Unit</label>
                <select name="business_unit_id" id="business_unit_select" class="form-control select2" onchange="businessUnitChange(this)">
                    <option value="">Select Option</option>
                    @foreach( $business_units as $business_unit )
                    <option value="{{ $business_unit->id }}">{{ $business_unit->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- service center -->
            <div class="col-md-12 form-group">
                <label>Service Center</label>
                <select name="service_center_id" id="service_center_select" class="form-control">
                </select>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<link rel="stylesheet" href="{{ asset('backend/plugin/select2/css/select2.min.css') }}">
<script src="{{ asset('backend/plugin/select2/js/select2.full.min.js') }}"></script>

<script>
    $('#business_unit_select').select2({
        dropdownParent: $('#myModal'),
        width: '100%'
    });
    $('#service_center_select').select2({
        dropdownParent: $('#myModal'),
        width: '100%'
    });

    function businessUnitChange(e) {
        const businessUnitId = e.value
        const serviceCenterSelectDom = "#service_center_select";
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