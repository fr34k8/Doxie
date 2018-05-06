
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }}</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ url('css/libs/bootstrap.min.css')  }}">
        <link rel="stylesheet" type="text/css" href="{{ url('fonts/line-awesome/css/line-awesome.min.css') }}">
        <!--<link rel="stylesheet" type="text/css" href="assets/fonts/open-sans/styles.css">-->
        <link rel="stylesheet" type="text/css" href="{{ url('fonts/montserrat/css/styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/libs/tether/tether.min.css') }}">
        <link rel="stylesheet" type="text/css" href="libs/jscrollpane/jquery.jscrollpane.css">
        <link rel="stylesheet" type="text/css" href="libs/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="{{ url('css/common.min.css') }}">        
        <link rel="stylesheet" type="text/css" href="{{ url('css/primary.min.css') }}">        
        <link class="ks-sidebar-dark-style" rel="stylesheet" type="text/css" href="assets/styles/themes/sidebar-black.min.css">
        @stack('styles')
    </head>

    <body class="ks-navbar-fixed ks-sidebar-empty ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary">

        <!-- BEGIN HEADER -->
        <nav class="navbar ks-navbar">

            <div href="index.html" class="navbar-brand">
                <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->
                <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
                <a href="#" class="ks-sidebar-mobile-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
                <!-- END RESPONSIVE SIDEBAR TOGGLER -->

                <div class="ks-navbar-logo">
                    <a href="index.html" class="ks-logo">{{ config('app.name') }}</a>

                    <!-- BEGIN GRID NAVIGATION -->
                    <!--<span class="nav-item dropdown ks-dropdown-grid">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <div class="dropdown-menu ks-info ks-scrollable" aria-labelledby="Preview" data-height="260">
                            <div class="ks-scroll-wrapper">
                                <a href="{{ url('/') }}" class="ks-grid-item">
                                    <span class="ks-icon la la-dashboard"></span>
                                    <span class="ks-text">Dashboard</span>
                                </a>
                            </div>
                        </div>
                    </span>-->

                    <span class="nav-item dropdown ks-dropdown-grid-images">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <div class="dropdown-menu ks-info ks-scrollable" aria-labelledby="Preview" data-height="260">
                            <div class="ks-scroll-wrapper">
                                <a href="#" class="ks-grid-item">
                                    <img class="ks-icon" src="assets/img/menu-grid/dashboard.png">
                                    <span class="ks-text">Dashboard</span>
                                </a>
                                <a href="#" class="ks-grid-item">
                                    <img class="ks-icon" src="assets/img/menu-grid/flask.png">
                                    <span class="ks-text">Projects</span>
                                </a>
                                <a href="#" class="ks-grid-item">
                                    <img class="ks-icon" src="assets/img/menu-grid/calendar.png">
                                    <span class="ks-text">Calendar</span>
                                </a>
                                <a href="#" class="ks-grid-item">
                                    <img class="ks-icon" src="assets/img/menu-grid/profile.png">
                                    <span class="ks-text">Profile</span>
                                </a>
                                <a href="#" class="ks-grid-item">
                                    <img class="ks-icon" src="assets/img/menu-grid/ticket.png">
                                    <span class="ks-text">Tickets</span>
                                </a>
                                <a href="#" class="ks-grid-item">
                                    <img class="ks-icon" src="assets/img/menu-grid/settings.png">
                                    <span class="ks-text">Settings</span>
                                </a>
                            </div>
                        </div>
                    </span>

                    <!-- END GRID NAVIGATION -->
                </div>
            </div>

            <div class="ks-wrapper">
                <nav class="nav navbar-nav">
                    <!-- BEGIN NAVBAR MENU -->
                    <div class="ks-navbar-menu">
                        <form class="ks-search-form">
                            <a class="ks-search-open" href="#">
                                <span class="la la-search"></span>
                            </a>
                            {{-- <div class="ks-wrapper">
                                <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                    <input id="input-group-icon-text" type="text" class="form-control" placeholder="Search...">
                                    <span class="icon-addon">
                                        <span class="la la-search ks-icon"></span>
                                    </span>
                                </div>
                                <a class="ks-search-close" href="#">
                                    <span class="la la-close"></span>
                                </a>
                            </div> --}}
                        </form>
                        <a class="nav-item nav-link" href="#">Dashboard</a>
                    </div>
                    <!-- END NAVBAR MENU -->

                    <!-- BEGIN NAVBAR ACTIONS -->
                    <div class="ks-navbar-actions">
                        <!-- BEGIN NAVBAR ACTION BUTTON -->
                        <div class="nav-item nav-link btn-action-block">
                            <a class="btn btn-danger" href="https://github.com/filtration/doxie">
                                <span class="ks-action">
                                    {{ __('Fork on Github') }}
                                </span>
                                <span class="ks-description">
                                    {{ __('Help Contribute to :name', [
                                        'name' => config('app.name')
                                    ]) }}
                                </span>
                            </a>
                        </div>
                        <!-- END NAVBAR ACTION BUTTON -->
                    </div>
                    <!-- END NAVBAR ACTIONS -->
                </nav>

                <!-- BEGIN NAVBAR ACTIONS TOGGLER -->
                <nav class="nav navbar-nav ks-navbar-actions-toggle">
                    <a class="nav-item nav-link" href="#">
                        <span class="la la-ellipsis-h ks-icon ks-open"></span>
                        <span class="la la-close ks-icon ks-close"></span>
                    </a>
                </nav>
                <!-- END NAVBAR ACTIONS TOGGLER -->

                <!-- BEGIN NAVBAR MENU TOGGLER -->
                <nav class="nav navbar-nav ks-navbar-menu-toggle">
                    <a class="nav-item nav-link" href="#">
                        <span class="la la-th ks-icon ks-open"></span>
                        <span class="la la-close ks-icon ks-close"></span>
                    </a>
                </nav>
                <!-- END NAVBAR MENU TOGGLER -->
            </div>
        </nav>

        <div class="ks-navbar-horizontal ks-info">
            <ul class="nav nav-pills">
                
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Dashboard</a>
                </li>

            </ul>
        </div>

        <div class="ks-page-container">
            @yield('content')
        </div>

    </body>