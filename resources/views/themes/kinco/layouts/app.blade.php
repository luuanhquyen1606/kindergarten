<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>{{ $app['school']->name }}</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/themes/{{ config('theme.active') }}/assets/css/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="/themes/{{ config('theme.active') }}/assets/css/responsive.css">       

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/themes/{{ config('theme.active') }}/assets/images/Favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/themes/{{ config('theme.active') }}/assets/images/Favicon.png">
<link rel="stylesheet" href="/themes/assets/css/custom.css">
</head>

<body class="counter-scroll header-fixed home2">
 @include('themes.common.partials.head')  
   

    <div id="wrapper">
        <div id="page" class="clearfix">
            @include('themes.' . config('theme.active') . '.partials.head')
            
             @yield('content')
             
             

            <footer id="footer">
                <section class="tf-subcribe">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="subcribe-wp">
                                    <h2 class="title">Subscribe Our Newsletter</h2>
                                    <p class="sub f-mulish">Beet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="subcribe-form fx" id="subscribe-form">
                                    <form action="#">
                                        <input type="email" id="subscribe-email" placeholder="Email Address">
                                        <button class="fl-btn st-7" id="subscribe-button"><span class="inner">Subscribe</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="footer-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="widget-footer">
                                    <div class="widget widget-logo">
                                        <div class="logo-bottom" id="logo-footer">
                                            <a href="index.html"><img src="/themes/{{ config('theme.active') }}/assets/images/logo/logofootert.png" alt="kinco"></a>
                                        </div>
                                        <p class="wrap f-mulish">Sit amet consectetur adipiscing elit sed do eiusmod teminci idunt ut labore et dolore magna</p>
                                        <div class="list-contact">
                                            <ul>
                                                <li class="fx"><span><i class="far fa-map-marker-alt"></i> 55 Main Street, New York</span></li>
                                                <li class="fx"><a href="mailto:hotline@gmail.com"><i class="far fa-envelope"></i> hotline@gmail.com</a></li>
                                                <li class="fx"><a href="tel:012345678"><i class="fal fa-phone"></i> +012 (345) 678</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget widget-business">
                                       <div class="inner">
                                            <div class="op-time">
                                                <h4 class="title-widget">opening hours</h4>
                                                <ul>
                                                    <li><span class="f-mulish">Sunday - Friday</span></li>
                                                    <li><span class="f-mulish">08 am - 05 pm</span></li>
                                                </ul>
                                            </div>
                                            <div class="cls-time">
                                                <p>Every Satarday and Govt Holiday</p>
                                                <h4 class="title-widget">closed</h4>
                                            </div>
                                       </div>
                                    </div>
                                    <div class="widget widget-link">
                                        <h4 class="title-widget">Our Program</h4>
                                        <ul class="list-link">
                                            <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Arts & Drawing</a></li>
                                            <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Computer Engineering </a></li>
                                            <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Digital Mathematics</a></li>
                                            <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Physical Exercise</a></li>
                                            <li class="fx"><a href="program.html" class="wd-ctm f-mulish">General Science</a></li>
                                            <li class="fx"><a href="program.html" class="wd-ctm f-mulish">English Basic</a></li>
                                            <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Social Science</a></li>
                                        </ul>
                                    </div>
                                    <div class="widget widget-news st-3">
                                        <h4 class="title-widget">recent news</h4>
                                        <ul class="list-news">
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget9.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-grid.html">Useful Code Extened End Developers</a></h6></li>
                                                    <li><a href="blog-grid.html" class="fx meta-news clr-pri-6"><i class="far fa-calendar-alt"></i>25 dec 2021</a></li>
                                                </ul>
                                            </li>
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget10.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-grid.html">Useful Code Extened End Developers</a></h6></li>
                                                    <li><a href="blog-grid.html" class="fx meta-news clr-pri-6"><i class="far fa-calendar-alt"></i>25 dec 2021</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="footer-bottom jus-ct">
                                    <p class="copy-right">Copyright © 2022, Kinco - Kindergarten HTML Template. Designed by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
    </div>
    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>
   <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.min.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/plugin.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/countto.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/wow.min.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/owl.carousel.min.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/owl.carousel2.thumbs.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/main.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/shortcodes.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.magnific-popup.min.js"></script>

</body>

</html>