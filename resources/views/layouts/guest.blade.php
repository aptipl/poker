<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Poker') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/typography.css') }}">
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
<!-- Sign in Start -->
<section class="sign-in-page">
    <div class="container">
        <div class="col-md-12 pt-3">
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
        </div>
        {{ $slot }}
    </div>
</section>
<!-- Sign in END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<!-- Appear JavaScript -->
<script src="{{ asset('admin/js/jquery.appear.js') }}"></script>
<!-- Countdown JavaScript -->
<script src="{{ asset('admin/js/countdown.min.js') }}"></script>
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
<!-- Custom JavaScript -->
<script src="{{ asset('admin/js/custom.js') }}"></script>
</body>


</html>
