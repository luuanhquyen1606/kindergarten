<?php
if(!isset($data['banners'])){
    die ("Cấu hình hero banner bằng nút thiết lập");
}
?>
<!--Main Slider-->
<section class="main-slider" data-start-height="800" data-slide-overlay="yes">

    <div class="tp-banner-container">
        <div class="tp-banner">
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
                <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="<?php echo $slider['title'];?>">
                    <img src="/get_photo/<?php echo $slider['photo_id'];?>/1024" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                    <div class="overlay-slide"></div>

                    <div class="tp-caption sfl sfb tp-resizeme"
                    data-x="left" data-hoffset="70"
                    data-y="center" data-voffset="-40"
                    data-speed="1500"
                    data-start="500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><h2><?php echo $slider['title'];?></h2></div>

                    <div class="tp-caption sfl sfb tp-resizeme"
                    data-x="left" data-hoffset="70"
                    data-y="center" data-voffset="70"
                    data-speed="1500"
                    data-start="1000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><div class="dark-text"><?php echo $slider['sub_title'];?></div></div>

                    <div class="tp-caption sfl sfb tp-resizeme"
                    data-x="left" data-hoffset="70"
                    data-y="center" data-voffset="150"
                    data-speed="1500"
                    data-start="1500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"><a href="/dang-ky-nhap-hoc" class="theme-btn btn-style-one">Đăng ký ngay</a></div>
                </li>

                <?php }
                ?>

            </ul>

        </div>
    </div>

</section>
<!--End Main Slider-->
