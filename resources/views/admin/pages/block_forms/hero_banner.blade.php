    <form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
@csrf
@method('PUT')
<?php
$data = json_decode($block->data_preview,true);
for($i=0;$i<=4;$i++)
{
  if(!isset($data['banners'][$i])) {
    $data['banners'][$i]=['show'=>1,'photo_id'=>'','title'=>'','sub_title'=>'','cta'=>['type'=>'none','reference_id'=>'','url'=>'']];
  }
}


?>


    

  <?php
  $usedBannerCount = 0;
  foreach ($data['banners'] as $banner) {
      if (!empty($banner['photo_id'])) {
          $usedBannerCount++;
      }
  }
  ?>
  <div class="mb-3 text-muted">Đã sử dụng <span class="used-banner-count"><?php echo $usedBannerCount; ?></span>/5 banner-section</div>
  <div class="tab-content" id="myTab_{{$block->id}}Content">
    <?php
  for ($i=0;$i<5;$i++)
    {
      $isBannerVisible = ($i == 0) || !empty($data['banners'][$i]['photo_id']);
  ?>     <div class="banner-section" data-block-id="{{$block->id}}" data-index="{{$i}}" <?php echo $isBannerVisible ? '' : 'style="display:none;"'; ?>>
                            <hr>
                            <div class="row" id="tab-banner-{{ $block->id}}-{{$i}}" role="tabpanel" aria-labelledby="tab-banner-{{ $block->id}}-{{$i}}">
                            

                        <div class="col-3 col-sm-12 col-xl-3">  
                          <div class="mb-4">
                                
                                    <div class="hoverbox" style="width: 100%;"> 
                                    <div class="hoverbox-content rounded-square d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary"></span></div>
                                    <div class="position-relative bg-body-quaternary rounded-square cursor-pointer d-flex flex-center ">
                                      <div class="">
                                        
                                        
                                        <img style="height:150px" preview-input-id="block_{{$block->id}}_banner_{{$i}}_photo_id" style="min-height:150px" class="w-100 rounded-square" src="<?php echo ($data['banners'][$i]['photo_id']) ? getPhotoUrl($data['banners'][$i]['photo_id']) :"/assets/admin/trans.png";?>" alt="" /></div>
                                         
                                        
                                        <label class="w-100 h-100 position-absolute z-1" data-banner-id="{{$i}}" for="block_{{$block->id}}_banner_{{$i}}_photo_id"> 
                                      </label>
                                    </div>
                                    
                             
                            </div>
                            <input style="display:none" type="text" class="media-browser-input" id="block_{{$block->id}}_banner_{{$i}}_photo_id"   name="data[banners][<?php echo $i?>][photo_id]"  value="<?php echo ($data['banners'][$i]['photo_id'])? $data['banners'][$i]['photo_id']:""; ?>">
                            <div class="invalid-feedback"></div> 
                          </div>
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check form-switch">
                              <input value="1" <?php echo (($data['banners'][$i]['show'] ?? null) == 1)? 'checked': '';?> class="form-check-input"  name="data[banners][<?php echo $i?>][show]" id="cta_form_{{$block->id}}_{{$i}}_show" type="checkbox" />
                              <label class="form-check-label" for="cta_form_{{$block->id}}_{{$i}}_show">Hiển thị</label>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-banner-btn" data-block-id="{{$block->id}}" data-index="{{$i}}">Xóa</button>
                          </div>
                        </div>

                            
                          <div class="col-9 col-sm-12 col-xl-9" style="margin-bottom: 10px;"> 
                            <div class="form-floating " > 
                                <input  class="form-control" type="text" name="data[banners][<?php echo $i?>][title]" id="title" placeholder="Tiêu đề" value="<?php echo ($data['banners'][$i]['title'])? $data['banners'][$i]['title']:""; ?>">
                                <label for="title">Tiêu đề</label>
                              <div class="invalid-feedback"></div> 
                            </div>
                            <div class="form-floating " >
                                <input  class="form-control" type="text" name="data[banners][<?php echo $i?>][sub_title]" id="sub_title" placeholder="Tiêu đề" value="<?php echo ($data['banners'][$i]['sub_title'])? $data['banners'][$i]['sub_title']:""; ?>">
                                <label for="sub_title">Tiêu đề phụ</label>
                              <div class="invalid-feedback"></div> 
                            </div>





<label class="form-lable" for="organizerSingle_{{$i}}">Liên kết</label>

<select name="data[banners][<?php echo $i?>][routing_id]"  class="form-select" id="organizerSingle_<?php echo $i;?>" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
  <option value="">Chọn liên kết</option>
  <option <?php echo (($data['banners'][$i]['routing_id'] ?? null) == 'external')? 'selected':''; ?> value="external">Liên kết ngoài</option>
  <?php
  foreach($routings as $routing)
  {
  ?>
  <option <?php echo ($routing->id == ($data['banners'][$i]['routing_id'] ?? null))? 'selected':''; ?> value="<?php echo $routing->id; ?>"><?php echo ($routing->entity=='pages' ? '[Trang] ' : '[Bài viết] ').($routing->title ?: $routing->title);?></option> 
  <?php
  }
  ?>

</select>

<div class="form-floating " style="display:none" > 
                                <input  class="form-control" type="text" name="data[banners][<?php echo $i?>][url]" id="title" placeholder="Tiêu đề" value="">
                                <label for="title">Url</label>
                              <div class="invalid-feedback"></div> 
                            </div>
  


                         



 
                </div>














                         
                         
                          
                                </div>
                                </div>
                  <?php
    }
  $hasHiddenBanner = false;
  for ($i=0;$i<5;$i++) {
      $isBannerVisible = ($i == 0) || !empty($data['banners'][$i]['photo_id']);
      if (!$isBannerVisible) { $hasHiddenBanner = true; break; }
  }
  ?>
                            </div>

    <div class="col-12 mb-3">
      <button type="button" class="btn btn-outline-primary add-banner-btn" data-block-id="{{$block->id}}" <?php echo $hasHiddenBanner ? '' : 'style="display:none;"'; ?>>Thêm banner</button>
    </div>

              <div class="col-12 d-flex justify-content-end mt-6"><button class="btn btn-primary">Xem trước</button></div>
      </form>











      <script type="text/javascript">
$(document).ready(function() {

  


$('.cta_type').on('change', function () {
    $(".navigation_referent_form."+$(this).attr('banner_number')).hide();
    $("#"+$(this).attr('form_id')).show();
});

$('.add-banner-btn[data-block-id="{{ $block->id }}"]').on('click', function() {
    var $sections = $('#myTab_{{ $block->id}}Content .banner-section[data-block-id="{{ $block->id }}"]');
    var $next = $sections.filter(':hidden').first();
    if ($next.length) {
        $next.show();
    }
    if ($sections.filter(':hidden').length === 0) {
        $(this).hide();
    }
});

$('#myTab_{{ $block->id}}Content').on('change', '.media-browser-input', function() {
    if ($(this).val()) {
        $(this).closest('.banner-section').find('.form-check-input').prop('checked', true);
    }
});

$('.remove-banner-btn[data-block-id="{{ $block->id }}"]').on('click', function() {
    var $section = $(this).closest('.banner-section');

    $section.find('input[type="text"]').val('');
    $section.find('input[type="checkbox"]').prop('checked', false);
    $section.find('select').val('').trigger('change');
    $section.find('img[preview-input-id]').attr('src', '/assets/admin/trans.png');

    setTimeout(function() {
        $section.hide();
        $('.add-banner-btn[data-block-id="{{ $block->id }}"]').show();
    }, 1000);
});

$('#form_{{ $block->id}}').on('submit', function(e) {

        e.preventDefault();
        //return updatePageBlock({{ $block->id}});
          
      });

function dotToBracket(name) {
    const parts = name.split('.');
    let result = parts.shift();

    parts.forEach(part => {
        result += '[' + part + ']';
    });
   
    return result;
}








     
});
      </script>