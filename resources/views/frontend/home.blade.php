@extends('frontend.layout.app')

@section('custom-meta')
    <title>Home - {{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="row text-center main-content">
        <h3 class="text-center" style="margin-top: 15px">Download Your Admit Card</h3>
        <a href="{{ route('user.download-admit-card') }}" class="btn btn-sm btn-danger" style="margin-top: 5px">Download</a>
    </div>
@endsection
