@extends('layouts.app')

@section('header')
  <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}" type="text/css" />
  <style>
    .separator {
      border-bottom: 1px solid rgba(0, 0, 0, .1);
      display: block;
      margin-bottom: 1rem;
    }

    .period-selector {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .period-selector input {
      display: none;
    }

    .period-selector input ~ label {
      padding: .5rem .75rem;
      cursor: pointer;
      border: 1px solid rgba(199, 199, 199, 0.933);
      border-radius: .5rem;
      transition: all .2s;
      position: relative;
      display: flex;
      align-items: center;
    }

    .period-selector input ~ label:before {
      content: '';
      margin-right: .5rem;
      border-radius: .25rem;
      transition: all .2s;
      width: 1rem;
      height: 1rem;
      border: 1px solid rgba(199, 199, 199, 0.933);
      display: block;
    }

    .period-selector input ~ label:hover {
      border-color: rgba(21, 40, 96, .5);
      background: rgba(21, 40, 96, .1);
      color: #152860;
    }
    .period-selector input ~ label:hover:before {
      border-color: rgba(21, 40, 96, .5);
    }

    .period-selector input:checked ~ label {
      background: rgba(21, 40, 96, 1);
      border: 1px solid rgba(21, 40, 96, 1);
      color: white;
    }
    .period-selector input:checked ~ label:before {
      content: '\f00c';
      font-family: 'Font Awesome 6 Free';
      font-weight: 700;
      background: white;
      border-color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #152860;
    }

    .counter-tab {
      padding: .25rem 0;
      border-radius: .5rem;
    }

    .counter-tab .nav-link {
      color: white;
      border-radius: 5rem;
    }

    .counter-tab .nav-link.active {
      background: rgb(112, 190, 231);
      border-radius: 5rem;
    }

    .dropify-wrapper {
      border-radius: .5rem;
    }
    .dropify-wrapper .dropify-message p:not(p.dropify-error) {
      font-size: 1rem;
    }
  </style>
@endsection

@section('content')
<!-- Header -->
<section id="page-title" class="mb-4 pb-2 border-bottom">
  <div class="d-md-flex align-items-center justify-content-between">
    <h3 class="mb-0">Add Borrower Collection</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-0 p-0 bg-transparent">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('applicant.index') }}">Borrower Collection</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Data</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Main Content -->
<section id="main-container" class="mt-3">
  <div class="card">
    <div class="card-header bg-white">
      <div class="d-flex justify-content-between">
        <h3 class="m-0 h5">Add Data</h3>
      </div>
    </div>
    <div class="card-body">

      <form action="{{ route('applicant.store') }}" method="POST">
        @csrf

        <div class="row">
          <div class="col-md-8">

            <div class="mb-4">
              <div class="separator">
                <h5>Loan</h5>
              </div>

              <div class="form-group">
                <label for="finance_ammount">Loan Ammount <span class="text-danger">*</span></label>
                <input type="text" name="finance_ammount"@if($errors->has('finance_ammount'))class="form-control is-invalid"@else class="form-control"@endif value="{{ old('finance_ammount') }}" id="finance_ammount" placeholder="Enter the loan ammount." />
                @error('finance_ammount')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="d-flex">Period (years) <div class="text-danger">*</div></label>

                <div class="period-selector">
                  <div class="period-wrapper">
                    <input type="radio" name="period" id="annually" value="annually">
                    <label for="annually">1 Year</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" name="period" id="binneally" value="binneally">
                    <label for="binneally">2 Year</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" name="period" id="trienally" value="trienally">
                    <label for="trienally">3 Year</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" name="period" id="quadrennially" value="quadrennially">
                    <label for="quadrennially">4 Year</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" name="period" id="quinquenially" value="quinquenially">
                    <label for="quinquenially">5 Year</label>
                  </div>
                </div>

                @error('period')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="d-flex" for="purpose">Purpose <div class="text-danger">*</div></label>
                <select name="purpose" id="purpose"@if($errors->has('purpose')) class="form-control is-invalid"@else class="form-control"@endif>
                  <option disabled="" selected="selected">Select</option>
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
                @error('purpose')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-4">
              <div class="separator">
                <h5>Identity</h5>
              </div>

              <div class="form-group">
                <label class="d-flex" for="fullname">Name as NRIC <span class="text-danger">*</span></label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your name"@if($errors->has('fullname')) class="form-control is-invalid" value="{{ old('fullname') }}" @else class="form-control" @endif />

                @error('fullname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="d-flex" for="nric">NRIC <span class="text-danger">*</span></label>
                <input type="text"@if($errors->has('nric')) class="form-control is-invalid" value="{{ old('nric') }}"@else class="form-control"@endif id="nric" name="nric" placeholder="Enter your NRIC" />
                @error('nric')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="d-flex" for="email">E-Mail <span class="text-danger">*</span></label>
                <input type="text"@if($errors->has('email')) class="form-control is-invalid" value="{{ old('email') }}" @else class="form-control" @endif id="email" name="email" placeholder="Enter your Email" />

                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="d-flex">Contact No. <span class="text-danger">*</span></label>

                <div class="input-group">
                  <input type="text"@if($errors->has('phone_prefix')) class="form-control is-invalid" value="{{ old('phone_prefix') }}" @else class="form-control" @endif name="phone_prefix" style="width: 15%" placeholder="+64">
                  <input type="text"@if($errors->has('phone')) class="form-control is-invalid" value="{{ old('phone') }}" @else class="form-control" @endif name="phone" style="width: 85%" placeholder="Enter the number phone">
                </div>

                @if ($errors->has('phone_prefix') OR $errors->has('phone'))
                <div class="text-danger">The Phone Number is required!</div>
                @endif
              </div>

              <div class="form-group">
                <label class="d-flex" for="tax">Annual Pre-Tax Income <span class="text-danger">*</span></label>
                <input type="text" id="tax" name="tax" placeholder="Enter your Tax Income"@if($errors->has('tax')) class="form-control is-invalid" value="{{ old('tax') }}" @else class="form-control" @endif />

                @error('tax')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="d-flex" for="employment">Employment Status <span class="text-danger">*</span></label>
                <select name="employment" id="employment"@if($errors->has('phone')) class="form-control is-invalid"@else class="form-control" @endif>
                  <option disabled="" selected="">--[ Choose One ]--</option>
                  <option value="employeed">Employeed</option>
                  <option value="unemployeed">Unemployeed</option>
                </select>

                @error('employment')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="d-flex" for="dependants">Number of Dependants <span class="text-danger">*</span></label>
                <input type="text"@if($errors->has('dependants')) class="form-control is-invalid" value="{{ old('dependants') }}" @else class="form-control" @endif  id="dependants" name="dependants" placeholder="Enter your number of Dependants" />

                @error('dependants')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-4">
              <div class="separator">
                <h5>Upload Docs</h5>

                <div class="form-group">
                  <label class="d-flex">Identity Card (Front) <span class="text-danger">*</span></label>
                  <input type="file" name="id_front" class="dropify" data-height="100" />
                  <span class="text-muted form-text">Upload data with format <code>*.pdf</code>, <code>*.png</code>, <code>*.jpeg</code>, dan <code>*.jpg</code>.</span>

                  @error('id_front')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="d-flex">Identity Card (Back) <span class="text-danger">*</span></label>
                <input type="file" name="id_back" class="dropify" data-height="100" />
                <span class="text-muted form-text">Upload data with format <code>*.pdf</code>, <code>*.png</code>, <code>*.jpeg</code>, dan <code>*.jpg</code>.</span>

                @error('id_back')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                  <label class="d-flex">Salary Slip <span class="text-danger">*</span></label>
                  <input type="file" name="salary_slip" class="dropify" data-height="100" />
                  <span class="text-muted form-text">Upload data with format <code>*.pdf</code>, <code>*.png</code>, <code>*.jpeg</code>, dan <code>*.jpg</code>.</span>

                  @error('salary_slip')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="d-flex">Utility Slip <span class="text-danger">*</span></label>
                  <input type="file" name="utilities_slip" class="dropify" data-height="100" />
                  <span class="text-muted form-text">Upload data with format <code>*.pdf</code>, <code>*.png</code>, <code>*.jpeg</code>, dan <code>*.jpg</code>.</span>

                  @error('utilities_slip')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-4">
            <div class="card card-body bg-dark text-white mb-3 text-center">
              <h5 class="h6">Estimated Payment</h5>

              <div class="row justify-content-center">
                <div class="col-8">

                  <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
                    <li class="nav-item"><a href="#pill-monthly" data-toggle="pill" class="nav-link active">Monthly</a></li>
                    <li class="nav-item"><a href="#pill-total" data-toggle="pill" class="nav-link">Total</a></li>
                  </ul>

                </div>
              </div>

              <div class="text-center tab-content mb-2">
                <div class="tab-pane fade active show" id="pill-monthly">
                  <h3 class="m-0 h1" id="calculator">$0</h3>
                </div>
                <div class="tab-pane fade" id="pill-total">
                  <h3 class="m-0 h1" id="calc-total">$0</h3>
                  <p class="mb-1">Per Year</p>
                </div>
              </div>

              <p class="text-center">Interest rate 18% p.a.</p>
            </div>

            <button class="btn btn-block btn-success"><i class="fa-solid fa-save mr-2"></i>Save and Add</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</section>
@endsection

@section('footer')
<script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>

<script>
  /**
   * Dropdzone
   */
  $('.dropify').dropify();

  /**
  * Counter
  */
  var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  });
  $('input[name="period"]').on('change', function() {
    let ammount = $('#finance_ammount').val();
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
  $('#finance_ammount').keyup(function() {
    let ammount = $('#finance_ammount').val();
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
