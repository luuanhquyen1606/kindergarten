@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/2.jpg);">
        <div class="auto-container">
            <h1>Tin tức</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Trang chủ</a></li>
                <li>Tin tức</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Blog Section-->
    <section class="blog-section section-padding">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="blog-column col-md-8 col-sm-12 col-xs-12">

                    <?php
                    foreach ($posts as $post)
                    {
                    ?>
                    <!--News Style Three-->
                    <div class="news-style-three">
                        <div class="row clearfix">
                            <!--Image Column-->
                            <div class="image-column col-md-4 col-sm-4 col-xs-12">
                                <div class="image">
                                    <div class="date-box">{{ \Carbon\Carbon::parse($post->created_at)->format('d') }}<span>{{ \Carbon\Carbon::parse($post->created_at)->format('M') }}</span></div>
                                    <a href="/tin-tuc-{{$post->slug}}"><img style="aspect-ratio:4/3;object-fit:cover" src="<?php echo ($post->thumbnail_path)? $post->thumbnail_path:"/themes/".config('theme.active')."/images/resource/news-7.jpg";?>" alt="<?php echo $post->title;?>" /></a>
                                </div>
                            </div>
                            <!--Content Column-->
                            <div class="content-column col-md-8 col-sm-8 col-xs-12">
                                <div class="content-inner">
                                    <h3><a href="/tin-tuc-{{$post->slug}}"><?php echo $post->title;?></a></h3>
                                </div>
                                <div class="text">
                                    <?php
                                    echo \Illuminate\Support\Str::words(\Soundasleep\Html2Text::convert($post->content), 25);
                                    ?>
                                </div>
                                <a href="/tin-tuc-{{$post->slug}}" class="theme-btn btn-style-one mt-2">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                    @if ($posts->hasPages())
                    <div class="page-nav-wrap text-center mt-4">
                        <ul class="pagination">
                            <li><a href="{{ $posts->previousPageUrl() }}">&laquo;</a></li>
                            @foreach ($posts->links()->elements[0] ?? [] as $page => $url)
                            <li class="{{ $page == $posts->currentPage() ? 'active' : '' }}"><a href="{{ $url }}">{{ $page }}</a></li>
                            @endforeach
                            <li><a href="{{ $posts->nextPageUrl() }}">&raquo;</a></li>
                        </ul>
                    </div>
                    @endif

                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h3>Danh mục</h3>
                    </div>
                    <ul class="list">
                        <?php
                        foreach ($categories as $category)
                        {
                        ?>
                        <li><a href="/tin-tuc?danh-muc={{$category->slug}}">{{$category->name}}</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Section-->

@endsection
