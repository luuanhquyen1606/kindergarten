
<?php $data = json_decode($block->data_preview,true);?>

<form id="form_{{ $block->id}}" block-id="{{$block->id}}" action="/admin/page_blocks/{{ $block->id}}" method="POST" class="updatePageBlock row g-3 mb-9">
    @csrf
    @method('PUT')

    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[title]" value ="<?php echo isset($data['title'])? $data['title']:""; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                    <label for="floatingInputLastname">Tiêu đề</label>
                </div>
    </div>
    <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input name="data[sub_title]" value ="<?php echo isset($data['sub_title'])? $data['sub_title']:""; ?>" class="form-control" id="floatingInputLastname" type="text" placeholder="Last name">
                   
                    <label for="floatingInputLastname" style="padding-top:30px !important;left:auto !important; right:0 !important">Nội dung</label> 
                </div>
    </div>
    <?php
    if(!isset($data['teachers'])) {
        $data['teachers'] = [];
    }

     ?>
    <div class="form-floating form-floating-advance-select"><label for="floaTingLabelMultipleSelect">Multiple</label>
         <select name="data[teachers][]" class="form-select" id="floaTingLabelMultipleSelect" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
     <?php
    foreach ($teachers as $teacher) 
    {
    ?>
        <option <?php echo in_array($teacher->id,$data['teachers'])? 'selected':''; ?> value="<?php echo $teacher->id;?>"><?php echo $teacher->name;?></option>
       
    <?php
    }
    ?>
    </select>
    </div>
   

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