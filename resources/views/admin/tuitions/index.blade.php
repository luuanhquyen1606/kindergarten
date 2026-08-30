@extends('admin.layouts.app')
@section('content')

<div class="row g-3 flex-between-end mb-5">
  <div class="col-auto">
    <h2 class="mb-2">Học phí - {{ $student->name }}</h2>
  </div>
  <div class="col-auto">
    <a href="/admin/students" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
  </div>
</div>

<div class="card mb-4">
  <div class="card-body">
    <form method="GET" class="row g-2 align-items-end" id="jump_to_month_form">
      <div class="col-auto">
        <label class="form-label mb-0">Tháng</label>
        <select class="form-select" id="jump_month">
          @for ($m = 1; $m <= 12; $m++)
            <option value="{{ $m }}" {{ $m == now()->month ? 'selected' : '' }}>{{ $m }}</option>
          @endfor
        </select>
      </div>
      <div class="col-auto">
        <label class="form-label mb-0">Năm</label>
        <input type="number" class="form-control" id="jump_year" value="{{ now()->year }}" style="width:100px;">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary">Xem / Tạo học phí</button>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <table class="table table-sm">
      <thead>
        <tr>
          <th>Tháng</th>
          <th>Năm</th>
          <th>Tổng học phí</th>
          <th>Trạng thái</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($months as $row)
        <tr>
          <td>{{ $row->month }}</td>
          <td>{{ $row->year }}</td>
          <td>{{ number_format($row->total) }}</td>
          <td>
            @if ($row->status == 'draft')
              <span class="badge bg-secondary">Nháp</span>
            @elseif ($row->status == 'paid')
              <span class="badge bg-success">Đã đóng</span>
            @else
              <span class="badge bg-warning">Chưa đóng</span>
            @endif
          </td>
          <td class="text-end">
            <a href="/admin/students/{{ $student->id }}/tuitions/{{ $row->year }}/{{ $row->month }}" class="btn btn-link p-0">
              Chi tiết
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center text-body-tertiary">Chưa có dữ liệu học phí.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$('#jump_to_month_form').on('submit', function (e) {
    e.preventDefault();
    var month = $('#jump_month').val();
    var year = $('#jump_year').val();
    window.location.href = '/admin/students/{{ $student->id }}/tuitions/' + year + '/' + month;
});
</script>
@endsection
