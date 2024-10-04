<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Assign thana to {{ $user->fullname }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{route('admin.user-module.user.thana.add', $user->id)}}">
        @csrf
        <div class="row">

            <div class="col-md-12 form-group">
                <label for="district_id">District</label><span class="text-danger">*</span>
                <div class="select2-purple">
                    <select class="select2" id="district_id" name="district_id" data-placeholder="Select a district" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        <option value="" selected disabled>Choose an district</option>
                        @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12  form-group">
                <label for="thana_id">Thana</label><span class="text-danger">*</span>
                <div class="select2-purple">
                    <select class="select2" id="thana_id" name="thana_id" data-placeholder="Select a thana" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    </select>
                </div>
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
    $('#district_id').select2({
        dropdownParent: $('#myModal'),
        width: '100%'
    });
    $('#thana_id').select2({
        dropdownParent: $('#myModal'),
        width: '100%'
    });
</script>

<script>
    $(document).ready(function() {

        document.getElementById('district_id').onchange = async function(e) {
            const districtId = e.target.value;
            const url = `{{ route('admin.common-module.district.get.all.thana', ['id' => ':id']) }}`.replace(':id', districtId);
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error('Failed to fetch data');
                }
                const data = await response.json();
                const targetElement = document.getElementById('thana_id');
                targetElement.innerHTML = '';
                let dynamicOption = '';
                data.forEach((k) => {
                    dynamicOption += `<option value="${k.id}">${k.name}</option>`;
                });
                targetElement.innerHTML = dynamicOption;

                $('#thana_id').select2('destroy').select2();
            } catch (error) {
                console.error('An error occurred:', error);
            }
        };

    });
</script>