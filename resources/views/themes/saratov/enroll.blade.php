@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>Đăng ký nhập học</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li>Đăng ký nhập học</li>
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
                        <form action="/dang-ky-nhap-hoc" method="post">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="parent_name" value="" placeholder="Họ tên phụ huynh" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="student_name" value="" placeholder="Họ tên học sinh" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" value="" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="phone" value="" placeholder="Số điện thoại" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="message" placeholder="Ghi chú"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="theme-btn btn-style-one">Gửi đăng ký</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section-->

@endsection
