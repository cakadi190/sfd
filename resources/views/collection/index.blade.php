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
            <table class="table table-striped table-bordered mb-0" id="tableid">
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
                    @forelse($detailPayment as $dp)
                    <tr>
                        <td>{{ $dp->loan_id }}</td>
                        <td>{{ $dp->fullname }}</td>
                        <td>{{ $dp->email }}</td>
                        <td>{{ $dp->nric }}</td>
                        <td>{{ $dp->finance_amount }}</td>
                        <td>{{ $dp->payment_seq()->get()->first()->current_payment_seq }} of {{ $dp->payment_seq()->get()->first()->max_payment_seq }}</td>
                        <td>{{ $dp->payment_seq()->get()->first()->ammount }}</td>
                        <td>{{ $dp->payment_seq()->get()->first()->due_date }}</td>
                        <td>{{ $dp->payment_seq()->get()->first()->paid_at }}</td>
                        <td>{{ $dp->payment_seq()->get()->first()->payment_method }}</td>
                        <td>{{ $dp->payment_seq()->get()->first()->officer }}</td>
                        <td>{{ $dp->payment_seq()->get()->first()->status }}</td>
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
