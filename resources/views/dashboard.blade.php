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
          <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
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
          <div class="card-header bg-white d-flex justify-content-between">
            <h5 class="mb-0">Loan Summary</h5>

            <div class="dropdown no-caret">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                <div class="sr-only">More</div>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item active" data-retrive="today" href="#">Load Today</a>
                <a class="dropdown-item" data-retrive="t_month" href="#">Load This Month</a>
                <a class="dropdown-item" data-retrive="l_month" href="#">Load Last Month</a>
                <a class="dropdown-item" data-retrive="year" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <canvas id="loan-summary" height="100px"></canvas>
          </div>
        </div>
      </div>

      <!-- Profit Summary -->
      <div class="col-md-6 mb-3">
        <div class="card">
          <div class="card-header bg-white">
            <h5 class="mb-0">Profit Summary</h5>
          </div>
          <div class="card-body">
            <canvas id="profit-summary" height="250px"></canvas>
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
              <td>{{ $counter_borrow_day }} borrower(s)</td>
              <td>{{ $counter_borrow_week }} borrower(s)</td>
              <td>{{ $counter_borrow_month }} borrower(s)</td>
              <td>{{ $counter_borrow_year }} borrower(s)</td>
              <td>{{ $counter_borrow_all }} borrower(s)</td>
            </tr>
            <tr>
              <td>Applicant(s)</td>
              <td>{{ $counter_apply_day }} loan(s)</td>
              <td>{{ $counter_apply_week }} loan(s)</td>
              <td>{{ $counter_apply_month }} loan(s)</td>
              <td>{{ $counter_apply_year }} loan(s)</td>
              <td>{{ $counter_apply_all }} loan(s)</td>
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
// Default
const chartSum = document.getElementById('loan-summary');
const chartSummary = new Chart(chartSum, {
  type: 'doughnut',
  data: {
    labels: ['Loan Applied', 'Loan Approved', 'Loan Rejected'],
    datasets: [{
      label: 'The Loan',
      data: [126, 555, 1667],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      borderWidth: 2
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        display: false,
      },
      x: {
        display: false,
      }
    }
  }
});

const profitSum = document.getElementById('profit-summary');
const profitSummary = new Chart(profitSum, {
  type: 'bar',
  data: {
    labels: ['Data 1', 'Data 2', 'Data 3', 'Data 4', 'Data 5', 'Data 6', 'Data 7'],
    datasets: [{
      label: '# Loan(s)',
      data: [1,2,3,4,5,6,7],
      backgroundColor: 'rgba(21,40,96, 1)',
    }]
  },
  options: {
    responsive: true,
    plugins: {
      tooltip: {
        callbacks: {
          label: function(context) {
            return context.parsed.y + ' loan(s)';
          }
        }
      },
      legend: {
        display: false,
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        display: false,
      },
      x: {
        display: false,
      }
    }
  }
});
</script>
@endsection
