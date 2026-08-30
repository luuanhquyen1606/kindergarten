<?php
if(!isset($data['banners'])){
    echo "Cấu hình hero banner bằng nút thiết lập";
    die();
} 
?>
<section class="tf-slider-2">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-2">
                                    <div class="themesflat-carousel clearfix" data-margin="30" data-item="1" data-item2="1" data-item3="1" data-item4="1" data-auto="false">
                                        <div class="owl-carousel owl-theme none dots-none">







                                            <?php foreach ($data['banners'] as $slider)
                    {    
                        if(!$slider['photo_id']){
                            continue; 
                        }
                        if(!isset($slider['show'])){
                            continue;  
                        }
                    ?>
                                            <div class="item-slider-2">
                                                <div class="box-content">
                                                    <div class="sub f-rubik clr-pri-3"></div>
                                                    <div class="title clr-pri-2"></div>
                                                    <p class="wrap f-rubik"><?php echo $slider['sub_title'];?></p>
                                                    <?php
                        if(isset($slider['cta']['url']) && $slider['cta']['url']!="")
                        {
                        ?>
                                                    <div class="btn-slider">
                                                        <a href="<?php echo $slider['cta']['url'];?>" class="fl-btn st-2">
                                                            <span class="inner">Chi tiết</span>
                                                        </a>
                                                    </div>
<?php
                        }
                        ?>

                                                </div>
                                                <div class="sc-img fx">
                                                    <img src="/get_photo/<?php echo $slider['photo_id'];?>" alt="">
                                                    <p>Sit amet consec teture adipiscing elit sed</p>
                                                </div>
                                                <div class="box-feature">
                                                    <div class="image"><img src="/get_photo/<?php echo $slider['photo_id'];?>" alt="Image"></div>
                                                </div>
                                            </div>
                                            

                <?php } ?>






                                        </div>
                                    </div><!--/.themesflat-carousel-->
                            </div><!--/.slider-2-->
                        </div>
                    </div>
                </div>
            </section>