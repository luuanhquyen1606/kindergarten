@extends('admin.layouts.app')
@section('content')
<div class="pb-9">
<div class="row">
    <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
            <div class="col-auto">
              <h2 class="mb-2">Chương trình học</h2>
           </div>
            <div class="col-auto">
              <a href="/admin/programs/create" class="btn btn-primary mb-2 mb-sm-0" type="submit">Thêm chương trình</a>
            </div>
    </div>


    <div class="card col-xl-8" > 
        
       <div class="card-body" id="products" data-list='{"valueNames":["customer","email","total-orders","total-spent","city","last-seen","last-order"],"page":10,"pagination":true}'>
            <div class="mb-4">
              <div class="row g-3">
                <div class="col-auto">
                  <div class="search-box">
                    <form class="position-relative">
                      <input class="form-control search-input search" type="search" placeholder="Tìm" aria-label="Search" />
                      <span class="fas fa-search search-box-icon"></span>
                    </form>
                  </div>
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
                      <th class="sort align-middle pe-5" scope="col" data-sort="customer" style="width:70%;">Tiêu đề</th>
                      <th class="sort align-middle pe-5" scope="col" data-sort="email" style="width:20%;">Danh mục</th>           
                      <th class="sort align-middle text-end pe-3" scope="col"  style="min-width:100px">tác vụ</th>
                      
                    </tr>
                  </thead>
                  <tbody class="list" id="customers-table-body">

                    <?php 
                    foreach ($programs as $level) 
                    {
                        ?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                      <td class="fs-9 align-middle ps-0 py-3">
                        <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"email":"annac34@gmail.com","city":"Budapest","totalOrders":89,"totalSpent":23987,"lastSeen":"34 min ago","lastOrder":"Dec 12, 12:56 PM"}' /></div>
                      </td>
                      <td class="customer align-middle white-space-nowrap pe-5">
                        <a target="_blank" class="d-flex align-items-center text-body-emphasis" href="/tin-tuc-<?php echo $level->slug; ?>">
                          <div class="avatar avatar-m"><img class="rounded-square" src="/get_photo/<?php echo $level->photo_id;?>/500" alt="" /></div>
                          <p class="mb-0 ms-3 text-body-emphasis fw-bold"><?php echo $level->name; ?></p>
                        </a></td>
                      <td class="email align-middle white-space-nowrap pe-5"><a class="fw-semibold" href="mailto:annac34@gmail.com">annac34@gmail.com</a></td>
                      
                      <td class="align-middle actions  text-end pe-3">
                        <a href="/admin/programs/{{$level->id}}/edit"  class="btn btn-link text-body-quaternary p-0 me-2">
                         <span class="fas fa-edit text-body"></span>
                        </a>
                        <button data-bs-toggle="offcanvas" data-bs-target="#offcanvas_<?php echo $level->id; ?>" aria-controls="offcanvas_<?php echo $level->id; ?>" class="btn btn-link text-body-quaternary p-0 text-danger"> 
                          <span class="fa-solid fa-trash text-danger"></span> 
                        </button>                 
                          <div class="offcanvas offcanvas-end" id="offcanvas_<?php echo $level->id; ?>" tabindex="-1" aria-labelledby="offcanvas_<?php echo $level->id; ?>Label">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                             {{$level->name}}
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                              Xóa bài viết này?
                              <div class="mt-3">
                                <form method="POST" action="/admin/programs/<?php echo $level->id; ?>">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Hủy</button>
                                  <button type="submit" class="btn btn-danger">Xóa bài viết</button>
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
@endsection