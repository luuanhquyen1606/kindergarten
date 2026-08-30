@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
            <div class="col-auto">
              <h2 class="mb-2">Chương trình học</h2>  
              
            </div>
            <div class="col-auto">
              <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Import</button>
              <a href="/admin/programs/create" class="btn btn-primary mb-2 mb-sm-0" type="submit">Thêm chương trình học</a>
            </div>
    </div>


    <div class="card col-xl-8" > 
        
       <div class="card-body" id="products" data-list='{"valueNames":["customer","email","total-orders","total-spent","city","last-seen","last-order"],"page":10,"pagination":true}'>
            <div class="mb-4">
              <div class="row g-3">
                <div class="col-auto">
                  <div class="search-box">
                    <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Search customers" aria-label="Search" />
                      <span class="fas fa-search search-box-icon"></span>
                    </form>
                  </div>
                </div>
                <div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
                  <div class="btn-group position-static" role="group">
                    <div class="btn-group position-static text-nowrap"><button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"> Country<span class="fas fa-angle-down ms-2"></span></button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">US</a></li>
                        <li><a class="dropdown-item" href="#">Uk</a></li>
                        <li><a class="dropdown-item" href="#">Australia</a></li>
                      </ul>
                    </div>
                    <div class="btn-group position-static text-nowrap"><button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"> VIP<span class="fas fa-angle-down ms-2"></span></button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">VIP 1</a></li>
                        <li><a class="dropdown-item" href="#">VIP 2</a></li>
                        <li><a class="dropdown-item" href="#">VIP 3</a></li>
                        <li></li>
                      </ul>
                    </div><button class="btn btn-phoenix-secondary px-7 flex-shrink-0">More filters</button>
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
                      <th class="sort align-middle pe-5" scope="col" data-sort="customer" style="width:10%;">CUSTOMER</th>
                      <th class="sort align-middle pe-5" scope="col" data-sort="email" style="width:20%;">EMAIL</th>
                      <th class="sort align-middle text-end" scope="col" data-sort="total-orders" style="width:10%">ORDERS</th>
                      <th class="sort align-middle text-end ps-3" scope="col" data-sort="total-spent" style="width:10%">TOTAL SPENT</th>
                      <th class="sort align-middle ps-7" scope="col" data-sort="city" style="width:25%;">CITY</th>
                      <th class="sort align-middle text-end" scope="col" data-sort="last-seen" style="width:15%;">LAST SEEN</th>
                      <th class="sort align-middle text-end pe-0" scope="col" data-sort="last-order" style="width:10%;min-width: 150px;">LAST ORDER</th>
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
                      <td class="customer align-middle white-space-nowrap pe-5"><a class="d-flex align-items-center text-body-emphasis" href="/admin/programs/<?php echo $level->id; ?>">
                          <div class="avatar avatar-m"><img class="rounded-square" src="<?php echo $level->image? $level->image:"/assets/admin/trans.png"; ?>" alt="" /></div>
                          <p class="mb-0 ms-3 text-body-emphasis fw-bold"><?php echo $level->name; ?></p>
                        </a></td>
                      <td class="email align-middle white-space-nowrap pe-5"><a class="fw-semibold" href="mailto:annac34@gmail.com">annac34@gmail.com</a></td>
                      <td class="total-orders align-middle white-space-nowrap fw-semibold text-end text-body-highlight">89</td>
                      <td class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">$ 23987</td>
                      <td class="city align-middle white-space-nowrap text-body-highlight ps-7">Budapest</td>
                      <td class="last-seen align-middle white-space-nowrap text-body-tertiary text-end">34 min ago</td>
                      <td class="last-order align-middle white-space-nowrap text-body-tertiary text-end">Dec 12, 12:56 PM</td>
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
                <div class="border-bottom border-translucent">
                  <h5 class="pb-4 border-bottom border-translucent">Top 5 Lead Sources</h5>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent list-group-crm fw-bold text-body fs-9 py-2">
                      <div class="d-flex justify-content-between"><span class="fw-normal fs-9 mx-1"> <span class="fw-bold">1. </span>None </span><span>(65)</span></div>
                    </li>
                    <li class="list-group-item bg-transparent list-group-crm fw-bold text-body fs-9 py-2">
                      <div class="d-flex justify-content-between"><span class="fw-normal mx-1"><span class="fw-bold">2. </span>Online Store</span><span>(74)</span></div>
                    </li>
                    <li class="list-group-item bg-transparent list-group-crm fw-bold text-body fs-9 py-2">
                      <div class="d-flex justify-content-between"><span class="fw-normal fs-9 mx-1"><span class="fw-bold">3.</span> Advertisement</span><span>(32)</span></div>
                    </li>
                    <li class="list-group-item bg-transparent list-group-crm fw-bold text-body fs-9 py-2">
                      <div class="d-flex justify-content-between"><span class="fw-normal fs-9 mx-1"><span class="fw-bold">4.</span> Seminar Partner</span><span>(25)</span></div>
                    </li>
                    <li class="list-group-item bg-transparent list-group-crm fw-bold text-body fs-9 py-2">
                      <div class="d-flex justify-content-between"><span class="fw-normal fs-9 mx-1"> <span class="fw-bold">5.</span> Partner</span><span>(23)</span></div>
                    </li>
                  </ul>
                </div>   
    </div>
</div>

@endsection