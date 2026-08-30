
<?php
if(!isset($data['banners'])){
    echo "Cấu hình hero banner bằng nút thiết lập";
} 
else
{
?>

<!-- Banner Start here -->
  <section class="banner banner-three">
    <div class="banner-slider swiper-container">
      <div class="swiper-wrapper">




		<?php foreach ($data['banners'] as $slider)
                    {    
                        if(!$slider['photo_id']){
                            continue; 
                        }
                        if(!isset($slider['show'])){
                            continue;  
                        }
                    ?>
        <div style=" height: 750px;              /* same height for all */
  background-size: cover;     /* prevent distortion */
  background-position: center;
  background-repeat: no-repeat;background-image: url(/get_photo/<?php echo $slider['photo_id'];?>/1920);" class="banner-item slide-one swiper-slide">
          <div class="banner-overlay"></div>
          <div class="container">
            <div class="row">
              <div class="offset-lg-5 col-lg-6 col-xs-12">
                <div class="banner-content">
                  <h3><?php echo $slider['title'];?></h3>
                  <p><?php echo $slider['sub_title'];?></p>

				  <?php
                        if(isset($slider['cta']['url']) && $slider['cta']['url']!="")
                        {
                        ?>
                  <ul>
                    <li><a href="#" class="button-default">Chi tiết</a></li>
                  </ul>
				  <?php
						}
						?>


                </div><!-- banner-content -->
              </div>
            </div>
          </div><!-- container -->
        </div><!-- slide item -->
        

<?php }
                        ?>



      </div><!-- swiper-wrapper -->
      <div class="swiper-pagination"></div>
    </div><!-- swiper-container -->
  </section><!-- banner -->
  <!-- Banner End here -->

      <?php
    }
    ?>














	
<?php
if(!isset($data['banners'])){
    echo "Cấu hình hero banner bằng nút thiết lập";
} 
else
{
?>


<section class="banner-one" style="display: none;">
	<div class="banner-one__carousel kidearn-owl__carousel owl-carousel kidearn-owl__carousel--with-shadow" data-owl-options='{
		"loop": true,
		"animateOut": "fadeOut",
		"animateIn": "fadeInUp",
		"items": 1,
		"autoplay": true,
		"autoplayTimeout": 7000,
		"smartSpeed": 1000,
		"nav": false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
		"dots": true,
		"margin": 0
	    }'>


        <?php foreach ($data['banners'] as $slider)
                    {    
                        if(!$slider['photo_id']){
                            continue; 
                        }
                        if(!isset($slider['show'])){
                            continue;  
                        }
                    ?>
		<div class="item">
			<div class="banner-one__item">
				<div class="banner-one__bg" style="background-image: url(/get_photo/<?php echo $slider['photo_id'];?>/1920);"></div>
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="banner-one__content">
								<div class="banner-one__shape2"></div>
								<div class="banner-one__shape3"></div>
								<div class="banner-one__shape4">
									<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/banner-1-shape-2.png" alt="kidearn"/>
								</div>
								<div class="banner-one__shape5"><div class="banner-one__shape5-inner"></div>
								</div>
								<div class="banner-one__shape6"><div class="banner-one__shape6-inner"></div>
								</div>
								<div class="banner-one__content__bg"></div>
								<h2 class="banner-one__content__title"><?php echo $slider['title'];?></h2>
<?php
                        if(isset($slider['cta']['url']) && $slider['cta']['url']!="")
                        {
                        ?>

                             	<a href="<?php echo $slider['cta']['url'];?>" class="kidearn-btn">
									<span>Chi tiết</span>
								</a>
 <?php
                        }
                        ?>

								<div class="banner-one__shape1 kidearn-splax" style="background-image: url(/themes/{{ config('theme.active') }}/assets/images/shapes/banner-1-shape-1.png);" data-para-options='{
									"orientation": "down",
									"scale": 1.9,
									"overflow": true
									}'>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- slider-item -->
		
<?php }
                        ?>



	</div>
</section>

      <?php
    }
    ?>

