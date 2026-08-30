@extends('admin.layouts.app')
@section('content')

          <div class="row g-5">
            <div class="col-12 col-xl-9">
            










              <div class="card mt-4">
                <div class="card-body pb-5">
                  <h4 class="mb-3">Giao diện</h4>
                  <div class="row g-3">
                   











                   










  

                    <?php foreach ($themes as $theme)
                    {
                    ?>
                    <div class="col-sm-3 col-xl-3 col-xxl-3"> 
                      <div class="position-relative" data-play-on-container-hover="data-play-on-container-hover">
                        <div class="img-zoom-hover mask-image-none overflow-hidden border rounded-3">
                          <div class="position-relative">
                            <div class="mask-image-recent-file overflow-hidden">
                              <div class="ratio ratio-1x2">
                                <img class="w-100  object-fit-cover" src="/assets/admin/img/themes/previews/500_{{ strtolower($theme->name) }}.jpg" alt="">
                              </div>
                              <?php
                              if($theme->name == $school->theme_name)
                              {
                              ?>
                              <span class="badge badge-phoenix fs-10 position-absolute top-0 start-0 mt-3 ms-3 badge-phoenix-info">Đang sử dụng</span>
                              <?php
                              }
                              ?>

                            </div>
                          </div>
                          <div class="bg-body p-3 pe-2 d-flex justify-content-between align-items-start rounded-bottom-3">
                            <div class="w-60">
                              <h5>{{ $theme->name }}</h5>
                              <h6 class="mb-0 fw-semibold text-body-tertiary">{{ $theme->price }}</h6>
                            </div>
                            <div class="dropdown position-static">
                              <?php
                              if($theme->name != $school->theme_name)
                              {
                              ?>
                              <button  data-bs-toggle="modal" data-bs-target="#theme_preview_{{ $theme->id }}" class="btn btn-primary btn-sm me-1 mb-1" style="padding: 5px !important;" type="button">Sử dụng</button>
                              <?php
                              }
                              else{
                                ?>
                                <button title="Giao diện này đang được sử dụng cho website của bạn" class="btn btn-primary btn-sm me-1 mb-1" disabled="disabled" style="padding: 5px !important;" type="button">Sử dụng</button>
                                <?php
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="theme_preview_{{ $theme->id }}" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="scrollingLongModalLabel2">{{ $theme->name }} </h5>
                              <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="ratio ratio-1x2">
                                <img class="w-100  object-fit-cover" src="/assets/admin/img/themes/previews/500_{{ strtolower($theme->name) }}.jpg" alt="">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="button">Okay</button>
                              <?php
                              $time=time();
                              ?>
                              <a target="new" href="https://{{$school->domain}}/preview?theme={{ strtolower($theme->name) }}&time=<?php echo $time;?>&verify=<?php echo md5('kidoo'.$time.strtolower($theme->name))?>" class="btn btn-outline-primary" title="xem trước website của bạn với giao diện này">Xem trước</a>
                            </div>
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
                
  
         




             


            
                
  
         






            
            <div class="col-12 col-xl-3">
             456
            </div>
          </div>
          
  



@endsection



@section('js')
<script type="text/javascript">


  $(".ajax_form").on("submit", function (e) {
    e.preventDefault();        // stop full page reload
    
    var formData = new FormData(this);
    $(".invalid-feedback").html(''); 
    $("input").removeClass("is-invalid");
    $("select").removeClass("is-invalid");
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (res) {
            window.location.href = formData.get('redirect_url'); 
        },

        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(field, msgs) {
                    $("[name='" + field + "']").addClass("is-invalid");
                    $("[name='" + field + "']").siblings(".invalid-feedback").html(msgs);
                });
                
            }
        }
    });
});
</script>
@endsection
