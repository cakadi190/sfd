<style>
    form i{
        cursor: pointer;
    }
    input{
        width: 85% !important;
        border-top-right-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }
    .width-super-mini{
        width: 10% !important;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px
    }
</style>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Change User Password</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="/dashboard/settings/changeUserPW/{{ $user->id }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="d-flex flex-column justify-content-start mt-1">
            <label for="oldpassword" class="h6">Old Password</label>
            <div class="d-flex flex-row justify-content-start">
                <input class="form-control" type="password" name="oldpassword" id="oldpassword" placeholder="Type Your Old Password">
                <div class="form-control width-super-mini">
                    <i class="bi bi-eye-slash align-self-center" id="toggleOldPassword"></i>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4">
            <label for="oldpassword" class="h6">Retype Old Password</label>
            <div class="d-flex flex-row justify-content-start">
                <input class="form-control" type="password" name="retypeoldpassword" id="retypeoldpassword" placeholder="Retype Your Old Password">
                <div class="form-control width-super-mini">
                    <i class="bi bi-eye-slash align-self-center" id="toggleRetypeOldPassword"></i>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-start mt-4 mb-2">
          <label for="newpassword" class="h6">New Password</label>
          <div class="d-flex flex-row justify-content-start">
            <input class="form-control" type="password" name="newpassword" id="newpassword" placeholder="Type Your New Password">
            <div class="form-control width-super-mini">
                <i class="bi bi-eye-slash align-self-center" id="toggleNewPassword"></i>
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
    const togglePassword1 = document.querySelector('#toggleOldPassword');
    const togglePassword2 = document.querySelector('#toggleNewPassword');
    const togglePassword3 = document.querySelector('#toggleRetypeOldPassword');
    const oldpassword = document.querySelector('#oldpassword');
    const newpassword = document.querySelector('#newpassword');
    const retypeoldpassword = document.querySelector('#retypeoldpassword');

    togglePassword1.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = oldpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        oldpassword.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('bi-eye');
    });
    togglePassword2.addEventListener('click', function(e){
        // toggle the type attribute
        const type = newpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        newpassword.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('bi-eye');
    });
    togglePassword3.addEventListener('click', function(e){
        // toggle the type attribute
        const type = retypeoldpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        retypeoldpassword.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('bi-eye');
    });
</script>