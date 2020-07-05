<!doctype html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="robots" content="noodp">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- PAGE TITLE -->
    <title>Izzat Ala Eddine</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ $setting->icon }}">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=latin-ext"
        rel="stylesheet">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @include('include.theme')
</head>


<body>
    <!-- PRELOADER -->
    <div class="preloader">

        <div class="spinner"></div>

    </div>
    <!-- /PRELOADER -->


    <!-- IMAGE CONTAINER -->
    <div class="image-container">

        <div class="background-img"></div>

    </div>
    <!-- /IMAGE CONTAINER -->

    <!-- CONTENT AREA -->
    <div class="content-area">


        <!-- CONTENT AREA INNER -->
        <div class="content-area-inner">

            @yield('content')
            @include('include.footer')

        </div>
        <!-- /CONTENT AREA INNER -->

    </div>
    <!-- /CONTENT AREA -->
    
    <!-- JAVASCRIPTS -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
