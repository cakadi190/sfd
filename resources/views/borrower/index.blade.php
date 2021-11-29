@extends('layouts.app')

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Borrower List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Borrower List</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="main-content">
        <div class="table-responsive card">
            <table class="table table-striped border-top-0 mb-0">
                <thead>
                    <th class="border-top-0">Merchant</th>
                    <th class="border-top-0">Level</th>
                    <th class="border-top-0">Orders</th>
                    <th class="border-top-0">Sales</th>
                    <th class="border-top-0">FC</th>
                    <th class="border-top-0">Default Rate</th>
                    <th class="border-top-0">Refund</th>
                    <th class="border-top-0">AV/Day</th>
                    <th class="border-top-0">AVO/Day</th>
                    <th class="border-top-0">Rebate</th>
                </thead>
                <tbody>
                    <td colspan="10" class="text-center">No Data Available Now</td>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
