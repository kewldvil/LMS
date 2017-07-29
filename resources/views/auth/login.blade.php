<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Loan Management System</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Siemreap" rel="stylesheet">    
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('assets/global/css/components-md.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('assets/global/css/plugins-md.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/pages/css/lock.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->
<body class="">
    <div class="page-lock">
        <div class="page-logo">
            <!-- <a class="brand" href="index.html"> -->
                <!-- <img src="../assets/pages/img/logo-big.png" alt="logo" /> </a> -->
        </div>
        <div class="page-body">
            <div class="lock-head">ប្រព័ន្ធគ្រប់គ្រងប្រាក់កម្ចី</div>
            <div class="lock-body">
                <div class="lock-cont">
                    <div class="lock-item">
                        <div class="pull-left lock-avatar-block">
                            <!-- <img src="../assets/pages/media/profile/photo3.jpg" class="lock-avatar"> </div> -->
                            <img src="{{ asset('assets/apps/img/profile_1.png')}}" class="lock-avatar"></div>
                    </div>
                    <div class="lock-item lock-item-full">
                        <form class="lock-form pull-left" action="/login" method="post">
                            {{csrf_field()}}
                            @if ($errors->has('username') or $errors->has('password'))
                                <div class="form-group">
                                    <div class="alert alert-danger " style="padding: 10px;font-size: 13px" >
                                        <button class="close" data-close="alert"></button>
                                        <span>គណនី រឺលេខសម្ងាត់មិនត្រឹមត្រូវ</span>
                                    </div>
                                </div>
                            @endif  
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix" type="text" autocomplete="on" placeholder="គណនី" name="username" required />
                            </div>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="លេខសម្ងាត់" name="password" required />
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn red"​​ style="font-size: 16px;font-weight: 500">ចូលប្រើ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="lock-bottom">
                <a href="">&nbsp;</a>
            </div>
        </div>
        <div class="page-footer-custom"> 2017 &copy; S-SOLUTIONS. </div>
    </div>
    <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/pages/scripts/lock.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>