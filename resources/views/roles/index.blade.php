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
            <table class="table table-striped border-top-0 mb-0">
                <thead>
                    <th class="border-top-0 ">#</th>
                    <th class="border-top-0 ">Username</th>
                    <th class="border-top-0">Date Created</th>
                    <th class="border-top-0">Status</th>
                    <th class="border-top-0">Finance</th>
                    <th class="border-top-0">Sales</th>
                    <th class="border-top-0">Management</th>
                    <th class="border-top-0" colspan="3"></th>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <?php
                        $count = 1;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if($user->status == 1)
                                <a href="#">Active</a>
                            @else
                                <a href="#">Inactive</a>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center mt-1">
                                <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="finance" {{ ($user->state == 'finance') ? 'checked' : ''}}>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center mt-1">
                                <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="finance" onclick="return false;" value="sales" {{ ($user->state == 'sales') ? 'checked' : '' }}>
                            </div> 
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center mt-1">
                                <input type="checkbox" class="align-self-center" aria-label="Checkbox for following text input" name="Management" onclick="return false;" value="management" {{ ($user->state == 'management') ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-primary font-mini btn-edit-data" data-toggle="modal" data-target="#modalEditData" data-id="{{ $user->id }}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-primary font-mini btn-mini btn-change-pw" data-toggle="modal" data-target="#modalChangePW" data-id="{{ $user->id }}">Change PW</a>
                        </td>

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
                    </tr>
                    <?php
                        $count++;
                    ?>
                    @empty
                        <td colspan="14" class="text-center">No Data Available Now</td>
                    @endforelse
                </tbody>
            </table>
            
        </div>
    </section>

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
