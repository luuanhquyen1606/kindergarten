@extends('admin.layouts.app')
@section('content')
<form class="ajax_form" action="/admin/teachers" class="mb-9" method="POST" >
  @csrf
          <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
              <h2 class="mb-2">Thêm giáo viên</h2>
              
            </div>
            <div class="col-auto">
              <a href="/admin/teachers" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
              <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Thêm giáo viên</button>
            </div>
          </div>
          <div class="row g-5">
            <div class="col-12 col-xl-9">
             
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" name="name" id="name_input" type="text" placeholder="Project title">
                  <label for="name_input">Tên giáo viên</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" name="phone" id="floatingInputGrid" type="text" placeholder="Project title">
                  <label for="floatingInputGrid">Số điện thoại</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                                <div class="form-floating">
                                  <input class="form-control" name="address" id="floatingInputGrid" type="text" placeholder="Project title">
                                  <label for="floatingInputGrid">Địa chỉ</label>
                                  <div class="invalid-feedback"></div>
                                  </div>
                                </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                 <div class="form-floating">
                  <input class="form-control" name="birthday" id="floatingInputGrid" type="date" placeholder="Project title">
                  <label for="floatingInputGrid">Ngày sinh</label>
                  <div class="invalid-feedback"></div>
                  </div>
                </div>

               <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                 <div class="form-floating">
                  <input class="form-control" name="email" id="floatingInputGrid" type="text" placeholder="Project title">
                  <label for="floatingInputGrid">Email</label>
                  <div class="invalid-feedback"></div>
                  </div>
                </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                 <label class="form-label">Email trường</label>
                 <div class="input-group">
                  <input class="form-control" name="school_email_alias" id="school_email_input" type="text" placeholder="ten.giaovien">
                  <span class="input-group-text">{{ '@' . $app['school']->domain }}</span>
                  <div class="invalid-feedback"></div>
                  </div>
                </div>

                <div class="col-sm-12 col-md-12"> 
                <div class="form-floating">
                   <div class="quill_editor" for="post_content" id="editor_post_content"></div>
                    <input id="post_content" type="hidden" name="about" value="">  
                    <label for="create-boardwizard-name" style="padding-top:30px !important;left:auto !important; right:0 !important">Giới thiệu giáo viên</label>
                    <div class="invalid-feedback"></div>
                </div>
              </div>

                <div class="col-sm-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$password}}" name="password" id="floatingInputGrid" type="text" placeholder="Project title">
                  <label for="floatingInputGrid">Mật khẩu</label>
                  <div class="invalid-feedback"></div> 
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
                         
                                
                                    <div class="hoverbox" style="width: 100%;">
                                    <div class="hoverbox-content rounded-square d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary"></span></div>
                                    <div class="position-relative bg-body-quaternary rounded-square cursor-pointer d-flex flex-center ">
                                      <div class="avatar avatar-5xl">
                                        <img preview-input-id="photo_id"  class="rounded-square" src="/assets/admin/trans.png" alt="" /></div>
                                      <label class="w-100 h-100 position-absolute z-1" for="photo_id">
                                      </label>
                                    </div>
                                    
                              </div>
                              
                            </div>
                            <input style="display: none;" name="photo_id" type="text" id="photo_id" class="media-browser-input"   value="">
                            <div class="invalid-feedback"></div> 
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
                           
                            <div class="myfiles-action-bar mx-n4 mb-4" style="padding: 20px;">
                              <h6 class="mb-0 text-body-tertiary" id="file-manager-replace-element">Cấp quyền</h6> 
                            </div>
                             <?php
                            foreach ($permission_groups as $group)
                            {
                            ?>
                              <h6>{{$group['name']}}  <i>({{$group['description']}})</i></h6>
                              
                              <?php
                              foreach ($group['permissions'] as $permission)
                              {
                              ?>
                              <div class="form-check form-switch">
                                <input <?php echo ($permission->enable_by_default==1)? "checked":""; ?>  class="form-check-input" name="permissions[]" value='{{$permission->id}}' id="{{$permission->resource}}_input" type="checkbox">
                                <label class="form-check-label" for="{{$permission->resource}}_input">{{$permission->permission_name}}</label> 
                              </div>
                              <?php 
                              }
                              ?>
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
           <input type="hidden" name="redirect_url"  value="/admin/teachers">
                           
        </form>

       

@include('admin.pages.media_browser')


@endsection



@section('js')
<script type="text/javascript">

function removeVietnameseAccents(str) {
    return str
        .normalize('NFD')                 // split accented chars
        .replace(/[\u0300-\u036f]/g, '')  // remove accents
        .replace(/đ/g, 'd')
        .replace(/Đ/g, 'D');
}

  $('#name_input').on('input', function () {
    let name = $(this).val();

    let emailPrefix = removeVietnameseAccents(name)
        .toLowerCase()
        .trim()
        .replace(/\s+/g, '')      // spaces → dot
        .replace(/[^a-z0-9.]/g, ''); // keep safe chars

    $('#school_email_input').val(emailPrefix);
});


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


$('#level_select').on('change', function () {
    var selected = $(this).find(':selected');

    var photo_id = selected.data('photo_id');   // data-price
    var thumbnail_path  = selected.data('thumbnail_path');    // data-type
    $("#photo_file img").attr("src",thumbnail_path);
    $("#photo_id").val(photo_id); 
});

// Upload feature image
$('#photo_id_browser').on('change', function() {
    var files = this.files;
    if (files.length === 0) return;
       uploadSingleFile(files[0], function(response) {
            $("#photo_file img").attr("src","/get_photo/"+response.id+"/500");
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




var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        'min': 0,
        'max': 60
    },
    tooltips: true,
    format: wNumb({
  decimals: 0
})
});
slider.noUiSlider.on('update', function (values, handle) {
  if (handle === 0) {
    document.getElementById('min_age').value = values[0];
  } else {
    document.getElementById('max_age').value = values[1];
  }
});

</script>
@endsection
