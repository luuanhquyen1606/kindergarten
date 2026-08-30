
<section class="blog-three">
	<div class="blog-three__shape-right kidearn-splax" data-para-options='{
		"orientation": "right",
		"scale": 3.5,
		"overflow": true
		}'>
		<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/blog-3-shape-1.png" alt="kidearn"/>
	</div>
	<div class="blog-three__shape-left kidearn-splax" data-para-options='{
		"orientation": "left",
		"scale": 3.5,
		"overflow": true
		}'>
		<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/blog-3-shape-2.png" alt="kidearn"/>
	</div>
	<div class="container">
		<div class="sec-title text-center">
	
	<h6 class="sec-title__tagline">{{ $data['title'] }}</h6><!-- /.sec-title__tagline -->
	
	<h3 class="sec-title__title">{{ $data['sub_title'] }}</h3><!-- /.sec-title__title -->
</div><!-- /.sec-title -->
		<div class="blog-three__carousel kidearn-owl__carousel kidearn-owl__carousel--basic-nav owl-carousel owl-theme"
			data-owl-options='{
			"items": 1,
			"margin": 0,
			"loop": false,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
			"dots": true,
			"autoplay": false,
			"responsive": {
				"0": {
					"items": 1
				},
				"576": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
			}'>



            <?php foreach ($posts as $post)
                        {    
                        ?>
			<div class="item">
				<div class="blog-card-three wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms' style='--accent-color: #F25334;'>
    <div class="blog-card-three__bg"></div>
    <div class="blog-card-three__image">
        <img style="height: 190px;width: 295px; object-fit: cover;" src="/get_photo/{{$post->photo_id}}/500" alt="10 easy steps to more learn about play">
       
        <a href="/tin-tuc-{{$post->slug}}" class="blog-card-three__image__link"><span class="sr-only">10 easy steps to more learn about play</span><!-- /.sr-only --></a>
    </div><!-- /.blog-card-three__image -->
    <div class="blog-card-three__content">
        <div class="blog-card-three__content__top">
            <a href="blog-list.html" class="blog-card-three__category">Kindergarten</a>
            <div class="blog-card-three__date">30 Mar, 2023</div><!-- /.blog-card-three__date -->
        </div><!-- /.blog-card-three__content__top -->
        <h3 class="blog-card-three__title"><a href="/tin-tuc-{{$post->slug}}">{{$post->title}}</a></h3><!-- /.blog-card-three__title -->
        <div class="blog-card-three__content__bottom">
            <div class="blog-card-three__author">
                <div class="blog-card-three__author__image">
                    <img src="/get_photo/{{$post->photo_id}}/500" alt="Wade Warren">
                </div><!-- /.blog-card-three__author__image -->
                <div class="blog-card-three__author__content">
                    <h4 class="blog-card-three__author__name">Wade Warren</h4><!-- /.blog-card-three__author__name -->
                    <p class="blog-card-three__author__designation">CEO</p><!-- /.blog-card-three__author__designation -->
                </div><!-- /.blog-card-three__author__content -->
            </div><!-- /.blog-card-three__author -->
        </div><!-- /.blog-card-three__content__bottom -->
    </div><!-- /.blog-card-three__content -->
</div><!-- /.blog-card-three -->
			</div><!-- /.item -->
			
            <?php
         }
            ?>



		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.blog-three -->



<!--latest-news start-->
        <section class="latest-news" style="display: none;">
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