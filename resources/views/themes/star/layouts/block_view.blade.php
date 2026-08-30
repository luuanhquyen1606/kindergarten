<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $app['school']->name }}</title>

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

<link rel="stylesheet" href="/themes/assets/css/custom.css">
</head>

<body>
    <div class="boxed_wrapper" style="overflow-x:hidden">

       
        <!-- Header Top End -->
        


        @yield('content')
       

       
		
		
		

		

        

        
		
		
		

        
        
		
		 

      


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