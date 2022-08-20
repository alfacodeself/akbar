<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    @include('layouts.styles')

    <title>@yield('title')</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        {{-- @include('layouts.sidebar') --}}
        <x-sidebar></x-sidebar>
        <!--end sidebar -->

        <!--start top header-->
        @include('layouts.header')
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <!--start footer-->
        <footer class="footer">
            <div class="footer-text">
                Copyright © 2021. All right reserved.
            </div>
        </footer>
        <!--end footer-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->
    @include('layouts.scripts')
    @include('partials.alert')
</body>

</html>
