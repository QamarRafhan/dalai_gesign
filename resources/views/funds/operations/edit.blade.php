@extends('layouts.app')

@section('title', 'Fund Operation')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Fund Operation</h1>
        <a href="{{route('funds.operations.index', ['fund' => $fund])}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$fundOperation->id? 'Update fund operation' : 'Add fund operation'}}</h6>
        </div>
        <form method="POST" action="{{route($fundOperation->id?'funds.operations.update':'funds.operations.store' , ['fund' => $fund, 'operation' => $fundOperation])}}">
            @csrf
            @if($fundOperation->id)
            @method('PUT')
            @endif
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date</label>
                        <input type="text" class="form-control form-control-user @error('date') is-invalid @enderror"  placeholder="Date" name="date" value="{{ old('date', $fundOperation->date) }}">

                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Token Investment</label>
                        <input type="text" class="form-control form-control-user @error('token_investment') is-invalid @enderror"  placeholder="Token Investment" name="token_investment" value="{{ old('token_investment',$fundOperation->token_investment) }}">

                        @error('token_investment')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Eur Investment</label>
                        <input type="text" class="form-control form-control-user @error('eur_investment') is-invalid @enderror"  placeholder="Eur Investment" name="eur_investment" value="{{ old('eur_investment',$fundOperation->eur_investment) }}">

                        @error('eur_investment')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Num Tokens	</label>
                        <input type="text" class="form-control form-control-user @error('num_tokens') is-invalid @enderror"  placeholder="Num Tokens" name="num_tokens" value="{{ old('num_tokens',$fundOperation->num_tokens) }}">

                        @error('num_tokens')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Value Beginning</label>
                        <input type="text" class="form-control form-control-user @error('value_beginning') is-invalid @enderror"  placeholder="Value Beginning" name="value_beginning" value="{{ old('value_beginning',$fundOperation->value_beginning) }}">

                        @error('value_beginning')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Value Imported</label>
                        <input type="text" class="form-control form-control-user @error('value_imported') is-invalid @enderror"  placeholder="Value Imported" name="value_imported" value="{{ old('value_imported',$fundOperation->value_imported) }}">

                        @error('value_imported')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Value End</label>
                        <input type="text" class="form-control form-control-user @error('value_end') is-invalid @enderror"  placeholder="Value Imported" name="value_end" value="{{ old('value_end',$fundOperation->value_end) }}">

                        @error('value_end')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Token Value</label>
                        <input type="text" class="form-control form-control-user @error('token_value') is-invalid @enderror"  placeholder="Token Value" name="token_value" value="{{ old('token_value',$fundOperation->token_value) }}">

                        @error('token_value')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Profit</label>
                        <input type="text" class="form-control form-control-user @error('profit') is-invalid @enderror"  placeholder="Profit" name="profit" value="{{ old('profit',$fundOperation->profit) }}">

                        @error('profit')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Increase</label>
                        <input type="text" class="form-control form-control-user @error('increase') is-invalid @enderror"  placeholder="Increase" name="increase" value="{{ old('increase',$fundOperation->increase) }}">

                        @error('increase')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Commissions</label>
                        <input type="text" class="form-control form-control-user @error('commissions') is-invalid @enderror"  placeholder="Commissions" name="commissions" value="{{ old('commissions',$fundOperation->commissions) }}">

                        @error('commissions')
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