    <?php $data = json_decode($block->data_preview,true);?>
<form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
     @csrf
    @method('PUT')



     

    <div class="col-sm-12 col-md-12">
                      <div class="form-floating form-floating-advance-select mb-3">
                        <label for="floaTingLabelSingleSelect">Chọn tin</label>
                        <select class="article_teaser_post_select" data-block_id="{{$block->id}}" id="block_{{$block->id}}_posts" name="data[id]" class="form-select"  data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                          <option value=''>Chọn tin</option>
                          <?php
                          foreach ($posts as $post)           
                          {
                          ?>   
                          <option  <?php echo (isset($data['id']) && $data['id'] == $post->id)? 'selected': '';?>  value="<?php echo $post->id;?>"><?php echo $post->title;?></option>
                          <?php
                          } 
                          ?>
                        </select> 
                        <div class="invalid-feedback"></div>
                      </div>
    </div>
              <div class="col-sm-12 col-md-12"> 
                <div class="form-floating " >
                    <input  class="form-control" type="text" name="data[title]" id="block_{{$block->id}}_title" placeholder="Tiêu đề bài viết" value="<?php echo ($data['title'] ?? null) ? $data['title']: '';?>">
                    <label for="block_{{$block->id}}_title">Tiêu đề </label>
                   <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12"> 
                <div class="form-floating">
                    
                      <div class="quill_editor" for="post_content" id="editor_post_content_{{ $block->id}}"></div>
                    <input id="post_content" type="hidden" name="data[sub_title]" @if(!empty($data['sub_title'])) value="{{ $data['sub_title'] }}" @endif>

                    <label for="block_{{$block->id}}_sub_title" style="padding-top:30px !important;left:auto !important; right:0 !important">Giới thiệu</label>
                    <div class="invalid-feedback"></div>
                </div>
              </div>

              <hr class="bg-body-secondary mb-6 mt-4">


              <div class="col-12 d-flex justify-content-end mt-6"><button class="btn btn-primary">Xem trước</button></div>
      </form>
      <script type="text/javascript">
$(document).ready(function() {


$('.article_teaser_post_select').on('change', function () {
   var post_id=$(this).val();
   $.ajax({
              url: '/admin/posts/'+post_id, // your backend endpoint
              type: 'GET',
              success: function(response) {
               var content = response.data.post.content;
               console.log(content); 
               var quill = quills['editor_post_content_{{ $block->id}}'];
               if (quill) {
                 quill.setContents(quill.clipboard.convert({ html: content }));
               }
              },   
              error: function(xhr, status, error) {
                 
              }
          });

});




      $('#form_{{ $block->id}}').on('submit', function(e) {
         e.preventDefault();
        //return updatePageBlock({{ $block->id}}); 
      });

    
});
      </script>