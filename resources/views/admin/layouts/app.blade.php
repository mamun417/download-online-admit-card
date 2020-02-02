<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('admin.common.head')

<body>
<div id="main-wrapper">

    @include('admin.common.topbar')

    @include('admin.common.sidebar')

    <div class="page-wrapper">

        @yield('content')

        <footer class="footer text-center">
            Copyright © {{ date('Y') }} <a href="https://exonhost.com" target="_blank" title="ExonHost">ExonHost</a>. All Rights Reserved.
        </footer>
    </div>

</div>
</body>

@include('admin.common.footer')

@yield('custom-js')
</html>
