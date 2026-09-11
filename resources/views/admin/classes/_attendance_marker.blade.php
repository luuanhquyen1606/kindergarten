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

    @if(isset($meals) && $meals->isNotEmpty())
    <div class="d-flex flex-wrap column-gap-4 row-gap-2 fs-9 text-body-tertiary mt-2 pt-2 border-top border-dashed">
      @foreach($meals as $meal)
      <span class="d-inline-flex align-items-center">
        @if($meal->thumbnail_path)
        <a href="{{ $meal->photo_path }}" class="class-meal-photo me-2" data-gallery="gallery-class-meal-{{ $class_id }}-{{ $date }}">
          <img src="{{ $meal->thumbnail_path }}" class="rounded" style="width:28px;height:28px;object-fit:cover;" alt="{{ $meal->meal_type_name }}">
        </a>
        @else
        <span class="fa-solid fa-utensils me-1"></span>
        @endif
        <span class="fw-semibold me-1">{{ $meal->meal_type_name }}:</span>
        {{ Str::limit($meal->description ?: 'Chưa có mô tả', 60) }}
      </span>
      @endforeach
    </div>
    @endif

    @if(isset($attention) && $attention->isNotEmpty())
    <div class="alert alert-subtle-warning d-flex align-items-start mt-3 mb-0 py-2 px-3">
      <span class="fa-solid fa-triangle-exclamation me-2 mt-1"></span>
      <div class="fs-9">
        <span class="fw-bold text-warning-emphasis">Lưu ý:</span>
        @foreach($attention as $row)
        <div class="d-flex align-items-center mt-1">
          <img src="{{ $row->thumbnail_path ?? '/assets/admin/trans.png' }}" class="rounded-circle me-2" style="width:20px;height:20px;object-fit:cover;flex-shrink:0;" alt="{{ $row->name }}">
          <span><a href="{{ route('students.show', $row->id) }}" class="fw-semibold">{{ $row->name }}</a> &mdash; {{ implode(', ', $row->attention_reasons) }}</span>
        </div>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</div>
