
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">User Password Reset for {{$user->fullname}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{route('admin.user-module.user.reset.password')}}">
        @csrf
        <div class="row">
            <input type="text" name="user_id" hidden value="{{$user->id}}">
            <!-- name -->
            <div class="col-12 form-group">
                <label for="password">Password</label><span class="text-danger">*</span>
                <input type="text" class="form-control" name="password">
                @error('password')
                {{$message}}
                @enderror
    </div>
    <div class="col-12 form-group">
        <label for="passwordConfirmation">Password Confirmation</label><span class="text-danger">*</span>
        <input type="text" class="form-control" name="password_confirmation">
        @error('password_confirmation')
        {{$message}}
        @enderror
    </div>


    <div class="col-md-12 form-group">
        <button type="submit" class="btn btn-primary">
            Reset
        </button>
    </div>

</div>
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

