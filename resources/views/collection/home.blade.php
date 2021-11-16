@extends('layouts.app')

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Collection Report</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="https://www.smartfunding.sg">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Collection Report</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="main-content">
        <div class="table-responsive card">
            <table class="table table-striped border-top-0 mb-0">
                <thead>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Shopper ID</th>
                    <th class="border-top-0">Date</th>
                    <th class="border-top-0">Time</th>
                    <th class="border-top-0">Merchant ID</th>
                    <th class="border-top-0">T.ID</th>
                    <th class="border-top-0">ID</th>
                    <th class="border-top-0">Amount</th>
                    <th class="border-top-0">Late Change</th>
                    <th class="border-top-0">Total</th>
                </thead>
                <tbody>
                    <td colspan="10" class="text-center">No Data Available Now</td>
                </tbody>
            </table>
        </div>
    </section>

</div>
@endsection
