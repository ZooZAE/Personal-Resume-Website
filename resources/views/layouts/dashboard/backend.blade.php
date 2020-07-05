<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="description" content="">
    <title>{{ config('app.name', 'Resume') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--jquery--}}
    <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
    <style>
        label {
            font-weight: bold;
        }
    </style>
    
    @yield('styles')
</head>

<body class="app sidebar-mini">

{{-- Header --}}

@include('layouts.dashboard._header')

{{-- Sidebar --}}

@include('layouts.dashboard._aside')

<main class="app-content">

    {{-- Sessions --}}

    @include('manage.partials._sessions')

<div id="app">

    @yield('content')

</div>
    
</main>
<!-- Essential javascripts for application to work-->
<script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
{{--select 2--}}
<script src="{{ asset('dashboard_files/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/main.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.select2').select2({
        'width': 
        '100%'
    });
</script>

@yield('scripts')
</body>
</html>