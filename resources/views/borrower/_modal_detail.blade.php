<div class="d-flex flex-column justify-content-start mt-1">
    <h2>General Information</h2>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Loan Id</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower->loan_id }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">NRIC</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower->nric }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Full Name</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower->fullname }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Email</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower->email }}</p>
      </div>
    </div>
    <div class="container ml-2">
      <div class="row">
        <p class="col-sm-5">Phone</p>
        <p class="col-sm-1">:</p>
        <p class="col-sm-6">{{ $userBorrower->phone }}</p>
      </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-start mt-1">
  <h2>Required Information</h2>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Dependants</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $userBorrower->dependants }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Employment Status</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $userBorrower->employment }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Finance Ammount</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $userBorrower->finance_amount }}</p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Loan Period</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">{{ $userBorrower->period }}</p>
    </div>
  </div>
</div>
<div class="d-flex flex-column justify-content-start mt-1">
  <h2>File Data</h2>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">ID Card (Front Side)</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower->id_front) }}" download="{{ $userBorrower->fullname }}-IDCard-FrontSide">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">ID Card (Back Side)</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower->id_back) }}" download="{{ $userBorrower->fullname }}-IDCard-BackSide">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Salary Slip</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower->salary_slip) }}" download="{{ $userBorrower->fullname }}-SalarySlip">Download File Data</a>
      </p>
    </div>
  </div>
  <div class="container ml-2">
    <div class="row">
      <p class="col-sm-5">Utilities Slip</p>
      <p class="col-sm-1">:</p>
      <p class="col-sm-6">
        <a href="{{ asset($userBorrower->utilities_slip) }}" download="{{ $userBorrower->fullname }}-UtilitiesSlip">Download File Data</a>
      </p>
    </div>
  </div>
</div>