@extends('layouts.app')

@section('title', 'CreateReoptrs')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Report</h1>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Report</h6>
        </div>
        <form method="POST" action="{{route('reportsave')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Fund Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="Fund Name" 
                            name="name" 
                            value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Amount</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="Amount" 
                            name="amount" 
                            value="{{ old('amount') }}">

                        @error('amount')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Amount EUR</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="Amount EUR" 
                            name="amount_eur" 
                            value="{{ old('amount_eur') }}">

                        @error('amount_eur')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date</label>
                        <input 
                            type="date" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="Date" 
                            name="date" 
                            value="{{ old('date') }}">

                        @error('date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Status</label>
                        <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection