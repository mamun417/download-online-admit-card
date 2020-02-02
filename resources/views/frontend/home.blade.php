@extends('frontend.layout.app')

@section('custom-meta')
    <title>Home - {{ env('APP_NAME', 'Project Name') }}</title>
@endsection

@section('content')
    <div class="row text-center main-content">
        <h3 class="text-center" style="margin-top: 15px">Download Your Admit Card</h3>
        <a href="" class="btn btn-sm btn-danger" style="margin-top: 5px">Download</a>
    </div>
@endsection
