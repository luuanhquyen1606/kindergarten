
<?php 
$data = json_decode($block->data_preview,true);
if(!isset($data['programs']))
{
    $data['programs']=[];
}
?>

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
                   
                    <label for="floatingInputLastname">Tiêu đề phụ</label> 
                </div>
    </div>
    <?php foreach ($programs as $program) 
    {
    ?> 
    <div class="col-sm-4 col-md-3">
    <div class="form-check form-check-inline"> 
                        <input  <?php echo (in_array($program->id,$data['programs']))? "checked":""; ?> name="data[programs][]"  class="form-check-input" id="inlineCheckbox_{{$program->id}}" type="checkbox" value="{{ $program->id }}">
                        <label class="form-check-label" for="inlineCheckbox_{{$program->id}}">{{ $program->name }} </label>
    </div>
    </div>
    <?php
    }
    ?>

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