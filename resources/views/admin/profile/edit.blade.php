@extends('admin.layouts.app')
@section('content')
<form class="ajax_form" action="/admin/profile" method="POST">
  @csrf
  @method('PUT')
  <div class="row g-3 flex-between-end mb-5">
    <div class="col-auto">
      <h2 class="mb-2">Sửa hồ sơ</h2>
    </div>
    <div class="col-auto">
      <a href="/admin/profile" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
      <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Lưu thay đổi</button>
    </div>
  </div>
  <div class="row g-5">
    <div class="col-12 col-xl-9">

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" value="{{ $user->name }}" name="name" id="name_input" type="text" placeholder="Họ tên">
          <label for="name_input">Họ tên</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" value="{{ $user->phone }}" name="phone" id="phone_input" type="text" placeholder="Số điện thoại">
          <label for="phone_input">Số điện thoại</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" value="{{ $user->email }}" name="email" id="email_input" type="text" placeholder="Email cá nhân">
          <label for="email_input">Email cá nhân</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <label class="form-label">Email trường</label>
        <div class="input-group">
          <input class="form-control" value="{{ $user->school_email ? Illuminate\Support\Str::before($user->school_email, '@') : '' }}" name="school_email_alias" id="school_email_input" type="text" placeholder="ten.giaovien">
          <span class="input-group-text">{{ '@' . $app['school']->domain }}</span>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" value="{{ $user->address }}" name="address" id="address_input" type="text" placeholder="Địa chỉ">
          <label for="address_input">Địa chỉ</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" value="{{ $user->birthday ? \Illuminate\Support\Carbon::parse($user->birthday)->format('Y-m-d') : '' }}" name="birthday" id="birthday_input" type="date" placeholder="Ngày sinh">
          <label for="birthday_input">Ngày sinh</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12">
        <div class="form-floating">
          <div class="quill_editor" for="about_content" id="editor_about_content"></div>
          <input id="about_content" type="hidden" name="about" value="{{ $user->about }}">
          <label for="about_content" style="padding-top:30px !important;left:auto !important; right:0 !important">Giới thiệu</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <hr>
      <label>Đổi mật khẩu (bỏ trống nếu không đổi):</label>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" name="password" id="password_input" type="password" placeholder="Mật khẩu mới" autocomplete="new-password">
          <label for="password_input">Mật khẩu mới</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" name="password_confirmation" id="password_confirmation_input" type="password" placeholder="Xác nhận mật khẩu mới" autocomplete="new-password">
          <label for="password_confirmation_input">Xác nhận mật khẩu mới</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

    </div>

    <div class="col-12 col-xl-3">
      <div class="row g-2">
        <div class="col-12 col-xl-12">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row gx-3">
                <div class="col-12 col-sm-6 col-xl-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Ảnh đại diện</h5>
                    <div id="photo_file" class="d-flex align-items-end position-relative">
                      <div class="hoverbox" style="width: 100%;">
                        <div class="hoverbox-content rounded-square d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary"></span></div>
                        <div class="position-relative bg-body-quaternary rounded-square cursor-pointer d-flex flex-center ">
                          <div class="avatar avatar-5xl">
                            <img preview-input-id="photo_id" class="rounded-square" src="<?php echo $user->photo_id ? getPhotoUrl($user->photo_id) : "/assets/admin/trans.png"; ?>" alt="" /></div>
                          <label class="w-100 h-100 position-absolute z-1" for="photo_id">
                          </label>
                        </div>
                      </div>
                    </div>
                    <input style="display: none;" name="photo_id" type="text" id="photo_id" class="media-browser-input" value="<?php echo $user->photo_id; ?>">
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="redirect_url" value="/admin/profile">
</form>

@include('admin.pages.media_browser')

@endsection

@section('js')
<script type="text/javascript">
$(".ajax_form").on("submit", function (e) {
    e.preventDefault();
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
            window.location.href = formData.get('redirect_url');
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
