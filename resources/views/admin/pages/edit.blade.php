@extends('admin.layouts.app')
@section('content')


<div class="d-flex justify-content-between align-items-center">
  <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
      <li class="nav-item" role="presentation"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="false" tabindex="-1">Nội dung trang</a></li>
      <li class="nav-item" role="presentation"><a class="nav-link " id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="true">Thông tin trang</a></li>
  </ul>
  <div class="d-flex align-items-center">
    <span class="fw-bold me-3">{{ $page->name }}</span>
    <a href="/{{ $page->routing_slug }}" target="_blank" class="btn btn-phoenix-secondary btn-sm">
      <span class="fas fa-eye" data-fa-transform="shrink-3"></span> Xem trước
    </a>
  </div>
</div>
<div class="tab-content mt-3" id="myTabContent">

  <div class="tab-pane fade " id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
       



 <form class="ajax_form_page_update" action="/admin/pages/{{ $page->id }}" class="mb-9" method="POST" >
  @csrf
  @method('PUT')
          <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
              <h2 class="mb-2">Thay đổi trang</h2>
              
            </div>
            <div class="col-auto">
              <a href="/admin/pages" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
              <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Lưu</button>
            </div>
          </div>
          <div class="row g-5">
            <div class="col-12 col-xl-9">
             
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                <div class="form-floating " >
                    <input  class="form-control" value="{{ $page->name }}" type="text" name="name" id="create-boardwizard-name" placeholder="Tiêu đề bài viết">
                    <label for="create-boardwizard-name">Tên trang</label>
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
                                        <img preview-input-id="photo_id" class="rounded-square" src="<?php echo $page->photo_id? getPhotoUrl($page->photo_id) :'/assets/admin/trans.png'; ?>" alt="" /></div>
                                      <label class="w-100 h-100 position-absolute z-1" for="photo_id_browser">
                                      </label>
                                    </div>
                                    
                              </div>
                              
                            </div>
                            <input  style="display:none;" type="text" id="photo_id" class="media-browser-input"  name="photo_id"  value="<?php echo $page->photo_id;?>">
                            <input type="hidden" name="redirect_url"  value="/admin/pages">
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

       






<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
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


$(".ajax_form_page_update").on("submit", function (e) {
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
  });
</script>



    </div>




    <div class="tab-pane fade active show" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
        
    
    <div class='pb-9'>

                <div class='row'>
              <button data-sort='1' data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="margin-bottom:10px !important" class="button-add-block btn btn-phoenix-secondary rounded-pill me-1 mb-1" type="button">
                <span class="fas fas fa-plus" data-fa-transform="shrink-3"></span>Thêm khối</button>

</div>
              <?php
              foreach ($page_blocks as $id=>$block)
              {
                
              ?>
              <div class="row block_div" block_id="{{$id}}" >
              <?php 
              echo  $page_blocks[$id];
              ?>
                <button data-sort=<?php echo ($block->sort+1); ?> data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="margin-bottom:10px !important" class="button-add-block btn btn-phoenix-secondary rounded-pill me-1 mb-1" type="button">
                <span class="fas fas fa-plus" data-fa-transform="shrink-3"></span>Thêm khối</button>
              </div>
              <?php
              }
              ?>
              
 
</div>


<div class="offcanvas offcanvas-end" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Thêm khối</h5>
    <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
              <form class="add_block_ajax_form" action="/admin/page_blocks" class="mb-9" method="POST" >
              @csrf

              


              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                <?php
                foreach ($block_groups as $group)
                {
                ?>
                <h6>{{$group['name']}}</h6>
                 <?php
                foreach ($group['blocks'] as $block)
                {
                ?>
                <div class="col-sm-12 col-md-12 p-2 border border-translucent rounded" style="margin-bottom:10px">
                           <label class="form-check-label" for="block_{{$block->block_id}}">
                  <img data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{$block->block_description}}"  for="block_{{$block->block_id}}" class="w-100 object-fit-cover" src="/themes/{{ config('theme.active') }}/images/blocks/{{$block->block_code}}.jpg" alt="">
                  </label>
                  <div class="form-check">
                  <input class="form-check-input" id="block_{{$block->block_id}}" type="radio" name="block_id" value="{{$block->block_id}}"  />
                  <label class="form-check-label" for="block_{{$block->block_id}}">{{$block->block_name}}</label>
                </div>
                </div> 
                
                  
                <?php
                }
                ?>

                <?php
                }
                ?>
                

                     

               
                </div>
                <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                <div class="form-floating " >
                    <input  class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tiêu đề bài viết" value="">
                    <label for="create-boardwizard-name">Tên khối</label>
                   <div class="invalid-feedback"></div> 
                </div>
                <hr class="bg-body-secondary mb-6 mt-4">
              </div>
              </div>
              
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px; padding:10px"> 
                <input type="text" name="sort" id="input-sort" value="0">
                <input type="hidden"  name="page_id"  value="{{$page->id}}">
                <input type="hidden" name="redirect_url"  value="/admin/pages/{{$page->id}}/edit">
                <button  style="margin-bottom:10px !important; width:100%" class="btn btn-primary rounded-pill me-1 mb-1" type="submit">
                <span class="fas fas fa-plus" data-fa-transform="shrink-3"></span>Thêm khối</button>
                </div>


</form>
  </div>
</div>
@include('admin.pages.media_browser')


@endsection


<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
// detect iframe resize event
window.resizeMyIframe = function () {
 
                        $('.iframe_block_view').each(function() {
                            var iframe = $(this);
                            
                                var contentHeight = iframe.contents().find('body').prop('scrollHeight');
                                // Set iframe height
                                iframe.height(contentHeight);
                           
                        });
                    };


$('.button-add-block').on('click', function () {
    let sort   = $(this).data('sort');
    $("#input-sort").val(sort);
});
$(document).on('change', '.page-block-show', function () {
    let checkbox = $(this);
    let id  = checkbox.data('id');
    let show     = checkbox.is(':checked') ? 1 : 0;

    $.ajax({
        url: '/admin/page_blocks/toggle_show',
        type: 'POST',
        data: {
            id: id,
            show: show
        },
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function () {
            //console.log('Updated show status');
        },
        error: function () {
            //alert('Failed to update status');
           // checkbox.prop('checked', !show); // revert UI
        }
    });
});


$(document).on('click', '.up', function () {
     let block = $(this).closest('.block_div');
    let prev = block.prevAll('.block_div').first();

    if (prev.length) {
      block.slideUp(150, function () {
    block.insertBefore(prev).slideDown(500);
    update_order();
    });
       // block.insertBefore(prev);
    }
    
});
 
$(document).on('click', '.down', function () {
    let block = $(this).closest('.block_div');
    let next = block.nextAll('.block_div').first();

    if (next.length) {
        block.slideDown(150, function () {
          block.insertAfter(next).slideDown(500);
          update_order();
        });
        
    }

    
});


let order = [];
function update_order(){

    var sort= $('.block_div').map(function (index) {
        return {
            id: $(this).attr('block_id'),
            sort: index + 1
        };
    }).get();
 
    
    $.ajax({
    url: '/admin/page_blocks/sort',
    method: 'POST',
    contentType: 'application/json',
    data: JSON.stringify({"sort":sort}),
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    } 
        
});




}



                

adjust_iframe_height();
function adjust_iframe_height()
{
    $('.iframe_block_view').each(function() {
        var iframe = $(this);
        // Run after iframe loads
        iframe.on('load', function() {
            // Get content height
            var contentHeight = iframe.contents().find('body').prop('scrollHeight');
            // Set iframe height
            iframe.height(contentHeight+15);
           
        });
    });
}

 
$(".add_block_ajax_form").on("submit", function (e) {
    e.preventDefault();        // stop full page reload

    var formData = new FormData(this);
    $(".invalid-feedback").html(''); 
    $("input").removeClass("is-invalid");
    console.log($(this).attr("action"));
    console.log(formData);
    $.ajax({
        url: $(this).attr("action"),
        type: 'POST',
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


$(".updatePageBlock").on("submit", function (e) {
    e.preventDefault();        // stop full page reload

  var formData = $(this).serialize(); // serialize form data
            $(".invalid-feedback").html(''); 
            $("input").removeClass("is-invalid");
            var block_id = $(this).attr('block-id');
          $.ajax({
              url: $(this).attr('action'), // your backend endpoint
              type: 'POST',
              data: formData,
              success: function(response) {

                $('#show-tab-'+block_id).tab('show');  
                $('#block_iframe_'+block_id).attr('src', $('#block_iframe_'+block_id).attr('src'));
              
              },
              error: function(xhr, status, error) {
                 if (xhr.status === 422) {
                 
                let errors = xhr.responseJSON.errors; 
                $.each(errors, function(field, msgs) {
                    $("[name='" + dotToBracket(field) + "']").addClass("is-invalid");
                    $("[name='" + dotToBracket(field) + "']").siblings(".invalid-feedback").html(msgs);
                    $("[name='" + dotToBracket(field) + "']").parent().parent().addClass("is-invalid");
                    $("[name='" + dotToBracket(field) + "']").parent().parent().parent().children(".invalid-feedback").html(msgs);
                }); 
                
            }
              }
          });
    
});




function updatePageBlock(block_id)
{


    // prevent the default form submit
        
          
}
function dotToBracket(name) {
    const parts = name.split('.');
    let result = parts.shift();

    parts.forEach(part => {
        result += '[' + part + ']';
    });

    return result;
}
})
</script>

</div>


  
</div>
                    


