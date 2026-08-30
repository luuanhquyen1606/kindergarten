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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Tin tức</h1>
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












        <!-- News Standard Section Start -->
         <section class="news-standard fix section-padding">
            <div class="container">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <div class="news-standard-wrapper">







                            <?php
                            foreach ($posts as $post)
                            {
                            ?>
                           


                            <div class="news-standard-items">
                                <div class="news-thumb">
                                    <img src="<?php echo ($post->thumbnail_path)? $post->thumbnail_path:"/themes/".config('theme.active')."/images/blog/4.png";?>" alt="img">
                                    <div class="post">
                                        <span>Activities</span>
                                     </div>
                                </div>
                                <div class="news-content">
                                    <ul>
                                        <li>
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                                        </li>
                                        <li>
                                            <i class="far fa-user"></i>
                                            By admin
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="news-details.html">{{$post->title}}</a>
                                    </h3>
                                    
                                    <p>
                                        <?php
                                        libxml_use_internal_errors(true);

                                        $dom = new DOMDocument();
                                        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $post->content);

                                        libxml_clear_errors();
                                        ?>
                                        {{ \Illuminate\Support\Str::words(\Soundasleep\Html2Text::convert($post->content), 20) }}
                                     
                                    </p>
                                    <a href="/tin-tuc-{{$post->slug}}" class="theme-btn mt-4">
                                        chi tiết
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>


                            @if ($posts->hasPages())
                           <div class="page-nav-wrap pt-5 text-center">
                                <ul class="page-nav-wrap pt-5 text-center">
                                    {{-- Previous --}}
                                     <li><a class="page-numbers" href="{{ $posts->previousPageUrl() }}"><i class="fa-solid fa-arrow-left-long"></i></a></li>
                                     {{-- Page Numbers --}}
                                        @foreach ($posts->links()->elements[0] ?? [] as $page => $url)
                                          
                                            <li class=""><a class="page-numbers {{ $page == $posts->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a></li>
                                        @endforeach
                                    {{-- Next --}}
                                    <li><a class="page-numbers" href="{{ $posts->nextPageUrl() }}"><i class="fa-solid fa-arrow-right-long"></i></a></li>
                                    
                                </ul>
                           </div>
                            @endif

                           
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
                                            <img src="/themes/{{ config('theme.active') }}/assets/img/news/pp3.jpg" alt="img">
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
                                            <img src="/themes/{{ config('theme.active') }}/assets/img/news/pp4.jpg" alt="img">
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
                                            <img src="/themes/{{ config('theme.active') }}/assets/img/news/pp5.jpg" alt="img">
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
        </section>





















@endsection
