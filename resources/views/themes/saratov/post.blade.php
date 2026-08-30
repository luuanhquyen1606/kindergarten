@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>{!! $post->title !!}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/tin-tuc">Tin tức</a></li>
                <li>{!! $post->title !!}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--News Details-->
    <section class="news-details-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-8 col-sm-12 col-xs-12">
                    <div class="outer-box">
                        <div class="img-box"><img style="aspect-ratio:16/9;object-fit:cover" src="/get_photo/{{$post->photo_id}}/1024" alt="img"></div>
                        <div class="content-box">
                            <ul class="post-meta">
                                <li><span class="icon-left fa fa-user"></span>{{$post->user_name}}</li>
                                <li><span class="icon-left fa fa-calendar"></span>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</li>
                                <li><span class="icon-left fa fa-tag"></span>{{$post->category_name}}</li>
                            </ul>
                            <div class="sec-title">
                                <h2>{!! $post->title !!}</h2>
                            </div>
                            <div class="text">
                                {!! $post->content !!}
                            </div>
                            <div class="row clearfix mt-4">
                                <?php
                                foreach($files as $file)
                                {
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <figure class="image">
                                        <img style="aspect-ratio:1;object-fit:cover;width:100%" src="<?php echo $file->path; ?>" alt="img">
                                    </figure>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h3>Tin liên quan</h3>
                    </div>
                    <a href="/tin-tuc" class="theme-btn btn-style-one w-100">Xem tất cả tin tức</a>
                </div>
            </div>
        </div>
    </section>
    <!--End News Details-->

@endsection
