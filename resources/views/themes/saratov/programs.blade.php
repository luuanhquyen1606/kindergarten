@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>Chương trình học</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li>Chương trình học</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Classes Section-->
    <section class="classes-news-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">

                <?php
                foreach($programs as $program)
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
                ?>

            </div>
        </div>
    </section>
    <!--End Classes Section-->

@endsection
