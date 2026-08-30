<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{$app['school']->name}} - {{$app['school']->slogan}}</title>
<!-- Stylesheets -->
<link href="/themes/{{ config('theme.active') }}/css/bootstrap.css" rel="stylesheet">
<link href="/themes/{{ config('theme.active') }}/css/revolution-slider.css" rel="stylesheet">
<link href="/themes/{{ config('theme.active') }}/css/style.css" rel="stylesheet">
<link href="/themes/{{ config('theme.active') }}/css/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="/themes/assets/css/custom.css">

<!--Favicon-->
<link rel="shortcut icon" href="/themes/{{ config('theme.active') }}/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/themes/{{ config('theme.active') }}/images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="{{$app['school']->name}}">
<link href="/themes/{{ config('theme.active') }}/css/responsive.css" rel="stylesheet">
</head>

<body>
@include('themes.common.partials.head')
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    @include('themes.' . config('theme.active') . '.partials.head')

    @yield('content')

    @include('themes.' . config('theme.active') . '.partials.footer')

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>

<script src="/themes/{{ config('theme.active') }}/js/jquery.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/bootstrap.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/revolution.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/jquery.fancybox.pack.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/jquery.fancybox-media.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/owl.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/appear.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/jquery-ui.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/wow.js"></script>
<script src="/themes/{{ config('theme.active') }}/js/script.js"></script>
</body>
</html>
