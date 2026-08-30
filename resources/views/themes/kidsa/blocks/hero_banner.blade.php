
<?php
if(!isset($data['banners'])){
    die ("Cấu hình hero banner bằng nút thiết lập");
} 
?>
        <!-- Hero Section Start -->
        <section class="hero-section hero-3">
            <div class="swiper hero-slider">
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
                    <div class="swiper-slide">
                        <div class="slider-image bg-cover" style="height:700px; background-image: url('/get_photo/<?php echo $slider['photo_id'];?>');">
                            <div class="parasuit-shape" data-animation="fadeInLeft" data-delay="2.1s">
                                <img src="/themes/{{ config('theme.active') }}/assets/img/hero/parasuit.png" alt="shape-img">
                            </div>
                            <div class="doll-shape" data-animation="fadeInLeft" data-delay="2.3s">
                                <img src="/themes/{{ config('theme.active') }}/assets/img/hero/doll.png" alt="shape-img">
                            </div>
                            <div class="bus-shape" data-animation="fadeInLeft" data-delay="2.4s">
                                <img src="/themes/{{ config('theme.active') }}/assets/img/hero/bus.png" alt="shape-img">
                            </div>
                            <div class="bee-shape" data-animation="fadeInUp" data-delay="2.5s">
                                <img src="/themes/{{ config('theme.active') }}/assets/img/hero/bee-2.png" alt="shape-img">
                            </div>
                            <div class="star-shape" data-animation="fadeInUp" data-delay="2.4s">
                                <img src="/themes/{{ config('theme.active') }}/assets/img/hero/star-2.png" alt="shape-img">
                            </div>
                            <div class="container">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-8">
                                        <div class="hero-content">
                                            <h5  data-animation="fadeInUp" data-delay="1.3s">{{$app['school']->name}}</h5>
                                            <h1  style="color:white" data-animation="fadeInUp" data-delay="1.5s">
                                                <?php echo $slider['title'];?></span>
                                            </h1>
                                            <p  style="color:white" data-animation="fadeInUp" data-delay="1.7s">
                                                <?php echo $slider['sub_title'];?>
                                            </p>
                                            <div class="hero-button">
                                                <?php if(isset($slider['routing_id']))
                                                {
                                                ?>
                                                <a href="{{getRoutingUrl($slider['routing_id'])}}" data-animation="fadeInUp" data-delay="1.7s" class="theme-btn hover-white">
                                                    Chi tiết
                                                    <i class="fa-solid fa-arrow-right-long"></i>
                                                </a>
                                                <?php
                                                }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

 <?php }
                        ?>

                </div>
                <div class="swiper-dot text-center pt-5">
                    <div class="dot"></div>
                </div>
            </div>
        </section> 