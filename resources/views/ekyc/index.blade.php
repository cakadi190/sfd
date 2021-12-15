@extends('layouts.app')

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">EKYC Log</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">EKYC Log</li>
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
                    <tr>
                        <td>1</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if($user->status == 1)
                                <a href="#" class="btn-primary">Active</a>
                            @else
                                <a href="#">Inactive</a>
                            @endif
                        </td>
                        <td>
                            <input type="checkbox" aria-label="Checkbox for following text input" name="finance">
                        </td>
                        <td>
                            <input type="checkbox" aria-label="Checkbox for following text input" name="finance">
                        </td>
                        <td>
                            <input type="checkbox" aria-label="Checkbox for following text input" name="finance">
                        </td>
                        <td>
                            <input type="checkbox" aria-label="Checkbox for following text input" name="finance">
                        </td>
                        <td>
                            <a class="btn btn-primary font-mini btn-detail-borrower" data-toggle="modal" data-target="#modalDetailData">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-primary font-mini btn-mini btn-detail-borrower" data-toggle="modal" data-target="#modalDetailData">Change PW</a>
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

@push('js')
    <script>
        $(document).ready( function () {
            $('#tableid').DataTable();
        } );
    </script>
@endpush
