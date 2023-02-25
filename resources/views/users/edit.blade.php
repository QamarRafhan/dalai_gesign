@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <form method="POST" action="{{route('users.update', ['user' => $user->id])}}">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group row">

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>First Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('first_name') is-invalid @enderror" 
                            id="exampleFirstName"
                            placeholder="First Name" 
                            name="first_name" 
                            value="{{ old('first_name') ?  old('first_name') : $user->first_name}}">

                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Last Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('last_name') is-invalid @enderror" 
                            id="exampleLastName"
                            placeholder="Last Name" 
                            name="last_name" 
                            value="{{ old('last_name') ? old('last_name') : $user->last_name }}">

                        @error('last_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Email</label>
                        <input 
                            type="email" 
                            class="form-control form-control-user @error('email') is-invalid @enderror" 
                            id="exampleEmail"
                            placeholder="Email" 
                            name="email" 
                            value="{{ old('email') ? old('email') : $user->email }}">

                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Mobile Number</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('mobile_number') is-invalid @enderror" 
                            id="exampleMobile"
                            placeholder="Mobile Number" 
                            name="mobile_number" 
                            value="{{ old('mobile_number') ? old('mobile_number') : $user->mobile_number }}">

                        @error('mobile_number')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Role</label>
                        <select class="form-control form-control-user @error('role_id') is-invalid @enderror" name="role_id">
                            <option selected disabled>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}" 
                                    {{old('role_id') ? ((old('role_id') == $role->id) ? 'selected' : '') : (($user->role_id == $role->id) ? 'selected' : '')}}>
                                    {{$role->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Status</label>
                        <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" {{old('role_id') ? ((old('role_id') == 1) ? 'selected' : '') : (($user->status == 1) ? 'selected' : '')}}>Active</option>
                            <option value="0" {{old('role_id') ? ((old('role_id') == 0) ? 'selected' : '') : (($user->status == 0) ? 'selected' : '')}}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Address</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('address') is-invalid @enderror" 
                            
                            placeholder="Address" 
                            name="address" 
                            value="{{ old('address', $user->address) }}">

                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>City</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('city') is-invalid @enderror" 
                            
                            placeholder="City" 
                            name="city" 
                            value="{{ old('city', $user->city) }}">

                        @error('city')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Country</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('country') is-invalid @enderror" 
                            
                            placeholder="Country" 
                            name="country" 
                            value="{{ old('country', $user->country) }}">

                        @error('country')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Cp</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('cp') is-invalid @enderror" 
                            
                            placeholder="Cp" 
                            name="cp" 
                            value="{{ old('cp', $user->cp) }}">

                        @error('cp')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Dni</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('dni') is-invalid @enderror" 
                            
                            placeholder="dni" 
                            name="dni" 
                            value="{{ old('dni', $user->cp) }}">

                        @error('dni')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <div class="form-group">
                    <input type='checkbox' data-toggle='collapse' name="is_company" data-target='#collapsediv1'> Company
                    </input>
                </div>
                <div id='collapsediv1' class='collapse div1 row mt-2'>
                    <div class="col-md-4 mb-2">
                        <label class="labels"> <span style="color:red;">*</span>Company Name</label>
                        <input type="text" class="form-control  @error('c_name') is-invalid @enderror" placeholder="Company Name" name="c_name">

                        @error('c_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="labels"> <span style="color:red;">*</span>Company Address</label>
                        <input type="text" class="form-control  @error('c_address') is-invalid @enderror" placeholder="Company Address" name="c_address">

                        @error('c_address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="labels"> <span style="color:red;">*</span>Company Country</label>
                        <input type="text" class="form-control  @error('c_country') is-invalid @enderror" placeholder="Company Country" name="c_country">

                        @error('c_country')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="labels"> <span style="color:red;">*</span>Company Cp</label>
                        <input type="text" class="form-control  @error('c_cp') is-invalid @enderror" placeholder="Cp" name="c_cp">

                        @error('c_cp')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="labels"> <span style="color:red;">*</span>Company Phone</label>
                        <input type="text" class="form-control  @error('c_phone') is-invalid @enderror" placeholder="Company Phone" name="c_phone">

                        @error('c_phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="labels"> <span style="color:red;">*</span>Company CIF</label>
                        <input type="text" class="form-control  @error('c_cif') is-invalid @enderror" placeholder="Company CIF" name="c_cif">

                        @error('c_cif')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
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