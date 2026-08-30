<div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="/">
                                    <img src="/themes/{{ config('theme.active') }}/assets/img/logo/logo.svg" alt="logo-img">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button>
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text d-none d-xl-block">
                            Nullam dignissim, ante scelerisque the  is euismod fermentum odio sem semper the is erat, a feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                        </p>
                        <div class="mobile-menu fix mb-3"></div>
                        <div class="offcanvas__contact">
                            <h4>Contact Info</h4>
                            <ul>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">{{$app['school']->address}}</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:{{$app['school']->email}}"><span class="mailto:{{$app['school']->email}}">{{$app['school']->email}}</span></a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:{{$app['school']->phone}}">{{$app['school']->phone}}</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="header-button mt-4">
                                <a href="contact.html" class="theme-btn text-center">
                                    <span>Get A Quote<i class="fa-solid fa-arrow-right-long"></i></span>
                                </a>
                            </div>
                            <div class="social-icon d-flex align-items-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>

        <!-- Header Top Section Start -->
        <div class="header-top-section">
            <div class="header-top-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/header-top-shape.png" alt="shape-img">
            </div>
            <div class="container-fluid">
                <div class="header-top-wrapper">
                    <ul class="contact-list">
                        <li>
                            <i class="fal fa-map-marker-alt"></i>
                            {{$app['school']->address}}
                        </li> 
                        <li>
                            <i class="far fa-envelope"></i>
                            <a href="mailto:{{$app['school']->email}}" class="link">{{$app['school']->email}}</a>
                        </li>
                        <li>
                            <i class="far fa-phone"></i>
                            <a href="tel:{{$app['school']->phone}}" class="link">{{$app['school']->phone}}</a>
                        </li>
                    </ul>
                    <div class="social-icon d-flex align-items-center">
                        <span>Follow Us On:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Section Start -->
        <header id="header-sticky" class="header-1">
            <div class="container-fluid">
                <div class="mega-menu-wrapper">
                    <div class="header-main style-2">
                        <div class="header-left">
                            <div class="logo">
                                <a href="/" class="header-logo">
                                    <img src="/themes/{{ config('theme.active') }}/assets/img/logo/logo.svg" alt="logo-img">
                                </a>
                            </div>
                            <div style="display:none" class="category-oneadjust">
                                <img src="/themes/{{ config('theme.active') }}/assets/img/grid.svg" alt="img" class="me-2">
                                <select name="cate" class="category">
                                    <option value="1">
                                        Category
                                    </option>
                                    <option value="1">
                                      Designer
                                    </option>
                                    <option value="1">
                                     Developer
                                    </option>
                                    <option value="1">
                                        Graphic
                                    </option>
                                    <option value="1">
                                        Softwer
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
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
                                            <li>
                                                <a href="{{getRoutingUrl($navigation['routing_id'])}}">
                                                   {{$navigation['name']}}
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    
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
                                    </nav>
                                </div>
                            </div>
                            <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                            <div style="display:none" class="header-button">
                                <a href="contact.html" class="theme-btn">
                                    <span>
                                        get A Quote
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="header__hamburger d-xl-none my-auto">
                                <div class="sidebar__toggle">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Search Area Start -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fas fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get">
                        <div class="search-field-holder">
                            <input type="search" class="main-search-input" placeholder="Search...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
