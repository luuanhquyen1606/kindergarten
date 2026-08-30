<header class="header-area">
        <div class="header-top">
            <div class="container">
                
                <div class="row align-items-center">
                    
                    <div class="col-lg-12">
                        <div class="header-top-item d-flex justify-content-between">
                            <div class="header-left-side">
                                <p>Welcome to <span>Nunis.</span> A Modren & Digital Preschool</p>
                            </div>
                            <div class="header-right-social d-flex justify-content-end align-items-center">
                                <span><i class="fal fa-clock"></i> Mon - Fri: 9:00 - 19:00 pm</span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                </ul>
                            </div>
                        </div> <!-- header top item -->
                    </div>
                </div> <!-- row -->
            </div>
        </div>

        
        <div class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light ">
                                <a class="navbar-brand" href="index.html"><img src="/themes/{{ config('theme.active') }}/assets/images/logo.png" alt=""></a> <!-- logo -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button> <!-- navbar toggler -->

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto">
                                        <?php
                                        foreach ($app['navigations'] as $navigation)
                                        {
                                            if(count($navigation['children'])==0)
                                            {
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a>
                                            </li>
                                            <?php
                                            }
                                            else{
                                                ?>
                                                <li class="nav-item active dropdown">
                                                    <a class="nav-link dropdown-toggle" href="{{getRoutingUrl($navigation['routing_id'])}}" data-toggle="dropdown">{{$navigation['name']}}</a>
                                                    <ul class="sub-menu dropdown-menu">
                                                        <?php
                                                        foreach($navigation['children'] as $child)
                                                        {
                                                        ?>
                                                        <li><a class="dropdown-item" href="{{getRoutingUrl($child->routing_id)}}">{{$child->name}}</a>
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
                                </div> <!-- navbar collapse -->
                                <div class="bar-area d-none d-lg-block">
                                    <ul>
                                        <li><a class="search" id="search" href="#"><i class="fal fa-search"></i></a></li>
                                        <li><a href="#"><i class="fal fa-shopping-bag"></i></a></li>
                                        <li><a class="menubar" id="navigation-button" href="#"><i class="fal fa-bars"></i></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div> <!-- navigation -->
                    </div>
                </div> <!-- row -->
            </div>
        </div>
    </header>