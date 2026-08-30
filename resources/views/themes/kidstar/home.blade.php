<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kindergarten || Responsive HTML 5 Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/css/style.css">
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/css/responsive.css">
    <link rel="stylesheet" href="/themes/{{ config('theme.active') }}/fonts/flaticon.css" />
    <!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/themes/{{ config('theme.active') }}/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/themes/{{ config('theme.active') }}/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/themes/{{ config('theme.active') }}/images/favicon/favicon-16x16.png" sizes="16x16">


</head>

<body>
    <div class="boxed_wrapper">

        <div class="header-top">
            <div class="container clearfix">
                <!--Top Left-->
                <div class="top-left pull-left">
                    <ul class="links-nav clearfix">
                        <li><a href="#"><span class="fa fa-phone"></span> Call:  123 4561 5523 </a>
                        </li>
                        <li><a href="#"><span class="fa fa-envelope"></span>Email:  info@templatepath.com</a>
                        </li>
                    </ul>
                </div>

                <!--Top Right-->
                <div class="top-right pull-right">
                    <ul class="social-links clearfix">
                        <li><a href="#"><span class="fa fa-facebook-f"></span></a>
                        </li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a>
                        </li>
                        <li><a href="#"><span class="fa fa-linkedin"></span></a>
                        </li>
                        <li><a href="#"><span class="fa fa-instagram"></span></a>
                        </li>
                        <li><a href="#"><span class="fa fa-pinterest-p"></span></a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        <!-- Header Top End -->

        <section class="mainmenu-area stricky">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="main-logo">
                            <a href="index.html"><img src="/themes/{{ config('theme.active') }}/images/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-5 menu-column">
                        <nav class="main-menu">
                            <div class="navbar-header">     
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">

                                    <li class="current"><a href="index.html">Home</a>
                                    </li>
                                    <li><a href="about.html">About</a>
                                    </li>
                                    <li class="dropdown"><a href="#">Services</a>
                                        <ul>
                                            <li><a href="service.html">Services</a>
                                            </li>
                                            <li><a href="courses.html">Courses</a>
                                            </li>
                                            <li><a href="course-details.html">Course Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="gallery.html">Gallery</a>
                                            </li>
                                            <li><a href="team.html">Teachers</a>
                                            </li>
                                            <li><a href="team-profile.html">Teachers Profile</a>
                                            </li>
                                            <li><a href="Faq.html">Faq</a>
                                            </li>
                                            <li><a href="error.html">Error</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="dropdown"><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog-with-sidebar.html">Blog With Sidebar</a>
                                            </li>
                                            <li><a href="blog-details.html">Blog Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a>
                                    </li>
                                </ul>

                                <ul class="mobile-menu clearfix">

                                    <li class="current"><a href="index.html">Home</a>
                                </li>
                                <li><a href="about.html">About</a>
                                </li>
                                <li class="dropdown"><a href="#">Services</a>
                                    <ul>
                                        <li><a href="service.html">Services</a>
                                        </li>
                                        <li><a href="courses.html">Courses</a>
                                        </li>
                                        <li><a href="course-details.html">Course Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="gallery.html">Gallery</a>
                                        </li>
                                        <li><a href="team.html">Teachers</a>
                                        </li>
                                        <li><a href="team-profile.html">Teachers Profile</a>
                                        </li>
                                        <li><a href="Faq.html">Faq</a>
                                        </li>
                                        <li><a href="error.html">Error</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog-with-sidebar.html">Blog With Sidebar</a>
                                        </li>
                                        <li><a href="blog-details.html">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a>
                                </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-2">
                        <div class="right-area pull-right">
                            <div class="top-search-box">
                                <button><i class="fa fa-search"></i>
                                </button>
                                <ul class="search-box">
                                    <li>
                                        <form action="#">
                                            <input type="text" placeholder="Search for something...">
                                            <button type="submit"><i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart">
                                <a href="#"><span class="fa fa-shopping-bag"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>



       

        <!--Start rev slider wrapper-->
        <section class="rev_slider_wrapper">
            <div id="slider1" class="rev_slider" data-version="5.0">
                <ul>

                    <li data-transition="fade">
                        <img src="/themes/{{ config('theme.active') }}/images/slider/1.jpg" alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">


                        <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="230" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                            <div class="slide-content-box">
                                <h1>Kindergarten Education for your Child</h1>
                            </div>
                        </div>
                        <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="310" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                            <div class="slide-content-box">
                                <p>Cupidatat non proident sunt culpa qui officia deserunt mollit
                                    <br> anim idest laborum </p>
                            </div>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="400" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="700">
                            <div class="slide-content-box">
                                <div class="button">
                                    <a class="thm-btn yellow-bg" href="contact.html">contact us</a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li data-transition="fade">
                        <img src="/themes/{{ config('theme.active') }}/images/slider/2.jpg" alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">


                        <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="230" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                            <div class="slide-content-box">
                                <h1>Kindergarten Education for your Child</h1>
                            </div>
                        </div>
                        <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="310" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                            <div class="slide-content-box">
                                <p>Cupidatat non proident sunt culpa qui officia deserunt mollit
                                    <br> anim idest laborum </p>
                            </div>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="400" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="700">
                            <div class="slide-content-box">
                                <div class="button">
                                    <a class="thm-btn yellow-bg" href="contact.html">contact us</a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li data-transition="fade">
                        <img src="/themes/{{ config('theme.active') }}/images/slider/3.jpg" alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">


                        <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="230" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                            <div class="slide-content-box">
                                <h1>Kindergarten Education for your Child</h1>
                            </div>
                        </div>
                        <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="310" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                            <div class="slide-content-box">
                                <p>Cupidatat non proident sunt culpa qui officia deserunt mollit
                                    <br> anim idest laborum </p>
                            </div>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="400" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="700">
                            <div class="slide-content-box">
                                <div class="button">
                                    <a class="thm-btn yellow-bg" href="contact.html">contact us</a>
                                </div>
                            </div>
                        </div>

                    </li>


                </ul>
            </div>
        </section>
        <!--End rev slider wrapper-->
		
		<!--feature start-->
        <section class="feature">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>Core Values</h2>
                    <p>Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum </p>
                </div>
                <div class="inner-box">
                    <div class="item-list">
                        <div class="row">
                            <div class="item col-md-3 col-sm-6 col-xs-12">
                                <div class="border">
                                    <div class="icon-box">
                                        <i class="icon flaticon-write-board"></i>
                                    </div>
                                </div>
                                <h3><a href="#">Smart Courses</a></h3>
                            </div>
                            <div class="item col-md-3 col-sm-6 col-xs-12">
                                <div class="border">
                                    <div class="icon-box">
                                        <i class="icon flaticon-people"></i>
                                    </div>
                                </div>
                                <h3><a href="#">Expert Teachers</a></h3>
                            </div>
                            <div class="item col-md-3 col-sm-6 col-xs-12">
                                <div class="border">
                                    <div class="icon-box">
                                        <i class="icon flaticon-paint-palette-and-brush"></i>
                                    </div>
                                </div>
                                <h3><a href="#">Music & Arts</a></h3>
                            </div>
                            <div class="item col-md-3 col-sm-6 col-xs-12">
                                <div class="border">
                                    <div class="icon-box">
                                        <i class="icon flaticon-bricks"></i>
                                    </div>
                                </div>
                                <h3><a href="#">Active Learning</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--feature end-->
		
		<!--about start-->
        <section class="about" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/about-bg.jpg);">
            <div class="container">
                <div class="item-box">
                    <div class="row">
                        <div class="single-column col-md-6 col-sm-12">
                            <div class="wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s" data-wow-offset="0" style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                                <div class="post-content">
                                    <div class="sec-title">
                                        <h2>Welcome to Kidstar</h2>
                                    </div>
                                    <div class="text">
                                        <p>Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum sed ut perspiciatis unde omnis iste natuserror sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.</p>
                                    </div>
                                    <ul class="list">
                                        <li>Totam rem aperiam eaque ipsa quae ab illo</li>
                                        <li>voluptatem accusantium doloremque </li>
                                        <li>officia deserunt mollit anim idest laborum</li>
                                    </ul>
                                    <ul class="link_btn">
                                        <li><a href="contact.html" class="thm-btn">Contact us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-column about_carousel col-md-6 col-sm-12">
                            <div class="about-carousel">
                                <div class="single-item">
                                    <div class="img-holder">
                                        <img src="/themes/{{ config('theme.active') }}/images/about/about.png" alt="Awesome Image" />
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="img-holder">
                                        <img src="/themes/{{ config('theme.active') }}/images/about/about.png" alt="Awesome Image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--about end-->

		<!--our-service start-->
        <section class="our-service">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>Our Services</h2>
                    <p>Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum </p>
                </div>

                <div class="item-box">
                    <div class="row">

                        <div class="column col-md-4 col-sm-12">
                            <div class="item right">
                                <div class="icon"><span class="fa fa-graduation-cap"></span>
                                </div>
                                <h4><a href="#">Experience Teachers</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                            </div>
                            <div class="item right">
                                <div class="icon"><span class="fa fa-heart"></span>
                                </div>
                                <h4><a href="#">Love & Care</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                            </div>
                            <div class="item right">
                                <div class="icon"><span class="fa fa-cutlery"></span>
                                </div>
                                <h4><a href="#">Delicious Food</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                            </div>
                        </div>

                        <div class="column col-md-4 col-sm-12">
                            <div class="wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s" data-wow-offset="0" style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                                <figure class="img-box">
                                    <a href="service.html"><img src="/themes/{{ config('theme.active') }}/images/service/1.png" alt="">
                                    </a>
                                </figure>
                            </div>
                        </div>

                        <div class="column col-md-4 col-sm-12">
                            <div class="item left">
                                <div class="icon"><span class="fa fa-car"></span>
                                </div>
                                <h4><a href="#">Transportation</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                            </div>
                            <div class="item left">
                                <div class="icon"><span class="fa fa-leaf"></span>
                                </div>
                                <h4><a href="#">Physical Activity</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                            </div>
                            <div class="item left">
                                <div class="icon"><span class="fa fa-shield"></span>
                                </div>
                                <h4><a href="#">Meny Sports</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--our-service end-->

        <!--feature-two-->
        <section class="feature-two">

            <div class="feature-two-carousel">
                <div class="single-item">
                    <div class="image-holder">
                        <img src="/themes/{{ config('theme.active') }}/images/gallery/g4.jpg" alt="Awesome Image" />
                        <div class="overlay">
                            <div class="inner">

                                <ul class="social">
                                    <li><a href="/themes/{{ config('theme.active') }}/images/gallery/g4.jpg" data-fancybox-group="example-gallery" class="view lightbox-image"><i class="icon fa fa-search"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-link"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="single-item">
                    <div class="image-holder">
                        <img src="/themes/{{ config('theme.active') }}/images/gallery/g3.jpg" alt="Awesome Image" />
                        <div class="overlay">
                            <div class="inner">
                                <ul class="social">
                                    <li><a href="/themes/{{ config('theme.active') }}/images/gallery/g3.jpg" data-fancybox-group="example-gallery" class="view lightbox-image"><i class="icon fa fa-search"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-link"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="single-item">
                    <div class="image-holder">
                        <img src="/themes/{{ config('theme.active') }}/images/gallery/g2.jpg" alt="Awesome Image" />
                        <div class="overlay">
                            <div class="inner">
                                <ul class="social">
                                    <li><a href="/themes/{{ config('theme.active') }}/images/gallery/g2.jpg" data-fancybox-group="example-gallery" class="view lightbox-image"><i class="icon fa fa-search"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-link"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="single-item">
                    <div class="image-holder">
                        <img src="/themes/{{ config('theme.active') }}/images/gallery/g1.jpg" alt="Awesome Image" />
                        <div class="overlay">
                            <div class="inner">
                                <ul class="social">
                                    <li><a href="/themes/{{ config('theme.active') }}/images/gallery/g1.jpg" data-fancybox-group="example-gallery" class="view lightbox-image"><i class="icon fa fa-search"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-link"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <!--feature-two end-->

        <!--call-to-action section-->
        <section class="call-to-action">
            <div class="container">
                <div class="overlay">
                    <div class="row">
                        <div class="col-md-9">
                            <h3>Apply Now for your Kids</h3>
                            <p>Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum</p>
                        </div>
                        <div class="col-md-3">
                            <ul class="link_btn">
                                <li><a href="#" class="thm-btn">Apply Now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--call-to-action section end -->
		
		<!--our-courses section-->
        <section class="our-courses">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>Our Courses</h2>
                    <p>Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum </p>
                </div>
                <div class="item-box">
                    <div class="row">
                        <div class="item-list">
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">
                                        <img src="/themes/{{ config('theme.active') }}/images/courses/1.png" alt="" />
                                    </figure>
                                    <div class="content">
                                        <div class="price">
                                            <h4>From: $50</h4>
                                        </div>
                                        <div class="text">
                                            <h3><a href="course-details.html">Course No 1</a></h3>
                                            <span>Age: 3 - 5 Years, Size: 9 Seats</span>
                                            <p>Lorem ipsum dolor sit amet, conse tur adipisicelit sed do eiusmod</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">
                                        <img src="/themes/{{ config('theme.active') }}/images/courses/2.png" alt="" />
                                    </figure>
                                    <div class="content">
                                        <div class="price">
                                            <h4>From: $50</h4>
                                        </div>
                                        <div class="text">
                                            <h3><a href="course-details.html">Course No 2</a></h3>
                                            <span>Age: 3 - 5 Years, Size: 9 Seats</span>
                                            <p>Lorem ipsum dolor sit amet, conse tur adipisicelit sed do eiusmod</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">
                                        <img src="/themes/{{ config('theme.active') }}/images/courses/3.png" alt="" />
                                    </figure>
                                    <div class="content">
                                        <div class="price">
                                            <h4>From: $50</h4>
                                        </div>
                                        <div class="text">
                                            <h3><a href="course-details.html">Course No 3</a></h3>
                                            <span>Age: 3 - 5 Years, Size: 9 Seats</span>
                                            <p>Lorem ipsum dolor sit amet, conse tur adipisicelit sed do eiusmod</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">
                                        <img src="/themes/{{ config('theme.active') }}/images/courses/4.png" alt="" />
                                    </figure>
                                    <div class="content">
                                        <div class="price">
                                            <h4>From: $50</h4>
                                        </div>
                                        <div class="text">
                                            <h3><a href="course-details.html">Course No 4</a></h3>
                                            <span>Age: 3 - 5 Years, Size: 9 Seats</span>
                                            <p>Lorem ipsum dolor sit amet, conse tur adipisicelit sed do eiusmod</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--our-courses section end-->
		
		<!--founder section-->
        <section class="founder" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/founder.jpg);">
            <div class="container">
                <div class="overlay">
                    <div class="founder-carousel">

                        <div class="item">
                            <figure class="icon-box">
                                <i class="icon fa fa-quote-right" aria-hidden="true"></i>
                            </figure>
                            <div class="content-holder">
                                <h4>Samanta Doe - <span>(Students Mother)</span></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                            </div>
                        </div>
                        <div class="item">
                            <figure class="icon-box">
                                <i class="icon fa fa-quote-right" aria-hidden="true"></i>
                            </figure>
                            <div class="content-holder">
                                <h4>Samanta Doe - <span>(Students Mother)</span></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                            </div>
                        </div>
                        <div class="item">
                            <figure class="icon-box">
                                <i class="icon fa fa-quote-right" aria-hidden="true"></i>
                            </figure>
                            <div class="content-holder">
                                <h4>Samanta Doe - <span>(Students Mother)</span></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--founder section end-->

        <!--team section-->
        <section class="our-team">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>Our Staffs</h2>
                    <p>Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum </p>
                </div>
                <div class="content-box">
                    <div class="row">
                        <div class="item-list">
                            <div class="column col-md-3 col-sm-6">
                                <div class="single-team">
                                    <div class="img-holder">
                                        <img src="/themes/{{ config('theme.active') }}/images/team/t1.png" alt="Awesome Image" />
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="team-profile.html"><i class="fa fa-link"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-holder">
                                        <h3><a href="team-profile.html">Mr. Mario Salles</a></h3>
                                        <p>Teacher</p>
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-md-3 col-sm-6">
                                <div class="single-team">
                                    <div class="img-holder">
                                        <img src="/themes/{{ config('theme.active') }}/images/team/t2.png" alt="Awesome Image" />
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="team-profile.html"><i class="fa fa-link"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-holder">
                                        <h3><a href="team-profile.html">Mr. Mario Salles</a></h3>
                                        <p>Teacher</p>
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-md-3 col-sm-6">
                                <div class="single-team">
                                    <div class="img-holder">
                                        <img src="/themes/{{ config('theme.active') }}/images/team/t3.png" alt="Awesome Image" />
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="team-profile.html"><i class="fa fa-link"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-holder">
                                        <h3><a href="team-profile.html">Mr. Mario Salles</a></h3>
                                        <p>Teacher</p>
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-md-3 col-sm-6">
                                <div class="single-team">
                                    <div class="img-holder">
                                        <img src="/themes/{{ config('theme.active') }}/images/team/t4.png" alt="Awesome Image" />
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="team-profile.html"><i class="fa fa-link"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-holder">
                                        <h3><a href="team-profile.html">Mr. Mario Salles</a></h3>
                                        <p>Teacher</p>
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--team section end-->

        <!--Fact Counter-->
        <section class="fact-counter">
            <div class="container">
                <div class="row">
                    <div class="counter-outer">
                        <!--Column-->
                        <article class="column counter-column col-md-3 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="300ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon flaticon-people-1"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="200">0</span>
                                        <p>Teacher & Staffs</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!--Column-->
                        <article class="column counter-column col-md-3 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="600ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon flaticon-calendar"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="125">0</span>
                                        <p>Events Held</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!--Column-->
                        <article class="column counter-column col-md-3 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="900ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon flaticon-parents"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="750">0</span>
                                        <p>Happy Parents</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!--Column-->
                        <article class="column counter-column col-md-3 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="900ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon flaticon-science"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="200">0</span>
                                        <p>Labs Project</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

        </section>
         <!--Fact Counter end-->
		
		 <!--latest-news start-->
        <section class="latest-news">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>Recent News</h2>
                    <p>Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum </p>
                </div>
                <div class="content-box">
                    <div class="row">
                        <div class="item-list">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">
                                        <img src="/themes/{{ config('theme.active') }}/images/news/1.png" alt="Awesome Image">
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="blog-details.html"><i class="fa fa-link"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </figure>
                                    <ul class="admin-comments">
                                        <li><i class="icon flaticon-black"> Jone Doe  </i>
                                        </li>
                                        <li><i class="icon flaticon-comments">4 Comments </i>
                                        </li>
                                    </ul>
                                    <h4><a href="blog-details.html">Uncovers Ancient Ashkenaz.</a></h4>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">
                                        <img src="/themes/{{ config('theme.active') }}/images/news/2.png" alt="Awesome Image">
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="blog-details.html"><i class="fa fa-link"></i></a>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                    </figure>
                                    <ul class="admin-comments">
                                        <li><i class="icon flaticon-black">  Jone Doe  </i>
                                        </li>
                                        <li><i class="icon flaticon-comments">4 Comments </i>
                                        </li>
                                    </ul>
                                    <h4><a href="blog-details.html">111Uncovers Ancient Ashkenaz.</a></h4>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">
                                        <img src="/themes/{{ config('theme.active') }}/images/news/3.png" alt="Awesome Image">
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="blog-details.html"><i class="fa fa-link"></i></a>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                    </figure>
                                    <ul class="admin-comments">
                                        <li><i class="icon flaticon-black">  Jone Doe  </i>
                                        </li>
                                        <li><i class="icon flaticon-comments">4 Comments </i>
                                        </li>
                                    </ul>
                                    <h4><a href="blog-details.html">Uncovers Ancient Ashkenaz.</a></h4>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!--latest-news end-->

		 <!--footer start-->
        <footer class="footer bg-style">
            <div class="container">
                <div class="footer-upper">

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget about-widget">
                                <a href="#">
                                    <img src="/themes/{{ config('theme.active') }}/images/logo/logo2.png" alt="Awesome Image" />
                                </a>
                                <p>Excepteur sint occaecat cupidatat non
                                    <br> proident, sunt in culpa qui officia dese
                                    <br>runt mollit anim id est laborum. Sed ut
                                    <br> perspiciatis unde omnis.</p>

                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="footer-widget quick-links">
                                <h3 class="title">Useful Link</h3>
                                <ul>
                                    <li><a href="#">About us</a>
                                    </li>
                                    <li><a href="#">Class Schedule</a>
                                    </li>
                                    <li><a href="#">Teacher & Staff</a>
                                    </li>
                                    <li><a href="#">Contact us</a>
                                    </li>
                                    <li><a href="#">Privacy policy </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget opening-hour">
                                <h3 class="title">Oppening Hours</h3>


                                <ul class="day-time">
                                    <li>Mon-Wed<span>08:00-18:00 </span>
                                    </li>
                                    <li>Thr-Fri<span> 08:00-18:00</span>
                                    </li>
                                    <li>Saturday<span>Closed</span>
                                    </li>
                                    <li>Sunday<span>Closed</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="footer-widget contact">
                                <h3 class="title">Get in Touch</h3>

                                <div class="widget-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur
                                        <br>adipisicing elit sed do eiusmod. </p>
                                    <ul class="contact-info">
                                        <li><span class="icon fa fa-home"></span>1201 park street, Fifth
                                            <br>Avenue,</li>
                                        <li><span class="icon fa fa-phone"></span>[88] 657 524 332</li>
                                        <li><span class="icon fa fa-envelope"></span>info@kidstar.com</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="Instagram">
                    <div class="container">
                        <div class="sec-title">
                            <h3>Instagram</h3>
                        </div>
                        <div class="Instagram-carousel owl-carousel owl-theme">

                            <div class="item">
                                <figure class="image-box">
                                    <img src="/themes/{{ config('theme.active') }}/images/footer/1.png" alt="Awesome Image">
                                </figure>

                            </div>
                            <div class="item">
                                <figure class="image-box">
                                    <img src="/themes/{{ config('theme.active') }}/images/footer/2.png" alt="Awesome Image">
                                </figure>

                            </div>
                            <div class="item">
                                <figure class="image-box">
                                    <img src="/themes/{{ config('theme.active') }}/images/footer/3.png" alt="Awesome Image">
                                </figure>

                            </div>
                            <div class="item">
                                <figure class="image-box">
                                    <img src="/themes/{{ config('theme.active') }}/images/footer/4.png" alt="Awesome Image">
                                </figure>

                            </div>
                            <div class="item">
                                <figure class="image-box">
                                    <img src="/themes/{{ config('theme.active') }}/images/footer/5.png" alt="Awesome Image">
                                </figure>

                            </div>
                            <div class="item">
                                <figure class="image-box">
                                    <img src="/themes/{{ config('theme.active') }}/images/footer/6.png" alt="Awesome Image">
                                </figure>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Bottom-->
            <div class="footer-bottom text-center">
                <div class="container">
                    <div class="copyright-text">Copyright © Kidstar 2017. All Rights Reserved</div>
                </div>
            </div>
        </footer>
        <!--footer end-->



        <!-- Scroll Top Button -->
        <button class="scroll-top tran3s color2_bg">
            <span class="fa fa-angle-up"></span>
        </button>
        <!-- pre loader  -->
        <div class="preloader"></div>

        <!-- jQuery js -->
        <script src="/themes/{{ config('theme.active') }}/js/jquery.js"></script>
        <!-- bootstrap js -->
        <script src="/themes/{{ config('theme.active') }}/js/bootstrap.min.js"></script>
        <!-- jQuery ui js -->
        <script src="/themes/{{ config('theme.active') }}/js/jquery-ui.js"></script>
        <!-- owl carousel js -->
        <script src="/themes/{{ config('theme.active') }}/js/owl.carousel.min.js"></script>
        <!-- jQuery validation -->
        <script src="/themes/{{ config('theme.active') }}/js/jquery.validate.min.js"></script>
        <!-- google map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script>
        <script src="/themes/{{ config('theme.active') }}/js/gmap.js"></script>
        <!-- mixit up -->
        <script src="/themes/{{ config('theme.active') }}/js/wow.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/jquery.mixitup.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/jquery.fitvids.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/bootstrap-select.min.js"></script>
      

        <!-- revolution slider js -->
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="/themes/{{ config('theme.active') }}/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>

        <!-- fancy box -->
        <script src="/themes/{{ config('theme.active') }}/js/jquery.fancybox.pack.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/jquery.polyglot.language.switcher.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/nouislider.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/jquery.bootstrap-touchspin.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/SmoothScroll.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/jquery.appear.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/jquery.countTo.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/jquery.flexslider.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/imagezoom.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/validation.js"></script>
        <script id="map-script" src="/themes/{{ config('theme.active') }}/js/default-map.js"></script>
        <script src="/themes/{{ config('theme.active') }}/js/custom.js"></script>

    </div>

</body>

</html>