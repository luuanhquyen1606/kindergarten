<!--feature start-->
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
        <!--feature end-->