@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row">
    <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
            <div class="col-auto"> 
              <h2 class="mb-2">Học sinh</h2>
            </div>
            <div class="col-auto">
              <a href="/admin/students/import" class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Import</a>
              <a href="/admin/students/create" class="btn btn-primary mb-2 mb-sm-0" type="submit">Thêm học sinh</a>
            </div>
    </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <div class="card col-xl-8" > 
        
       <div class="card-body" id="products" data-list='{"valueNames":["customer","email","father","mother","total-orders","total-spent","city","last-seen","last-order","class_filter"],"page":10,"pagination":true,"filter":{"key":"class_filter"}}'>
            <div class="mb-4">
              <div class="row g-3">
                <div class="col-auto">
                  <div class="search-box">
                    <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Tìm " aria-label="Search" />
                      <span class="fas fa-search search-box-icon"></span>
                    </form>
                  </div>
                </div>
                <div class="col-auto">
                  <select class="form-select" data-list-filter aria-label="Lọc theo lớp">
                    <option value="">Tất cả lớp</option>
                    <?php foreach ($classes as $class) { ?>
                    <option value=",<?php echo $class->id; ?>,"><?php echo $class->name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-auto d-flex align-items-center">
                  <span class="badge badge-phoenix badge-phoenix-secondary" id="student-filter-count">{{ count($students) }} học sinh</span>
                </div>

              </div>
            </div>
            <div class=" border-top border-bottom border-translucent position-relative top-1">
              <div class="table-responsive scrollbar-overlay mx-n1 px-1">
                <table class="table table-sm fs-9 mb-0">
                  <thead>
                    <tr>
                      <th class="white-space-nowrap fs-9 align-middle ps-0">
                        <div class="form-check mb-0 fs-8"><input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" data-bulk-select='{"body":"customers-table-body"}' /></div>
                      </th>
                      <th class="sort align-middle pe-5" scope="col" data-sort="student" >Học sinh</th>
                      <th class="sort align-middle pe-5" scope="col" data-sort="class">Lớp</th>
                      <th class="sort align-middle pe-5" scope="col" data-sort="father">Bố</th>
                      <th class="sort align-middle pe-5" scope="col" data-sort="mother">Mẹ</th>
                      <th class="sort align-middle pe-5" scope="col">Học phí</th>
                      <th class="sort align-middle text-end pe-3" scope="col"  style="min-width:100px">Tác vụ</th>
                      
                    </tr>
                  </thead>
                  <tbody class="list" id="customers-table-body">

                    <?php 
                    foreach ($students as $student) 
                    {
                        ?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                      <td class="fs-9 align-middle ps-0 py-3">
                        <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"email":"annac34@gmail.com","city":"Budapest","totalOrders":89,"totalSpent":23987,"lastSeen":"34 min ago","lastOrder":"Dec 12, 12:56 PM"}' /></div>
                      </td>
                      <td class="customer align-middle white-space-nowrap pe-5">
                        <a target="_blank" class="d-flex align-items-center text-body-emphasis" href="/admin/students/<?php echo $student->id; ?>">
                          <div class="avatar avatar-m"><img class="rounded-square" src="<?php echo ($student->photo_id)? getPhotoUrl($student->photo_id):"/assets/admin/trans.png"; ?>" alt="" /></div>
                          <p class="mb-0 ms-3 text-body-emphasis fw-bold"><?php echo $student->name; ?></p>
                        </a></td>
                      <td class="email align-middle white-space-nowrap pe-5">
                        @if($student->class_id)
                          <a href="/admin/classes/{{$student->class_id}}">{{$student->class_name}}</a>
                        @else
                          {{$student->class_name}}
                        @endif
                      </td>
                      <td class="father align-middle white-space-nowrap pe-5">
                        @if($student->father_id)
                          <a href="/admin/parents/{{$student->father_id}}">{{$student->father_name}}</a>
                        @else
                          {{$student->father_name}}
                        @endif
                      </td>
                      <td class="mother align-middle white-space-nowrap pe-5">
                        @if($student->mother_id)
                          <a href="/admin/parents/{{$student->mother_id}}">{{$student->mother_name}}</a>
                        @else
                          {{$student->mother_name}}
                        @endif
                      </td>
                      <td class="d-none class_filter">,{{$student->class_id}},</td>
                      <td class="align-middle pe-5">
                        <a href="/admin/students/{{$student->id}}/tuitions" class="btn btn-link text-body-quaternary p-0" title="{{ $student->has_unpaid_tuition ? 'Còn học phí chưa thanh toán' : 'Học phí' }}">
                         <span class="fas fa-money-bill-wave {{ $student->has_unpaid_tuition ? 'text-warning' : 'text-body' }}"></span>
                         @if($student->last_tuition_month)
                           <span class="ms-1">{{ sprintf('%02d', $student->last_tuition_month) }}/{{ $student->last_tuition_year }}</span>
                         @endif
                        </a>
                      </td>

                      <td class="align-middle actions  text-end pe-3">
                        <a href="/admin/students/{{$student->id}}/edit"  class="btn btn-link text-body-quaternary p-0 me-2">
                         <span class="fas fa-edit text-body"></span>
                        </a>
                        <button data-bs-toggle="offcanvas" data-bs-target="#offcanvas_<?php echo $student->id; ?>" aria-controls="offcanvas_<?php echo $student->id; ?>" class="btn btn-link text-body-quaternary p-0 text-danger"> 
                          <span class="fa-solid fa-trash text-danger"></span> 
                        </button>                 
                          <div class="offcanvas offcanvas-end" id="offcanvas_<?php echo $student->id; ?>" tabindex="-1" aria-labelledby="offcanvas_<?php echo $student->id; ?>Label">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                             {{$student->name}}
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                              Xóa bài viết này?
                              <div class="mt-3">
                                <form method="POST" action="/admin/students/<?php echo $student->id; ?>">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Hủy</button>
                                  <button type="submit" class="btn btn-danger">Xóa bài viết <?php echo $student->id; ?></button>
                                </form>
                              </div>
                            </div>
                          </div>

                        </td>
                     
                    </tr>
                    
                    <?php
                    }
                    ?>

                  </tbody>
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
                <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                  <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                </div>
              </div>
            </div>
          </div>


    </div>
                    

    <div class="col-md-4 col-xl-4 col-xxl-4 gy-5 gy-md-3">  
                <div class="">
                  Not defined yet content
                </div>   
    </div>
</div>
</div>

<script>
  (function () {
    var container = document.getElementById('products');
    var tbody = document.getElementById('customers-table-body');
    var counter = document.getElementById('student-filter-count');
    if (!container || !tbody || !counter) return;

    var filterSelect = container.querySelector('[data-list-filter]');
    var searchInput = container.querySelector('.search-input');

    // List.js removes non-visible rows from the DOM on every filter/search/pagination
    // update (it doesn't just toggle display:none), so snapshot the row data up front
    // and count against that instead of re-querying the (possibly trimmed) live DOM.
    var rows = Array.prototype.map.call(tbody.querySelectorAll('tr'), function (row) {
      var classCell = row.querySelector('.class_filter');
      var parts = [];
      ['.customer', '.email', '.father', '.mother'].forEach(function (selector) {
        var el = row.querySelector(selector);
        if (el) parts.push(el.textContent);
      });
      return {
        classText: classCell ? classCell.textContent.toLowerCase() : '',
        searchText: parts.join(' ').toLowerCase(),
      };
    });

    function updateCount() {
      var filterValue = filterSelect ? filterSelect.value.toLowerCase() : '';
      var searchValue = searchInput ? searchInput.value.trim().toLowerCase() : '';
      var count = 0;

      rows.forEach(function (row) {
        var matchesFilter = filterValue === '' || row.classText.includes(filterValue);
        var matchesSearch = searchValue === '' || row.searchText.includes(searchValue);
        if (matchesFilter && matchesSearch) count++;
      });

      counter.textContent = count + ' học sinh';
    }

    if (filterSelect) filterSelect.addEventListener('change', updateCount);
    if (searchInput) searchInput.addEventListener('input', updateCount);
    if (searchInput) searchInput.addEventListener('keyup', updateCount);
    updateCount();
  })();
</script>

@endsection