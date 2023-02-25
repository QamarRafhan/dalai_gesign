@extends('layouts.app')

@section('title', 'Fund Operations List')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operations</h1>
        <a href="{{ route('funds.operations.create', ['fund' => $fund]) }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New Operation
        </a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">All Fund Operations</h6>
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
                            <th>Token Investment</th>
                            <th>Eur Investment</th>
                            <th>Num Tokens</th>
                            <th>Value Imported</th>
                            <th>Token Value</th>
                            <th>Profit</th>
                            <th>Increase</th>
                            <th>Commissions</th>
                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse($operations as $single)
                        <tr>
                            <td>{{ $single->date }}</td>
                            <td>{{ $single->token_investment }}</td>
                            <td>{{ $single->eur_investment }}</td>
                            <td>{{$single->num_tokens}}</td>
                            <td>{{ $single->value_imported }}</td>
                            <td>{{ $single->token_value }}</td>
                            <td>{{ $single->profit }}</td>
                            <td>{{ $single->increase }}</td>
                            <td>{{ $single->commissions }}</td>

                            <td style="display: flex">

                                <a href="{{ route('funds.operations.edit', ['fund' => $fund->id, 'operation' => $single]) }}" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a data-toggle="modal" data-load-url="{{ route('funds.operations.destroy', ['fund' => $fund->id, 'operation' => $single]) }}" data-target="#deleteModal3" href="#" class="btn btn-danger m-2 delete_model">

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

                {{ $operations->links() }}
            </div>
        </div>
    </div>

</div>

@include('funds.operations.delete-modal')
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