@extends('frontend.layout.app')

@section('custom-meta')
    <title>Change Password - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')
    <div class="row main-content">

        <div class="col-sm-offset-3 col-sm-6 pm-vertical-menu">

            <h3 class="text-center" style="margin-top: 15px">Change Your Password</h3>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="fa fa-lock"></i> Change Password</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('password.change') }}" method="post" id="cb-jobseeker-signin">
                        @csrf

                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="currentPassword" class="form-control input-sm"  placeholder="Enter current password"/>
                            @error('currentPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(session('invalid_current_pass'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ session('invalid_current_pass') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" minlength="8" class="form-control input-sm" placeholder="Enter new password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control input-sm" placeholder="Enter confirm password" />
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 8px;">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
