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
    <div class="card-body"></div>
  </div>
</section>
@endsection
