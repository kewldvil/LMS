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
        <style>
            .table>tbody>tr>td{
                vertical-align: middle;
            }
            [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
              display: none !important;
            } 
            thead th{
                text-align: center;
                font-size: 16px !important;
            }  
            .sort-icon {
                font-size: 12px;
                margin-left: 5px;
            }

            th {
                cursor:pointer;
            }   

            li.nav-item .badge{
                top:10px !important;
            }      
        </style>
    </head>
    <!-- END HEAD -->        


    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-mobile-offcanvas page-md">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html">
                            <img src="../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" >
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
            <div class="page-container" style="margin-top: 30px;">
                @include('layouts.sidebar')
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            {{-- <ul class="page-breadcrumb">
                                <li>
                                    <a href="/home">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Form Stuff</span>
                                </li>
                            </ul> --}}
                            @yield('breadcrumbs')
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> @yield('page_header')
                            <small>@yield('page_description')</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        @yield('dashboard_card')
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        @include('layouts.footer') 
    </body>

</html>