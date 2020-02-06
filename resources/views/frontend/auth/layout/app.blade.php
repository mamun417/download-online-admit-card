
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://www.dpdc.org.bd/ico/favicon.png">
    <link rel="icon" sizes="57x57" href="{{ asset('frontend_assets/image/android-icon-36x36.png') }}">

    @yield('custom-meta')

    <title>DPDC Career</title>
    <link rel='stylesheet' href='{{ asset('frontend_assets/css/bootstrap.css') }}' />
    <link rel='stylesheet' href='{{ asset('frontend_assets/css/superfish.css') }}' />
    <link rel='stylesheet' href='{{ asset('frontend_assets/css/responsive.css') }}' />
    <link rel='stylesheet' href='{{ asset('frontend_assets/css/main.en.css') }}' />
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' />
    <!-- Development Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Cantata+One%7COpen+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- Development Google Fonts -->

    {{--toastr alert--}}
    <link rel="stylesheet" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">

<!--[if lt IE 9]>
    <script src="{{ asset('frontend_assets/js/plugins/html5shiv.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/respond.js') }}"></script>
    <![endif]-->
</head>

<body>

<div class="container login_section" style="background-image: url('{{ asset('frontend_assets/image/bg-2.png') }}')">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <div class="col-sm-12">
                    <img src="{{ asset('frontend_assets/image/logo.png') }}" style="max-height: 105px;max-width: 105px;">
                </div>

                <div class="col-sm-offset-3 col-sm-6">
                    <div class="panel-body login-form">

                        @yield('content')

                    </div>

                    <div class="" style="margin-top: 15px;margin-bottom: 58%;">
                        <img width="100%" src="{{ asset('frontend_assets/image/bg-1.png') }}">
                    </div>

                </div>
            </div>
        </div>

        <div class="row text-right" style="margin-top: 15px">
            <div class="col-sm-12">
                <img src="{{ asset('frontend_assets/image/bg-3.png') }}">
            </div>
        </div>

        <div class="login_footer">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="col-sm-4">
                        <div class="footer_mobile">
                            <b style="font-weight: 800;"><img src="{{ asset('frontend_assets/image/user.png') }}"> 019 59 063 427</b>
                        </div>
                    </div>
                    <div class="col-sm-4" style="margin-top: 3px">info@<b>bstsl</b>.net</div>
                    <div class="col-sm-4" style="margin-top: 3px">www.<b>bstsl</b>.net</div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src='{{ asset('frontend_assets/js/jquery-2.1.1.min.js') }}'></script>
<script src='{{ asset('frontend_assets/js/bootstrap.min.js') }}'></script>
<script src='{{ asset('frontend_assets/js/modernizr.custom.js') }}'></script>
<script src='{{ asset('frontend_assets/js/career.main.js') }}'></script>

{{--toastr alert--}}
<script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>

<script>
    $(function() {
        //Toastr message
        @if(session('tSuccessMsg'))
        toastr.success('{{ session('tSuccessMsg') }}');
        @endif
    });
</script>

</body>
</html>
