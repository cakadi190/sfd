@extends('layouts.app')

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Collection Report</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Collection Report</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="main-content">
        <div class="table-responsive card p-3">
            <table class="table table-striped table-bordered mb-0 display" id="tableid">
                <thead>
                    <th class="border-top-0 ">Loan ID</th>
                    <th class="border-top-0">Full Name</th>
                    <th class="border-top-0">Email</th>
                    <th class="border-top-0">NRIC</th>
                    <th class="border-top-0">Total Loan</th>
                    <th class="border-top-0">Payment Sequence</th>
                    <th class="border-top-0">Payment Ammount</th>
                    <th class="border-top-0">Due Date</th>
                    <th class="border-top-0">Paid At</th>
                    <th class="border-top-0">Payment Method</th>
                    <th class="border-top-0">Officer</th>
                    <th class="border-top-0">Status</th>
                </thead>
                <tbody>
                    @forelse($collection as $c)
                    <tr>
                        <td>{{ $c['loan_id'] }}</td>
                        <td>{{ $c['fullname'] }}</td>
                        <td>{{ $c['email'] }}</td>
                        <td>{{ $c['nric'] }}</td>
                        <td>{{ $c['total_loan'] }}</td>
                        <td>{{ $c['current_payment_seq'] }} of {{ $c['current_payment_seq'] }}</td>
                        <td>{{ $c['payment_ammount'] }}</td>
                        <td>{{ $c['due_date'] }}</td>
                        <td>{{ $c['paid_at'] }}</td>
                        <td>{{ $c['payment_method'] }}</td>
                        <td>{{ $c['officer'] }}</td>
                        <td>
                            @if($c['status'] == 'Paid')
                                <div class="bg-success box-custom d-flex flex-column p-1 justify-content-center">
                                    <div class="text-light align-self-center">Paid</div>
                                </div>
                            @elseif($c['status'] == 'Pending')
                                <div class="bg-warning box-custom d-flex flex-column p-1 justify-content-center">
                                    <div class="text-dark align-self-center">Pending</div>
                                </div>
                            @elseif($c['status'] == 'Late')
                                <div class="bg-warning box-custom d-flex flex-column p-1 justify-content-center">
                                    <div class="text-dark align-self-center">Late</div>
                                </div>
                            @else
                                <div class="bg-danger box-custom d-flex flex-column p-1 justify-content-center">
                                    <div class="text-light align-self-center">Overdue</div>
                                </div>
                            @endif
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
        });
    </script>
@endpush
