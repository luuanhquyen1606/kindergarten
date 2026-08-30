  <!-- Team Section Start -->
        <section class="team-section fix section-bg section-padding">
            <div class="top-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/section-top-shape.png" alt="shape-img">
            </div>
            <div class="love-shape float-bob-x">
                <img src="/themes/{{ config('theme.active') }}/assets/img/team/love.png" alt="shape-img">
            </div>
            <div class="frame-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/team/frame.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title mt-60">
                        <span class="wow fadeInUp">{{ $data['title'] }}</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $data['sub_title'] }}</h2>
                    </div>
                    <div class="array-button wow fadeInUp" data-wow-delay=".5s">
                        <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
                        <button class="array-next"><i class="fal fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="swiper team-slider">
                    <div class="swiper-wrapper">


                    <?php
                            foreach ($teachers as $index=>$teacher)
                            {
                            ?>
                        <div class="swiper-slide">
                            <div class="team-items">
                                <div class="team-image">
                                    <div class="shape-img">
                                        <img src="/themes/{{ config('theme.active') }}/assets/img/team/team-shape.png" alt="img">
                                    </div>
                                    <img style="width:300px;height:400px; object-fit:cover" src="/get_photo/<?php echo $teacher->id;?>/500" alt="team-img">
                                    <div class="social-profile">
                                        <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <h3>
                                        <a href="team-details.html"><?php echo $teacher->name;?></a>
                                    </h3>
                                    <p>Instructors</p>
                                </div>
                            </div>
                        </div>
                        
<?php
                            }
                            ?>


                    </div>
                </div>
            </div>
        </section>
