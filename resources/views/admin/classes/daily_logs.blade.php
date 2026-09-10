@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
    <div class="col-auto">
      <a href="{{ route('classes.show', $class->id) }}" class="fw-semibold fs-9"><span class="fas fa-angle-left me-1"></span>{{ $class->name }}</a>
      <h2 class="mb-2">Sức khỏe hàng ngày</h2>
    </div>
  </div>

  <div class="alert alert-danger d-none" id="daily-log-error-alert"></div>

  <div class="card">
    <div class="card-body">
      <form method="GET" action="{{ route('classes.daily_logs', $class->id) }}" class="row g-3 mb-4 align-items-end">
        <div class="col-auto">
          <label class="form-label">Ngày</label>
          <input type="date" name="date" value="{{ $date }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->format('Y-m-d') }}" class="form-control" onchange="this.form.submit()">
        </div>
      </form>

      <div id="daily-log-board" data-update-url="{{ route('classes.daily_logs.update', $class->id) }}" data-date="{{ $date }}">
        <input type="hidden" id="daily-log-csrf-token" value="{{ csrf_token() }}">

        <div class="border-top border-bottom border-translucent position-relative top-1">
          <div class="table-responsive scrollbar-overlay mx-n1 px-1">
            <table class="table table-sm fs-9 mb-0">
              <thead>
                <tr>
                  <th class="align-middle ps-0" style="width:16%">Học sinh</th>
                  <th class="align-middle" style="width:16%">Giấc ngủ trưa</th>
                  <th class="align-middle" style="width:12%">Tâm trạng</th>
                  <th class="align-middle" style="width:12%">Ăn uống</th>
                  <th class="align-middle" style="width:8%">Vệ sinh</th>
                  <th class="align-middle">Ghi chú</th>
                  <th class="align-middle text-end pe-3" style="width:6%"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($students as $student)
                  <tr>
                    <td class="align-middle ps-0 py-3">
                      <div class="d-flex align-items-center">
                        <div class="avatar avatar-m"><img class="rounded-square" src="{{ $student->thumbnail_path ?? '/assets/admin/trans.png' }}" alt=""></div>
                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">{{ $student->name }}</p>
                      </div>
                    </td>
                    <td class="align-middle">
                      <select class="form-select form-select-sm daily-log-input" data-field="nap_quality" data-student-id="{{ $student->id }}">
                        <option value="" {{ !$student->nap_quality ? 'selected' : '' }}>--</option>
                        <option value="good" {{ $student->nap_quality == 'good' ? 'selected' : '' }}>Ngủ ngon</option>
                        <option value="insufficient" {{ $student->nap_quality == 'insufficient' ? 'selected' : '' }}>Ngủ không đủ giấc</option>
                        <option value="skipped" {{ $student->nap_quality == 'skipped' ? 'selected' : '' }}>Không ngủ trưa</option>
                      </select>
                    </td>
                    <td class="align-middle">
                      <select class="form-select form-select-sm daily-log-input" data-field="mood" data-student-id="{{ $student->id }}">
                        <option value="" {{ !$student->mood ? 'selected' : '' }}>--</option>
                        <option value="vui_ve" {{ $student->mood == 'vui_ve' ? 'selected' : '' }}>Vui vẻ</option>
                        <option value="binh_thuong" {{ $student->mood == 'binh_thuong' ? 'selected' : '' }}>Bình thường</option>
                        <option value="quay_khoc" {{ $student->mood == 'quay_khoc' ? 'selected' : '' }}>Quấy khóc</option>
                        <option value="met_moi" {{ $student->mood == 'met_moi' ? 'selected' : '' }}>Mệt mỏi</option>
                        <option value="om" {{ $student->mood == 'om' ? 'selected' : '' }}>Ốm</option>
                      </select>
                    </td>
                    <td class="align-middle">
                      <select class="form-select form-select-sm daily-log-input" data-field="meal_amount" data-student-id="{{ $student->id }}">
                        <option value="" {{ !$student->meal_amount ? 'selected' : '' }}>--</option>
                        <option value="all" {{ $student->meal_amount == 'all' ? 'selected' : '' }}>Ăn hết</option>
                        <option value="most" {{ $student->meal_amount == 'most' ? 'selected' : '' }}>Ăn phần lớn</option>
                        <option value="some" {{ $student->meal_amount == 'some' ? 'selected' : '' }}>Ăn ít</option>
                        <option value="none" {{ $student->meal_amount == 'none' ? 'selected' : '' }}>Không ăn</option>
                      </select>
                    </td>
                    <td class="align-middle">
                      <input type="number" min="0" value="{{ $student->potty_count }}" class="form-control form-control-sm daily-log-input" data-field="potty_count" data-student-id="{{ $student->id }}">
                    </td>
                    <td class="align-middle">
                      <input type="text" value="{{ $student->notes }}" class="form-control form-control-sm daily-log-input" data-field="notes" data-student-id="{{ $student->id }}" placeholder="Ghi chú">
                    </td>
                    <td class="align-middle text-end pe-3">
                      <span class="daily-log-row-status fs-10 text-body-tertiary" data-student-id="{{ $student->id }}"></span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  (function () {
    var board = document.getElementById('daily-log-board');
    if (!board) return;

    var updateUrl = board.getAttribute('data-update-url');
    var dateValue = board.getAttribute('data-date');
    var csrfToken = document.getElementById('daily-log-csrf-token').value;
    var errorAlert = document.getElementById('daily-log-error-alert');

    function showError(message) {
      errorAlert.textContent = message;
      errorAlert.classList.remove('d-none');
    }

    function clearError() {
      errorAlert.classList.add('d-none');
      errorAlert.textContent = '';
    }

    function setRowState(studentId, state) {
      var el = board.querySelector('.daily-log-row-status[data-student-id="' + studentId + '"]');
      if (!el) return;
      if (state === 'saving') {
        el.textContent = 'Đang lưu...';
        el.className = 'daily-log-row-status fs-10 text-body-tertiary';
      } else if (state === 'saved') {
        el.textContent = 'Đã lưu';
        el.className = 'daily-log-row-status fs-10 text-success';
        setTimeout(function () {
          if (el.textContent === 'Đã lưu') el.textContent = '';
        }, 1500);
      } else if (state === 'error') {
        el.textContent = 'Lỗi';
        el.className = 'daily-log-row-status fs-10 text-danger';
      }
    }

    function buildUpdate(studentId) {
      var fields = ['nap_quality', 'mood', 'meal_amount', 'potty_count', 'notes'];
      var update = { student_id: studentId };
      fields.forEach(function (field) {
        var el = board.querySelector('.daily-log-input[data-field="' + field + '"][data-student-id="' + studentId + '"]');
        var value = el ? el.value : '';
        update[field] = value === '' ? null : value;
      });
      return update;
    }

    function saveRow(studentId) {
      setRowState(studentId, 'saving');
      clearError();

      fetch(updateUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ date: dateValue, updates: [buildUpdate(studentId)] }),
      }).then(function (res) {
        return res.json().then(function (data) { return { ok: res.ok, data: data }; });
      }).then(function (result) {
        if (result.ok) {
          setRowState(studentId, 'saved');
        } else {
          setRowState(studentId, 'error');
          showError((result.data && result.data.message) || 'Không thể lưu.');
        }
      }).catch(function () {
        setRowState(studentId, 'error');
        showError('Không thể kết nối máy chủ.');
      });
    }

    Array.prototype.forEach.call(board.querySelectorAll('.daily-log-input'), function (input) {
      input.addEventListener('change', function () {
        saveRow(input.getAttribute('data-student-id'));
      });
    });
  })();
</script>

@endsection
