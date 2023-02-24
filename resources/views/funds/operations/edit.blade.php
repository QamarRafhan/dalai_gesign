@extends('layouts.app')

@section('title', 'Edit Fund')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Fund</h1>
        <a href="{{route('fundlist')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Fund</h6>
        </div>
        <form method="POST" action="{{route('updatefund',['id' => $funds->id])}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Fund_id</label>
                        <input 
                            type="number" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="Soucre" 
                            name="id_fund" 
                            value="{{ old('id_fund') ?  old('id_fund') : $funds->id_fund}}">

                
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Source</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="Soucre" 
                            name="source" 
                            value="{{ old('source') ?  old('source') : $funds->source}}">

                
                    </div>

               
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Value</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleLastName"
                            placeholder="Value" 
                            name="value" 
                            value="{{ old('value') ? old('value') : $funds->value }}">

                    </div>

         
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Currency</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleEmail"
                            placeholder="Email" 
                            name="currency" 
                            value="{{ old('currency') ? old('currency') : $funds->currency }}">

                    </div>


                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Value_Eur</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('') is-invalid @enderror" 
                            id="exampleMobile"
                            placeholder="value_eur" 
                            name="value_eur" 
                            value="{{ old('value_eur') ? old('value_eur') : $funds->value_eur }}">

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