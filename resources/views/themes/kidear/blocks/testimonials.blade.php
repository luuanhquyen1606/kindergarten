
<section class="testimonial-one">
	<div class="testimonial-one__pen kidearn-splax" data-para-options='{
		"orientation": "left",
		"scale": 2.5,
		"overflow": true
		}'>
		<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/pen.png" alt="kidearn"/>
	</div>
	<div class="container">
		<div class="testimonial-one__area">
			<div class="testimonial-one__bg"></div>
			<div class="testimonial-one__bg-shape kidearn-splax" style="background-image: url(/themes/{{ config('theme.active') }}/assets/images/shapes/testimonial-shape-1.png);" data-para-options='{
				"orientation": "down",
				"scale": 1.5,
				"delay": ".3",
				"transition": "cubic-bezier(0,0,0,1)",
				"overflow": true
				}'>
			</div>
			<div class="testimonial-one__star-left"><img src="/themes/{{ config('theme.active') }}/assets/images/shapes/star1.png" alt="kidearn"/></div>
			<div class="testimonial-one__star-right"><img src="/themes/{{ config('theme.active') }}/assets/images/shapes/star2.png" alt="kidearn"/></div>
			<div class="sec-title text-center">
	
	<h6 class="sec-title__tagline">{{$data['title']}}</h6><!-- /.sec-title__tagline -->
	
	<h3 class="sec-title__title">{{$data['sub_title']}}</h3><!-- /.sec-title__title -->
</div><!-- /.sec-title -->
			<div class="testimonial-one__carousel kidearn-owl__carousel owl-carousel owl-theme"
				data-owl-options='{
				"items": 1,
				"margin": 0,
				"loop": true,
				"smartSpeed": 700,
				"nav": true,
				"navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
				"dots": false,
				"autoplay": false
				}'>

<?php
                        foreach ($testimonials as $index=>$testimonial)
                        {
                        ?>
				<div class="item">
					<div class="testimonial-<?php echo $index;?>__item">
						<div class="testimonial-<?php echo $index;?>__item__quote" style="min-height: 150px;">
							<?php echo $testimonial->content;?> 
						</div>
						<div class="testimonial-one__item__author">
							<img src="/themes/{{ config('theme.active') }}/assets/images/resources/testi-author-1.png" alt="kidearn"/>
							<h5 class="testimonial-one__item__author__name"><?php echo $testimonial->name;?></h5>
							<p class="testimonial-one__item__author__designation"><?php echo $testimonial->name;?> - <span>(<?php echo $testimonial->email;?> / <?php echo $testimonial->phone;?></p>
						</div>
					</div>
				</div>
				<?php
                        }
                        ?>




			</div>
		</div>
	</div>
</section>
<!--founder section-->
        <section style="display: none;" class="founder" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/founder.jpg);">
            <h3 style="color: white !important;">{{$data['title']}}</h3>  <br />
            <div class="container">
                
                <div class="overlay">
                    
                    <div class="founder-carousel">

                        <?php
                        foreach ($testimonials as $testimonial)
                        {
                        ?>
                        <div class="item">
                            <figure class="icon-box">
                                <i class="icon fa fa-quote-right" aria-hidden="true"></i>
                            </figure>
                            <div class="content-holder">
                                <h4><?php echo $testimonial->name;?> - <span>(<?php echo $testimonial->email;?> / <?php echo $testimonial->phone;?>)</span></h4>
                                <p><?php echo $testimonial->content;?> </p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>
        <!--founder section end-->