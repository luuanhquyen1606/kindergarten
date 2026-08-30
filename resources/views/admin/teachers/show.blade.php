@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row g-3 flex-between-end mb-5">
    <div class="col-auto">
      <h2 class="mb-2">{{ $teacher->name }}</h2>
    </div>
    <div class="col-auto">
      <a href="/admin/teachers" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Quay về</a>
      <a href="/admin/teachers/{{ $teacher->id }}/edit" class="btn btn-primary mb-2 mb-sm-0">Sửa</a>
    </div>
  </div>

  <div class="row g-5">
    <div class="col-12 col-xl-9">

      <div class="card mb-5">
        <div class="card-body">
          <h5 class="mb-4">Thông tin giáo viên</h5>
          <div class="row g-3">
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Số điện thoại</p>
              <p class="fw-semibold">{{ $teacher->phone ?? '-' }}</p>
            </div>
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Email cá nhân</p>
              <p class="fw-semibold">{{ $teacher->email ?? '-' }}</p>
            </div>
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Email trường</p>
              <p class="fw-semibold">{{ $teacher->school_email ?? '-' }}</p>
            </div>
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Ngày sinh</p>
              <p class="fw-semibold">{{ $teacher->birthday ? \Illuminate\Support\Carbon::parse($teacher->birthday)->format('d/m/Y') : '-' }}</p>
            </div>
            <div class="col-12">
              <p class="text-body-tertiary mb-1">Địa chỉ</p>
              <p class="fw-semibold">{{ $teacher->address ?? '-' }}</p>
            </div>
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Ngày tham gia</p>
              <p class="fw-semibold">{{ $teacher->created_at ? \Illuminate\Support\Carbon::parse($teacher->created_at)->format('d/m/Y') : '-' }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-5">
        <div class="card-body">
          <h5 class="mb-3">Giới thiệu giáo viên</h5>
          @if ($teacher->about)
            <div>{!! $teacher->about !!}</div>
          @else
            <p class="text-body-tertiary mb-0">Chưa có giới thiệu.</p>
          @endif
        </div>
      </div>

      <div class="card mb-5">
        <div class="card-body">
          <h5 class="mb-3">Lớp học phụ trách</h5>
          <div class="table-responsive">
            <table class="table table-sm fs-9 mb-0">
              <thead>
                <tr>
                  <th>Tên lớp</th>
                  <th>Chương trình</th>
                  <th>Năm học</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($classes as $class)
                <tr>
                  <td class="align-middle">
                    <a class="fw-semibold" href="/admin/classes/{{ $class->id }}">{{ $class->name }}</a>
                  </td>
                  <td class="align-middle">{{ $class->program_name ?? '-' }}</td>
                  <td class="align-middle">{{ $class->year ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="text-center text-body-tertiary">Chưa phụ trách lớp học nào.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <div class="col-12 col-xl-3">
      <div class="card mb-5">
        <div class="card-body text-center">
          <div class="avatar avatar-5xl mb-3">
            <img class="rounded-square" src="{{ $teacher->thumbnail_path ?? '/assets/admin/trans.png' }}" alt="{{ $teacher->name }}" />
          </div>
          <h5 class="mb-0">{{ $teacher->name }}</h5>
        </div>
      </div>

      <div class="card mb-5">
        <div class="card-body">
          <h6 class="mb-3">Quyền hạn</h6>
          @forelse ($permission_groups as $group)
            <div class="mb-3">
              <p class="fw-semibold mb-1">{{ $group['group_name'] }}</p>
              <ul class="mb-0 ps-3">
                @foreach ($group['permissions'] as $permission_name)
                  <li>{{ $permission_name }}</li>
                @endforeach
              </ul>
            </div>
          @empty
            <p class="text-body-tertiary mb-0">Chưa được cấp quyền nào.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
