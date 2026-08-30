<!--latest-news start-->
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
         <!--latest-news end-->