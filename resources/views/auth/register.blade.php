@extends('layouts.home')

@section('title', 'Register | ' . config('app.name'))

@section('header')
<link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}" type="text/css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('dropify_multiple/dropify_multiple.min.css') }}">
{!! RecaptchaV3::initJs() !!}

<style>
  #phone_prefix{
    width: 35% !important;
  }
  #phone{
    width: 65% !important;
  }
  .input-group > .select2-container--bootstrap4 {
    width: auto;
    flex: 1 1 auto;
  }

  .input-group > .select2-container--bootstrap4 .select2-selection--single {
    height: 100%;
    line-height: inherit;
    padding: 0.5rem 1rem;
  }

  /* .grecaptcha-badge { visibility: hidden !important; } */
  /* Navbar */
  .navbar .btn-primary {
    padding: 0.5rem 1.25rem;
    border-radius: 50rem;
  }
  @media    screen and (min-width: 768px) {
    .navbar .btn-primary {
      margin-left: 1rem;
    }
  }

  /* Calendar */
  .calendar .datepicker {
    position: relative;
  }
  .calendar .calendar-icon svg {
    width: 20px;
    height: 20px;
    position: absolute;
    top: 8px;
    right: 14px;
  }

  /* Button */
  .btn-next {
    padding: 1rem 2rem;
    border-radius: 50rem;
    font-weight: 600;
    background: #27BEFF;
  }
  .btn-prev {
    border: 1px solid #27BEFF;
    padding: 1rem 2rem;
    border-radius: 50rem;
    font-weight: 600;
  }
  @media    screen and (max-width: 992px) {
    .btn-prev, .btn-next {
      font-size: 1rem;
    }
  }

  /* Radio Selector */
  .period-selector {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .5rem;
    border-radius: 5rem;
    background: rgba(0,0,0,.1);
  }
  .period-selector .period-wrapper {
    flex: 1;
    align-items: center;
    display: flex;
  }
  .period-selector .period-wrapper {
    align-items: center;
    display: flex;
    justify-content: center;
  }
  .period-selector input {
    display: none;
  }
  .period-selector label {
    display: none;
    border-radius: 5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.5rem;
    padding: 0;
    margin: 0;
    cursor: pointer;
    transition: all .2s;
    width: 60px;
    height: 60px;
  }
  .period-selector input:checked ~ label {
    background: #003366;
    color: white;
  }

  /* Navgiasi */
  .nav-stepper {
    flex-direction: row;
    justify-content: space-between;
  }
  .nav-stepper .nav-link.active,
  .nav-stepper .nav-link {
    background: transparent;
    color: #6c757d;
    display: flex;
    padding: 0;
    justify-content: center;
    align-items: center;
    font-weight: bold;
  }

  .nav-stepper .nav-link {
    opacity: .75;
    font-weight: bold;
  }

  .nav-stepper .nav-link .nav-number {
    width: 40px;
    height: 40px;
    margin-right: .5rem;
    border-radius: 75px;
    font-weight: bold;
    border: 2px solid rgb(217, 224, 231);
    display: flex;
    justify-content: center;
    align-items: center;
    color: #1D2C62;
    background: linear-gradient(-180deg, rgba(185, 199, 214, .5), rgba(185, 199, 214, 1));
  }
  @media    screen and (max-width: 993px) {
    .nav-stepper .nav-link .nav-content {
      display: none;
    }
    .nav-stepper .nav-link .nav-number {
      width: 54px;
      height: 54px;
      margin: 0;
    }
  }

  .nav-stepper .nav-link.active {
    opacity: 1;
    color: #  152860;
  }
  .nav-stepper .nav-link.active .nav-number,
  .nav-stepper .nav-link.completed .nav-number {
    color: #fff;
    background: #27BEFF;
  }

  /* Breadcrumb */
  .counter-tab {
    width: 100%;
    background: rgba(255,255,255, .1);
    padding: .25rem;
    border-radius: 5rem;
  }
  @media    screen and (max-width: 768px) {
    .counter-tab {
      border-radius: 1.5rem;
    }
  }

  .counter-tab .nav-item {
    flex: 1;
  }
  .counter-tab .nav-link {
    color: white;
    border-radius: 5rem;
  }
  .counter-tab .nav-link.active {
    background: #00B2FF;
    font-weight: 600;
  }

  /* Dropify Wrapper */
  .dropify-wrapper {
    border: 2px dashed var(--primary);
    background: rgba(0,0,0,.03);
    border-radius: 0.5rem;
  }
  .dropify-wrapper .dropify-message {
    font-size: 1rem !important;
    padding: 1.75rem 0;
  }

  div#upload-wrapper {
    padding: 0 2rem;
    background: rgba(0, 0, 0, .03);
    border: 2px dashed #152860;
    border-radius: .5rem;
  }

  #upload-wrapper .dropify-wrapper {
    border: 0;
    background: transparent;
    padding: 0 !important;
    border-radius: 0;
  }

  #upload-wrapper .dropify-message {
    padding: 1.5rem 0;
    margin: 0;
    border-bottom: 1px solid #CFCFCF;
  }

  #upload-wrapper .dropify-wrapper:last-child .dropify-message {
    border-bottom: 0;
  }

  /* Card */
  @media    screen and (min-width: 992px) {
    .card.card-body:not(.none) {
      padding: 4rem;
    }
  }
  .card.card-body:not(.none) {
    padding-bottom: 3rem;
  }
  .card.card-body.none {
    border-radius: 1rem;
    padding-top: 2.5rem;
  }
</style>

<style>
  .footer #footer-top {
    background: #003366;
    color: white;
    padding: 2rem 0;
  }

  .footer #footer-bottom {
    background: #002E5C;
    color: white;
    padding: 1rem 0;
  }

  .social-media .nav-link {
    background: white;
    border-radius: 50px;
    width: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: .5rem;
    height: 2.5rem;
  }
</style>

@endsection

@section('content')
<div class="container py-5">

  <div class="heading h4 text-primary">
    <h3 class="h2"><span class="text-info">SMART</span>FUNDING <span class="text-info">DIRECT</span> Loan Application</h3>
  </div>

  <ul class="nav nav-stepper nav-pills my-5" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="pills-one-tab" data-index="1" data-toggle="pill" href="#pills-one" role="tab" aria-controls="pills-one" aria-selected="true">
        <div class="nav-number">1</div>
        <div class="nav-content">Loan Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-two-tab" data-index="2" data-toggle="pill" href="#pills-two" role="tab" aria-controls="pills-two" aria-selected="false">
        <div class="nav-number">2</div>
        <div class="nav-content">Personal Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-income-tab" data-index="3" data-toggle="pill" href="#pills-income" role="tab" aria-controls="pills-income" aria-selected="false">
        <div class="nav-number">3</div>
        <div class="nav-content">Income & Employment Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-upload-tab" data-index="4" data-toggle="pill" href="#pills-upload" role="tab" aria-controls="pills-upload" aria-selected="false">
        <div class="nav-number">4</div>
        <div class="nav-content">Upload the Documents & Submit</div>
      </a>
    </li>
  </ul>

  <div class="card card-body">

    <form class="tab-content" method="POST" enctype="multipart/form-data" novalidate action="{{ route('register.process') }}">
      @csrf

      <!-- Tab Pertama -->
      <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
        <div class="tab-container pb-4 pt-1 px-3">

          <div class="row justify-content-between">
            <div class="col-md-6">

              <h3 class="heading h4 mb-3 mb-md-5">Loan Details</h3>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex" for="finance_amount">Loan Amount <div class="text-danger">*</div></label>
                <input type="text" class="form-control" onkeyup="loanCalc()" value="{{ old('finance_amount') }}" placeholder="Enter the loan amount" id="finance_amount" name="finance_amount" required/>

                @error('finance_amount')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex">Period (years) <div class="text-danger">*</div></label>

                <div class="period-selector">
                  <div class="period-wrapper">
                    <input type="radio" data-period="1" checked onchange="loanCalc()" name="period"{{ old('period') == 'annually' ? ' checked' : '' }} id="annually" value="annually" required/>
                    <label for="annually">1</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" data-period="2" onchange="loanCalc()" name="period"{{ old('period') == 'binneally' ? ' checked' : '' }} id="binneally" value="binneally" required/>
                    <label for="binneally">2</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" data-period="3" onchange="loanCalc()" name="period"{{ old('period') == 'trienally' ? ' checked' : '' }} id="trienally" value="trienally" required/>
                    <label for="trienally">3</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" data-period="4" onchange="loanCalc()" name="period"{{ old('period') == 'quadrennially' ? ' checked' : '' }} id="quadrennially" value="quadrennially" required/>
                    <label for="quadrennially">4</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" data-period="5" onchange="loanCalc()" name="period"{{ old('period') == 'quinquenially' ? ' checked' : '' }} id="quinquenially" value="quinquenially" required/>
                    <label for="quinquenially">5</label>
                  </div>
                </div>

                @error('periode')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

              <div class="form-group">
                <label class="font-weight-bold d-flex" for="purpose">Purpose <div class="text-danger">*</div></label>
                <select name="purpose" id="purpose" class="form-control selecting" required>
                  <option disabled selected="selected">Select</option>
                  <option value="Business Venture" {{old('purpose')=='Business Venture'?'selected':''}}>01 - Business Venture</option>
                  <option value="Debt Consolidation" {{old('purpose')=='Debt Consolidation'?'selected':''}}>02 - Debt Consolidation</option>
                  <option value="Wedding" {{old('purpose')=='Wedding'?'selected':''}}>03 - Wedding</option>
                  <option value="Special Occasion" {{old('purpose')=='Special Occasion'?'selected':''}}>04 - Special Occasion</option>
                  <option value="Vacation" {{old('purpose')=='Vacation'?'selected':''}}>05 - Vacation</option>
                  <option value="Credit Card Payment" {{old('purpose')=='Credit Card Payment'?'selected':''}}>06 - Credit Card Payment</option>
                  <option value="Gambling" {{old('purpose')=='Gambling'?'selected':''}}>07 - Gambling</option>
                  <option value="Shopping" {{old('purpose')=='Shopping'?'selected':''}}>08 - Shopping</option>
                  <option value="Living Cost" {{old('purpose')=='Living Cost'?'selected':''}}>09 - Living Cost</option>
                  <option value="Bill Payment" {{old('purpose')=='Bill Payment'?'selected':''}}>10 - Bill Payment</option>
                  <option value="Education" {{old('purpose')=='Education'?'selected':''}}>11 - Education</option>
                  <option value="Housing" {{old('purpose')=='Housing'?'selected':''}}>12 - Housing</option>
                  <option value="Hobby" {{old('purpose')=='Hobby'?'selected':''}}>13 - Hobby</option>
                  <option value="Motor Purchase" {{old('purpose')=='Motor Purchase'?'selected':''}}>14 - Motor Purchase</option>
                  <option value="Home Improvements" {{old('purpose')=='Home Improvements'?'selected':''}}>15 - Home Improvements</option>
                  <option value="Investment" {{old('purpose')=='Investment'?'selected':''}}>16 - Investment</option>
                  <option value="Other" {{old('purpose')=='Other'?'selected':''}}>17 - Other</option>
                </select>

                @error('purpose')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

            </div>
            <div class="col-md-5">

              <div class="card none card-body mr-0 mr-lg-4 bg-primary text-white text-center">
                <h5 class="h6 mb-4 font-weight-normal">Estimated Payment</h5>

                <div class="row justify-content-center">
                  <div class="col-12 col-md-10">

                    <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
                      <li class="nav-item"><a href="#pill-monthly-5" data-toggle="pill" class="nav-link active">Monthly</a></li>
                      <li class="nav-item"><a href="#pill-total-5" data-toggle="pill" class="nav-link">Total</a></li>
                    </ul>

                  </div>
                </div>

                <div class="text-center tab-content mb-2 py-5">
                  <div class="tab-pane fade active show" id="pill-monthly-5">
                    <h3 class="m-0 h1" id="calc-5">MYR 0</h3>
                  </div>
                  <div class="tab-pane fade" id="pill-total-5">
                    <h3 class="m-0 h1" id="calc-total-5">MYR 0</h3>
                  </div>
                </div>

                <p class="text-center">Interest rate 18% p.a.</p>
              </div>

            </div>
            <div class="col-lg-12">

              <div class="d-flex mr-3 mb-n3 justify-content-end">
                <a href="javascript:nextStep('pills-two')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
              </div>

            </div>
          </div>
        </div>

      </div>

      <!-- Tab Kedua -->
      <div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab">
        <div class="tab-container pb-3 pt-1 px-3">
          <h3 class="heading h4 mb-3 mb-md-5">Personal Details</h3>

          <div class="row justify-content-between">
            <div class="col-md-6">

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex" for="fullname">Name as NRIC <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ old('fullname') }}" id="fullname" name="fullname" placeholder="Enter your name" required/>

                @error('fullname')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex" for="nric">NRIC No <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ old('nric') }}" id="nric" name="nric" placeholder="Enter your NRIC" required/>

                @error('nric')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex" for="email">E-Mail <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ old('email') }}" value="{{ old('email') }}" id="email" name="email" placeholder="Enter your Email" required />

                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

            </div>
            <div class="col-md-5">

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex">Contact No <span class="text-danger">*</span></label>

                <div class="input-group">
                  <select name="phone_prefix" id="phone_prefix" class="form-control" required>
                    <option {{ (!old('phone_prefix')) ? "selected" : "" }} disabled>Choose One</option>
                    <option selected value="+65" {{ (old('phone_prefix') == "+65") ? "selected" : "" }}> (+65) SGP</option>
                    <option value="+60" {{ (old('phone_prefix') == "+60") ? "selected" : "" }}> (+60) MYL</option>
                    <option value="+62" {{ (old('phone_prefix') == "+62") ? "selected" : "" }}> (+62) INA</option>
                    <option value="+66" {{ (old('phone_prefix') == "+66") ? "selected" : "" }}> (+66) PHP</option>
                  </select>
                  <input type="text" width="75%" id="phone" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter the number phone" required/>
                </div>

                <div class="error-message"></div>
              </div>

              <div class="form-group calendar">
                <label class="font-weight-bold d-flex" for="birth_date">Date of Birth <span class="text-danger">*</span></label>
                <div class="datepicker">
                  <input type="text" class="form-control" value="{{ old('birth_date') }}" id="birth_date" name="birth_date" placeholder="Enter your Birth Date" required />
                  <div class="calendar-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="//www.w3.org/2000/svg">
                      <path d="M1.75 8.25C1.34 8.25 1 8.59 1 9C1 9.41 1.34 9.75 1.75 9.75C2.16 9.75 2.5 9.41 2.5 9C2.5 8.59 2.16 8.25 1.75 8.25Z" fill="#001E44"/>
                      <path d="M1.75 6.5V5.25C1.75 4.42 2.42 3.75 3.25 3.75H20.75C21.58 3.75 22.25 4.42 22.25 5.25V20.75C22.25 21.58 21.58 22.25 20.75 22.25H3.25C2.42 22.25 1.75 21.58 1.75 20.75V11.5H22.25" stroke="#001E44" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M6.75 1.25V6.25" stroke="#001E44" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M17.25 1.25V6.25" stroke="#001E44" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </div>

                  <div class="error-message"></div>
                </div>

                @error('birth_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

            </div>
          </div>

          <div class="d-flex mt-n1 justify-content-end">
            <a href="javascript:prevStep('pills-one', 'pills-two')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
            <a href="javascript:nextStep('pills-income')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
          </div>

        </div>
      </div>

      <!-- Tab Ketiga -->
      <div class="tab-pane fade" id="pills-income" role="tabpanel" aria-labelledby="pills-income-tab">
        <div class="tab-container pb-4 pt-1 px-3">
          <h3 class="heading h4 mb-3 mb-md-5">Income & Employment Details</h3>


          <div class="row justify-content-between">
            <div class="col-md-5">
              <div class="form-group mb-5">
                <label for="tax">Annual Pre-Tax Income</label>
                <input type="text" class="form-control" id="tax" name="tax" placeholder="Enter your Tax Income" value="{{old('tax')}}" required/>

                @error('tax')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label for="employment">Employment Status</label>
                <select name="employment" id="employment" class="form-control selecting w-100" required>
                  <option disabled>--[ Choose One ]--</option>
                  <option value="employed" {{old('employment')=='employed'?'selected':''}}>Employed</option>
                  <option value="unemployed" {{old('employment')=='unemployed'?'selected':''}}>Unemployed</option>
                </select>

                @error('employment')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="dependants">Number of Dependants</label>
                <input type="text" class="form-control" id="dependants" name="dependants" placeholder="Enter your number of Dependants" value="{{ old('dependants') }}" required/>

                @error('dependants')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="d-flex px-3 pt-2 justify-content-end">
                <a href="javascript:prevStep('pills-two', 'pills-income')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
                <a href="javascript:nextStep('pills-upload')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tab Keempat -->
      <div class="tab-pane fade" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
        <div class="tab-container pb-4 pt-1 px-3">
          <h3 class="heading h4 mb-3 mb-md-5">Upload the Documents & Submit</h3>

          <div class="row justify-content-between">
            <div class="col-md-6">

              <div class="form-group mb-5">
                <label><span class="font-weight-bold">Identity Card - Front</span> (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="id_front" id="single-drop" class="dropify" data-height="70" required/>

                @error('id_front')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

            </div>
            <div class="col-md-5">
              <label><strong>Latest 3 Months??? Pay Slip</strong> (Max size: 5MB)</label>

              <div id="upload-wrapper">
                <input type="file" name="pay_slip[1]" class="dropify" />
                <input type="file" name="pay_slip[2]" class="dropify" />
                <input type="file" name="pay_slip[3]" class="dropify" />
              </div>
            </div>
            <div class="col-md-6 mt-4">

              <div class="form-group mb-5">
                <label><span class="font-weight-bold">Identity Card - Back</span> (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="id_back" id="single-drop" class="dropify" data-height="70" required/>

                @error('id_back')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="error-message"></div>
              </div>

            </div>
            <div class="col-md-5 mt-4">
              <label><strong>Latest 3 Months??? Bank Statement</strong> (Max size: 5MB)</label>

              <div id="upload-wrapper">
                <input type="file" name="bank_statement[1]" class="dropify" />
                <input type="file" name="bank_statement[2]" class="dropify" />
                <input type="file" name="bank_statement[3]" class="dropify" />
              </div>
            </div>
          </div>

          <div class="custom-control form-group mb-3 custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="agree" name="agree" value="true" required/>
            <label class="custom-control-label" for="agree">I have read and agreed to provide my content, as written above in privacy notice, for the processing of the application.</label>

            @error('agree')
            <div class="text-danger">You must accept the privacy notice!</div>
            @enderror

            <div class="error-message"></div>
          </div>
        </div>
        {!! RecaptchaV3::field('register', $name='g-recaptcha-response') !!}
        <div class="d-flex pt-2 justify-content-end mt-3">
          <a href="javascript:prevStep('pills-income', 'pills-upload')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
          <button class="btn btn-info btn-next btn-lg" id="submitButton" type="submit">Submit</button>
        </div>
      </div>
    </form>
  </div>

</div>
@endsection

@section('footer')
<script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  if (window.performance) {
    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
      window.sessionStorage.removeItem("loan_amount");
      window.sessionStorage.removeItem("selected_period");
    }
  }

  /** Jquery Validation */
  $('form').validate({
    ignore: [],
    rules: {
      finance_amount: {
        required: true,
        number: true,
      },
      period: {
        required: true,
      },
      purpose: {
        required: true,
      },
      fullname: {
        required: true,
      },
      nric: {
        required: true,
      },
      email: {
        required: true,
      },
      phone_prefix: {
        required: true,
      },
      phone: {
        required: true,
      },
      agree: {
        required: true,
      },
      birth_date: {
        required: true,
      },
      tax: {
        required: true,
        number: true,
      },
      employment: {
        required: true,
      },
      dependants: {
        required: true,
      },
      id_front: {
        required: true,
      },
      id_back: {
        required: true,
      },
      pay_slips: {
        required: true,
      },
      bank_statements: {
        required: true,
      },
      utilities_slip: {
        required: true,
      },
      tax_declaration: {
        required: true,
      }
    },

    onfocusout: function (e) {
      this.element(e);
    },

    highlight: function (element) {
      jQuery(element).closest('.form-control').addClass('is-invalid');
      jQuery(element).closest('.form-control').removeClass('is-valid');
    },
    unhighlight: function (element) {
      jQuery(element).closest('.form-control').removeClass('is-invalid');
      jQuery(element).closest('.form-control').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
      $(element).parents('.form-group').find(".error-message").append(error);
    },
    invalidHandler(error, element) {
      let invalid = $('form').find('.is-invalid');
      let parent  = $(invalid[0]).parents('.tab-pane').attr('id');
      $(`.nav-stepper a[href="#${parent}"]`).tab('show');
    },

    submitHandler(form, element) {
      form.submit();
    }
  });

  /** Previous Stepper */
  function prevStep(targetElement, anchorEl) {
    $(`.nav-stepper #${anchorEl}`).addClass('disabled');
    $(`.nav-stepper a[href="#${targetElement}"]`).tab('show');

    let el = $('.nav-stepper .nav-link');
    el.each(function(e, element) {
      let active = $(element).hasClass('active');
      if(active) {
        let index = $(element).data('index');
        $(element).find('.nav-number').html(parseInt(index))
        $(`.nav-stepper .nav-link[data-index="${parseInt(index)+1}"]`).find('.nav-number').html(parseInt(index)+1)
        $(`.nav-stepper .nav-link[data-index="${parseInt(index)+1}"]`).removeClass('completed')
      }
    })
  }

  /** Next Stepper */
  function nextStep(targetElement) {
    $(`.nav-stepper a[href="#${targetElement}"]`).removeClass('disabled');
    $(`.nav-stepper a[href="#${targetElement}"]`).tab('show');

    let el = $('.nav-stepper .nav-link');
    el.each(function(e, element) {
      let active = $(element).hasClass('active');
      if(active) {
        let index = $(element).data('index');
        $(`.nav-stepper .nav-link[data-index="${parseInt(index)-1}"]`).find('.nav-number').html('<i class="fa-solid fa-check"></i>')
        $(`.nav-stepper .nav-link[data-index="${parseInt(index)-1}"]`).addClass('completed')
      }
    })
  }

  // Select2 Initialize
  $('select.selecting').select2({
    theme: 'bootstrap4 w-100',
  });

  // Loan Calculator
  var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'MYR',
  });

  function loanCalc() {
    window.sessionStorage.removeItem("loan_amount");
    window.sessionStorage.removeItem("selected_period");
    if($("#finance_amount").val()){
      let num = (+($("#finance_amount").val()).replace(",", ""));
      let selectedPeriod = +$('[name="period"]:checked').data('period');
      let calc;

      calc = ((num * 0.18) + num) / (12 * selectedPeriod);

      $('#calc-1, #calc-2, #calc-3, #calc-4, #calc-5').text(`${formatter.format(calc)}`);
      $('#calc-total-1, #calc-total-2, #calc-total-3, #calc-total-4, #calc-total-5').text(`${formatter.format(calc * (12 * selectedPeriod))}`);

      window.sessionStorage.setItem('loan_amount', calc);
      window.sessionStorage.setItem('selected_period', selectedPeriod);
    }else{
      let selectedPeriod = 0;
      let calc;

      calc = 0;

      $('#calc-1, #calc-2, #calc-3, #calc-4, #calc-5').text(`${formatter.format(calc)}`);
      $('#calc-total-1, #calc-total-2, #calc-total-3, #calc-total-4, #calc-total-5').text(`${formatter.format(calc * (12 * selectedPeriod))}`);

      window.sessionStorage.setItem('loan_amount', calc);
      window.sessionStorage.setItem('selected_period', selectedPeriod);
    }
  }

  // Date
  $('input#birth_date').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
  });

  /**
   * Dropdzone
   */
  $('.dropify').dropify({
    tpl: {
      message: '<div class="dropify-message" style="font-size: 1.25rem"><i class="fa-solid mr-2 fa-link"></i> <strong>Drag & Drop or <u class="text-info">Browse</u></strong></div>',
    }
  });

  const calcOld = window.sessionStorage.getItem("loan_amount");
  const selectedPeriodOld = window.sessionStorage.getItem('selected_period');
  if(calcOld){
    if(selectedPeriodOld){
      $('#calc-1, #calc-2, #calc-3, #calc-4, #calc-5').text(`${formatter.format(calcOld)}`);
      $('#calc-total-1, #calc-total-2, #calc-total-3, #calc-total-4, #calc-total-5').text(`${formatter.format(calcOld * (12 * selectedPeriodOld))}`);
    }
  }

  Number.prototype.format = function(n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
  };

  $("#finance_amount").focus(function(){
    let value = $(this).val().replace(",","");
    $(this).val(value);
  });

  $("#finance_amount").focusout(function(){
      let value = +$(this).val();
      $(this).val(value.format(0, 3, ",", "."));
  });

  $("#tax").focus(function(){
    let value = $(this).val().replace(",","");
    $(this).val(value);
  });

  $("#tax").focusout(function(){
    let value = +$(this).val();
      $(this).val(value.format(0, 3, ",", "."));
  });

</script>
@endsection
