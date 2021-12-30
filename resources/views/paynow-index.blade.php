@extends('layouts.home')

@section('content')

<div class="container py-5">
  <div class="heading h4 text-primary text-center text-lg-left mx-0 mx-md-5 px-0 px-lg-5">
    <h3 class="h2 d-block"><span class="text-info">SMART</span>FUNDING <span class="text-info">DIRECT</span></h3>
  </div>

  <div class="mx-md-5 mx-0" style="position: relative">

    <div class="card p-0 p-md-4 m-md-5 m-0 mb-0">
      <div class="card-body">
        <h3 class="text-center text-lg-left">Loan Details</h3>

        <div class="row justify-content-center align-items-center">
          <div class="col-lg-8">
            <form action="{{ route('pay.checking') }}" method="post">
              @csrf

              <div class="form-group py-3 py-lg-5 m-0 m-md-4 text-center text-lg-left">
                <label for="number" style="font-weight: 600;">Loan Account Number</label>
                <div class="row mt-1">
                  <div class="col-lg-8 mb-4 mb-md-0">
                    <input type="text" class="form-control" id="number" name="number" placeholder="Enter your loan identification number" {{ old('number') ? "value=\"" . old('number') . "\"" : '' }} />
                  </div>
                  <div class="col-lg-4 d-flex justify-content-center">
                    <button class="btn-info btn d-lg-none mx-auto d-xs-block py-2 py-md-2 mt-4 mt-lg-0" type="submit" style="color: white; border-radius:50px; width: 40%">Process</button>
                    <button class="btn-block d-none d-md-none d-lg-block btn-info btn" type="submit" style="color: white; border-radius:50px">Process</button>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
    <img src="{{ asset('images/pay-man.png') }}" alt="Man" class="d-none d-md-block d-sm-none" style="position: absolute;bottom: -6.5rem;right: -10rem;height: 23rem;" />

  </div>
</div>

@endsection
