<div class="card">
    <div class="card-header">
        Search filter
    </div>
    <div class="card-body">
        <form autocomplete="off" id="searchForm">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3 col-12">
                    <label for="business_unit_id">Business unit</label>
                    <select class="form-control select2" id="search_business_unit_id" name="search_business_unit_id" onchange="businessUnitChange(this)">
                        <option value="" selected >Select option</option>
                        @forelse($businessUnits as $businessUnit)
                        <option value="{{$businessUnit->id}}">{{$businessUnit->name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>

                <div class="form-group col-md-3 col-12">
                    <label for="service_center_id">Service Center</label>
                    <select class="form-control select2" id="search_service_center_id" name="search_service_center_id">
                        <option value="" selected >Select option</option>
                        @forelse($serviceCenters as $serviceCenter)
                        <option value="{{$serviceCenter->id}}">{{$serviceCenter->name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>

                <div class="form-group col-md-3 col-12">
                    <label for="user-group">User Group</label>
                    <select class="form-control select2" id="search_user_group_id" name="search_user_group_id">
                        <option value="" selected >Select option</option>
                        @forelse ($user_groups as $group_item)
                            <option
                                value="{{ $group_item->id }}">{{ $group_item->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>

                <!-- othoba department -->
                <div class="form-group col-md-3">
                    <label>Othoba Department</label>
                    <select name="othoba_department_id" id="othoba_department_id" class="form-control select2">
                        <option value="" selected >Select option</option>
                        @foreach( $othobaDepartmentServices as $othobaDepartmentService )
                        <option value="{{ $othobaDepartmentService->id }}">{{ $othobaDepartmentService->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="float-right">
                <button type="button" class="btn btn-primary" id="submitBtn"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i>Clear</button>
            </div>
        </form>
    </div>
</div>


<script>
    function businessUnitChange(e) {
        const businessUnitId = e.value
        const serviceCenterSelectDom = "#service_center_id";
        let route = "{{ route('admin.user-module.user.service.center.by.bu',':id') }}"
        route = route.replace(":id", businessUnitId)

        fetch(route)
            .then(response => response.json())
            .then(response => {
                // successResponseProcess(response, false, false)

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
