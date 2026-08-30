
        <style>

            .news-single-items,
.news-right-items {
    height: 100%;
    
}
.col-lg-8 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
        </style>
        <!-- News Section Start -->
        <section class="news-section section-padding fix">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title">
                        <span class="wow fadeInUp">{{ $data['title'] }}</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $data['sub_title'] }}</h2>
                    </div>
                    <a href="/tin-tuc" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
                        Tin tức <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
                <div class="news-wrapper">
                    <div class="row  align-items-stretch">
                        <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay=".3s">

                        
                         <?php foreach ($posts as $index=>$post)
                        {    
                            if( $index>0 ) break;
                        ?>
                        
                            <div class="news-single-items">
                                <div class="news-image">
                                    <a href="/tin-tuc-{{$post->slug}}">
                                    <img style="max-height:400px; object-fit: cover;object-position: center;" src="/get_photo/{{$post->photo_id}}/500" alt="news-img">
                                    </a>
                                </div>
                                <div class="news-content">
                                    <ul>
                                        <li>
                                            <i class="fas fa-tag"></i> Cooking                       
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}                
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="/tin-tuc-{{$post->slug}}">{{$post->title}}</a>
                                    </h3>
                                    <p>
                                        {{$post->summary}}
                                    </p>
                                    <div class="post-author-items">
                                        <div class="post-items">
                                            <div class="thumb">
                                                <img style="width:50px;height:50px;object-fit:cover; border-radius: 50%;" src="/get_photo/{{$post->user_photo_id}}/100" alt="img">
                                            </div>
                                            <div class="content">
                                                <span>{{$post->user_name}}</span>
                                                <h6></h6>
                                            </div>
                                        </div>
                                        <a href="/tin-tuc-{{$post->slug}}" class="theme-btn">
                                            Chi tiết <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
  <?php
                        }
                        ?>
                          
                        </div>
                        <div class="col-xl-6 col-lg-8 mt-5 mt-xl-0">

                         <?php foreach ($posts as $index=>$post)
                        {    
                            if( $index==0 ) continue;
                        ?>
                            <div class="news-right-items wow fadeInUp" data-wow-delay=".4s">
                                <div class="news-thumb col-xl-6"  >
                                    <a href="/tin-tuc-{{$post->slug}}">
                                    <img style="height:250px;width:300px;object-fit:cover" src="/get_photo/{{$post->photo_id}}/500" alt="img">
                                    </a>
                                </div>
                                <div class="news-content col-xl-6">
                                    <ul>
                                        <li>
                                             <i class="fas fa-tag"></i> {{$post->category_name}}                              
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}              
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="/tin-tuc-{{$post->slug}}">
                                            {{$post->title}}
                                        </a>
                                    </h3>
                                    <div class="post-items">
                                        <div class="thumb">
                                            <img style="width:50px;height:50px;object-fit:cover; border-radius: 50%;" src="/get_photo/{{$post->user_photo_id}}/100" alt="img">
                                        </div>
                                        <div class="content"> 
                                            <span>{{$post->user_name}}</span>
                                            <h6></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>