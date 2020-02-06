@extends('frontend.auth.layout.app')

@section('custom-meta')
    <title>Login - {{ config('app.name') }}</title>
@endsection

@section('content')
    <form action="{{ route('login') }}" method="post" id="cb-jobseeker-signin">
        @csrf

        <div class="form-group">
            <h3 style="margin: 0">Login</h3>
            <label></label>
            <input type="text" name="mobile" class="form-control input-sm"  placeholder="User Mobile No"/>
            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label></label>
            <input type="password" name="password" class="form-control input-sm" placeholder="Password" />
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 8px;border:none">Login</button>
        <a href="{{ route('user.password-recover') }}" type="submit" class="btn btn-default" style="margin-top: 8px;border:none">Recover Password</a>
    </form>
@endsection
