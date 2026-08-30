@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>{{ $event->title }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/su-kien">Sự kiện</a></li>
                <li>{{ $event->title }}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Event Details-->
    <section class="event-details-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-8 col-sm-12 col-xs-12">
                    <div class="outer-box">
                        <div class="img-box"><img style="aspect-ratio:16/9;object-fit:cover" src="/get_photo/{{ $event->photo_id }}/1024" alt="{{ $event->title }}"></div>
                        <div class="content-box">
                            <ul class="post-meta">
                                <li><span class="icon-left fa fa-calendar"></span>{{ \Carbon\Carbon::parse($event->start_at)->format('d/m/Y H:i') }}</li>
                            </ul>
                            <div class="sec-title">
                                <h2>{{ $event->title }}</h2>
                            </div>
                            <div class="text">
                                {!! $event->content !!}
                            </div>
                            <div class="row clearfix mt-4">
                                <?php
                                if(isset($event->files))
                                {
                                    foreach($event->files as $file)
                                    {
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <figure class="image">
                                        <img style="aspect-ratio:1;object-fit:cover;width:100%" src="/get_photo/{{ $file->id }}/500" alt="img">
                                    </figure>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column col-md-4 col-sm-12 col-xs-12">
                    <div class="course">
                        <div class="sec-title">
                            <h3>Thông tin sự kiện</h3>
                        </div>
                        <ul class="informations">
                            <li>
                                <span class="icon-left fa fa-clock-o"></span>Thời gian<span class="text-right">{{ \Carbon\Carbon::parse($event->start_at)->format('d/m/Y H:i') }}</span>
                            </li>
                            <li>
                                <span class="icon-left fa fa-map-marker"></span>Địa điểm<span class="text-right">{{ $event->location }}</span>
                            </li>
                        </ul>
                        <ul class="link_btn text-center">
                            <li><a href="/su-kien-{{$event->slug}}/enroll" class="theme-btn btn-style-one">Đăng ký tham dự</a></li>
                        </ul>
                    </div>
                    <div class="map-items">
                        <iframe src="https://www.google.com/maps?q={{ urlencode($event->location) }}&output=embed" style="border:0;width:100%;height:300px;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Event Details-->

@endsection
