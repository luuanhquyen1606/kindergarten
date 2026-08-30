
  <!-- facility Start here -->
  <section class="facility facility-three padding-120">
    <div class="container">
      <div class="section-header">
        <h3>{{ $data['title'] ?? '' }}</h3>
        <p>{{ $data['sub_title'] ?? '' }}</p>
      </div>
      <div class="row">



         <?php foreach ($data['features'] as $feature)
                            {
                                if(!isset($feature['show']))
                                    {
                                        continue;
                                    }
                                    if($feature['show']!=1)
                                    {
                                        continue;
                                    }
                                ?>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="facility-item">
            <span class="icon flaticon-symbols"></span>
            <h4>{{$feature['title']}}</h4>
            <p>{{$feature['sub_title']}}</p>
          </div><!-- facility item -->
        </div>

 <?php
                            }
                            ?>

        
      </div><!-- row -->
    </div><!-- container -->
  </section><!-- facility -->
  <!-- facility End here -->


<section class="service-one" style="display: none;">
	<div class="service-one__bg kidearn-splax" data-para-options='{
		"orientation": "up",
		"scale": 1.5,
		"overflow": true
		}'>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 907 1117">
			<path d="M439.501 191.327C423.886 151.14 410.535 109.849 382.57 77.9193C364.573 57.2762 341.374 41.7837 316.691 29.9082C236.778 -8.54921 138.559 -8.863 55.8975 29.1363C-51.0518 78.3338 -92.2344 163.545 -124.062 267.647C-143.11 329.787 -172.464 389.023 -210.558 442.132C-241.37 485.071 -277.675 523.792 -309.262 566.153C-385.567 668.623 -459.365 778.565 -447.139 909.755C-441 975.319 -411.153 1039.68 -358.421 1077.45C-302.12 1117.73 -226.363 1123.79 -157.143 1109.58C-80.7379 1093.81 -14.8795 1049.94 58.6369 1028.82C138.638 1005.83 219.542 986.431 302.449 984.77C375.471 983.366 447.609 995.327 520.506 996.491C607.015 997.912 707.478 996.781 778.299 938.335C866.23 865.769 917.15 748.337 904.558 637.081C892.88 533.28 826.934 445.335 735.138 400.543C640.645 354.434 520.235 343.915 463.394 243.984C453.944 227.261 446.473 209.395 439.501 191.327Z"/>
		</svg>
	</div>
	<div class="service-one__shape kidearn-splax" style="background-image: url(/themes/{{ config('theme.active') }}/assets/images/shapes/about-bg-shape-1.png);" data-para-options='{
		"orientation": "left",
		"scale": 1.5,
		"overflow": true
		}'></div>
	<div class="container">
		<div class="row gutter-y-30">

            <?php foreach ($data['features'] as $feature)
                            {
                                if(!isset($feature['show']))
                                    {
                                        continue;
                                    }
                                    if($feature['show']!=1)
                                    {
                                        continue;
                                    }
                                ?>
			<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
				<div class="service-one__item" style="--accent-color: #75C137;">
					<div class="service-one__item__image-wrapper">
						<div class="service-one__item__image kidearn-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
							<img style="width: 250px; height: 250px; object-fit: cover;" src="/get_photo/{{$feature['photo_id']}}/500" alt="kidearn"/>
						</div>
						<div class="service-one__item__ball"></div>
					</div>
					<h4 class="service-one__item__title">{{$feature['title']}}</h4>
				</div>
			</div><!-- /.service-item -->

 <?php
                            }
                            ?>

			
		</div>
	</div>
</section>




<!--feature start-->
        <section class="feature" style="display: none;">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>{{ $data['title'] }}</h2>
                    <p>{{ $data['sub_title'] }}</p>
                </div>
                <div class="inner-box">
                    <div class="item-list">
                        <div class="row">

                            <?php foreach ($data['features'] as $feature)
                            {
                                if(!isset($feature['show']))
                                    {
                                        continue;
                                    }
                                    if($feature['show']!=1)
                                    {
                                        continue;
                                    }
                                ?>
                            <div class="item col-md-3 col-sm-6 col-xs-12">
                                <div class="border">
                                    <div class="icon-box">
                                        <div class="single-item" style="height: 100%;aspect-ratio: 16 / 9; overflow: hidden;">
                                    <div class="img-holder">
                                        <img src="/get_photo/{{$feature['photo_id']}}/500" alt="Awesome Image" style="width: 100%; height: 100%; object-fit: cover;object-position: center;" />
                                    </div>
                                </div>
                                    </div>
                                </div>
                                <h3><a href="#">{{ $feature['title'] }}</a></h3>
                                <p><center>{{ $feature['sub_title'] }}</center></p>
                            </div>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--feature end-->