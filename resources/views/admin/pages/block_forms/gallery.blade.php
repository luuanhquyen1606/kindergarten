    <?php 
    $data = json_decode($block->data_preview,true);
    ?>
     <style>

    .deleted img{
        border: 2px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        border-color: #dc0d25; 
    }
 </style>


   <form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
     @csrf
    @method('PUT')

   
         
    <div class="col-sm-12 col-md-12"> 
      <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[title]" value ="<?php echo $data['title'] ?? ''; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                    <label for="floatingInputLastname">Tiêu đề</label>
                </div>
    </div>
    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[sub_title]" value ="<?php echo $data['sub_title'] ?? ''; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                   
                    <label for="floatingInputLastname">Tiêu đề phụ</label>
                </div>
    </div>
                <div class="form-floating">
                    
                  
                        <div class="card mt-5">
                          
                          <div class="card-body pt-0">
                            <div class="myfiles-action-bar mx-n4 mb-4">
                              <h6 class="mb-0 text-body-tertiary" id="file-manager-replace-element">Thêm file, ảnh cho bài viết</h6>
                              <a data-input-class="file_uploaded_{{ $block->id}}"  id="file_browser_{{ $block->id}}" class="multiple-media-browser-input btn btn-phoenix-secondary" data-bs-toggle="tooltip" data-bs-title="Thêm ảnh file cho bài viết">
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
                                  <div id="preview_{{ $block->id}}_<?php echo $i;?>" class="file_uploaded_{{ $block->id}} text-center" style="display:<?php echo (isset($files[$i]) && $files[$i]!='')? '': 'none'; ?>">
                                    <div class="file-box-wrapper img-zoom-hover"> 
                                      <div class="position-relative h-100">
                                        <div class="file-box overflow-hidden">
                                          <img id="preview_img" class="w-100 h-100 object-fit-cover" src="<?php echo (isset($files[$i]) && $files[$i]!='') ? getPhotoUrl($files[$i]->id) : '';?>" alt=""></div>
                                          <input type="text" style="" class="photo_input"  name="data[files][<?php echo $i;?>]" value="<?php echo (isset($files[$i]) && $files[$i]!='')? $files[$i]->id : '';?>">
                                          <input type="text" style="" class="photo_delete"  name="data[deleted_files][<?php echo $i;?>]" value=""> 
                                      </div>
                                      <div class="dropdown lh-1 position-absolute top-0 end-0 mt-2 me-2">
                                        <button class="delete_selected_file btn btn-square-sm text-body position-relative z-1" type="button" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                          <span class="text-danger fas fa-trash"></span> 
                                        </button>                                     
                                      </div>
                                      <a id="preview_name" class="d-block fw-bold text-body-highlight mt-2 text-nowrap text-truncate fs-9 fs-sm-8" href="#!"></a>
                                      <h6  class="mb-0 fw-semibold text-body-tertiary fs-10 fs-sm-9"><span id="preview_size"><?php echo (isset($files[$i]) && $files[$i]!='')? round(($files[$i]->size/(1024*1024)),2) : '';?></span> mb </h6>
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
              <hr class="bg-body-secondary mb-6 mt-4">

<input type="file" id="files_{{ $block->id}}" name="files[]"  multiple style="display:none">
              <div class="col-12 d-flex justify-content-end mt-6"><button class="btn btn-primary">Xem trước</button></div>
      </form>



<script type="text/javascript">
$(document).ready(function() {
/*
var deleteFiles = [];                     
$(".delete_selected_file").on('click', function() {
  // / var fileId = $(this).closest('.file_uploaded_{{ $block->id}}').find('.photo_input').val();
   // deleteFiles.push(fileId);
    renderSelectedFiles();
    /*
    $(this).closest('.file_uploaded_{{ $block->id}}').find('input').val('');
    $(this).closest('.file_uploaded_{{ $block->id}}').find('img').attr('src', '');
    $(this).closest('.file_uploaded_{{ $block->id}}').remove();
    $(this).closest('.file_uploaded_{{ $block->id}}').appendTo(
    $(this).closest('.file_uploaded_{{ $block->id}}').parent()
  );
});
*/


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
     
});

</script>
      <script type="text/javascript">
$(document).ready(function() {
      $('#form_{{ $block->id}}').on('submit', function(e) {
         e.preventDefault();
        //return updatePageBlock({{ $block->id}});
      });
});
      </script>