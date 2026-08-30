<!--Featured Section-->
<section class="featured-section style-two">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            <h2>{{ $data['title'] }}</h2>
            <div class="title">{{ $data['sub_title'] }}</div>
        </div>
        <!--End Sec Title-->
        <div class="row clearfix">
            <!--Column/ Pull Left-->
            <div class="column pull-left col-md-4 col-sm-6 col-xs-12">
                <?php
                foreach ($data['features'] as $index=>$feature)
                {
                    if(!isset($feature['show']) || $feature['show']!=1){
                        continue;
                    }
                    if($index % 2 != 0){
                        continue;
                    }
                ?>
                <!--Feature Block-->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="icon-box bg-cover" style="background-image:url('/get_photo/<?php echo $feature['photo_id'];?>/100');"></div>
                        <h3><?php echo $feature['title'];?></h3>
                        <div class="text"><?php echo $feature['sub_title'];?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!--Column / Pull Right-->
            <div class="column pull-right col-md-4 col-sm-6 col-xs-12">
                <?php
                foreach ($data['features'] as $index=>$feature)
                {
                    if(!isset($feature['show']) || $feature['show']!=1){
                        continue;
                    }
                    if($index % 2 == 0){
                        continue;
                    }
                ?>
                <!--Feature Block Two-->
                <div class="feature-block-two">
                    <div class="inner-box">
                        <div class="icon-box bg-cover" style="background-image:url('/get_photo/<?php echo $feature['photo_id'];?>/100');"></div>
                        <h3><?php echo $feature['title'];?></h3>
                        <div class="text"><?php echo $feature['sub_title'];?></div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="image-column col-md-4 col-sm-12 col-xs-12">
                <figure class="image wow fadeInUp">
                    <img src="/themes/{{ config('theme.active') }}/images/resource/welcome-2.png" alt="" />
                </figure>
            </div>

        </div>

    </div>
</section>
<!--End Featured Section-->
