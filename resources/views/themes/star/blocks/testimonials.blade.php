<!--founder section-->
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
        <!--founder section end-->