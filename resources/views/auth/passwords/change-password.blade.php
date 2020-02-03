@extends('admin.layouts.app')

@section('custom-meta')
    <title>Change Password - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Change Password</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form pt-3" action="{{ route('admin.password.change') }}" method="post" role="form">
                        @csrf

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon11"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" name="currentPassword" class="form-control" aria-label="Username" aria-describedby="basic-addon11" required>
                                    </div>
                                    @if($errors->has('currentPassword')) <span class="text-danger">{{ $errors->first('currentPassword') }}</span> @endif
                                    @if(session('invalid_current_pass')) <span class="text-danger">{{ session('invalid_current_pass') }}</span> @endif
                                </div>

                                <div class="form-group">
                                    <label>New Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                        </div>
                                        <input minlength="8" type="password" name="password" class="form-control" aria-label="Password" aria-describedby="basic-addon33" required>
                                    </div>
                                    @if($errors->has('password')) <span class="text-danger">{{ $errors->first('password') }}</span> @endif
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon4"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" name="password_confirmation" class="form-control" aria-label="Password" aria-describedby="basic-addon4" required>
                                    </div>
                                    @if($errors->has('password_confirmation')) <span class="text-danger">{{ $errors->first('password_confirmation') }}</span> @endif
                                </div>

                                <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
