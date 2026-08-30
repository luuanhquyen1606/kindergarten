<!--Testimonial Section-->
<section class="testimonial-section" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/pattern-1.png);">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            <h2>{{ $data['title'] }}</h2>
            <div class="title">{{ $data['sub_title'] }}</div>
        </div>

        <!--Client Testimonial Carousel-->
        <div class="client-testimonial-carousel owl-carousel owl-theme">

            <?php
            foreach ($testimonials as $testimonial)
            {
            ?>
            <!--Testimonial Block Two-->
            <div class="testimonial-block-two">
                <div class="inner-box">
                    <div class="quote-icon"><span class="icon flaticon-left-quote"></span></div>
                    <div class="text"><?php echo $testimonial->content;?></div>
                    <h6><?php echo $testimonial->name;?> | <?php echo $testimonial->email;?></h6>
                </div>
            </div>
            <?php
            }
            ?>

        </div>

    </div>
</section>
<!--End Testimonial Section-->
