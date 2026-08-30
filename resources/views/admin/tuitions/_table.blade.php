<div class="card tuitions-table-card" id="tuitions_table_container">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <div>
        <h5 class="mb-1"> Học phí tháng {{ $month }}/{{ $year }}<span class="badge badge-phoenix badge-phoenix-success rounded-pill fs-9 ms-2"> <span class="badge-label"> {{ $paid_count }} / {{ $students->count() }}</span></span></h5>
        <h6 class="text-body-tertiary"> {{ $class_name ?? 'Toàn trường' }}</h6>
      </div>
      <h4>{{ number_format($paid_amount) }} / {{ number_format($total_amount) }}</h4>
    </div>
    <table class="table table-sm">
      <thead>
        <tr>
          <th style="width:1%"><input type="checkbox" class="form-check-input" id="bulk_select_all"></th>
          <th>Học sinh</th>
          <th>Lớp</th>
          <th>Tổng học phí</th>
          <th>Trạng thái</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($students as $row)
        <tr>
          <td>
            @if ($row->tuition_id)
              <input type="checkbox" class="form-check-input bulk_row_checkbox" name="ids[]" value="{{ $row->tuition_id }}">
            @endif
          </td>
          <td>{{ $row->student_name }}</td>
          <td>{{ $row->class_name ?? '-' }}</td>
          <td>{{ number_format($row->total) }}</td>
          <td>
            @if (!$row->tuition_id)
              <span class="badge bg-secondary">Chưa tạo</span>
            @elseif ($row->status == 'draft')
              <span class="badge bg-secondary">Nháp</span>
            @elseif ($row->status == 'paid')
              <span class="badge bg-success">Đã đóng</span>
            @else
              <span class="badge bg-warning">Chưa đóng</span>
            @endif
          </td>
          <td class="text-end">
            <a href="/admin/students/{{ $row->student_id }}/tuitions/{{ $year }}/{{ $month }}" class="btn btn-link p-0">
              Chi tiết
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center text-body-tertiary">Không có học sinh nào.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
