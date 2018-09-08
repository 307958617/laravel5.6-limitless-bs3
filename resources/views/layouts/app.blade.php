<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>




</head>
<body class="layout-boxed">
    <div id="app">
        <!-- Main navbar -->
        <div class="navbar navbar-inverse">
            <div class="navbar-boxed">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('limitless/images/logo_light.png') }}" alt=""></a>

                    <ul class="nav navbar-nav pull-right visible-xs-block">
                        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    </ul>
                </div>

                <div class="navbar-collapse collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Text link</a></li>

                        <li>
                            <a href="#">
                                <i class="icon-calendar3"></i>
                                <span class="visible-xs-inline-block position-right">Icon link</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Text link</a></li>

                        <li>
                            <a href="#">
                                <i class="icon-cog3"></i>
                                <span class="visible-xs-inline-block position-right">Icon link</span>
                            </a>
                        </li>

                        <li class="dropdown dropdown-user">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('limitless/images/image.png') }}" alt="">
                                <span>Victoria</span>
                                <i class="caret"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                                <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                                <li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                                <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /main navbar -->

        <!-- Page header -->
        <div class="page-header" style="">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>

                <div class="heading-elements">
                    <ul class="breadcrumb heading-text">
                        <li><a href="{{ route('home') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">

                    @yield('content')

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

        <!-- Footer -->
        <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="navbar-boxed">
                <ul class="nav navbar-nav no-border visible-xs-block">
                    <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
                </ul>

                <div class="navbar-collapse collapse" id="navbar-second">
                    <div class="navbar-text">
                        &copy; 2018. <a href="#">报修管理系统</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">余 亭</a>
                    </div>

                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Help center</a></li>
                            <li><a href="#">Policy</a></li>
                            <li><a href="#" class="text-semibold">Upgrade your account</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Settings</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-dribbble3"></i> Dribbble</a></li>
                                    <li><a href="#"><i class="icon-pinterest2"></i> Pinterest</a></li>
                                    <li><a href="#"><i class="icon-github"></i> Github</a></li>
                                    <li><a href="#"><i class="icon-stackoverflow"></i> Stack Overflow</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /footer -->
    </div>
</body>
</html>
