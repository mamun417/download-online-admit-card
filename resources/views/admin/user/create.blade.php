@extends('admin.layouts.app')

@section('custom-meta')
    <title>Add User - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add User</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                        <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="form pt-3">
                            @csrf

                            @include('admin.user.element')

                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-dark">Cancel</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection



