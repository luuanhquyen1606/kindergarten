@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
    <div class="col-auto">
      <h2 class="mb-2">Xem trước dữ liệu import</h2>
      <p class="mb-0 text-body-tertiary">
        {{ $valid_count }} dòng hợp lệ
        @if($invalid_count > 0)
          , {{ $invalid_count }} dòng lỗi (sẽ bị bỏ qua)
        @endif
      </p>
    </div>
    <div class="col-auto">
      <a href="{{ route('students.import_form') }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Hủy, tải file khác</a>
      <form action="{{ route('students.import_store') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-primary mb-2 mb-sm-0" @if($valid_count === 0) disabled @endif>
          Import {{ $valid_count }} học sinh
        </button>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive scrollbar-overlay">
        <table class="table table-sm fs-9 mb-0">
          <thead>
            <tr>
              <th>Dòng</th>
              <th>Trạng thái</th>
              <th>Tên</th>
              <th>Ngày sinh</th>
              <th>Lớp</th>
              <th>Địa chỉ</th>
              <th>Bố</th>
              <th>Mẹ</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rows as $row)
              <tr class="{{ $row['valid'] ? '' : 'table-danger' }}">
                <td>{{ $row['line'] }}</td>
                <td>
                  @if($row['valid'])
                    <span class="badge badge-phoenix badge-phoenix-success">Hợp lệ</span>
                  @else
                    <span class="badge badge-phoenix badge-phoenix-danger">Lỗi</span>
                  @endif
                </td>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['birthdate'] }}</td>
                <td>{{ $row['class_name'] }}</td>
                <td>{{ $row['address'] }}</td>
                <td>{{ $row['father_name'] }} / {{ $row['father_phone'] }}</td>
                <td>{{ $row['mother_name'] }} / {{ $row['mother_phone'] }}</td>
              </tr>
              @if(!$row['valid'])
                <tr class="table-danger">
                  <td></td>
                  <td colspan="7" class="text-danger fs-9">{{ implode('; ', $row['errors']) }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
