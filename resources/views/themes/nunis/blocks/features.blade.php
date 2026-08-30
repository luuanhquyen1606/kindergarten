<!--feature start-->
 <section class="features-area pt-120 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section-title text-center">
                        <span>{{ $data['title'] }}</span>
                        <h3 class="title">{{ $data['sub_title'] }}</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <?php foreach ($data['features'] as $feature)
                            {
                                if(!isset($feature['show']))
                                    {
                                        continue;
                                    }
                                    if($feature['show']!=1)
                                    {
                                        continue;
                                    }
                                ?>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="features-item text-center mt-30  wow slideInUp" data-wow-duration="1.1s" data-wow-delay=".1s">
                        <i class="fal fa-laptop-code"></i>
                        <h4 class="title">{{ $feature['title'] }}</h4>
                        <p>{{ $feature['sub_title'] }}</p>
                    </div> <!-- features item -->
                </div>
                 <?php
                            }
                            ?>
                            <!--
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="features-item text-center mt-30  wow slideInUp" data-wow-duration="1.4s" data-wow-delay=".2s">
                        <i class="fal fa-trees"></i>
                        <h4 class="title">Natural Environment</h4>
                        <p>But I must explain to you how this mistaken idea of denouncing pleasure and praising </p>
                    </div> 
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="features-item text-center mt-30  wow slideInUp" data-wow-duration="1.7s" data-wow-delay=".3s">
                        <i class="fal fa-car-side"></i>
                        <h4 class="title">School Transport</h4>
                        <p>But I must explain to you how this mistaken idea of denouncing pleasure and praising </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="features-item text-center mt-30  wow slideInUp" data-wow-duration="2s" data-wow-delay=".4s">
                        <i class="fal fa-user-nurse"></i>
                        <h4 class="title">Medical Services</h4>
                        <p>But I must explain to you how this mistaken idea of denouncing pleasure and praising </p>
                    </div>
                </div>
                -->
            </div> <!-- row -->
        </div>
    </section>

    <!--
        <section class="feature">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>{{ $data['title'] }}</h2>
                    <p>{{ $data['sub_title'] }}</p>
                </div>
                <div class="inner-box">
                    <div class="item-list">
                        <div class="row">

                            <?php foreach ($data['features'] as $feature)
                            {
                                if(!isset($feature['show']))
                                    {
                                        continue;
                                    }
                                    if($feature['show']!=1)
                                    {
                                        continue;
                                    }
                                ?>
                            <div class="item col-md-3 col-sm-6 col-xs-12">
                                <div class="border">
                                    <div class="icon-box">
                                        <div class="single-item" style="height: 100%;aspect-ratio: 16 / 9; overflow: hidden;">
                                    <div class="img-holder">
                                        <img src="/get_photo/{{$feature['photo_id']}}/500" alt="Awesome Image" style="width: 100%; height: 100%; object-fit: cover;object-position: center;" />
                                    </div>
                                </div>
                                    </div>
                                </div>
                                <h3><a href="#">{{ $feature['title'] }}</a></h3>
                                <p><center>{{ $feature['sub_title'] }}</center></p>
                            </div>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        -->
    