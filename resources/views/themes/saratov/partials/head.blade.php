<!-- Main Header-->
<header class="main-header">

    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container clearfix">
            <!--Top Left-->
            <div class="top-left pull-left">
                <ul class="links-nav clearfix">
                    <li><span class="icon fa fa-envelope-o"></span><a href="mailto:{{$app['school']->email}}">{{$app['school']->email}}</a></li>
                    <li><span class="icon fa fa-phone"></span><a href="tel:{{$app['school']->phone}}">{{$app['school']->phone}}</a></li>
                </ul>
            </div>

            <!--Top Right-->
            <div class="top-right pull-right">
                <ul class="links-nav clearfix">
                    <li><span class="icon fa fa-map-marker"></span>{{$app['school']->address}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Header Top End -->

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">

            <div class="logo-outer">
                <div class="logo"><a href="/"><img src="/themes/{{ config('theme.active') }}/images/logo.png" alt="{{$app['school']->name}}" title="{{$app['school']->name}}"></a></div>
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
                        <ul class="navigation clearfix">
                            <?php
                            foreach ($app['navigations'] as $navigation)
                            {
                                if(count($navigation['children'])==0)
                                {
                                ?>
                                <li>
                                    <a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a>
                                </li>
                                <?php
                                }
                                else{
                                ?>
                                <li class="dropdown">
                                    <a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a>
                                    <ul>
                                        <?php
                                        foreach($navigation['children'] as $child)
                                        {
                                        ?>
                                        <li><a href="{{getRoutingUrl($child->routing_id)}}">{{$child->name}}</a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                                }
                            }
                            ?>
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
                                    <form method="get" action="/tin-tuc">
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
                <a href="/" class="img-responsive"><img src="/themes/{{ config('theme.active') }}/images/logo-small.png" alt="{{$app['school']->name}}" title="{{$app['school']->name}}"></a>
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
                            <?php
                            foreach ($app['navigations'] as $navigation)
                            {
                                if(count($navigation['children'])==0)
                                {
                                ?>
                                <li>
                                    <a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a>
                                </li>
                                <?php
                                }
                                else{
                                ?>
                                <li class="dropdown">
                                    <a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a>
                                    <ul>
                                        <?php
                                        foreach($navigation['children'] as $child)
                                        {
                                        ?>
                                        <li><a href="{{getRoutingUrl($child->routing_id)}}">{{$child->name}}</a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div>
    <!--End Sticky Header-->

</header>
<!--End Main Header -->
