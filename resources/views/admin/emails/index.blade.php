@extends('admin.layouts.app')
@section('content')

<div class="email-container" style="padding-top:0px !important">
          <div class="row gx-lg-6 gx-3 py-4 z-2 position-sticky bg-body email-header">
            <div class="col-auto"><a class="btn btn-primary email-sidebar-width d-none d-lg-block" href="/admin/emails/create">Compose</a><button class="btn px-3 btn-phoenix-secondary text-body-tertiary d-lg-none" data-phoenix-toggle="offcanvas" data-phoenix-target="#emailSidebarColumn"><span class="fa-solid fa-bars"></span></button></div>
            <div class="col-auto d-lg-none"><a class="btn btn-primary px-3 px-sm-4" href="/admin/emails/create"> <span class="d-none d-sm-inline-block">Compose</span><span class="d-sm-none fas fa-plus"></span></a></div>
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
            <div class="col-lg">
              <div class="px-lg-1">
                <div class="d-flex align-items-center flex-wrap position-sticky pb-2 bg-body z-2 email-toolbar inbox-toolbar">
                  <div class="d-flex align-items-center flex-1 me-2"><button class="btn btn-sm p-0 me-2" type="button" onclick="location.reload()"><span class="text-primary fas fa-redo fs-10"></span></button>
                    <p class="fw-semibold fs-10 text-body-tertiary text-opacity-85 mb-0 lh-sm text-nowrap">Last refreshed 1m ago</p>
                  </div>
                  <div class="d-flex">
                    <p class="text-body-tertiary text-opacity-85 fs-9 fw-semibold mb-0 me-3">Showing : <span class="text-body">1-7 </span>of <span class="text-body">205</span></p><button class="btn p-0 me-3" type="button"><span class="text-body-quaternary fa-solid fa-angle-left fs-10"></span></button><button class="btn p-0" type="button"><span class="text-primary fa-solid fa-angle-right fs-10"></span></button>
                  </div>
                </div>
                <div class="border-top border-translucent py-2 d-flex justify-content-between">
                  <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row="data-bulk-select-row" /></div>
                  <div><button class="btn p-0 me-2 text-body-quaternary hover text-body-tertiary text-opacity-85" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Archive"><span class="fas fa-archive fs-10"></span></button><button class="btn p-0 me-2 text-body-quaternary hover text-body-tertiary text-opacity-85" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><span class="fas fa-trash fs-10"></span></button><button class="btn p-0 me-2 text-body-quaternary hover text-body-tertiary text-opacity-85" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Star"><span class="fas fa-star fs-10"></span></button><button class="btn p-0 text-body-quaternary hover text-body-tertiary text-opacity-85" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tags"><span class="fas fa-tag fs-10"></span></button></div>
                </div>
                
                <?php
                foreach ($emails as $email)
                {
                ?>
                <div class="border-top border-translucent hover-actions-trigger py-3">
                  <div class="row align-items-sm-center gx-2">
                    <div class="col-auto">
                      <div class="d-flex flex-column flex-sm-row"><input class="form-check-input mb-2 m-sm-0 me-sm-2" type="checkbox" id="checkbox-2" data-bulk-select-row="data-bulk-select-row" /><button class="btn p-0"><span class="far text-body-quaternary fa-star"></span></button></div>
                    </div>
                    <div class="col-auto">
                      <div class="avatar avatar-s  rounded-circle">
                        <img class="rounded-circle " src="/assets/admin/img/team/58.webp" alt="" />
                      </div>
                    </div>
                    <div class="col-auto"><a class="text-body-emphasis fw-bold inbox-link fs-9" href="/admin/emails/<?php echo $email->id;?>"><?php echo $email->from;?></a></div>
                    <div class="col-auto ms-auto">
                      <div class="hover-actions end-0"><button class="btn btn-phoenix-secondary btn-icon dropdown-toggle dropdown-caret-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-ellipsis"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark Unread</a><a class="dropdown-item" href="#!">Mark Important</a><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Print</a><a class="dropdown-item" href="#!">Report Spam</a><a class="dropdown-item" href="#!">Report Phishing</a><a class="dropdown-item" href="#!">Mute Jessica Ball</a><a class="dropdown-item" href="#!">Block Jessica Ball</a><a class="dropdown-item text-danger" href="#!">Delete</a></div>
                      </div><span class="fs-10 fw-bold">3 M</span>
                    </div>
                  </div>
                  <div class="ms-4 mt-n3 mt-sm-0 ms-sm-11"><a class="d-block inbox-link" href="/admin/emails/<?php echo $email->id;?>">
                    <span class="fs-9 line-clamp-1 text-body-emphasis"><?php echo $email->title;?></span>
                      <p class="fs-9 ps-0 text-body-tertiary mb-0 line-clamp-2"><?php echo $email->content;?></p>
                    </a><a class="d-inline-flex align-items-center border border-translucent rounded-pill px-3 py-1 me-2 mt-2 inbox-link" href="#!"><span class="fas fa-file-pdf text-warning fs-9"></span><span class="ms-2 fw-bold fs-10 text-body">Financial_Reports.pdf</span></a><a class="d-inline-flex align-items-center border border-translucent rounded-pill px-3 py-1 me-2 mt-2 inbox-link" href="#!"><span class="fas fa-file-zipper text-warning fs-9"></span><span class="ms-2 fw-bold fs-10 text-body">Frame20.zip</span></a></div>
                </div>
                <?php
                }
                ?>


              </div>
            </div>
          </div>
        </div>

@endsection