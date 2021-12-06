@extends('layouts.home')

@section('title', 'Register | ' . config('app.name'))

@section('header')
<<<<<<< HEAD
<link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

=======
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)
<style>
  #mainhead {
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
  }

  #mainhead img {
    height: 40px;
  }

  .password-wrapper,
  .password-wrapper .form-wrapper {
    position: relative;
  }

  .password-wrapper #password {
    padding-right: 3.5rem;
  }

  .password-wrapper #password.is-invalid,
  .password-wrapper #password.is-valid {
    background-position: right calc(.375em + 3rem) center;
    padding-right: 5rem !important;
  }

  .password-wrapper .password-floating {
    display: flex;
    justify-content: center;
    align-content: center;
    position: absolute;
    top: .35rem;
    right: .25rem;
    border-left: 1px solid #ced4da;
    padding: 0.35rem 0.5rem .35rem .75rem;
    cursor: pointer;
    color: var(--gray);
    transition: all .2s;
  }

  .password-wrapper .password-floating:hover {
    color: var(--gray-dark);
  }

  .nav-stepper {
    justify-content: space-between;
  }
  .nav-stepper .nav-item .nav-link {
    padding: 0;
    display: flex;
    color: #1D2C62;
    align-items: center;
    font-weight: bold;
  }
  @media screen and (max-width: 768px) {
    .nav-stepper .nav-item .nav-link .nav-content {
      display: none;
    }
  }
  .nav-stepper .nav-item .nav-link .nav-number {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    font-weight: bold;
    background: linear-gradient(0, #becbd8, #CFDBE8);
    border: 2px solid #dde6f0;
    border-radius: 50px;
    margin-right: .75rem;
    color: #1D2C62;
  }

  .nav-stepper .nav-item .nav-link.active {
    background: transparent;
  }
  .nav-stepper .nav-item .nav-link.active .nav-number {
    background: linear-gradient(360deg, #249acd, #27BEFF);
    color: #FFFFFF;
    border-color: #52c8fa
  }

  .period-selector {
    display: flex;
    padding: .5rem;
    border-radius: 5rem;
    background: #eeee;
  }

  .period-selector .period-wrapper {
    width: 20%;
  }

  .period-selector .period-wrapper input {
    display: none;
  }

  .period-selector .period-wrapper label {
    cursor: pointer;
    border-radius: 5rem;
    height: 3rem;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    transition: all .2s;
    font-weight: bold;
  }

  .period-selector .period-wrapper label:hover {
    background: #dedede;
  }

  .period-selector .period-wrapper input:checked~label {
    background: #6cb2eb;
    color: #003366;
  }

  .counter-tab {
    background: rgba(255,255,255, .1);
    padding: .25rem 0;
    border-radius: 5rem;
  }
<<<<<<< HEAD

  .counter-tab .nav-item {
    flex: 1;
  }

=======
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)
  .counter-tab .nav-link {
    color: white;
    border-radius: 5rem;
  }
  .counter-tab .nav-link.active {
    background: rgb(112,190,231);
    border-radius: 5rem;
  }

  .tab-container {
    min-height: 25rem;
  }
  @media screen and (max-width: 768px) {
  .tab-container {
    min-height: 100%;
  }
  }

  .heading {
    padding-bottom: 2rem;
    font-size: 24px;
  }
  .btn-next {
    padding: 1rem 2rem;
    border-radius: 50px;
  }
  .btn-prev {
    padding: 1rem 2rem;
    border-radius: 50px;
    border: 1px solid #4AA0E6;
  }
  .datepicker {
    position: relative;
  }
  .datepicker .calendar-icon {
    position: absolute;
    top: 0.4rem;
    right: 0.75rem;
    font-size: 1.5rem;
  }

  .dropify-wrapper {
    display: block;
    position: relative;
    cursor: pointer;
    overflow: hidden;
    width: 100%;
    max-width: 100%;
    height: 200px;
    padding: 5px 10px;
    font-size: 14px;
    line-height: 22px;
    color: #777;
    background-color: #F3F3F3;
    background-image: none;
    text-align: center;
    border: 2px dashed #1D2C62;
    -webkit-transition: border-color .15s linear;
    transition: border-color .15s linear;
  }
  .dropify-wrapper .dropify-message {
    top: 50%;
    position: relative;
    display: flex;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    align-items: center;
    justify-content: center;
  }
  .dropify-wrapper .dropify-message span.file-icon {
    font-size: 50px;
    color: #1D2C62;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .custom-control-input:focus~.custom-control-label:before {
    box-shadow: 0 0 0 0.2rem rgb(112 190 231 / 25%);
  }
  .custom-control-input:checked~.custom-control-label:before {
    background-color: var(--info);
    border-color: var(--info);
    color: #fff;
  }
  .custom-control-input:focus:not(:checked)~.custom-control-label:before {
    border-color: #2c54c9;
  }
  .custom-checkbox .custom-control-label:before {
    border-radius: 0.25rem;
  }
</style>
@endsection

@section('content')
<div class="container py-5">

  <div class="heading text-primary">
    <h3 class="h2"><span class="text-info">SMART</span>FUNDING <span class="text-info">DIRECT</span> Loan Application</h3>
  </div>

  <ul class="nav nav-stepper nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="pills-one-tab" data-toggle="pill" href="#pills-one" role="tab" aria-controls="pills-one" aria-selected="true">
        <div class="nav-number">1</div>
        <div class="nav-content">Loan Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-two-tab" data-toggle="pill" href="#pills-two" role="tab" aria-controls="pills-two" aria-selected="false">
        <div class="nav-number">2</div>
        <div class="nav-content">Personal Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-income-tab" data-toggle="pill" href="#pills-income" role="tab" aria-controls="pills-income" aria-selected="false">
        <div class="nav-number">3</div>
        <div class="nav-content">Income & Employment Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-upload-tab" data-toggle="pill" href="#pills-upload" role="tab" aria-controls="pills-upload" aria-selected="false">
        <div class="nav-number">4</div>
        <div class="nav-content">Upload and Submit</div>
      </a>
    </li>
  </ul>

  <div class="card card-body">
    <div class="row justify-content-lg-between">
      <div class="col-md-6">

        <form class="tab-content" method="POST" enctype="multipart/form-data" action="{{ route('register.process') }}">
          <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
            <div class="tab-container py-4 px-3">
              <h3 class="heading">Loan Detail</h3>

<<<<<<< HEAD
              <div class="form-group mb-4">
                <label class="d-flex" for="finance_ammount">Loan Ammount <div class="text-danger">*</div></label>
                <input type="text" class="form-control" value="{{ old('finance_ammount') }}" placeholder="Enter the loan ammount" id="finance_ammount" name="finance_ammount" />
              </div>

              <div class="form-group mb-4">
                <label class="d-flex">Period (years) <div class="text-danger">*</div></label>
=======
              <div class="form-group">
                <label for="loan">Loan Ammount</label>
                <input type="text" class="form-control" value="{{ old('loan') }}" placeholder="Enter the loan ammount" id="loan" name="loan" />
              </div>

              <div class="form-group">
                <label>Period (years)</label>
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)

                <div class="period-selector">
                  <div class="period-wrapper">
                    <input type="radio" name="period"{{ old('period') == 'annually' ? ' checked' : '' }} id="annually" value="annually" />
                    <label for="annually">1</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" name="period"{{ old('period') == 'binneally' ? ' checked' : '' }} id="binneally" value="binneally" />
                    <label for="binneally">2</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" name="period"{{ old('period') == 'trienally' ? ' checked' : '' }} id="trienally" value="trienally" />
                    <label for="trienally">3</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" name="period"{{ old('period') == 'quadrennially' ? ' checked' : '' }} id="quadrennially" value="quadrennially" />
                    <label for="quadrennially">4</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" name="period" id="quinquenially" value="quinquenially" />
                    <label for="quinquenially">5</label>
                  </div>
                </div>
              </div>

<<<<<<< HEAD
              <div class="form-group mb-4">
                <label class="d-flex" for="purpose">Purpose <div class="text-danger">*</div></label>
=======
              <div class="form-group">
                <label for="purpose">Purpose</label>
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)
                <select name="purpose" id="purpose" class="form-control">
                  <option disabled selected="selected">Select</option>
                  <option value="01">01 - Business Venture</option>
                  <option value="02">02 - Debt Consolidation</option>
                  <option value="03">03 - Wedding</option>
                  <option value="04">04 - Special Occasion</option>
                  <option value="05">05 - Vacation</option>
                  <option value="06">06 - Credit Card Payment</option>
                  <option value="07">07 - Gambling</option>
                  <option value="08">08 - Shopping</option>
                  <option value="09">09 - Living Cost</option>
                  <option value="10">10 - Bill Payment</option>
                  <option value="11">11 - Education</option>
                  <option value="12">12 - Housing</option>
                  <option value="13">13 - Hobby</option>
                  <option value="14">14 - Motor Purchase</option>
                  <option value="15">15 - Home Improvements</option>
                  <option value="16">16 - Investment</option>
                  <option value="17">17 - Other</option>
                </select>
              </div>
            </div>

            <div class="d-flex mt-4 justify-content-between">
              <a href="javascript:nextStep('pills-two')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>

          </div>
          <div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab">
            <div class="tab-container py-4 px-3">
              <h3 class="heading">Personal Details</h3>

<<<<<<< HEAD
              <div class="form-group mb-4">
                <label class="d-flex" for="fullname">Name as NRIC <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your name" />
              </div>

              <div class="form-group mb-4">
                <label class="d-flex" for="nric">NRIC <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nric" name="nric" placeholder="Enter your NRIC" />
              </div>

              <div class="form-group mb-4">
                <label class="d-flex" for="email">E-Mail <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Enter your Email" />
              </div>

              <div class="form-group mb-4">
                <label class="d-flex">Contact No. <span class="text-danger">*</span></label>
=======
              <div class="form-group">
                <label for="fullname">Name as NRIC</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your name" />
              </div>

              <div class="form-group">
                <label for="nric">NRIC</label>
                <input type="text" class="form-control" id="nric" name="nric" placeholder="Enter your NRIC" />
              </div>

              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Enter your Email" />
              </div>

              <div class="form-group">
                <label>Contact No.</label>
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)

                <div class="input-group">
                  <input type="text" class="form-control" name="phone_prefix" value="{{ old('phone_prefix') }}" style="width: 15%" placeholder="+64" />
                  <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" style="width: 85%" placeholder="Enter the number phone" />
                </div>
              </div>

              <div class="form-group mb-4">
                <label class="d-flex" for="birth_date">Date of Birth <span class="text-danger">*</span></label>
                <div class="datepicker">
                  <input type="text" class="form-control" value="{{ old('birth_date') }}" id="birth_date" name="birth_date" placeholder="Enter your Birth Date" />
                  <i class="bx bx-calendar calendar-icon"></i>
                </div>
              </div>
            </div>

            <div class="d-flex mt-4">
              <a href="javascript:prevStep('pills-one', 'pills-two')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
              <a href="javascript:nextStep('pills-income')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-income" role="tabpanel" aria-labelledby="pills-income-tab">
            <div class="tab-container">
              <h3 class="heading">Income & Employment Details</h3>

              <div class="form-group">
                <label for="tax">Annual Pre-Tax Income</label>
                <input type="text" class="form-control" id="tax" name="tax" placeholder="Enter your Tax Income" />
              </div>

              <div class="form-group">
                <label for="employment">Employment Status</label>
                <select name="employment" id="employment" class="form-control">
                  <option disabled selected>--[ Choose One ]--</option>
                  <option value="employeed">Employeed</option>
                  <option value="unemployeed">Unemployeed</option>
                </select>
              </div>

              <div class="form-group">
                <label for="dependants">Number of Dependants</label>
                <input type="text" class="form-control" id="dependants" name="dependants" placeholder="Enter your number of Dependants" />
              </div>
            </div>

            <div class="d-flex mt-4">
              <a href="javascript:prevStep('pills-two', 'pills-income')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
              <a href="javascript:nextStep('pills-upload')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
            <div class="tab-container">
              <h3 class="heading">Income & Employment Details</h3>

<<<<<<< HEAD
              <div class="form-group mb-5">
                <label class="d-flex">Identity Card - Front (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="id_front" class="dropify" data-height="70" />
              </div>

              <div class="form-group mb-5">
                <label class="d-flex">Identity Card - Back (Max Size: 5MB) <span class="text-danger">*</span></label>
              <input type="file" name="id_back" class="dropify" data-height="70" />
              </div>

              <div class="form-group mb-5">
                <label class="d-flex">Salary Slip (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="salary_slip" class="dropify" data-height="70" />
              </div>

              <div class="form-group mb-5">
                <label class="d-flex">Salary of Public Lifeline/Utilities (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="utilities_slip" class="dropify" data-height="70" />
              </div>

              <div class="custom-control mb-3 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="agree" name="agree" value="true" />
                <label class="custom-control-label" for="agree">I have read and agreed to provide my content, as written above in privacy notice, for the processing of the application.</label>
=======
              <div class="form-group">
                <label>Identity Card (Front)</label>
                <input type="file" class="form-control" id="id_front" name="id_front" />
              </div>

              <div class="form-group">
                <label>Identity Card (Back)</label>
                <input type="file" class="form-control" id="id_back" name="id_back" />
              </div>

              <div class="form-group">
                <label>Salary Slip</label>
                <input type="file" class="form-control" id="salary_slip" name="salary_slip" />
              </div>

              <div class="form-group">
                <label>Utility Slip</label>
                <input type="file" class="form-control" id="utilities_slip" name="utilities_slip" />
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)
              </div>
            </div>

            <div class="d-flex mt-5">
              <a href="javascript:prevStep('pills-income', 'pills-upload')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
              <button class="btn btn-info btn-next btn-lg" type="submit">Submit</button>
            </div>
          </div>
        </form>

      </div>
      <div class="col-md-5">

        <div class="card card-body bg-primary text-white text-center">
          <h5 class="h6">Estimated Payment</h5>

          <div class="row justify-content-center">
            <div class="col-8">

              <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
                <li class="nav-item"><a href="#pill-monthly" data-toggle="pill" class="nav-link active">Monthly</a></li>
                <li class="nav-item"><a href="#pill-total" data-toggle="pill" class="nav-link">Yearly</a></li>
              </ul>

            </div>
          </div>

<<<<<<< HEAD
          <div class="text-center tab-content mb-2 py-5">
=======
          <div class="text-center tab-content mb-3">
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)
            <div class="tab-pane fade active show" id="pill-monthly">
              <h3 class="m-0 h1" id="calculator">$0</h3>
            </div>
            <div class="tab-pane fade" id="pill-total">
              <h3 class="m-0 h1" id="calc-total">$0</h3>
            </div>
          </div>

          <p class="text-center">Interest rate 18% p.a.</p>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection

@section('footer')
{!! RecaptchaV3::initJs() !!}
<<<<<<< HEAD
<script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

=======
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)
<script>
  function prevStep(targetElement, anchorEl) {
    console.log($(`.nav-stepper #${anchorEl}`));
    $(`.nav-stepper #${anchorEl}`).addClass('disabled');
    $(`.nav-stepper a[href="#${targetElement}"]`).tab('show');
  }
  function nextStep(targetElement) {
    $(`.nav-stepper a[href="#${targetElement}"]`).removeClass('disabled');
    $(`.nav-stepper a[href="#${targetElement}"]`).tab('show');
  }

  var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  });

  // Form
  $('input[name="period"]').on('change', function() {
    let ammount = $('#loan').val();
    let diff = $('[name="period"]:checked').val();
    let num = parseInt(ammount);
    let calc;

    if(diff == 'annually') {
      calc = (((num * 0.18 * 1) + num) / (1*12));
    } else if(diff == 'binneally') {
      calc = (((num * 0.18 * 2) + num) / (2*12));
    } else if(diff == 'trienally') {
      calc = (((num * 0.18 * 3) + num) / (3*12));
    } else if(diff == 'quadrennially') {
      calc = (((num * 0.18 * 4) + num) / (4*12));
    } else if(diff == 'quinquenially') {
      calc = (((num * 0.18 * 5) + num) / (5*12));
    } else {
      if(num >= 0) {
        calc = num;
      } else {
        calc = 0;
      }
    }

    calc = Math.floor(calc);

    $('#calculator').text(`${formatter.format(calc)}`);
    $('#calc-total').text(`${formatter.format(calc * 12)}`);
  });

  $('#loan').keyup(function() {
    let ammount = $('#loan').val();
    let diff = $('[name="period"]:checked').val();
    let num = parseInt(ammount);
    let calc;

    if(diff == 'annually') {
      calc = (((num * 0.18 * 1) + num) / (1*12));
    } else if(diff == 'binneally') {
      calc = (((num * 0.18 * 2) + num) / (2*12));
    } else if(diff == 'trienally') {
      calc = (((num * 0.18 * 3) + num) / (3*12));
    } else if(diff == 'quadrennially') {
      calc = (((num * 0.18 * 4) + num) / (4*12));
    } else if(diff == 'quinquenially') {
      calc = (((num * 0.18 * 5) + num) / (5*12));
    } else {
      if(num >= 0) {
        calc = num;
      } else {
        calc = 0;
      }
    }

    calc = Math.floor(calc);

    $('#calculator').text(`${formatter.format(calc)}`);
    $('#calc-total').text(`${formatter.format(calc * 12)}`);
  });
<<<<<<< HEAD

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
=======
>>>>>>> parent of 8dd0c43 (Perubahan 30 November 2021)
</script>
@endsection

