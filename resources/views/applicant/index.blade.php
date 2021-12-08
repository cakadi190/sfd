@extends('layouts.app')

@section('content')
<!-- Header -->
<section id="page-title" class="mb-4 pb-2 border-bottom">
  <div class="d-md-flex align-items-center justify-content-between">
    <h3 class="mb-0">Borrower Collection</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-0 p-0 bg-transparent">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Borrower Collection</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Main Content -->
<section id="main-container" class="mt-3">
  <div class="card">
    <div class="card-header bg-white">
      <div class="d-flex justify-content-between">
        <h3 class="m-0"></h3>

        <a href="{{ route('applicant.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive card">
          <table class="table table-striped border-top-0 mb-0">
              <thead>
                  <th class="border-top-0">loan_id</th>
                  <th class="border-top-0">finance_amount</th>
                  <th class="border-top-0">period</th>
                  <th class="border-top-0">fullname</th>
                  <th class="border-top-0">nric</th>
                  <th class="border-top-0">email</th>
                  <th class="border-top-0">phone</th>
                  <th class="border-top-0">birthdate</th>
                  <th class="border-top-0">dependants</th>
                  <th class="border-top-0">employment</th>
                  <th class="border-top-0">id_front</th>
                  <th class="border-top-0">id_back</th>
                  <th class="border-top-0">salary_slip</th>
                  <th class="border-top-0">utilities_slip</th>
                  <th class="border-top-0">status</th>
              </thead>
              <tbody>
                @forelse($applicants as $applicant)
                  <tr>
                    <td>{{$applicant->loan_id}}</td>
                    <td>{{$applicant->finance_amount}}</td>
                    <td>{{$applicant->period}}</td>
                    <td>{{$applicant->fullname}}</td>
                    <td>{{$applicant->nric}}</td>
                    <td>{{$applicant->email}}</td>
                    <td>{{$applicant->phone}}</td>
                    <td>{{$applicant->birthdate}}</td>
                    <td>{{$applicant->dependants}}</td>
                    <td>{{$applicant->employment}}</td>
                    <td><a href="{{asset($applicant->id_front)}}" class="btn btn-sm btn-primary" download="true"><i class="fa fa-download"></i></a></td>
                    <td><a href="{{asset($applicant->id_back)}}" class="btn btn-sm btn-primary" download="true"><i class="fa fa-download"></i></a></td>
                    <td><a href="{{asset($applicant->salary_slip)}}" class="btn btn-sm btn-primary" download="true"><i class="fa fa-download"></i></a></td>
                    <td><a href="{{asset($applicant->utilities_slip)}}" class="btn btn-sm btn-primary" download="true"><i class="fa fa-download"></i></a></td>
                    <td>{{$applicant->status}}</td>
                  </tr>
                @empty
                  <td colspan="10" class="text-center">No Data Available Now</td>
                @endforelse
              </tbody>
          </table>
      </div>
    </div>
  </div>
</section>
@endsection
