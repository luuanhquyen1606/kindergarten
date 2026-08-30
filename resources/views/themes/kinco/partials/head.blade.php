<div class="top-bar">
                <div class="inner jus-ct">
                    <p class="clr-pri-1">Working Jours : Sun - Friday, 08:00 am - 05:00 pm</p>
                </div>
            </div> 
            <header id="site-header" class="header_main header2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="site-header-inner fx"> 
                                <div id="site-logo" class="clearfix">
                                    <a href="index.html" class="logo">
                                        <img  src="/themes/{{ config('theme.active') }}/assets/images/logo/logodark.png" alt="Kinco">
                                    </a>
                                </div>
                                <div class="btn-menu"><span></span></div>
                                <div class="nav-wrap">
                                    <nav id="mainnav" class="mainnav">
                                        <ul class="menu">



                                    <?php
                                    foreach ($app['navigations'] as $navigation)
                                    {
                                        if(count($navigation['children'])==0)
                                        {
                                        ?>
                                        <li class="menu-item" ><a href="{{$navigation['url']}}">{{$navigation['name']}}</a> </li>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <li class="menu-item-has-children">
                                                <a href="{{$navigation['url']}}">{{$navigation['name']}}</a>
                                                <ul class="sub-menu">
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
                                        <!-- /.menu -->
                                    </nav>
                                </div>
                                <div class="header-right fx">
                                    <div id="header-search">
                                        <a href="#" class="search-box header-search-icon">
                                            <i class="far fa-search"></i>
                                        </a>
                                        <form role="search" method="get" class="header-search-form" action="#">
                                            <input type="text" value="" name="s" class="header-search-field" placeholder="Search...">
                                            <button type="submit" class="header-search-submit" title="Search"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <div class="header-contact fx">
                                        <a href="#" class="menu-bar-right header-menu">
                                            <svg data-name="Hero Area" xmlns="http://www.w3.org/2000/svg" width="58" height="58" viewBox="0 0 58 58">
                                                <defs>
                                                <style>
                                                    .cls-1 {
                                                    fill: #b250fe;
                                                    }
                                            
                                                    .cls-1, .cls-2 {
                                                    fill-rule: evenodd;
                                                    }
                                            
                                                    .cls-2 {
                                                    fill: #fff;
                                                    }
                                                </style>
                                                </defs>
                                                <g data-name="Menu Area">
                                                <g id="Menu_bar" data-name="Menu bar">
                                                    <path id="Bg" class="cls-1" d="M7.853,2.283c14.9-3.89,29.969-1.4,43.467.819a7.923,7.923,0,0,1,5.735,5.422c3.111,14.141-.428,28.636-1.166,42.981a5.157,5.157,0,0,1-4.773,4.875c-13.49.568-23.463,3.285-41.787,0.9C5.948,56.807,2.348,54.2,1.9,51.7-0.683,37.877.2,23.508,2.194,8.757a8.71,8.71,0,0,1,5.66-6.473"/>
                                                    <path id="Bar" class="cls-2" d="M16,17H42a2,2,0,0,1,0,4H16A2,2,0,0,1,16,17Zm0,10H42a2,2,0,0,1,0,4H16A2,2,0,0,1,16,27Zm0,10H42a2,2,0,0,1,0,4H16A2,2,0,0,1,16,37Z"/>
                                                </g>
                                                </g>
                                            </svg>
                                        </a>

                                        <div class="inner-contact fx">
                                            <svg data-name="Hero Area" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="49" height="47" viewBox="0 0 49 47">
                                                <g data-name="Menu Area">
                                                <g>
                                                    <image width="49" height="47" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADEAAAAvCAYAAABKQCL3AAAG10lEQVRogc2aCbCVYxjHf11JN5HKNUhj39eEm20sNylFwtiSfTDIMiPb2Mk2yJR1hoQKZatJRFnGTiJE1pTRlCRyQ0nMY37fzDefc+75jnvu1X/mzrnn297n/77P9v6/02LF+SfTTGgJ9AG6Ae2AVsCawHKgRcaEX4BlwCLgVWBSQya2bAb7Y4zBQC9gdeBDYDrwBfA58KNGV0muI7AlsBWwM3AssFAyd3tfs5KoBZ4HJgLnAi+VuH6en2+kjoWN+wMHAKOAeuA4YG5yQVXT2P4POgFvATcCx+QgUAzLnYhBwMGu3AfAoc1B4n7gNuCGCj5zPnAEcBLwFNCbJnSn8OO9gJ5N9PxngO7AWGCbpiJxDvBw5th5wObAH8DlBnOCAWatP4FhmeC9xmCP6y9OHZ8CvBlxUsqdugBneXP4ZA9g1RL3VAM/AVemjj1uYIc/twZmATt67kHgDs9Fqp0cs+u5iKm+Zqc9gE8llCAmY7NiK3GpwfgN8C3wM9BGUkOA980QhVAH/AB877nL9N3q1LXh06do/J7A+sASz50GXAt8BawBbJu6bxpwK3Bi6vu0LImO+ll74CZT2l+Za+rMOG/r84sy5zuZBhMcZYDjDAeB+4DZQD9guARi7EuAZ4ENgMOAI70vUvUqBva6mfF+z7rTfFNazPjIAgTQF3c1KYwqcH5eZtYnm1E2dubDwK2Nj+eAfUyddwFtdbdYhTFW+E6p1ews+QRR9ddPk5gAjNPvcca2KmBkgq4u9dGZ4y9qaI3fLwIWA18buLsA+zoB0z02HjjICn0gcDvQH9gJmAls6Pe1gVtSY4WNmyYk+sv0cAcZ56wsbIBE4GmzRxqRRVYzdrAH2lUXWgp8BmxvG4HGxzOm6gVB8B3/r3O1Ir4+BnbIZK5IOiOSBvBlBxnp0g52VpaXILGTqbRL5tquGrWWSaEpcJWZq0uVbFdIINLiJjLOU0O+AxZobBrv2RZ8rv9XGhdo6/Fo6Fmp9Bau9KX//55j4BqzSn2Bc7Hs69i5VgrtjZfj9YKPsHeK4H0hioZN2qAyBjzBVcgSjpQ4Q5ecWgECYeOd1qwa9yHTk5MtrcBTzL89DLh3Czwo9gNnGjMJBri0WUQVvtqimOAME0i9q/Sme4uoM79aB9o5KWH0diaA1azk882EE7KDJSS+c+YeS1XaLFqn0m/gdQ0ZnbluoC55ld93sQPoZsJYKpmoD7/qyn9oaLVGV6fITjYFLy62TC0N6mW6U+tMMUljqkWou8a0sWXIop8TsblVP6551Aqc4D4/V7e1aK0d9ZJaWszgQqiyKtc4K3UOXgjfWpiiTXjFpS6EgR67wRWutfkrhCVW+OjR5tgElkUgWYnlzm5sYp7ItMhZRM5/MtOhZjFD361ydpscVQZMrQOF397rEhfCBFuAPGgWAkhisq0wSiPvFpBQEgy3L8oWt/8VQWKEgYWqxJ+22G0KGBYB28GucqUiMcdgOsls0cHs0a3IPUPd0Kw0SLrY8ba4S6yMA+w2C2GE5b7ZpMNSSEjca6rtZ7obZ3oshgvNZu1WJhJYRW/Oed9bVuoXmsiuspAmMcmsNDTnA/obPw810oZIIBs3ptvN7hm6uwe4B/gkx/21KhvhgleUOXZvE8QWttiLHHu0Ek9uZEl8Y6c6o4FakcZCW5a56kh9cw4804buIZWTBe6faxXZrpdcLhR7P/GwD6nN+Zw17WiXKmHOLHJdO6WeWa5Esao+zna8WwFJ6F8opgAOsDK/kpPEYpWPN9ysDLalzuJOO+ZeJdqSvna0uZT0hmTMzrrKazmJBM629d5SdWKEogGubGf373nQ1YnYvTEkVvigjYBHyiAyVbHsbPfYsad4wJ4sXGQ/j+fBrWoADaKUovGbblWvFrRbGWQm+ddK5WOBEzLcND6kxP2hP51uW9QoEgnaKmIlhizJd9s/WKYkOSZ1rLqB60lJnW1NGg2inDdFPdWT5jSwq8uL30pc18qt8Ng8E1bu666eKtwfllETysUq1qioO3u7PagoCUyfvXWPYRU0vpWfByo2P2NL8i+JJov/+uJxourIseq4jUHYsK7xOdRdYy/F6nnpV72VJoHqRyJhLku9vsqL5LVBGH+PyngH3/700bZcLluJF4993K4+rwsU6mP2skudaY3Yzgx1lCrhJJ9zmMphvNNYL68BlXqPfZ0usK8Vvs7UuJYxdIjd7hT12VN1k7V9pfWSNWG2ck9N6tcFzUYC3WATg/J2i+NcRbmJEhui0d1tTQb564CQROMNU7QpUYeCcG401a9sItOEEhh9VKh6offGCkQLEm4TLUik0k09F9eEKJf+TUc+AH8DJu6XCnzb/8QAAAAASUVORK5CYII="/>
                                                </g>
                                                </g>
                                            </svg>
                                            <ul>
                                                <li class="clr-pri-2">Hotline</li>
                                                <li class="clr-pri-2">+012 (345) 678</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                
            </header>  