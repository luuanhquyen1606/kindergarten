@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>Liên hệ</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li>Liên hệ</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Contact Section-->
    <section class="contact-page-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-6 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
                        <h2>Thông tin liên hệ</h2>
                    </div>
                    <ul class="contact-info-list">
                        <li><span class="icon fa fa-map-marker"></span>{{$app['school']->address}}</li>
                        <li><span class="icon fa fa-phone"></span><a href="tel:{{$app['school']->phone}}">{{$app['school']->phone}}</a></li>
                        <li><span class="icon fa fa-envelope-o"></span><a href="mailto:{{$app['school']->email}}">{{$app['school']->email}}</a></li>
                    </ul>
                </div>
                <div class="column col-md-6 col-sm-12 col-xs-12">
                    <!--Default Form-->
                    <div class="default-form">
                        <form action="/lien-he" method="post">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="" placeholder="Họ và tên" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" value="" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="phone" value="" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="message" placeholder="Nội dung"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="theme-btn btn-style-one">Gửi liên hệ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section-->

    <!--Map Section-->
    <div class="map-section">
        <div class="map-items">
            <iframe src="https://www.google.com/maps?q={{ urlencode($app['school']->address) }}&output=embed" style="border:0;width:100%;height:450px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

@endsection
