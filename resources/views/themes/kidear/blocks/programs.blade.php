
<!--our-courses section-->
<?php
if(!isset($data['programs']))
{
   echo "Block này chưa được cấu hình";
return;
}
?>
       

<section class="program-one">
	<div class="program-one__bg kidearn-splax" data-para-options='{
		"orientation": "up",
		"scale": 2.5,
		"overflow": true
		}'>
		<img src="/themes/{{ config('theme.active') }}/assets/images/shapes/program-bg-shape.png" alt="kidearn"/>
	</div>
	<div class="container">
		<div class="sec-title text-center">
	
	<h6 class="sec-title__tagline">{{ $data['title'] }}</h6><!-- /.sec-title__tagline -->
	
	<h3 class="sec-title__title">{{ $data['sub_title'] }}</h3><!-- /.sec-title__title -->
</div><!-- /.sec-title -->
		<div class="row">


<?php
                            foreach($programs as $program)
                            {
                                if(in_array($program->id,$data['programs']))
                                {
                            ?>
			<div class="col-lg-3 col-md-6">
				<div class="program-one__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms' style='--accent-color: #F25334;'>
    <div class="program-one__item__shape">
        <svg class="program-one__item__shape-one" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 43">
            <path d="M11.0817 6.98831C-9.7901 23.3302 2.35379 52.1177 18.5511 39.5735C34.7647 27.0458 39.1287 -14.9434 11.0817 6.98831Z"/>
        </svg>
        <svg class="program-one__item__shape-two" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 21">
            <path d="M5.28824 3.20713C-4.67276 11.0063 1.12287 24.745 8.85298 18.7583C16.5909 12.7795 18.6736 -7.25972 5.28824 3.20713Z"/>
        </svg>
    </div>
    <div class="program-one__item__bg"></div>
    <div class="program-one__item__image">
        <img style="height: 135px;" src="<?php echo $program->thumbnail_path; ?>" alt="Toddler">
    </div><!-- /.program-one__item__image -->
    <div class="program-one__item__content">
        <h3 class="program-one__item__title"><a href="programs-d-toddler.html"><?php echo $program->name;?></a></h3><!-- /.program-one__item__title -->
        <div class="program-one__item__age">( <?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi)</div><!-- /.program-one__item__age -->
        <p class="program-one__item__text">Số trẻ: <?php echo $program->class_count;?></p><!-- /.program-one__item__text -->
        <a class="program-one__item__rm" href="programs-d-toddler.html"><span class="icon-right-arrow"></span></a><!-- /.program-one__item__text -->
    </div><!-- /.program-one__item__content -->
</div><!-- /.program-one__item__one -->
			</div><!-- /.program-item -->



 <?php
                            }
                                }      
                            ?>

		</div>
	</div>
</section>