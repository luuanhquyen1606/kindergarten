<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home One || Kidearn || HTML Template For Kindergarten & Baby Care</title>
  <!-- favicons Icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/themes/{{ config('theme.active') }}/assets/images/favicons/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/themes/{{ config('theme.active') }}/assets/images/favicons/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/themes/{{ config('theme.active') }}/assets/images/favicons/favicon-16x16.png" />
  <link rel="manifest" href="/themes/{{ config('theme.active') }}/assets/images/favicons/site.webmanifest" />
  <meta name="description" content="Kidearn is a modern HTML Template for kindergarten, preschool, nursery and primary schools. The template perfectly fits for child care, babysitting, education and children related schools, websites and businesses." />

  <!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700&family=Fredoka:wght@700&family=Schoolbell&display=swap"
  rel="stylesheet">

<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/bootstrap-select/bootstrap-select.min.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/animate/animate.min.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/fontawesome/css/all.min.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/jquery-ui/jquery-ui.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/jarallax/jarallax.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/nouislider/nouislider.min.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/nouislider/nouislider.pips.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/tiny-slider/tiny-slider.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/kidearn-icons/style.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/owl-carousel/css/owl.carousel.min.css" />
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

<!-- template styles -->
<link rel="stylesheet" href="/themes/{{ config('theme.active') }}/assets/css/kidearn.css" />
<link rel="stylesheet" href="/themes/assets/css/custom.css">
</head>

<body class="">
@include('themes.common.partials.head') 
  <div class="custom-cursor__cursor"></div>
  <div class="custom-cursor__cursor-two"></div>

  <div class="preloader">
    <div class="preloader__image" style="background-image: url(/themes/{{ config('theme.active') }}/assets/images/loader.png);"></div>
  </div>
  <!-- /.preloader -->
  <div class="page-wrapper">
<div class="topbar-one">
    <div class="container-fluid">
        <div class="topbar-one__inner">
            <div class="topbar-one__left">
                <div class="topbar-one__social">
                    <a href="https://twitter.com">
	<i class="fab fa-twitter" aria-hidden="true"></i>
	<span class="sr-only">Twitter</span>
</a>
<a href="https://facebook.com">
	<i class="fab fa-facebook" aria-hidden="true"></i>
	<span class="sr-only">Facebook</span>
</a>
<a href="https://pinterest.com">
	<i class="fab fa-pinterest-p" aria-hidden="true"></i>
	<span class="sr-only">Pinterest</span>
</a>
<a href="https://instagram.com">
	<i class="fab fa-instagram" aria-hidden="true"></i>
	<span class="sr-only">Instagram</span>
</a>
                </div><!-- /.topbar-one__social -->
                <p class="topbar-one__text">Mon to Sat: 8.00 am - 7.00 pm</p><!-- /.topbar-one__text -->
            </div><!-- /.topbar-one__left -->
            <ul class="list-unstyled topbar-one__info">
                <li class="topbar-one__info__item">
                    <i class="fas fa-map-marker topbar-one__info__icon"></i>
                    <a href="#">30 Commercial Road Fratton, Australia </a>
                </li>
                <li class="topbar-one__info__item">
                    <i class="fas fa-envelope topbar-one__info__icon"></i>
                    <a href="mailto:kidearn@envato.com">kidearn@envato.com</a>
                </li>
            </ul><!-- /.list-unstyled topbar-one__info -->
        </div><!-- /.topbar-one__inner -->
    </div><!-- /.container-fluid -->
</div><!-- /.topbar-one -->
@include('themes.' . config('theme.active') . '.partials.head')

@yield('content')





<footer class="main-footer">
	<div class="main-footer__bg"></div>
	<!-- /.main-footer__bg -->
	<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/footer-s-1-1.png" class="main-footer__shape-1" alt="kidearn">
	<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/footer-s-1-2.png" class="main-footer__shape-2" alt="kidearn">
	<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/footer-s-1-3.png" class="main-footer__shape-3" alt="kidearn">
	<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/footer-s-1-4.png" class="main-footer__shape-4" alt="kidearn">
	<div class="main-footer__top">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4">
					<div class="footer-widget footer-widget--about">
						<a href="index.html" class="footer-widget__logo">
							<img src="/themes/{{ config('theme.active') }}/assets/images/logo-light.png" width="160" alt="Kidearn HTML Template">
						</a>
						<ul class="list-unstyled footer-widget__info">
							<li>
								<i class="icon-location2 footer-widget__info__icon"></i>
								<a href="#">6391 Elgin St. Celina, Delaware 10299</a></li>
							<li>
								<i class="icon-call footer-widget__info__icon"></i>
								<a href="tel:3035550105">(303) 555-0105</a></li>
							<li>
								<i class="icon-email1 footer-widget__info__icon"></i>
								<a href="mailto:kidearn@envato.com">kidearn@envato.com</a></li>
						</ul><!-- /.list-unstyled -->
						<div class="footer-widget__social">
							<a href="https://twitter.com">
	<i class="fab fa-twitter" aria-hidden="true"></i>
	<span class="sr-only">Twitter</span>
</a>
<a href="https://facebook.com">
	<i class="fab fa-facebook" aria-hidden="true"></i>
	<span class="sr-only">Facebook</span>
</a>
<a href="https://pinterest.com">
	<i class="fab fa-pinterest-p" aria-hidden="true"></i>
	<span class="sr-only">Pinterest</span>
</a>
<a href="https://instagram.com">
	<i class="fab fa-instagram" aria-hidden="true"></i>
	<span class="sr-only">Instagram</span>
</a>
						</div><!-- /.footer-widget__social -->
					</div><!-- /.footer-widget -->
				</div><!-- /.col-md-6 -->
				<div class="col-md-6 col-xl-2">
					<div class="footer-widget footer-widget--links">
						<h2 class="footer-widget__title">Links</h2><!-- /.footer-widget__title -->
						<ul class="list-unstyled footer-widget__links">
							<li><a href="about.html">Admissions</a></li>
							<li><a href="programs.html">Programs</a></li>
							<li><a href="programs-d-discipline.html">Outdoor Games</a></li>
							<li><a href="programs-d-preschool.html">Online Classes</a></li>
							<li><a href="contact.html">Appointment</a></li>
						</ul><!-- /.list-unstyled footer-widget__links -->
					</div><!-- /.footer-widget -->
				</div><!-- /.col-md-6 -->
				<div class="col-md-6 col-xl-2">
					<div class="footer-widget footer-widget--links-two">
						<h2 class="footer-widget__title">Explore</h2><!-- /.footer-widget__title -->
						<ul class="list-unstyled footer-widget__links">
							<li><a href="about.html">About</a></li>
							<li><a href="blog-grid.html">Our News</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="faq.html">Help</a></li>
						</ul><!-- /.list-unstyled footer-widget__links -->
					</div><!-- /.footer-widget -->
				</div><!-- /.col-md-6 -->
				<div class="col-md-6 col-xl-4">
					<div class="footer-widget footer-widget--gallery">
						<h2 class="footer-widget__title">Gallery</h2><!-- /.footer-widget__title -->
						<ul class="list-unstyled footer-widget__gallery">
							<li>
								<a class="img-popup" href="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-1.png">
									<img src="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-1.png" alt="footer gallery">
								</a>
							</li>
							<li>
								<a class="img-popup" href="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-2.png">
									<img src="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-2.png" alt="footer gallery">
								</a>
							</li>
							<li>
								<a class="img-popup" href="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-3.png">
									<img src="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-3.png" alt="footer gallery">
								</a>
							</li>
							<li>
								<a class="img-popup" href="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-4.png">
									<img src="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-4.png" alt="footer gallery">
								</a>
							</li>
							<li>
								<a class="img-popup" href="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-5.png">
									<img src="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-5.png" alt="footer gallery">
								</a>
							</li>
							<li>
								<a class="img-popup" href="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-6.png">
									<img src="/themes/{{ config('theme.active') }}/assets/images/resources/footer-gallery-6.png" alt="footer gallery">
								</a>
							</li>
						</ul><!-- /.list-unstyled footer-widget__gallery -->

					</div><!-- /.footer-widget -->
				</div><!-- /.col-md-6 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.main-footer__top -->
	<div class="main-footer__bottom">
		<div class="container">
			<div class="main-footer__bottom__inner">
				<p class="main-footer__copyright">
					&copy; Copyright <span class="dynamic-year"></span> by Kidearn HTML Template.
				</p>
			</div><!-- /.main-footer__inner -->
		</div><!-- /.container -->
	</div><!-- /.main-footer__bottom -->
</footer><!-- /.main-footer -->

</div><!-- /.page-wrapper -->



<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="index.html" aria-label="logo image"><img src="/themes/{{ config('theme.active') }}/assets/images/logo-light.png" width="155"
                    alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:needhelp@kidearn.com">needhelp@kidearn.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__social">
            <a href="https://twitter.com">
	<i class="fab fa-twitter" aria-hidden="true"></i>
	<span class="sr-only">Twitter</span>
</a>
<a href="https://facebook.com">
	<i class="fab fa-facebook" aria-hidden="true"></i>
	<span class="sr-only">Facebook</span>
</a>
<a href="https://pinterest.com">
	<i class="fab fa-pinterest-p" aria-hidden="true"></i>
	<span class="sr-only">Pinterest</span>
</a>
<a href="https://instagram.com">
	<i class="fab fa-instagram" aria-hidden="true"></i>
	<span class="sr-only">Instagram</span>
</a>
        </div><!-- /.mobile-nav__social -->
    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->
<div class="search-popup">
	<div class="search-popup__overlay search-toggler"></div>
	<!-- /.search-popup__overlay -->
	<div class="search-popup__content">
		<form role="search" method="get" class="search-popup__form" action="#">
			<input type="text" id="search" placeholder="Search Here..." />
			<button type="submit" aria-label="search submit" class="kidearn-btn kidearn-btn--base">
				<span><i class="icon-search"></i></span>
			</button>
		</form>
	</div>
	<!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="#" class="scroll-top">
    <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</a>


<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery/jquery-3.7.0.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jarallax/jarallax.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/nouislider/nouislider.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/tiny-slider/tiny-slider.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/wnumb/wNumb.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/wow/wow.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/tilt/tilt.jquery.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/simpleParallax/simpleParallax.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/imagesloaded/imagesloaded.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/isotope/isotope.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/countdown/countdown.min.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery-circleType/jquery.circleType.js"></script>
<script src="/themes/{{ config('theme.active') }}/assets/vendors/jquery-lettering/jquery.lettering.min.js"></script>
<!-- template js -->
<script src="/themes/{{ config('theme.active') }}/assets/js/kidearn.js"></script>
</body>

</html>