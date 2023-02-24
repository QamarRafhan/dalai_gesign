@extends('layouts.app')

@section('title', 'Reports List')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reports</h1>
        <a href="{{ route('reports.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
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
                            <th width="50%">Value</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $report)
                        <tr>
                            <td>{{ $report->name }}</td>
                            <td>{{ $report->date?$report->date->format('d/m/Y'): ''}}</td>
                            <td>@if($report->route) <a href="{{ asset('storage/report_file/'. $report->route) }}" download target="_blank">Download </a> @endif



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


@endsection

@section('scripts')

@endsection