@extends('layouts.app')

@section('title', 'Requests')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Requests</h1>
        <div class="row">

            <div class="col-md-12">
                <a href="" class="btn btn-sm btn-success">
                    <i class="fas fa-check"></i> Export To Excel
                </a>
            </div>

        </div>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')

    <div class="row">
        <div class="col mb-3">
            <a class="btn btn-social text-white btn-primary request_id request_modal" data-toggle="modal" data-target="#deleteModal2"> <i class="fa fa-arrow-left mr-1"></i>In Request</a>
            <a class="btn btn-social text-white btn-primary request_out request_modal" data-toggle="modal" data-target="#deleteModal2"><i class="fa fa-arrow-right mr-1"></i>Out Request</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">All Requests</h6>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="25%">Fund</th>
                            <th width="25%">Date</th>
                            <th width="15%">Amount</th>
                            <th width="15%">Amount EUR</th>
                            <th width="15%">Type</th>
                            <th width="15%">Status</th>
                            <th width="15%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allreqs as $allreq)
                        <tr>
                            <td>{{ $allreq->fund? $allreq->fund->name : ''}}</td>
                            <td>{{ $allreq->created_at }}</td>
                            <td>{{ $allreq->amount }}</td>
                            <td>{{ $allreq->amount_eur }}</td>
                            <td> {{$allreq->operation_type == 1 ? 'In' : 'Out'}}</td>
                            <td> {{$allreq->allStatus[$allreq->status]}}</td>
                            <td style="display: flex">

                                <a data-toggle="modal" data-load-url="{{route('requests.edit', ['request' => $allreq->id])}}" data-target="#editReportModal" href="#" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a data-toggle="modal" data-load-url="{{ route('requests.destroy', ['request' => $allreq->id]) }}" data-target="#deleteModal3" href="#" class="btn btn-danger m-2 delete_report">

                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data is Not Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

                {{ $allreqs->links() }}

            </div>
        </div>
    </div>

</div>


@include('request.create-modal')

@include('request.delete-modal')
<div id="editReportModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Add New Request</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body1">
                <p>Loading...</p>
            </div>

        </div>
    </div>


    @endsection

    @section('scripts')
    <script>
        $(document).ready(function() {

            var type = 1;

            
            $('.delete_report').on('click', function(e) { 

                var loadurl = $(this).data('load-url');
    
                $('#report-delete-form').attr('action', loadurl);

            });
            $('.request_modal').on('click', function(e) {
                if ($(this).hasClass('request_out')) {
                    $('.request_type').val(0);
                } else {
                    $('.request_type').val(1);
                }
            });

            $(document).on('submit', 'form', function(e) {

                var url = $(this).attr('action');
                var $form = $(this);

                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: url,
                    data: $form.serialize(),
                    success: function() {
                        location.reload();
                    }
                });

            });


            $('#editReportModal').on('show.bs.modal', function(e) {
                var loadurl = $(e.relatedTarget).data('load-url');
                $(this).find('.modal-body1').load(loadurl);
            });

        });
    </script>

    @endsection