@extends('layouts.app')

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Sales</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sales</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="main-content">
        <div class="table-responsive card p-3">
            <table class="table table-striped table-bordered mb-0 display" id="tableid">
                <thead>
                    <th class="border-top-0">Week</th>
                    <th class="border-top-0">Total Application</th>
                    <th class="border-top-0">Total Loan Applied (RM)</th>
                    <th class="border-top-0">Total Loan Approved (RM)</th>
                    <th class="border-top-0">Total Loan Rejected (RM)</th>
                    <th class="border-top-0">Total Loan Disbursed (RM)</th>
                    <th class="border-top-0">Total Bad Debt (RM)</th>
                </thead>
                <tbody>
                    <tr>
                        @forelse ($data as $d)
                            <td class="text-center">{{ $d['week'] }}</td>
                            <td class="text-center">{{ $d['total_applications'] }}</td>
                            <td class="text-center">{{ $d['total_loan_applied'] }}</td>
                            <td class="text-center">{{ $d['total_loan_approve'] }}</td>
                            <td class="text-center">{{ $d['total_loan_rejected'] }}</td>
                            <td class="text-center">{{ $d['total_loan_disbursed'] }}</td>
                            <td class="text-center">{{ $d['total_bad_debt'] }}</td>
                        @empty
                            <td colspan="7" class="text-center">No Data Available Now</td>
                        @endforelse
                    </tr>
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