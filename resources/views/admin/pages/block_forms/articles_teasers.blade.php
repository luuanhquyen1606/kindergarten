    <form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
     @csrf
    @method('PUT')

    <?php 
    $data = json_decode($block->data_preview,true);
    if(!isset($data['title'])) $data['title']='';
    if(!isset($data['sub_title'])) $data['sub_title']='';
    if(!isset($data['tags'])) $data['tags']=[];
    if(!isset($data['posts'])) $data['posts']=[];
    if(!isset($data['posts_collect'])) $data['posts_collect']='manual';
    ?>
       
                
    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[title]" value ="{{ $data['title'] }}" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                    <label for="floatingInputLastname">Tiêu đề</label>
                </div>
    </div>
    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[sub_title]" value ="{{ $data['sub_title'] }}" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                   
                    <label for="floatingInputLastname">Nội dung</label>
                </div>
    </div>
    <hr class="bg-body-secondary mb-6 mt-4">
    <h6>Lấy tin</h6>
    <div class="col-sm-12 col-md-12">             
        <div class="form-check form-check-inline">
                        <input <?php echo (empty($data['posts_collect']) || $data['posts_collect'] == 'manual') ? 'checked' : ''; ?> class="post_collect_radio form-check-input" block_id="{{$block->id}}" id="{{$block->id}}_post_collect_id_manual" type="radio" name="data[posts_collect]" value="manual">
                        <label class="form-check-label" for="{{$block->id}}_post_collect_id_manual">Thủ công</label> 
        </div>
        <div class="form-check form-check-inline">
                        <input <?php echo (!empty($data['posts_collect']) && $data['posts_collect'] == 'auto') ? 'checked' : ''; ?> class="post_collect_radio form-check-input"  block_id="{{$block->id}}"  id="{{$block->id}}_post_collect_id_auto" type="radio" name="data[posts_collect]" value="auto">
                        <label class="form-check-label" for="{{$block->id}}_post_collect_id_auto">Theo tag</label>
        </div>
                     
                    
    </div>
    
    <div style="display:<?php echo (empty($data['posts_collect']) || $data['posts_collect'] == 'manual') ? '' : 'none'; ?>" class="col-sm-12 col-md-12 post_collect manual" block_id="{{$block->id}}"> 
    <div class="form-floating form-floating-advance-select"><label for="floaTingLabelMultipleSelect">Chọn tin</label>
            <select name="data[posts][]" class="form-select" id="floaTingLabelMultipleSelect" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
        <option>Chọn bài viết</option>
        <?php
        foreach ($posts as $post) 
        {
        
        ?>
            <option <?php echo in_array($post->id,$data['posts'])? 'selected':''; ?> value="<?php echo $post->id;?>"><?php echo $post->title;?></option>
        
        <?php
        }
        ?>
        </select>
        </div>
    </div>
    <div style="display:<?php echo (!empty($data['posts_collect']) && $data['posts_collect'] == 'auto') ? '' : 'none'; ?>" class="col-sm-12 col-md-12 post_collect auto" block_id="{{$block->id}}"> 
        <select name="data[tags][]" class="form-select" id="floaTingLabelMultipleSelect" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
        <option value="">Chọn tags</option>
        <?php
        foreach ($tags as $tag) 
        {
        
        ?>
            <option <?php echo in_array($tag->id,$data['tags'])? 'selected':''; ?> value="<?php echo $tag->id;?>"><?php echo $tag->name;?></option>
           
        <?php
        } 
        ?>
        </select>
    </div>

   
              <hr class="bg-body-secondary mb-6 mt-4">


              <div class="col-12 d-flex justify-content-end mt-6"><button class="btn btn-primary">Xem trước</button></div>
      </form>
      <script type="text/javascript">
$(document).ready(function() {

$(".post_collect_radio").on('change',function(e){

    var type=$(this).val();
    $('.post_collect[block_id="'+$(this).attr('block_id')+'"]').hide(); 
    $('.post_collect[block_id="'+$(this).attr('block_id')+'"].'+type+'').show();
})



      $('#form_{{ $block->id}}').on('submit', function(e) {
         e.preventDefault();
        //return updatePageBlock({{ $block->id}});
      });
});
      </script>