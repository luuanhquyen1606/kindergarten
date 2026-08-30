@extends('admin.layouts.app')
@section('content')
@php
$type_labels = [
    'class_fee' => 'Học phí lớp',
    'late_pickup' => 'Phí đón muộn',
    'absence_deduction' => 'Trừ phí nghỉ học',
    'adjustment' => 'Điều chỉnh khác',
];
@endphp
<form class="ajax_form" action="/admin/tuition-fees/{{ $fee->id }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row g-3 flex-between-end mb-5">
    <div class="col-auto">
      <h2 class="mb-2">Sửa {{ $type_labels[$fee->type] ?? $fee->type }} tháng {{ $fee->month }}/{{ $fee->year }} - {{ $student->name }}</h2>
    </div>
    <div class="col-auto">
      <a href="/admin/students/{{ $student->id }}/tuitions/{{ $fee->year }}/{{ $fee->month }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
      <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Lưu</button>
    </div>
  </div>

  <div class="row g-5">
    <div class="col-12 col-xl-9">
      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" value="{{ number_format($fee->original_amount, 0, '.', '') }}" readonly disabled type="text">
          <label>Số tiền ban đầu</label>
        </div>
      </div>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <input class="form-control" value="{{ $fee->amount }}" name="amount" id="amount_input" type="number" step="1" placeholder="Amount">
          <label for="amount_input">Số tiền</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;">
        <div class="form-floating">
          <textarea class="form-control" name="note" id="note_input" style="height:100px;" placeholder="Note">{{ $fee->note }}</textarea>
          <label for="note_input">Lý do điều chỉnh / Ghi chú</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="redirect_url" value="/admin/students/{{ $student->id }}/tuitions/{{ $fee->year }}/{{ $fee->month }}"/>
</form>
@endsection

@section('js')
<script type="text/javascript">
$(".ajax_form").on("submit", function (e) {
    e.preventDefault();
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
