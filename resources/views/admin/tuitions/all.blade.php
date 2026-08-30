@extends('admin.layouts.app')
@section('content')

<div class="row g-3 flex-between-end mb-5">
  <div class="col-auto">
    <h2 class="mb-2">Học phí</h2>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card mb-4">
  <div class="card-body">
    <form method="GET" class="row g-2 align-items-end" id="tuition_filter_form">
      <div class="col-auto">
        <label class="form-label mb-0">Tháng</label>
        <select class="form-select" name="month" id="tuition_month_select">
          @for ($m = 1; $m <= 12; $m++)
            <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }} {{ ($year == now()->year && $m > now()->month) ? 'disabled' : '' }}>{{ $m }}</option>
          @endfor
        </select>
      </div>
      <div class="col-auto">
        <label class="form-label mb-0">Năm</label>
        <input type="number" class="form-control" name="year" id="tuition_year_input" value="{{ $year }}" max="{{ now()->year }}" style="width:100px;">
      </div>
      <div class="col-auto">
        <label class="form-label mb-0">Lớp</label>
        <select class="form-select" name="class_id" id="tuition_class_select">
          <option value="">Tất cả lớp</option>
          @foreach ($classes as $class)
            <option value="{{ $class->id }}" {{ (string) $class_id === (string) $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-auto">
        <label class="form-label mb-0">Trạng thái</label>
        <select class="form-select" name="status" id="tuition_status_select">
          <option value="">Tất cả</option>
          <option value="draft" {{ $status == 'draft' ? 'selected' : '' }}>Nháp</option>
          <option value="unpaid" {{ $status == 'unpaid' ? 'selected' : '' }}>Chưa đóng</option>
          <option value="paid" {{ $status == 'paid' ? 'selected' : '' }}>Đã đóng</option>
          <option value="none" {{ $status == 'none' ? 'selected' : '' }}>Chưa tạo học phí</option>
        </select>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary">Lọc</button>
      </div>
    </form>
  </div>
</div>

<form method="POST" action="/admin/tuitions/bulk-status" id="bulk_tuitions_form">
  @csrf

  <div class="card mb-3" id="bulk_actions_bar" style="display:none;">
    <div class="card-body d-flex align-items-center gap-2 py-2">
      <span id="bulk_selected_count" class="fw-semibold me-2"></span>
      <button type="submit" name="status" value="published" class="btn btn-sm btn-outline-primary">Xuất bản</button>
      <button type="submit" name="status" value="unpaid" class="btn btn-sm btn-outline-warning">Đánh dấu chưa đóng</button>
      <button type="submit" name="status" value="paid" class="btn btn-sm btn-outline-success">Đánh dấu đã đóng</button>
    </div>
  </div>

  @include('admin.tuitions._table')
</form>

@endsection

@section('js')
<script type="text/javascript">
(function () {
  var CURRENT_YEAR = {{ now()->year }};
  var CURRENT_MONTH = {{ now()->month }};
  var yearInput = document.getElementById('tuition_year_input');
  var monthSelect = document.getElementById('tuition_month_select');

  function syncMonthOptions() {
    var year = parseInt(yearInput.value, 10);
    if (year > CURRENT_YEAR) {
      yearInput.value = CURRENT_YEAR;
      year = CURRENT_YEAR;
    }
    Array.prototype.forEach.call(monthSelect.options, function (opt) {
      var isFuture = year === CURRENT_YEAR && parseInt(opt.value, 10) > CURRENT_MONTH;
      opt.disabled = isFuture;
    });
    if (monthSelect.options[monthSelect.selectedIndex] && monthSelect.options[monthSelect.selectedIndex].disabled) {
      monthSelect.value = year === CURRENT_YEAR ? CURRENT_MONTH : 12;
    }
  }

  if (yearInput && monthSelect) {
    yearInput.addEventListener('input', syncMonthOptions);
  }

  var filterForm = document.getElementById('tuition_filter_form');
  var classSelect = document.getElementById('tuition_class_select');
  var statusSelect = document.getElementById('tuition_status_select');
  var bulkForm = document.getElementById('bulk_tuitions_form');
  var bar = document.getElementById('bulk_actions_bar');
  var countEl = document.getElementById('bulk_selected_count');

  function updateBar() {
    var checked = bulkForm.querySelectorAll('.bulk_row_checkbox:checked').length;
    bar.style.display = checked > 0 ? '' : 'none';
    countEl.textContent = 'Đã chọn ' + checked + ' học phí';
  }

  function loadTable() {
    var params = new URLSearchParams(new FormData(filterForm)).toString();
    var url = window.location.pathname + (params ? '?' + params : '');

    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(function (res) { return res.text(); })
      .then(function (html) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = html;
        var newTable = wrapper.querySelector('#tuitions_table_container');
        var oldTable = document.getElementById('tuitions_table_container');
        if (newTable && oldTable) {
          oldTable.replaceWith(newTable);
        }
        window.history.replaceState(null, '', url);
        updateBar();
      });
  }

  filterForm.addEventListener('submit', function (e) {
    e.preventDefault();
    loadTable();
  });

  [monthSelect, yearInput, classSelect, statusSelect].forEach(function (el) {
    if (!el) return;
    el.addEventListener('change', function () {
      if (el === yearInput) syncMonthOptions();
      loadTable();
    });
  });

  // Delegated so it keeps working after loadTable() swaps the table markup.
  bulkForm.addEventListener('change', function (e) {
    if (e.target.id === 'bulk_select_all') {
      bulkForm.querySelectorAll('.bulk_row_checkbox').forEach(function (cb) { cb.checked = e.target.checked; });
      updateBar();
    } else if (e.target.classList.contains('bulk_row_checkbox')) {
      if (!e.target.checked) {
        var selectAll = document.getElementById('bulk_select_all');
        if (selectAll) selectAll.checked = false;
      }
      updateBar();
    }
  });
})();
</script>
@endsection
