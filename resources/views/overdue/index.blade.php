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
        <div class="table-responsive card">
            <table class="table table-striped border-top-0 mb-0">
                <thead>
                    <th class="border-top-0">Date Joined</th>
                    <th class="border-top-0 cl-red">Date Overdue</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Details</th>
                    <th class="border-top-0">Overdue</th>
                    <th class="border-top-0">Late Charge</th>
                    <th class="border-top-0">Waived</th>
                    <th class="border-top-0">Transaction</th>
                </thead>
                <tbody>
                    @forelse($data as $d)
                        <td>{{ $d['borrower']->disbursed_at }}</td>
                        <td>{{ $d['payment_sequence']->due_date }}</td>
                        <td>{{ $d['borrower']->fullname }}</td>
                        <td>
                            <div>
                                {{ $d['borrower']->nric }}
                            </div>
                            <div>
                                {{ $d['borrower']->phone }}
                            </div>
                            <div>
                                {{ $d['borrower']->email }}
                            </div>
                        </td>
                        <td>{{ $d['overdue'] }}</td>
                        <td>{{ $d['late_charge'] }}</td>
                        <td>{{ $d['waived'] }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Transaction</a>
                        </td>
                    @empty
                        <td colspan="14" class="text-center">No Data Available Now</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
