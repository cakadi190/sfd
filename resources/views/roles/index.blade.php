@extends('layouts.app')

@section('content')
<style>
    form i{
        cursor: pointer;
    }
    input.unique{
        width: 90% !important;
        border-top-right-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }
    .width-super-mini{
        width: 10% !important;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px
    }
</style>


<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">User Roles</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Roles</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="main-content">
        <button type="button" class="btn btn-primary mb-2 btn-sm" data-toggle="modal" data-target="#exampleModal">
            Add New User
        </button>
        <div class="table-responsive card p-3">
            <table class="table table-striped table-bordered mb-0 display" id="tableid">
                <thead>
                    <th class="border-top-0 ">#</th>
                    <th class="border-top-0 ">Username</th>
                    <th class="border-top-0">Date Created</th>
                    <th class="border-top-0">Status</th>
                    <th class="border-top-0">Finance</th>
                    <th class="border-top-0">Sales</th>
                    <th class="border-top-0">Management</th>
                    <th class="border-top-0"></th>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user['counter'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td>{{ $user['date_joined'] }}</td>
                        <td>
                            @if($user['status'])
                                <div class="d-flex flex-column justify-content-center">
                                    <p href="#" class="align-self-center text-success">Active</p>
                                </div>
                            @else
                                @if(!$user['status'])
                                    <div class="d-flex flex-column justify-content-center">
                                        <p href="#" class="align-self-center text-danger">Inactive</p>
                                    </div>
                                @else
                                    <div class="d-flex flex-column justify-content-center">
                                        <p href="#" class="align-self-center text-dark">-</p>
                                    </div>
                                @endif
                            @endif
                        </td>
                        @if(count($user['roles']) == 3)
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="finance" {{ ($user['roles'][0] == 'finance') ? 'checked' : ''}}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="sales" {{ ($user['roles'][1] == 'sales') ? 'checked' : '' }}>
                                </div> 
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="Management" onclick="return false;" value="management" {{ ($user['roles'][2] == 'management') ? 'checked' : '' }}>
                                </div>
                            </td>
                        @elseif(count($user['roles']) == 2)
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="finance" {{ ($user['roles'][0] == 'finance') ? 'checked' : ''}}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="sales" {{ ($user['roles'][1] == 'sales') ? 'checked' : '' }}>
                                </div> 
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="Management" onclick="return false;">
                                </div>
                            </td>
                        @elseif(count($user['roles']) == 1)
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="finance" {{ ($user['roles'][0] == 'finance') ? 'checked' : ''}}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="sales" {{ ($user['roles'][0] == 'sales') ? 'checked' : ''}}>
                                </div> 
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="Management" onclick="return false;" value="management" {{ ($user['roles'][0] == 'management') ? 'checked' : ''}}>
                                </div>
                            </td>
                        @else
                            <div class="d-flex flex-row justify-content-start">
                                <div>
                                    <input type="checkbox" id="finance" class="align-self-center" aria-label="Checkbox for following text input" name="finance" value="finance" >
                                    <label for="finance" class="align-self-center">Finance</label>
                                </div>
                                <div class="ml-2">
                                    <input type="checkbox" id="sales" class="align-self-center" aria-label="Checkbox for following text input" name="sales" value="sales" >
                                    <label for="sales" class="align-self-center">Sales</label>
                                </div>
                                <div class="ml-2">
                                    <input type="checkbox" class="align-self-center" id="management" aria-label="Checkbox for following text input" name="management" value="management" >
                                    <label for="management" class="align-self-center">Management</label>
                                </div>
                            </div>
                        @endif
                        <td>
                            <div class="d-flex flex-row justify-content-around">
                                <a class="btn btn-primary font-mini btn-edit-data" data-toggle="modal" data-target="#modalEditData" data-id="{{ $user['id'] }}">Edit</a>
                                <a class="ml-1 btn btn-primary font-mini btn-mini btn-change-pw" data-toggle="modal" data-target="#modalChangePW" data-id="{{ $user['id'] }}">Change PW</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <td colspan="14" class="text-center">No Data Available Now</td>
                    @endforelse
                </tbody>
            </table>            
        </div>
    </section>

</div>

@endsection

@section('modal')
<!-- Modal for Change Password -->
<div class="modal fade" id="modalChangePW" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<!-- Modal for Change Password -->
<div class="modal fade" id="modalEditData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<!--Modal Add New User-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/settings/addDataUser" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="d-flex flex-column justify-content-start">
                        <label for="name" class="h6">Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Type your Full Name">
                    </div>
                    <div class="d-flex flex-column justify-content-start mt-4">
                        <label for="nric" class="h6">NRIC</label>
                        <input class="form-control" type="text" name="nric" id="nric" placeholder="Type your NRIC">
                    </div>
                    <div class="d-flex flex-column justify-content-start mt-4">
                      <label for="email" class="h6">Email</label>
                      <input class="form-control" type="text" name="email" id="email" placeholder="Type your Email">
                    </div>
                    <div class="d-flex flex-column justify-content-start mt-4">
                        <label for="password" class="h6">Password</label>
                        <div class="d-flex flex-row justify-content-start">
                            <input class="form-control unique" type="password" name="password" id="password" placeholder="Type Your Password">
                            <div class="form-control width-super-mini">
                                <i class="bi bi-eye-slash align-self-center" id="togglePassword"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-start mt-4">
                        <label for="retypePassword" class="h6">Retype Password</label>
                        <div class="d-flex flex-row justify-content-start">
                            <input class="form-control unique" type="password" name="retypePassword" id="retypePassword" placeholder="Retype Your Password">
                            <div class="form-control width-super-mini">
                                <i class="bi bi-eye-slash align-self-center" id="toggleRetypePassword"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-start mt-4">
                        <label for="phone" class="h6">Phone</label>
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Type your Phone">
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
                                    <input type="checkbox" id="finance" class="align-self-center" aria-label="Checkbox for following text input" name="finance" value="finance" >
                                    <label for="finance" class="align-self-center">Finance</label>
                                </div>
                                <div class="ml-2">
                                    <input type="checkbox" id="sales" class="align-self-center" aria-label="Checkbox for following text input" name="sales" value="sales" >
                                    <label for="sales" class="align-self-center">Sales</label>
                                </div>
                                <div class="ml-2">
                                    <input type="checkbox" class="align-self-center" id="management" aria-label="Checkbox for following text input" name="management" value="management" >
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
        </div>
      </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready( function () {
            $('#tableid').DataTable();

            $('.btn-change-pw').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: `/dashboard/settings/getDataModalPW/${id}`,
                    type: 'GET',
                    success: function(data){
                        $('#modalChangePW').find('.modal-content').html(data);
                        $('#modalChangePW').modal('show');
                    }
                });
            });

            $('.btn-edit-data').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: `/dashboard/settings/getDataModalEdit/${id}`,
                    type: 'GET',
                    success: function(data){
                        $('#modalEditData').find('.modal-content').html(data);
                        $('#modalEditData').modal('show');
                    }
                });
            });

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
        } );
    </script>
@endpush
