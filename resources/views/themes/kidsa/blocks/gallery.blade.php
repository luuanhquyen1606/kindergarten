 <!-- Instagram Banner Section Start -->
        <div class="instagram-banner fix section-padding">
            <div class="instagram-wrapper">
                <h3 class="text-center wow fadeInUp" data-wow-delay=".3s">{{$data['title']}}</h3>
                <div class="swiper instagram-banner-slider">
                    <div class="swiper-wrapper">



                     <?php
            foreach ($files as $file)
            {
            ?>
                        <div class="swiper-slide">
                            <div class="instagram-banner-items">
                                <div class="banner-image" style="width:225px">
                                    <img style="width:225px;height:150px;object-fit: cover;object-position: center;" src="{{getPhotoUrl($file->id)}}" alt="insta-img">
                                    <a href="/" class="icon">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
<?php
            }
            ?>


                    </div>
                </div>
            </div>
        </div>