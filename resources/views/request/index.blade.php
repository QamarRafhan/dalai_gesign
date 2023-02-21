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
            <a class="btn btn-social text-white btn-primary"  data-toggle="modal" data-target="#deleteModal" > <i class="fa fa-arrow-left mr-1"></i>In Request</a>
            <a class="btn btn-social text-white btn-primary"  data-toggle="modal" data-target="#deleteModal"><i class="fa fa-arrow-right mr-1"></i>Out Request</a>
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
                            <th width="20%">Name</th>
                            <th width="25%">Date</th>
                            <th width="15%">Amount</th>
                            <th width="15%">Amount EUR</th>
                            <th width="15%">Status</th>
                            <th width="15%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allreqs as $allreq)
                        <tr>
                            <td>{{ $allreq->name }}</td>
                            <td>{{ $allreq->created_at }}</td>
                            <td>{{ $allreq->amount }}</td>
                            <td>{{ $allreq->amount_eur }}</td>
                            <td> {{$allreq->status == 1 ? 'Active' : 'InActive'}}</td>
                            <td style="display: flex">

                                <a href="" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a class="btn btn-danger m-2" href="">
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

@endsection

@section('scripts')

@endsection