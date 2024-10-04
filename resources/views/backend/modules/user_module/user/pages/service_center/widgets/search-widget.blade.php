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
                    <select class="form-control select2" id="business_unit_id" name="business_unit_id" onchange="businessUnitChange(this)">
                        <option value="" selected>Select Option</option>
                        @foreach( $business_units as $business_unit )
                        <option value="{{ $business_unit->id }}">{{ $business_unit->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3 col-12">
                    <label for="service_center_id">Service Center</label>
                    <select class="form-control select2" id="service_center_id" name="service_center_id">
                        <option value="" selected>Select Option</option>
                    </select>
                </div>

            </div>
            <div class="float-right">
                <button type="button" class="btn btn-primary" id="submitBtn">Search</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</div>
