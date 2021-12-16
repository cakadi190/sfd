@extends('layouts.app')

@section('content')
<div>

    <!-- Header -->
    <section id="page-title" class="mb-4 pb-2 border-bottom">
        <div class="d-md-flex align-items-center justify-content-between">
            <h3 class="mb-0">Sales</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">SmartFunding Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sales</li>
                </ol>
            </nav>
        </div>
    </section>

    <section id="main-content">
        <div class="table-responsive card">
            <table class="table table-striped border-top-0 mb-0">
                <thead>
                    <th class="border-top-0">Date, Time</th>
                    <th class="border-top-0">Loan ID</th>
                    <th class="border-top-0">Status</th>
                    <th class="border-top-0">Borrower Name</th>
                    <th class="border-top-0">Ammount</th>
                    <th class="border-top-0">Late Charge</th>
                    <th class="border-top-0">Installment</th>
                </thead>
                <tbody>
                    @forelse ($data as $d)
                        <tr>
                            <td class="text-center"> {{ $d['date_time'] }} </td>
                            <td class="text-center"> {{ $d['loan_id'] }} </td>
                            <td class="text-center"> {{ $d['status'] }} </td>
                            <td class="text-center"> {{ $d['name'] }} </td>
                            <td class="text-center"> {{ $d['finance_ammount'] }} </td>
                            <td class="text-center"> {{ $d['late_charge'] }} </td>
                            <td class="text-center">
                                <a class="btn btn-primary font-mini btn-detail-installment" data-toggle="modal" data-target="#modalDetailInstallment" data-id="{{ $d['id'] }}">Detail</a>
                            </td>
                        </tr>

                        <!-- Modal for Detail Data-->
                        <div class="modal fade" id="modalDetailInstallment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Instalment</h5>
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
                    @empty
                        <td colspan="8" class="text-center">No Data Available Now</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

@push('js')
    <script>
        $('.btn-detail-installment').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: `/dashboard/getModalDetailInstallment/${id}`,
                    type: 'GET',
                    success: function(data){
                        $('#modalDetailInstallment').find('.modal-body').html(data);
                        $('#modalDetailInstallment').modal('show');
                    }
                });
        });
    </script>
@endpush
