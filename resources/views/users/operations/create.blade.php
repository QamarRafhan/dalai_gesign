@extends('layouts.app')

@section('title', 'Fund Operation')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Fund Operation</h1>
        <a href="{{route('operations.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$userOperation->id? 'Update fund operation' : 'Add fund operation'}}</h6>
        </div>
        <form method="POST" action="{{route($userOperation->id?'operations.update':'operations.store' , ['fundOperation' => $userOperation])}}">
            @csrf
            @if($userOperation->id)
            @method('PUT')
            @endif
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date</label>
                        <input type="text" class="form-control form-control-user @error('date') is-invalid @enderror" placeholder="Date" name="date" value="{{ old('date', $userOperation->date) }}">

                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Fund
                        <select class="form-control form-control-user " name="ID_fund" required>
                            @foreach ($funds as $fund)
                            <option value="{{$fund->id}}" {{$userOperation->ID_fund==$fund->id? 'selected' : ''}}>{{$fund->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Currency</label>
                        <input type="text" class="form-control form-control-user @error('currency') is-invalid @enderror" placeholder="Currency" name="currency" value="{{ old('currency',$userOperation->currency) }}">

                        @error('currency')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Amount eur</label>
                        <input type="text" class="form-control form-control-user @error('amount_eur') is-invalid @enderror" placeholder="amount eur" name="amount_eur" value="{{ old('amount_eur',$userOperation->amount_eur) }}">

                        @error('amount_eur')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Amount tokens</label>
                        <input type="text" class="form-control form-control-user @error('amount_tokens') is-invalid @enderror" placeholder="amount tokens" name="amount_tokens" value="{{ old('amount_tokens',$userOperation->amount_tokens) }}">

                        @error('amount_tokens')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Amount tokens</label>
                        <input type="text" class="form-control form-control-user @error('amount_tokens') is-invalid @enderror" placeholder="amount tokens" name="amount_tokens" value="{{ old('amount_tokens',$userOperation->amount_tokens) }}">

                        @error('amount_tokens')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date unblock</label>
                        <input type="text" class="form-control form-control-user @error('date_unblock') is-invalid @enderror" placeholder="date unblock" name="date_unblock" value="{{ old('date_unblock',$userOperation->date_unblock) }}">

                        @error('date_unblock')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>status</label>
                        <input type="text" class="form-control form-control-user @error('status') is-invalid @enderror" placeholder="status" name="status" value="{{ old('status',$userOperation->status) }}">

                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>comments</label>
                        <input type="text" class="form-control form-control-user @error('comments') is-invalid @enderror" placeholder="comments" name="comments" value="{{ old('comments',$userOperation->comments) }}">
                        @error('comments')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('operations.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection