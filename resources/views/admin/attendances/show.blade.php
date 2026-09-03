@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
    <div class="col-auto">
      <a href="{{ route('attendances.index') }}" class="fw-semibold fs-9"><span class="fas fa-angle-left me-1"></span>Điểm danh</a>
      <h2 class="mb-2"><a href="{{ route('classes.show', $class->id) }}" class="text-body-emphasis">{{ $class->name }}</a></h2>
    </div>
  </div>

  <div class="alert alert-danger d-none" id="attendance-error-alert"></div>

  <div class="card col-xl-8">
    <div class="card-body">
      <form method="GET" action="{{ route('attendances.show', ['class_id' => $class->id]) }}" class="row g-3 mb-4 align-items-end">
        <div class="col-auto">
          <label class="form-label">Ngày</label>
          <input type="date" name="date" value="{{ $date }}" max="{{ now()->format('Y-m-d') }}" class="form-control" onchange="this.form.submit()">
        </div>
      </form>

      <div id="attendance-board" data-update-url="{{ route('attendances.update', ['class_id' => $class->id]) }}" data-date="{{ $date }}">
        <input type="hidden" id="attendance-csrf-token" value="{{ csrf_token() }}">

        <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
          <span class="fs-9 fw-semibold text-body-secondary me-2" id="bulk-selected-count">0 học sinh được chọn</span>
          <button type="button" class="btn btn-sm btn-phoenix-success" data-bulk-status="present">Có mặt</button>
          <button type="button" class="btn btn-sm btn-phoenix-danger" data-bulk-status="absent">Vắng</button>
          <button type="button" class="btn btn-sm btn-phoenix-warning" data-bulk-status="late">Đi muộn</button>
          <button type="button" class="btn btn-sm btn-phoenix-info" data-bulk-status="excused">Vắng có phép</button>
        </div>
        <div class="d-none align-items-center gap-2 mb-3" id="bulk-note-wrapper">
          <input type="text" id="bulk-note-input" class="form-control form-control-sm" style="max-width:320px" placeholder="Ghi chú áp dụng cho các học sinh đã chọn">
          <button type="button" class="btn btn-sm btn-phoenix-secondary" id="bulk-note-apply">Áp dụng ghi chú</button>
        </div>

        <div class="border-top border-bottom border-translucent position-relative top-1">
          <div class="table-responsive scrollbar-overlay mx-n1 px-1">
            <table class="table table-sm fs-9 mb-0">
              <thead>
                <tr>
                  <th class="align-middle ps-0" style="width:1%">
                    <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" id="attendance-select-all"></div>
                  </th>
                  <th class="align-middle" style="width:35%">Học sinh</th>
                  <th class="align-middle" style="width:22%">Trạng thái</th>
                  <th class="align-middle">Ghi chú</th>
                  <th class="align-middle text-end pe-3" style="width:8%"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($students as $student)
                  <?php $current = $student->status ?? 'unmarked'; ?>
                  <tr>
                    <td class="align-middle ps-0 py-3">
                      <div class="form-check mb-0 fs-8">
                        <input class="form-check-input attendance-row-select" type="checkbox" data-student-id="{{ $student->id }}">
                      </div>
                    </td>
                    <td class="align-middle py-3">
                      <div class="d-flex align-items-center">
                        <div class="avatar avatar-m"><img class="rounded-square" src="{{ $student->thumbnail_path ?? '/assets/admin/trans.png' }}" alt=""></div>
                        <p class="mb-0 ms-3 text-body-emphasis fw-bold">{{ $student->name }}</p>
                      </div>
                    </td>
                    <td class="align-middle">
                      <select class="form-select form-select-sm attendance-status-input" data-student-id="{{ $student->id }}">
                        <option value="unmarked" {{ $current == 'unmarked' ? 'selected' : '' }}>Chưa điểm danh</option>
                        <option value="present" {{ $current == 'present' ? 'selected' : '' }}>Có mặt</option>
                        <option value="absent" {{ $current == 'absent' ? 'selected' : '' }}>Vắng</option>
                        <option value="late" {{ $current == 'late' ? 'selected' : '' }}>Đi muộn</option>
                        <option value="excused" {{ $current == 'excused' ? 'selected' : '' }}>Vắng có phép</option>
                      </select>
                    </td>
                    <td class="align-middle">
                      <input type="text" value="{{ $student->note }}" class="form-control form-control-sm attendance-note-input" data-student-id="{{ $student->id }}" placeholder="Ghi chú">
                    </td>
                    <td class="align-middle text-end pe-3">
                      <span class="attendance-row-status fs-10 text-body-tertiary" data-student-id="{{ $student->id }}"></span>
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
    var board = document.getElementById('attendance-board');
    if (!board) return;

    var updateUrl = board.getAttribute('data-update-url');
    var dateValue = board.getAttribute('data-date');
    var csrfToken = document.getElementById('attendance-csrf-token').value;
    var errorAlert = document.getElementById('attendance-error-alert');

    var selectAll = document.getElementById('attendance-select-all');
    var rowChecks = Array.prototype.slice.call(board.querySelectorAll('.attendance-row-select'));
    var countEl = document.getElementById('bulk-selected-count');
    var noteWrapper = document.getElementById('bulk-note-wrapper');
    var noteInput = document.getElementById('bulk-note-input');
    var applyNoteBtn = document.getElementById('bulk-note-apply');

    function selectedIds() {
      return rowChecks.filter(function (c) { return c.checked; })
        .map(function (c) { return c.getAttribute('data-student-id'); });
    }

    function updateCount() {
      countEl.textContent = selectedIds().length + ' học sinh được chọn';
    }

    function showError(message) {
      errorAlert.textContent = message;
      errorAlert.classList.remove('d-none');
    }

    function clearError() {
      errorAlert.classList.add('d-none');
      errorAlert.textContent = '';
    }

    function statusSelect(studentId) {
      return board.querySelector('.attendance-status-input[data-student-id="' + studentId + '"]');
    }

    function noteInputFor(studentId) {
      return board.querySelector('.attendance-note-input[data-student-id="' + studentId + '"]');
    }

    function setRowState(studentId, state) {
      var el = board.querySelector('.attendance-row-status[data-student-id="' + studentId + '"]');
      if (!el) return;
      if (state === 'saving') {
        el.textContent = 'Đang lưu...';
        el.className = 'attendance-row-status fs-10 text-body-tertiary';
      } else if (state === 'saved') {
        el.textContent = 'Đã lưu';
        el.className = 'attendance-row-status fs-10 text-success';
        setTimeout(function () {
          if (el.textContent === 'Đã lưu') el.textContent = '';
        }, 1500);
      } else if (state === 'error') {
        el.textContent = 'Lỗi';
        el.className = 'attendance-row-status fs-10 text-danger';
      }
    }

    function buildUpdates(studentIds, overrides) {
      return studentIds.map(function (studentId) {
        var select = statusSelect(studentId);
        var noteEl = noteInputFor(studentId);
        var status = (overrides && overrides.status) ? overrides.status : (select ? select.value : 'unmarked');
        var note = (overrides && typeof overrides.note === 'string') ? overrides.note : (noteEl ? noteEl.value : '');
        return { student_id: studentId, status: status, note: note };
      });
    }

    function sendUpdates(studentIds, updates) {
      studentIds.forEach(function (id) { setRowState(id, 'saving'); });
      clearError();

      return fetch(updateUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ date: dateValue, updates: updates }),
      }).then(function (res) {
        return res.json().then(function (data) { return { ok: res.ok, data: data }; });
      }).then(function (result) {
        if (result.ok) {
          studentIds.forEach(function (id) { setRowState(id, 'saved'); });
        } else {
          studentIds.forEach(function (id) { setRowState(id, 'error'); });
          showError((result.data && result.data.message) || 'Không thể lưu điểm danh.');
        }
        return result;
      }).catch(function () {
        studentIds.forEach(function (id) { setRowState(id, 'error'); });
        showError('Không thể kết nối máy chủ.');
      });
    }

    function saveRow(studentId) {
      sendUpdates([studentId], buildUpdates([studentId]));
    }

    // Individual field triggers
    Array.prototype.forEach.call(board.querySelectorAll('.attendance-status-input'), function (select) {
      select.addEventListener('change', function () {
        saveRow(select.getAttribute('data-student-id'));
      });
    });

    Array.prototype.forEach.call(board.querySelectorAll('.attendance-note-input'), function (input) {
      input.addEventListener('change', function () {
        saveRow(input.getAttribute('data-student-id'));
      });
    });

    // Select-all / row checkboxes
    if (selectAll) {
      selectAll.addEventListener('change', function () {
        rowChecks.forEach(function (c) { c.checked = selectAll.checked; });
        updateCount();
      });
    }
    rowChecks.forEach(function (c) {
      c.addEventListener('change', function () {
        if (!c.checked && selectAll) selectAll.checked = false;
        updateCount();
      });
    });

    // Bulk status buttons: save the status right away, and reveal the note field
    // (for every status, including Present) so a note can be added as a follow-up.
    Array.prototype.forEach.call(document.querySelectorAll('[data-bulk-status]'), function (btn) {
      btn.addEventListener('click', function () {
        var status = btn.getAttribute('data-bulk-status');
        var ids = selectedIds();
        if (!ids.length) return;

        ids.forEach(function (studentId) {
          var select = statusSelect(studentId);
          if (select) select.value = status;
        });

        noteWrapper.classList.remove('d-none');
        noteWrapper.classList.add('d-flex');
        noteInput.focus();

        sendUpdates(ids, buildUpdates(ids, { status: status }));
      });
    });

    // Bulk note apply: pushes the typed note to every selected row, keeping each row's status.
    if (applyNoteBtn) {
      applyNoteBtn.addEventListener('click', function () {
        var ids = selectedIds();
        if (!ids.length) return;
        var text = noteInput.value;

        ids.forEach(function (studentId) {
          var noteEl = noteInputFor(studentId);
          if (noteEl) noteEl.value = text;
        });

        sendUpdates(ids, buildUpdates(ids, { note: text }));
      });
    }

    updateCount();
  })();
</script>

@endsection
