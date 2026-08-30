@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>{{ $event->title }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/su-kien">Sự kiện</a></li>
                <li><a href="/su-kien-{{ $event->slug }}">{{ $event->title }}</a></li>
                <li>Xác nhận đăng ký</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Confirm Enroll-->
    <section class="contact-page-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-6 col-sm-12 col-xs-12">
                    <div class="teacher-block">
                        <div class="inner-box">
                            <h3>{{ $student->name }}</h3>
                            <div class="text">Xác nhận đăng ký tham dự sự kiện <strong>{{ $event->title }}</strong> cho học sinh trên?</div>
                        </div>
                    </div>
                </div>
                <div class="column col-md-6 col-sm-12 col-xs-12">
                    <div class="course">
                        <div class="sec-title">
                            <h3>Thông tin sự kiện</h3>
                        </div>
                        <ul class="informations">
                            <li>
                                <span class="icon-left fa fa-clock-o"></span>Thời gian<span class="text-right">{{ \Carbon\Carbon::parse($event->start_at)->format('d/m/Y H:i') }}</span>
                            </li>
                        </ul>
                        <ul class="link_btn text-center">
                            <li><a href="/su-kien-{{$event->slug}}/enroll/{{$student->id}}" class="theme-btn btn-style-one">Xác nhận đăng ký</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Confirm Enroll-->

@endsection
