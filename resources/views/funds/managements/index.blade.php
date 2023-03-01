@extends('layouts.app')

@section('title', 'Fund Managements List')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Managements</h1>
        <a href="{{route('funds.fund-management.create' , ['fund' => $fund])}}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New Management
        </a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">All Fund Managements</h6>
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
                            <th width="15%">Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse($managements as $single)
                        <tr>
                            <td>{{ $fund->name }}</td>
                            <td>{{ $single->source }}</td>
                            <td>{{ $single->value }}</td>
                            <td>{{ $single->currency }}</td>
                            <td>{{$single->value_eur}}</td>


                            <td style="display: flex">

                                <a href="{{route('funds.fund-management.edit',['fund' => $fund->id, 'fund_management'=>$single ])}}" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a data-toggle="modal" data-load-url="{{ route('funds.fund-management.destroy', ['fund' => $fund->id, 'fund_management' => $single]) }}" data-target="#deleteModal3" href="#" class="btn btn-danger m-2 delete_model">

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

                {{ $managements->links() }}
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