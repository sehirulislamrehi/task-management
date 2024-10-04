<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this mapping?</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-footer">
    <form class="ajax-form" method="post" action="{{route('admin.user-module.user.service.center.delete', ['service_center_id' => $service_center_user->service_center_id, 'user_id' => $service_center_user->user_id])}}">
        @csrf
        <button type="submit" class="btn btn-danger">Yes</button>
    </form>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
</div>