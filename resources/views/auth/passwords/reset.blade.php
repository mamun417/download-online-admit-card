@extends('auth.layouts.app')

@section('custom-meta')
    <title>Reset Password - {{ config('app.name') }}</title>
@endsection

@section('content')

    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url( {{ url('assets/images/big/auth-bg.jpg') }} ) no-repeat center center;">

        <div class="auth-box">
            <div class="logo">
                <span class="db">
                    <img src="{{ url('assets/images/logo_dark.png') }}" alt="Logo" />
                </span>
                <h5 class="font-medium m-b-20 m-t-15">Reset Password</h5>

                @if(session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif

            </div>
            <div class="row m-t-20">
                <form action="{{ route('password.update') }}" class="col-12" method="POST">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group m-0">
                        <div class="input-group">
                            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                            </div>

                            <input style="font-size: .875rem"  type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required placeholder="Enter New Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                            </div>
                            <input style="font-size: .875rem"  type="password" name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" required placeholder="Enter Confirm Password">
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-block btn-lg btn-success" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
