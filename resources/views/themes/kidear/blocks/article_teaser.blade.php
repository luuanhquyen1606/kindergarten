<section class="about-one">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 wow " data-wow-delay="200ms">
				<div class="about-one__content">
					<div class="sec-title text-left">
	
	<h6 class="sec-title__tagline"></h6><!-- /.sec-title__tagline -->
	
	<h3 class="sec-title__title">{{ $data['title'] }}</h3><!-- /.sec-title__title -->
</div><!-- /.sec-title -->
					<p class="about-one__content__text">
						{!! $data['sub_title'] !!}
					</p>
					<a href="/tin-tuc-{{ $post->slug }}" class="kidearn-btn">
						<span>Chi tiết</span>
					</a>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-one__image">
					<div class="about-one__image__one kidearn-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 5, "speed": 700, "scale": 1 }'>
						<img style="height: 500px; width: 500px; object-fit: cover;" src="/get_photo/{{ $post->photo_id }}/1024" alt="kidearn"/>
					</div>
					<div class="about-one__image__border wow fadeInUp" data-wow-delay="200ms">
						<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/about-1-border.jpg" alt="kidearn"/>
					</div>
					<div class="about-one__image__leaf kidearn-splax" data-para-options='{
						"orientation": "left",
						"scale": 1.5,
						"overflow": true
						}'>
						<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/about-1-leaf.png" alt="kidearn"/>
					</div>
					<div class="about-one__image__ball wow fadeInUp" data-wow-delay="100ms"></div>
				</div>
			</div>
		</div>
	</div>
</section>



<!--about start-->
        <section style="display: none;" class="about" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/about-bg.jpg);">
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