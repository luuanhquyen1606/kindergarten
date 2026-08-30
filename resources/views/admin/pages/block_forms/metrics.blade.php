    <form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
     @csrf
    @method('PUT')

    <?php 
    $data = json_decode($block->data_preview,true);


    if(!isset($data['metrics']['teachers'])) {
        $data['metrics']['teachers']['show']=1;
        $data['metrics']['teachers']['add']=0;
        $data['metrics']['teachers']['title']='Giáo viên'; 
    }
    if(!isset($data['metrics']['students'])) {
        $data['metrics']['students']['show']=1;
        $data['metrics']['students']['add']=0;
        $data['metrics']['students']['title']='Học sinh';
    }
    if(!isset($data['metrics']['parents'])) {
        $data['metrics']['parents']['show']=1;
        $data['metrics']['parents']['add']=0;
        $data['metrics']['parents']['title']='Phụ huynh hài lòng';
    }
    if(!isset($data['metrics']['events'])) {
        $data['metrics']['events']['show']=1;
        $data['metrics']['events']['add']=0;
        $data['metrics']['events']['title']='Sự kiện';
    }

    ?>
 
                
    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[title]" value ="<?php echo isset($data['title'])? $data['title']:''?> " class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                    <label for="floatingInputLastname">Tiêu đề</label>
                </div> 
    </div>
    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[sub_title]" value ="<?php echo isset($data['sub_title'])? $data['sub_title']:''?> " class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                   
                    <label for="floatingInputLastname">Tiêu đề phụ</label>
                </div>
    </div>
    <hr class="bg-body-secondary mb-6 mt-4">
    



<?php foreach ($data['metrics'] as $key => $metric)
{
?>
            <div class="row">
                <div class="col-sm-1 col-md-1">
                    <div class="form-check form-switch">
                            <input value="1" <?php echo (($data['metrics'][$key]['show'] ?? null) == 1)? 'checked': '';?> class="form-check-input"  name="data[metrics][<?php echo $key ?>][show]" id="cta_form_{{$block->id}}_<?php echo $key ?>_show" type="checkbox" />
                            <label class="form-check-label" for="cta_form_{{$block->id}}_<?php echo $key ?>_show">Hiển thị</label>
                    </div>
                </div> 
                <div class="col-sm-2 col-md-2">
                    <div class="form-floating">
                   Giáo viên
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="form-floating">
                   <input name="data[metrics][<?php echo $key;?>][title]" value ="<?php echo ($data['metrics'][$key]['title'])? $data['metrics'][$key]['title']:'Giáo viên'; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                    <label for="floatingInputLastname">Tiêu đề</label>
                    </div>
                </div>
                <div class="col-sm-5 col-md-5">
                    <div class="form-floating">
                        <input name="data[metrics][<?php echo $key ?>][add]" value ="<?php echo ($data['metrics'][$key]['add'])? $data['metrics'][$key]['add']:'0'; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                        <label for="floatingInputLastname">Cộng thêm</label>
                    </div>
                </div>
   
             </div>
             
<?php
}
?>








             
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