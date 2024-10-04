<style>
    .chosen-container{
        width: 100% !important;
    }
</style>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{route('admin.user-module.user.create')}}">
        @csrf
        <div class="row">

        
            <div class="col">
                <div class="form-group">
                    <label for="fullname">User's full name</label><span
                        class="text-danger">*</span>
                    <input type="text" value="{{ old('fullname') }}" name="fullname"
                           class="form-control"
                           id="fullname">
                    @error('fullname')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="username">Username</label><span class="text-danger">*</span>
                    <input type="text" value="{{ old('username') }}" name="username"
                           class="form-control"
                           id="username">
                    @error('username')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label><span class="text-danger">*</span>
            <input type="password" autocomplete="new-password" name="password"
                   class="form-control"
                   id="password">
            @error('password')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone</label><span class="text-danger">*</span>
            <input type="text" name="phone"
                   class="form-control"
                   id="phone">
            @error('phone')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="phone_login">Phone login</label>
                    <input type="text" value="{{ old('phone_login') }}" name="phone_login"
                           class="form-control"
                           id="phone_login">
                    @error('phone_login')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="phone_password">Phone password</label>
                    <input type="password" value="{{ old('phone_password') }}"
                           name="phone_password"
                           class="form-control"
                           id="phone_password">
                    @error('phone_password')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="user-group">User Group</label><span class="text-danger">*</span>
                    <select class="form-control chosen" id="user-group" onchange="loadAgentType(this)" name="user_group_id"
                            style="width: 100%;">
                        <option value="" selected disabled>Assign group</option>
                        @forelse ($user_groups as $group_item)
                            <option
                                value="{{ $group_item->id }}">{{ $group_item->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('user_group_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="user_role">Role</label><span class="text-danger">*</span>
                    <select class="form-control chosen" name="role_id" id="user_role"
                            style="width: 100%;">
                        <option value="" selected disabled>Assign role</option>
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('role_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <!-- othoba department -->
        <div class="form-group d-none" id="othoba-department-container">
            <label>Othoba Department</label><span class="text-danger">*</span>
            <select name="othoba_department_id" class="form-control">
                @foreach( $othobaDepartmentServices as $othobaDepartmentService )
                <option value="{{ $othobaDepartmentService->id }}">{{ $othobaDepartmentService->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group d-none" id="agent_type_container">
            <label for="business_unit_id">Agent Type</label><span class="text-danger">*</span>
        </div>
        <div class="form-group" data-select2-id="64" id="business-_unit-field">
            <label for="business_unit_id">Business unit
                <small>No BU select will consider all bu assign</small>
            </label>
            <div class="select2-purple">
                <select class="chosen" id="business_unit_id" name="business_unit_id[]"
                        multiple="multiple"
                        data-placeholder="Select business unit"
                        data-dropdown-css-class="select2-purple"
                        style="width: 100%;">
                    @forelse ($business_units as $business_unit)
                        <option
                            value="{{ $business_unit->id }}">{{ $business_unit->name }}</option>
                    @empty

                    @endforelse
                </select>
            </div>
            <!-- <div class="my-2">
                <button type="button" class="btn btn-sm btn-default" onclick="getSelectedBusinessUnits()">Load Service Center</button>
            </div> -->
        </div>
        <div class="form-group d-none" data-select2-id="63" id="service-center-field">
            <label for="service_center_id">Service center</label>
            <div class="select2-purple">
                <select class="select2" disabled id="service_center_id" name="service_center_id[]"
                        multiple="multiple"
                        data-placeholder="Select service centers"
                        data-dropdown-css-class="select2-purple"
                        style="width: 100%;">

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="user-status">Active status</label><span class="text-danger">*</span>
            <select name="is_active" required id="user_status" class="form-control">
                <option value="" disabled>Active status</option>
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
            </select>
            @error('is_active')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="reset" class="btn btn-secondary">Clear</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<link href="{{ asset('backend/css/chosen/choosen.min.css') }}" rel="stylesheet">
<script src="{{ asset('backend/js/chosen/choosen.min.js') }}"></script>
<script>
    $(document).ready(function domReady() {
        $(".chosen").chosen();
    });
</script>

<script>


    function toggleServiceCenterField() {
        const userGroup = document.getElementById("user-group").value;
        console.log(userGroup)
        const serviceCenterField = document.getElementById("service-center-field");
        console.log(serviceCenterField)
        if (serviceCenterField) {
            if (userGroup == 8 || userGroup == 9 || userGroup == 1) {
                if (serviceCenterField.classList.contains('d-none')) {
                    serviceCenterField.classList.remove('d-none')
                    serviceCenterField.classList.add('d-block')
                } else {
                    serviceCenterField.classList.add('d-block')
                }
                document.getElementById("service_center_id").setAttribute('required', 'required');
            } else {
                if (serviceCenterField.classList.contains('d-block')) {
                    serviceCenterField.classList.remove('d-block')
                    serviceCenterField.classList.add('d-none')
                } else {
                    serviceCenterField.classList.add('d-none')
                }
                document.getElementById("service_center_id").removeAttribute('required');
                document.getElementById("service_center_id").value = null
            }
        }
    }

    function toggleBusinessUnitField() {
        const userGroup = document.getElementById("user-group").value;
        console.log(userGroup)
        const businessUnitField = document.getElementById("business-_unit-field");
        console.log(businessUnitField)
        if (businessUnitField) {
            if (userGroup == 8 || userGroup == 9 || userGroup == 1) {
                if (businessUnitField.classList.contains('d-none')) {
                    businessUnitField.classList.remove('d-none')
                    businessUnitField.classList.add('d-block')
                } else {
                    businessUnitField.classList.add('d-block')
                }
            } else {
                if (businessUnitField.classList.contains('d-block')) {
                    businessUnitField.classList.remove('d-block')
                    businessUnitField.classList.add('d-none')
                } else {
                    businessUnitField.classList.add('d-none')
                }
                document.getElementById("business_unit_id").value = null
            }
        }
    }

    function getSelectedBusinessUnits() {
        let selectedOptions = [];
        const selectElement = document.getElementById("business_unit_id");
        const options = selectElement && selectElement.options;
        if (options) {
            for (let i = 0; i < options.length; i++) {
                if (options[i].selected) {
                    selectedOptions.push(options[i].value);
                }
            }
        }
        getServiceCenterByBu(selectedOptions);
    }


    async function getServiceCenterByBu(selectedOptions) {
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const url = '{{ route('admin.user-module.user.get-service-center-by-bu') }}';
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ selectedBu: selectedOptions })
            });

            if (!response.ok) {
                throw new Error('Failed to fetch data');
            }

            const data = await response.json();
            console.log(data); // Assuming the response is JSON data, you can handle it accordingly
            loadServiceCenters(data);
            // Further actions with the response data
        } catch (error) {
            console.error('Error:', error);
            // Handle errors here
        }
    }

    function loadServiceCenters(data) {
        let selectElement = document.getElementById('service_center_id');

        // Remove the 'disabled' attribute
        selectElement.removeAttribute('disabled');

        // Clear any existing options
        selectElement.innerHTML = '';

        // Loop through the data and add options to the select element
        data.forEach(function(item) {
            let option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.name;
            selectElement.appendChild(option);
        });

        // Initialize Select2 plugin (assuming you're using it based on the class name)
        $('.service_center_id').select2({
            placeholder: "Select service centers",
            dropdownParent: $('#largeModal'),
            dropdownCssClass: "select2-purple",
            width: "100%"
        });
    }

    async function loadAgentType(element) {
        const agentTypeDropdown = document.getElementById('agent_type_container');
        const othobaDepartmentContainer = document.getElementById('othoba-department-container');

        if (!agentTypeDropdown.classList.contains('d-none')) {
            agentTypeDropdown.classList.add('d-none');
        }

        if (!othobaDepartmentContainer.classList.contains('d-none')) {
            othobaDepartmentContainer.classList.add('d-none');
        }

        const selectField = agentTypeDropdown.querySelector('select');
        if (selectField) {
            selectField.remove();
        }

        if (element.value === '2') {
            agentTypeDropdown.classList.remove('d-none');

            let selectField = agentTypeDropdown.querySelector('select');
            if (!selectField) {
                selectField = document.createElement('select');
                selectField.className = 'form-control col-12';
                agentTypeDropdown.appendChild(selectField);
                selectField.name='agent_type_id'
            }

            const route = "{{ route('admin.user-module.user.get-agent-type') }}";

            try {
                const response = await fetch(route);

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();

                selectField.innerHTML = '';
                selectField.innerHTML = `<option value="" selected disabled>Choose Agent Type</option>`

                data.forEach(agentType => {
                    const option = document.createElement('option');
                    option.value = agentType.id;
                    option.textContent = agentType.agent_type;
                    selectField.appendChild(option);
                });

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        } 
        else if( element.value === '10' ){
            othobaDepartmentContainer.classList.remove('d-none');
        }
    }









</script>
