@extends('layouts.app')

@section('title', ' Operations List')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operations</h1>
        @hasrole('Admin')
        <a href="{{ route('operations.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New Operation
        </a>
        @endhasrole
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">All Operations</h6>
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
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Amount eur</th>
                            <th>Amount Tokens</th>
                            <th>Date Unblock</th>
                            <th>Status</th>
                            <th>Comments</th>
                           
                            @hasrole('Admin')
                            <th>Actions</th>
                            @endhasrole
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($operations as $single)
                        <tr>
                            <td>{{ $single->date }}</td>
                            <td>{{ $single->amount }}</td>
                            <td>{{ $single->currency }}</td>
                            <td>{{$single->amount_eur}}</td>
                            <td>{{ $single->amount_tokens }}</td>
                            <td>{{ $single->date_unblock }}</td>
                            <td>{{ $single->status }}</td>
                            <td>{{ $single->comments }}</td>
                            @hasrole('Admin')
                            <td style="display: flex">

                                <a href="{{ route('operations.edit', [ 'operation' => $single]) }}" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a data-toggle="modal" data-load-url="{{ route('operations.destroy', [ 'operation' => $single]) }}" data-target="#deleteModal3" href="#" class="btn btn-danger m-2 delete_model">

                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>
                            @endhasrole
                        </tr>
                        @empty
                        <tr>

                            <td colspan="100" class="text-center">Data is Not Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $operations->links() }}
            </div>
        </div>
    </div>

</div>

@include('users.operations.delete-modal')
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