@extends('layouts.app')

@section('title', 'Reports List')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reports</h1>
        @hasrole('Admin')
        <a href="{{ route('reports.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New
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
                    <h6 class="m-0 font-weight-bold text-primary">All Reports</h6>
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
                            <th width="25%">Name</th>
                            <th width="25%">Source</th>
                            <th width="50%">Download</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $report)
                        <tr>
                            <td>{{ $report->name }}</td>
                            <td>{{ $report->date?$report->date->format('d/m/Y'): ''}}</td>
                            <td>@if($report->route) <a href="{{ asset('storage/report_file/'. $report->route) }}" download target="_blank">Download </a> @endif



                            </td>
                            <td style="display: flex">

                                <a href="{{route('reports.edit',['report' => $report->id])}}" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a data-toggle="modal" data-load-url="{{ route('reports.destroy', ['report' => $report->id]) }}" data-target="#deleteModal3" href="#" class="btn btn-danger m-2 delete_model">

                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Data is Not Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $reports->links() }}
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
            console.log('dhfsghafg')
            var loadurl = $(this).data('load-url');
            $('#delete_model_form').attr('action', loadurl);

        });

    });
</script>

@endsection