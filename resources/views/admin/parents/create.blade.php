@extends('admin.layouts.app')
@section('content')
<form class="ajax_form" action="/admin/parents" class="mb-9" method="POST" >
  @csrf
          <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
              <h2 class="mb-2">Thêm phụ huynh</h2>

            </div>
            <div class="col-auto">
              <a href="/admin/parents" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
              <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Thêm phụ huynh</button>
            </div>
          </div>
          <div class="row g-5">
            <div class="col-12 col-xl-9">

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                 <div class="form-floating">
                  <input class="form-control" name="name" id="floatingInputGrid" type="text" placeholder="Họ tên">
                  <label for="floatingInputGrid">Họ tên</label>
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                <div class="form-floating">
                  <input class="form-control" name="email" id="floatingInputEmail" type="email" placeholder="Email">
                  <label for="floatingInputEmail">Email</label>
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                <div class="form-floating">
                  <input class="form-control" name="phone" id="floatingInputPhone" type="text" placeholder="Điện thoại">
                  <label for="floatingInputPhone">Điện thoại</label>
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
                <div class="form-floating">
                  <select name="gender" class="form-select" id="floatingSelectGender">
                    <option value="" selected="selected">Chọn giới tính</option>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                  </select>
                  <label for="floatingSelectGender">Giới tính</label>
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <input type="hidden" name="redirect_url" value="/admin/parents">

            </div>
          </div>

        </form>




@endsection



@section('js')
<script type="text/javascript">

$(".ajax_form").on("submit", function (e) {
    e.preventDefault();        // stop full page reload

    var formData = new FormData(this);
    $(".invalid-feedback").html('');
    $("input").removeClass("is-invalid");
    $("select").removeClass("is-invalid");
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
