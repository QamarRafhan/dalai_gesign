@extends('layouts.app')

@section('title', 'Users List')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
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
                    <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
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
                            <th width="25%">Email</th>
                            <th width="15%">Mobile</th>
                            <th width="15%">Role</th>
                            <th width="15%">Status</th>
                            @if(auth()->user()->hasAnyPermission(['user-edit','user-edit']))
                            <th width="10%">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile_number }}</td>
                            <td>{{ $user->roles ? $user->roles->pluck('name')->first() : 'N/A' }}</td>
                            <td>
                                @if ($user->status == 0)
                                <span class="badge badge-danger">Inactive</span>
                                @elseif ($user->status == 1)
                                <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            @if(auth()->user()->hasAnyPermission(['user-edit','user-edit']))
                            <td style="display: flex">
                                @can('user-edit')
                                @if ($user->status == 0)
                                <a href="{{ route('users.status', ['user_id' => $user->id, 'status' => 1]) }}" class="btn btn-success m-2">
                                    <i class="fa fa-check"></i>
                                </a>
                                @elseif ($user->status == 1)
                                <a href="{{ route('users.status', ['user_id' => $user->id, 'status' => 0]) }}" class="btn btn-danger m-2">
                                    <i class="fa fa-ban"></i>
                                </a>
                                @endif
                                @endcan
                                @can('user-edit')
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                @endcan
                                @can('user-delete')
                                <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-trash"></i>
                                </a>
                                @endcan
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </div>

</div>

@include('users.delete-modal')

@endsection

@section('scripts')

@endsection