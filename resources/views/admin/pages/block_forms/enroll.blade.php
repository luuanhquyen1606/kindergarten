    <form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
     @csrf
    @method('PUT')

    <?php 
    $data = json_decode($block->data_preview,true);
    if(!isset($data['title'])) $data['title']="";
    if(!isset($data['sub_title'])) $data['sub_title']="";
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
                    <label for="floatingInputLastname">Tiêu đề phụ</label>
                </div>
    </div>
    
    
    <hr class="bg-body-secondary mb-6 mt-4">
    
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