

  
  
  <!-- Work Process Section Start -->
        <section class="work-process-section fix section-padding fix">
            <div class="top-shape">
                <img src="/themes/{{ config('theme.active') }}/assets/img/hero/bottom-shape.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="process-work-wrapper">
                    <div class="row g-4">


 <?php foreach ($data['features'] as $feature)
                            {
                                if(!isset($feature['show']))
                                    {
                                        continue;
                                    }
                                    if($feature['show']!=1)
                                    {
                                        continue;
                                    }
                                ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="work-process-items text-center">
                              <div class="icon bg-cover" style="border-radius: 50%;background-image: url('/get_photo/{{ $feature['photo_id'] }}/500');">
                                    
                                </div>
                                <div class="content">
                                    <h4>{{ $feature['title'] }} </h4>
                                    <p>
                                        {{ $feature['sub_title'] }}
                                    </p>
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