

        <!-- Programs Section Start -->
        <section class="program-section section-padding section-bg-2 fix">
            <div class="top-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/section-top-shape.png" alt="shape-img">
            </div>
            <div class="bottom-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/section-bottom-shape.png" alt="shape-img">
            </div>
            <div class="mask-shape float-bob-x">
                <img src="/themes/{{ config('theme.active') }}/assets/img/program/mask.png" alt="shape-img">
            </div>
            <div class="pencil-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/program/pencil.png" alt="shape-img">
            </div>
            <div class="mask-shape-2">
                <img src="/themes/{{ config('theme.active') }}/assets/img/program/mask-2.png" alt="shape-img">
            </div>
            <div class="compass-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/program/compass.png" alt="shape-img">
            </div>
            
            <div class="container">
                <div class="section-title text-center mt-60">
                    <span class="wow fadeInUp">{{ $data['title'] }}</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $data['sub_title'] }}</h2>
                </div>
                <div class="row">
                    <div class="section-title-area">
                    <div class="section-title">
                     </div>
                    <a href="/chuong-trinh-hoc" class="theme-btn wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        Chương trình học <i class="fa-solid fa-arrow-right-long"></i> 
                    </a>
                </div>
                </div>
                <div class="row">



                <?php
                            foreach($programs as $program)
                            {
                                if(in_array($program->id,$data['programs']))
                                {
                            ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="program-box-items">
                            <div class="program-bg"></div>
                            <div class="program-image">
                                <a href="/chuong-trinh-hoc-{{$program->slug}}">
                                <img style="width:355px;height:270px;object-fit:cover"  src="<?php echo $program->photo_id? getPhotoUrl($program->photo_id) :'/assets/admin/trans.png'; ?>" alt="img">
                                </a>
                            </div>
                            <div class="program-content text-center">
                                <h4>
                                    <a href="/chuong-trinh-hoc-{{$program->slug}}"><?php echo $program->name;?></a>
                                </h4>
                                <span>( <?php echo ($program->age_from/12)?>-<?php echo ($program->age_to/12)?> tuổi)</span>
                                <p>
                                   Số trẻ: <?php echo $program->class_count;?> 
                                </p>
                                <a href="/chuong-trinh-hoc-{{$program->slug}}" class="arrow-icon">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                                }      
                            ?>





                </div>
            </div>
        </section>