@extends('admin.layouts.app')
@section('content')
 <form class="ajax_form" action="/admin/programs/{{$level->id}}" class="mb-9" method="POST" >
  @csrf
  @method('PUT')
          <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
              <h2 class="mb-2">Cập nhật chương trình học</h2>
              
            </div>
            <div class="col-auto">
              <a href="/admin/programs" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
              <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Cập nhật</button>
            </div>
          </div>
          <div class="row g-5">
            <div class="col-12 col-xl-9">
             
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                <div class="form-floating " >
                    <input  value="{{$level->name}}" class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tiêu đề bài viết">
                    <label for="create-boardwizard-name">Tên chương trình</label>
                   <div class="invalid-feedback"></div> 
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                <div class="form-floating " >
                    <input value="{{$level->tuition}}"  class="form-control" type="text" name="tuition" id="create-boardwizard-name" placeholder="Tiêu đề bài viết" >
                    <label for="create-boardwizard-name">Học phí căn bản</label>
                   <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                <div class="form-floating " >
                    <input value="{{$level->class_count}}"  class="form-control" type="text" name="class_count" id="create-boardwizard-name" placeholder="Tiêu đề bài viết" >
                    <label for="create-boardwizard-name">Số học sinh</label>
                   <div class="invalid-feedback"></div> 
                </div>
              </div>
              

             




              <div class="col-sm-12 col-md-12">
              <h6>Lứa tuổi</h6>
                  <div class='row'> 
                  <div class="col-sm-6 col-md-6">
                    <div class="form-floating">
                      <select name="age_from" class="form-select" id="floatingSelectTeam">
                        <option value="" selected="selected">từ </option>
                        <?php
                        for ($i=6;$i<=72;$i++) 
                        {
                        ?>
                        <option <?php if($level->age_from==$i) echo 'selected';?> value="<?php echo $i;?>">  
                        <?php echo $i; ?> tháng 
                        <?php if (($i%6)==0) echo "(".($i/12)." tuổi)";?>
                        </option>
                        <?php
                        }
                        ?>
                      </select>
                      <label for="floatingSelectTeam">Từ</label>
                      <div class="invalid-feedback"></div> 
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="form-floating">
                      <select name="age_to" class="form-select" id="floatingSelectTeam">
                        <option value="" selected="selected">đến</option>
                        <?php
                        for ($i=6;$i<=72;$i++)
                        {
                        ?>
                        <option <?php if($level->age_to==$i) echo 'selected';?>  value="<?php echo $i;?>">
                        <?php echo $i; ?> tháng
                        <?php if (($i%6)==0) echo "(".($i/12)." tuổi)";?>
                        </option>
                        <?php
                        }
                        ?>
                      </select>
                      <label for="floatingSelectTeam">Đến</label>
                      <div class="invalid-feedback"></div> 
                    </div>
                  </div>
                  </div>
                </div>



              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                <div class="form-floating">
                  <select name="manager_id" class="form-select" id="floatingSelectTeam">
                    <option value="" selected="selected">Giáo viên quản lý</option>
                    <?php
                    foreach ($teachers as $teacher)
                    {
                    ?>
                    <option <?php echo ($teacher->id==$level->manager_id)? 'selected':''; ?> value="<?php echo $teacher->id;?>"><?php echo $teacher->name; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="floatingSelectTeam">Giáo viên quản lý</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>




<div class="col-sm-12 col-md-12"> 
                <div class="form-floating">
                   
                    <div class="quill_editor" for="post_content" id="editor_post_content"></div>
                    <input id="post_content" type="hidden" name="introduction" value="{{$level->introduction}}">  
                    <label for="create-boardwizard-name" style="padding-top:30px !important;left:auto !important; right:0 !important">Giới thiệu chương trình học</label>
                    <div class="invalid-feedback"></div>  
                </div>
              </div>

               <div class="col-sm-12 col-md-12"> 
                <div class="form-floating">
                    
                  
                        <div class="card mt-5">
                          
                          <div class="card-body pt-0">
                            <div class="myfiles-action-bar mx-n4 mb-4">
                              <h6 class="mb-0 text-body-tertiary" id="file-manager-replace-element">Thêm file, ảnh cho bài viết</h6>
                              <a id="file_browser" class="btn btn-phoenix-secondary" data-bs-toggle="tooltip" data-bs-title="Thêm ảnh file cho bài viết">
                                <span class="fas fa-cloud-upload-alt"></span> Chọn file 
                              </a>
                              
                              <script type="text/javascript">
                                
                              </script>
                            </div>
                            <div class="row gx-xxl-9" id="bulk-select-body">
                              <div class="col">
                                <div class="files-container" data-files-container="data-files-container">
                                  
                                  
                                  
                                  
                                  
                                 
                                  
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
                      
                      <div class="row gx-3">
                        <div class="col-12 col-sm-6 col-xl-12">
                          <div class="mb-4">
                            <h5 class="mb-3">Ảnh đại diện</h5> 
                            <div id="photo_file" class="d-flex align-items-end position-relative">
                                <input class="d-none"  id="photo_id_browser" type="file" />
                                
                                    <div class="hoverbox" style="width: 100%;">
                                    <div class="hoverbox-content rounded-square d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary"></span></div>
                                    <div class="position-relative bg-body-quaternary rounded-square cursor-pointer d-flex flex-center ">
                                      <div class="avatar avatar-5xl">
                                        <img preview-input-id="photo_id" class="rounded-square" src="/get_photo/<?php echo $level->photo_id;?>" alt="" /></div>
                                      <label for="photo_id" class="w-100 h-100 position-absolute z-1" >
                                      </label>
                                    </div>
                                    
                              </div>
                              
                            </div>
                            <input type="text" id="photo_id" class="media-browser-input"  name="photo_id"  value="<?php echo $level->photo_id; ?>">
                            <input type="hidden" name="redirect_url"  value="/admin/programs">
                            <div class="invalid-feedback"></div> 
                          </div>
                        </div>
                        
                        
                        
                      </div>
                    </div>
                  </div>
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
  
  $('#file_browser').click(function(){
    $('#files').click();
  }); 
                                
var uploadedFiles = [];


function delete_uploadFiles(index)
{
  uploadedFiles.splice(index, 1);
  reset_files_preview();
  renderUploadFiles();
}
function reset_files_preview()
{
  for (let index = 0; index < 100; index++) {
            $("#preview_"+index+" #preview_img").attr("src",'');
            $("#preview_"+index+" #preview_name").html('');
            $("#preview_"+index+" #preview_size").html();
             $("#preview_"+index+" #file_uploaded").val('');
            $("#preview_"+index).hide(); 
  }
}
// Upload multiple files
$('#files').on('change', function() {
    var files = this.files;
    if (files.length === 0) return;

    var formData = new FormData();
    for (let i = 0; i < files.length; i++) {
        uploadSingleFile(files[i], function(response) {
            uploadedFiles.push(response);
            renderUploadFiles();
        });
    }

});
function renderUploadFiles() {
    console.log(uploadedFiles); 
    uploadedFiles.forEach(function(file,index) {

            $("#preview_"+index+" #preview_img").attr("src","/get_photo/"+file.id+"/500");
            $("#preview_"+index+" #preview_name").html(file.name);
            $("#preview_"+index+" #preview_size").html(parseFloat(file.size/(1024*1024)).toFixed(2));
            $("#preview_"+index+" #file_uploaded").val(file.id); 
            $("#preview_"+index).show();  

    });
}

// Upload feature image
$('#photo_id_browser').on('change', function() {
    var files = this.files;
    if (files.length === 0) return;
       uploadSingleFile(files[0], function(response) {
            $("#photo_file img").attr("src","/get_photo/"+file.id+"/500");
             $("#photo_id").val(response.id); 
        });
});



function uploadSingleFile(file, callback) {
    let formData = new FormData();
    formData.append('file', file);

    $.ajax({
        url: '/admin/upload',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            callback(response);   // return here
        }
    });
}


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