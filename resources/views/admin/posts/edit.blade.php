@extends('admin.layouts.app')
@section('content')

 <form class="ajax_form mb-9" action="/admin/posts/{{$post->id}}" method="POST" >
  @csrf
  @method('PUT')
          <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
              <h2 class="mb-2">{{ $post->type === 'event' ? 'Cập nhật sự kiện' : 'Cập nhật bài viết' }}</h2>

            </div>
            <div class="col-auto">
              <a href="/admin/posts" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
              <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Cập nhật</button>
            </div>
          </div>
          <div class="row g-5">
            <div class="col-12 col-xl-9">

              <div class="col-sm-12 col-md-12">
                <div class="form-floating " >
                    <input  class="form-control" type="text" name="title" id="create-boardwizard-name" placeholder="Tiêu đề bài viết" value="{{ $post->title }}">
                    <label for="create-boardwizard-name">Tiêu đề bài viết</label>
                   <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="col-sm-12 col-md-12">
                <div class="form-floating">

                    <div class="quill_editor" for="post_content" id="editor_post_content"></div>
                    <input id="post_content" type="hidden" name="content" value="{{ $post->content }}">

                    <label for="create-boardwizard-name" style="padding-top:30px !important;left:auto !important; right:0 !important">Nội dung</label>
                    <div class="invalid-feedback"></div>
                </div>
              </div>

              @if($post->type === 'event')
              <div class="col-sm-12 col-md-12">
                <div class="card mt-5">
                  <div class="card-body pt-0">
                    <div class="myfiles-action-bar mx-n4 mb-4" style="padding: 20px;">
                      <h6 class="mb-0 text-body-tertiary">Thông tin sự kiện</h6>
                    </div>
                    <div class="row gx-xxl-9">
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <div class="form-floating">
                          <input value="{{$post->start_at}}" name="start_at" class="form-control datetimepicker flatpickr-input" id="event_start_at" type="text" placeholder="yyyy-mm-dd hour : minute" data-options="{&quot;enableTime&quot;:true,&quot;dateFormat&quot;:&quot;y-m-d H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
                          <label class="form-label" for="event_start_at">Thời gian bắt đầu</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <div class="form-floating">
                          <input value="{{$post->end_at}}" name="end_at" class="form-control datetimepicker flatpickr-input" id="event_end_at" type="text" placeholder="yyyy-mm-dd hour : minute" data-options="{&quot;enableTime&quot;:true,&quot;dateFormat&quot;:&quot;y-m-d H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
                          <label class="form-label" for="event_end_at">Thời gian kết thúc</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <div class="form-floating">
                          <input value="{{$post->location}}" class="form-control" id="location_input" name="location" type="text" placeholder="Nhập địa điểm">
                          <label class="form-label" for="location_input">Địa điểm</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <h6 class="mb-0 text-body-tertiary">Phí tham dự</h6>
                        <div class="form-floating">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="freeTicket" type="radio" name="free_ticket" value="0" {{ $post->price == 0 ? 'checked="checked"':'' }}>
                            <label class="form-check-label" for="freeTicket">Miễn phí</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="paidTicket" type="radio" name="free_ticket" value="1" {{ $post->price > 0 ? 'checked="checked"':'' }}>
                            <label class="form-check-label" for="paidTicket">Có phí</label>
                          </div>
                        </div>
                        <div class="form-floating" id="price_form" style="display: {{ $post->price == 0 ? 'none':'' }};">
                          <input value="{{$post->price}}" class="form-control" id="price_input" name="price" type="text" placeholder="$0.0">
                          <label class="form-label" for="price_input">Chi phí tham dự</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6" style="margin-bottom: 10px;">
                        <h6 class="mb-0 text-body-tertiary">Nhận ủng hộ</h6>
                        <div class="form-floating">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="noCcceptDonation" type="radio" name="accept_donation" value="0" {{ $post->accept_donation == 0 ? 'checked="checked"':'' }}>
                            <label class="form-check-label" for="noCcceptDonation">Không</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="acceptDonation" type="radio" name="accept_donation" value="1" {{ $post->accept_donation == 1 ? 'checked="checked"':'' }}>
                            <label class="form-check-label" for="acceptDonation">Có</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif

             <div class="col-sm-12 col-md-12">
                <div class="card mt-5">
                  <div class="card-body pt-0">
                    <div class="myfiles-action-bar mx-n4 mb-4">
                      <h6 class="mb-0 text-body-tertiary">Thêm file, ảnh cho bài viết</h6>
                    </div>
                    @include('admin.components.file_picker', [
                        'id' => 'post_files_picker',
                        'name' => 'files',
                        'label' => 'Thêm file, ảnh cho bài viết',
                        'initial' => $files->map(fn ($file) => ['id' => $file->id, 'path' => $file->path])->all(),
                    ])
                  </div>
                </div>
              </div>
            </div>



            <div class="col-12 col-xl-3">



              <div class="row g-2">
                <div class="col-12 col-xl-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_published" name="is_published" value="1" {{ $post->is_published ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Xuất bản ngay</label>
                      </div>
                      <p class="fs-10 text-body-tertiary mb-0 mt-1">Bỏ chọn để chuyển về bản nháp, ẩn khỏi trang web.</p>
                    </div>
                  </div>
                </div>
                @if($post->type !== 'event' && $post->routing_id)
                <div class="col-12 col-xl-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <h6 class="mb-2">Đường dẫn</h6>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" readonly value="{{ url('/'.$post->routing_slug) }}" id="post_public_url">
                        <button class="btn btn-phoenix-secondary" type="button" onclick="navigator.clipboard.writeText(document.getElementById('post_public_url').value)">
                          <span class="fas fa-copy"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                <div class="col-12 col-xl-12">
                  <div class="card mb-3">
                    <div class="card-body">

                      <div class="row gx-3">
                        <div class="col-12 col-sm-6 col-xl-12">
                          <div class="mb-4">
                            <h5 class="mb-3">Ảnh đại diện bài viết</h5>
                            @include('admin.components.file_picker', [
                                'id' => 'post_photo_picker',
                                'name' => 'photo_id',
                                'label' => 'Chọn ảnh đại diện',
                                'multiple' => false,
                                'initial' => $post->photo_id ? [['id' => $post->photo_id, 'path' => getPhotoUrl($post->photo_id)]] : [],
                            ])
                            <div class="invalid-feedback"></div>
                          </div>
                        </div>
                        
                        
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
               
                
              </div>

              @if($post->type !== 'event')
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                <div class="form-floating">
                  <select name="category_id" class="form-select" id="level_select">
                    <option value=""  selected="">Chuyên mục</option>
                    <?php
                    foreach ($categories as $category)
                    {
                    ?>
                    <option <?php echo ($category->id==$post->category_id)? 'selected':''?> value="<?php echo $category->id;?>"><?php echo $category->name; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="level_select">Chuyên mục</label>
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="col-12 col-sm-12 col-xl-12" style="margin-top:20px">
                <h6>Thẻ</h6>

                <?php foreach ($tags as $tag)
                {
                ?>
                      <div class="form-check form-check-inline">
                        <input <?php echo ($post->tags->contains('id', $tag->id))? 'checked':''; ?> name="tags[]" class="form-check-input" id="tag_input_{{$tag->id}}" type="checkbox" value="{{$tag->id}}">
                        <label class="form-check-label" for="tag_input_{{$tag->id}}">{{$tag->name}}</label>
                      </div>
                <?php
                }
                ?>


              </div>
              @endif


            </div>





          </div>
          
        </form>

@endsection



@section('js')
<script type="text/javascript">

$('input[type=radio][name=free_ticket]').on('change', function () {
    if ($('#paidTicket').is(':checked')) {
      $('#price_input').val('');
        $('#price_form').show();

    } else {
        $('#price_form').hide();
        $('#price_input').val(0);
    }
});


$(".ajax_form").on("submit", function (e) {
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
            window.location.href = "/admin/posts";
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


</script>
@endsection