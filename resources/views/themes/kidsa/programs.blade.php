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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Chương trình học</h1>
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


        <!-- Clases Section Start -->
        <section class="clases-section section-padding pt-0">
            <div class="container">
                <div class="row g-4">








                     <?php
                        foreach($programs as $program)
                            {
                        ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="clases-items mt-0">
                            <div class="clases-bg style-2"></div>
                            <div class="clases-image">
                                <a href="/chuong-trinh-hoc-{{$program->slug}}">
                                <img style="aspect-ratio: 4/2; object-fit: cover;" src="/get_photo/{{$program->photo_id}}/500" alt="img">
                                </a>
                            </div>
                            <div class="clases-content">
                                <h4>
                                    <a href="/chuong-trinh-hoc-{{$program->slug}}">{{$program->name}}</a>
                                </h4>
                                <p>Nulla a auctor leo. Vestibulum viverra mattis arcu <br> nec viverra. Vivamus </p>
                                <ul class="clases-schedule">
                                    <li>
                                        <span>Lứa tuổi</span> <br>
                                        <?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi
                                    </li>
                                    <li>
                                        <span>Học phí căn bản</span> <br>
                                        <?php echo ($program->tuition)?>
                                    </li>
                                    <li>
                                        <span>Sĩ số</span> <br>
                                        <?php echo ($program->class_count)?>
                                    </li>
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









        
@endsection
