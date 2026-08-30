<section class="blog-area pt-120 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 pb-45">
                    <div class="section-title text-center">
                        <span>{{ $data['title'] }}</span>
                        <h3 class="title">{{ $data['sub_title'] }}</h3>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row justify-content-center">




                <?php foreach ($posts as $post)
                        {    
                        ?>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-blog-area">
                        <div class="single-blog-img">
                            <img style="height:250px; width: 100%; object-fit: cover;" src="/get_photo/{{$post->photo_id}}/500" alt="">
                        </div>
                        <h3><a href="/tin-tuc-{{$post->slug}}">{{$post->title}}</a></h3>
                        <p>{{$post->summary}}</p>
                        <div class="single-blog-date-time">
                            <span><i class="far fa-calendar-alt"></i>25 Nov 2020</span>
                            <a href="/tin-tuc-{{$post->slug}}" class="blog-btn">View Details<i class="fal fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>


<?php
                        }
                        ?>

               
                
            </div>
            <div class="row pt-20">
                <div class="col-md-12 text-center">
                    <a href="" class="main-btn blog-btn">View More News<i class="fal fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>
    </section>


<!--
        <section class="latest-news">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>{{ $data['title'] }}</h2>
                    <p>{{ $data['sub_title'] }} </p>
                </div>
                <div class="content-box">
                    <div class="row">
                        <div class="item-list" style=" ">

                        <?php foreach ($posts as $post)
                        {    
                        ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box" style=" height: 200px;flex: 1;">
                                        <img style="width: 100%;height: 100%; object-fit: cover;border-radius:5px; " src="/get_photo/{{$post->photo_id}}/500" alt="Awesome Image">
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="/tin-tuc-{{$post->slug}}"><i class="fa fa-link"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </figure>
                                    <ul class="admin-comments">
                                        <li><i class="icon flaticon-black"> Jone Doe  </i>
                                        </li>
                                        <li><i class="icon flaticon-comments">4 Comments </i>
                                        </li>
                                    </ul>
                                    <h4><a href="/tin-tuc-{{$post->slug}}">{{$post->title}}</a></h4>

                                    <p>{{$post->summary}}</p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        -->