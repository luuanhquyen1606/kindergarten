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
        <div class="breadcrumb-wrapper bg-cover" style="background-image: url('/themes/{{ config('theme.active') }}/assets//img/breadcrumb.png');">
            <div class="line-shape">
                <img src="/themes/{{ config('theme.active') }}/assets//img/breadcrumb-shape/line.png" alt="shape-img">
            </div>
            <div class="plane-shape float-bob-y">
                <img src="/themes/{{ config('theme.active') }}/assets//img/breadcrumb-shape/plane.png" alt="shape-img">
            </div>
            <div class="doll-shape float-bob-x">
                <img src="/themes/{{ config('theme.active') }}/assets//img/breadcrumb-shape/doll.png" alt="shape-img">
            </div>
            <div class="parasuit-shape float-bob-y">
                <img src="/themes/{{ config('theme.active') }}/assets//img/breadcrumb-shape/parasuit.png" alt="shape-img">
            </div>
            <div class="frame-shape">
                <img src="/themes/{{ config('theme.active') }}/assets//img/breadcrumb-shape/frame.png" alt="shape-img">
            </div>
            <div class="bee-shape float-bob-x">
                <img src="/themes/{{ config('theme.active') }}/assets//img/breadcrumb-shape/bee.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="page-heading">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{!! $post->title !!}</h1>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="/">
                                Home
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li>
                            Tin tức
                        </li>
                    </ul>
                </div>
            </div>
        </div>

<!-- News Details Section Start -->
        <section class="news-details fix section-padding">
            <div class="container">
                <div class="news-details-area">
                    <div class="row g-5">
                        <div class="col-12 col-lg-8">
                            <div class="blog-post-details">
                                <div class="single-blog-post">
                                    <div class="post-featured-thumb bg-cover" style="background-image: url('/get_photo/{{$post->photo_id}}/1024');"></div>
                                    <div class="post-content">
                                        <ul class="post-list d-flex align-items-center">
                                            <li>
                                                <i class="fa-regular fa-user"></i>
                                                {{$post->user_name}}
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-calendar-days"></i>
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-tag"></i>
                                                {{$post->category_name}}          
                                            </li>
                                        </ul>
                                        <h3>{!! $post->title !!} </h3>
                                       {!! $post->content !!}



                                        <div class="row g-4">
                                            <?php
                                            foreach($files as $file)
                                            {
                                            ?>
                                            <div class="col-lg-4">
                                                <div class="details-image">
                                                    <img style="aspect-ratio: 1; object-fit: cover;" src="<?php echo $file->path; ?>" alt="img">
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?> 
                                            
                                           
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="row tag-share-wrap mt-4 mb-5">
                                    <div class="col-lg-8 col-12">
                                        <div class="tagcloud">                                   
                                            <a href="news-details.html">Class</a>
                                            <a href="news-details.html">Sports</a>
                                            <a href="news-details.html">Canteen</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                        <div class="social-share">
                                            <span class="me-3">Share:</span>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-area">
                                    <div class="comments-heading">
                                        <h3>02 Comments</h3>
                                    </div>
                                    <div class="blog-single-comment d-flex gap-4 pt-4 pb-5">
                                        <div class="image">
                                            <img src="/themes/{{ config('theme.active') }}/assets//img/news/comment.png" alt="image">
                                        </div>
                                        <div class="content">
                                            <div class="head d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                <div class="con">
                                                    <h5><a href="news-details.html">Albert Flores</a></h5>
                                                    <span>March 20, 2024 at 2:37 pm</span>
                                                </div>
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="mt-30 mb-4">Neque porro est qui dolorem ipsum quia quaed inventor
                                                veritatis et quasi
                                                architecto var sed efficitur turpis gilla sed
                                                sit amet finibus eros. Lorem Ipsum is simply dummy</p>
                                            <a href="news-details.html" class="reply">Reply</a>
                                        </div>
                                    </div>
                                    <div class="blog-single-comment d-flex gap-4 pt-5 pb-5">
                                        <div class="image">
                                            <img src="/themes/{{ config('theme.active') }}/assets//img/news/comment-2.png" alt="image">
                                        </div>
                                        <div class="content">
                                            <div class="head d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                <div class="con">
                                                    <h5><a href="news-details.html">Alex Flores</a></h5>
                                                    <span>March 20, 2024 at 2:37 pm</span>
                                                </div>
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="mt-30 mb-4">Neque porro est qui dolorem ipsum quia quaed inventor
                                                veritatis et quasi
                                                architecto var sed efficitur turpis gilla sed
                                                sit amet finibus eros. Lorem Ipsum is simply dummy</p>
                                            <a href="news-details.html" class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-form-wrap pt-5">
                                    <h3>Leave a comments</h3>
                                    <form action="#" id="contact-form" method="POST">
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <span>Your Name*</span>
                                                    <input type="text" name="name" id="name" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <span>Your Email*</span>
                                                    <input type="text" name="email" id="email2" placeholder="Your Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <span>Message*</span>
                                                    <textarea name="message" id="message" placeholder="Write Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" class="theme-btn ">
                                                    post comment<i class="fa-solid fa-arrow-right-long"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="main-sidebar">
                                <div class="single-sidebar-widget">
                                    <div class="wid-title">
                                        <h3>Search</h3>
                                    </div>
                                    <div class="search-widget">
                                        <form action="#">
                                            <input type="text" placeholder="Search here">
                                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="single-sidebar-widget">
                                    <div class="wid-title">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="news-widget-categories">
                                        <ul>
                                            <li><a href="news-details.html">Teachers</a> <span>(5)</span></li>
                                            <li><a href="news-details.html">Indoor Games</a> <span>(3)</span></li>
                                            <li class="active"><a href="news-details.html">Education</a><span>(6)</span></li>
                                            <li><a href="news-details.html">Canteen</a> <span>(2)</span></li>
                                            <li><a href="news-details.html">Classes</a> <span>(4)</span></li>
                                            <li><a href="news-details.html">Examination</a> <span>(7)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-sidebar-widget">
                                    <div class="wid-title">
                                        <h3>Recent Post</h3>
                                    </div>
                                    <div class="recent-post-area">
                                        <div class="recent-items">
                                            <div class="recent-thumb">
                                                <img src="/themes/{{ config('theme.active') }}/assets//img/news/pp3.jpg" alt="img">
                                            </div>
                                            <div class="recent-content">
                                                <ul>
                                                    <li>
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        18 Dec, 2024
                                                    </li>
                                                </ul>
                                                <h6>
                                                    <a href="news-details.html">
                                                        That Jerk Form Finance <br>
                                                        Really Me
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="recent-items">
                                            <div class="recent-thumb">
                                                <img src="/themes/{{ config('theme.active') }}/assets//img/news/pp4.jpg" alt="img">
                                            </div>
                                            <div class="recent-content">
                                                <ul>
                                                    <li>
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        18 Dec, 2024
                                                    </li>
                                                </ul>
                                                <h6>
                                                    <a href="news-details.html">
                                                        How to keep Chidden Safe <br>
                                                        Online In Simple 
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="recent-items">
                                            <div class="recent-thumb">
                                                <img src="/themes/{{ config('theme.active') }}/assets//img/news/pp5.jpg" alt="img">
                                            </div>
                                            <div class="recent-content">
                                                <ul>
                                                    <li>
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        18 Dec, 2024
                                                    </li>
                                                </ul>
                                                <h6>
                                                    <a href="news-details.html">
                                                        Form Without Content <br>
                                                        Style Without
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-sidebar-widget">
                                    <div class="wid-title">
                                        <h3>Tags</h3>
                                    </div>
                                    <div class="news-widget-categories">
                                        <div class="tagcloud">
                                            <a href="news-standard.html">Time-Table</a>     
                                            <a href="news-details.html">Children</a>
                                            <a href="news-details.html">Examination</a>
                                            <a href="news-details.html">Class</a>
                                            <a href="news-details.html">Sports</a>
                                            <a href="news-details.html">Canteen</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





















    
@endsection
