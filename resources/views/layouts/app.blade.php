
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ url('css/libs/bootstrap.min.css')  }}">
        <link rel="stylesheet" type="text/css" href="{{ url('fonts/line-awesome/css/line-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('fonts/montserrat/css/styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/libs/tether/tether.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/common.min.css') }}">        
        <link rel="stylesheet" type="text/css" href="{{ url('css/primary.min.css') }}">        
        <link rel="stylesheet" type="text/css" href="{{ url('css/custom.css') }}">        
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
                    <a href="{{ url('/') }}" class="ks-logo">{{ config('app.name') }}</a>
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
                        <a class="nav-item nav-link" href="{{ route('people.index') }}">
                            {{ __('Dashboard') }}
                        </a>
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
                        <div class="nav-item dropdown ks-user">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="ks-avatar">
                                    <img src="{{ url('images/profile-image.jpg') }}" width="36" height="36">
                                </span>
                                <span class="ks-info">
                                    @auth
                                        <span class="ks-name">
                                            {{ auth::user()->name }}
                                        </span>
                                    @else
                                        <span class="ks-name">
                                            {{ __('Guest') }}
                                        </span>
                                    @endauth
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
                                @auth
                                    <a class="dropdown-item" href="{{ route('api.index') }}">
                                        <span class="la la-user ks-icon"></span>
                                        <span>{{ __('API') }}</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="la la-user ks-icon"></span>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        <span class="la la-user ks-icon"></span>
                                        <span>{{ __('Sign in') }}</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        <span class="la la-user ks-icon"></span>
                                        <span>{{ __('Sign up') }}</span>
                                    </a>
                                @endauth

                            </div>
                        </div>
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

    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('js/libs/jquery.min.js') }}"></script>
    <script src="{{ url('js/libs/bootstrap.min.js') }}"></script>
    @stack('scripts')