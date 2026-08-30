@extends('admin.layouts.app')
@section('content')

<div class="pb-9">

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card mb-5">
    <div class="card-header d-flex justify-content-center align-items-end position-relative mb-6 mb-xxl-0" style="min-height: 200px;">
      <div class="bg-holder rounded-top" style="background-image:url(/assets/admin/img/generic/cover-photo.png);"></div>
      <div class="hoverbox feed-profile" style="width: 130px; height: 130px">
        <div class="position-relative bg-body-quaternary rounded-circle d-flex flex-center mb-xxl-6">
          <div class="avatar avatar-5xl">
            <img class="rounded-circle img-thumbnail shadow-sm border-0" src="{{ $user->thumbnail_path ?? '/assets/admin/trans.png' }}" alt="{{ $user->name }}" />
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row justify-content-xl-between align-items-center">
        <div class="col-auto">
          <div class="d-flex flex-wrap mb-2 align-items-center">
            <h2 class="me-2 mb-0">{{ $user->name }}</h2>
          </div>
          <div class="d-md-flex align-items-center">
            @if ($user->phone)
              <div class="d-flex align-items-center me-4"><span class="fa-solid fa-phone fs-9 text-body-tertiary me-2"></span><span class="fs-8 fw-semibold text-body-tertiary">{{ $user->phone }}</span></div>
            @endif
            @if ($user->email)
              <div class="d-flex align-items-center me-4"><span class="fa-solid fa-envelope fs-9 text-body-tertiary me-2"></span><span class="fs-8 fw-semibold text-body-tertiary">{{ $user->email }}</span></div>
            @endif
            @if ($user->address)
              <div class="d-flex align-items-center"><span class="fa-solid fa-location-dot fs-9 text-body-tertiary me-2"></span><span class="fs-8 fw-semibold text-body-tertiary">{{ $user->address }}</span></div>
            @endif
          </div>
        </div>
        <div class="col-auto">
          <a href="/admin/profile/edit" class="btn btn-primary lh-1"><span class="fas fa-pen me-2"></span>Sửa hồ sơ</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-3 mb-5">
    <div class="col-sm-6 col-xl-3">
      <div class="card h-100">
        <div class="card-body d-flex align-items-center">
          <div class="icon-item icon-item-lg rounded-3 bg-info-subtle me-3"><span class="uil uil-books text-info-dark fs-4"></span></div>
          <div>
            <h3 class="mb-0 text-body-emphasis">{{ $classes->count() }}</h3>
            <p class="text-body-tertiary mb-0 fs-9">Lớp đang phụ trách</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card h-100">
        <div class="card-body d-flex align-items-center">
          <div class="icon-item icon-item-lg rounded-3 bg-primary-subtle me-3"><span class="uil uil-users-alt text-primary-dark fs-4"></span></div>
          <div>
            <h3 class="mb-0 text-body-emphasis">{{ $total_students }}</h3>
            <p class="text-body-tertiary mb-0 fs-9">Học sinh phụ trách</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card h-100">
        <div class="card-body d-flex align-items-center">
          <div class="icon-item icon-item-lg rounded-3 bg-success-subtle me-3"><span class="uil uil-shield-check text-success-dark fs-4"></span></div>
          <div>
            <h3 class="mb-0 text-body-emphasis">{{ $permission_groups->sum(fn($g) => count($g['permissions'])) }}</h3>
            <p class="text-body-tertiary mb-0 fs-9">Quyền được cấp</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card h-100">
        <div class="card-body d-flex align-items-center">
          <div class="icon-item icon-item-lg rounded-3 bg-warning-subtle me-3"><span class="uil uil-calendar-alt text-warning-dark fs-4"></span></div>
          <div>
            <h3 class="mb-0 text-body-emphasis">{{ $user->created_at ? \Illuminate\Support\Carbon::parse($user->created_at)->format('d/m/Y') : '-' }}</h3>
            <p class="text-body-tertiary mb-0 fs-9">Ngày tham gia</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-5">
    <div class="col-12 col-xl-8">

      <div class="card mb-5">
        <div class="card-body">
          <h5 class="mb-4">Thông tin cá nhân</h5>
          <div class="row g-3">
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Số điện thoại</p>
              <p class="fw-semibold">{{ $user->phone ?? '-' }}</p>
            </div>
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Email cá nhân</p>
              <p class="fw-semibold">{{ $user->email ?? '-' }}</p>
            </div>
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Email trường</p>
              <p class="fw-semibold">{{ $user->school_email ?? '-' }}</p>
            </div>
            <div class="col-sm-6">
              <p class="text-body-tertiary mb-1">Ngày sinh</p>
              <p class="fw-semibold">{{ $user->birthday ? \Illuminate\Support\Carbon::parse($user->birthday)->format('d/m/Y') : '-' }}</p>
            </div>
            <div class="col-12">
              <p class="text-body-tertiary mb-1">Địa chỉ</p>
              <p class="fw-semibold">{{ $user->address ?? '-' }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-5">
        <div class="card-body">
          <h5 class="mb-3">Giới thiệu</h5>
          @if ($user->about)
            <div>{!! $user->about !!}</div>
          @else
            <p class="text-body-tertiary mb-0">Chưa có giới thiệu.</p>
          @endif
        </div>
      </div>

      <div class="card mb-5">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Lớp học đang quản lý</h5>
            <a href="/admin/classes" class="fs-9 fw-semibold">Xem tất cả<span class="fas fa-angle-right ms-1"></span></a>
          </div>
          <div class="table-responsive">
            <table class="table table-sm fs-9 mb-0">
              <thead>
                <tr>
                  <th>Tên lớp</th>
                  <th>Chương trình</th>
                  <th>Năm học</th>
                  <th class="text-end">Số học sinh</th>
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
                  <td class="align-middle text-end">{{ $class->student_count }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center text-body-tertiary">Chưa phụ trách lớp học nào.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <div class="col-12 col-xl-4">
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
