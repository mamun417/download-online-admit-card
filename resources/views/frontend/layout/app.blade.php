
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://www.dpdc.org.bd/ico/favicon.png">

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

<div class="container">
    <!-- Mobile Menu -->
    <div class="pm-mobile-menu-overlay" id="pm-mobile-menu-overlay"></div>
    <div class="pm-mobile-global-menu">

        <div class="pm-mobile-global-menu-logo">
            <a href=""><img src="{{ asset('frontend_assets/image/logo.png') }}" alt="DPDC"></a>
        </div>

        <ul class="sf-menu pm-nav">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            @auth
                <li><a href="{{ route('password.change') }}"><i class="fa fa-lock"></i> Change Password</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Log Out</a></li>
            @else
                <li><a href=""><i class="fa fa-lock"></i> Sign In</a></li>
            @endauth
        </ul>

    </div>

    <header style="position: static;margin-top: 30px">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
                    <div class="pm-header-logo-container">
                        <a href="/"><img src="https://www.dpdc.org.bd/img/logo.png" style="position: absolute;" class="img-responsive pm-header-logo" alt="DPDC"></a>
                    </div>

                    <div class="pm-header-mobile-btn-container">
                        <button type="button" class="navbar-toggle pm-main-menu-btn" id="pm-mobile-menu-trigger" ><i class="fa fa-bars"></i></button>
                    </div>
                    <div class="bnr-title" style="margin-left: 45px">Dhaka Power Distribution<br> Company Limited (DPDC)</div>
                </div>

                <div class="col-sm-6 pm-main-menu" style="padding-top: 0!important;">
                    <nav class="navbar-collapse collapse">
                        <ul class="sf-menu pm-nav">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            @auth
                                <li><a href="{{ route('password.change') }}"><i class="fa fa-lock"></i> Change Password</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Log Out</a></li>
                            @else
                                <li><a href="{{ route('user.password-recover') }}"><i class="fa fa-key"></i> Recover Password</a></li>
                                <li><a href="/login"><i class="fa fa-lock"></i> Sign In</a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                    @csrf
                </form>

            </div>
        </div>
    </header>

    @yield('content')

    <div class="pm-footer-copyright">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 pm-footer-copyright-col">
                    <p class="text-center">© 2019 Dhaka Power Distribution Company. All Rights Reserved.</p>
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
