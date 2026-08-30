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
                <li>Đăng ký</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Teachers Section reused for student picker-->
    <section class="teachers-section section-padding">
        <div class="auto-container">
            <div class="sec-title centered">
                <h2>Tham dự sự kiện</h2>
                <div class="title">Bấm vào tên con để đăng ký tham gia sự kiện</div>
            </div>
            <ul class="post-filter list-inline text-center">
                <li class="active" data-filter="*"><span>Tất cả</span></li>
                <?php
                foreach ($classes as $class)
                {
                ?>
                <li data-filter=".{{$class->slug}}"><span>{{$class->name}}</span></li>
                <?php
                }
                ?>
            </ul>
            <div class="row clearfix">

                <?php foreach ($students as $student)
                {
                ?>
                <div class="col-md-3 col-sm-6 col-xs-12 filter-item {{$student->class_slug}}">
                    <div class="teacher-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <a href="/su-kien-{{$event->slug}}/enroll/{{$student->id}}">
                                    <img style="aspect-ratio:1;object-fit:cover" src="{{ $student->photo_path }}" alt="{{ $student->name }}" />
                                </a>
                            </div>
                            <h3><a href="/su-kien-{{$event->slug}}/enroll/{{$student->id}}">{{ $student->name }}</a></h3>
                            <div class="designation">{{ $student->class_name }}</div>
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
