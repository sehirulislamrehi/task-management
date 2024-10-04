<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to remove "{{ $user_thana->thana->name }}"?</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-footer">
    <form class="ajax-form" method="post" action="{{route('admin.user-module.user.thana.delete', ['thana_id' => $user_thana->thana_id, 'user_id' => $user_thana->user_id])}}">
        @csrf
        <button type="submit" class="btn btn-danger">Yes</button>
    </form>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
</div>