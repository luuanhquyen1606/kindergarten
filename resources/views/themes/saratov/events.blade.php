@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>Sự kiện</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li>Sự kiện</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--News Section-->
    <section class="classes-news-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">

                <?php
                foreach ($events as $event)
                {
                ?>
                <!--News Style Two-->
                <div class="news-style-two col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <!--Image Column-->
                        <div class="image-column">
                            <div class="image">
                                <a href="/su-kien-{{ $event->slug }}"><img style="aspect-ratio:4/3;object-fit:cover" src="/get_photo/{{ $event->photo_id }}/500" alt="<?php echo $event->title;?>" /></a>
                                <div class="overlay-layer">
                                    <a href="/su-kien-{{ $event->slug }}"><span class="icon flaticon-unlink"></span></a>
                                </div>
                            </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column">
                            <div class="inner">
                                <div class="post-date">{{ \Carbon\Carbon::parse($event->start_at)->format('d/m/Y H:i') }}</div>
                                <h3><a href="/su-kien-{{ $event->slug }}">{{ $event->title }}</a></h3>
                                <a href="/su-kien-{{ $event->slug }}" class="theme-btn btn-style-one">Xem chi tiết</a>
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
    <!--End News Section-->

@endsection
