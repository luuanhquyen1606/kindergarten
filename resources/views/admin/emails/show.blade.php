@extends('admin.layouts.app')
@section('content')


<div class="email-container">
          <div class="row gx-lg-6 gx-3 py-4 z-2 position-sticky bg-body email-header">
            <div class="col-auto"><a class="btn btn-primary email-sidebar-width d-none d-lg-block" href="../../apps/email/compose.html">Compose</a><button class="btn px-3 btn-phoenix-secondary text-body-tertiary d-lg-none" data-phoenix-toggle="offcanvas" data-phoenix-target="#emailSidebarColumn"><span class="fa-solid fa-bars"></span></button></div>
            <div class="col-auto d-lg-none"><a class="btn btn-primary px-3 px-sm-4" href="../../apps/email/compose.html"> <span class="d-none d-sm-inline-block">Compose</span><span class="d-sm-none fas fa-plus"></span></a></div>
            <div class="col-auto flex-1">
              <div class="search-box w-100">
                <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Search ..." aria-label="Search" />
                  <span class="fas fa-search search-box-icon"></span>
                </form>
              </div>
            </div>
          </div>
          <div class="row g-lg-6 mb-8">
            <div class="col-lg-auto">
              <div class="email-sidebar email-sidebar-width bg-body phoenix-offcanvas phoenix-offcanvas-fixed" id="emailSidebarColumn" data-breakpoint="lg">
                <div class="email-content scrollbar-overlay">
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="text-uppercase fs-10 text-body-tertiary text-opacity-85 mb-2 fw-bold">mailbox</p><button class="btn d-lg-none p-0 mb-2" data-phoenix-dismiss="offcanvas"><span class="uil uil-times fs-8"></span></button>
                  </div>
                  <ul class="nav flex-column border-top border-translucent fs-9 vertical-nav mb-4">
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="../../apps/email/inbox.html">
                        <div class="d-flex align-items-center"><span class="me-2 nav-icons uil uil-inbox"></span><span class="flex-1">Inbox</span><span class="nav-item-count">5</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none active" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="me-2 nav-icons uil uil-location-arrow"></span><span class="flex-1">Sent</span><span class="nav-item-count">23</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="me-2 nav-icons uil uil-pen"></span><span class="flex-1">Draft</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="me-2 nav-icons uil uil-exclamation-circle"></span><span class="flex-1">Spam</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="me-2 nav-icons uil uil-trash"></span><span class="flex-1">Trash</span></div>
                      </a></li>
                  </ul>
                  <div class="d-flex justify-content-between">
                    <p class="text-uppercase fs-10 text-body-tertiary text-opacity-85 mb-2 fw-bold">Filtered</p><a class="fs-10 fw-bold" href="#!"><span class="fa-solid fa-plus me-2"></span>Add Folder</a>
                  </div>
                  <ul class="nav flex-column border-top border-translucent fs-9 vertical-nav mb-4">
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucenttext-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="me-2 nav-icons uil uil-star"></span><span class="flex-1">Starred</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucenttext-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="me-2 nav-icons uil uil-archive"></span><span class="flex-1">Archive</span></div>
                      </a></li>
                  </ul>
                  <div class="d-flex justify-content-between">
                    <p class="text-uppercase fs-10 text-body-tertiary text-opacity-85 mb-2 fw-bold">Labels</p><a class="fs-10 fw-bold" href="#!"><span class="fa-solid fa-plus me-2"></span>Add Label</a>
                  </div>
                  <ul class="nav flex-column border-top border-translucent fs-9 vertical-nav">
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="ms-n1 me-1 fa-solid fa-circle text-primary" data-fa-transform="shrink-10"></span><span class="flex-1">Personal</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="ms-n1 me-1 fa-solid fa-circle text-primary-dark" data-fa-transform="shrink-10"></span><span class="flex-1">Work</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="ms-n1 me-1 fa-solid fa-circle text-success" data-fa-transform="shrink-10"></span><span class="flex-1">Payments</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="ms-n1 me-1 fa-solid fa-circle text-warning" data-fa-transform="shrink-10"></span><span class="flex-1">Invoices</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="ms-n1 me-1 fa-solid fa-circle text-danger" data-fa-transform="shrink-10"></span><span class="flex-1">Accounts</span></div>
                      </a></li>
                    <li class="nav-item"><a class="nav-link py-2 ps-0 pe-3 border-end border-bottom border-translucent text-start outline-none" aria-current="page" href="#!">
                        <div class="d-flex align-items-center"><span class="ms-n1 me-1 fa-solid fa-circle text-info" data-fa-transform="shrink-10"></span><span class="flex-1">Forums</span></div>
                      </a></li>
                  </ul>
                </div>
              </div>
              <div class="phoenix-offcanvas-backdrop d-lg-none top-0" data-phoenix-backdrop="data-phoenix-backdrop"></div>
            </div>
            
            <div class="col">
              <div class="card email-content">
                <div class="card-body overflow-hidden">
                  <div class="d-flex flex-between-center pb-3 border-bottom border-translucent mb-4"><a class="btn btn-link p-0 text-body-secondary me-3" href="../../apps/email/inbox.html"><span class="fa-solid fa-angle-left fw-bolder fs-8"></span></a>
                    <h3 class="flex-1 mb-0 lh-sm line-clamp-1">{{ $email->title }}</h3>
                    <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                    </div>
                  </div>
                  <div class="overflow-x-hidden scrollbar email-detail-content">
                    <div class="row align-items-center gy-3 gx-0 mb-10">
                      <div class="col-12 col-sm-auto d-flex order-sm-1"><button class="btn p-0 me-4 me-lg-3 me-xl-4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reply"><span class="fa-solid fa-reply text-body-quaternary"></span></button><button class="btn p-0 me-4 me-lg-3 me-xl-4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove"><span class="fa-solid fa-trash-can text-body-quaternary"></span></button><button class="btn p-0 me-4 me-lg-3 me-xl-4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Archive"><span class="fa-solid fa-archive text-body-quaternary"></span></button><button class="btn p-0 me-4 me-lg-3 me-xl-4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Print"><span class="fa-solid fa-print text-body-quaternary"></span></button><button class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Star"><span class="fa-regular fa-star text-body-quaternary"></span></button></div>
                      <div class="col-auto"><img class="me-2 rounded-circle" src="/assets/admin/img/team/60.webp" alt="..." width="48" height="48" /></div>
                      <div class="col-auto flex-1">
                        <div class="d-flex mb-1">
                          <h5 class="mb-0 text-body-highlight me-2">{{ $email->from }}</h5>
                          <p class="mb-0 lh-sm text-body-tertiary fs-9 d-none d-md-block text-nowrap">&#60; {{ $email->from }} &#62;</p>
                        </div>
                        <p class="mb-0 fs-9"><span class="text-body-tertiary">to</span><span class="fw-bold text-body-secondary"> Me </span><span class="text-body-highlight fw-semibold fs-10">28 Aug, 2021 </span><span class="fw-semibold text-body fs-10 me-1"> 6:32 PM</span><span class="fa-regular fa-star text-body-quaternary"></span></p>
                      </div>
                    </div>
                    <div class="text-body-highlight fs-9 w-100 w-md-75 mb-8">
                      {{ $email->content }}
                    </div>
                    <div class="d-flex align-items-center mb-5"><button class="btn btn-link text-body-highlight fs-8 text-decoration-none p-0" type="button"><span class="fa-solid fa-paperclip me-2"></span>2 Attachments</button></div>
                    <div class="row pb-11 border-bottom mb-4 gx-0 gy-2 border-translucent">
                      <div class="col-auto me-3"><a class="text-decoration-none d-flex align-items-center" href="#!">
                          <div class="btn-icon btn-icon-xl border rounded-3 text-body-quaternary text-opacity-75 flex-column me-2"><span class="fa-solid fa-file fs-8 mb-1"></span>
                            <p class="mb-0 fs-10 fw-bold">PDF</p>
                          </div>
                          <div>
                            <h6 class="text-body-highlight">workflow-data.pdf</h6>
                            <p class="fs-9 mb-0 text-body-tertiary lh-1">53.34 KB</p>
                          </div>
                        </a></div>
                      <div class="col-auto"><a class="text-decoration-none d-flex align-items-center" href="#!"><img class="rounded" src="/assets/admin/img/generic/41.png" alt="..." />
                          <div class="ms-2">
                            <h6 class="text-body-highlight">forest.jpg</h6>
                            <p class="fs-9 mb-0 text-body-tertiary">53.34 KB</p>
                          </div>
                        </a></div>
                    </div>
                    <div class="d-flex justify-content-between"><button class="btn btn-phoenix-secondary me-1 text-nowrap px-2 px-sm-4">Reply<span class="fa-solid fa-reply ms-2 fs-10"></span></button><button class="btn btn-phoenix-secondary me-1 text-nowrap px-2 px-sm-4">Reply All<span class="fa-solid fa-reply-all ms-2 fs-10"></span></button><button class="btn btn-phoenix-secondary ms-auto text-nowrap px-2 px-sm-4">Forward<span class="fa-solid fa-share ms-2 fs-10"></span></button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection