<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit User Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="/dashboard/settings/editDataUser/{{ $user->id }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="d-flex flex-column justify-content-start mt-1">
          <label for="iduser" class="h6">ID User</label>
          <input class="form-control" type="text" name="iduser" id="iduser" value="{{ $user->id }}" disabled>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="name" class="h6">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $user->fullname }}">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="nric" class="h6">NRIC</label>
            <input class="form-control" type="text" name="nric" id="nric" value="{{ $user->nric }}">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
          <label for="email" class="h6">Email</label>
          <input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="phone" class="h6">Phone</label>
            <input class="form-control" type="text" name="phone" id="phone" value="{{ $user->phone }}">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="header" class="h6">Status</label>
            <div class="d-flex flex-row">
                @if($user['status'])
                    <div class="custom-control custom-radio">
                        <input type="radio" name="status" id="active" value="1" class="custom-control-input" checked>
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                    <div class="custom-control custom-radio ml-2">
                        <input type="radio" name="status" id="inactive" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="inactive">Inactive</label>
                    </div>
                @else
                    <div class="custom-control custom-radio">
                        <input type="radio" name="status" id="active" value="1" class="custom-control-input">
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                    <div class="custom-control custom-radio ml-2">
                        <input type="radio" name="status" id="inactive" value="0" class="custom-control-input" checked>
                        <label class="custom-control-label" for="inactive">Inactive</label>
                    </div>
                @endif
            </div>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="state" class="h6">Roles</label>
            @if(count(explode(",", $user->state)) == 3)
                <div class="d-flex flex-row justify-content-start">
                    <div class="custom-control custom-checkbox align-self-center">
                        <input type="checkbox" class="custom-control-input" id="finance" name="finance" value="finance" {{ (explode(",", $user->state)[0] == 'finance') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="finance">Finance</label>
                    </div>
                    <div class="custom-control custom-checkbox align-self-center ml-2">
                        <input type="checkbox" class="custom-control-input" id="sales" name="sales" value="sales" {{ (explode(",", $user->state)[1] == 'sales') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="sales">Sales</label>
                    </div>
                    <div class="custom-control custom-checkbox align-self-center ml-2">
                        <input type="checkbox" class="custom-control-input" id="management" name="management" value="management" {{ (explode(",", $user->state)[2] == 'management') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="management">Management</label>
                    </div>
                </div>
            @elseif(count(explode(",", $user->state)) == 2)
                <div class="d-flex flex-row justify-content-start">
                    <div class="custom-control custom-checkbox align-self-center">
                        <input type="checkbox" class="custom-control-input" id="finance" name="finance" value="finance" {{ (explode(",", $user->state)[0] == 'finance') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="finance">Finance</label>
                    </div>
                    <div class="custom-control custom-checkbox align-self-center ml-2">
                        <input type="checkbox" class="custom-control-input" id="sales" name="sales" value="sales" {{ (explode(",", $user->state)[1] == 'sales') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="sales">Sales</label>
                    </div>
                    <div class="custom-control custom-checkbox align-self-center ml-2">
                        <input type="checkbox" class="custom-control-input" id="management" name="management" value="management" {{ (explode(",", $user->state)[1] == 'management') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="management">Management</label>
                    </div>
                </div>
            @elseif(count(explode(",", $user->state)) == 1)
                <div class="d-flex flex-row justify-content-start">
                    <div class="custom-control custom-checkbox align-self-center">
                        <input type="checkbox" class="custom-control-input" id="finance" name="finance" value="finance" {{ (explode(",", $user->state)[0] == 'finance') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="finance">Finance</label>
                    </div>
                    <div class="custom-control custom-checkbox align-self-center ml-2">
                        <input type="checkbox" class="custom-control-input" id="sales" name="sales" value="sales" {{ (explode(",", $user->state)[0] == 'sales') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="sales">Sales</label>
                    </div>
                    <div class="custom-control custom-checkbox align-self-center ml-2">
                        <input type="checkbox" class="custom-control-input" id="management" name="management" value="management" {{ (explode(",", $user->state)[0] == 'management') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="management">Management</label>
                    </div>
                </div>
            @else
                <div class="d-flex flex-row justify-content-start">
                    <div class="custom-control custom-checkbox align-self-center">
                        <input type="checkbox" class="custom-control-input" id="finance" name="finance" value="finance">
                        <label class="custom-control-label" for="finance">Finance</label>
                    </div>
                    <div class="custom-control custom-checkbox align-self-center ml-2">
                        <input type="checkbox" class="custom-control-input" id="sales" name="sales" value="sales">
                        <label class="custom-control-label" for="sales">Sales</label>
                    </div>
                    <div class="custom-control custom-checkbox align-self-center ml-2">
                        <input type="checkbox" class="custom-control-input" id="management" name="management" value="management">
                        <label class="custom-control-label" for="management">Management</label>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
      <button type="submit" class="btn btn-primary">Confirm</button>
    </div>
</form>