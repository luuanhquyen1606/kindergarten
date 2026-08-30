<!--Main Footer-->
<footer class="main-footer" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/pattern-2.png);">
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
                                    <a href="/"><img src="/themes/{{ config('theme.active') }}/images/logo-2.png" alt="{{$app['school']->name}}" /></a>
                                </div>
                                <div class="widget-content">
                                    <div class="text">{{$app['school']->name}} - {{$app['school']->slogan}}</div>
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
                                        <?php
                                        foreach ($app['navigations'] as $navigation)
                                        {
                                        ?>
                                        <li><a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a></li>
                                        <?php
                                        }
                                        ?>
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
                                    <h2>Contact</h2>
                                </div>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li>{{$app['school']->address}}</li>
                                        <li><a href="tel:{{$app['school']->phone}}">{{$app['school']->phone}}</a></li>
                                        <li><a href="mailto:{{$app['school']->email}}">{{$app['school']->email}}</a></li>
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
                                        <form method="post" action="/lien-he">
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
                    <div class="copyright">&copy; All Copyright {{ date('Y') }} by <a href="/">{{$app['school']->name}}</a></div>
                </div>
            </div>
        </div>

    </div>
</footer>
