

  <!-- Gallery Start here -->
  <section class="gallery padding-120">
    <div class="container">
      <div class="section-header">
        <h3>Our School Gallery</h3>
        <p>Rapidiously expedite granular imperatives before economically sound web services. Credibly actualize pandemic
          strategic themeplatform.</p>
      </div>
      <ul class="gallery-menu">
        <li class="active" data-filter="*">Show all</li>
        <li data-filter=".branding">Class</li>
        <li data-filter=".development">Event</li>
        <li data-filter=".packing">Playing</li>
        <li data-filter=".photography">Art</li>
      </ul>

      <div class="gallery-items">
        <div class="gallery-item branding packing">
          <div class="gallery-image">
            <img src="/themes/{{ config('theme.active') }}/images/gallery/gallery_11.jpg" alt="gallery image" class="img-responsive">
            <div class="gallery-overlay">
              <div class="bg"></div>
            </div>
            <div class="gallery-content">
              <a href="/themes/{{ config('theme.active') }}/images/gallery/gallery_bg_05.jpg" data-rel="lightcase:myCollection"><i
                  class="icon flaticon-expand"></i></a>
              <h4>Product Name Here</h4>
              <span>By: KidsAcademy Theme</span>
            </div>
          </div>
        </div><!-- gallery item -->
        <div class="gallery-item development photography">
          <div class="gallery-image">
            <img src="/themes/{{ config('theme.active') }}/images/gallery/gallery_12.jpg" alt="gallery image" class="img-responsive">
            <div class="gallery-overlay">
              <div class="bg"></div>
            </div>
            <div class="gallery-content">
              <a href="/themes/{{ config('theme.active') }}/images/gallery/gallery_bg_02.jpg" data-rel="lightcase:myCollection"><i
                  class="icon flaticon-expand"></i></a>
              <h4>Product Name Here</h4>
              <span>By: KidsAcademy Theme</span>
            </div>
          </div>
        </div><!-- gallery item -->
        <div class="gallery-item branding packing">
          <div class="gallery-image">
            <img src="/themes/{{ config('theme.active') }}/images/gallery/gallery_13.jpg" alt="gallery image" class="img-responsive">
            <div class="gallery-overlay">
              <div class="bg"></div>
            </div>
            <div class="gallery-content">
              <a href="/themes/{{ config('theme.active') }}/images/gallery/gallery_bg_13.jpg" data-rel="lightcase:myCollection"><i
                  class="icon flaticon-expand"></i></a>
              <h4>Product Name Here</h4>
              <span>By: KidsAcademy Theme</span>
            </div>
          </div>
        </div><!-- gallery item -->
        <div class="gallery-item development photography">
          <div class="gallery-image">
            <img src="/themes/{{ config('theme.active') }}/images/gallery/gallery_15.jpg" alt="gallery image" class="img-responsive">
            <div class="gallery-overlay">
              <div class="bg"></div>
            </div>
            <div class="gallery-content">
              <a href="/themes/{{ config('theme.active') }}/images/gallery/gallery_bg_15.jpg" data-rel="lightcase:myCollection"><i
                  class="icon flaticon-expand"></i></a>
              <h4>Product Name Here</h4>
              <span>By: KidsAcademy Theme</span>
            </div>
          </div>
        </div><!-- gallery item -->
        <div class="gallery-item branding packing">
          <div class="gallery-image">
            <img src="/themes/{{ config('theme.active') }}/images/gallery/gallery_14.jpg" alt="gallery image" class="img-responsive">
            <div class="gallery-overlay">
              <div class="bg"></div>
            </div>
            <div class="gallery-content">
              <a href="/themes/{{ config('theme.active') }}/images/gallery/gallery_bg_14.jpg" data-rel="lightcase:myCollection"><i
                  class="icon flaticon-expand"></i></a>
              <h4>Product Name Here</h4>
              <span>By: KidsAcademy Theme</span>
            </div>
          </div>
        </div><!-- gallery item -->
        <div class="gallery-item branding packing">
          <div class="gallery-image">
            <img src="/themes/{{ config('theme.active') }}/images/gallery/gallery_16.jpg" alt="gallery image" class="img-responsive">
            <div class="gallery-overlay">
              <div class="bg"></div>
            </div>
            <div class="gallery-content">
              <a href="/themes/{{ config('theme.active') }}/images/gallery/gallery_bg_01.jpg" data-rel="lightcase:myCollection"><i
                  class="icon flaticon-expand"></i></a>
              <h4>Product Name Here</h4>
              <span>By: KidsAcademy Theme</span>
            </div>
          </div>
        </div><!-- gallery item -->
      </div><!-- gallery items -->
      <div class="gallery-button"><a href="gallery.html" class="button-default">View More Gallery</a></div>
    </div><!-- container -->
  </section><!-- gallery -->
  <!-- Gallery End here -->




  
<!--feature-two-->
        <section class="feature-two" style="display: none;">
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