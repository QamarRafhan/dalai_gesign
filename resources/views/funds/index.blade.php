@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Funds</h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('fundcreate') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('users.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>
                
            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">All Funds</h6>
                    </div>
                    <div class="col-4">
                        @hasrole('Admin')
                        <div class="row">
                            <div class="col-6">
                             <button class="btn btn-sm btn-primary w-100" href="">Agents</button>
                            </div>
                            <div class="col-6">
                             <button class="btn btn-sm btn-primary w-100" href="">Clients</button>
                            </div>
                        </div>
                        @endhasrole
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
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funds as $fund)
                                <tr>
                                    <td>{{ $fund->name }}</td>
                                    <td>{{ $fund->source }}</td>
                                    <td>{{ $fund->value }}</td>
                                    <td>{{ $fund->currency }}</td>
                                    <td>{{$fund->value_eur}}</td>
                                    <!-- @if(auth()->user()->hasAnyPermission(['user-edit','user-edit']))
                                    <td style="display: flex">
                                    @can('user-edit')
                                        @if ($fund->status == 0)
                                            <a href="{{ route('users.status', ['user_id' => $fund->id, 'status' => 1]) }}"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif ($fund->status == 1)
                                            <a href="{{ route('users.status', ['user_id' => $fund->id, 'status' => 0]) }}"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                        @endif
                                        @endcan
                                        @can('user-edit')
                                        <a href="{{ route('users.edit', ['user' => $fund->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        @endcan
                                        @can('user-delete')
                                        <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        @endcan
                                    </td>
                                    @endif -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $funds->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    
@endsection
