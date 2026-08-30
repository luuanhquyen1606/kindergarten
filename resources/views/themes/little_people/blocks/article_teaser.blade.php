<!--about start-->
        <section class="about" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/about-bg.jpg);">
            <div class="container">
                <div class="item-box">
                    <div class="row">
                        <div class="single-column col-md-6 col-sm-12">
                            <div class="wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s" data-wow-offset="0" style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                                <div class="post-content">
                                    <div class="sec-title">
                                        <h2>{{ $data['title'] }}</h2>
                    
                                    </div>
                                    <div class="text" >
                                        {!! $data['sub_title'] !!}
                                    </div>
                                   
                                    <ul class="link_btn">
                                        <li><a href="/tin-tuc-{{ $post->slug }}" class="thm-btn">Chi tiết</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-column about_carousel col-md-6 col-sm-12">
                           
                                        <img class="w-100 h-100" style="max-height:250px;width:auto;border-radius:5px; " src="/get_photo/{{ $post->photo_id }}/500" alt="Awesome Image" />
                                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--about end-->