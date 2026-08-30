@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>{{$teacher->name}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/giao-vien">Giáo viên</a></li>
                <li>{{$teacher->name}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Teacher Details-->
    <section class="teacher-details-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-4 col-sm-12 col-xs-12">
                    <figure class="image">
                        <img style="aspect-ratio:1;object-fit:cover;width:100%" src="/get_photo/{{$teacher->photo_id}}/500" alt="{{$teacher->name}}">
                    </figure>
                </div>
                <div class="column col-md-8 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h2>{{$teacher->name}}</h2>
                    </div>
                    <div class="text">
                        {!!$teacher->about!!}
                    </div>
                    <ul class="informations">
                        <li><span class="icon-left fa fa-phone"></span>{{$teacher->phone}}</li>
                        <li><span class="icon-left fa fa-envelope-o"></span>{{$teacher->email}}</li>
                        <li><span class="icon-left fa fa-map-marker"></span>{{$teacher->address}}</li>
                    </ul>
                    <ul class="social-links-one">
                        <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                        <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Teacher Details-->

    <!--Teachers Section-->
    <section class="teachers-section no-padding-btm section-padding pt-0">
        <div class="auto-container">
            <div class="sec-title centered">
                <h2>Các giáo viên khác</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme">

                <?php
                foreach ($teachers as $t)
                {
                ?>
                <!--Teacher Block-->
                <div class="teacher-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="/giao-vien-{{$t->slug}}">
                                <img style="aspect-ratio:1;object-fit:cover" src="/get_photo/{{$t->photo_id}}/500" alt="{{$t->name}}" />
                            </a>
                        </div>
                        <h3><a href="/giao-vien-{{$t->slug}}">{{$t->name}}</a></h3>
                        <div class="designation">Giáo viên</div>
                    </div>
                </div>
                <?php
                }
                ?>

            </div>
            <!--Background Patten-->
            <div class="background-patten"></div>
        </div>
    </section>
    <!--End Teachers Section-->

@endsection
