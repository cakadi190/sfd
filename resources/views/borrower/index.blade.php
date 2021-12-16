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
    <h3 class="mb-0">Borrower List</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Borrower List</li>
        </ol>
    </nav>
  </div>
</section>

<!-- Main Content -->
<section id="main-container">
  <div class="card">
    <div class="card-header bg-white">
      <div class="d-flex justify-content-between">
        <h3 class="m-0"></h3>
        <a href="{{ route('applicant.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
      </div>
    </div>
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
                @forelse($borrowers as $borrower)
                    <tr>
                        <td>
                            <div>
                                {{ $borrower['loan_id'] }}
                            </div>
                            <div class="font-notes-warning">
                                *Note : {{ $borrower['note'] }}
                            </div>
                        </td>
                        <td>{{ $borrower['finance_ammount'] }}</td>
                        <td>{{ $borrower['created_at'] }}</td>
                        <td>
                            {{-- {{ $borrower['status'] }} --}}
                            @if ($borrower['status'] == 'waiting')
                                <div class="bg-warning box-custom d-flex flex-column p-1 justify-content-center">
                                    <div class="text-dark align-self-center">Waiting</div>
                                </div>
                            @elseif($borrower['status'] == 'disbursed')
                                <div class="bg-success box-custom d-flex flex-column p-1 justify-content-center">
                                    <div class="text-light align-self-center">Disbursed</div>
                                </div>
                            @else
                                <div class="bg-dark box-custom d-flex flex-column p-1 justify-content-center">
                                    <div class="text-light align-self-center">Blacklist</div>
                                </div>
                            @endif
                        </td>
                        @if($borrower['status'] == 'Blacklisted')
                            <td colspan="3">
                                <a class="btn btn-primary font-mini btn-detail-borrower" data-toggle="modal" data-target="#modalDetailData" data-id="{{ $borrower['id'] }}">Detail</a>
                            </td>
                        @elseif($borrower['status'] == 'Payment Completed')
                            <!--Done-->
                            <td colspan="3">
                                <a class="btn btn-primary font-mini btn-detail-borrower" data-toggle="modal" data-target="#modalDetailData" data-id="{{ $borrower['id'] }}">Detail</a>
                            </td>
                        @else
                            @if($borrower['status'] == 'Disbursed')
                                @if($borrower['is_payment_due'])
                                    <td colspan="3">
                                        <div class="d-flex flex-row justify-content-around">
                                            <a class="btn btn-primary font-mini btn-detail-borrower" data-toggle="modal" data-target="#modalDetailData" data-id="{{ $borrower['id'] }}">Detail</a>
                                            <div class="btn-group ml-1" role="group" aria-label="Button group with nested dropdown">
                                                <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-primary font-mini dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    More..
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item font-mini btn-monthly-email pointer" data-toggle="modal" data-target="#modalMonthlyEmail" data-id="{{ $borrower['id'] }}">Monthly Statement</a>
                                                    <a class="dropdown-item font-mini btn-monthly-payment pointer" data-toggle="modal" data-target="#modalMonthlyPayment" data-id="{{ $borrower['id'] }}">Sequence Payment</a>
                                                    <a class="dropdown-item font-mini btn-blacklist pointer" data-toggle="modal" data-target="#modalBlacklist" data-id="{{ $borrower['id'] }}">Blacklist</a>
                                                    <a class="dropdown-item font-mini btn-payment-completed pointer" data-toggle="modal" data-target="#modalPaymentCompleted" data-id="{{ $borrower['id'] }}">Payment Completed</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @else
                                    <td colspan="3">
                                        <div class="d-flex flex-row justify-content-around">
                                            <a class="btn btn-primary font-mini btn-detail-borrower" data-toggle="modal" data-target="#modalDetailData" data-id="{{ $borrower['id'] }}">Detail</a>
                                        <div class="btn-group ml-1" role="group" aria-label="Button group with nested dropdown">
                                            <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary font-mini dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                More..
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <button class="dropdown-item font-mini btn-monthly-payment pointer" data-toggle="modal" data-target="#modalMonthlyPayment" data-id="{{ $borrower['id'] }}">Sequence Payment</button>
                                                <a class="dropdown-item font-mini btn-blacklist pointer" data-toggle="modal" data-target="#modalBlacklist" data-id="{{ $borrower['id'] }}">Blacklist</a>
                                                <a class="dropdown-item font-mini btn-payment-completed pointer" data-toggle="modal" data-target="#modalPaymentCompleted" data-id="{{ $borrower['id'] }}">Payment Completed</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                @endif
                            @elseif($borrower['status'] == 'active')
                                <td colspan="3">
                                    <div class="d-flex flex-row justify-content-around">
                                        <a class="btn btn-primary font-mini btn-detail-borrower" data-toggle="modal" data-target="#modalDetailData" data-id="{{ $borrower['id'] }}">Detail</a>
                                        <div class="btn-group ml-1" role="group" aria-label="Button group with nested dropdown">
                                            <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary font-mini dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                More..
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item font-mini btn-monthly-email pointer" data-toggle="modal" data-target="#modalMonthlyEmail" data-id="{{ $borrower['id'] }}">Monthly Statement</a>
                                                <a class="dropdown-item font-mini btn-monthly-payment pointer" data-toggle="modal" data-target="#modalMonthlyPayment" data-id="{{ $borrower['id'] }}">Sequence Payment</a>
                                                <a class="dropdown-item font-mini btn-blacklist pointer" data-toggle="modal" data-target="#modalBlacklist" data-id="{{ $borrower['id'] }}">Blacklist</a>
                                                <a class="dropdown-item font-mini btn-payment-completed pointer" data-toggle="modal" data-target="#modalPaymentCompleted" data-id="{{ $borrower['id'] }}">Payment Completed</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @else
                                <td colspan="3">
                                    <div class="d-flex flex-row justify-content-around">
                                        <a class="btn btn-primary font-mini btn-detail-borrower" data-toggle="modal" data-target="#modalDetailData" data-id="{{ $borrower['id'] }}">Detail</a>
                                        <div class="btn-group ml-1" role="group" aria-label="Button group with nested dropdown">
                                            <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary font-mini dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                More..
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item font-mini btn-disburse pointer" data-toggle="modal" data-target="#modalDisbursement" data-id="{{ $borrower['id'] }}">Disbursed</a>
                                                <a class="dropdown-item font-mini btn-blacklist pointer" data-toggle="modal" data-target="#modalBlacklist" data-id="{{ $borrower['id'] }}">Blacklist</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        @endif
                    </tr>
                @empty
                    <td colspan="7" class="text-center">No Data Available Now</td>
                @endforelse
              </tbody>
          </table>
      </div>
  </div>
</section>
@endsection

@section('modal')
<!-- Modal for Detail Data-->
<div class="modal fade" id="modalDetailData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Borrower Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body fixed-height-custom">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Loan Disbursement -->
<div class="modal fade" id="modalDisbursement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Loan Disbursement Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p>Does loan disbursement successfully send?</p>
        </div>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>

<!-- Modal for Monthly Payment -->
<div class="modal fade" id="modalMonthlyPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    </div>
    </div>
</div>

<!-- Modal for Monthly Email -->
<div class="modal fade" id="modalMonthlyEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    </div>
    </div>
</div>

<!-- Modal for Blacklist Borrower -->
<div class="modal fade" id="modalBlacklist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Blacklist Borrower</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <p>Are you sure want to blacklist selected borrower?</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal for Payment Completed -->
<div class="modal fade" id="modalPaymentCompleted" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment Completed</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>Confirm that this borrower completes the payment?</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('.btn-disburse').on('click',function(){
            let id = $(this).data('id');
            $.ajax({
                url: `/dashboard/getModalDisbursement/${id}`,
                type:'GET',
                success: function(data){
                    $('#modalDisbursement').find('.modal-footer').html(data);
                    $('#modalDisbursement').modal('show');
                }
                });
            });

            $('.btn-detail-borrower').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: `/dashboard/getModalDetailBorrower/${id}`,
                    type: 'GET',
                    success: function(data){
                        $('#modalDetailData').find('.modal-body').html(data);
                        $('#modalDetailData').modal('show');
                    }
                });
            });

            $('.btn-monthly-email').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: `/dashboard/getModalMonthlyEmail/${id}`,
                    type: 'GET',
                    success: function(data){
                        $('#modalMonthlyEmail').find('.modal-content').html(data);
                        $('#modalMonthlyEmail').modal('show');
                    }
                });
            });

            $('.btn-blacklist').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: `/dashboard/getModalBlacklistBorrower/${id}`,
                    type: 'GET',
                    success: function(data){
                        $('#modalBlacklist').find('.modal-footer').html(data);
                        $('#modalBlacklist').modal('show');
                    }
                });
            });

            $('.btn-payment-completed').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: `/dashboard/getModalPaymentCompleted/${id}`,
                    type: 'GET',
                    success: function(data){
                        $('#modalPaymentCompleted').find('.modal-footer').html(data);
                        $('#modalPaymentCompleted').modal('show');
                    }
                });
            });

            $('.btn-monthly-payment').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: `/dashboard/getModalMonthlyPayment/${id}`,
                    type: 'GET',
                    success: function(data){
                        $('#modalMonthlyPayment').find('.modal-content').html(data);
                        $('#modalMonthlyPayment').modal('show');
                    }
                });
            });

            $('#tableid').DataTable();
        });
    </script>
@endpush