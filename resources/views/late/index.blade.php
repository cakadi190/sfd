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
        <div class="table-responsive card">
            <table class="table table-striped border-top-0 mb-0">
                <thead>
                    <th class="border-top-0">Date, Time</th>
                    <th class="border-top-0">Loan ID</th>
                    <th class="border-top-0">Status</th>
                    <th class="border-top-0">Borrower Name</th>
                    <th class="border-top-0">Ammount</th>
                    <th class="border-top-0">Late Charge</th>
                    <th class="border-top-0">Installment</th>
                </thead>
                <tbody>
                    <td colspan="8" class="text-center">No Data Available Now</td>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
