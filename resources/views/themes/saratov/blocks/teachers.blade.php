<!--Teachers Section-->
<section class="teachers-section no-padding-btm">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            <h2>{{ $data['title'] }}</h2>
            <div class="title">{{ $data['sub_title'] }}</div>
        </div>

        <div class="three-item-carousel owl-carousel owl-theme">

            <?php
            foreach ($teachers as $teacher)
            {
            ?>
            <!--Teacher Block-->
            <div class="teacher-block">
                <div class="inner-box">
                    <div class="image-box">
                        <img style="aspect-ratio:1;object-fit:cover" src="/get_photo/<?php echo $teacher->photo_id;?>/500" alt="<?php echo $teacher->name;?>" />
                    </div>
                    <h3><?php echo $teacher->name;?></h3>
                    <div class="designation">Giáo viên</div>
                    <ul class="social-links-one">
                        <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                        <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                    </ul>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
        <!--Background Patten-->
        <div class="background-patten"></div>
    </div>
</section>
<!--End Teachers Section-->
