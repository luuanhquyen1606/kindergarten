    <?php 
    $data = json_decode($block->data_preview,true);
    if(is_array($data)==false){
        $data=[];
       
    }
    ?>
  <form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
     @csrf
    @method('PUT')

  
         <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                       <img src="" style="height:50px" /> 
                </div> 
              </div> 
                
    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[title]" value ="<?php echo $data['title'] ?? ''; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                    <label for="floatingInputLastname">Tiêu đề</label>
                </div>
    </div>
    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[sub_title]" value ="<?php echo $data['sub_title'] ?? ''; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                   
                    <label for="floatingInputLastname">Nội dung</label>
                </div>
    </div>
    <hr class="bg-body-secondary mb-6 mt-4">
    <?php
   for ($index=0;$index<=10;$index++)
   {
    $row_show=0;
    if($index==0) {$row_show=1;}
    if(isset($data['features'][$index])){$row_show=1;}
    ?>
             <div class="row feature-row" style="display:<?php echo ($row_show)? "flex":"none"; ?>; min-height:60px;justify-content: center; /* horizontal center */align-items: center; margin-bottom:10px ">
              <div class="col-sm-1 col-md-1">
               <div class="hoverbox " style="width: 60px; height: 60px">
                <div class="hoverbox-content rounded-circle d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;">
                    <span class="fa-solid fa-camera fs-3 text-secondary-light"></span> 
                </div>
                <div class="position-relative bg-body-quaternary rounded-circle cursor-pointer d-flex flex-center mb-xxl-7">
                  <div class="avatar " style="aspect-ratio:1">
                    <img preview-input-id="block_{{$block->id}}_{{$index}}_photo_id" id="block_{{$block->id}}_{{$index}}_preview" class="rounded-circle rounded-circle img-thumbnail shadow-sm border-0" src="<?php echo $data['features'][$index]['photo_id'] ?? null ? "/get_photo/".$data['features'][$index]['photo_id']."/500": '/assets/admin/trans.png'; ?>" alt="">
                </div>
                <label class="w-100 h-100 position-absolute z-1" for="block_{{$block->id}}_{{$index}}_photo_id" ></label>
                </div>
              </div>
              <input style="display:none" type="text" name="data[features][{{$index}}][photo_id]" id="block_{{$block->id}}_{{$index}}_photo_id" value ="<?php echo $data['features'][$index]['photo_id'] ?? ''; ?>"   class="form-control media-browser-input" >
              </div> 



                <div class="col-sm-3 col-md-3">
                    <div class="form-floating">
                        <input name="data[features][{{$index}}][title]" value ="<?php echo $data['features'][$index]['title'] ?? ''; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                        <label for="floatingInputLastname">Tiêu đề</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-floating">
                        <input name="data[features][{{$index}}][sub_title]" value ="<?php echo $data['features'][$index]['sub_title'] ?? ''; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                        <label for="floatingInputLastname">Nội dung</label>
                    </div>
                </div>
                <div class="col-sm-1 col-md-1">
                    <div class="form-check form-switch">
                    <input value="1" <?php echo (($data['features'][$index]['show'] ?? null) == 1)? 'checked': '';?> class="form-check-input"  name="data[features][<?php echo $index?>][show]" id="cta_form_{{$block->id}}_{{$index}}_show" type="checkbox" />
                    <label class="form-check-label" for="cta_form_{{$block->id}}_{{$index}}_show">Hiển thị</label>
                    </div>
                </div>
                <div class="col-sm-1 col-md-1 d-flex align-items-center">
                    <a class="remove-row btn btn-phoenix-danger btn-sm rounded-pill">Xóa</a>
                </div>
             </div>
             
                <?php
   }
                ?>   
                
              <hr class="bg-body-secondary mb-6 mt-4">
                <a class="add-row btn btn-phoenix-secondary rounded-pill me-1 mb-1"> Thêm tiêu điểm </a>
                                     
              <div class="col-12 d-flex justify-content-end mt-6"><button class="btn btn-primary">Xem trước</button></div>
      </form> 





      <script type="text/javascript">
$(document).ready(function() {

$('.add-row').on('click', function() {
    $('.feature-row:hidden').first().show();
});
$('.remove-row').on('click', function() {
    let $row = $(this).closest('.feature-row');
    setTimeout(function() {
        $row.find('input[type="text"]').val('');
        $row.find('input[type="checkbox"]').prop('checked', false);
        $row.find('img[id$="_preview"]').attr('src', '/assets/admin/trans.png');
        $row.hide();
    }, 1000);
});
$('.file_input').on('change', function() { 
    let preview_id = $(this).attr('preview_id');
    let photo_id = $(this).attr('photo_id');
    var files = this.files;
    if (files.length === 0) return;
       uploadSingleFile(files[0], function(response) {

            $("#"+preview_id).attr("src","/get_photo/"+response.id+"/500");
             $("#"+photo_id).val(response.id); 



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






      $('#form_{{ $block->id}}').on('submit', function(e) {
         e.preventDefault();
        //return updatePageBlock({{ $block->id}});
      });
});
      </script>