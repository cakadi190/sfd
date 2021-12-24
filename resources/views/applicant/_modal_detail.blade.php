<div class="d-flex flex-column justify-content-start mt-1">
    <h5>General Information</h5>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Loan Id</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $applicant->loan_id }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">NRIC</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $applicant->nric }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Full Name</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $applicant->fullname }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Email</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $applicant->email }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Phone</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $applicant->phone }}</p>
      </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-start mt-1">
  <h5>Required Information</h5>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Dependants</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $applicant->dependants }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Employment Status</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $applicant->employment }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Finance Ammount</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $applicant->finance_amount }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Loan Period</p>
      <p class="col-sm-1">:</p>
      @if($applicant->period == 'annually')
        <p class="col-sm-6">1</p>
      @elseif($applicant->period == 'binneally')
        <p class="col-sm-6">2</p>
      @elseif($applicant->period == 'trienally')
        <p class="col-sm-6">3</p>
      @elseif($applicant->period == 'quadrennially')
        <p class="col-sm-6">4</p>
      @elseif($applicant->period == 'quinquenially')
      <p class="col-sm-6">5</p>
      @endif
    </div>
  </div>
</div>
<div class="d-flex flex-column justify-content-start mt-1">
  <h5>File Data</h5>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">ID Card (Front Side)</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($applicant->id_front) }}" download="{{ $applicant->fullname }}-IDCard-FrontSide">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">ID Card (Back Side)</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($applicant->id_back) }}" download="{{ $applicant->fullname }}-IDCard-BackSide">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Salary Slip</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset(explode(",", $applicant->salary_slip)[0]) }}" download="{{ $applicant->fullname }}-SalarySlip">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Bank Statement</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset(explode(",", $applicant->bank_statement)[0]) }}" download="{{ $applicant->fullname }}-SalarySlip">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Utilities Slip</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($applicant->utilities_slip) }}" download="{{ $applicant->fullname }}-UtilitiesSlip">Download File Data</a>
      </p>
    </div>
  </div>
</div>