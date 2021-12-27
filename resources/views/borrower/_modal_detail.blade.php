<div class="d-flex flex-column justify-content-start mt-1">
    <h5>General Information</h5>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Loan Id</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower[0]['borrower']->loan_id }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">NRIC</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower[0]['borrower']->nric }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Full Name</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower[0]['borrower']->fullname }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Email</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower[0]['borrower']->email }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Phone</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower[0]['borrower']->phone }}</p>
      </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-start mt-1">
  <h5>Required Information</h5>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Dependants</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $userBorrower[0]['borrower']->dependants }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Employment Status</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $userBorrower[0]['borrower']->employment }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Finance Ammount</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $userBorrower[0]['borrower']->finance_amount }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Loan Period</p>
      <p class="col-sm-1">:</p>
      @if($userBorrower[0]['borrower']->period == 'annually')
        <p class="col-sm-6">1 Year</p>
      @elseif($userBorrower[0]['borrower']->period == 'binneally')
        <p class="col-sm-6">2 Year</p>
      @elseif($userBorrower[0]['borrower']->period == 'trienally')
        <p class="col-sm-6">3 Year</p>
      @elseif($userBorrower[0]['borrower']->period == 'quadrennially')
        <p class="col-sm-6">4 Year</p>
      @elseif($userBorrower[0]['borrower']->period == 'quinquenially')
      <p class="col-sm-6">5 Year</p>
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
        <a href="{{ asset($userBorrower[0]['borrower']->id_front) }}" download="{{ $userBorrower[0]['borrower']->fullname }}-IDCard-FrontSide">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">ID Card (Back Side)</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower[0]['borrower']->id_back) }}" download="{{ $userBorrower[0]['borrower']->fullname }}-IDCard-BackSide">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Salary Slip 1</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower[0]['salary_slip'][0]) }}" download="{{ $userBorrower[0]['borrower']->fullname }}-SalarySlip">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Salary Slip 2</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower[0]['salary_slip'][1]) }}" download="{{ $userBorrower[0]['borrower']->fullname }}-SalarySlip">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Salary Slip 3</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower[0]['salary_slip'][2]) }}" download="{{ $userBorrower[0]['borrower']->fullname }}-SalarySlip">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Utilities Slip</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower[0]['borrower']->utilities_slip) }}" download="{{ $userBorrower[0]['borrower']->fullname }}-UtilitiesSlip">Download File Data</a>
      </p>
    </div>
  </div>
</div>