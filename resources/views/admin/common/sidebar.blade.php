@php
    $cur_route_name = Route::currentRouteName();
    $cur_controller_name = class_basename(Route::current()->controller);
@endphp

<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{route('admin.')}}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                @if(Auth::user()->role_id == 1)
                    <li class="sidebar-item {{ $cur_controller_name == 'UserController'?'selected':'' }}">
                        <a href="{{ route('admin.users.index') }}" class="sidebar-link waves-effect waves-dark sidebar-link {{ $cur_controller_name == 'UserController'?'active':'' }}" aria-expanded="false">
                            <i class="mdi mdi-account-multiple"></i>
                            <span class="hide-menu">Users</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>

