@extends('auth.layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">

    <div class="text-center mt-5">
        <h1 class="text-white">{{ __('Register') }}</h1>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-4 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-8">
                        <div class="px-3 py-4">
                            @if (session('error'))
                            <span class="text-danger"> {{ session('error') }}</span>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">First Name</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror" id="exampleFirstName" name="first_name" value="{{ old('first_name') }}">

                                        @error('first_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">Last Name</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror" id="exampleLastName" name="last_name" value="{{ old('last_name') }}">

                                        @error('last_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">Mobile Number</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-user @error('mobile_number') is-invalid @enderror" id="exampleMobile" name="mobile_number" value="{{ old('mobile_number') }}">

                                        @error('mobile_number')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-user @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">City</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-user @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}">

                                        @error('city')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">Country</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-user @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}">

                                        @error('country')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">Cp</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-user @error('cp') is-invalid @enderror" name="cp" value="{{ old('cp') }}">

                                        @error('cp')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">Dni</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-user @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}">

                                        @error('dni')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <input type='checkbox' data-toggle='collapse' name="is_company"  data-target='#collapsediv1'> Company
                                    </input>
                                </div>
                                <div id='collapsediv1' class='collapse div1 row mt-2'>
                                    <div class="col-md-4 mb-2">
                                        <label class="labels"> <span style="color:red;">*</span>Company Name</label>
                                        <input type="text" class="form-control  @error('c_name') is-invalid @enderror" placeholder="Company Name" name="c_name" >

                                        @error('c_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="labels"> <span style="color:red;">*</span>Company Address</label>
                                        <input type="text" class="form-control  @error('c_address') is-invalid @enderror" placeholder="Company Address" name="c_address" >

                                        @error('c_address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="labels"> <span style="color:red;">*</span>Company Country</label>
                                        <input type="text" class="form-control  @error('c_country') is-invalid @enderror" placeholder="Company Country" name="c_country" >

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
                                        <input type="text" class="form-control  @error('c_cif') is-invalid @enderror" placeholder="Company CIF" name="c_cif" >

                                        @error('c_cif')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <h6 class="text-white">Developed By : <a class="text-white" href="https://techtoolindia.com">TechTool India</a></h6>
    </div>

</div>
@endsection