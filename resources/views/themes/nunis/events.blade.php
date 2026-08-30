@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')
    
<section class="page-title">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-left">
                        <h1>Blog Page</h1>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-right text-right path"><a href="index.html">Home</a> &gt; <a href="#">Blog Page</a>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </section>


        <div class="sidebar-page">
            <div class="container"> 
                <div class="row clearfix">
                    <!--Content Side-->
                    <div class="blog-latest-news style-two col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                            
                            <?php
                            foreach ($events as $post)
                            {
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">
                                        <img style="border-radius:5px;height:200px;width:100%; object-fit:cover" src="<?php echo $post->thumbnail_path?>" alt="Awesome Image">
                                        <div class="overlay">
                                            <div class="inner">  
                                                <ul class="social">
                                                    <li><a href="/events/{{$post->id}}/{{$post->slug}}"><i class="fa fa-link"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </figure>
                                    <ul class="admin-comments">
                                        <li><i class="icon flaticon-black">Jone Doe </i>
                                        </li>
                                        <li><i class="icon flaticon-comments">4 Comments  </i>
                                        </li>
                                    </ul>
                                    <h4><a href="/events/{{$post->id}}/{{$post->slug}}">{{$post->title}}</a></h4>
                                    <div style="max-height:100px;overflow: hidden;">{!!$post->content!!}</div>  
                                </div>
                            </div> 
                            <?php      
                            }
                            ?>
                            
                            
                        </div>
                     
                        @if ($events->hasPages())
                           
                                <ul class="page_pagination style-two">
                                    {{-- Previous --}}
                                    <li class="tran3s page-item {{ $events->onFirstPage() ? 'disabled' : '' }}">
                                        <a class=" tran3s page-link" href="{{ $events->previousPageUrl() }}"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                    </li>
                                     {{-- Page Numbers --}}
                                        @foreach ($events->links()->elements[0] ?? [] as $page => $url)
                                            <li class="tran3s page-item {{ $page == $events->currentPage() ? 'active' : '' }}">
                                                <a class="tran3s {{ $page == $events->currentPage() ? 'active' : '' }} page-link " href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                    {{-- Next --}}
                                    <li class="tran3s page-item {{ !$events->hasMorePages() ? 'disabled' : '' }}">
                                        <a class=" tran3s page-link" href="{{ $events->nextPageUrl() }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                           
                        @endif

                       
                    </div>
                    <!--Content Side-->

                    <!--Sidebar-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <aside class="sidebar">


                            <!-- Popular Categories -->
                            <div class="widget popular-categories wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="sidebar-title">
                                    <h3>Categories</h3>
                                </div>

                                <ul class="list">
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Educations (6)</a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Childs (9)</a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Design (3)</a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Daily Meals (5)</a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span> Teachers (7)  </a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Lifestyle (3) </a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Uncategorized (2) </a>
                                    </li>
                                </ul>

                            </div>



                            <div class="widget popular-categories wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="sidebar-title">
                                    <h3>Popular Post</h3>
                                </div>

                                <ul class="list">
                                    <li><a href="#">Music Improve fugiat nulla</a>
                                    </li>
                                    <li><a href="#">Uncovers Ancient Ashkenaz tend</a>
                                    </li>
                                    <li><a href="#">Caring for a Pet Diabetic Kids</a>
                                    </li>
                                    <li><a href="#">Cras ultricies ligula magna libero</a>
                                    </li>
                                    <li><a href="#">Fatback sausage bacon ipsum kiela</a>
                                    </li>
                                </ul>

                            </div>

                            <div class="sidebar_tags wow fadeInUp animated animated" data-wow-duration="1500ms" style="visibility: visible; animation-name: fadeInUp; animation-duration: 1500ms;">
                                <div class="sidebar-title">
                                    <h3>Tags</h3>
                                </div>

                                <ul>
                                    <li><a href="#" class="tran3s">School</a>
                                    </li>
                                    <li><a href="#" class="tran3s">Study</a>
                                    </li>
                                    <li><a href="#" class="tran3s">English</a>
                                    </li>
                                    <li><a href="#" class="tran3s">Parents</a>
                                    </li>
                                    <li><a href="#" class="tran3s">Sports</a> </li>
                                    <li><a href="#" class="tran3s">News</a>
                                    </li>
                                    <li><a href="#" class="tran3s">Teachers</a> </li>
                                    <li><a href="#" class="tran3s">Art</a> </li>
                                    <li><a href="#" class="tran3s">Design</a> </li>
                                </ul>
                            </div>
                            <!-- End of .sidebar_tags -->


                        </aside>
                    </div>
                    <!--Sidebar-->
                </div>
            </div>
        </div>
@endsection
