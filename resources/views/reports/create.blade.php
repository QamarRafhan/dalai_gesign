@extends('layouts.app')

@section('title', 'CreateReoptrs')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Report</h1>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Report</h6>
        </div>
        <form method="POST" action="{{route('reports.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Name</label>
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name')}}">
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>File</label>
                        <input class="form-control form-control-user @error('report_file') is-invalid @enderror" id="exampleFirstName" name="report_file" id="report_file" type="file" required>
                        @error('report_file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

            </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
        <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('reports.index') }}">Cancel</a>
    </div>
    </form>
</div>

</div>


@endsection