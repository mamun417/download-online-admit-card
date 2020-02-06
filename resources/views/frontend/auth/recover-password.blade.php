@extends('frontend.auth.layout.app')

@section('custom-meta')
    <title>Recover Password - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')
    <form action="{{ route('user.password-recover') }}" method="post" id="cb-jobseeker-signin">
        @csrf

        <div class="form-group">
            <h3 style="margin: 0">Recover Password</h3>
            <label></label>
            <input type="text" name="mobile" class="form-control input-sm" value="{{ session('mobile') }}"  placeholder="User Mobile No"/>
            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if(session('invalid_mobile'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ session('invalid_mobile') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 8px;border:none">Submit</button>
        <a href="{{ route('login') }}" type="submit" class="btn btn-default" style="margin-top: 8px;border:none">login</a>
    </form>
@endsection
