    

        <!-- About Section Start -->
        <section class="about-section section-padding">
            <div class="bus-shape float-bob-x">
                <img src="/themes/{{ config('theme.active') }}/assets/img/about/bus.png" alt="shape-img">
            </div>
            <div class="girl-shape float-bob-y">
                <img src="/themes/{{ config('theme.active') }}/assets/img/about/girl.png" alt="shape-img">
            </div>
            <div class="dot-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/about/dot.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="about-wrapper mb-40">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="about-image-items">
                                <div class="about-image wow fadeInUp" data-wow-delay=".3s">
                                    <?php if ($post->photo_id) { ?>
                                    <img style="height:467px; width:554px; object-fit:cover" src="/get_photo/{{ $post->photo_id }}/500" alt="about-img">
                                    <?php } ?>
                                </div>
                               
                                <div class="border-shape-1">
                                    <img src="/themes/{{ config('theme.active') }}/assets/img/about/border-shape-1.png" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title">
                                    <span class="wow fadeInUp"></span>
                                     <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $data['title'] }}</h2>
                                </div>
                                <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                    {!! $data['sub_title'] !!}
                                </p>
                               
                                <div class="about-author">
                                    <div class="about-button wow fadeInUp" data-wow-delay=".3s">
                                        <a href="/tin-tuc-{{ $post->slug }}" class="theme-btn">
                                            Chi tiết <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        <!-- About Activities Section Start -->
        <section style="display:none" class="about-activities-section section-padding pt-0">
            <div class="pencil-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/about/pencil.png" alt="shape-img">
            </div>
            <div class="zebra-shape float-bob-y">
                <img src="/themes/{{ config('theme.active') }}/assets/img/about/zebra.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="about-activities-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".4s">
                            <div class="activities-img-items">
                                <div class="activities-image">
                                    <img src="/themes/{{ config('theme.active') }}/assets/img/about/03.jpg" alt="img">
                                </div>
                                <div class="radius-shape">
                                    <img src="/themes/{{ config('theme.active') }}/assets/img/about/radius-shape-1.png" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="activities-content">
                                <div class="section-title">
                                    <span class="wow fadeInUp">Our Best Activities</span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Let Us Know About Our <br> Reading And Cultural</h2>
                                </div>
                                <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse gravida vitae nisi in tincidunt.
                                </p>
                                <div class="row g-4 mt-4">
                                    <div class="col-xl-6 col-lg-8 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="icon-items">
                                            <div class="icon box-color-1">
                                               <i class=" icon-icon-1"></i>
                                            </div>
                                            <div class="content">
                                                <h5>Early Learning</h5>
                                                <p>Elit Aenean scelerisque <br> vitae consequat the.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="icon-items">
                                            <div class="icon box-color-3">
                                                <i class="icon-icon-16"></i>
                                            </div>
                                            <div class="content">
                                                <h5>Early Learning</h5>
                                                <p>Elit Aenean scelerisque <br> vitae consequat the.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                        <div class="icon-items">
                                            <div class="icon box-color-2">
                                                <i class="icon-icon-7"></i>
                                            </div>
                                            <div class="content">
                                                <h5>Early Learning</h5>
                                                <p>Elit Aenean scelerisque <br> vitae consequat the.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                        <div class="icon-items">
                                            <div class="icon box-color-4">
                                                <i class="icon-icon-8"></i>
                                            </div>
                                            <div class="content">
                                                <h5>Early Learning</h5>
                                                <p>Elit Aenean scelerisque <br> vitae consequat the.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>