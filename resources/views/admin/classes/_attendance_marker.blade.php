<div class="card mb-4 bg-body-tertiary shadow-none border-0">
  <div class="card-body p-3 p-sm-4">
    <div class="d-flex align-items-center mb-2">
      <span class="fa-solid fa-calendar-day me-2 text-body-tertiary"></span>
      <h6 class="mb-0 fw-bold text-body-emphasis flex-1">{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</h6>
      <a class="fs-9 fw-semibold" href="{{ route('attendances.show', ['class_id' => $class_id, 'date' => $date]) }}">Chi tiết điểm danh</a>
    </div>
    <div class="d-flex flex-wrap column-gap-4 row-gap-1 fs-9 text-body-tertiary">
      @if($counts['present'] > 0)
      <span><span class="fa-solid fa-user-group me-1"></span>{{ $counts['present'] }} Đến lớp</span>
      @endif
      @if($counts['absent'] > 0)
      <span><span class="fa-solid fa-user-xmark me-1"></span>{{ $counts['absent'] }} Vắng</span>
      @endif
      @if($counts['late'] > 0)
      <span><span class="fa-solid fa-clock me-1"></span>{{ $counts['late'] }} Đi muộn</span>
      @endif
      @if($counts['excused'] > 0)
      <span><span class="fa-solid fa-file-circle-check me-1"></span>{{ $counts['excused'] }} Có phép</span>
      @endif
      @if($counts['unmarked'] > 0)
      <span><span class="fa-solid fa-circle-question me-1"></span>{{ $counts['unmarked'] }} Chưa điểm danh</span>
      @endif
    </div>
  </div>
</div>
