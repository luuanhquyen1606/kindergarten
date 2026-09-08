@extends('admin.layouts.app')
@section('content')

 <form class="ajax_form mb-9" action="/admin/posts" method="POST" >



  @csrf
          <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
              <h2 class="mb-2">Thêm nội dung</h2>

            </div>
            <div class="col-auto">
              <a href="/admin/posts" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
              <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Thêm nội dung</button>
            </div>
          </div>
          <div class="row g-5">
            <div class="col-12 col-xl-9">

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                <h6 class="mb-2">Loại nội dung</h6>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="type_news" value="news" {{ ($type ?? 'news') === 'news' ? 'checked' : '' }}>
                  <label class="form-check-label" for="type_news">Tin tức</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="type_event" value="event" {{ ($type ?? 'news') === 'event' ? 'checked' : '' }}>
                  <label class="form-check-label" for="type_event">Sự kiện</label>
                </div>
              </div>

              <div class="col-sm-12 col-md-12">
                <div class="form-floating " >
                    <input  class="form-control" type="text" name="title" id="create-boardwizard-name" placeholder="Tiêu đề bài viết" value="">
                    <label for="create-boardwizard-name">Tiêu đề bài viết</label>
                   <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-top:10px">
                <div class="form-floating">
                    <textarea class="form-control" name="summary" id="post_summary" placeholder="Tóm tắt ngắn" style="height:80px"></textarea>
                    <label for="post_summary">Tóm tắt (hiển thị ở trang danh sách)</label>
                    <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <div class="quill_editor" for="post_content" id="editor_post_content"></div>
                    <input id="post_content" type="hidden" name="content" value="">


                    <div class="invalid-feedback"></div>
                </div>
              </div>

              <div id="event_fields" class="col-sm-12 col-md-12" style="display:none">
                <div class="card mt-5">
                  <div class="card-body pt-0">
                    <div class="myfiles-action-bar mx-n4 mb-4" style="padding: 20px;">
                      <h6 class="mb-0 text-body-tertiary">Thông tin sự kiện</h6>
                    </div>
                    <div class="row gx-xxl-9">
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <div class="form-floating">
                          <input name="start_at" class="form-control datetimepicker flatpickr-input" id="event_start_at" type="text" placeholder="yyyy-mm-dd hour : minute" data-options="{&quot;enableTime&quot;:true,&quot;dateFormat&quot;:&quot;y-m-d H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
                          <label class="form-label" for="event_start_at">Thời gian bắt đầu</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <div class="form-floating">
                          <input name="end_at" class="form-control datetimepicker flatpickr-input" id="event_end_at" type="text" placeholder="yyyy-mm-dd hour : minute" data-options="{&quot;enableTime&quot;:true,&quot;dateFormat&quot;:&quot;y-m-d H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
                          <label class="form-label" for="event_end_at">Thời gian kết thúc</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <div class="form-floating">
                          <input value="" class="form-control" id="location_input" name="location" type="text" placeholder="Nhập địa điểm">
                          <label class="form-label" for="location_input">Địa điểm</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <h6 class="mb-0 text-body-tertiary">Phí tham dự</h6>
                        <div class="form-floating">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="freeTicket" type="radio" name="free_ticket" value="0" checked="checked">
                            <label class="form-check-label" for="freeTicket">Miễn phí</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="paidTicket" type="radio" name="free_ticket" value="1">
                            <label class="form-check-label" for="paidTicket">Có phí</label>
                          </div>
                        </div>
                        <div class="form-floating" id="price_form" style="display: none;">
                          <input class="form-control" id="price_input" name="price" type="text" placeholder="$0.0">
                          <label class="form-label" for="price_input">Chi phí tham dự</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <h6 class="mb-0 text-body-tertiary">Nhận ủng hộ</h6>
                        <div class="form-floating">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="noCcceptDonation" type="radio" name="accept_donation" value="0" checked="checked">
                            <label class="form-check-label" for="noCcceptDonation">Không</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="acceptDonation" type="radio" name="accept_donation" value="1">
                            <label class="form-check-label" for="acceptDonation">Có</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

             <div class="col-sm-12 col-md-12">
                <div class="form-floating">


                        <div class="card mt-5">

                          <div class="card-body pt-0">
                            <div class="myfiles-action-bar mx-n4 mb-4">
                              <h6 class="mb-0 text-body-tertiary" id="file-manager-replace-element">Thêm file, ảnh cho bài viết</h6>
                              <a data-input-class="file_uploaded" class="multiple-media-browser-input btn btn-phoenix-secondary" data-bs-toggle="tooltip" data-bs-title="Thêm ảnh file cho bài viết">
                                <span class="fas fa-cloud-upload-alt"></span> Chọn file
                              </a>

                              <script type="text/javascript">

                              </script>
                            </div>
                            <div class="row gx-xxl-9" id="bulk-select-body">
                              <div class="col">
                                <div class="files-container" data-files-container="data-files-container">
                                  
                                  
                                  
                                  
                                  
                                  <?php
                                  for ($i=0;$i<=100;$i++)
                                  {
                                  ?>
                                  <div id="preview_<?php echo $i;?>" class="file_uploaded text-center" style="display:none">
                                    <div class="file-box-wrapper img-zoom-hover">
                                      <div class="position-relative h-100">
                                        <div class="file-box overflow-hidden">
                                          <img id="preview_img" class="photo_img w-100 h-100 object-fit-cover" src="" alt=""></div>
                                          <input type="text" style="display:none" class="photo_input"   name="files[<?php echo $i;?>]" value="">
                                      </div>
                                      <div class="dropdown lh-1 position-absolute top-0 end-0 mt-2 me-2">
                                        <button onclick="delete_uploadFiles(<?php echo $i;?>)" class="delete_selected_file btn btn-square-sm text-body position-relative z-1" type="button" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                          <span class="text-danger fas fa-trash"></span>
                                        </button>                                     
                                      </div>
                                      <a id="preview_name" class="d-block fw-bold text-body-highlight mt-2 text-nowrap text-truncate fs-9 fs-sm-8" href="#!"></a>
                                      <h6  class="mb-0 fw-semibold text-body-tertiary fs-10 fs-sm-9"><span id="preview_size"></span> mb </h6>
                                    </div>
                                  </div>
                                  <?php
                                  }
                                  ?>
                                  
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>


                </div>
              </div>



              

              
            </div>


            <div class="col-12 col-xl-3">
              <div class="row g-2">
                <div class="col-12 col-xl-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_published" name="is_published" value="1" checked>
                        <label class="form-check-label" for="is_published">Xuất bản ngay</label>
                      </div>
                      <p class="fs-10 text-body-tertiary mb-0 mt-1">Bỏ chọn để lưu dưới dạng bản nháp, chưa hiển thị công khai.</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-xl-12">
                  <div class="card mb-3">
                    <div class="card-body">

                      <div class="row gx-3">
                        <div class="col-12 col-sm-6 col-xl-12">
                          <div class="mb-4">
                            <h5 class="mb-3">Ảnh đại diện bài viết</h5>
                            <div id="feature_file" class="d-flex align-items-end position-relative">
                                <input class="d-none"  id="feature_file_browser" type="file" />
                                
                                    <div class="hoverbox" style="width: 100%;">
                                    <div class="hoverbox-content rounded-square d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary"></span></div>
                                    <div class="position-relative bg-body-quaternary rounded-square cursor-pointer d-flex flex-center ">
                                      <div class="avatar avatar-5xl">
                                        <img preview-input-id="photo_id" class="rounded-square" src="/assets/admin/trans.png" alt="" /></div>
                                      <label class="w-100 h-100 position-absolute z-1" for="photo_id">
                                      </label>
                                    </div>
                                    
                              </div>
                              
                            </div>
                            <input class="media-browser-input" type="text" id="photo_id" style="display:none;"  name="photo_id"  value="">
                                <div class="invalid-feedback"></div> 
                          </div>
                        </div>
                        
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
               
                
              </div>
              <div id="news_fields">
                <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                  <div class="form-floating">
                    <select name="category_id" class="form-select" id="level_select">
                      <option value=""  selected="">Chuyên mục</option>
                      <?php
                      foreach ($categories as $category)
                      {
                      ?>
                      <option value="<?php echo $category->id;?>"><?php echo $category->name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <label for="level_select">Chuyên mục</label>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-xl-12"  style="margin-top:20px">
                  <h6>Thẻ</h6>

                  <?php foreach ($tags as $tag)
                  {
                  ?>
                        <div class="form-check form-check-inline">
                          <input  name="tags[]" class="form-check-input" id="tag_input_{{$tag->id}}" type="checkbox" value="{{$tag->id}}">
                          <label class="form-check-label" for="tag_input_{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                  <?php
                  }
                  ?>
              </div>
              </div>
            </div>




          </div>
          
        </form>

      <input type="file" name="files[]" id="files" multiple style="display:none">


            
@include('admin.pages.media_browser')




@endsection



@section('js')
<script type="text/javascript">

function toggleContentTypeFields() {
    if ($('input[name=type]:checked').val() === 'event') {
        $('#event_fields').show();
        $('#news_fields').hide();
    } else {
        $('#event_fields').hide();
        $('#news_fields').show();
    }
}
$('input[type=radio][name=type]').on('change', toggleContentTypeFields);
toggleContentTypeFields();

$('input[type=radio][name=free_ticket]').on('change', function () {
    if ($('#paidTicket').is(':checked')) {
      $('#price_input').val('');
        $('#price_form').show();

    } else {
        $('#price_form').hide();
        $('#price_input').val(0);
    }
});

  var deleteFiles = [];
$(".delete_selected_file").on('click', function() {
    var fileId = $(this).closest('.file_uploaded').find('.photo_input').val();
    deleteFiles.push(fileId);
    $(this).closest('.file_uploaded').find('input').val('');
    $(this).closest('.file_uploaded').find('img').attr('src', '');
    $(this).closest('.file_uploaded').remove();
    $(this).closest('.file_uploaded').appendTo(
    $(this).closest('.file_uploaded').parent()
);
});

$(".ajax_form").on("submit", function (e) {
    e.preventDefault();        // stop full page reload
    
    var formData = new FormData(this);
    $(".invalid-feedback").html(''); 
    $("input").removeClass("is-invalid");
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (res) {
            window.location.href = "/admin/posts";
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