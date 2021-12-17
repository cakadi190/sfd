@extends('layouts.app')

@section('content')
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
                            @if($user['status'] == 1)
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="#" class="align-self-center text-success">Active</a>
                                </div>
                            @else
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="#" class="align-self-center text-danger">Inactive</a>
                                </div>
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
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="sales">
                                </div> 
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center mt-1">
                                    <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="Management" onclick="return false;">
                                </div>
                            </td>
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
        } );
    </script>
@endpush
