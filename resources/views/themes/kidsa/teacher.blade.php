@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')


     
       

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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{$teacher->name}}</h1>
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
                           <a href="/giao-vien">
                                Giáo viên
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--<< Team Details Section Start >>-->
        <section class="team-details-section fix section-padding pb-0">
            <div class="container">
                <div class="team-details-wrapper">
                    <div class="team-author-items ">
                        <div class="thumb">
                            <img src="/get_photo/{{$teacher->photo_id}}" alt="img">
                        </div>
                        <div class="content">
                            <h2>{{$teacher->name}}</h2>
                            {!!$teacher->about!!}
                            <ul>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    {{$teacher->phone}}
                                </li>
                                <li>
                                    <i class="fas fa-email"></i>
                                    {{$teacher->email}}
                                </li>
                                <li>
                                    <i class="fa-solid fa-star color-star"></i>
                                    {{$teacher->address}}
                                </li>
                            </ul>
                            <div class="social-icon d-flex align-items-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>

        <!-- Team Section Start -->
        <section class="team-section-4 fix section-padding pt-80">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title">
                        <h2 class="fz-40 wow fadeInUp" data-wow-delay=".3s">Các giáo viên</h2>
                    </div>
                    <div class="array-button wow fadeInUp" data-wow-delay=".5s">
                        <button class="array-prev border-array-style"><i class="fal fa-arrow-left"></i></button>
                        <button class="array-next"><i class="fal fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="swiper team-slider">
                    <div class="swiper-wrapper">



                    <?php foreach ($teachers as $teacher)
                        {
                            ?>
                        <div class="swiper-slide">
                            <div class="team-items">
                                <div class="team-image">
                                    <div class="shape-img">
                                        <img src="/themes/{{ config('theme.active') }}/assets/img/team/team-shape.png" alt="img">
                                    </div>
                                    <a href="/giao-vien-{{$teacher->slug}}">
                                    <img style="aspect-ratio:3/4; object-fit:cover" src="/get_photo/{{$teacher->photo_id}}/500" alt="team-img">
                                    </a>
                                    <div class="social-profile">
                                        <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <h3>
                                        <a href="/giao-vien-{{$teacher->slug}}">{{$teacher->name}}</a>
                                    </h3>
                                    <p>Instructors</p>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>



                    </div>
                </div>
            </div>
        </section>


@endsection
