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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $event->title }}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="/">
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li>
                             <a href="/su-kien">
                                Sự kiện
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li>
                             <a href="/su-kien/{{ $event->slug }}">
                                {{ $event->title }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--<< Event Details Section Start >>-->
        <section class="event-details-section fix section-padding">
            <div class="container">
                <div class="event-details-wrapper">
                    <div class="row g-5">
                        <div class="col-lg-8">
                            <div class="event-details-items">
                                <div class="details-image">
                                    <img src="/get_photo/{{ $event->photo_id }}/1024" alt="img">
                                </div>
                                <div class="event-details-content">
                                    <div class="post-items">
                                        <span class="post-date">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            {{ \Carbon\Carbon::parse($event->start_at)->format('d/m/Y') }}
                                        </span>
                                        <span class="post-time">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            {{ \Carbon\Carbon::parse($event->start_at)->format('H:i') }}
                                        </span>
                                    </div>
                                    <h2>{{ $event->title }}</h2>
                                    {!! $event->content !!}
                                   
                                    <div class="row g-4 mt-4">
                                       <?php
                                       if(isset($event->files))
                                        {
                                            foreach($event->files as $file)
                                            {
                                            ?>
                                            <div class="col-lg-4">
                                                <div class="details-image">
                                                    <img style="aspect-ratio: 1; object-fit: cover;" src="/get_photo/{{ $file->id }}/1024" alt="img">
                                                </div>
                                            </div>
                                            <?php
                                            }
                                        }
                                            ?>
                                    </div>
                                  
                                </div>
                                <div class="about-author">
                                    <div class="about-button">
                                        <a href="/su-kien-{{$event->slug}}/dang-ky" class="theme-btn">
                                           Đăng ký <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                    <div class="author-icon">
                                       <div class="icon">
                                            <i class="fa-solid fa-phone"></i>
                                       </div>
                                        <div class="content">
                                            <span>Điện thoại</span>
                                            <h5>
                                                <a href="tel:{{$app['school']->phone}}">{{$app['school']->phone}}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="details-list-area">
                                <h3>Thông tin sự kiện:</h3>
                                <ul class="details-list">
                                    
                                    <li>
                                        <span>
                                            <i class="fa-regular fa-clock me-2"></i>
                                            Thời gian:
                                        </span>
                                        {{ \Carbon\Carbon::parse($event->start_at)->format('d/m/Y H:i') }}
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fal fa-book-spells me-2"></i>
                                            Địa điểm:
                                        </span>
                                        {{ $event->location }}
                                    </li>
                                    
                                </ul>
                                <a href="/su-kien-{{ $event->slug }}/dang-ky" class="theme-btn w-100">
                                    Đăng ký <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                                <div class="social-icon d-flex align-items-center">
                                    <span>Share: </span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                            <div class="map-items">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





















    
@endsection
