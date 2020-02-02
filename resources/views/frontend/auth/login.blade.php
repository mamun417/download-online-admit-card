@extends('frontend.layout.app')

@section('custom-meta')
    <title>Sign In - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')
    <div class="row" style="padding-bottom: 18px;margin-left: 0;margin-right: 0;background: #edf7ed;">

        <div class="col-sm-offset-3 col-sm-6 pm-vertical-menu">

            <h3 class="text-center" style="margin-top: 10px">Download Applicant's Copy</h3>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="fa fa-lock"></i> Sign In</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('login') }}" method="post" id="cb-jobseeker-signin">
                        @csrf

                        <div class="form-group">
                            <label>User Id</label>
                            <input type="text" name="mobile" class="form-control input-sm"  placeholder="Enter mobile"/>
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control input-sm" placeholder="Password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 8px;">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
