<!--our-courses section-->
<?php
if(!isset($data['programs']))
{
   echo "Block này chưa được cấu hình";
return;
}
?>
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
        <!--our-courses section end-->

        