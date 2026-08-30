<section class="testimonials-area pt-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <span>{{$data['title']}}</span>
                        
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row testinonials-active">


 <?php
                        foreach ($testimonials as $testimonial)
                        {
                        ?>
                <div class="col-lg-4">
                    <div class="testimonials-item mt-30">
                        <div class="testimonials-info">
                            <img src="/themes/{{ config('theme.active') }}/assets/images/testimonials-1.png" alt="">
                            <h5 class="title"><?php echo $testimonial->name;?></h5>
                            <span><?php echo $testimonial->email;?> / <?php echo $testimonial->phone;?></span>
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <div class="text">
                            <p><?php echo $testimonial->content;?></p>
                        </div>
                    </div>
                </div>
                
<?php
                        }
                        ?>
                        




            </div> <!-- row -->
        </div>
    </section>
<!--
        <section class="founder" style="background-image:url(/themes/{{ config('theme.active') }}/images/background/founder.jpg);">
            <h3 style="color: white !important;">{{$data['title']}}</h3>  <br />
            <div class="container">
                
                <div class="overlay">
                    
                    <div class="founder-carousel">

                        <?php
                        foreach ($testimonials as $testimonial)
                        {
                        ?>
                        <div class="item">
                            <figure class="icon-box">
                                <i class="icon fa fa-quote-right" aria-hidden="true"></i>
                            </figure>
                            <div class="content-holder">
                                <h4><?php echo $testimonial->name;?> - <span>(<?php echo $testimonial->email;?> / <?php echo $testimonial->phone;?>)</span></h4>
                                <p><?php echo $testimonial->content;?> </p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>
        -->