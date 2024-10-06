<!-- task name -->
<div class="col-md-2 form-group">
    <label>Task Name</label>
    <input type="text" class="form-control" id="search-task_name">
</div>

<!-- Status -->
<div class="col-md-2 form-group">
    <label>Status</label>
    <select class="form-control" id="search-status">
        <option value="">All</option>
        @foreach( $all_task_status as $status )
        <option value="{{ $status }}">{{ $status }}</option>
        @endforeach
    </select>
</div>

<!-- Start Date -->
<div class="col-md-2 form-group">
    <label>Start Date</label>
    <input type="date" class="form-control" id="search-start_date">
</div>

<!-- Due Date -->
<div class="col-md-2 form-group">
    <label>Due Date</label>
    <input type="date" class="form-control" id="search-due_date">
</div>

<!-- Assign To  -->
<div class="col-md-2 form-group">
    <label>Assign To </label>
    <input type="text" class="form-control" placeholder="Enter email" id="search-assign_to_email">
</div>

<!-- Assign By  -->
<div class="col-md-2 form-group">
    <label>Assign By </label>
    <input type="text" class="form-control" placeholder="Enter email" id="search-assign_by_email">
</div>

<!-- Created Date -->
<div class="col-md-2 form-group">
    <label>Created Date</label>
    <input type="date" class="form-control" id="search-created_date">
</div>


<!-- Type -->
<div class="col-md-2 form-group">
    <label>Type</label>
    <select class="form-control" id="search-type">
        <option value="">All Ticket</option>
        <option value="AssignedToMe">Assigned To Me</option>
        <option value="AssignedByMe">Assigned By Me</option>
    </select>
</div>

<div class="col-md-12 text-right">
    <button type="button" onclick="doSearch(this)" class="btn btn-sm btn-success">
        <i class="fas fa-search"></i>
        Search
    </button>
    <button type="button" onclick="clearSearch(this)" class="btn btn-sm btn-danger">
        <i class="fas fa-sync"></i>
        Clear
    </button>
</div>
