@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
          <div class="card mb-5">
            <div class="card-header d-flex justify-content-center align-items-end position-relative mb-7 mb-xxl-0" style="min-height: 214px; ">
              <div class="hover-actions-trigger position-static">

                <div class="bg-holder rounded-top" >
                  <img preview-input-id="photo_id" style="height: 214px; width: 100%; object-fit: cover;" src="<?php echo ($class->photo_id)? getPhotoUrl($class->photo_id) : '/assets/admin/img/generic/cover-photo.png'; ?>" />
                </div>
                <input  style="display:none;" type="text" id="photo_id" class="media-browser-input"  name="photo_id"  value="<?php echo $class->photo_id;?>"> 
                <label  class="cover-image-file-input"  for="photo_id"></label>
                <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white"><span class="fa-solid fa-camera me-2 overlay-icon"></span></div>
                <!--/.bg-holder-->
              </div>
              <div class=" feed-profile" style="width: 150px; height: 150px">
                <div class="rounded-circle d-flex flex-center z-1" ></div>
                <div class="position-relative bg-body-quaternary rounded-circle d-flex flex-center mb-xxl-7">
                  <div class="avatar avatar-5xl"><img class="rounded-circle rounded-circle img-thumbnail shadow-sm border-0" src="{{ getPhotoUrl($class->teacher_photo_id) }}" alt=""></div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row justify-content-xl-between">
                <div class="col-auto">
                  <div class="d-flex flex-wrap mb-3 align-items-center">
                    <h2 class="me-2">{{ $class->name }}</h2><span class="fw-semibold fs-7 text-body-emphasis">{{ $class->year }}</span>
                  </div>
                  <div class="mb-5">
                    <div class="d-md-flex align-items-center">
                      <div class="d-flex align-items-center"><span class="fa-solid fa-user-group fs-9 text-body-tertiary me-2 me-lg-1 me-xl-2"></span><a class="text-body-emphasis" href="#!"><span class="fs-7 fw-bold text-body-tertiary text-opacity-85 text-body-emphasis-hover">{{ $students->count() }} <span class="fw-semibold ms-1 me-4">học sinh</span></span></a></div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="row g-2">
                    @if(!$attendance_taken_today)
                    <div class="col-auto order-xxl-2"><a class="btn btn-primary lh-1" href="{{ route('attendances.show', $class->id) }}"><span class="fa-solid fa-user-plus me-2"></span>Điểm danh</a></div>
                    @endif
                    <div class="col-auto order-xxl-1"><button class="btn btn-phoenix-primary lh-1"><span class="fa-solid fa-message me-2"></span>Send Message</button></div>
                    <div class="col-auto">
                      <div class="position-static"><button class="btn btn-phoenix-secondary lh-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-chevron-down me-2"></span> More</button>
                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-user-group text-body-secondary me-2"></span><span>Followers</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-users text-body-secondary me-2"></span><span>Communities</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-photo-film text-body-secondary me-2"></span><span>Media Files</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-calendar-days fs-8 text-body-secondary me-2"></span><span> Events</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-dice text-body-secondary me-2"></span><span>Games</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-user-gear text-body-secondary me-2"></span><span>Settings</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-bell-slash text-body-secondary me-2"></span><span>Mute Conversation</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-gear text-body-secondary me-2"></span><span>Manage Settings</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-hand-holding-heart text-body-secondary me-2"></span><span>Get help</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-flag text-body-secondary me-2"></span><span>Report Account</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-ban text-body-secondary me-2"></span><span>Block Account</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row gy-3 gx-5 gx-xxl-6">
            <div class="col-xl-4 d-none d-xl-block">
              <div class="mb-8">
                <div class="row g-0">
                  <div class="col-6 border-1 border-bottom border-translucent border-end py-2"> <a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-user-group me-2 mb-2 mb-xxl-0"></span>Followers</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-users me-2 mb-2 mb-xxl-0"></span>Communities</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent border-end py-2"><a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-photo-film me-2 mb-2 mb-xxl-0"></span>Media Files</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-calendar-days me-2 mb-2 mb-xxl-0"></span>Events</a></div>
                  <div class="col-6 border-1 border-end border-translucent py-2"><a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-dice me-2 mb-2 mb-xxl-0"></span>Games</a></div>
                  <div class="col-6 border-1 py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-user-gear me-2 mb-2 mb-xxl-0"></span>Settings </a></div>
                </div>
              </div>
              <div class="mb-8">
                <div class="d-flex pb-4 align-items-end">
      
                  <h3 class="flex-1 mb-0">Album</h3><a class="">tất cả</a>
                </div>
                <div class="row g-3">
                  @forelse($recent_photos as $photo)
                  <div class="col-4"><a href="{{ $photo->path }}" class="class-post-photo" data-gallery="gallery-photos"><img class="w-100 rounded-3" style="aspect-ratio: 1 / 1; object-fit: cover;" src="<?php echo getPhotoThumbnail($photo->id, 500); ?>" alt=""></a></div>
                  @empty
                  <div class="col-12 text-body-tertiary fs-9">Chưa có ảnh nào.</div>
                  @endforelse
                </div>
              </div>
              <div class="d-flex pb-4 align-items-end border-bottom border-translucent border-dashed">
                <h3 class="flex-1 mb-0">Điểm danh</h3><a class="fw-bold fs-9" href="{{ route('attendances.show', ['class_id' => $class->id, 'date' => $today]) }}">Chi tiết</a>
              </div>
              <div class="row g-0 mb-5 mb-lg-0">
                @if($present_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-user-group me-2 mb-2 mb-xxl-0"></span>{{ $present_count }} Đến lớp</a></div>
                @endif
                @if($absent_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-user-xmark me-2 mb-2 mb-xxl-0"></span>{{ $absent_count }} Vắng</a></div>
                @endif
                @if($late_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-clock me-2 mb-2 mb-xxl-0"></span>{{ $late_count }} Đi muộn</a></div>
                @endif
                @if($excused_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-file-circle-check me-2 mb-2 mb-xxl-0"></span>{{ $excused_count }} Có phép</a></div>
                @endif
                @if($unmarked_count > 0)
                <div class="col-12 py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-circle-question me-2 mb-2 mb-xxl-0"></span>{{ $unmarked_count }} Chưa điểm danh</a></div>
                @endif
              </div>
            </div>
            <div class="col-12 col-xl-8">
              <div class="card mb-4">
                <div class="card-body p-3 p-sm-4">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2">
                      <img class="rounded-circle" src="{{ getPhotoUrl(Auth::user()->photo_id) }}" alt="">
                    </div>
                    <button type="button" class="btn btn-phoenix-secondary text-start flex-1 rounded-pill text-body-tertiary" data-bs-toggle="modal" data-bs-target="#create_class_post_modal">
                      Chia sẻ điều gì đó với lớp học...
                    </button>
                  </div>
                </div>
              </div>

              <div id="class_posts_feed" data-offset="{{ $posts->count() }}" data-has-more="{{ $has_more_posts ? '1' : '0' }}" data-last-date="{{ $last_post_date }}">
                @if($posts->isEmpty())
                <div class="card mb-4" id="class_posts_empty">
                  <div class="card-body p-4 text-center text-body-tertiary">
                    Chưa có bài viết nào cho lớp học này.
                  </div>
                </div>
                @else
                {!! $posts_html !!}
                @endif
              </div>
              <div id="class_posts_loading" class="text-center text-body-tertiary py-3" style="display:none;">Đang tải...</div>
            </div>
          </div>
        </div>

        <div class="modal fade " id="create_class_post_modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" style="max-width: 75vw;">
            <div class="modal-content">
              <form id="create_class_post_form" action="{{ route('classes.posts.store', $class->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                  <h5 class="modal-title">Tạo bài viết cho lớp {{ $class->name }}</h5>
                  <button type="button" class="btn btn-close p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="d-flex align-items-center mb-3">
                    <div class="avatar avatar-l me-2">
                      <img class="rounded-circle" src="{{ getPhotoUrl(Auth::user()->photo_id) }}" alt="">
                    </div>
                    <span class="fw-bold text-body-emphasis">{{ Auth::user()->name }}</span>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control" name="content" id="class_post_content" style="height: 120px" placeholder="Chia sẻ điều gì đó với lớp học..." required></textarea>
                    <label for="class_post_content">Nội dung</label>
                    <div class="invalid-feedback"></div>
                  </div>


                  @include('admin.components.file_picker', ['id' => 'class_post_files', 'name' => 'files', 'label' => 'Thêm file, ảnh cho bài viết'])
               
               
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-phoenix-secondary" data-bs-dismiss="modal">Hủy</button>
                  <button type="submit" class="btn btn-primary">Đăng bài</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="edit_class_post_modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" style="max-width: 75vw;">
            <div class="modal-content">
              <form id="edit_class_post_form" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Sửa bài viết</h5>
                  <button type="button" class="btn btn-close p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="form-floating mb-3">
                    <textarea class="form-control" name="content" id="edit_class_post_content" style="height: 120px" required></textarea>
                    <label for="edit_class_post_content">Nội dung</label>
                    <div class="invalid-feedback"></div>
                  </div>

                  @include('admin.components.file_picker', ['id' => 'edit_class_post_files', 'name' => 'files', 'label' => 'Thêm file, ảnh cho bài viết'])
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-phoenix-secondary" data-bs-dismiss="modal">Hủy</button>
                  <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
              </form>
            </div>
          </div>
        </div>
@include('admin.pages.media_browser')
@endsection

@section('js')
<script type="text/javascript">
if (window.GLightbox) {
    GLightbox({ selector: '.class-post-photo' });
}

var loadingMorePosts = false;
function maybeLoadMorePosts() {
    var $feed = $('#class_posts_feed');
    if (loadingMorePosts || $feed.data('has-more') != '1') return;
    if ($(window).scrollTop() + $(window).height() < $(document).height() - 300) return;

    loadingMorePosts = true;
    $('#class_posts_loading').show();

    $.ajax({
        url: "{{ route('classes.posts.load', $class->id) }}",
        type: 'GET',
        data: { offset: $feed.data('offset'), last_date: $feed.data('last-date') },
        success: function (res) {
            $feed.append(res.html);
            $feed.data('offset', res.next_offset);
            $feed.data('has-more', res.has_more ? '1' : '0');
            $feed.data('last-date', res.last_date);
        },
        complete: function () {
            loadingMorePosts = false;
            $('#class_posts_loading').hide();
        }
    });
}
$(window).on('scroll', maybeLoadMorePosts);

$('#photo_id').on('change', function () {
    $.ajax({
        url: "{{ route('classes.updatePhoto', $class->id) }}",
        type: 'POST',
        data: { _token: '{{ csrf_token() }}', photo_id: $(this).val() },
    });
});



$('#create_class_post_modal').on('hidden.bs.modal', function () {
    $('#create_class_post_form')[0].reset();
    $('#class_post_files').trigger('picker:reset');
    $('.invalid-feedback').html('');
    $('#create_class_post_form .form-control').removeClass('is-invalid');
});

$('#create_class_post_form').on('submit', function (e) {
    e.preventDefault();
    var $form = $(this);
    $('.invalid-feedback').html('');
    $form.find('.form-control').removeClass('is-invalid');

    $.ajax({
        url: $form.attr('action'),
        type: 'POST',
        data: $form.serialize(),
        success: function () {
            window.location.reload();
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (field, msgs) {
                    $("[name='" + field + "']").addClass('is-invalid');
                    $("[name='" + field + "']").siblings('.invalid-feedback').html(msgs[0]);
                });
            }
        }
    });
});

$(document).on('click', '.edit-class-post', function (e) {
    e.preventDefault();
    var postId = $(this).data('post-id');

    $.getJSON('{{ url('/admin/classes/'.$class->id.'/posts') }}/' + postId + '/edit', function (res) {
        $('#edit_class_post_form').attr('action', '{{ url('/admin/classes/'.$class->id.'/posts') }}/' + postId);
        $('#edit_class_post_content').val(res.content);
        $('#edit_class_post_content').val("anh quyen dep zai");
        $('#edit_class_post_files').trigger('picker:set', [res.files]);
        $('#edit_class_post_modal').modal('show');
    });
});

$('#edit_class_post_modal').on('hidden.bs.modal', function () {
  /*
    $('#edit_class_post_form')[0].reset();
    $('#edit_class_post_files').trigger('picker:reset');
    $('.invalid-feedback').html('');
    $('#edit_class_post_form .form-control').removeClass('is-invalid');
    */
});

$('#edit_class_post_form').on('submit', function (e) {
    e.preventDefault();
    var $form = $(this);
    $('.invalid-feedback').html('');
    $form.find('.form-control').removeClass('is-invalid');

    $.ajax({
        url: $form.attr('action'),
        type: 'POST',
        data: $form.serialize(),
        success: function () {
            window.location.reload();
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (field, msgs) {
                    $("[name='" + field + "']").addClass('is-invalid');
                    $("[name='" + field + "']").siblings('.invalid-feedback').html(msgs[0]);
                });
            }
        }
    });
});

$(document).on('click', '.delete-class-post', function (e) {
    e.preventDefault();
    if (!confirm('Xóa bài viết này?')) return;
    var postId = $(this).data('post-id');
    var $card = $('#class_post_' + postId);

    $.ajax({
        url: '{{ url('/admin/classes/'.$class->id.'/posts') }}/' + postId,
        type: 'POST',
        data: { _token: '{{ csrf_token() }}', _method: 'DELETE' },
        success: function () {
            $card.remove();
        }
    });
});
</script>
@endsection
