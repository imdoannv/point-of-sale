<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<!-- Mirrored from rubick-html.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 03:36:19 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <link href="{{asset('dist/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title> @yield('title')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('admin/dist/css/app.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/dist/css/toastr.css') }}">
    <!-- END: CSS Assets-->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">



</head>
<!-- END: Head -->
<body class="py-5">
<div class="flex mt-[4.7rem] md:mt-0">
    <!-- BEGIN: Side Menu -->
            @include('layouts.partials.side-menu')
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
    {!! Toastr::message() !!}
        <!-- BEGIN: Top Bar -->
            @include('layouts.partials.top-bar')
        <!-- END: Top Bar -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-12">

                    @yield('content')
            </div>
           </div>
    </div>
    <!-- END: Content -->
</div>


<!-- BEGIN: JS Assets-->
<!-- <script src="../developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> -->

<script src="{{asset('admin/dist/js/app.js')}}"></script>
<!-- END: JS Assets-->
</body>

<!-- Mirrored from rubick-html.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 03:36:41 GMT -->
</html>
