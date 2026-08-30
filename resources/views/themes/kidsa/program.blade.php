@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')
@include('themes.common.partials.enroll_modal')


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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{$program->name ?? 'N/A'}}</h1>
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
                            <a href="/chuong-trinh-hoc">
                                Chương trình học
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="/chuong-trinh-hoc-{{$program->slug}}">
                                {{$program->name ?? 'N/A'}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--<< Program Details Section Start >>-->
        <section class="program-details-section fix section-padding">
            <div class="container">
                <div class="program-details-wrapper">
                    <div class="row g-5">
                        <div class="col-lg-8">
                            <div class="program-details-items">
                                <div class="details-image">
                                    <img src="/get_photo/{{$program->photo_id}}/1024" alt="img">
                                </div>
                                <div class="details-content">
                                    <div class="post" style="display: none;">
                                        <span>Kindergarten</span>
                                    </div>
                                    <h2 class="mb-0">{{$program->name ?? 'N/A'}}</h2>
                                    <div class="details-author-area">
                                        <div class="author-items">
                                            <img style="width:50px;height:50px;object-fit:cover; border-radius: 50%;" src="/get_photo/{{$program->teacher->photo_id ?? null}}/100" alt="img">
                                            <p>{{$program->teacher->name ?? 'N/A'}}</p>
                                        </div>
                                        <ul class="class-list">
                                            <li>
                                                <i class="fa-regular fa-circle-play me-2"></i>
                                                <?php echo count($program->classes) ; ?> lớp học
                                            </li>
                                            <li style="display: none;">
                                                <i class="fas fa-star me-2"></i>
                                                3.4 (36 Review)
                                            </li>
                                        </ul>
                                    </div>
                                    <h2>Chương trình học</h2>
                                    {!!$program->introduction!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="details-list-area">
                                <h3>Thông tin:</h3>
                                <ul class="details-list">
                                    <li>
                                        <span>
                                            <i class="fa-solid fa-chart-simple me-2"></i>
                                            Lứa tuổi
                                        </span>
                                        <?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa-regular fa-clock me-2"></i>
                                            Sĩ số:
                                        </span>
                                        <?php echo ($program->class_count);?> 
                                    </li>
                                   
                                </ul>
                                <a href="/chuong-trinh-hoc-{{$program->slug}}" class="theme-btn w-100 border-style mb-3">
                                    Học phí <?php echo ($program->tuition);?>
                                </a>
                                <a  data-bs-toggle="modal" data-bs-target="#enrollModal" href="/dang-ky-nhap-hoc-{{$program->slug}}" class="theme-btn w-100">
                                    Đăng ký nhập học <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                                <div class="social-icon d-flex align-items-center">
                                    <span>Share: </span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="program-author-items">
                                <div class="thumb">
                                    <img src="/get_photo/{{$program->teacher->photo_id ?? ''}}/1024" alt="img">
                                </div>
                                <div class="content">
                                    <h2>{{$program->teacher->name ?? 'N/A'}}</h2>
                                    <span>Children Diet</span>
                                    <p>
                                        Adipiscing elit. Mauris viverra nisl quis mollis laoreet. Ut eget lacus a felis accumsan pharetra in dignissim enim. In amet odio mollis urna aliquet volutpat. Sed bibendum nisl vehicula imperdiet imperdiet, augue massa fringilla.
                                    </p>
                                    <ul>
                                        <li>
                                            Email: {{$program->teacher->email ?? 'N/A'}}
                                        </li>
                                        <li>
                                            <i class="fas fa-user"></i>
                                            Phone: {{$program->teacher->phone ?? 'N/A'}}
                                        </li>
                                        <li style="display: none;">
                                            <i class="fa-solid fa-star color-star"></i>
                                            454 (36 Review)
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
                </div>
            </div>
        </section>



        
@endsection
