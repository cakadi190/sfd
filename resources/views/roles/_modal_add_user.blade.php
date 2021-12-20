<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit User Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="/dashboard/settings/addDataUser" method="POST">
    @csrf
    <div class="modal-body">
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="name" class="h6">Name</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="nric" class="h6">NRIC</label>
            <input class="form-control" type="text" name="nric" id="nric">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
          <label for="email" class="h6">Email</label>
          <input class="form-control" type="text" name="email" id="email">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="password" class="h6">Password</label>
            <div class="d-flex flex-row justify-content-start">
                <input class="form-control" type="password" name="password" id="password" placeholder="Type Your Password">
                <div class="form-control width-super-mini">
                    <i class="bi bi-eye-slash align-self-center" id="togglePassword"></i>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="retypePassword" class="h6">Retype Password</label>
            <div class="d-flex flex-row justify-content-start">
                <input class="form-control" type="retypePassword" name="retypePassword" id="retypePassword" placeholder="Retype Your Password">
                <div class="form-control width-super-mini">
                    <i class="bi bi-eye-slash align-self-center" id="toggleRetypePassword"></i>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="status" class="h6">Status</label>
            <input class="form-control" type="text" name="status" id="status">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="phone" class="h6">Phone</label>
            <input class="form-control" type="text" name="phone" id="phone">
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="header" class="h6">Status</label>
            <div class="d-flex flex-row">
                <div class="custom-control custom-radio">
                    <input type="radio" name="status" id="active" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="active">Active</label>
                </div>
                <div class="custom-control custom-radio ml-2">
                    <input type="radio" name="status" id="inactive" value="0" class="custom-control-input">
                    <label class="custom-control-label" for="inactive">Inactive</label>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="state" class="h6">Roles</label>
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
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-primary" data-dismiss="modal">Cancel</a>
      <button type="submit" class="btn btn-primary">Confirm</button>
    </div>
</form>

<script>
    const togglePassword1 = document.querySelector('#togglePassword');
    const togglePassword2 = document.querySelector('#toggleRetypePassword');
    const password = document.querySelector('#password');
    const retypePassword = document.querySelector('#retypePassword');

    togglePassword1.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('bi-eye');
    });
    togglePassword2.addEventListener('click', function(e){
        // toggle the type attribute
        const type = retypePassword.getAttribute('type') === 'password' ? 'text' : 'password';
        retypePassword.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('bi-eye');
    });
</script>