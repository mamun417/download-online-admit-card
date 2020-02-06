<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" sizes="57x57" href="{{ asset('frontend_assets/image/android-icon-36x36.png') }}">

    {{--Switch button--}}
    <link href="{{ asset('assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet">

    @yield('custom-meta')

    <!-- Custom CSS -->
    <link href="{{ url('dist/css/style.min.css') }}" rel="stylesheet">

    {{--Custom Style--}}
    <link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="main-wrapper">

    @yield('content')

</div>


<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="{{ url('assets/libs/jquery/dist/jquery.min.js')  }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ url('assets/libs/popper.js/dist/umd/popper.min.js')  }}"></script>
<script src="{{ url('assets/libs/bootstrap/dist/js/bootstrap.min.js')  }}"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->

<script src="{{ url('assets/extra-libs/jqbootstrapvalidation/validation.js')  }}"></script>

{{--Switch Button--}}
<script src="{{ asset('assets/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>

<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>
</body>

@yield('custom-js')

</html>
