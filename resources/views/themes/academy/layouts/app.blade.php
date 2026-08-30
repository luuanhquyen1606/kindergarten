<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>KidsAcademy</title>
  <link href="/themes/{{ config('theme.active') }}/images/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Bootstrap -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font-awesome -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/font-awesome.min.css" rel="stylesheet">

  <!-- Flaticon -->
  <link href="/themes/{{ config('theme.active') }}/assets/flaticon/flaticon.css" rel="stylesheet">

  <!-- lightcase -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/lightcase.css" rel="stylesheet">

  <!-- Swiper -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/swiper.min.css" rel="stylesheet">

  <!-- quick-view -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/quick-view.css" rel="stylesheet">

  <!-- nstSlider -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/jquery.nstSlider.css" rel="stylesheet">

  <!-- flexslider -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/flexslider.css" rel="stylesheet">

  <!-- Style -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/rtl.css" rel="stylesheet">

  <!-- Style -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/style.css" rel="stylesheet">

  <!-- Responsive -->
  <link href="/themes/{{ config('theme.active') }}/assets/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" href="/themes/assets/css/custom.css">

</head>

<body id="scroll-top" class="home-3">
	@include('themes.common.partials.head')  
  <!-- Preloader start here -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- Preloader end here -->


  <!-- mobile menu start here -->
  <div class="mobile-menu-area">
    <div class="logo-area">
      <a class="logo" href="index.html"><img src="/themes/{{ config('theme.active') }}/images/logo.png" alt="logo" class="img-responsive"></a>
      <button type="button" class="navbar-toggle collapsed d-md-none" data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="mobile-menu">
      <ul class="m-menu">
        <li class="dropdown-submenu">
          <a href="#">Home</a>
          <ul class="mobile-submenu">
            <li><a href="index.html">home style 1</a></li>
            <li><a href="index-2.html">home style 2</a></li>
            <li><a href="index-3.html">home style 3</a></li>
            <li><a href="one-page.html">home Onepage</a></li>
          </ul>
        </li>
        <li class="dropdown-submenu">
          <a href="#">About</a>
          <ul class="mobile-submenu">
            <li><a href="about.html">About Style 1</a></li>
            <li><a href="about-2.html">About Style 2</a></li>
          </ul>
        </li>
        <li class="dropdown-submenu">
          <a href="#">Classes</a>
          <ul class="mobile-submenu">
            <li><a href="classes.html">Classes</a></li>
            <li><a href="class-single.html">Class Single</a></li>
          </ul>
        </li>

        <li class="dropdown-submenu">
          <a href="#">Teachers</a>
          <ul class="mobile-submenu">
            <li><a href="teachers.html">Teacher</a></li>
            <li><a href="teacher-detail.html">Teacher Details</a></li>
          </ul>
        </li>

        <li class="dropdown-submenu">
          <a href="#">Pages</a>
          <ul class="mobile-submenu">
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="gallery-2.html">Gallery 2</a></li>
            <li><a href="event.html">Event</a></li>
            <li><a href="event-single.html">Event Single</a></li>
            <li><a href="404.html">404</a></li>
          </ul>
        </li>

        <li class="dropdown-submenu">
          <a href="#">Blog</a>
          <ul class="mobile-submenu">
            <li><a href="blog.html">Blog Page</a></li>
            <li><a href="single.html">Blog Single</a></li>
          </ul>
        </li>

        <li class="dropdown-submenu">
          <a href="#">Shop</a>
          <ul class="mobile-submenu">
            <li><a href="product.html">Product</a></li>
            <li><a href="product-details.html">Product Details</a></li>
            <li><a href="shop-cart.html">Product Cart</a></li>
          </ul>
        </li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </div>
  </div>
  <!-- mobile menu ending here -->


@include('themes.' . config('theme.active') . '.partials.head')
 @yield('content')
 
  <!-- header End here -->



  <!-- Footer Start here -->
  <footer>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="footer-item">
              <div class="title"><img src="/themes/{{ config('theme.active') }}/images/logo.png" alt="logo" class="img-responsive"></div>
              <div class="footer-about">
                <p>Distily enable team driven services through extensive is a relatonships platforms with interactive
                  content. Enthusiastically scale effective.</p>
                <ul>
                  <li><span><i class="fa fa-home" aria-hidden="true"></i></span> New Chokoya Road, USA.</li>
                  <li><span><i class="fa fa-phone" aria-hidden="true"></i></span> +8801 923 970 212, 0125897</li>
                  <li><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> Contact@admin LabArtisan</li>
                  <li><span><i class="fa fa-globe" aria-hidden="true"></i></span> Email@admin LabArtisan</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="footer-item">
              <h4 class="title">Latest News</h4>
              <ul class="footer-post">
                <li>
                  <div class="image">
                    <a href="single.html"><img src="/themes/{{ config('theme.active') }}/images/blog/footer_post_01.jpg" alt="post image"
                        class="img-responsive"></a>
                  </div>
                  <div class="content">
                    <p><a href="single.html">Corem psum dolor the amectetuer adipiscing...</a></p>
                    <span>04 February 2021</span>
                  </div>
                </li>
                <li>
                  <div class="image">
                    <a href="single.html"><img src="/themes/{{ config('theme.active') }}/images/blog/footer_post_02.jpg" alt="post image"
                        class="img-responsive"></a>
                  </div>
                  <div class="content">
                    <p><a href="single.html">Corem psum dolor the amectetuer adipiscing...</a></p>
                    <span>28 January 2021</span>
                  </div>
                </li>
                <li>
                  <div class="image">
                    <a href="single.html"><img src="/themes/{{ config('theme.active') }}/images/blog/footer_post_03.jpg" alt="post image"
                        class="img-responsive"></a>
                  </div>
                  <div class="content">
                    <p><a href="single.html">Duis autem iriure dolor in hendrerit esse...</a></p>
                    <span>03 January 2021</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="footer-item">
              <h4 class="title">Twitter Widget</h4>
              <ul class="twitter-post">
                <li>
                  <div class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                  <div class="content">
                    <p>Raritas etiam processus them dynamicus sequitur mutatem education theme</p>
                    <span>23 seconds ago</span>
                  </div>
                </li>
                <li>
                  <div class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                  <div class="content">
                    <p>Duis autem veleum iriu dolor hendrerit in vulputate velit</p>
                    <span>8 seconds ago</span>
                  </div>
                </li>
                <li>
                  <div class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                  <div class="content">
                    <p>@frankdoe amber tempor cum soluta nobis eleifend</p>
                    <span>2 years ago</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="footer-item">
              <h4 class="title">Recent Photos</h4>
              <ul class="photos">
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_01.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_02.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_03.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_04.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_05.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_06.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_07.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_08.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
                <li><a href="#"><img src="/themes/{{ config('theme.active') }}/images/sidebar/gallery_09.jpg" alt="gallery image" class="img-responsive"></a>
                </li>
              </ul>
            </div>
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- footer top -->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-xs-12">
            <p>&copy; 2021. Designed By <a href="https://themeforest.net/user/labartisan">LabArtisan</a></p>
          </div>
          <div class="col-lg-6 col-xs-12">
            <ul class="social-default">
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- footer bottom -->
  </footer>
  <a class="page-scroll scroll-top" href="#scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
  <!-- Footer End here -->


  <!-- jquery -->
  <script src="/themes/{{ config('theme.active') }}/assets/js/jquery-3.7.1.min.js"></script>

  <!-- Bootstrap -->
  <script src="/themes/{{ config('theme.active') }}/assets/js/bootstrap.bundle.min.js"></script>

  <!-- Isotope -->
  <script src="/themes/{{ config('theme.active') }}/assets/js/isotope.min.js"></script>

  <!-- lightcase -->
  <script src="/themes/{{ config('theme.active') }}/assets/js/lightcase.js"></script>

  <!-- counterup -->
  <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.waypoints.min.js"></script>
  <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.counterup.min.js"></script>

  <!-- Swiper -->
  <script src="/themes/{{ config('theme.active') }}/assets/js/swiper.jquery.min.js"></script>

  <!--progress-->
  <script src="/themes/{{ config('theme.active') }}/assets/js/circle-progress.min.js"></script>

  <!--velocity-->
  <script src="/themes/{{ config('theme.active') }}/assets/js/velocity.min.js"></script>

  <!--quick-view-->
  <script src="/themes/{{ config('theme.active') }}/assets/js/quick-view.js"></script>

  <!--nstSlider-->
  <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.nstSlider.js"></script>

  <!--flexslider-->
  <script src="/themes/{{ config('theme.active') }}/assets/js/flexslider-min.js"></script>

  <!--easing-->
  <script src="/themes/{{ config('theme.active') }}/assets/js/jquery.easing.min.js"></script>

  <!--coundown-->
  <script src="/themes/{{ config('theme.active') }}/assets/js/coundown.js"></script>

  <!-- custom -->
  <script src="/themes/{{ config('theme.active') }}/assets/js/custom.js"></script>


</body>

</html>