@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
    
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
    
  <div class="mb-4">
    <a href="/admin/students" class="text-body-tertiary fw-semibold fs-9"><span class="fas fa-arrow-left me-2"></span>Danh sách học sinh</a>
  </div>

  <div class="card mb-5">
    <div class="card-header d-flex justify-content-center align-items-end position-relative mb-7 mb-xxl-0" style="min-height: 180px; background-image:url(/assets/admin/img/generic/cover-photo.png); background-size:cover; background-position:center;">
      <div class="hoverbox feed-profile" style="width: 150px; height: 150px">
        <div class="position-relative bg-body-quaternary rounded-circle d-flex flex-center mb-xxl-7">
          <div class="avatar avatar-5xl">
            <img class="rounded-circle img-thumbnail shadow-sm border-0" style="width:150px;height:150px;object-fit:cover;" src="<?php echo $student->photo_id ? getPhotoUrl($student->photo_id): '/assets/admin/trans.png' ?>" alt="{{ $student->name }}">
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row justify-content-xl-between g-3">
        <div class="col-auto">
          <div class="d-flex flex-wrap mb-2 align-items-center">
            <h2 class="me-2 mb-0">{{ $student->name }}</h2>
            <span class="badge badge-phoenix badge-phoenix-secondary me-2">{{ $student->gender == 'male' ? 'Nam' : ($student->gender == 'female' ? 'Nữ' : 'Chưa rõ giới tính') }}</span>
            @if($has_unpaid_tuition)
              <span class="badge badge-phoenix badge-phoenix-warning">Còn học phí chưa thanh toán</span>
            @endif
          </div>
          <div class="mb-2">
            <div class="d-md-flex align-items-center flex-wrap">
              <div class="d-flex align-items-center me-4 mb-1"><span class="fas fa-user-group fs-9 text-body-tertiary me-2"></span>
                @if($student->class_id)
                  <a class="fs-9 fw-semibold text-body-emphasis" href="/admin/classes/{{ $student->class_id }}">{{ $student->class_name }}</a>
                @else
                  <span class="fs-9 fw-semibold text-body-tertiary">Chưa xếp lớp</span>
                @endif
              </div>
              <div class="d-flex align-items-center me-4 mb-1"><span class="fas fa-cake-candles fs-9 text-body-tertiary me-2"></span>
                <span class="fs-9 fw-semibold text-body-tertiary">{{ $student->birthdate ? \Illuminate\Support\Carbon::parse($student->birthdate)->format('d/m/Y') : '-' }}</span>
              </div>
              <div class="d-flex align-items-center mb-1"><span class="fas fa-location-dot fs-9 text-body-tertiary me-2"></span>
                <span class="fs-9 fw-semibold text-body-tertiary">{{ $student->address ?: '-' }}</span>
              </div>
            </div>
          </div>
          @if($student->tuition_discount)
            <p class="fs-9 text-body-secondary mb-0">Giảm học phí {{ $student->tuition_discount }}%@if($student->tuition_discount_reason) &middot; {{ $student->tuition_discount_reason }}@endif</p>
          @endif
        </div>
        <div class="col-auto">
          <div class="row g-2">
            <div class="col-auto order-xxl-2"><a href="/admin/students/{{ $student->id }}/tuitions" class="btn btn-primary lh-1"><span class="fas fa-money-bill-wave me-2"></span>Học phí</a></div>
            <div class="col-auto order-xxl-1"><a href="/admin/students/{{ $student->id }}/edit" class="btn btn-phoenix-primary lh-1"><span class="fas fa-pen me-2"></span>Sửa thông tin</a></div>
            <div class="col-auto">
              <div class="position-static">
                <button class="btn btn-phoenix-secondary lh-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-chevron-down me-2"></span>Khác</button>
                <div class="dropdown-menu dropdown-menu-end py-2">
                  <a class="dropdown-item" href="/admin/students">Quay về danh sách</a>
                  @if($student->class_id)
                    <a class="dropdown-item" href="/admin/attendance/{{ $student->class_id }}">Điểm danh lớp</a>
                  @endif
                  <div class="dropdown-divider"></div>
                  <button class="dropdown-item text-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_delete_student" aria-controls="offcanvas_delete_student">Xoá học sinh</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row gy-3 gx-5 gx-xxl-6">
    <div class="col-xl-4">

      <div class="card mb-4">
        <div class="card-body">
          <h6 class="mb-3 text-body-tertiary">Thông tin liên hệ</h6>
          <div class="row g-3">
            <div class="col-6">
              <p class="text-body-tertiary mb-1 fs-9">Bố</p>
              @if($student->father_id)
                <p class="fw-semibold mb-0 fs-9"><a class="text-body-emphasis" href="/admin/parents/{{ $student->father_id }}">{{ $student->father_name ?: '-' }}</a></p>
              @else
                <p class="fw-semibold mb-0 fs-9">{{ $student->father_name ?: '-' }}</p>
              @endif
              <p class="fs-9 text-body-tertiary mb-0">{{ $student->father_phone ?: '-' }}</p>
            </div>
            <div class="col-6">
              <p class="text-body-tertiary mb-1 fs-9">Mẹ</p>
              @if($student->mother_id)
                <p class="fw-semibold mb-0 fs-9"><a class="text-body-emphasis" href="/admin/parents/{{ $student->mother_id }}">{{ $student->mother_name ?: '-' }}</a></p>
              @else
                <p class="fw-semibold mb-0 fs-9">{{ $student->mother_name ?: '-' }}</p>
              @endif
              <p class="fs-9 text-body-tertiary mb-0">{{ $student->mother_phone ?: '-' }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-4">
        <div class="card-body">
          <div class="d-flex pb-3 align-items-center justify-content-between">
            <h6 class="mb-0 text-body-tertiary">Ảnh ({{ count($photos) }})</h6>
          </div>
          @if(count($photos))
            <div class="row g-2">
              @foreach($photos->take(6) as $photo)
                <div class="col-4">
                  <a href="{{ $photo->path }}" target="_blank" title="{{ $photo->caption }}">
                    <img class="w-100 rounded-2" style="aspect-ratio:1/1;object-fit:cover;" src="/get_photo/{{ $photo->file_id }}/300" alt="">
                  </a>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-body-tertiary fs-9 mb-0">Chưa có ảnh nào.</p>
          @endif
        </div>
      </div>

      <div class="card mb-4">
        <div class="card-body">
          <div class="d-flex pb-3 align-items-center justify-content-between">
            <h6 class="mb-0 text-body-tertiary">Học phí gần đây</h6>
            <a class="fw-bold fs-9" href="/admin/students/{{ $student->id }}/tuitions">Xem tất cả</a>
          </div>
          @forelse($months as $month)
            <div class="d-flex justify-content-between align-items-center py-2 {{ !$loop->last ? 'border-bottom border-translucent' : '' }}">
              <a class="text-body-emphasis fs-9 fw-semibold" href="/admin/students/{{ $student->id }}/tuitions/{{ $month->year }}/{{ $month->month }}">Tháng {{ sprintf('%02d', $month->month) }}/{{ $month->year }}</a>
              <div class="text-end">
                <p class="mb-0 fs-9 fw-semibold">{{ number_format($month->total) }} đ</p>
                <span class="badge badge-phoenix {{ $month->status == 'paid' ? 'badge-phoenix-success' : 'badge-phoenix-warning' }}">{{ $month->status == 'paid' ? 'Đã đóng' : 'Chưa đóng' }}</span>
              </div>
            </div>
          @empty
            <p class="text-body-tertiary fs-9 mb-0">Chưa có dữ liệu học phí.</p>
          @endforelse
        </div>
      </div>

    </div>

    <div class="col-12 col-xl-8">
      <div class="card">
        <div class="card-body">
          <h6 class="mb-4 text-body-tertiary">Hoạt động gần đây</h6>
          @forelse($timeline as $event)
            <div class="d-flex mb-4 {{ !$loop->last ? 'pb-4 border-bottom border-translucent' : '' }}">
              <div class="icon-item icon-item-sm rounded-circle bg-{{ $event['color'] }}-subtle me-3 flex-shrink-0">
                <span class="fas {{ $event['icon'] }} text-{{ $event['color'] }}-dark fs-9"></span>
              </div>
              <div class="flex-1">
                <p class="mb-0 fw-semibold text-body-emphasis">{{ $event['title'] }}</p>
                @if($event['description'])
                  <p class="mb-1 text-body-secondary fs-9">{{ $event['description'] }}</p>
                @endif
                <p class="mb-0 fs-10 text-body-tertiary">{{ \Illuminate\Support\Carbon::parse($event['date'])->format('d/m/Y H:i') }}</p>
              </div>
            </div>
          @empty
            <p class="text-body-tertiary text-center py-5 mb-0">Chưa có hoạt động nào.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>

  <div class="offcanvas offcanvas-end" id="offcanvas_delete_student" tabindex="-1" aria-labelledby="offcanvas_delete_studentLabel">
    <div class="offcanvas-body" style="padding-top: 100px;">{{ $student->name }}</div>
    <div class="offcanvas-body bottom" style="position: absolute; bottom: 0; width: 100%;">
      Xoá học sinh này?
      <div class="mt-3">
        <form method="POST" action="/admin/students/{{ $student->id }}">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Hủy</button>
          <button type="submit" class="btn btn-danger">Xoá học sinh</button>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection
