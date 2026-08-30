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




                <?php
                                    foreach ($app['navigations'] as $navigation)
                                    {
                                        if(count($navigation['children'])==0)
                                        {
                                        ?>
                                        <li><a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a></li>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <li class="dropdown-submenu">
                                                <a href="#">{{$navigation['name']}}</a>
                                                <ul  class="mobile-submenu">
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
  </div>
 <header class="header-three">
    <div class="header-top">
      <div class="container">
        <div class="ht-area">
          <ul class="left">
            <li><span><i class="fa fa-phone" aria-hidden="true"></i></span> Phone : 8801 234 567 890</li>
            <li><span><i class="fa fa-clock-o" aria-hidden="true"></i></span> Opening Time : 9:30am-5:30pm</li>
            <li><span><i class="fa fa-home" aria-hidden="true"></i></span> Address : Labartisan 1205 Newyork</li>
          </ul>
          <ul class="right">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="main-menu">
      <div class="container">
        <div class="row no-gutters">
          <nav class="main-menu-area w-100">
            <div class="logo-area">
              <a class="" href="index.html"><img src="/themes/{{ config('theme.active') }}/images/logo.png" alt="logo" class="img-responsive"></a>
              <button type="button" class="navbar-toggle collapsed d-md-none" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="menu-area">
              <ul class="menu-search-cart">
                <li><span class="menu-search"><i class="fa fa-search" aria-hidden="true"></i></span></li>
                <li class="menu_cart dropdown"><span><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                  <ul class="dropdown-menu first_dropdown shop_feature">
                    <li class="feature_item">
                      <div class="featured_image">
                        <img src="/themes/{{ config('theme.active') }}/images/product/menu_cart_01.jpg" alt="Fratured image" class="img-responsive" />
                      </div>
                      <!--featured image-->
                      <div class="featured_content">
                        <h3><a href="#">Product Title</a> </h3>
                        <span class="remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                        <p>quantity: 1</p>
                        <span>$85</span>
                      </div>
                      <!--featured content-->
                    </li><!--  feature item -->
                    <li class="feature_item">
                      <div class="featured_image">
                        <img src="/themes/{{ config('theme.active') }}/images/product/menu_cart_02.jpg" alt="Fratured image" class="img-responsive" />
                      </div>
                      <!--featured image-->
                      <div class="featured_content">
                        <h3><a href="#">Product Title</a> </h3>
                        <span class="remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                        <p>quantity: 2</p>
                        <span>$85</span>
                      </div>
                      <!--featured content-->
                    </li><!--  feature item -->
                    <li class="feature_item">
                      <div class="featured_image">
                        <img src="/themes/{{ config('theme.active') }}/images/product/menu_cart_03.jpg" alt="Fratured image" class="img-responsive" />
                      </div>
                      <!--featured image-->
                      <div class="featured_content">
                        <h3><a href="#">Product Title</a> </h3>
                        <span class="remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                        <p>quantity: 4</p>
                        <span>$85</span>
                      </div>
                      <!--featured content-->
                    </li><!--  feature item -->
                    <li class="cart_total">total order: <span>$591.00</span></li>
                    <li><a href="shop-cart.html" class="button-default check_out">Check Out</a></li>
                  </ul>
                </li>
              </ul>

              <ul class="menu">
                
                

                <?php
                                    foreach ($app['navigations'] as $navigation)
                                    {
                                        if(count($navigation['children'])==0)
                                        {
                                        ?>
                                        <li><a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a></li>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <li class="dropdown">
                                                <a href="{{getRoutingUrl($navigation['routing_id'])}}">{{$navigation['name']}}</a>
                                                <ul  class="dropdown-menu">
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
              <form class="menu-search-form">
                <input type="text" name="search" placeholder="Search here...">
                <span class="menu-search-close"><i class="fa fa-times" aria-hidden="true"></i></span>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>


