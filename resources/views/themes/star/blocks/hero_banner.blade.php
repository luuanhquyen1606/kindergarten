<?php
if(!isset($data['banners'])){
    echo "Cấu hình hero banner bằng nút thiết lập";
} 
else{
?>
 <!--Start rev slider wrapper-->
        <section class="rev_slider_wrapper">
            <div id="slider1" class="rev_slider" data-version="5.0">
                <ul>
                    <?php foreach ($data['banners'] as $slider)
                    {    
                        if(!$slider['photo_id']){
                            continue; 
                        }
                        if(!isset($slider['show'])){
                            continue;  
                        }
                    ?>
                    <li data-transition="fade">
                        <img src="/get_photo/<?php echo $slider['photo_id'];?>" alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">


                        <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="230" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                            <div class="slide-content-box">
                                <h1><?php echo $slider['title'];?></h1>
                            </div>
                        </div>
                        <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="310" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="700">
                            <div class="slide-content-box">
                                <p><?php echo $slider['sub_title'];?> </p>
                            </div>
                        </div>
                        <?php
                        if(isset($slider['cta']['url']) && $slider['cta']['url']!="")
                        {
                        ?>
                        <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="top" data-voffset="400" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="700">
                            <div class="slide-content-box">
                                <div class="button">
                                    <a class="thm-btn yellow-bg" href="{{$slider['cta']['url']}}">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                    </li>
                        <?php }
                        ?>

                    


                </ul>
            </div>
        </section>
        <!--End rev slider wrapper-->
        <?php
    }
    ?>