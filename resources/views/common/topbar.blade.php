<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>

            <div class="navbar-brand">
                <a href="{{--{{ route('backend.dashboard') }}--}}" class="logo">
                    <!-- Logo text -->
                    <span class="logo-icon">
                        <img src="{{ url('assets/images/logo.png') }}" height="22px" width="100%" class="light-logo" alt="homepage" />
                    </span>
                </a>
                <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                </a>
            </div>

            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">

            <ul class="navbar-nav float-left mr-auto">
                {{--Search area removed--}}
            </ul>

            <ul class="navbar-nav float-right">

                @php
                    // Gravatar API for Admin Photo

                    $hash = md5(strtolower(trim(Auth::user()->email)));
                    $client_photo = "https://www.gravatar.com/avatar/$hash";
                @endphp

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ isset($client_photo) && !is_null($client_photo) ? $client_photo : asset('assets/images/users/2.jpg') }}" alt="user" class="rounded-circle" width="40">
                        <span class="m-l-5 font-medium d-none d-sm-inline-block text-secondary">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            <div class="">
                                <img src="{{ isset($client_photo) && !is_null($client_photo) ? $client_photo : asset('assets/images/avatar.png') }}" alt="user" class="rounded-circle" width="60">
                            </div>
                            <div class="m-l-10">
                                <h4 class="m-b-0">{{ Auth::user()->name }}</h4>
                                <p class=" m-b-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="profile-dis scrollable">
                            @if(Auth::user()->role_id == 1)
                                <a class="dropdown-item" href="{{ route('admin.password.change') }}">
                                    <i class="ti-key m-r-5 m-l-5"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                            @endif
                            <button onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</button>
                            <div class="dropdown-divider"></div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf

                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
