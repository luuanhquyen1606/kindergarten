<section class="brand-logo-area brand-bg pt-90 pb-90">
    <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 pb-45">
                    <div class="section-title text-center">
                        <span>{{ $data['title'] }}</span>
                        <h3 class="title">{{ $data['sub_title'] }}</h3>
                    </div> <!-- section title -->
                </div>
            </div>
        <div class="container">

            <div class="gooter-gallery-area">
                            <div class="row">



                                <?php
            foreach ($files as $file)
            {
            ?>
                                <div class="col-md-2 col-sm-4">
                                    <div class="single-footer-gallery-img">
                                        <img src="/get_photo/{{$file->id}}/500" alt="">
                                        <div class="overlay-footer-link">
                                            <a href="/get_photo/{{$file->id}}/1024" class="popup-footer-img"><i class="fas fa-plus"></i></a>
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

<!--
        <section class="feature-two">
            <center><h3>{{$data['title']}}</h3></center>
            <center><h5>{{$data['sub_title']}}</h5></center>
            <div class="feature-two-carousel">


            <?php
            foreach ($files as $file)
            {
            ?>
                <div class="single-item" style="height:250px;">
                    <div class="image-holder" style="height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;">
                        <img src="/get_photo/{{$file->id}}/500" alt="Awesome Image" />
                        <div class="overlay">
                            <div class="inner">

                                <ul class="social">
                                    <li><a href="/get_photo/{{$file->id}}/1024" target="_blank"><i class="icon fa fa-search"></i></a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>
            </div>

        </section>
      -->