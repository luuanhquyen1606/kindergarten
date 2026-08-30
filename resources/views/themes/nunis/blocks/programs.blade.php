<!--our-courses section-->
<?php
if(!isset($data['programs']))
{
   echo "Block này chưa được cấu hình";
return;
}
?>

<section class="course-area bg_cover pt-130 pb-130" style="background-image: url(/themes/{{ config('theme.active') }}/assets/images/course-bg.jpg)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <span>{{ $data['title'] }}</span>
                        <h3 class="title">{{ $data['sub_title'] }}</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">





<?php
                            foreach($programs as $program)
                            {
                                if(in_array($program->id,$data['programs']))
                                {
                            ?>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-course mt-30 wow slideInUp" data-wow-duration=".1s" data-wow-delay=".1s">
                        <div class="course-thumb">
                            <img src="/themes/{{ config('theme.active') }}/assets/images/course-1.jpg" alt="course">
                        </div>
                        <div class="course-content bg-white">
                            <div class="course-top">
                                <h4 class="title">bd</h4>
                                <ul>
                                    <li><i class="fal fa-wheelchair"></i> ( <?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi)</li>
                                    <li><i class="fal fa-book"></i><?php echo $program->class_count;?></li>
                                </ul>
                                <span><?php echo $program->tuition;?></span>
                            </div>
                            <div class="course-item" style="display: none;">
                                <img src="/themes/{{ config('theme.active') }}/assets/images/course-user.png" alt="user">
                                <h5 class="title"><?php echo $program->name;?></h5>
                                <span>Lứa tuổi: ( <?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi) <br /> Số trẻ: <?php echo $program->class_count;?></span>
                            </div>
                        </div>
                    </div> <!-- single course -->
                </div>

 <?php
                            }
                                }      
                            ?>
                
            </div> <!-- row -->
        </div>
    </section>
    <!--
        <section class="our-courses">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>{{ $data['title'] }} </h2>
                    <p>{{ $data['sub_title'] }} </p>
                </div>
                <div class="item-box">
                    <div class="row">
                        <div class="item-list">

                            <?php
                            foreach($programs as $program)
                            {
                                if(in_array($program->id,$data['programs']))
                                {
                            ?>
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <div class="item">
                                    <figure class="image-box">     
                                        <img style="width: 300px;height: 300px;object-fit: cover; object-position: center center; border-top-left-radius: 10px;border-bottom-left-radius: 10px;" src="<?php echo $program->thumbnail_path; ?>" alt="" />
                                    </figure>
                                    <div class="content"> 
                                        <div class="price">
                                            <h4>Học phí căn bản: <?php echo $program->tuition;?></h4>
                                        </div>
                                        <div class="text">
                                            <h3><a href="course-details.html"><?php echo $program->name;?></a></h3>
                                            <span>Lứa tuổi: ( <?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi) <br /> Số trẻ: <?php echo $program->class_count;?> </span>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <?php
                            }
                                }      
                            ?>



                        </div>
                    </div>
                </div>
            </div>
        </section>
        -->

        