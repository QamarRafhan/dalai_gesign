@extends('layouts.app')

@section('title', 'Edit Fund')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Fund</h1>
        <a href="{{route('funds.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Fund</h6>
        </div>
        <form method="POST" action="{{route('funds.update',['fund' => $fund->id])}}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Fund Name</label>
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Fund Name" name="name" value="{{ old('name') ?  old('name') : $fund->name}}">


                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection