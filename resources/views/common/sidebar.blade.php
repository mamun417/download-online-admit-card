@php
    $cur_route_name = Route::currentRouteName();
    $cur_controller_name = class_basename(Route::current()->controller);
@endphp

<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/admin" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ $cur_controller_name == 'StudentController'?'selected':'' }}">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link waves-effect waves-dark sidebar-link {{ $cur_controller_name == 'StudentController'?'active':'' }}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

