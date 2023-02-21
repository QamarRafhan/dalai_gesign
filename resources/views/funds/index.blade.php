@extends('layouts.app')

@section('title', 'Funds List')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Funds</h1>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('fundcreate') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Add New
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('users.export') }}" class="btn btn-sm btn-success">
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
                    <h6 class="m-0 font-weight-bold text-primary">All Funds</h6>
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
                            <th width="25%">Source</th>
                            <th width="15%">Value</th>
                            <th width="15%">Currency</th>
                            <th width="15%">Value_Eur</th>
                            <th width="15%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funds as $fund)
                        <tr>
                            <td>{{ $fund->name }}</td>
                            <td>{{ $fund->source }}</td>
                            <td>{{ $fund->value }}</td>
                            <td>{{ $fund->currency }}</td>
                            <td>{{$fund->value_eur}}</td>
                            <td style="display: flex">

                                <a href="{{route('funds.edit',['fund' => $fund->id])}}" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a class="btn btn-danger m-2" href="{{route('deletefund',['id' => $fund->id])}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $funds->links() }}
            </div>
        </div>
    </div>

</div>


@endsection

@section('scripts')

@endsection