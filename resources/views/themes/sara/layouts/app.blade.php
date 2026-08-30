<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Saratov - Kindergarten HTML Template | Home Style One</title>
<!-- Stylesheets -->
<link href="/themes/{{ config('theme.active') }}/css/bootstrap.css" rel="stylesheet">
<link href="/themes/{{ config('theme.active') }}/css/revolution-slider.css" rel="stylesheet">
<link href="/themes/{{ config('theme.active') }}/css/style.css" rel="stylesheet">
<link href="/themes/{{ config('theme.active') }}/css/jquery-ui.css" rel="stylesheet">

<!--Favicon-->
<link rel="shortcut icon" href="/themes/{{ config('theme.active') }}/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/themes/{{ config('theme.active') }}/images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="/themes/{{ config('theme.active') }}/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="/themes/{{ config('theme.active') }}/js/respond.js"></script><![endif]-->
<link rel="stylesheet" href="/themes/assets/css/custom.css">
</head>

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header-->
    <header class="main-header">
        
        <!-- Header Top -->
    	<div class="header-top">
        	<div class="auto-container clearfix">
            	<!--Top Left-->
            	<div class="top-left pull-left">
                	<ul class="links-nav clearfix">
                    	<li><span class="icon fa fa-envelope-o"></span><a href="#">Info@Kindergarten.com</a></li>
                        <li><span class="icon fa fa-phone"></span><a href="#">Call Us Now : 1800 123 4567</a></li>
                    </ul>
                </div>
                
                <!--Top Right-->
            	<div class="top-right pull-right">
                	<ul class="links-nav clearfix">
                    	<li class="language dropdown"><a class="btn btn-default dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#">En &ensp;<span class="icon fa fa-caret-down"></span></a>
                        	<ul class="dropdown-menu style-one" aria-labelledby="dropdownMenu2">
                                <li><a href="#">English</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Arabic</a></li>
                                <li><a href="#">Hindi</a></li>
                            </ul>
                        </li>
                    	<li><a href="#">Login</a></li>
                        <li><a href="#">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Header Top End -->
        
        <!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
                	
                <div class="logo-outer">
                    <div class="logo"><a href="index.html"><img src="/themes/{{ config('theme.active') }}/images/logo.png" alt="" title=""></a></div>
                </div>
                    
                <div class="nav-outer clearfix">
                
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <!--Left Nav-->
                            <ul class="navigation left-nav clearfix">
                                <li class="current dropdown"><a href="#">Home</a>
                                    <ul>
                                        <li><a href="index.html">Homepage One</a></li>
                                        <li><a href="index-2.html">Homepage Two</a></li>
                                        <li class="dropdown"><a href="#">Header Styles</a>
                                            <ul>
                                                <li><a href="index.html">Header Style One</a></li>
                                                <li><a href="index-2.html">Header Style Two</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About Us</a></li>
                                <li class="dropdown"><a href="#">Classes</a>
                                    <ul>
                                        <li><a href="classes.html">Classes</a></li>
                                        <li><a href="classes-single.html">Alphabet matching</a></li>
                                        <li><a href="classes-single.html">Letter matching</a></li>
                                        <li><a href="classes-single.html">Color matching</a></li>
                                        <li><a href="classes-single.html">Little Stars</a></li>
                                        <li><a href="classes-single.html">Smart Turtles</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Pages</a>
                                    <ul>
                                    	<li><a href="teachers.html">Teachers</a></li>
                                        <li><a href="features.html">Features</a></li>
                                        <li><a href="error-page.html">404 Page</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--Right Nav-->
                            <ul class="navigation right-nav clearfix">
                                <li><a href="gallery.html">Gallery</a></li>
                                <li class="dropdown"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                    
                    <!--Search Box-->
                    <div class="search-box-outer">
                        <div class="dropdown">
                            <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                            <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                <li class="panel-outer">
                                    <div class="form-container">
                                        <form method="post" action="blog.html">
                                            <div class="form-group">
                                                <input type="search" name="field-name" value="" placeholder="Search Here" required="">
                                                <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
        	</div>
        </div>
        <!--End Header Upper-->
        
        <!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="index.html" class="img-responsive"><img src="/themes/{{ config('theme.active') }}/images/logo-small.png" alt="" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="current dropdown"><a href="#">Home</a>
                                    <ul>
                                        <li><a href="index.html">Homepage One</a></li>
                                        <li><a href="index-2.html">Homepage Two</a></li>
                                        <li class="dropdown"><a href="#">Header Styles</a>
                                            <ul>
                                                <li><a href="index.html">Header Style One</a></li>
                                                <li><a href="index-2.html">Header Style Two</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About Us</a></li>
                                <li class="dropdown"><a href="#">Classes</a>
                                    <ul>
                                        <li><a href="classes.html">Classes</a></li>
                                        <li><a href="classes-single.html">Alphabet matching</a></li>
                                        <li><a href="classes-single.html">Letter matching</a></li>
                                        <li><a href="classes-single.html">Color matching</a></li>
                                        <li><a href="classes-single.html">Little Stars</a></li>
                                        <li><a href="classes-single.html">Smart Turtles</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Pages</a>
                                    <ul>
                                    	<li><a href="teachers.html">Teachers</a></li>
                                        <li><a href="features.html">Features</a></li>
                                        <li><a href="error-page.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li class="dropdown"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->
    
    <!--Main Slider-->
    <section class="main-slider" data-start-height="800" data-slide-overlay="yes">
    	
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                	
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="/themes/{{ config('theme.active') }}/images/main-slider/image-1.jpg"  data-saveperformance="off"  data-title="Awesome Title Here">
                    <img src="/themes/{{ config('theme.active') }}/images/main-slider/image-1.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                    <div class="overlay-slide"></div>
                    
                    <div class="tp-caption sft sfb tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="-180"
                    data-speed="1500"
                    data-start="0"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
					data-endeasing="Power4.easeIn"><figure class="content-image"><img src="/themes/{{ config('theme.active') }}/images/main-slider/content-image-1.png" alt=""></figure> </div>
                    
                    <div class="tp-caption sft sfb tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="-70"
                    data-speed="1500"
                    data-start="500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><div class="styled-text">welcome to our driving school</div></div>
                    
                    <div class="tp-caption sfb sfb tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="25"
                    data-speed="1500"
                    data-start="1000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><div class="border-heading">Your Childrens Are Safe With us</div></div>
                    
                    <div class="tp-caption sfb sfb tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="115"
                    data-speed="1500"
                    data-start="1500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><div class="text">See Our Kindergarten Special Features!</div></div>
                    
                    <div class="tp-caption sfb sfb tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="175"
                    data-speed="1500"
                    data-start="2000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><a href="#" class="theme-btn btn-style-one">Let’s Go</a></div>
                    
                    </li>
                    
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="/themes/{{ config('theme.active') }}/images/main-slider/image-2.jpg"  data-saveperformance="off"  data-title="Awesome Title Here">
                    <img src="/themes/{{ config('theme.active') }}/images/main-slider/image-2.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                    <div class="tp-caption sfl sfb tp-resizeme"
                    data-x="left" data-hoffset="450"
                    data-y="center" data-voffset="-140"
                    data-speed="1500"
                    data-start="500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><h4>welcome to our driving school</h4></div>
                    
                    <div class="tp-caption sfl sfb tp-resizeme"
                    data-x="left" data-hoffset="450"
                    data-y="center" data-voffset="-40"
                    data-speed="1500"
                    data-start="1000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><h2>Play and Learn How to Explore <br> New things</h2></div>
                    
                    <div class="tp-caption sfl sfb tp-resizeme"
                    data-x="left" data-hoffset="450"
                    data-y="center" data-voffset="70"
                    data-speed="1500"
                    data-start="1500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><div class="dark-text">Programs of Kids Tree Preschool include world-class curriculum and knowledgeable child development <br> that meet the needs child development that meet the needsof children.</div></div>
                    
                    <div class="tp-caption sfl sfb tp-resizeme"
                    data-x="left" data-hoffset="450"
                    data-y="center" data-voffset="150"
                    data-speed="1500"
                    data-start="2000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><a href="#" class="theme-btn btn-style-one">Let’s Go</a>&ensp; &ensp;<a href="#" class="theme-btn btn-style-two">Read more </a></div>                    
                    </li>
                    
                </ul>
                
            </div>
        </div>
        
    </section>
  	<!--End Main Slider-->
    
    <!--Featured Section-->
    <section class="featured-section style-two">
    	<div class="auto-container">
        	<!--Sec Title-->
            <div class="sec-title centered">
            	<div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            	<h2>Welcome To KinderGarten</h2>
                <div class="title">About Our Paly school</div>
                <div class="text">We're a childcare centre with an engaging curriculum backed by qualified, experienced and experienced.</div>
            </div>
            <!--End Sec Title-->
			<div class="row clearfix">
                <!--Column/ Pull Left-->
                <div class="column pull-left col-md-4 col-sm-6 col-xs-12">
                    <!--Feature Block-->
                    <div class="feature-block">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-book"></span>
                            </div>
                            <h3><a href="features.html">Funny and Happy</a></h3>
                            <div class="text">We are group of teachers who really love childrens and enjoy every mo-</div>
                        </div>
                    </div>
                    
                    <!--Feature Block-->
                    <div class="feature-block">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-football"></span>
                            </div>
                            <h3><a href="features.html">Fulfill With Love</a></h3>
                            <div class="text">We are group of teachers who really love childrens and enjoy every mo-</div>
                        </div>
                    </div>
                    
                </div>
                <!--Column / Pull Right-->
                <div class="column pull-right col-md-4 col-sm-6 col-xs-12">
                    <!--Feature Block Two-->
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-paint-palette-and-brush"></span>
                            </div>
                            <h3><a href="features.html">Professional Teaching</a></h3>
                            <div class="text">We are group of teachers who really love childrens and enjoy every mo-</div>
                        </div>
                    </div>
                    
                    <!--Feature Block Two-->
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-graduation-cap"></span>
                            </div>
                            <h3><a href="features.html">Fully Equiped</a></h3>
                            <div class="text">We are group of teachers who really love childrens and enjoy every mo-</div>
                        </div>
                    </div>
                    
                </div>
            
                <div class="image-column col-md-4 col-sm-12 col-xs-12">
                    <figure class="image wow fadeInUp">
                        <img src="/themes/{{ config('theme.active') }}/images/resource/welcome-2.png" alt="" />
                    </figure>
                </div>
                
            </div>
            
        </div>
    </section>
    <!--End Featured Section-->
    
    <!--Join Section-->
    <section class="join-section" style="background-image:url(images/background/pattern-1.png);">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Column-->
            	<div class="column col-md-9 col-sm-12 col-xs-12">
                	<div class="row clearfix">
                    	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        	<h2>Get Involved!</h2>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        	<div class="text">Nothing is more important than your child’s well-being. Join our semnars and training and learn how to keep it.</div>
                        </div>
                    </div>
                </div>
                <!--Column-->
            	<div class="btn-column col-md-3 col-sm-12 col-xs-12">
                	<a href="contact.html" class="theme-btn btn-style-one">Join Now</a>
                </div>
            </div>
        </div>
    </section>
    <!--End Join Section-->
    
    <!--Classes News-->
    <section class="classes-news-section">
    	<div class="auto-container">
        	<!--Sec Title-->
            <div class="sec-title centered">
            	<div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            	<h2>Our Classes</h2>
                <div class="title">Our Weekly Classes</div>
                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching</div>
            </div>
            <div class="row clearfix">
            
            	<!--News Style Two-->
                <div class="news-style-two col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<!--Image Column-->
                        <div class="image-column">
                            <div class="image">
                                <a href="classes-single.html"><img src="/themes/{{ config('theme.active') }}/images/resource/news-4.jpg" alt="" /></a>
                                <span class="category">Games</span>
                                <div class="overlay-layer">
                                	<a href="classes-single.html"><span class="icon flaticon-unlink"></span></a>
                                </div>
                            </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column">
                            <div class="inner">
                                <div class="post-date">Feb 29, 2017</div>
                                <h3><a href="classes-single.html">Alphabet Matching Class</a></h3>
                                <div class="text">We build up the best education nvironment for themselves at most</div>
                                <a href="classes-single.html" class="theme-btn btn-style-one">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--News Style Two-->
                <div class="news-style-two col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<!--Image Column-->
                        <div class="image-column">
                            <div class="image">
                                <a href="classes-single.html"><img src="/themes/{{ config('theme.active') }}/images/resource/news-5.jpg" alt="" /></a>
                                <span class="category">Primary</span>
                                <div class="overlay-layer">
                                	<a href="classes-single.html"><span class="icon flaticon-unlink"></span></a>
                                </div>
                            </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column">
                            <div class="inner">
                                <div class="post-date">Marc 17, 2017</div>
                                <h3><a href="classes-single.html">Letter Math Class</a></h3>
                                <div class="text">We build up the best education nvironment for themselves at most</div>
                                <a href="classes-single.html" class="theme-btn btn-style-one">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--News Style Two-->
                <div class="news-style-two col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<!--Image Column-->
                        <div class="image-column">
                            <div class="image">
                                <a href="classes-single.html"><img src="/themes/{{ config('theme.active') }}/images/resource/news-6.jpg" alt="" /></a>
                                <span class="category">stories</span>
                                <div class="overlay-layer">
                                	<a href="classes-single.html"><span class="icon flaticon-unlink"></span></a>
                                </div>
                            </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column">
                            <div class="inner">
                                <div class="post-date">Apr 01, 2017</div>
                                <h3><a href="classes-single.html">colour Matching Class</a></h3>
                                <div class="text">We build up the best education nvironment for themselves at most</div>
                                <a href="classes-single.html" class="theme-btn btn-style-one">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Classes News-->
    
    <!--Call To Action-->
    <section class="call-to-action" style="background-image:url(images/background/2.jpg);">
    	<div class="auto-container">
        	<div class="row clearfix">
            
            	<!--Content Column-->
            	<div class="content-column pull-right col-md-8 col-sm-12 col-xs-12">
                	<h3><span>Get Enroll, </span>How to Enroll Your Child <br> to a Class?</h3>
                    <div class="text">We are group of teachers who really love childrens and eaching and playing with our students.enjoy every and playing with our students.</div>
                    <a href="contact.html" class="theme-btn btn-style-one">Contact Now</a>
                </div>
                <!--Image Column-->
            	<div class="image-column pull-left col-md-4 col-sm-12 col-xs-12">
                	<figure class="image wow fadeInUp">
                    	<img src="/themes/{{ config('theme.active') }}/images/resource/baby.png" alt="" />
                    </figure>
                </div>
                
            </div>
            
            <!--Course Form-->
            <div class="course-form">
            	<!--Default Form-->
                <div class="default-form">
                    <form method="post">
                        <div class="row clearfix">
                        
                        	<!--Column-->
                        	<div class="column col-md-9 col-sm-12 col-xs-12">
                            	<div class="row clearfix">
                                    <!--Form Group-->
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <select class="custom-select-box">
                                            <option>All Categories</option>
                                            <option>Categories 1</option>
                                            <option>Categories 2</option>
                                            <option>Categories 3</option>
                                        </select>
                                    </div>
                                
                                    <!--Form Group-->
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="username" value="" placeholder="Course Keyword" required>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Column-->
                            <div class="column col-md-3 col-sm-12 col-xs-12">
                            
                            	<!--Form Group-->
                                <div class="form-group text-right">
                                    <button type="submit" class="theme-btn btn-style-one">Search Course</button>
                                </div>
                                
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>
    <!--End Call To Action-->
    
    <!--Teachers Section-->
    <section class="teachers-section no-padding-btm">
    	<div class="auto-container">
        	<!--Sec Title-->
            <div class="sec-title centered">
            	<div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            	<h2>Our Teachers</h2>
                <div class="title">Our Great  Team</div>
                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching</div>
            </div>
            
            <div class="three-item-carousel owl-carousel owl-theme">
            	
                <!--Teacher Block-->
            	<div class="teacher-block">
                	<div class="inner-box">
                    	<div class="image-box">
                        	<img src="/themes/{{ config('theme.active') }}/images/resource/teacher-1.jpg" alt="" />
                        </div>
                        <h3>STEVEN SMITH</h3>
                        <div class="designation">Sports Teacher</div>
                        <div class="text">The ship set ground on the shore of this uncharted a desert isle with that this group would s form a family.</div>
                        <ul class="social-links-one">
                        	<li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                        </ul>
                    </div>
                </div>
                
                <!--Teacher Block-->
            	<div class="teacher-block">
                	<div class="inner-box">
                    	<div class="image-box">
                        	<img src="/themes/{{ config('theme.active') }}/images/resource/teacher-2.jpg" alt="" />
                        </div>
                        <h3>David warner</h3>
                        <div class="designation">Drawing Teacher</div>
                        <div class="text">The ship set ground on the shore of this uncharted a desert isle with that this group would s form a family.</div>
                        <ul class="social-links-one">
                        	<li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                        </ul>
                    </div>
                </div>
                
                <!--Teacher Block-->
            	<div class="teacher-block">
                	<div class="inner-box">
                    	<div class="image-box">
                        	<img src="/themes/{{ config('theme.active') }}/images/resource/teacher-3.jpg" alt="" />
                        </div>
                        <h3>Steve alia</h3>
                        <div class="designation">Language Teacher</div>
                        <div class="text">The ship set ground on the shore of this uncharted a desert isle with that this group would s form a family.</div>
                        <ul class="social-links-one">
                        	<li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                        </ul>
                    </div>
                </div>
                
                <!--Teacher Block-->
            	<div class="teacher-block">
                	<div class="inner-box">
                    	<div class="image-box">
                        	<img src="/themes/{{ config('theme.active') }}/images/resource/teacher-1.jpg" alt="" />
                        </div>
                        <h3>STEVEN SMITH</h3>
                        <div class="designation">Sports Teacher</div>
                        <div class="text">The ship set ground on the shore of this uncharted a desert isle with that this group would s form a family.</div>
                        <ul class="social-links-one">
                        	<li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                        </ul>
                    </div>
                </div>
                
                <!--Teacher Block-->
            	<div class="teacher-block">
                	<div class="inner-box">
                    	<div class="image-box">
                        	<img src="/themes/{{ config('theme.active') }}/images/resource/teacher-2.jpg" alt="" />
                        </div>
                        <h3>David warner</h3>
                        <div class="designation">Drawing Teacher</div>
                        <div class="text">The ship set ground on the shore of this uncharted a desert isle with that this group would s form a family.</div>
                        <ul class="social-links-one">
                        	<li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                        </ul>
                    </div>
                </div>
                
                <!--Teacher Block-->
            	<div class="teacher-block">
                	<div class="inner-box">
                    	<div class="image-box">
                        	<img src="/themes/{{ config('theme.active') }}/images/resource/teacher-3.jpg" alt="" />
                        </div>
                        <h3>Steve alia</h3>
                        <div class="designation">Language Teacher</div>
                        <div class="text">The ship set ground on the shore of this uncharted a desert isle with that this group would s form a family.</div>
                        <ul class="social-links-one">
                        	<li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <!--Background Patten-->
        <div class="background-patten"></div>
    </section>
    <!--End Teachers Section-->
    
    <!--Gallery Section-->
    <section class="gallery-section">
    	<div class="auto-container">
        	<!--Sec Title-->
            <div class="sec-title centered">
            	<div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            	<h2>Our Gallery</h2>
                <div class="title">Our Portfolio</div>
                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching</div>
            </div>
			
            <div class="row clearfix">
            
            	<!--Gallery Item-->
                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box"><img src="/themes/{{ config('theme.active') }}/images/gallery/1.jpg" alt="">
                            <div class="overlay-box">
                                <div class="content">
                                    <a class="lightbox-image" href="/themes/{{ config('theme.active') }}/images/gallery/1.jpg" title="Image Title Here" data-fancybox-group="example-gallery"><span class="icon flaticon-plus"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Gallery Item-->
                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box"><img src="/themes/{{ config('theme.active') }}/images/gallery/2.jpg" alt="">
                            <div class="overlay-box">
                                <div class="content">
                                    <a class="lightbox-image" href="/themes/{{ config('theme.active') }}/images/gallery/2.jpg" title="Image Title Here" data-fancybox-group="example-gallery"><span class="icon flaticon-plus"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Gallery Item-->
                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box"><img src="/themes/{{ config('theme.active') }}/images/gallery/3.jpg" alt="">
                            <div class="overlay-box">
                                <div class="content">
                                    <a class="lightbox-image" href="/themes/{{ config('theme.active') }}/images/gallery/3.jpg" title="Image Title Here" data-fancybox-group="example-gallery"><span class="icon flaticon-plus"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Gallery Item-->
                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box"><img src="/themes/{{ config('theme.active') }}/images/gallery/4.jpg" alt="">
                            <div class="overlay-box">
                                <div class="content">
                                    <a class="lightbox-image" href="/themes/{{ config('theme.active') }}/images/gallery/4.jpg" title="Image Title Here" data-fancybox-group="example-gallery"><span class="icon flaticon-plus"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Gallery Item-->
                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box"><img src="/themes/{{ config('theme.active') }}/images/gallery/5.jpg" alt="">
                            <div class="overlay-box">
                                <div class="content">
                                    <a class="lightbox-image" href="/themes/{{ config('theme.active') }}/images/gallery/5.jpg" title="Image Title Here" data-fancybox-group="example-gallery"><span class="icon flaticon-plus"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Gallery Item-->
                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box"><img src="/themes/{{ config('theme.active') }}/images/gallery/6.jpg" alt="">
                            <div class="overlay-box">
                                <div class="content">
                                    <a class="lightbox-image" href="/themes/{{ config('theme.active') }}/images/gallery/6.jpg" title="Image Title Here" data-fancybox-group="example-gallery"><span class="icon flaticon-plus"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="text-center">
            	<a href="gallery.html" class="theme-btn btn-style-one">View All</a>
            </div>
            
        </div>
    </section>
    <!--End Gallery Section-->
    
    <!--Testimonial Section-->
    <section class="testimonial-section" style="background-image:url(images/background/pattern-1.png);">
    	<div class="auto-container">
        	
            <!--Client Testimonial Carousel-->
            <div class="client-testimonial-carousel owl-carousel owl-theme">
            
                <!--Testimonial Block Two-->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                    	<div class="quote-icon"><span class="icon flaticon-left-quote"></span></div>
                        <div class="text">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...</div>
                    </div>
                </div>
                
                <!--Testimonial Block Two-->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                    	<div class="quote-icon"><span class="icon flaticon-left-quote"></span></div>
                        <div class="text">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...</div>
                    </div>
                </div>
                
                <!--Testimonial Block Two-->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                    	<div class="quote-icon"><span class="icon flaticon-left-quote"></span></div>
                        <div class="text">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...</div>
                    </div>
                </div>
                
                <!--Testimonial Block Two-->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                    	<div class="quote-icon"><span class="icon flaticon-left-quote"></span></div>
                        <div class="text">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...</div>
                    </div>
                </div>
                
                <!--Testimonial Block Two-->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                    	<div class="quote-icon"><span class="icon flaticon-left-quote"></span></div>
                        <div class="text">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...</div>
                    </div>
                </div>
                
                <!--Testimonial Block Two-->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                    	<div class="quote-icon"><span class="icon flaticon-left-quote"></span></div>
                        <div class="text">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...architecto beatae vitae...Sed ut perspiciatis, unde  voluptatem...</div>
                    </div>
                </div>
                
            </div>
            
            <!--Product Thumbs Carousel-->
            <div class="client-thumb-outer">
                <div class="client-thumbs-carousel owl-carousel owl-theme">
                    <div class="thumb-item">
                    	<figure class="thumb-box"><img src="/themes/{{ config('theme.active') }}/images/resource/author-1.jpg" alt=""></figure>
                        <div class="thumb-content">
                        	<h3>Kristen stewart</h3>
	                        <div class="designation">Parents</div>
                        </div>
                    </div>
                    <div class="thumb-item">
                    	<figure class="thumb-box"><img src="/themes/{{ config('theme.active') }}/images/resource/author-2.jpg" alt=""></figure>
                        <div class="thumb-content">
                        	<h3>Kristen stewart</h3>
	                        <div class="designation">Parents</div>
                        </div>
                    </div>
                    <div class="thumb-item">
                    	<figure class="thumb-box"><img src="/themes/{{ config('theme.active') }}/images/resource/author-3.jpg" alt=""></figure>
                        <div class="thumb-content">
                        	<h3>Kristen stewart</h3>
	                        <div class="designation">Parents</div>
                        </div>
                    </div>
                    <div class="thumb-item">
                    	<figure class="thumb-box"><img src="/themes/{{ config('theme.active') }}/images/resource/author-1.jpg" alt=""></figure>
                        <div class="thumb-content">
                        	<h3>Kristen stewart</h3>
	                        <div class="designation">Parents</div>
                        </div>
                    </div>
                    <div class="thumb-item">
                    	<figure class="thumb-box"><img src="/themes/{{ config('theme.active') }}/images/resource/author-2.jpg" alt=""></figure>
                        <div class="thumb-content">
                        	<h3>Kristen stewart</h3>
	                        <div class="designation">Parents</div>
                        </div>
                    </div>
                    <div class="thumb-item">
                    	<figure class="thumb-box"><img src="/themes/{{ config('theme.active') }}/images/resource/author-3.jpg" alt=""></figure>
                        <div class="thumb-content">
                        	<h3>Kristen stewart</h3>
	                        <div class="designation">Parents</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!--End Testimonial Section-->
    
    <!--Blog Section-->
    <section class="blog-section">
    	<div class="auto-container">
        	<!--Sec Title-->
            <div class="sec-title centered">
            	<div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            	<h2>blog & Activities</h2>
                <div class="title">Time Line & Ativities</div>
                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching</div>
            </div>
            <div class="row clearfix">
            	<!--Blog Column-->
            	<div class="blog-column col-md-6 col-sm-12 col-xs-12">
                	<!--News Style Three-->
                    <div class="news-style-three">
                    	<div class="row clearfix">
                        	<!--Image Column-->
                        	<div class="image-column col-md-4 col-sm-4 col-xs-12">
                            	<div class="image">
                                	<div class="date-box">4<span>Apr</span></div>
                                	<a href="blog-single.html"><img src="/themes/{{ config('theme.active') }}/images/resource/news-7.jpg" alt="" /></a>
                                </div>
                            </div>
                            <!--Content Column-->
                            <div class="content-column col-md-8 col-sm-8 col-xs-12">
                            	<div class="content-inner">
                                    <h3><a href="blog-single.html">MUSIC ACTIVITIES</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="blog-single.html"><span class="icon fa fa-user"></span>Adam Rose</a></li>
                                        <li><a href="blog-single.html"><span class="icon fa fa-commenting-o"></span> 7 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="text">Nulla ac condimentum mauris, ac laoreet enim. Pellentesque nunc nibh, lobortis ut vestiNulla ac condimentum mauris, ac  enirtis ut vesti...</div>
                            </div>
                        </div>
                    </div>
                
                	<!--News Style Three-->
                    <div class="news-style-three">
                    	<div class="row clearfix">
                        	<!--Image Column-->
                        	<div class="image-column col-md-4 col-sm-4 col-xs-12">
                            	<div class="image">
                                	<div class="date-box">3<span>Apr</span></div>
                                	<a href="blog-single.html"><img src="/themes/{{ config('theme.active') }}/images/resource/news-8.jpg" alt="" /></a>
                                </div>
                            </div>
                            <!--Content Column-->
                            <div class="content-column col-md-8 col-sm-8 col-xs-12">
                            	<div class="content-inner">
                                    <h3><a href="blog-single.html">SCHOOL ANNIVERSARY</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="blog-single.html"><span class="icon fa fa-user"></span>Adam Rose</a></li>
                                        <li><a href="blog-single.html"><span class="icon fa fa-commenting-o"></span> 5 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="text">Nulla ac condimentum mauris, ac laoreet enim. Pellentesque nunc nibh, lobortis ut vestiNulla ac condimentum mauris, ac  enirtis ut vesti...</div>
                            </div>
                        </div>
                    </div>
                
                	<!--News Style Three-->
                    <div class="news-style-three">
                    	<div class="row clearfix">
                        	<!--Image Column-->
                        	<div class="image-column col-md-4 col-sm-4 col-xs-12">
                            	<div class="image">
                                	<div class="date-box">1<span>Apr</span></div>
                                	<a href="blog-single.html"><img src="/themes/{{ config('theme.active') }}/images/resource/news-9.jpg" alt="" /></a>
                                </div>
                            </div>
                            <!--Content Column-->
                            <div class="content-column col-md-8 col-sm-8 col-xs-12">
                            	<div class="content-inner">
                                    <h3><a href="blog-single.html">BIO SPECIAL</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="blog-single.html"><span class="icon fa fa-user"></span>Adam Rose</a></li>
                                        <li><a href="blog-single.html"><span class="icon fa fa-commenting-o"></span> 4 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="text">Nulla ac condimentum mauris, ac laoreet enim. Pellentesque nunc nibh, lobortis ut vestiNulla ac condimentum mauris, ac  enirtis ut vesti...</div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <!--Tab Column-->
                <div class="tab-column col-md-6 col-sm-12 col-xs-12">
                    
                    <!--Product Info Tabs-->
                    <div class="product-info-tabs">
                        <!--Product Tabs-->
                        <div class="prod-tabs tabs-box">
                        
                            <!--Tab Btns-->
                            <ul class="tab-btns tab-buttons clearfix">
                                <li data-tab="#education" class="tab-btn active-btn">Education</li>
                                <li data-tab="#activity" class="tab-btn">Actvities</li>
                                <li data-tab="#painting" class="tab-btn">Painting</li>
                                <li data-tab="#games" class="tab-btn">Games</li>
                            </ul>
                            
                            <!--Tabs Container-->
                            <div class="tabs-content">
                                
                                <!--Tab / Active Tab-->
                                <div class="tab active-tab" id="education">
                                    <div class="content">
                                    	<!--Tab Boxed-->
                                        <div class="tab-boxed">
                                        	<div class="inner-box">
                                            	<div class="image">
                                                	<img src="/themes/{{ config('theme.active') }}/images/resource/tab-1.jpg" alt="" />
                                                </div>
                                                <h3>Let the Learning Begin</h3>
                                                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching and playing  with as different Education Major. </div>
                                            </div>
                                        </div>
                                        
                                        <!--Tab Boxed-->
                                        <div class="tab-boxed">
                                        	<div class="inner-box">
                                            	<div class="image">
                                                	<img src="/themes/{{ config('theme.active') }}/images/resource/tab-2.jpg" alt="" />
                                                </div>
                                                <h3>Special Cources programes</h3>
                                                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching and playing  with as different Education Major. </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!--Tab-->
                                <div class="tab" id="activity">
                                    <div class="content">
                                        
                                        <!--Tab Boxed-->
                                        <div class="tab-boxed">
                                        	<div class="inner-box">
                                            	<div class="image">
                                                	<img src="/themes/{{ config('theme.active') }}/images/resource/tab-2.jpg" alt="" />
                                                </div>
                                                <h3>Special Cources programes</h3>
                                                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching and playing  with as different Education Major. </div>
                                            </div>
                                        </div>
                                        
                                        <!--Tab Boxed-->
                                        <div class="tab-boxed">
                                        	<div class="inner-box">
                                            	<div class="image">
                                                	<img src="/themes/{{ config('theme.active') }}/images/resource/tab-1.jpg" alt="" />
                                                </div>
                                                <h3>Let the Learning Begin</h3>
                                                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching and playing  with as different Education Major. </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!--Tab-->
                                <div class="tab" id="painting">
                                    <div class="content">
                                        
                                        <!--Tab Boxed-->
                                        <div class="tab-boxed">
                                        	<div class="inner-box">
                                            	<div class="image">
                                                	<img src="/themes/{{ config('theme.active') }}/images/resource/tab-1.jpg" alt="" />
                                                </div>
                                                <h3>Let the Learning Begin</h3>
                                                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching and playing  with as different Education Major. </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!--Tab-->
                                <div class="tab" id="games">
                                    <div class="content">
                                        
                                        <!--Tab Boxed-->
                                        <div class="tab-boxed">
                                        	<div class="inner-box">
                                            	<div class="image">
                                                	<img src="/themes/{{ config('theme.active') }}/images/resource/tab-2.jpg" alt="" />
                                                </div>
                                                <h3>Special Cources programes</h3>
                                                <div class="text">We are group of teachers who really love childrens and enjoy every moment of teaching and playing  with as different Education Major. </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <!--End Product Info Tabs-->
                    
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Section-->
    
    
    <!--Involved Section-->
    <section class="involved-section">
    	<div class="auto-container">
        	<div class="involved-inner wow fadeInUp" style="background-image:url(images/background/pattern-3.png);">
            	<div class="row clearfix">
                	<div class="column col-md-8 col-sm-12 col-xs-12">
                    	<h2>See Our Kindergarten Special Features & Activities!</h2>
                    </div>
                    <div class="btn-column col-md-4 col-sm-12 col-xs-12">
                    	<a href="#" class="theme-btn btn-style-one">Get Involved</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Involved Section-->

    
    <!--Main Footer-->
    <footer class="main-footer" style="background-image:url(images/background/pattern-2.png);">
    	<div class="auto-container">
        	<!--widgets section-->
            <div class="widgets-section">
                <div class="row clearfix">
                
                	<!--Big Column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                        	<!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            	<div class="footer-widget logo-widget">
                                	<div class="footer-logo">
                                    	<a href="index.html"><img src="/themes/{{ config('theme.active') }}/images/logo-2.png" alt="" /></a>
                                    </div>
									<div class="widget-content">
                                    	<div class="text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officiaproi-dent, sunt in culpa qui officia dese deserunt...</div>
                                        <ul class="social-links-two">
                                        	<li class="facebook"><a href="#"><span class="fa fa-facebook"></span></a></li>
                                            <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li class="google-plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                            <li class="linkedin"><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        </ul>
									</div>
								</div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            	<!--Links Widget-->
                                <div class="footer-widget links-widget">
                                	<div class="footer-title">
                                    	<h2>Quick Links</h2>
                                    </div>
                                	<div class="widget-content">
                                    	<ul class="list">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Classes</a></li>
                                            <li><a href="#">Teachers</a></li>
                                            <li><a href="#">Latest News</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
									</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--Big Column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                        
                        	<!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            	<!--Links Widget-->
                                <div class="footer-widget links-widget">
                                	<div class="footer-title">
                                    	<h2>Categories</h2>
                                    </div>
                                	<div class="widget-content">
                                    	<ul class="list">
                                            <li><a href="#">Painting</a></li>
                                            <li><a href="#">Drawing</a></li>
                                            <li><a href="#">Sports, Games</a></li>
                                            <li><a href="#">Life Science</a></li>
                                            <li><a href="#">Activities & Events </a></li>
                                        </ul>
									</div>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            	
                                <div class="footer-widget subscribe-widget">
                                    <div class="footer-title">
                                    	<h2>News letter</h2>
                                    </div>
                                    <div class="widget-content">
                                        <div class="newsletter-form">
                                            <form method="post" action="contact.html">
                                                <div class="form-group">
                                                    <input type="text" name="name" value="" placeholder="Name *" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" value="" placeholder="Email Id" required="">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="theme-btn btn-style-one">SUBSCRIBE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!--Footer Bottom-->
            <div class="footer-bottom">
            	<div class="row clearfix">
                	<div class="column col-md-6 col-sm-6 col-xs-12">
                    	<div class="copyright">&copy; Copyrights 2017 Saratov. All Rights Reserved</div>
                    </div>
                    <div class="column col-md-6 col-sm-6 col-xs-12">
                    	<div class="cards"><img src="/themes/{{ config('theme.active') }}/images/icons/visa-cards.png" alt="" /></div>
                    </div>
                </div>
            </div>
            
        </div>
    </footer>
    
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