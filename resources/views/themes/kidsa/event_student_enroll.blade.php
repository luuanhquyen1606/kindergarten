@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')
    <section class="page-title">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-left">
                        <h1>{{ $event->title }}</h1>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-right text-right path"><a href="/">Home</a> &gt; <a href="#">Single Post</a>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </section>

       <section class="course-single">
            <div class="container">
                <div class="row clearfix">
                    <div class="column col-md-4 col-sm-12 col-xs-12">
                        <div class="course">
                            <div class="sec-title">
                                <h3>Thông tin sự kiện</h3>
                            </div>
                            <ul class="informations">
                                <li>
                                    <span class="icon-left fa fa-calendar"></span>Bắt đầu<span class="text-right"><?php echo $event->start_at;?></span>
                                </li>
                                <li>
                                    <span class="icon-left fa fa-calendar"></span>Kết thúc<span class="text-right"><?php echo $event->end_at;?></span>
                                </li>
                                <li>
                                    <span class="icon-left fa fa-money"></span>Phí tham dự<span class="text-right">
                                        <?php echo ($event->price > 0)? $event->price ." (vnd)":'Không có phí'; ?>
                                    </span>
                                </li>
                                <li>
                                    <span class="icon-left fa fa-birthday-cake"></span>Years Old<span class="text-right">03 - 05 Years</span>
                                </li>
                                <li><span class="icon-left fa fa-anchor"></span>Course Size<span class="text-right">09 Seats</span>
                                </li>
                                <li><span class="icon-left fa fa-clock-o"></span>Durations<span class="text-right">9AM - 3PM</span>
                                </li>
                                <li><span class="icon-left fa fa-user"></span>Course Staff<span class="text-right">2 Teachers</span>
                                </li>
                                <li><span class="icon-left fa fa-money"></span>Course Price<span class="text-right">$50.00</span>
                                </li>
                            </ul>
                            <ul class="link_btn text-center">
                                <li><a href="/events/{{ $event->id}}/enroll" class="thm-btn">Đăng ký tham dự</a>
                                </li>
                            </ul>
                        </div>
                    
                        <div class="course">
                            <div class="sec-title">
                                <h3>Thông tin sự kiện</h3>
                            </div>
                            <?php
                            if($event->price>0)
                            {
                            ?>
                            <p>Sự kiện có phí tham dự là {{$event->price}} vnd, phụ huynh có thể thanh toán phí tham dự bằng qr code sau</p>
                            <img src="https://hosttools.com/wp-content/uploads/QR-Code-.png.webp" alt="" style="width: 100%;height: auto;margin-bottom: 15px;">
                             <ul class="link_btn text-center">
                                <li><a href="/events/{{ $event->id}}/enroll" class="thm-btn">Đăng ký tham dự</a>
                                </li>
                            </ul>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="column col-md-8 col-sm-12 col-xs-12">
                        <div class="outer-box">
                            <div class="img-box"><img src="<?php echo $event->feature_path;?>" alt="">
                            </div>
                            <div class="content-box">
                                <div class="sec-title">
                                    <h2>{{ $event->title }}</h2>
                                </div>
                                <div class="text">
                                {!! $event->content !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
