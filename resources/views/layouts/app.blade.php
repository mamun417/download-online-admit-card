<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('common.head')

<body>
<div id="main-wrapper">

    @include('common.topbar')

    @include('common.sidebar')

    <div class="page-wrapper">

        @yield('content')

        <footer class="footer text-center">
            Copyright © {{ date('Y') }} <a href="https://exonhost.com" target="_blank" title="ExonHost">ExonHost</a>. All Rights Reserved.
        </footer>
    </div>

</div>
</body>

@include('common.footer')

@yield('custom-js')
</html>
