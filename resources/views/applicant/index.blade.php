@extends('layouts.app')

@section('content')

@if(session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif

<!-- Header -->
<section id="page-title" class="mb-4 pb-2 border-bottom">
  <div class="d-md-flex align-items-center justify-content-between">
    <h3 class="mb-0">Applicant List</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-0 bg-transparent">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Applicant List</li>
      </ol>
  </nav>
  </div>
</section>

<!-- Main Content -->
<section id="main-container">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive card p-3">
        <table class="table table-striped table-bordered display" id="tableid">
          <thead>
            <th>Loan ID</th>
            <th>Finance Ammount</th>
            <th>Application Date</th>
            <th>Status</th>
            <th>Action</th>
          </thead>
          <tbody>
            @forelse ($applicants as $applicant)
              <tr>
                <td>{{ $applicant->loan_id }}</td>
                <td>RM {{ $applicant->finance_amount }}</td>
                <td>{{ $applicant->created_at->toFormattedDateString() }}</td>
                <td>
                  @if ($applicant->status == 'canceled')
                    <div class="bg-danger box-custom d-flex flex-column p-1 justify-content-center">
                      <div class="text-light align-self-center">Canceled</div>
                    </div>
                  @else
                    <div class="bg-warning box-custom d-flex flex-column p-1 justify-content-center">
                      <div class="text-dark align-self-center">Waiting</div>
                    </div>
                  @endif
                </td>
                <td colspan="3">
                  <div class="d-flex flex-row justify-content-around">
                    <a href="#" class="btn btn-primary font-mini btn-detail" data-toggle="modal" data-target="#modalDetailData" data-id="{{ $applicant->id }}">Detail</a>
                    <div class="btn-group ml-1" role="group" aria-label="Button group with nested dropdown">
                      <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary font-mini dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          More..
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                          @if($applicant->status != "canceled")
                          <a class="dropdown-item font-mini btn-approve pointer" data-toggle="modal" data-target="#modalAlertApprove" data-id="{{ $applicant->id }}">Approve</a>
                          @endif
                            <a class="dropdown-item font-mini btn-reject pointer" data-toggle="modal" data-target="#modalRejection" data-id="{{ $applicant->id }}">Reject</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
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

@section('modal')
  <!-- Modal for Reject Applicant-->
<div class="modal fade" id="modalRejection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>

<!-- Modal for Approve Applicant-->
<div class="modal fade" id="modalAlertApprove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Approve Applicant</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
      </div>
      <div class="modal-body">
        <p>Are you sure want to approve selected applicant?</p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Modal for Detail Data-->
<div class="modal fade" id="modalDetailData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Detail Applicant Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body fixed-height-custom">
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function(){
      $('.btn-approve').on('click',function(){
        let id = $(this).data('id');
        $.ajax({
          url: `/dashboard/getModalApprove/${id}`,
          type:'GET',
          success: function(data){
            $('#modalAlertApprove').find('.modal-footer').html(data);
            $('#modalAlertApprove').modal('show');
          }
        });
      });

      $('.btn-detail').on('click', function(){
        let id = $(this).data('id');
        $.ajax({
          url: `/dashboard/getModalDetail/${id}`,
          type: 'GET',
          success: function(data){
            $('#modalDetailData').find('.modal-body').html(data);
            $('#modalDetailData').modal('show');
          }
        });
      });

      $('.btn-reject').on('click', function(){
        let id = $(this).data('id');
        $.ajax({
          url: `/dashboard/getModalReject/${id}`,
          type: 'GET',
          success: function(data){
            console.log(id);
            $('#modalRejection').find('.modal-content').html(data);
            $('#modalRejection').modal('show');
          }
        });
      });

      $('#tableid').DataTable();
    });
  </script>
@endpush
