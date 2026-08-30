<!--feature-two-->
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
        <!--feature-two end-->