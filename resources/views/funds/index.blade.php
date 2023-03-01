@extends('layouts.app')

@section('title', 'Funds List')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Funds</h1>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('funds.create') }}" class="btn btn-sm btn-primary">
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
                            <th width="20%">Fund Name</th>
                            <th width="15%">Operations</th>
                            <th width="15%">Fund Management</th>
                            <th width="15%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($funds as $fund)

                        <tr>
                            <td>{{ $fund->name }}</td>

                            <td>

                                <a href="{{route('funds.operations.index',['fund' => $fund->id])}}" class="btn btn-primary m-2">
                                    Operations
                                </a>

                            </td>
                            <td>

                                <a href="{{route('funds.fund-management.index',['fund' => $fund->id])}}" class="btn btn-primary m-2">
                                    Management
                                </a>

                            </td>

                            <td style="display: flex">

                                <a href="{{route('funds.edit',['fund' => $fund->id])}}" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a data-toggle="modal" data-load-url="{{ route('funds.destroy', ['fund' => $fund->id]) }}" data-target="#deleteModal3" href="#" class="btn btn-danger m-2 delete_model">

                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>

                            <td colspan="4" class="text-center">Data is Not Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $funds->links() }}
            </div>
        </div>
    </div>

</div>

@include('funds.delete-modal')
@endsection

@section('scripts')


<script>
    $(document).ready(function() {
        $('.delete_model').on('click', function(e) {
            var loadurl = $(this).data('load-url');
            $('#delete_model_form').attr('action', loadurl);

        });

    });
</script>

@endsection