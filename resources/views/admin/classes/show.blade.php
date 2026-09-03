@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
    <div class="col-auto">
      <a href="/admin/classes" class="fw-semibold fs-9"><span class="fas fa-angle-left me-1"></span>Lớp học</a>
      <h2 class="mb-2">{{ $class->name }}</h2>
    </div>
    <div class="col-auto">
      <a href="{{ route('attendances.show', ['class_id' => $class->id]) }}" class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0"><span class="fas fa-clipboard-check me-1"></span>Điểm danh hôm nay</a>
      <a href="/admin/classes/{{ $class->id }}/edit" class="btn btn-primary mb-2 mb-sm-0"><span class="fas fa-edit me-1"></span>Chỉnh sửa lớp</a>
    </div>
  </div>    

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="row g-5">
    <div class="col-12 col-xl-8">

      <div class="row g-3 mb-4">
        <div class="col-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <h3 class="mb-0">{{ count($students) }}</h3>
              <p class="mb-0 text-body-tertiary fs-9">Sĩ số</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <h3 class="mb-0 text-success">{{ $present_count }}</h3>
              <p class="mb-0 text-body-tertiary fs-9">Có mặt hôm nay</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <h3 class="mb-0 {{ $unpaid_count > 0 ? 'text-warning' : '' }}">{{ $unpaid_count }}</h3>
              <p class="mb-0 text-body-tertiary fs-9">Chưa đóng học phí</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="mb-4 d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Danh sách học sinh</h5>
            <a href="/admin/students/create" class="btn btn-sm btn-phoenix-primary"><span class="fas fa-plus me-1"></span>Thêm học sinh</a>
          </div>

          @if($students->isEmpty())
            <div class="alert alert-warning mb-0">Lớp học chưa có học sinh nào.</div>
          @else
            <div class="border-top border-bottom border-translucent position-relative top-1">
              <div class="table-responsive scrollbar-overlay mx-n1 px-1">
                <table class="table table-sm fs-9 mb-0">
                  <thead>
                    <tr>
                      <th class="align-middle ps-0" style="width:30%">Học sinh</th>
                      <th class="align-middle">Bố / Mẹ</th>
                      <th class="align-middle">Điểm danh hôm nay</th>
                      <th class="align-middle">Học phí</th>
                      <th class="align-middle text-end pe-3">Tác vụ</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($students as $student)
                      <?php $status = $student->attendance_status ?? 'unmarked';
                      $statusLabels = [
                          'present' => ['Có mặt', 'success'],
                          'absent' => ['Vắng', 'danger'],
                          'late' => ['Đi muộn', 'warning'],
                          'excused' => ['Vắng có phép', 'info'],
                          'unmarked' => ['Chưa điểm danh', 'secondary'],
                      ];
                      [$statusLabel, $statusColor] = $statusLabels[$status] ?? $statusLabels['unmarked'];
                      ?>
                      <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="align-middle ps-0 py-3">
                          <a class="d-flex align-items-center text-body-emphasis" href="/admin/students/{{ $student->id }}">
                            <div class="avatar avatar-m"><img class="rounded-square" src="{{ $student->thumbnail_path ?? '/assets/admin/trans.png' }}" alt=""></div>
                            <p class="mb-0 ms-3 text-body-emphasis fw-bold">{{ $student->name }}</p>
                          </a>
                        </td>
                        <td class="align-middle">
                          <div>{{ $student->father_name }}<span class="text-body-tertiary">{{ $student->father_phone ? ' - '.$student->father_phone : '' }}</span></div>
                          <div>{{ $student->mother_name }}<span class="text-body-tertiary">{{ $student->mother_phone ? ' - '.$student->mother_phone : '' }}</span></div>
                        </td>
                        <td class="align-middle">
                          <span class="badge badge-phoenix badge-phoenix-{{ $statusColor }}">{{ $statusLabel }}</span>
                        </td>
                        <td class="align-middle">
                          <a href="/admin/students/{{ $student->id }}/tuitions" class="btn btn-link text-body-quaternary p-0" title="{{ $student->has_unpaid_tuition ? 'Còn học phí chưa thanh toán' : 'Học phí' }}">
                            <span class="fas fa-money-bill-wave {{ $student->has_unpaid_tuition ? 'text-warning' : 'text-body' }}"></span>
                          </a>
                        </td>
                        <td class="align-middle text-end pe-3">
                          <a href="/admin/students/{{ $student->id }}/edit" class="btn btn-link text-body-quaternary p-0">
                            <span class="fas fa-edit text-body"></span>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="col-12 col-xl-4">
      <div class="card mb-3">
        <div class="card-body">
          <div class="text-center mb-3">
            <div class="avatar avatar-5xl">
              <img class="rounded-square" src="{{ $class->thumbnail_path ?? '/assets/admin/trans.png' }}" alt="">
            </div>
          </div>
          <ul class="list-unstyled mb-0 fs-9">
            <li class="d-flex justify-content-between py-2 border-bottom border-translucent">
              <span class="text-body-tertiary">Chương trình học</span>
              <span class="fw-semibold">{{ $class->program_name ?? '—' }}</span>
            </li>
            <li class="d-flex justify-content-between py-2 border-bottom border-translucent">
              <span class="text-body-tertiary">Cơ sở</span>
              <span class="fw-semibold">{{ $class->campus_name ?? '—' }}</span>
            </li>
            <li class="d-flex justify-content-between py-2 border-bottom border-translucent">
              <span class="text-body-tertiary">Năm học</span>
              <span class="fw-semibold">{{ $class->year ?? '—' }}</span>
            </li>
            <li class="d-flex justify-content-between py-2 border-bottom border-translucent">
              <span class="text-body-tertiary">Giáo viên chủ nhiệm</span>
              <span class="fw-semibold">{{ $class->teacher_name ?? '—' }}</span>
            </li>
            <li class="d-flex justify-content-between py-2">
              <span class="text-body-tertiary">Học phí căn bản</span>
              <span class="fw-semibold">{{ $class->tuition ? number_format($class->tuition).'đ' : '—' }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
