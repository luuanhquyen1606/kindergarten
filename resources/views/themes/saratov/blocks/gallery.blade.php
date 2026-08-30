<!--Gallery Section-->
<section class="gallery-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            <h2>{{ $data['title'] }}</h2>
        </div>

        <div class="row clearfix">

            <?php
            foreach ($files as $file)
            {
            ?>
            <!--Gallery Item-->
            <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image-box"><img style="aspect-ratio:4/3;object-fit:cover" src="/get_photo/<?php echo $file->id;?>/500" alt="">
                        <div class="overlay-box">
                            <div class="content">
                                <a class="lightbox-image" href="/get_photo/<?php echo $file->id;?>/1024" data-fancybox-group="school-gallery"><span class="icon flaticon-plus"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>

    </div>
</section>
<!--End Gallery Section-->
