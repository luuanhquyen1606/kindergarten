<header class="main-header sticky-header sticky-header--normal">
    <div class="container-fluid">
        <div class="main-header__inner">
            <div class="main-header__logo">
                <a href="index.html">
                    <img src="/themes/{{ config('theme.active') }}/assets/images/logo-dark.png" alt="Kidearn HTML" width="160">
                </a>
            </div><!-- /.main-header__logo -->

            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">
	
	
	
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
                                                    <li><a href="{{getRoutingUrl($child->routing_id)}}">{{$child->name}}</a>
                                                    </li>
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
            </nav><!-- /.main-header__nav -->
            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
                <a class="main-header__call" href="tel:303555-0105">
                    <i class=" icon-call main-header__call__icon"></i>
                    <span class=" main-header__call__content">
                        <span class="main-header__call__number">(303) 555-0105</span>
                        <!-- /.main-header__call__number -->
                        <span class="main-header__call__text">Call to Questions</span><!-- /.main-header__call__text -->
                    </span><!-- /.main-header__call__content -->
                </a>
                <a href="contact.html" class="kidearn-btn main-header__btn">
                    <span>Book a Visit</span>
                </a><!-- /.thm-btn main-header__btn -->
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header><!-- /.main-header -->


<!----

<section class="mainmenu-area stricky">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="main-logo">
                            <a href="/"><img src="/themes/{{ config('theme.active') }}/images/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-7 menu-column">
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
                                    <?php
                                    foreach ($app['navigations'] as $navigation)
                                    {
                                        if(count($navigation['children'])==0)
                                        {
                                        ?>
                                        <li ><a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a> </li>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <li class="dropdown"><a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a>
                                                <ul>
                                                    <?php
                                                    foreach($navigation['children'] as $child)
                                                    {
                                                    ?>
                                                    <li><a href="{{getRoutingUrl($child->routing_id)}}">{{$child->name}}</a>
                                                    </li>
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

                                <ul class="mobile-menu clearfix">

                                    <?php
                                    foreach ($app['navigations'] as $navigation)
                                    {
                                        if(count($navigation['children'])==0)
                                        {
                                        ?>
                                        <li ><a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a> </li>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <li class="dropdown"><a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a>
                                                <ul>
                                                    <?php
                                                    foreach($navigation['children'] as $child)
                                                    {
                                                    ?>
                                                    <li><a href="{{getRoutingUrl($child->routing_id)}}">{{$child->name}}</a>
                                                    </li>
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
                           
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    -->