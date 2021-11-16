@extends('layouts.app')

@section('header')
<style>
#date-navigation {
    display: flex;
    align-items: center;
}
#date-navigation ul,
#date-navigation form {
    flex-flow: row nowrap;
    align-items: center;
}
#date-navigation ul li a {
    padding: 0.25rem 0.75rem;
}

#date-navigation form {
    margin-left: 1rem;
}
#date-navigation form .form-control {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
#date-navigation form .btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
@media screen and (max-width: 768px) {
    #date-navigation {
        display: flex;
        flex-direction: column;
    }
    #date-navigation ul {
        padding: .5rem;
        border: 1px solid #ced4da;
        border-bottom: 0;
        border-radius: .5rem .5rem 0 0;
    }
    #date-navigation form {
        margin-left: 0;
    }
    #date-navigation form .form-control {
        border-top-left-radius: 0;
    }
    #date-navigation form .btn {
        border-top-right-radius: 0;
    }
    #date-navigation form,
    #date-navigation ul {
        width: 100%;
        flex-basis: 100%;
    }
}
</style>
@endsection

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Dashboard</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="https://www.smartfunding.sg">SmartFunding Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Content -->
    <section id="content-wrapper">

        <div class="row">
            <!-- Loan Summary -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-white"><h5 class="mb-0">Loan Summary</h5></div>
                    <div class="card-body">
                        <canvas id="loan-summary" height="250px"></canvas>
                    </div>
                </div>
            </div>

            <!-- Profit Summary -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-white"><h5 class="mb-0">Profit Summary</h5></div>
                    <div class="card-body">
                        <canvas id="loan-summary" height="250px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Table Loan Summary -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Data Loan and Applicant(s) Summary</h5>
            </div>
            <div class="table-responsive">
                <table class="table-striped table mb-0">
                    <thead>
                        <tr>
                            <th>User Count</th>
                            <th>Today</th>
                            <th>Week</th>
                            <th>Month of Date</th>
                            <th>Year of Date</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Borrower(s)</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Applicant(s)</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection

@section('footer')
<script src="{{ asset('vendor/chartjs/chart.min.js') }}"></script>
<script>
</script>
@endsection
