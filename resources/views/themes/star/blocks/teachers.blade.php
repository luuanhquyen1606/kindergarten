<!--team section-->
        <section class="our-team">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>{{ $data['title'] }}</h2>
                    <p>{{ $data['sub_title'] }} </p>
                </div>
                <div class="content-box">
                    <div class="row">
                        <div class="item-list">
                            <?php
                            foreach ($teachers as $index=>$teacher)
                            {
                            ?>
                            <div class="column col-md-3 col-sm-6">
                                <div class="single-team">
                                    <div class="img-holder" >
                                        <img style="width: 230px;height: 230px;object-fit: cover; object-position: center center; border-radius: 4px;"  src="/get_photo/<?php echo $teacher->id;?>/500" alt="Awesome Image" />
                                        <div class="overlay">  
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a target="_blank" href="/teacher/<?php echo $teacher->id;?>"><i class="fa fa-link"></i></a> 
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-holder">
                                        <h3><a target="_blank" href="/teacher/<?php echo $teacher->id;?>"><?php echo $teacher->name;?></a></h3>
                                        <p>Teacher</p>
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--team section end-->
