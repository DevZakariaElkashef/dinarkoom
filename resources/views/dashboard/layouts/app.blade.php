<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Blank Page - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="{{ asset("dashboard/". app()->getLocale() ."/assets/img/favicon.ico") }}"/>
    <link href="{{ asset("dashboard/". app()->getLocale() ."/assets/css/loader.css") }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset("dashboard/". app()->getLocale() ."/assets/js/loader.js") }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset("dashboard/". app()->getLocale() ."/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("dashboard/". app()->getLocale() ."/assets/css/plugins.css") }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset("dashboard/". app()->getLocale() ."/plugins/notification/snackbar/snackbar.min.css") }}" rel="stylesheet" type="text/css" />
    

    <style>
        .layout-px-spacing {
            min-height: calc(100vh - 166px)!important;
        }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    @yield('style')

</head>
<body>
    <!-- BEGIN LOADER -->
    @include('dashboard.inc.__loader')
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('dashboard.inc.__navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    @include('dashboard.inc.__sub_navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('dashboard.inc.__sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                @yield('content')

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset("dashboard/". app()->getLocale() ."/assets/js/libs/jquery-3.1.1.min.js") }}"></script>
    <script src="{{ asset("dashboard/". app()->getLocale() ."/bootstrap/js/popper.min.js") }}"></script>
    <script src="{{ asset("dashboard/". app()->getLocale() ."/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("dashboard/". app()->getLocale() ."/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("dashboard/". app()->getLocale() ."/assets/js/app.js") }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset("dashboard/". app()->getLocale() ."/assets/js/custom.js") }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset("dashboard/". app()->getLocale() ."/plugins/notification/snackbar/snackbar.min.js") }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script src="{{ asset("dashboard/". app()->getLocale() ."/assets/js/components/notification/custom-snackbar.js") }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    @yield('script')
</body>
</html>