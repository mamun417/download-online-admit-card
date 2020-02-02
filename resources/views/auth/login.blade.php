@extends('auth.layouts.app')

@section('custom-meta')
    <title>Login - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ url('assets/images/big/auth-bg.jpg') }}) no-repeat center center;">
        <div class="auth-box">
            <div id="loginform">
                <div class="logo">
                    <span class="db">
                        <img src="{{ url('assets/images/logo_dark.png') }}" alt="Logo" />
                    </span>
                    <h5 class="font-medium m-b-20 m-t-15">Sign In to Your Account</h5>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                </div>
                <!-- Form -->

                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal m-t-20" id="loginform" action="{{ route('admin.login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input style="font-size: .875rem" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email" aria-label="Email" aria-describedby="basic-addon1" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                                </div>
                                <input style="font-size: .875rem" type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="Password" aria-describedby="basic-addon1" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if(Request::is('admin*'))
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input name="remember" type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                            <a href="{{ route('admin.password.request') }}" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> Forgot Password ?</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group text-center">
                                <div class="col-xs-12">
                                    <button class="btn btn-block btn-lg btn-success" type="submit">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
