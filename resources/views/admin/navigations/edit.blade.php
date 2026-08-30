@extends('admin.layouts.app')
@section('content')
<form class="ajax_form" action="/admin/navigations/{{$navigation->id}}" class="mb-9" method="POST" >
  @csrf
  @method('PUT')
          <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
              <h2 class="mb-2">Thêm điều hướng</h2>
              
            </div>
            <div class="col-auto">
              <a href="/admin/navigations" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
              <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Thêm điều hướng</button>
            </div>
          </div>
          <div class="row g-5">
            <div class="col-12 col-xl-9">
             
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$navigation->name}}" name="name" id="floatingInputGrid" type="text" placeholder="Project title">
                  <label for="floatingInputGrid">Tên</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                <div class="form-floating">
                  <select name="parent_id" class="form-select" id="level_select">
                    <option value=""  selected="">Cấp 1</option>
                    <?php
                    foreach ($parents as $child_navigation)
                    {
                    ?>
                    <option <?php echo ($child_navigation->id == $navigation->parent_id)? "selected":'';?> value="{{$child_navigation->id}}">{{$child_navigation->name}}</option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="level_select">Menu cha</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                <div class="form-floating form-floating-advance-select">
                  <select name="routing_id" class="form-select" id="routing_select" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option value=''>Chọn nội dung</option>
                    <?php
                    foreach ($routings as $routing)
                    {
                    ?>
                    <option <?php echo ($routing->id==$selected_routing_id)? "selected":""; ?> value="<?php echo $routing->id;?>"><?php echo ($routing->entity=='pages' ? '[Trang] ' : '[Bài viết] ').($routing->title ?: $routing->slug);?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="routing_select">Đến (Trang / Bài viết)</label>
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
                                <input class="d-none"  id="photo_id_browser" type="file" />
                                
                                    <div class="hoverbox" style="width: 100%;">
                                    <div class="hoverbox-content rounded-square d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary"></span></div>
                                    <div class="position-relative bg-body-quaternary rounded-square cursor-pointer d-flex flex-center ">
                                      <div class="avatar avatar-5xl">
                                        <img class="rounded-square" src="/assets/admin/trans.png" alt="" /></div>
                                      <label class="w-100 h-100 position-absolute z-1" for="photo_id_browser">
                                      </label>
                                    </div>
                                    
                              </div>
                              
                            </div>
                            <input type="hidden" id="photo_id"  name="photo_id"  value="">
                            <input type="hidden" name="redirect_url"  value="/admin/navigations"> 
                            <div id="invalid-feedback-" class="invalid-feedback"></div> 
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

       



@endsection



@section('js')
<script type="text/javascript">
$('input[type=radio][name=type]').on('change', function () {
    $(".navigation_referent_form").hide();
    $("#"+this.value+"_form").show();
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
    $("input").removeAttr("required");
    $("select").removeAttr("required");  
    let current_form = $(this);
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
                //current_form.addClass("was-validated"); 
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(field, msgs) { 
                    $("[name='" + field + "']").addClass("is-invalid");
                    
                    $("[name='" + field + "']").siblings(".invalid-feedback").html(msgs);   
                    // with advanced select
                    $("[name='" + field + "']").parent().parent().addClass("is-invalid");
                    $("[name='" + field + "']").parent().parent().parent().children(".invalid-feedback").html(msgs);   
                      
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
