   <!-- Testimonial Section Start -->
        <section class="testimonial-section fix section-padding">
            <div class="tree-shape float-bob-y">
                <img src="/themes/{{ config('theme.active') }}/assets/img/tree-shape.png" alt="shape-img">
            </div>
            <div class="right-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/testi-r-shape.png" alt="shape-img">
            </div>
            <div class="bee-shape float-bob-y">
                <img src="/themes/{{ config('theme.active') }}/assets/img/testi-bee-shape.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="section-title text-center">
                    <span class="wow fadeInUp">{{$data['title']}}</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">{{$data['sub_title']}}</h2>
                </div>
                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper">




 <?php
                        foreach ($testimonials as $testimonial)
                        {
                        ?>
                        <div class="swiper-slide">
                            <div class="testimonial-items">
                                <div class="icon">
                                    <img src="/themes/{{ config('theme.active') }}/assets/img/quote.png" alt="img">
                                </div>
                                <div class="testimonial-bg"></div>
                                <div class="testimonial-content">
                                    <p>
                                        {{$testimonial->content}}
                                    </p>
                                    <h6>{{$testimonial->name}} | {{$testimonial->email}}</h6>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                       




                    </div>
                    <div class="swiper-dot text-center pt-5">
                        <div class="dot"></div>
                    </div>
                </div>
            </div>
        </section>