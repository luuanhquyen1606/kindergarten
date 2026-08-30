@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
    <div class="col-auto">
      <h2 class="mb-2">Import học sinh</h2>
    </div>
    <div class="col-auto">
      <a href="/admin/students" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Quay về</a>
    </div>
  </div>

  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card col-xl-8">
    <div class="card-body">
      <p>Tải lên file CSV danh sách học sinh. File cần có dòng tiêu đề với các cột sau:</p>
      <p class="text-body-tertiary fs-9"><code>name, gender, birthdate, class_name, address, father_name, father_phone, father_email, mother_name, mother_phone, mother_email</code></p>
      <p class="fs-9">Ngày sinh (<code>birthdate</code>) theo định dạng <code>yyyy-mm-dd</code>. Cột <code>class_name</code> phải khớp với tên lớp học đã có trong hệ thống (không bắt buộc).</p>
      <a href="{{ route('students.import_sample') }}" class="fw-semibold"><span class="fas fa-download me-1"></span>Tải file mẫu</a>

      <form action="{{ route('students.import_preview') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="mb-3">
          <input class="form-control @error('csv_file') is-invalid @enderror" type="file" name="csv_file" accept=".csv,text/csv" required>
          @error('csv_file')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Xem trước dữ liệu</button>
      </form>
    </div>
  </div>
</div>
@endsection
