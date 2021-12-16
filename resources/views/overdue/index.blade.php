@extends('layouts.app')

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Overdue Installment</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Overdue Installment</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="main-content">
        <div class="table-responsive card p-3">
            <table class="table table-striped table-bordered mb-0 display" id="tableid">
                <thead>
                    <th class="border-top-0">Date Joined</th>
                    <th class="border-top-0 text-danger">Date Overdue</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Details</th>
                    <th class="border-top-0">Overdue</th>
                    <th class="border-top-0">Late Charge</th>
                    <th class="border-top-0">Total</th>
                </thead>
                <tbody>
                    @forelse($data as $d)
                    <tr>
                        <td>{{ $d['date_joined'] }}</td>
                        <td>{{ $d['date_overdue'] }}</td>
                        <td>{{ $d['name'] }}</td>
                        <td>
                            <div>
                                {{ $d['nric'] }}
                            </div>
                            <div>
                                {{ $d['phone'] }}
                            </div>
                            <div>
                                {{ $d['email'] }}
                            </div>
                        </td>
                        <td>{{ $d['day_overdue'] }} Day</td>
                        <td>{{ $d['late_charge'] }}</td>
                        <td>{{ $d['total'] }}</td>
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
    });
</script>
@endpush
