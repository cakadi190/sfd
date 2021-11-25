@extends('layouts.home')

@section('title', 'Register | ' . config('app.name'))

@section('header')
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

  .nav-steps .nav-link {
    display: flex;
  }

  .nav-steps .nav-item .nav-link .indicator {
    width: 1.5rem;
    height: 1.5rem;
    border-radius: 3rem;
    background: #3e3e3e;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: .5rem;
  }

  .nav-steps .nav-item.active .nav-link .indicator {
    background: #6cb2eb;
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
  }

  .period-selector .period-wrapper label:hover {
    background: #dedede;
  }

  .period-selector .period-wrapper input:checked~label {
    background: #6cb2eb;
    color: #fff;
  }


  .counter-tab {
    background: rgba(255,255,255, .1);
    padding: .25rem 0;
    border-radius: 5rem;
  }
  .counter-tab .nav-link {
    color: white;
    border-radius: 5rem;
  }
  .counter-tab .nav-link.active {
    background: rgb(112,190,231);
    border-radius: 5rem;
  }
</style>
@endsection

@section('content')
<div class="container py-5">

  <div class="row">
    <div class="col-md-8">

      <div id="smartwizard">
        <ul class="nav">
          <li>
            <a class="nav-link" href="#step-1">Loan Information</a>
          </li>
          <li>
            <a class="nav-link" href="#step-2">Income Detail</a>
          </li>
          <li>
            <a class="nav-link" href="#step-3">Identity Detail</a>
          </li>
          <li>
            <a class="nav-link" href="#step-4">Upload Data</a>
          </li>
        </ul>

        <form class="tab-content" method="POST" enctype="multipart/form-data" action="{{ route('register.process') }}">
          <div id="step-1" class="tab-pane" role="tabpanel">

            <h3>Loan Detail</h3>

            <div class="form-group">
              <label for="loan">Loan Ammount</label>
              <input type="text" class="form-control" value="{{ old('loan') }}" placeholder="Enter the loan ammount" id="loan" name="loan" />
            </div>

            <div class="form-group">
              <label>Period (years)</label>

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

            <div class="form-group">
              <label for="purpose">Purpose</label>
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
          <div id="step-2" class="tab-pane" role="tabpanel">

            <h3>Income & Employment Details</h3>

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

              <div class="input-group">
                <input type="text" class="form-control" name="phone_prefix" value="{{ old('phone_prefix') }}" style="width: 15%" placeholder="+64" />
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" style="width: 85%" placeholder="Enter the number phone" />
              </div>
            </div>

            <div class="form-group">
              <label for="date">Date of Birth</label>
              <input type="text" class="form-control" id="date" name="date" placeholder="Enter your Date Birth" />
            </div>

          </div>
          <div id="step-3" class="tab-pane" role="tabpanel">

            <h3>Income & Employment Details</h3>

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
          <div id="step-4" class="tab-pane" role="tabpanel">

            <h3>Identity Card</h3>

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
            </div>

            <button type="submit" class="btn btn-success"><i class="fa-solid fa-user-plus mr-2"></i>Save & Register</button>

          </div>
        </form>
      </div>

    </div>
    <div class="col-md-4">

      <div class="card card-body bg-dark text-white text-center">
        <h5 class="h6">Estimated Payment</h5>

        <div class="row justify-content-center">
          <div class="col-8">

            <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
              <li class="nav-item"><a href="#pill-monthly" data-toggle="pill" class="nav-link active">Monthly</a></li>
              <li class="nav-item"><a href="#pill-total" data-toggle="pill" class="nav-link">Yearly</a></li>
            </ul>

          </div>
        </div>

        <div class="text-center tab-content mb-3">
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
@endsection

@section('footer')
{!! RecaptchaV3::initJs() !!}
<script>
  $('#smartwizard').smartWizard("reset");
  $('#smartwizard').smartWizard({
    theme: 'dots',
    enableURLhash: true, // Enable selection of the step based on url hash
    transition: {
      animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
      speed: '400', // Transion animation speed
    },

    anchorSettings: {
      anchorClickable: true, // Enable/Disable anchor navigation
      enableAllAnchors: false, // Activates all anchors clickable all times
      markDoneStep: true, // Add done state on navigation
      markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
      enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
    },
  });

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
</script>
@endsection
