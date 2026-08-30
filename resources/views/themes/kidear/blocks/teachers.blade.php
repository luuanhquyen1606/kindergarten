
<section class="team-one">
	<div class="team-one__bg kidearn-splax" data-para-options='{
		"orientation": "up",
		"scale": 1.5,
		"overflow": true
		}'>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1195 1252">
			<path
				d="M211.29 830.798C-198.76 707.556 65.7912 34.8903 361.688 40.6371C657.585 46.3839 708.035 114.612 848.844 103.059C989.653 91.5051 1158.39 -92.3898 1316.24 63.0933C1474.09 218.592 1356.45 408.609 1425.45 592.889C1478.72 735.167 1718.31 1057.1 1492.55 1209.42C1209.75 1400.22 1025.31 885.993 761.277 816.097C497.243 746.202 515.507 922.251 211.29 830.798Z" />
		</svg>
	</div>
	<div class="container">
		<div class="sec-title text-center">
	
	<h6 class="sec-title__tagline">{{ $data['title'] }}</h6><!-- /.sec-title__tagline -->
	
	<h3 class="sec-title__title">{{ $data['sub_title'] }}</h3><!-- /.sec-title__title -->
</div><!-- /.sec-title -->
		<div class="team-one__carousel kidearn-owl__carousel kidearn-owl__carousel--basic-nav kidearn-owl__carousel--with-shadow owl-carousel owl-theme"
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






            


            <?php
                            foreach ($teachers as $index=>$teacher)
                            {
                            ?>
			<div class="item">
				<div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms' style='--accent-color: #26A6A1;'>
	<div class="team-card__svg-top">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 207 157" fill="currentColor">
			<path d="M0.255249 1.69657C0.907365 0.855618 12.3312 0.403216 29.5368 0.426383C46.7158 0.513133 69.6055 1.28915 92.43 3.86789C115.129 6.52265 136.887 11.9096 152.332 18.8871C156.063 20.7291 160.018 22.2178 163.085 24.0834C166.027 26.0249 168.807 27.8183 171.326 29.4759C172.586 30.3047 173.783 31.1053 174.907 31.8548C175.906 32.6803 176.753 33.513 177.573 34.2768C179.212 35.8045 180.617 37.1329 181.716 38.2108C182.815 39.2886 184.157 40.5888 185.634 42.1007C187.067 43.6303 188.151 45.5893 189.621 47.6079C191.002 49.662 192.509 51.9048 194.115 54.2677C195.766 56.6128 196.54 59.4901 197.896 62.2698C199.074 65.1203 200.421 68.0095 201.537 71.0967C202.284 74.3024 203.059 77.5769 203.852 80.8974C205.752 87.4145 205.994 94.5861 206.495 101.496C207.754 129.351 201.165 155.955 198.932 156.465C195.811 157.22 197.496 131.837 192.769 105.828C191.373 99.4039 190.414 92.6477 187.897 86.6661C186.845 83.6072 185.802 80.5712 184.786 77.6041C183.331 74.8368 181.903 72.1384 180.52 69.5546C179.048 67.0063 178.105 64.3551 176.347 62.2643C174.679 60.1381 173.145 58.0913 171.694 56.2509C170.197 54.4283 169.113 52.6017 167.699 51.2504C166.276 49.8762 164.988 48.7137 163.971 47.7099C162.953 46.7061 161.692 45.48 160.232 44.014C159.485 43.3013 158.755 42.5021 157.872 41.71C156.864 40.994 155.794 40.2498 154.696 39.4367C152.464 37.8513 150.061 36.0947 147.461 34.2305C144.815 32.3841 141.282 30.9144 138.018 29.0738C124.431 22.0789 105.04 16.1286 84.1235 12.4784C63.162 8.84582 41.6318 6.79042 25.7309 5.21776C9.8033 3.70869 -0.387809 2.56047 0.255249 1.69657Z"/>
		</svg>
	</div><!-- /.top__shape -->
	<div class="team-card__svg-middle">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 217 98" fill="currentColor">
			<path d="M203.517 22.6552C120.489 128.266 3.54803 91.1587 2.29153 90.7596C0.667608 90.2287 -0.200435 88.4866 0.330195 86.8628C0.860825 85.2391 2.60286 84.3715 4.22678 84.9025C5.48328 85.3016 130.102 124.677 210.694 2.04102C211.597 0.592506 213.532 0.229286 214.961 1.15706C216.391 2.08483 216.774 3.99488 215.846 5.42433C211.856 11.5493 207.731 17.2946 203.517 22.6552Z"/>
		</svg>
	</div><!-- /.middle__shape -->
	<div class="team-card__image kidearn-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 5, "speed": 700, "scale": 1 }'>
		<img style="width: 400px;height: 400px; object-fit: cover;" src="/get_photo/<?php echo $teacher->id;?>/500" alt="Jane cooper">
	</div><!-- /.team-card__image -->
	<div class="team-card__content">
		<h3 class="team-card__title">
			<a href="team-details.html"><?php echo $teacher->name;?></a>
		</h3><!-- /.team-card__title -->
		<p class="team-card__designation">Art Teacher</p><!-- /.team-card__designation -->
		<div class="list-unstyled team-card__social__list">
			<a class="fb" href="https://facebook.com">
	<span class="social-bg">
		<svg viewBox="0 0 32 33" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M31.5 16.3589C31.5 20.5911 29.4895 24.2963 26.5247 27.0295C23.5615 29.7612 19.6738 31.4931 15.9801 31.7919C7.53366 31.7812 0.499996 24.8704 0.499997 16.3588C0.499998 12.0164 1.39914 8.15083 4.00159 5.36741C6.5968 2.59173 10.9785 0.794576 18.1657 0.791876C22.7642 1.09086 26.0753 2.85269 28.2459 5.56601C30.428 8.29363 31.5 12.0368 31.5 16.3589Z"/></svg>
	</span>
	<i class="fab fa-facebook-f" aria-hidden="true"></i>
	<span class="sr-only">Facebook</span>
</a>
<a class="li" href="https://www.linkedin.com/">
	<span class="social-bg">
		<svg viewBox="0 0 32 33" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M31.5 16.3589C31.5 20.5911 29.4895 24.2963 26.5247 27.0295C23.5615 29.7612 19.6738 31.4931 15.9801 31.7919C7.53366 31.7812 0.499996 24.8704 0.499997 16.3588C0.499998 12.0164 1.39914 8.15083 4.00159 5.36741C6.5968 2.59173 10.9785 0.794576 18.1657 0.791876C22.7642 1.09086 26.0753 2.85269 28.2459 5.56601C30.428 8.29363 31.5 12.0368 31.5 16.3589Z"/></svg>
	</span>
	<i class="fab fa-linkedin-in" aria-hidden="true"></i>
	<span class="sr-only">Linkedin</span>
</a>
<a class="yo" href="https://www.youtube.com">
	<span class="social-bg">
		<svg viewBox="0 0 32 33" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M31.5 16.3589C31.5 20.5911 29.4895 24.2963 26.5247 27.0295C23.5615 29.7612 19.6738 31.4931 15.9801 31.7919C7.53366 31.7812 0.499996 24.8704 0.499997 16.3588C0.499998 12.0164 1.39914 8.15083 4.00159 5.36741C6.5968 2.59173 10.9785 0.794576 18.1657 0.791876C22.7642 1.09086 26.0753 2.85269 28.2459 5.56601C30.428 8.29363 31.5 12.0368 31.5 16.3589Z"/></svg>
	</span>
	<i class="fab fa-youtube" aria-hidden="true"></i>
	<span class="sr-only">Youtube</span>
</a>
		</div><!-- /.list-unstyled team-card__social__list -->
	</div><!-- /.team-card__content -->
</div><!-- /.team-card -->
			</div><!-- /.team-item -->
			 <?php
                            }
                            ?>


















		</div>
	</div>
</section>



