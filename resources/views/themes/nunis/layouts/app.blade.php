<!DOCTYPE html>

<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Nunis - Modern Kids HTML Template</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="/themes/{{ config('theme.active') }}/assets/images/favicon.ico" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/bootstrap.min.css">

    <!--====== Fontawesome pro css ======-->
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/all.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/magnific-popup.css">

    <!--====== animate css ======-->
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/animate.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/slick.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/style.css">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/responsive.css">

<link rel="stylesheet" href="/themes/assets/css/custom.css">
</head>

<body>
    @include('themes.common.partials.head')      
    <!--======  PRELOADER PART START ======-->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>

    <!--======  PRELOADER PART END ======-->

    <!--====== SEARCH PART START ======-->

    <div class="search-popup" id="search-popup">
        <form action="index.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <!--====== SEARCH PART START ======-->

    <!--====== SIDEBAR MENU PART START ======-->

    <div class="body-overlay" id="body-overlay"></div>
    <div class="sidebar-menu" id="sidebar-menu">
        <button class="sidebar-menu-close"><i class="fal fa-times"></i></button>
        <div class="sidebar-inner">
            <div class="sidebar-logo">
                <img src="/themes/{{ config('theme.active') }}/assets/images/logo.png" alt="logo" />
            </div><!-- sidebar logo -->
            <div class="sidemenu-text">
                <p>We believe brand interaction is key in commu- nication. Real inno vations and a positive customer experience are the heart of successful commu- nication.</p>
            </div>
            <div class="sidebar-contact">
                <h4>Contact Us</h4>
                <ul>
                    <li><i class="fa fa-map-marker"></i>Lavaca Street, Suite 2000</li>
                    <li><i class="fa fa-envelope"></i>email@evha.com</li>
                    <li><i class="fa fa-phone"></i>(+880) 172570051</li>
                </ul>
            </div>
            <div class="sidebar-subscribe">
                <input type="text" placeholder="Email">
                <button><i class="fa fa-long-arrow-right"></i></button>
            </div>
            <div class="social-link">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!--====== SIDEBAR MENU PART ENDS ======-->

    <!--====== HEADER PART START ======-->
@include('themes.' . config('theme.active') . '.partials.head')
    
@yield('content') 

    <!--====== HEADER PART ENDS ======-->

    <!--====== BANNER PART START ======-->


    <!--====== BANNER PART ENDS ======-->

    <!--====== FEATURES PART START ======-->

   

    <!--====== FEATURES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    

    <!--====== ABOUT PART ENDS ======-->

    <!--====== COURSE PART START ======-->

    

    <!--====== COURSE PART ENDS ======-->

    <!--====== TEAM PART START ======-->
    
    <!--====== TEAM PART ENDS ======-->

    <!--====== COUNTER PART START ======-->

    
    <!--====== COUNTER PART ENDS ======-->

    <!--====== EVENT PART START ======-->

    <section style="display: none;" class="event-area gray-bg pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center">
                        <span>Our Events</span>
                        <h3 class="title">We Arrange Many Programs And Events For Study</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="event-item mt-30">
                        <div class="event-thumb">
                            <img src="/themes/{{ config('theme.active') }}/assets/images/event-1.jpg" alt="event">
                        </div>
                        <div class="event-content text-center bg-white">
                            <h4 class="title">Ball Baje Dong</h4>
                            <p>Must explain to you how all this mistaken idea of denouncing pleasure </p>
                            <ul>
                                <li><i class="fal fa-clock"></i> 10:00am - 12:00 pm</li>
                                <li><i class="fal fa-map-marker-alt"></i> New York</li>
                            </ul>
                            <div class="date">
                                <h5>25</h5>
                                <span>nov</span>
                            </div>
                        </div>
                    </div> <!-- event item -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="event-item mt-30">
                        <div class="event-thumb">
                            <img src="/themes/{{ config('theme.active') }}/assets/images/event-2.jpg" alt="event">
                        </div>
                        <div class="event-content text-center bg-white">
                            <h4 class="title">Why Need Study </h4>
                            <p>Must explain to you how all this mistaken idea of denouncing pleasure </p>
                            <ul>
                                <li><i class="fal fa-clock"></i> 10:00am - 12:00 pm</li>
                                <li><i class="fal fa-map-marker-alt"></i> New York</li>
                            </ul>
                            <div class="date">
                                <h5>25</h5>
                                <span>nov</span>
                            </div>
                        </div>
                    </div> <!-- event item -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="event-item mt-30">
                        <div class="event-thumb">
                            <img src="/themes/{{ config('theme.active') }}/assets/images/event-3.jpg" alt="event">
                        </div>
                        <div class="event-content text-center bg-white">
                            <h4 class="title">Important Of Lab</h4>
                            <p>Must explain to you how all this mistaken idea of denouncing pleasure </p>
                            <ul>
                                <li><i class="fal fa-clock"></i> 10:00am - 12:00 pm</li>
                                <li><i class="fal fa-map-marker-alt"></i> New York</li>
                            </ul>
                            <div class="date">
                                <h5>25</h5>
                                <span>nov</span>
                            </div>
                        </div>
                    </div> <!-- event item -->
                </div>
            </div> <!-- row -->
        </div>
    </section>

    <!--====== EVENT PART ENDS ======-->

    <!--====== TESTIMONIALS PART START ======-->

    

    <!--====== TESTMONIALS PART ENDS ======-->



    <!-- event-coundown-area part start -->
    
    <!-- event-coundown-area part end -->

    <!--====== BLOG PART START ======-->
    
    <!--====== BLOG PART END ======-->

    <!--====== BRAND PART START ======-->
    

    <!--====== BRAND PART END ======-->

    <!--====== FOOTER-START ======-->
    <footer class="footer-bg pt-80 pb-30">
        <div class="footer-area pb-145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pb-80">
                        <div class="gooter-gallery-area1">
                            <div class="row">
                                <div class="col-md-2 col-sm-4">
                                    <div class="single-footer-gallery-img">
                                        <img src="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-1.jpg" alt="">
                                        <div class="overlay-footer-link">
                                            <a href="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-1.jpg" class="popup-footer-img"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="single-footer-gallery-img">
                                        <img src="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-2.jpg" alt="">
                                        <div class="overlay-footer-link">
                                            <a href="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-2.jpg" class="popup-footer-img"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="single-footer-gallery-img">
                                        <img src="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-3.jpg" alt="">
                                        <div class="overlay-footer-link">
                                            <a href="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-3.jpg" class="popup-footer-img"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="single-footer-gallery-img">
                                        <img src="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-4.jpg" alt="">
                                        <div class="overlay-footer-link">
                                            <a href="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-4.jpg" class="popup-footer-img"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="single-footer-gallery-img">
                                        <img src="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-6.jpg" alt="">
                                        <div class="overlay-footer-link">
                                            <a href="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-6.jpg" class="popup-footer-img"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="single-footer-gallery-img">
                                        <img src="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-2.jpg" alt="">
                                        <div class="overlay-footer-link">
                                            <a href="/themes/{{ config('theme.active') }}/assets/images/footer-gallery/footer-gallery-img-2.jpg" class="popup-footer-img"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-wedget">
                            <div class="logo footer-logo"><a href="#"><img src="/themes/{{ config('theme.active') }}/assets/images/footer-logo.png" alt=""></a></div>
                            <p>Avoids pleasure itself, because it is plea
                                sure, but because those who do not know how pursue pleasure rationally counter consequences that are extremely</p>
                            <ul class="footer-social-links">
                                <li><a href="#" class="blue"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="yellow"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="red"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#" class="purple"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-wedget">
                            <h4>Our Programs</h4>
                            <ul class="page-links">
                                <li><a href="#">Basic Engilsh Learning</a></li>
                                <li><a href="#">General Science</a></li>
                                <li><a href="#">Programming Basic</a></li>
                                <li><a href="#">Graphics Design</a></li>
                                <li><a href="#">Basic Photograpy</a></li>
                                <li><a href="#">Basic Entertainment</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-wedget">
                            <h4>Contact Us</h4>
                            <div class="footer-contact-area">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <span>USA, New York - 1060 <br>
                                    Str. First Avenue 1</span>
                            </div>

                            <div class="footer-contact-area">
                                <span><i class="fas fa-envelope-open-text"></i></span>
                                <span>supportinfo@gmail.com <br>
                                    www.kidcave.net</span>
                            </div>


                            <div class="footer-contact-area">
                                <span><i class="fas fa-phone-volume"></i></span>
                                <span>+123 ( 456 ) 7899 <br>
                                    9865 ( 5642) 222</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-wedget">
                            <h4>Newsletters</h4>
                            <p>Subscribe Our Newsletters To
                                Get More Update</p>
                            <div class="footer-subscribe-form pb-20">
                                <form action="#">
                                    <input type="text" placeholder="Enter your email" name="email">
                                    <span><i class="fas fa-envelope-open-text"></i></span>
                                </form>
                            </div>
                            <a href="#" class="main-btn footer-btn">Subscribe<i class="fal fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="footer-bottom-text">
                            <p> Copyright 2020 Nunis. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--====== FOOTER-END ======-->

    <!--====== GO TO TOP PART START ======-->
    <div class="go-top-area">
        <div class="go-top-wrap">
            <div class="go-top-btn-wrap">
                <div class="go-top go-top-btn">
                    <i class="fa fa-angle-double-up"></i>
                    <i class="fa fa-angle-double-up"></i>
                </div>
            </div>
        </div>
    </div>
    <!--====== GO TO TOP PART ENDS ======-->


    <!--====== jquery js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/bootstrap.min.js"></script>
    <script src="/themes/{{ config('theme.active') }}/assets/js/popper.min.js"></script>

    <!--====== Slick js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/slick.min.js"></script>

    <!--====== counterup js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.counterup.min.js"></script>

    <!--====== countdown js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/countdown.js"></script>

    <!--====== waypoints js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/waypoints.min.js"></script>

    <!--====== Isotope js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/isotope.pkgd.min.js"></script>

    <!--====== Images Loaded js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/imagesloaded.pkgd.min.js"></script>

    <!--====== wow js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/wow.min.js"></script>

    <!--====== syotimer js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.syotimer.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/ajax-contact.js"></script>

    <!--====== Main js ======-->
    <script src="/themes/{{ config('theme.active') }}/assets/js/main.js"></script>

</body>

</html>
