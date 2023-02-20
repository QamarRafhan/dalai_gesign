@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Requests</h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>
                
            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

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
                            @foreach ($allreqs as $allreq)
                                <tr>
                                    <td>{{ $allreq->name }}</td>
                                    <td>{{ $allreq->created_at }}</td>
                                    <td>{{ $allreq->amount }}</td>
                                    <td>{{ $allreq->amount_eur }}</td>
                                    @if($allreq->status == 1)
                                    <td>Active</td>
                                    @elseif($allreq->status == 0)
                                    <td>InActive</td>
                                    @endif
                                    <td style="display: flex">
                                  
                                        <a href=""
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger m-2" href="" >
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $allreqs->links() }}
                
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    
@endsection
