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

<div class="row g-3 flex-between-end mb-5">
  <div class="col-auto">
    <h2 class="mb-2">Học phí tháng {{ $tuition->month }}/{{ $tuition->year }} - {{ $student->name }}</h2>
  </div>
  <div class="col-auto">
    <a href="/admin/students/{{ $student->id }}/tuitions" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
    <a href="/admin/students/{{ $student->id }}/tuitions/{{ $tuition->year }}/{{ $tuition->month }}/create" class="btn btn-primary mb-2 mb-sm-0">+ Thêm khoản phí</a>
  </div>
</div>

<div class="card mb-4">
  <div class="card-body">
    <div class="row g-3 align-items-center">
      <div class="col-auto">
        <strong>Trạng thái thanh toán:</strong>
        @if ($tuition->status == 'draft')
          <span class="badge bg-secondary">Nháp</span>
        @elseif ($tuition->status == 'paid')
          <span class="badge bg-success">Đã đóng</span>
          @if ($tuition->paid_at)
            <span class="text-body-tertiary">({{ $tuition->paid_at }})</span>
          @endif
        @else
          <span class="badge bg-warning">Chưa đóng</span>
        @endif
      </div>
      <div class="col-auto">
        <form action="/admin/tuitions/{{ $tuition->id }}/status" method="POST" class="d-flex gap-2">
          @csrf
          @method('PUT')
          <input type="hidden" name="status" value="{{ $tuition->status == 'paid' ? 'unpaid' : 'paid' }}">
          <input type="text" name="note" class="form-control form-control-sm" placeholder="Ghi chú (vd: số biên lai)" value="{{ $tuition->note }}">
          <button type="submit" class="btn btn-sm {{ $tuition->status == 'paid' ? 'btn-outline-warning' : 'btn-outline-success' }}">
            {{ $tuition->status == 'paid' ? 'Đánh dấu chưa đóng' : 'Đánh dấu đã đóng' }}
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <table class="table table-sm">
      <thead>
        <tr>
          <th>Loại phí</th>
          <th>Số tiền</th>
          <th>Ghi chú</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lines as $line)
        <tr>
          <td>{{ $type_labels[$line->type] ?? $line->type }}</td>
          <td>{{ number_format($line->amount) }}</td>
          <td>{{ $line->note ?? '-' }}</td>
          <td class="text-end">
            <a href="/admin/tuition-fees/{{ $line->id }}/edit" class="btn btn-link text-body-quaternary p-0 me-2">
              <span class="fas fa-edit text-body"></span>
            </a>
            @if ($line->type != 'class_fee')
            <form action="/admin/tuition-fees/{{ $line->id }}" method="POST" class="d-inline delete_line_form">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-link text-danger p-0">
                <span class="fa-solid fa-trash text-danger"></span>
              </button>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Tổng cộng</th>
          <th>{{ number_format($total) }}</th>
          <th colspan="2"></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$('.delete_line_form').on('submit', function (e) {
    if (!confirm('Xoá khoản phí này?')) {
        e.preventDefault();
    }
});
</script>
@endsection
