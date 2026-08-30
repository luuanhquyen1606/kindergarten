@extends('themes.' . config('theme.active') . '.layouts.blog')
@section('content')
<section class="tf-page-title">
                <div class="overlay"></div>
                <img src="/themes/{{ config('theme.active') }}/assets/images/background/img1innerpage.png" class="bg-inner1" alt="">
                <img src="/themes/{{ config('theme.active') }}/assets/images/background/img2innerpage.png" class="bg-inner2" alt="">
                <img src="/themes/{{ config('theme.active') }}/assets/images/background/img4innerpage.png" class="bg-inner3" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title inner">
                                <h1 class="title">Tin tức</h1>
                                <div class="breadcrumbs">
                                    <ul class="jus-ct">
                                        <li><a href="index.html" class="f-rubik">Home</a></li>
                                        <li><p class="breadcrumbs-inner f-rubik">Blog List</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </section>
            
            <section class="tf-section tf-blog-list">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-12">








                            <?php
                            foreach ($events as $post)
                            {
                            ?>
                            <article class="box-blog-list">
                                <div class="box-feature wow fadeIn   animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 0.3ms;">
                                    <img  style="width: 100%;aspect-ratio: 2 / 1; object-fit: cover;" src="<?php echo ($post->thumbnail_path)? $post->thumbnail_path:"/themes/".config('theme.active')."/images/blog/4.png";?>" alt="Image"></div>
                                <div class="box-content">
                                    <div class="meta-post st-2">
                                        <ul class="fx">
                                            <li class="fx"><i class="far fa-calendar-alt clr-pri-3"></i>25 Dec 2021</li>
                                            <li class="fx"><i class="far fa-comment-alt-dots clr-pri-3"></i>Comments (05)</li>
                                        </ul>
                                    </div>
                                    <h3 class="title-article-post"><a href="/su-kien-{{$post->slug}}">{{$post->title}} </a></h3>
                                    <p class="sub f-rubik" >
                                        {!! \Illuminate\Support\Str::words(strip_tags($post->content), 128, '...') !!}
                                  </p>
                                    <div class="box-btn">
                                        <a href="/su-kien-{{$post->slug}}" class="fl-btn st-1">
                                            <span class="inner">Chi tiết</span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <?php
                            }
                            ?>











                            @if ($events->hasPages())
                           
                            <div class="themesflat-pagination st-2" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <ul>
                                    {{-- Previous --}}
                                    <li class="custom  {{ $events->onFirstPage() ? 'disabled' : '' }}">
                                        <a class=" muted3-color tran3s page-link" href="{{ $events->previousPageUrl() }}"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                    </li>
                                 {{-- Page Numbers --}}
                                  @foreach ($events->links()->elements[0] ?? [] as $page => $url)
                                            <li class="  {{ $page == $events->currentPage() ? 'custom' : '' }}">
                                                <a class="page-numbers {{ $page == $events->currentPage() ? '' : '' }}  " href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                              

                                  {{-- Next --}}
                                  <li class="custom st-2  {{ !$events->hasMorePages() ? 'disabled' : '' }}">
                                        <a class=" muted3-color" href="{{ $events->nextPageUrl() }}"><i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                                    </li>
                                 
                                </ul>
                            </div>

                               
                        @endif

                            
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                            <div id="sidebar" class="sidebar-style2 wow fadeIn   animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 0.3ms;">
                                <div class="inner-sidebar fl-st-1">
                                    <div class="widget widget-quote">
                                        <div class="box-feature">
                                            <div class="inner">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/post/post-quotes2.jpg" alt="Image">
                                                <div class="box-icon jus-ali-ct">
                                                    <i class="far fa-quote-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-content">
                                            <h5 class="author clr-pri-2">Patrick D. Smith</h5>
                                            <p class="wrap f-rubik">
                                                Sit amet consectetur adipiscing elit sed do eiusmod tempor didunt ut labore et dolore magna
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget widget-search st-2">
                                        <h4 class="title-widget fl-ctm-1">Search<span class="ctm-inner"></span></h4>
                                        <div class="form-search-widget">
                                            <form action="#">
                                                <input type="text" placeholder="Search Here">
                                                <button><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="widget widget-category st-2">
                                        <h4 class="title-widget fl-ctm-1">category<span class="ctm-inner"></span></h4>
                                        <div class="list-category">
                                            <ul>
                                                <li class="fx"><span class="st wd-ctm">Arts &amp; Drawing</span><span class="st">05</span></li>
                                                <li class="fx"><span class="st wd-ctm">Basic Language</span><span class="st">02</span></li>
                                                <li class="fx"><span class="st wd-ctm">Graphics Design</span><span class="st">07</span></li>
                                                <li class="fx"><span class="st wd-ctm">Web Development</span><span class="st">04</span></li>
                                                <li class="fx"><span class="st wd-ctm">Lifestyle</span><span class="st">06</span></li>
                                                <li class="fx"><span class="st wd-ctm">GYM &amp; Gaming</span><span class="st">05</span></li>
                                                <li class="fx"><span class="st wd-ctm">Events &amp; Party</span><span class="st">05</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="widget widget-news st-2">
                                        <h4 class="title-widget fl-ctm-1">recent news<span class="ctm-inner"></span></h4>
                                        <ul class="list-news">
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget1.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-single.html">Bake Layers Accesilit Testing Supporte</a></h6></li>
                                                    <li><a href="blog-single.html" class="fx meta-news clr-pri-4"><i class="far fa-calendar-alt"></i><span class="f-rubik">25 nov 2021</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget2.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-single.html">Bake Layers Accesilit Testin Supporte</a></h6></li>
                                                    <li><a href="blog-single.html" class="fx meta-news clr-pri-4"><i class="far fa-calendar-alt"></i><span class="f-rubik">25 nov 2021</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget3.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-single.html">Bake Layers Accesilit Testin Supporte</a></h6></li>
                                                    <li><a href="blog-single.html" class="fx meta-news clr-pri-4"><i class="far fa-calendar-alt"></i><span class="f-rubik">25 nov 2021</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget4.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-single.html">Bake Layers Accesilit Testin Supporte</a></h6></li>
                                                    <li><a href="blog-single.html" class="fx meta-news clr-pri-4"><i class="far fa-calendar-alt"></i><span class="f-rubik">25 nov 2021</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="widget widget-tag st-2">
                                        <h4 class="title-widget fl-ctm-1">best tags<span class="ctm-inner"></span></h4>
                                        <ul class="list-tag">
                                            <li><a href="shop-details.html" class="f-rubik active">Technology</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">service</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">team</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">solutions</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">consultancy</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">It Company</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">agency</a></li>
                                        </ul>
                                    </div>

                                    <div class="widget widget-gallery st-2">
                                        <h4 class="title-widget fl-ctm-1">photo gallery<span class="ctm-inner"></span></h4>
                                        <div class="list-gallery fx">
                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget5.jpg" alt="Image">
                                            </div>
                                            <div class="box-photo active">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget1.jpg" alt="Image">
                                            </div>
                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget6.jpg" alt="Image">
                                            </div>

                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget7.jpg" alt="Image">
                                            </div>
                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget3.jpg" alt="Image">
                                            </div>
                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget8.jpg" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/inner-sidebar-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

@endsection
