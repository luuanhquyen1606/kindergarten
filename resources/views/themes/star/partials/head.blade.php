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