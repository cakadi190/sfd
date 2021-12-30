@extends('layouts.home')

@section('content')

<div class="container py-5">
  <div class="heading h4 text-primary mx-0 mx-md-5 px-0 px-md-5">
    <h3 class="h2 d-block"><span class="text-info">SMART</span>FUNDING <span class="text-info">DIRECT</span> Loan Application</h3>
  </div>

  <div class="mx-md-5 mx-0" style="position: relative">

    <div class="card p-0 p-md-5 m-md-5 m-0 mb-0">
      <div class="card-body">
        <h3 class="h5 text-center" style="font-weight: 600">Loan Account Number</h3>
        <div class="text-center text-info my-3" style="font-weight: 600">{{ $data->loan_id }}</div>

        <div class="row justify-content-center align-items-center">
          <div class="col-lg-5">

            <div class="card card-body bg-primary">

              <div class="text-center text-white">
                <p class="m-0">Outstanding this month</p>
                <p class="font-weight-bold">{{ Carbon\Carbon::parse($data->period)->format('M Y') }}</p>

                <h3 class="mt-5 mb-2">{{ number_format($data->finance_amount, 2, '.', ',') }}</h3>

                <a href="" class="btn btn-info py-2 px-4" style="border-radius: 50rem; color: white;">Make Payment</a>

                <div class="mt-5 text-sm" style="font-size: .9rem">For any late repayment, late payment fees & finance charges will be applied.</div>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>
    <img src="{{ asset('images/pay-man.png') }}" alt="Man" class="d-none d-md-block d-sm-none" style="position: absolute;bottom: -6.5rem;right: -10rem;height: 23rem;" />

  </div>
</div>

@endsection
