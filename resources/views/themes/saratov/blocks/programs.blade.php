<!--Classes News-->
<section class="classes-news-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            <h2>{{ $data['title'] }}</h2>
            <div class="title">{{ $data['sub_title'] }}</div>
        </div>
        <div class="row clearfix">

            <?php
            foreach($programs as $program)
            {
                if(in_array($program->id,$data['programs']))
                {
            ?>
            <!--News Style Two-->
            <div class="news-style-two col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <!--Image Column-->
                    <div class="image-column">
                        <div class="image">
                            <a href="/chuong-trinh-hoc-{{$program->slug}}"><img style="aspect-ratio:4/3;object-fit:cover" src="<?php echo $program->photo_id? getPhotoUrl($program->photo_id) :'/assets/admin/trans.png'; ?>" alt="<?php echo $program->name;?>" /></a>
                            <div class="overlay-layer">
                                <a href="/chuong-trinh-hoc-{{$program->slug}}"><span class="icon flaticon-unlink"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--Content Column-->
                    <div class="content-column">
                        <div class="inner">
                            <h3><a href="/chuong-trinh-hoc-{{$program->slug}}"><?php echo $program->name;?></a></h3>
                            <div class="text">( <?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi) &bull; Sĩ số: <?php echo $program->class_count;?></div>
                            <a href="/chuong-trinh-hoc-{{$program->slug}}" class="theme-btn btn-style-one">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>

        </div>
        <div class="text-center">
            <a href="/chuong-trinh-hoc" class="theme-btn btn-style-one">Xem tất cả</a>
        </div>
    </div>
</section>
<!--End Classes News-->
