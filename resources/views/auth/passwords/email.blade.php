@extends('auth.layouts.app')

@section('custom-meta')
    <title>Lost Password Reset - {{ config('app.name') }}</title>
@endsection

@section('content')

    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ url('assets/images/big/auth-bg.jpg') }}) no-repeat center center;">

        <div class="auth-box">

        <div class="logo">
            <span class="db">
                <img src="{{ url('assets/images/logo_dark.png') }}" alt="Logo" />
            </span>
            <h5 class="font-medium m-b-20 m-t-15">Recover Password</h5>
            <span>Enter your Email and instructions will be sent to you!</span>

            @if(session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
            @endif

        </div>
        <div class="row m-t-20">
            <form action="{{ route('admin.password.email') }}" class="col-12" method="post">
                @csrf

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="ti-email"></i></span>
                        </div>
                        <input style="font-size: .875rem"  type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror" required placeholder="Enter Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="row m-t-20">
                    <div class="col-12">
                        <button class="btn btn-block btn-lg btn-danger" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>

@endsection
