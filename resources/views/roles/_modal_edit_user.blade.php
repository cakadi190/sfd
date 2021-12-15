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
                <div>
                    <input type="radio" name="status" id="active" value="1">
                    <label for="active">Active</label>
                </div>
                <div class="ml-2">
                    <input type="radio" name="status" id="inactive" value="0">
                    <label for="inactive">Inactive</label>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="state" class="h6">Roles</label>
            <div class="d-flex flex-row justify-content-start">
                <div>
                    <input type="checkbox" id="finance" class="align-self-center" aria-label="Checkbox for following text input" name="finance" value="finance" {{ ($user->state == 'finance') ? 'checked' : '' }}>
                    <label for="finance" class="align-self-center">Finance</label>
                </div>
                <div class="ml-2">
                    <input type="checkbox" id="sales" class="align-self-center" aria-label="Checkbox for following text input" name="sales" value="sales" {{ ($user->state == 'sales') ? 'checked' : '' }}>
                    <label for="sales" class="align-self-center">Sales</label>
                </div>
                <div class="ml-2">
                    <input type="checkbox" class="align-self-center" id="management" aria-label="Checkbox for following text input" name="management" value="management" {{ ($user->state == 'management') ? 'checked' : '' }}>
                    <label for="management" class="align-self-center">Management</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
      <button type="submit" class="btn btn-primary">Confirm</button>
    </div>
</form>