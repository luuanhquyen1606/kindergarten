@extends('admin.layouts.app')
@section('content')

<div class="row gy-3 mb-6 justify-content-between align-items-center">
  <div class="col-md-8 col-auto">
    <h2 class="mb-2 text-body-emphasis">Bảng điều khiển</h2>
    <h5 class="text-body-tertiary fw-semibold">{{ $app['school']->name ?? '' }} &middot; {{ $today->format('d/m/Y') }}</h5>
  </div>
  <div class="col-md-4 col-auto text-md-end">
    <a href="/admin/attendance" class="btn btn-phoenix-secondary me-2"><span class="uil uil-calendar-alt me-1"></span>Điểm danh</a>
    <a href="/admin/tuitions" class="btn btn-phoenix-primary"><span class="uil uil-invoice me-1"></span>Học phí</a>
  </div>
</div>

{{-- Stat cards --}}
<div class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-xl-3">
    <a href="/admin/students" class="text-decoration-none">
      <div class="card h-100">
        <div class="card-body d-flex align-items-center">
          <div class="icon-item icon-item-lg rounded-3 bg-primary-subtle me-3"><span class="uil uil-users-alt text-primary-dark fs-4"></span></div>
          <div>
            <h3 class="mb-0 text-body-emphasis">{{ number_format($stats['students']) }}</h3>
            <p class="text-body-tertiary mb-0 fs-9">Học sinh</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-sm-6 col-xl-3">
    <a href="/admin/classes" class="text-decoration-none">
      <div class="card h-100">
        <div class="card-body d-flex align-items-center">
          <div class="icon-item icon-item-lg rounded-3 bg-info-subtle me-3"><span class="uil uil-books text-info-dark fs-4"></span></div>
          <div>
            <h3 class="mb-0 text-body-emphasis">{{ number_format($stats['classes']) }}</h3>
            <p class="text-body-tertiary mb-0 fs-9">Lớp học</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-sm-6 col-xl-3">
    <a href="/admin/teachers" class="text-decoration-none">
      <div class="card h-100">
        <div class="card-body d-flex align-items-center">
          <div class="icon-item icon-item-lg rounded-3 bg-success-subtle me-3"><span class="uil uil-user-check text-success-dark fs-4"></span></div>
          <div>
            <h3 class="mb-0 text-body-emphasis">{{ number_format($stats['teachers']) }}</h3>
            <p class="text-body-tertiary mb-0 fs-9">Giáo viên</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-sm-6 col-xl-3">
    <a href="/admin/attendance" class="text-decoration-none">
      <div class="card h-100">
        <div class="card-body d-flex align-items-center">
          <div class="icon-item icon-item-lg rounded-3 bg-warning-subtle me-3"><span class="uil uil-clipboard-notes text-warning-dark fs-4"></span></div>
          <div>
            <h3 class="mb-0 text-body-emphasis">{{ $attendance['total_marked'] }}/{{ $attendance['total_students'] }}</h3>
            <p class="text-body-tertiary mb-0 fs-9">Đã điểm danh hôm nay</p>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>

{{-- Tuition summary + trend --}}
<div class="row g-3 mb-4">
  <div class="col-12 col-xl-5">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <h4 class="text-body-emphasis mb-1">Học phí tháng {{ $tuition['month'] }}/{{ $tuition['year'] }}</h4>
            <p class="text-body-tertiary mb-0 fs-9">{{ $tuition['paid_count'] }}/{{ $tuition['total_students'] }} học sinh đã đóng</p>
          </div>
          <span class="badge badge-phoenix badge-phoenix-{{ $tuition['collection_rate'] >= 80 ? 'success' : ($tuition['collection_rate'] >= 50 ? 'warning' : 'danger') }} fs-9">{{ $tuition['collection_rate'] }}%</span>
        </div>
        <div class="row align-items-center g-3">
          <div class="col-6">
            <div id="tuition-donut-chart" style="min-height:180px;width:100%"></div>
          </div>
          <div class="col-6">
            <p class="mb-1 fs-9 text-body-tertiary">Đã thu</p>
            <h4 class="text-success mb-3">{{ number_format($tuition['paid_amount']) }}</h4>
            <p class="mb-1 fs-9 text-body-tertiary">Còn lại</p>
            <h4 class="text-warning mb-0">{{ number_format($tuition['unpaid_amount']) }}</h4>
          </div>
        </div>
        @if ($tuition['top_unpaid']->isNotEmpty())
        <hr>
        <p class="fw-bold fs-9 mb-2">Học sinh chưa đóng nhiều nhất</p>
        <ul class="list-unstyled mb-0">
          @foreach ($tuition['top_unpaid'] as $row)
          <li class="d-flex justify-content-between align-items-center py-1 {{ !$loop->last ? 'border-bottom border-translucent' : '' }}">
            <span class="fs-9 text-body">{{ $row->student_name }} <span class="text-body-tertiary">({{ $row->class_name ?? '-' }})</span></span>
            <span class="fw-semibold fs-9 text-warning">{{ number_format($row->total) }}</span>
          </li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="card-footer border-0 pt-0"><a class="fw-bold fs-9" href="/admin/tuitions">Xem tất cả<span class="fas fa-angle-right ms-1 fs-10"></span></a></div>
    </div>
  </div>
  <div class="col-12 col-xl-7">
    <div class="card h-100">
      <div class="card-body">
        <h4 class="text-body-emphasis mb-1">Thu học phí 6 tháng gần đây</h4>
        <p class="text-body-tertiary mb-3 fs-9">Tổng phí lập so với số đã thu</p>
        <div id="tuition-trend-chart" style="min-height:280px;width:100%"></div>
      </div>
    </div>
  </div>
</div>

{{-- Attendance today + birthdays --}}
<div class="row g-3 mb-4">
  <div class="col-12 col-xl-7">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="text-body-emphasis mb-0">Điểm danh hôm nay</h4>
          <p class="text-body-tertiary mb-0 fs-9">{{ \Carbon\Carbon::parse($attendance['date'])->format('d/m/Y') }}</p>
        </div>
        <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <tr>
                <th>Lớp</th>
                <th class="text-center">Có mặt</th>
                <th class="text-center">Vắng</th>
                <th class="text-center">Muộn</th>
                <th class="text-center">Chưa điểm danh</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($attendance['classes'] as $class)
              <tr>
                <td class="align-middle fw-semibold">{{ $class['name'] }}</td>
                <td class="text-center align-middle text-success">{{ $class['present'] }}</td>
                <td class="text-center align-middle text-danger">{{ $class['absent'] }}</td>
                <td class="text-center align-middle text-warning">{{ $class['late'] }}</td>
                <td class="text-center align-middle text-body-tertiary">{{ $class['unmarked'] }}</td>
                <td class="text-end align-middle">
                  <a href="/admin/attendance/{{ $class['id'] }}" class="btn btn-link p-0 fs-9">Điểm danh</a>
                </td>
              </tr>
              @empty
              <tr><td colspan="6" class="text-center text-body-tertiary">Chưa có lớp học nào.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-xl-5">
    <div class="card h-100">
      <div class="card-body">
        <h4 class="text-body-emphasis mb-3"><span class="uil uil-gift me-1 text-danger"></span>Sinh nhật sắp tới</h4>
        <ul class="list-unstyled mb-0">
          @forelse ($birthdays as $student)
          <li class="d-flex justify-content-between align-items-center py-2 {{ !$loop->last ? 'border-bottom border-translucent' : '' }}">
            <div>
              <p class="mb-0 fw-semibold fs-9 text-body">{{ $student->name }}</p>
              <p class="mb-0 fs-10 text-body-tertiary">{{ $student->class_name ?? '-' }} &middot; tròn {{ $student->turning }} tuổi</p>
            </div>
            <div class="text-end">
              <p class="mb-0 fs-9 fw-semibold text-body">{{ $student->next_birthday->format('d/m') }}</p>
              <p class="mb-0 fs-10 text-body-tertiary">{{ $student->days_until == 0 ? 'Hôm nay' : ($student->days_until == 1 ? 'Ngày mai' : 'Còn ' . $student->days_until . ' ngày') }}</p>
            </div>
          </li>
          @empty
          <li class="text-center text-body-tertiary py-3">Không có sinh nhật nào sắp tới.</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
</div>

{{-- Recent enrollments + classes overview --}}
<div class="row g-3 mb-3">
  <div class="col-12 col-xl-6">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="text-body-emphasis mb-0">Học sinh mới nhập học</h4>
          <a href="/admin/students" class="fw-bold fs-9">Xem tất cả</a>
        </div>
        <ul class="list-unstyled mb-0">
          @forelse ($recentStudents as $student)
          <li class="d-flex align-items-center py-2 {{ !$loop->last ? 'border-bottom border-translucent' : '' }}">
            @if ($student->thumbnail_path)
              <img class="rounded-circle me-2" src="{{ $student->thumbnail_path }}" width="32" height="32" alt="" style="object-fit:cover;">
            @else
              <div class="icon-item icon-item-sm rounded-circle bg-body-secondary me-2"><span class="fas fa-child text-body-tertiary fs-10"></span></div>
            @endif
            <div class="flex-1">
              <p class="mb-0 fw-semibold fs-9 text-body">{{ $student->name }}</p>
              <p class="mb-0 fs-10 text-body-tertiary">{{ $student->class_name ?? 'Chưa xếp lớp' }}</p>
            </div>
            <p class="mb-0 fs-10 text-body-tertiary">{{ \Carbon\Carbon::parse($student->created_at)->format('d/m/Y') }}</p>
          </li>
          @empty
          <li class="text-center text-body-tertiary py-3">Chưa có học sinh nào.</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
  <div class="col-12 col-xl-6">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="text-body-emphasis mb-0">Danh sách lớp học</h4>
          <a href="/admin/classes" class="fw-bold fs-9">Xem tất cả</a>
        </div>
        <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <tr>
                <th>Lớp</th>
                <th>Giáo viên</th>
                <th class="text-center">Sĩ số</th>
                <th class="text-end">Học phí</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($classes as $class)
              <tr>
                <td class="align-middle fw-semibold">{{ $class->name }}</td>
                <td class="align-middle text-body-tertiary">{{ $class->teacher_name ?? '-' }}</td>
                <td class="text-center align-middle">{{ $class->student_count }}</td>
                <td class="text-end align-middle">{{ number_format($class->tuition) }}</td>
              </tr>
              @empty
              <tr><td colspan="4" class="text-center text-body-tertiary">Chưa có lớp học nào.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
  if (!window.echarts) return;
  var getColor = (window.phoenix && window.phoenix.utils) ? window.phoenix.utils.getColor : function (name) {
    var fallback = {
      'success': '#00d27a', 'warning': '#f5803e', 'body-color': '#5e6e82', 'border-color': '#e7eaf3'
    };
    return fallback[name] || '#5e6e82';
  };

  var donutEl = document.getElementById('tuition-donut-chart');
  if (donutEl) {
    var donutChart = window.echarts.init(donutEl);
    donutChart.setOption({
      tooltip: { trigger: 'item' },
      legend: { show: false },
      series: [{
        type: 'pie',
        radius: ['62%', '90%'],
        avoidLabelOverlap: false,
        label: { show: false },
        labelLine: { show: false },
        data: [
          { value: {{ (float) $tuition['paid_amount'] }}, name: 'Đã thu', itemStyle: { color: getColor('success') } },
          { value: {{ (float) $tuition['unpaid_amount'] }}, name: 'Còn lại', itemStyle: { color: getColor('warning') } }
        ]
      }]
    });
    window.addEventListener('resize', function () { donutChart.resize(); });
  }

  var trendEl = document.getElementById('tuition-trend-chart');
  if (trendEl) {
    var trendData = @json($tuitionTrend);
    var trendChart = window.echarts.init(trendEl);
    trendChart.setOption({
      color: [getColor('border-color'), getColor('success')],
      tooltip: { trigger: 'axis', axisPointer: { type: 'shadow' } },
      legend: { data: ['Tổng học phí', 'Đã thu'], textStyle: { color: getColor('body-color') } },
      grid: { left: 0, right: 0, top: 40, bottom: 0, containLabel: true },
      xAxis: {
        type: 'category',
        data: trendData.map(function (d) { return d.label; }),
        axisLine: { lineStyle: { color: getColor('border-color') } },
        axisLabel: { color: getColor('body-color') }
      },
      yAxis: {
        type: 'value',
        splitLine: { lineStyle: { color: getColor('border-color'), type: 'dashed' } },
        axisLabel: { color: getColor('body-color') }
      },
      series: [
        { name: 'Tổng học phí', type: 'bar', barMaxWidth: 28, data: trendData.map(function (d) { return d.total; }) },
        { name: 'Đã thu', type: 'bar', barMaxWidth: 28, data: trendData.map(function (d) { return d.paid; }) }
      ]
    });
    window.addEventListener('resize', function () { trendChart.resize(); });
  }
});
</script>
@endsection
