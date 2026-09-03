@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
          <div class="card mb-5">
            <div class="card-header d-flex justify-content-center align-items-end position-relative mb-7 mb-xxl-0" style="min-height: 214px; ">
              <div class="hover-actions-trigger position-static">
                <div class="bg-holder rounded-top" style="background-image:url(/assets/admin/img/generic/cover-photo.png);"></div><input class="d-none" id="upload-cover-image" type="file"><label class="cover-image-file-input" for="upload-cover-image"></label>
                <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white"><span class="fa-solid fa-camera me-2 overlay-icon"></span></div>
                <!--/.bg-holder-->
              </div><input class="d-none" id="upload-porfile-picture" type="file">
              <div class="hoverbox feed-profile" style="width: 150px; height: 150px">
                <div class="hoverbox-content rounded-circle d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-3 text-secondary-light"></span></div>
                <div class="position-relative bg-body-quaternary rounded-circle cursor-pointer d-flex flex-center mb-xxl-7">
                  <div class="avatar avatar-5xl"><img class="rounded-circle rounded-circle img-thumbnail shadow-sm border-0" src="/assets/admin/img/team/9.webp" alt=""></div><label class="w-100 h-100 position-absolute z-1" for="upload-porfile-picture"></label>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row justify-content-xl-between">
                <div class="col-auto">
                  <div class="d-flex flex-wrap mb-3 align-items-center">
                    <h2 class="me-2">Erza Bridgest</h2><span class="fw-semibold fs-7 text-body-emphasis">u/hansolo</span>
                  </div>
                  <div class="mb-5">
                    <div class="d-md-flex align-items-center">
                      <div class="d-flex align-items-center"><span class="fa-solid fa-user-group fs-9 text-body-tertiary me-2 me-lg-1 me-xl-2"></span><a class="text-body-emphasis" href="#!"><span class="fs-7 fw-bold text-body-tertiary text-opacity-85 text-body-emphasis-hover">1297 <span class="fw-semibold ms-1 me-4">Followers</span></span></a></div>
                      <div class="d-flex align-items-center"><span class="fa-solid fa-user-check fs-9 text-body-tertiary me-2 me-lg-1 me-xl-2"></span><a class="text-body-emphasis" href="#!"><span class="fs-7 fw-bold text-body-tertiary text-opacity-85 text-body-emphasis-hover">3971 <span class="fw-semibold ms-1 me-4">Following</span></span></a></div>
                      <div class="d-flex align-items-center"><span class="fa-solid fa-location-dot fs-9 text-body-tertiary me-2 me-lg-1 me-xl-2"></span><a class="text-body-emphasis" href="#!"><span class="fs-7 fw-semibold text-body-tertiary text-opacity-85 text-body-emphasis-hover">Vancouver, Lothal</span></a></div>
                    </div>
                  </div>
                  <p class="fs-6 text-body-secondary">“Whenever you find yourself on the side of the majority, it is time to pause and reflect.”</p>
                </div>
                <div class="col-auto">
                  <div class="row g-2">
                    @if(!$attendance_taken_today)
                    <div class="col-auto order-xxl-2"><a class="btn btn-primary lh-1" href="{{ route('attendances.show', $class->id) }}"><span class="fa-solid fa-user-plus me-2"></span>Điểm danh</a></div>
                    @endif
                    <div class="col-auto order-xxl-1"><button class="btn btn-phoenix-primary lh-1"><span class="fa-solid fa-message me-2"></span>Send Message</button></div>
                    <div class="col-auto">
                      <div class="position-static"><button class="btn btn-phoenix-secondary lh-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-chevron-down me-2"></span> More</button>
                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-user-group text-body-secondary me-2"></span><span>Followers</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-users text-body-secondary me-2"></span><span>Communities</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-photo-film text-body-secondary me-2"></span><span>Media Files</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-calendar-days fs-8 text-body-secondary me-2"></span><span> Events</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-dice text-body-secondary me-2"></span><span>Games</span></a><a class="dropdown-item d-xl-none" href="#!"><span class="fa-solid fa-user-gear text-body-secondary me-2"></span><span>Settings</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-bell-slash text-body-secondary me-2"></span><span>Mute Conversation</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-gear text-body-secondary me-2"></span><span>Manage Settings</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-hand-holding-heart text-body-secondary me-2"></span><span>Get help</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-flag text-body-secondary me-2"></span><span>Report Account</span></a><a class="dropdown-item" href="#!"><span class="fa-solid fa-ban text-body-secondary me-2"></span><span>Block Account</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row gy-3 gx-5 gx-xxl-6">
            <div class="col-xl-4 d-none d-xl-block">
              <div class="mb-8">
                <div class="row g-0">
                  <div class="col-6 border-1 border-bottom border-translucent border-end py-2"> <a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-user-group me-2 mb-2 mb-xxl-0"></span>Followers</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-users me-2 mb-2 mb-xxl-0"></span>Communities</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent border-end py-2"><a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-photo-film me-2 mb-2 mb-xxl-0"></span>Media Files</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-calendar-days me-2 mb-2 mb-xxl-0"></span>Events</a></div>
                  <div class="col-6 border-1 border-end border-translucent py-2"><a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-dice me-2 mb-2 mb-xxl-0"></span>Games</a></div>
                  <div class="col-6 border-1 py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="#!"><span class="fa-solid fa-user-gear me-2 mb-2 mb-xxl-0"></span>Settings </a></div>
                </div>
              </div>
              <div class="mb-8">
                <div class="d-flex pb-4 align-items-end">
                  <h3 class="flex-1 mb-0">Photos</h3><a class="fw-bold fs-9 me-4" href="#!">Albums</a><a class="fw-bold fs-9" href="#!">See all</a>
                </div>
                <div class="row g-3">
                  <div class="col-4"><a href="/assets/admin/img/gallery/11.png" data-gallery="gallery-photos"><img class="w-100 rounded-3" src="/assets/admin/img/gallery/11.png" alt=""></a></div>
                  <div class="col-4"><a href="/assets/admin/img/gallery/12.png" data-gallery="gallery-photos"><img class="w-100 rounded-3" src="/assets/admin/img/gallery/12.png" alt=""></a></div>
                  <div class="col-4"><a href="/assets/admin/img/gallery/13.png" data-gallery="gallery-photos"><img class="w-100 rounded-3" src="/assets/admin/img/gallery/13.png" alt=""></a></div>
                  <div class="col-4"><a href="/assets/admin/img/gallery/14.png" data-gallery="gallery-photos"><img class="w-100 rounded-3" src="/assets/admin/img/gallery/14.png" alt=""></a></div>
                  <div class="col-4"><a href="/assets/admin/img/gallery/15.png" data-gallery="gallery-photos"><img class="w-100 rounded-3" src="/assets/admin/img/gallery/15.png" alt=""></a></div>
                  <div class="col-4"><a href="/assets/admin/img/gallery/16.png" data-gallery="gallery-photos"><img class="w-100 rounded-3" src="/assets/admin/img/gallery/16.png" alt=""></a></div>
                </div>
              </div>
              <div class="d-flex pb-4 align-items-end border-bottom border-translucent border-dashed">
                <h3 class="flex-1 mb-0">Điểm danh</h3><a class="fw-bold fs-9" href="{{ route('attendances.show', ['class_id' => $class->id, 'date' => $today]) }}">Chi tiết</a>
              </div>
              <div class="row g-0 mb-5 mb-lg-0">
                @if($present_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-user-group me-2 mb-2 mb-xxl-0"></span>{{ $present_count }} Đến lớp</a></div>
                @endif
                @if($absent_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-user-xmark me-2 mb-2 mb-xxl-0"></span>{{ $absent_count }} Vắng</a></div>
                @endif
                @if($late_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-clock me-2 mb-2 mb-xxl-0"></span>{{ $late_count }} Đi muộn</a></div>
                @endif
                @if($excused_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-file-circle-check me-2 mb-2 mb-xxl-0"></span>{{ $excused_count }} Có phép</a></div>
                @endif
                @if($unmarked_count > 0)
                <div class="col-12 py-2"><a class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" href="#!"><span class="fa-solid fa-circle-question me-2 mb-2 mb-xxl-0"></span>{{ $unmarked_count }} Chưa điểm danh</a></div>
                @endif
              </div>
            </div>
            <div class="col-12 col-xl-8">
              <div class="mb-9">
                <div class="mb-5">
                  <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                      <div class="border-bottom border-translucent mb-3">
                        <div class="d-flex align-items-center mb-3"><a href="../../apps/social/profile.html">
                            <div class="avatar avatar-xl  me-2">
                              <img class="rounded-circle " src="/assets/admin/img//team/9.webp" alt="">
                            </div>
                          </a>
                          <div class="flex-1"><a class="fw-bold mb-0 text-body-emphasis" href="../../apps/social/profile.html">Erza Bridgest</a>
                            <p class="fs-10 mb-0 text-body-tertiary text-opacity-85 fw-semibold">35 mins ago<span class="fa-solid fa-circle text-body-quaternary text-opacity-50" data-fa-transform="shrink-10 down-2"></span>Mustafar, British Columbia<span class="fa-solid fa-circle text-body-quaternary text-opacity-50" data-fa-transform="shrink-10 down-2"></span><span class="fa-solid fa-earth-americas text-body"></span></p>
                          </div>
                          <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                          </div>
                        </div>
                        <p class="text-body-secondary">Melancholy is sadness that has taken on lightness.</p>
                        <div class="row g-1 mb-5">
                          <div class="col-3"><a href="/assets/admin/img/gallery/22.png" data-gallery="gallery-posts-0"><img class="rounded h-100 w-100" src="/assets/admin/img/gallery/22.png" alt="..."></a></div>
                          <div class="col-3"><a href="/assets/admin/img/gallery/23.png" data-gallery="gallery-posts-0"><img class="rounded h-100 w-100" src="/assets/admin/img/gallery/23.png" alt="..."></a></div>
                          <div class="col-6"><a href="/assets/admin/img/gallery/24.png" data-gallery="gallery-posts-0"><img class="rounded h-100 w-100" src="/assets/admin/img/gallery/24.png" alt="..."></a></div>
                        </div>
                      </div>
                      <div class="d-flex"><button class="btn btn-link p-0 me-3 fs-10 fw-bolder" type="button"><span class="fa-solid fa-heart me-1"></span>345 Likes</button><button class="btn btn-link text-body p-0 fs-10 me-3 fw-bolder" type="button"><span class="fa-solid fa-comment me-1"></span>45 Comments</button><button class="btn btn-link text-body p-0 fs-10 me-2 fw-bolder" type="button"><span class="fa-solid fa-share me-1"></span>56 shares</button></div>
                    </div>
                    <div class="bg-body-highlight border-top border-translucent p-3 p-sm-4">
                      <div class="d-flex align-items-start"><a href="../../apps/social/profile.html">
                          <div class="avatar avatar-m  me-2">
                            <img class="rounded-circle " src="/assets/admin/img//team/30.webp" alt="">
                          </div>
                        </a>
                        <div class="flex-1">
                          <div class="d-flex align-items-center"><a class="fw-bold mb-0 text-body-emphasis" href="../../apps/social/profile.html">Mamur Fechetti</a><span class="text-body-tertiary text-opacity-85 fw-semibold fs-10 ms-2">35 mins ago</span></div>
                          <p class="mb-0">How long did it take to create this? It appears that you quickly produced the second one.</p><button class="btn btn-link p-0 text-body fw-bolder mb-2" type="button"><span class="fa-solid fa-reply fs-10 me-1"></span><span class="fw-bold fs-10">Reply</span></button>
                          <div class="d-flex align-items-start mb-3"><a href="../../apps/social/profile.html">
                              <div class="avatar avatar-m  me-2">
                                <img class="rounded-circle " src="/assets/admin/img//team/62.webp" alt="">
                              </div>
                            </a>
                            <div class="flex-1">
                              <div class="d-flex align-items-center"><a class="fw-bold mb-0 text-body-emphasis" href="../../apps/social/profile.html">Zingko Kudobum</a><span class="text-body-tertiary text-opacity-85 fw-semibold fs-10 ms-2">5 mins ago</span></div>
                              <p class="mb-0">I am so clever that sometimes I don't understand a single word of what I am saying.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center"><a href="../../apps/social/profile.html">
                          <div class="avatar avatar-m  me-2">
                            <img class="rounded-circle " src="/assets/admin/img//team/9.webp" alt="">
                          </div>
                        </a>
                        <div class="flex-1"><input class="form-control" type="text" placeholder="Add comment"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                      <div class="border-bottom border-translucent mb-3">
                        <div class="d-flex align-items-center mb-3"><a href="../../apps/social/profile.html">
                            <div class="avatar avatar-xl  me-2">
                              <img class="rounded-circle " src="/assets/admin/img//team/9.webp" alt="">
                            </div>
                          </a>
                          <div class="flex-1"><a class="fw-bold mb-0 text-body-emphasis" href="../../apps/social/profile.html">Erza Bridgest</a>
                            <p class="fs-10 mb-0 text-body-tertiary text-opacity-85 fw-semibold">3 days ago<span class="fa-solid fa-circle text-body-quaternary text-opacity-50" data-fa-transform="shrink-10 down-2"></span>Lothal, USA<span class="fa-solid fa-circle text-body-quaternary text-opacity-50" data-fa-transform="shrink-10 down-2"></span><span class="fa-solid fa-earth-americas text-body"></span></p>
                          </div>
                          <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                          </div>
                        </div>
                        <p class="text-body-secondary">A guy enters a bakery while carrying a 25-pound haddock.
                          He asks the baker if he makes fish cakes. The rather perplexed baker responds in the negative.
                          The guy responds "That's unfortunate.Today is his birthday"</p>
                      </div>
                      <div class="d-flex"><button class="btn btn-link p-0 me-3 fs-10 fw-bolder" type="button"><span class="fa-solid fa-heart me-1"></span>23 Likes</button><button class="btn btn-link text-body p-0 fs-10 me-3 fw-bolder" type="button"><span class="fa-solid fa-comment me-1"></span>9 Comments</button><button class="btn btn-link text-body p-0 fs-10 me-2 fw-bolder" type="button"><span class="fa-solid fa-share me-1"></span>3 shares</button></div>
                    </div>
                    <div class="bg-body-highlight border-top border-translucent p-3 p-sm-4">
                      <div class="d-flex align-items-center"><a href="../../apps/social/profile.html">
                          <div class="avatar avatar-m  me-2">
                            <img class="rounded-circle " src="/assets/admin/img//team/20.webp" alt="">
                          </div>
                        </a>
                        <div class="flex-1"><input class="form-control" type="text" placeholder="Add comment"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                  <div class="card mb-4">
                    <div class="card-body p-3 p-sm-4">
                      <div class="border-bottom border-translucent mb-3">
                        <div class="d-flex align-items-center mb-3"><a href="../../apps/social/profile.html">
                            <div class="avatar avatar-xl  me-2">
                              <img class="rounded-circle " src="/assets/admin/img//team/9.webp" alt="">
                            </div>
                          </a>
                          <div class="flex-1"><a class="fw-bold mb-0 text-body-emphasis" href="../../apps/social/profile.html">Zingko Kudobum</a>
                            <p class="fs-10 mb-0 text-body-tertiary text-opacity-85 fw-semibold">35 mins ago<span class="fa-solid fa-circle text-body-quaternary text-opacity-50" data-fa-transform="shrink-10 down-2"></span>Consett, UK<span class="fa-solid fa-circle text-body-quaternary text-opacity-50" data-fa-transform="shrink-10 down-2"></span><span class="fa-solid fa-earth-americas text-body"></span></p>
                          </div>
                          <div class="btn-reveal-trigger"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                          </div>
                        </div>
                        <p class="text-body-secondary">Fear can hold you prisoner. Hope can set you free. - King</p>
                        <div class="row g-1 mb-5">
                          <div class="col-3"><a href="/assets/admin/img/gallery/25.png" data-gallery="gallery-posts-2"><img class="rounded h-100 w-100" src="/assets/admin/img/gallery/25.png" alt="..."></a></div>
                          <div class="col-3"><a href="/assets/admin/img/gallery/26.png" data-gallery="gallery-posts-2"><img class="rounded h-100 w-100" src="/assets/admin/img/gallery/26.png" alt="..."></a></div>
                        </div>
                      </div>
                      <div class="d-flex"><button class="btn btn-link p-0 me-3 fs-10 fw-bolder" type="button"><span class="fa-solid fa-heart me-1"></span>345 Likes</button><button class="btn btn-link text-body p-0 fs-10 me-3 fw-bolder" type="button"><span class="fa-solid fa-comment me-1"></span>45 Comments</button><button class="btn btn-link text-body p-0 fs-10 me-2 fw-bolder" type="button"><span class="fa-solid fa-share me-1"></span>56 shares</button></div>
                    </div>
                    <div class="bg-body-highlight border-top border-translucent p-3 p-sm-4">
                      <div class="d-flex align-items-start"><a href="../../apps/social/profile.html">
                          <div class="avatar avatar-m  me-2">
                            <img class="rounded-circle " src="/assets/admin/img//team/14.webp" alt="">
                          </div>
                        </a>
                        <div class="flex-1">
                          <div class="d-flex align-items-center"><a class="fw-bold mb-0 text-body-emphasis" href="../../apps/social/profile.html">Sutanuka Gomez</a><span class="text-body-tertiary text-opacity-85 fw-semibold fs-10 ms-2">35 mins ago</span></div>
                          <p class="mb-0">Time is the best teacher; Unfortunately it kills all its students!</p><button class="btn btn-link p-0 text-body fw-bolder mb-2" type="button"><span class="fa-solid fa-reply fs-10 me-1"></span><span class="fw-bold fs-10">Reply</span></button>
                          <div class="d-flex align-items-start mb-3"><a href="../../apps/social/profile.html">
                              <div class="avatar avatar-m  me-2">
                                <img class="rounded-circle " src="/assets/admin/img//team/27.webp" alt="">
                              </div>
                            </a>
                            <div class="flex-1">
                              <div class="d-flex align-items-center"><a class="fw-bold mb-0 text-body-emphasis" href="../../apps/social/profile.html">Zingko Kudobum</a><span class="text-body-tertiary text-opacity-85 fw-semibold fs-10 ms-2">5 mins ago</span></div>
                              <p class="mb-0">If you’re too open-minded, your brains will fall out.!</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center"><a href="../../apps/social/profile.html">
                          <div class="avatar avatar-m  me-2">
                            <img class="rounded-circle " src="/assets/admin/img//team/14.webp" alt="">
                          </div>
                        </a>
                        <div class="flex-1"><input class="form-control" type="text" placeholder="Add comment"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center"><a class="btn btn-link fs-8 p-0" href="#!">Load more</a></div>
            </div>
          </div>
        </div>

@endsection
