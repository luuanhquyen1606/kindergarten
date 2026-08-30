@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
    <div class="col-auto">
      <h2 class="mb-2">Điểm danh</h2>
    </div>
  </div>

  @if($classes->isEmpty())
    <div class="alert alert-warning">Bạn chưa được phân công phụ trách lớp học nào.</div>
  @else
    <div class="card col-xl-8">
      <div class="card-body">
        <div class="border-top border-bottom border-translucent position-relative top-1">
          <div class="table-responsive scrollbar-overlay mx-n1 px-1">
            <table class="table table-sm fs-9 mb-0">
              <thead>
                <tr>
                  <th class="align-middle ps-0">Lớp học</th>
                  <th class="align-middle">Năm học</th>
                  <th class="align-middle text-end pe-3">Tác vụ</th>
                </tr>
              </thead>
              <tbody>
                @foreach($classes as $class)
                  <tr>
                    <td class="align-middle ps-0 py-3 fw-bold">{{ $class->name }}</td>
                    <td class="align-middle">{{ $class->year }}</td>
                    <td class="align-middle text-end pe-3">
                      <a href="{{ route('attendances.show', ['class_id' => $class->id]) }}" class="btn btn-primary btn-sm">Điểm danh</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>

@endsection
