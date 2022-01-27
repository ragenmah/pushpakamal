<!DOCTYPE html>
<html lang="En">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PushpaKamal</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo/logonew.ico') }} " type="image/x-icon">

    @stack('before-styles')
    <!-- Font awesome -->
    {{-- <link href="{{ asset('css/new/font-awesome.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('css/new/bootstrap.css') }}" rel="stylesheet">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new/nouislider.css') }}">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{ asset('css/new/jquery.fancybox.css') }}" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/new/theme-color/green-theme.css') }}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{ asset('css/new/style.css') }}" rel="stylesheet">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    @stack('after-styles')



</head>

<body class="aa-price-range">

    <!-- Pre Loader -->
    {{-- <div id="aa-preloader-area">
        <div class="pulse"></div>
    </div> --}}
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-double-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    @include('frontend.includes.new.header')


    @yield('content')

    @include('frontend.includes.new.footer')
</body>

<!-- Scripts -->
@stack('before-scripts')
<!-- jQuery library -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script src="{{ asset('js/frontend/new/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/frontend/new/bootstrap.js') }}"></script>
<!-- slick slider -->
<script type="text/javascript" src="{{ asset('js/frontend/new/slick.js') }}"></script>
<!-- Price picker slider -->
<script type="text/javascript" src="{{ asset('js/frontend/new/nouislider.js') }}"></script>
<!-- mixit slider -->
<script type="text/javascript" src="{{ asset('js/frontend/new/jquery.mixitup.js') }}"></script>
<!-- Add fancyBox -->
<script type="text/javascript" src="{{ asset('js/frontend/new/jquery.fancybox.pack.js') }}"></script>
<!-- Custom js -->
<script src="{{ asset('js/frontend/new/custom.js') }}"></script>
<!-- sort js -->
<script src="{{ asset('js/frontend/new/sorting.js') }}"></script>


@stack('after-scripts')

{{-- <script src="{{ mix('js/frontend.js') }}"></script> --}}

</html>
