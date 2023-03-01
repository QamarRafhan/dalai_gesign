
@extends('layouts.app')

@section('title', 'Edit Fund Management')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Fund Management</h1>
        <a href="{{ route('funds.fund-management.index', ['fund' => $fund]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Fund Management</h6>
        </div>
        <form method="POST" action="{{ route('funds.fund-management.update' , ['fund' => $fund, 'fund_management' => $fund_management]) }}">
            @csrf
           
               @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Source</label>
                        <input type="text" class="form-control form-control-user @error('') is-invalid @enderror" id="exampleFirstName" placeholder="Soucre" name="source" value="{{ old('source')?old('source') : $fund_management->source }}">


                    </div>


                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Value</label>
                        <input type="text" class="form-control form-control-user @error('') is-invalid @enderror" id="exampleLastName" placeholder="Value" name="value" value="{{ old('value') ? old('value') :$fund_management->value  }}">

                    </div>


                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Currency</label>
                        <input type="text" class="form-control form-control-user @error('') is-invalid @enderror" id="exampleEmail" placeholder="currency" name="currency" value="{{ old('currency')? old('currency') :$fund_management->currency  }}">

                    </div>


                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Value_Eur</label>
                        <input type="text" class="form-control form-control-user @error('') is-invalid @enderror" id="exampleMobile" placeholder="value_eur" name="value_eur" value="{{ old('value_eur')? old('value_eur') :$fund_management->value_eur }}">

                    </div>


                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('funds.fund-management.index', ['fund' => $fund]) }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection