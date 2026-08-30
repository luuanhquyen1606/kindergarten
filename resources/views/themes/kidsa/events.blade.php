@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')


        <!-- Search Area Start -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fas fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get">
                        <div class="search-field-holder">
                            <input type="search" class="main-search-input" placeholder="Search...">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--<< Breadcrumb Section Start >>-->
        <div class="breadcrumb-wrapper bg-cover" style="background-image: url('/themes/{{ config('theme.active') }}/assets/img/breadcrumb.png');">
            <div class="line-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/breadcrumb-shape/line.png" alt="shape-img">
            </div>
            <div class="plane-shape float-bob-y">
                <img src="/themes/{{ config('theme.active') }}/assets/img/breadcrumb-shape/plane.png" alt="shape-img">
            </div>
            <div class="doll-shape float-bob-x">
                <img src="/themes/{{ config('theme.active') }}/assets/img/breadcrumb-shape/doll.png" alt="shape-img">
            </div>
            <div class="parasuit-shape float-bob-y">
                <img src="/themes/{{ config('theme.active') }}/assets/img/breadcrumb-shape/parasuit.png" alt="shape-img">
            </div>
            <div class="frame-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/breadcrumb-shape/frame.png" alt="shape-img">
            </div>
            <div class="bee-shape float-bob-x">
                <img src="/themes/{{ config('theme.active') }}/assets/img/breadcrumb-shape/bee.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="page-heading">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Sự kiện</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="/">
                                Trang chủ
                            </a>
                        </li>
                       
                    </ul>
                   
                </div>
            </div>
        </div>




        <!-- News Section Start -->
        <section class="news-section-3 fix section-padding">
            <div class="container">
                <div class="row g-4">




 <?php
                        foreach ($events as $event)
                        {
                        ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="news-card-items mt-0">
                            <div class="news-image">
                                <a href="/su-kien-{{ $event->slug }}">
                                <img style="aspect-ratio: 4/3; object-fit: cover;" src="/get_photo/{{ $event->photo_id }}/1024" alt="event-img">
                                </a>
                                
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fas fa-calendar-alt"></i>
                                         {{ \Carbon\Carbon::parse($event->start_at)->format('d/m/Y H:i') }}
                                    </li>
                                    <li>
                                        <i class="far fa-user"></i>
                                        0
                                    </li>
                                </ul>
                                <h3>
                                    <a href="/su-kien-{{ $event->slug }}">
                                        {{ $event->title }}
                                    </a>
                                </h3>
                               
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                        ?>

                  
                    
                   
                </div>
            </div>
        </section>







       
@endsection
