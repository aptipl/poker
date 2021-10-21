<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Poker') }} | Admin Panel</title>
    <!-- Favicon -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/typography.css') }}">
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
</head>
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Sidebar  -->
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="/admin/dashboard" class="header-logo">
                {{ config('app.name', 'Poker') }} Admin
            </a>
            <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li @yield('user')>
                        <a href="{{ route('users.index') }}" class="iq-waves-effect"><i class="las la-user-friends"></i><span>Users</span></a>
                    </li>
                    <li @yield('game')>
                        <a href="#game" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-gamepad"></i><span>Game</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="game" class="iq-submenu collapse @yield('game-show')" data-parent="#iq-sidebar-toggle">
                            <li @yield('game-add')><a href="{{ route('games.create') }}"><i class="las la-plus"></i>Add Game</a></li>
                            <li @yield('game-list')><a href="{{ route('games.index') }}"><i class="las la-eye"></i>Game List</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="iq-menu-bt d-flex align-items-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                    <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="/admin/" class="header-logo">
                            {{ config('app.name', 'Poker') }} Admin
                        </a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list">
                        <li class="line-height pt-3">
                            <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                <img src="{{ asset('admin/images/user/06.png') }}" class="img-fluid rounded-circle mr-3" alt="user">

                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Hello Admin</h5>
                                        </div>
                                        <div class="d-inline-block w-100 text-center p-3">
                                            <form action="{{ route('logout') }}" method="post" >
                                                @csrf
                                                <button type="submit" class="bg-primary iq-sign-btn" href="{{ route('logout') }}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- TOP Nav Bar END -->

    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @if ($errors->any())
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">
                                @foreach ($errors->all() as $error)
                                    {!! $error !!}<br>
                                @endforeach
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert text-white bg-success" role="alert">
                            <div class="iq-alert-text">{!! Session::get('success') !!}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">
                                {!! Session::get('danger') !!}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    @endif
                    <div class="iq-card">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Wrapper END -->
<!-- Footer -->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="/privacy-policy">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="/terms-of-service">Terms of Use</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                Copyright {{ date('Y') }} <a href="#">{{ config('app.name', 'Poker') }} </a> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- Sign in END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<!-- Appear JavaScript -->
<script src="{{ asset('admin/js/jquery.appear.js') }}"></script>
<!-- Counterup JavaScript -->
<script src="{{ asset('admin/js/waypoints.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.counterup.min.js') }}"></script>
<!-- Wow JavaScript -->
<script src="{{ asset('admin/js/wow.min.js') }}"></script>
<!-- Slick JavaScript -->
<script src="{{ asset('admin/js/slick.min.js') }}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{ asset('admin/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{ asset('admin/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{ asset('admin/js/smooth-scrollbar.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
<!-- Custom JavaScript -->
<script src="{{ asset('admin/js/custom.js') }}"></script>
</body>


</html>
