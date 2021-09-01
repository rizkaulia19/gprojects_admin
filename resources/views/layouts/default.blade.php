<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        
        <!-- style -->
        @stack('before-style')
        @include('includes.style')
        @stack('after-style')
    </head>
    <body class="sb-nav-fixed">
        <!-- NAVBAR -->
        @include('includes.navbar')

        <div id="layoutSidenav">
            <!-- SIDEBAR -->
            @include('includes.sidebar')

            <div id="layoutSidenav_content" class="d-flex flex-column">

                <!-- CONTENT -->
                @yield('content')
                
                <!-- Footer -->
                @include('includes.footer')
            </div>
        </div>
        
        <!-- script -->
        @stack('before-script')
        @include('includes.script')
        @stack('after-script')

    </body>
</html>
