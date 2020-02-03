@extends('frontend.layout.app')

@section('custom-meta')
    <title>Recover Password - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')
    <div class="row main-content">

        <div class="col-sm-offset-3 col-sm-6 pm-vertical-menu">

            <h3 class="text-center" style="margin-top: 15px">Recover Your Password</h3>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="fa fa-key"></i> Password Recover</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('user.password-recover') }}" method="post" id="cb-jobseeker-signin">
                        @csrf

                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control input-sm" value="{{ session('mobile') }}"  placeholder="Enter mobile"/>
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

                        <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 8px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
