@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')
@include('themes.common.partials.enroll_modal')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>{{$program->name ?? 'N/A'}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/chuong-trinh-hoc">Chương trình học</a></li>
                <li>{{$program->name ?? 'N/A'}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Course Single-->
    <section class="course-single section-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-4 col-sm-12 col-xs-12">
                    <div class="course">
                        <div class="sec-title">
                            <h3>Thông tin</h3>
                        </div>
                        <ul class="informations">
                            <li>
                                <span class="icon-left fa fa-birthday-cake"></span>Lứa tuổi<span class="text-right"><?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi</span>
                            </li>
                            <li>
                                <span class="icon-left fa fa-users"></span>Sĩ số<span class="text-right"><?php echo $program->class_count;?></span>
                            </li>
                            <li>
                                <span class="icon-left fa fa-money"></span>Học phí<span class="text-right"><?php echo $program->tuition;?></span>
                            </li>
                            <li>
                                <span class="icon-left fa fa-anchor"></span>Số lớp<span class="text-right"><?php echo count($program->classes);?></span>
                            </li>
                        </ul>
                        <ul class="link_btn text-center">
                            <li><a data-bs-toggle="modal" data-bs-target="#enrollModal" href="/dang-ky-nhap-hoc-{{$program->slug}}" class="theme-btn btn-style-one">Đăng ký nhập học</a></li>
                        </ul>
                    </div>

                    <div class="course">
                        <div class="sec-title">
                            <h3>Giáo viên phụ trách</h3>
                        </div>
                        <div class="teacher-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <img style="aspect-ratio:1;object-fit:cover" src="/get_photo/{{$program->teacher->photo_id ?? null}}/500" alt="{{$program->teacher->name ?? 'N/A'}}" />
                                </div>
                                <h3>{{$program->teacher->name ?? 'N/A'}}</h3>
                                <div class="text">{{$program->teacher->email ?? 'N/A'}} &bull; {{$program->teacher->phone ?? 'N/A'}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column col-md-8 col-sm-12 col-xs-12">
                    <div class="outer-box">
                        <div class="img-box"><img src="/get_photo/{{$program->photo_id}}/1024" alt="{{$program->name ?? 'N/A'}}"></div>
                        <div class="content-box">
                            <div class="sec-title">
                                <h2>{{$program->name ?? 'N/A'}}</h2>
                            </div>
                            <div class="text">
                                {!!$program->introduction!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Course Single-->

@endsection
