    <?php $data = json_decode($block->data_preview,true);?>
<form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
     @csrf
    @method('PUT')



     

    
              
              <div class="col-sm-12 col-md-12"> 
                <div class="form-floating"> 
                    <?php
                    $randId=  rand(1,9999);
                    ?>
                    <div class="quill_editor" for="post_content_{{ $block->id}}"></div>
                    <input id="post_content_{{ $block->id}}" type="hidden" name="data[content]" value="{{$data['content'] ?? ''}}">   

                    <label for="block_{{$block->id}}_sub_title" style="padding-top:30px !important;left:auto !important; right:0 !important">Giới thiệu</label>
                    <div class="invalid-feedback"></div>
                </div>
              </div>

              <hr class="bg-body-secondary mb-6 mt-4">


              <div class="col-12 d-flex justify-content-end mt-6"><button class="btn btn-primary">Xem trước</button></div>
      </form>
      <script type="text/javascript">
$(document).ready(function() {






      $('#form_{{ $block->id}}').on('submit', function(e) {
         e.preventDefault();
        //return updatePageBlock({{ $block->id}});      
      });

    
});
      </script>