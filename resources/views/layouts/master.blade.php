<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
`    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <title>{{ config('app.name', 'Loan Management System') }}</title> --}}
        <title>{{$page_name}}</title>

        @include('layouts.head')
        @yield('page_css')
        <link rel="shortcut icon" href="favicon.ico" /> 
    </head>
    <!-- END HEAD -->        


    <body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-mobile-offcanvas page-md">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html">
                            <img src="{{ asset('assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    @include('layouts.top_navigation')
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                @include('layouts.sidebar')
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
{{--                             <!-- BEGIN PAGE TITLE-->
                            <h1 class="page-title"> Off-canvas Mobile Menu
                                <small>off-canvas mobile menu</small>
                            </h1>
                            <!-- END PAGE TITLE--> --}}
                        <!-- END PAGE HEADER-->
                        <div class="page-content-body">
                            @yield('content')
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            @include('layouts.footer')
            @yield('script')
    </body>

</html>