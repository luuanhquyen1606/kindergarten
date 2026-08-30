@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>Giáo viên</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li>Giáo viên</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Teachers Section-->
    <section class="teachers-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">

                <?php
                foreach ($teachers as $teacher)
                {
                ?>
                <!--Teacher Block-->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="teacher-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <a href="/giao-vien-{{$teacher->slug}}">
                                    <img style="aspect-ratio:1;object-fit:cover" src="/get_photo/{{$teacher->photo_id}}/500" alt="{{$teacher->name}}" />
                                </a>
                            </div>
                            <h3><a href="/giao-vien-{{$teacher->slug}}">{{$teacher->name}}</a></h3>
                            <div class="designation">Giáo viên</div>
                            <ul class="social-links-one">
                                <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                                <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

            </div>
        </div>
    </section>
    <!--End Teachers Section-->

@endsection
