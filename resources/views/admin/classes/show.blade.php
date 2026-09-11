@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
          <div class="card mb-5">
            <div class="card-header d-flex justify-content-center align-items-end position-relative mb-7 mb-xxl-0" style="min-height: 214px; ">
              <div class="hover-actions-trigger position-static">

                <div class="bg-holder rounded-top" >
                  <img preview-input-id="photo_id" style="height: 214px; width: 100%; object-fit: cover;" src="<?php echo ($class->photo_id)? getPhotoUrl($class->photo_id) : '/assets/admin/img/generic/cover-photo.png'; ?>" />
                </div>
                <input  style="display:none;" type="text" id="photo_id" class="media-browser-input"  name="photo_id"  value="<?php echo $class->photo_id;?>"> 
                <label  class="cover-image-file-input"  for="photo_id"></label>
                <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white"><span class="fa-solid fa-camera me-2 overlay-icon"></span></div>
                <!--/.bg-holder-->
              </div>

@if($classTeachers->isNotEmpty())
@foreach($classTeachers as $teacher)
              <div class="hoverbox feed-profile" style="width: 150px; height: 150px">
                <div class="hoverbox-content rounded-circle d-flex flex-center z-1" style="--phoenix-bg-opacity: .56; color: white; padding-top:20px"><a href="#!">{{$teacher->name}}</a></div>
                <div class="position-relative bg-body-quaternary rounded-circle cursor-pointer d-flex flex-center mb-xxl-7">
                  <div class="avatar avatar-5xl"><img class="rounded-circle rounded-circle img-thumbnail shadow-sm border-0" src="<?php echo ($teacher->photo_id) ? getPhotoUrl($teacher->photo_id) : '/assets/admin/img/generic/profile.png'; ?>" alt=""></div>
                  <a href="/admin/teachers/{{ $teacher->id }}" class="w-100 h-100 position-absolute z-1" for="upload-porfile-picture"></a>
                </div>
              </div>
@endforeach
              
@endif


            </div>
            <div class="card-body">
              <div class="row justify-content-xl-between">
                <div class="col-auto">
                  <div class="d-flex flex-wrap mb-3 align-items-center">
                    <h2 class="me-2">{{ $class->name }}</h2><span class="fw-semibold fs-7 text-body-emphasis">{{ $class->year }}</span>
                  </div>
                 
                  <div class="mb-5">
                    <div class="d-md-flex align-items-center">
                      <div class="d-flex align-items-center"><span class="fa-solid fa-user-group fs-9 text-body-tertiary me-2 me-lg-1 me-xl-2"></span><a class="text-body-emphasis" href="#!"><span class="fs-7 fw-bold text-body-tertiary text-opacity-85 text-body-emphasis-hover">{{ $students->count() }} <span class="fw-semibold ms-1 me-4">học sinh</span></span></a></div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">    
                  <div class="row g-2">
                    <div class="col-auto order-xxl-2"><button type="button" class="btn btn-primary lh-1" data-bs-toggle="modal" data-bs-target="#class_attendance_modal"><span class="fa-solid fa-user-plus me-2"></span>Điểm danh</button></div>
                    <div class="col-auto order-xxl-2"><button type="button" class="btn btn-phoenix-primary lh-1" data-bs-toggle="modal" data-bs-target="#class_meal_modal"><span class="fa-solid fa-utensils me-2"></span>Giờ ăn</button></div>
                    <div class="col-auto order-xxl-2"><button type="button" class="btn btn-phoenix-primary lh-1" data-bs-toggle="modal" data-bs-target="#class_daily_log_modal"><span class="fa-solid fa-notes-medical me-2"></span>Sức khỏe</button></div>


                    
                    <div class="col-auto order-xxl-1">
                      <a class="btn btn-phoenix-primary lh-1" href="{{ route('classes.albums', $class->id) }}"><span class="fa-solid fa-images me-2"></span> Album</a>
                    </div>
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
                  <div class="col-6 border-1 border-bottom border-translucent border-end py-2"> <a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="{{ route('students.index') }}"><span class="fa-solid fa-user-group me-2 mb-2 mb-xxl-0"></span>Học sinh</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block {{ !$class->teacher_id ? 'disabled' : '' }}" href="{{ $class->teacher_id ? route('teachers.show', $class->teacher_id) : '#!' }}"><span class="fa-solid fa-chalkboard-user me-2 mb-2 mb-xxl-0"></span>Giáo viên</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent border-end py-2"><a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block {{ !$class->program_id ? 'disabled' : '' }}" href="{{ $class->program_id ? route('programs.show', $class->program_id) : '#!' }}"><span class="fa-solid fa-book me-2 mb-2 mb-xxl-0"></span>Chương trình học</a></div>
                  <div class="col-6 border-1 border-bottom border-translucent py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="{{ route('tuitions.all') }}"><span class="fa-solid fa-money-bill-wave me-2 mb-2 mb-xxl-0"></span>Học phí</a></div>
                  <div class="col-6 border-1 border-end border-translucent py-2"><a class="btn btn-link ps-2 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="{{ route('attendances.index') }}"><span class="fa-solid fa-calendar-check me-2 mb-2 mb-xxl-0"></span>Lịch sử điểm danh</a></div>
                  <div class="col-6 border-1 py-2"><a class="btn btn-link fs-8 text-body-secondary text-primary-hover fw-semibold d-flex flex-column d-xxl-inline-block" href="{{ route('classes.edit', $class->id) }}"><span class="fa-solid fa-pen-to-square me-2 mb-2 mb-xxl-0"></span>Chỉnh sửa lớp </a></div>
                </div>
              </div>
              <div class="mb-8">
                <div class="d-flex pb-4 align-items-end">
      
                  <h3 class="flex-1 mb-0">Album</h3><a href="{{ route('classes.albums', $class->id) }}">tất cả</a>
                </div>
                <div class="row g-3"> 
                  @forelse($recent_photos as $photo)
                  <div class="col-4"><a href="{{ $photo->path }}" class="class-post-photo" data-gallery="gallery-photos"><img class="w-100 rounded-3" style="aspect-ratio: 1 / 1; object-fit: cover;" src="<?php echo getThumbnailUrl($photo->id, 500); ?>" alt=""></a></div>
                  @empty
                  <div class="col-12 text-body-tertiary fs-9">Chưa có ảnh nào.</div>
                  @endforelse
                </div>
              </div>
              <div class="d-flex pb-4 align-items-end border-bottom border-translucent border-dashed">
                <h3 class="flex-1 mb-0">Điểm danh</h3><button type="button" class="btn btn-link p-0 fw-bold fs-9" data-bs-toggle="modal" data-bs-target="#class_attendance_modal">Chi tiết</button>
              </div>
              <div class="row g-0 mb-5 mb-lg-0">
                @if($present_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><button type="button" class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" data-bs-toggle="modal" data-bs-target="#class_attendance_modal"><span class="fa-solid fa-user-group me-2 mb-2 mb-xxl-0"></span>{{ $present_count }} Đến lớp</button></div>
                @endif
                @if($absent_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><button type="button" class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" data-bs-toggle="modal" data-bs-target="#class_attendance_modal"><span class="fa-solid fa-user-xmark me-2 mb-2 mb-xxl-0"></span>{{ $absent_count }} Vắng</button></div>
                @endif
                @if($late_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><button type="button" class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" data-bs-toggle="modal" data-bs-target="#class_attendance_modal"><span class="fa-solid fa-clock me-2 mb-2 mb-xxl-0"></span>{{ $late_count }} Đi muộn</button></div>
                @endif
                @if($excused_count > 0)
                <div class="col-12 border-1 border-bottom border-translucent py-2"><button type="button" class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" data-bs-toggle="modal" data-bs-target="#class_attendance_modal"><span class="fa-solid fa-file-circle-check me-2 mb-2 mb-xxl-0"></span>{{ $excused_count }} Có phép</button></div>
                @endif
                @if($unmarked_count > 0)
                <div class="col-12 py-2"><button type="button" class="btn btn-link px-0 fs-8 text-body-secondary text-primary-hover fw-semibold d-flex" data-bs-toggle="modal" data-bs-target="#class_attendance_modal"><span class="fa-solid fa-circle-question me-2 mb-2 mb-xxl-0"></span>{{ $unmarked_count }} Chưa điểm danh</button></div>
                @endif
              </div>
              <div class="d-flex pb-4 align-items-end border-bottom border-translucent border-dashed">
                <h3 class="flex-1 mb-0">Giờ ăn hôm nay</h3>
              </div>
              <div class="row g-0 mb-5 mb-lg-0">
                @foreach($mealTypes as $mealType)
                  <?php $todayMeal = $todayMeals->get($mealType->id); ?>
                  <div class="col-12 border-1 border-bottom border-translucent py-2 d-flex align-items-center justify-content-between">
                    <button type="button" class="btn btn-link px-0 fs-8 {{ $todayMeal ? 'text-success' : 'text-body-secondary' }} text-primary-hover fw-semibold d-flex class-meal-type-trigger" data-bs-toggle="modal" data-bs-target="#class_meal_modal" data-meal-type-id="{{ $mealType->id }}">
                      <span class="fa-solid {{ $todayMeal ? 'fa-circle-check' : 'fa-circle-question' }} me-2 mb-2 mb-xxl-0"></span>{{ $mealType->name }}{{ $todayMeal ? ' - đã cập nhật' : ' - chưa cập nhật' }}
                    </button>
                    @if($todayMeal && $todayMeal->thumbnail_path)
                      <img src="{{ $todayMeal->thumbnail_path }}" class="rounded ms-2" style="width:32px;height:32px;object-fit:cover;flex-shrink:0;" alt="{{ $mealType->name }}">
                    @endif
                  </div>
                @endforeach
              </div>
            </div>
            <div class="col-12 col-xl-8">
              <div class="card mb-4">
                <div class="card-body p-3 p-sm-4">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2">
                      <img class="rounded-circle" src="{{ getPhotoUrl(Auth::user()->photo_id) }}" alt="">
                    </div>
                    <button type="button" class="btn btn-phoenix-secondary text-start flex-1 rounded-pill text-body-tertiary" data-bs-toggle="modal" data-bs-target="#create_class_post_modal">
                      Chia sẻ điều gì đó với lớp học...
                    </button>
                  </div>
                </div>
              </div>

              <div id="class_posts_feed" data-offset="{{ $feed_dates->count() }}" data-has-more="{{ $has_more_posts ? '1' : '0' }}">
                @if($feed_dates->isEmpty())
                <div class="card mb-4" id="class_posts_empty">
                  <div class="card-body p-4 text-center text-body-tertiary">
                    Chưa có hoạt động nào cho lớp học này.
                  </div>
                </div>
                @else
                {!! $posts_html !!}
                @endif
              </div>
              <div id="class_posts_loading" class="text-center text-body-tertiary py-3" style="display:none;">Đang tải...</div>
            </div>
          </div>
        </div>

        <div class="modal fade " id="create_class_post_modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" style="max-width: 75vw;">
            <div class="modal-content">
              <form id="create_class_post_form" action="{{ route('classes.posts.store', $class->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                  <h5 class="modal-title">Tạo bài viết cho lớp {{ $class->name }}</h5>
                  <button type="button" class="btn btn-close p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="d-flex align-items-center mb-3">
                    <div class="avatar avatar-l me-2">
                      <img class="rounded-circle" src="{{ getPhotoUrl(Auth::user()->photo_id) }}" alt="">
                    </div>
                    <span class="fw-bold text-body-emphasis">{{ Auth::user()->name }}</span>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control" name="content" id="class_post_content" style="height: 120px" placeholder="Chia sẻ điều gì đó với lớp học..." required></textarea>
                    <label for="class_post_content">Nội dung</label>
                    <div class="invalid-feedback"></div>
                  </div>


                  @include('admin.components.file_picker', ['id' => 'class_post_files', 'name' => 'files', 'label' => 'Thêm file, ảnh cho bài viết','reopenModal' => 'create_class_post_modal'])
               
               
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-phoenix-secondary" data-bs-dismiss="modal">Hủy</button>
                  <button type="submit" class="btn btn-primary">Đăng bài</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="edit_class_post_modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" style="max-width: 75vw;">
            <div class="modal-content">
              <form id="edit_class_post_form" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Sửa bài viết</h5>
                  <button type="button" class="btn btn-close p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="form-floating mb-3">
                    <textarea class="form-control" name="content" id="edit_class_post_content" style="height: 120px" required></textarea>
                    <label for="edit_class_post_content">Nội dung</label>
                    <div class="invalid-feedback"></div>
                  </div>

                  @include('admin.components.file_picker', ['id' => 'edit_class_post_files', 'name' => 'files', 'label' => 'Thêm file, ảnh cho bài viết', 'reopenModal' => 'edit_class_post_modal'])
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-phoenix-secondary" data-bs-dismiss="modal">Hủy</button>
                  <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="class_meal_modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form id="class_meal_form">
                @csrf
                <?php
                  $classMealDayNames = ['Thứ Hai','Thứ Ba','Thứ Tư','Thứ Năm','Thứ Sáu','Thứ Bảy','Chủ Nhật'];
                  $classMealToday = \Carbon\Carbon::parse($today);
                  $classMealTodayLabel = $classMealDayNames[$classMealToday->dayOfWeekIso - 1].', '.$classMealToday->format('d/m/Y');
                ?>
                <div class="modal-header">
                  <div>
                    <h5 class="modal-title mb-0">Cập nhật giờ ăn hôm nay</h5>
                    <div class="fs-9 text-body-secondary">{{ $classMealTodayLabel }}</div>
                  </div>
                  <button type="button" class="btn btn-close p-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Bữa ăn</label>
                    <select class="form-select" name="meal_type_id" id="class_meal_type_select" required>
                      @foreach($mealTypes as $mealType)
                        <option value="{{ $mealType->id }}">{{ $mealType->name }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control" name="description" id="class_meal_description" style="height: 100px" placeholder="Món ăn"></textarea>
                    <label for="class_meal_description">Món ăn</label>
                    <div class="invalid-feedback"></div>
                  </div>

                  @include('admin.components.file_picker', ['id' => 'class_meal_photo', 'name' => 'photo_id', 'label' => 'Chọn ảnh món ăn', 'multiple' => false, 'reopenModal' => 'class_meal_modal'])
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-phoenix-secondary" data-bs-dismiss="modal">Hủy</button>
                  <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="class_attendance_modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <div>
                  <h5 class="modal-title mb-0">Điểm danh hôm nay</h5>
                  <div class="fs-9 text-body-secondary">{{ $classMealTodayLabel }}</div>
                </div>
                <button type="button" class="btn btn-close p-1" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="alert alert-danger d-none" id="class-attendance-error-alert"></div>
                <div id="class-attendance-board" data-update-url="{{ route('attendances.update', $class->id) }}" data-date="{{ $today }}">
                  <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                    <span class="fs-9 fw-semibold text-body-secondary me-2" id="class-attendance-selected-count">0 học sinh được chọn</span>
                    <button type="button" class="btn btn-sm btn-phoenix-success" data-bulk-status="present">Có mặt</button>
                    <button type="button" class="btn btn-sm btn-phoenix-danger" data-bulk-status="absent">Vắng</button>
                    <button type="button" class="btn btn-sm btn-phoenix-warning" data-bulk-status="late">Đi muộn</button>
                    <button type="button" class="btn btn-sm btn-phoenix-info" data-bulk-status="excused">Vắng có phép</button>
                  </div>
                  <div class="d-none align-items-center gap-2 mb-3" id="class-attendance-bulk-note-wrapper">
                    <input type="text" id="class-attendance-bulk-note-input" class="form-control form-control-sm" style="max-width:320px" placeholder="Ghi chú áp dụng cho các học sinh đã chọn">
                    <button type="button" class="btn btn-sm btn-phoenix-secondary" id="class-attendance-bulk-note-apply">Áp dụng ghi chú</button>
                  </div>
                  <div class="border-top border-bottom border-translucent position-relative top-1">
                    <div class="table-responsive scrollbar-overlay mx-n1 px-1" style="max-height: 50vh;">
                      <table class="table table-sm fs-9 mb-0">
                        <thead>
                          <tr>
                            <th class="align-middle ps-0" style="width:1%">
                              <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" id="class-attendance-select-all"></div>
                            </th>
                            <th class="align-middle" style="width:30%">Học sinh</th>
                            <th class="align-middle" style="width:22%">Trạng thái</th>
                            <th class="align-middle">Ghi chú</th>
                            <th class="align-middle text-end pe-3" style="width:8%"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($students as $student)
                            <?php $currentAttendance = $student->attendance_status ?? 'unmarked'; ?>
                            <tr>
                              <td class="align-middle ps-0 py-3">
                                <div class="form-check mb-0 fs-8">
                                  <input class="form-check-input class-attendance-row-select" type="checkbox" data-student-id="{{ $student->id }}">
                                </div>
                              </td>
                              <td class="align-middle py-3">
                                <div class="d-flex align-items-center">
                                  <div class="avatar avatar-m"><img class="rounded-square" src="{{ $student->thumbnail_path ?? '/assets/admin/trans.png' }}" alt=""></div>
                                  <p class="mb-0 ms-3 text-body-emphasis fw-bold">{{ $student->name }}</p>
                                </div>
                              </td>
                              <td class="align-middle">
                                <select class="form-select form-select-sm class-attendance-status-input" data-student-id="{{ $student->id }}">
                                  <option value="unmarked" {{ $currentAttendance == 'unmarked' ? 'selected' : '' }}>Chưa điểm danh</option>
                                  <option value="present" {{ $currentAttendance == 'present' ? 'selected' : '' }}>Có mặt</option>
                                  <option value="absent" {{ $currentAttendance == 'absent' ? 'selected' : '' }}>Vắng</option>
                                  <option value="late" {{ $currentAttendance == 'late' ? 'selected' : '' }}>Đi muộn</option>
                                  <option value="excused" {{ $currentAttendance == 'excused' ? 'selected' : '' }}>Vắng có phép</option>
                                </select>
                              </td>
                              <td class="align-middle">
                                <input type="text" value="{{ $student->attendance_note }}" class="form-control form-control-sm class-attendance-note-input" data-student-id="{{ $student->id }}" placeholder="Ghi chú">
                              </td>
                              <td class="align-middle text-end pe-3">
                                <span class="class-attendance-row-status fs-10 text-body-tertiary" data-student-id="{{ $student->id }}"></span>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-phoenix-secondary" data-bs-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="class_daily_log_modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <div>
                  <h5 class="modal-title mb-0">Sức khỏe hàng ngày</h5>
                  <div class="fs-9 text-body-secondary">{{ $classMealTodayLabel }}</div>
                </div>
                <button type="button" class="btn btn-close p-1" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="alert alert-danger d-none" id="class-daily-log-error-alert"></div>
                <div id="class-daily-log-board" data-update-url="{{ route('classes.daily_logs.update', $class->id) }}" data-date="{{ $today }}">
                  <div class="d-flex flex-wrap align-items-end gap-2 mb-3 p-2 bg-body-secondary rounded-2">
                    <span class="fs-9 fw-semibold text-body-secondary me-2" id="class-daily-log-selected-count">0 học sinh được chọn</span>
                    <div>
                      <label class="form-label fs-10 mb-1">Giấc ngủ trưa</label>
                      <select class="form-select form-select-sm" id="class-daily-log-bulk-nap_quality" style="width:160px">
                        <option value="">-- (giữ nguyên)</option>
                        <option value="good">Ngủ ngon</option>
                        <option value="insufficient">Ngủ không đủ giấc</option>
                        <option value="skipped">Không ngủ trưa</option>
                      </select>
                    </div>
                    <div>
                      <label class="form-label fs-10 mb-1">Tâm trạng</label>
                      <select class="form-select form-select-sm" id="class-daily-log-bulk-mood" style="width:160px">
                        <option value="">-- (giữ nguyên)</option>
                        <option value="vui_ve">Vui vẻ</option>
                        <option value="binh_thuong">Bình thường</option>
                        <option value="quay_khoc">Quấy khóc</option>
                        <option value="met_moi">Mệt mỏi</option>
                        <option value="om">Ốm</option>
                      </select>
                    </div>
                    <div>
                      <label class="form-label fs-10 mb-1">Ăn uống</label>
                      <select class="form-select form-select-sm" id="class-daily-log-bulk-meal_amount" style="width:150px">
                        <option value="">-- (giữ nguyên)</option>
                        <option value="all">Ăn hết</option>
                        <option value="most">Ăn phần lớn</option>
                        <option value="some">Ăn ít</option>
                        <option value="none">Không ăn</option>
                      </select>
                    </div>
                    <div>
                      <label class="form-label fs-10 mb-1">Vệ sinh</label>
                      <input type="number" min="0" class="form-control form-control-sm" id="class-daily-log-bulk-potty_count" style="width:90px" placeholder="Số lần">
                    </div>
                    <div class="flex-grow-1" style="min-width:180px">
                      <label class="form-label fs-10 mb-1">Ghi chú</label>
                      <input type="text" class="form-control form-control-sm" id="class-daily-log-bulk-notes" placeholder="Ghi chú">
                    </div>
                    <button type="button" class="btn btn-sm btn-phoenix-primary" id="class-daily-log-bulk-apply">Áp dụng cho học sinh đã chọn</button>
                  </div>

                  <div class="border-top border-bottom border-translucent position-relative top-1">
                    <div class="table-responsive scrollbar-overlay mx-n1 px-1" style="max-height: 50vh;">
                      <table class="table table-sm fs-9 mb-0">
                        <thead>
                          <tr>
                            <th class="align-middle ps-0" style="width:1%">
                              <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" id="class-daily-log-select-all"></div>
                            </th>
                            <th class="align-middle" style="width:16%">Học sinh</th>
                            <th class="align-middle" style="width:14%">Giấc ngủ trưa</th>
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
                                <div class="form-check mb-0 fs-8">
                                  <input class="form-check-input class-daily-log-row-select" type="checkbox" data-student-id="{{ $student->id }}">
                                </div>
                              </td>
                              <td class="align-middle py-3">
                                <div class="d-flex align-items-center">
                                  <div class="avatar avatar-m"><img class="rounded-square" src="{{ $student->thumbnail_path ?? '/assets/admin/trans.png' }}" alt=""></div>
                                  <p class="mb-0 ms-3 text-body-emphasis fw-bold">{{ $student->name }}</p>
                                </div>
                              </td>
                              <td class="align-middle">
                                <select class="form-select form-select-sm class-daily-log-input" data-field="nap_quality" data-student-id="{{ $student->id }}">
                                  <option value="" {{ !$student->daily_log_nap_quality ? 'selected' : '' }}>--</option>
                                  <option value="good" {{ $student->daily_log_nap_quality == 'good' ? 'selected' : '' }}>Ngủ ngon</option>
                                  <option value="insufficient" {{ $student->daily_log_nap_quality == 'insufficient' ? 'selected' : '' }}>Ngủ không đủ giấc</option>
                                  <option value="skipped" {{ $student->daily_log_nap_quality == 'skipped' ? 'selected' : '' }}>Không ngủ trưa</option>
                                </select>
                              </td>
                              <td class="align-middle">
                                <select class="form-select form-select-sm class-daily-log-input" data-field="mood" data-student-id="{{ $student->id }}">
                                  <option value="" {{ !$student->daily_log_mood ? 'selected' : '' }}>--</option>
                                  <option value="vui_ve" {{ $student->daily_log_mood == 'vui_ve' ? 'selected' : '' }}>Vui vẻ</option>
                                  <option value="binh_thuong" {{ $student->daily_log_mood == 'binh_thuong' ? 'selected' : '' }}>Bình thường</option>
                                  <option value="quay_khoc" {{ $student->daily_log_mood == 'quay_khoc' ? 'selected' : '' }}>Quấy khóc</option>
                                  <option value="met_moi" {{ $student->daily_log_mood == 'met_moi' ? 'selected' : '' }}>Mệt mỏi</option>
                                  <option value="om" {{ $student->daily_log_mood == 'om' ? 'selected' : '' }}>Ốm</option>
                                </select>
                              </td>
                              <td class="align-middle">
                                <select class="form-select form-select-sm class-daily-log-input" data-field="meal_amount" data-student-id="{{ $student->id }}">
                                  <option value="" {{ !$student->daily_log_meal_amount ? 'selected' : '' }}>--</option>
                                  <option value="all" {{ $student->daily_log_meal_amount == 'all' ? 'selected' : '' }}>Ăn hết</option>
                                  <option value="most" {{ $student->daily_log_meal_amount == 'most' ? 'selected' : '' }}>Ăn phần lớn</option>
                                  <option value="some" {{ $student->daily_log_meal_amount == 'some' ? 'selected' : '' }}>Ăn ít</option>
                                  <option value="none" {{ $student->daily_log_meal_amount == 'none' ? 'selected' : '' }}>Không ăn</option>
                                </select>
                              </td>
                              <td class="align-middle">
                                <input type="number" min="0" value="{{ $student->daily_log_potty_count }}" class="form-control form-control-sm class-daily-log-input" data-field="potty_count" data-student-id="{{ $student->id }}">
                              </td>
                              <td class="align-middle">
                                <input type="text" value="{{ $student->daily_log_notes }}" class="form-control form-control-sm class-daily-log-input" data-field="notes" data-student-id="{{ $student->id }}" placeholder="Ghi chú">
                              </td>
                              <td class="align-middle text-end pe-3">
                                <span class="class-daily-log-row-status fs-10 text-body-tertiary" data-student-id="{{ $student->id }}"></span>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-phoenix-secondary" data-bs-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>
@include('admin.pages.media_browser')
@endsection

@section('js')
<script type="text/javascript">
if (window.GLightbox) {
    GLightbox({ selector: '.class-post-photo, .class-meal-photo' });
}

var loadingMorePosts = false;
function maybeLoadMorePosts() {
    var $feed = $('#class_posts_feed');
    if (loadingMorePosts || $feed.data('has-more') != '1') return;
    if ($(window).scrollTop() + $(window).height() < $(document).height() - 300) return;

    loadingMorePosts = true;
    $('#class_posts_loading').show();

    $.ajax({
        url: "{{ route('classes.posts.load', $class->id) }}",
        type: 'GET',
        data: { offset: $feed.data('offset') },
        success: function (res) {
            $feed.append(res.html);
            $feed.data('offset', res.next_offset);
            $feed.data('has-more', res.has_more ? '1' : '0');
            if (window.GLightbox) {
                GLightbox({ selector: '.class-post-photo, .class-meal-photo' });
            }
        },
        complete: function () {
            loadingMorePosts = false;
            $('#class_posts_loading').hide();
        }
    });
}
$(window).on('scroll', maybeLoadMorePosts);

$('#photo_id').on('change', function () {
    $.ajax({
        url: "{{ route('classes.updatePhoto', $class->id) }}",
        type: 'POST',
        data: { _token: '{{ csrf_token() }}', photo_id: $(this).val() },
    });
});



$('#create_class_post_modal').on('hidden.bs.modal', function () {
    //$('#create_class_post_form')[0].reset();
    //$('#class_post_files').trigger('picker:reset'); 
    $('.invalid-feedback').html('');
    $('#create_class_post_form .form-control').removeClass('is-invalid');
});

$('#create_class_post_form').on('submit', function (e) {
    e.preventDefault();
    var $form = $(this);
    $('.invalid-feedback').html('');
    $form.find('.form-control').removeClass('is-invalid');

    $.ajax({
        url: $form.attr('action'),
        type: 'POST',
        data: $form.serialize(),
        success: function () {
            window.location.reload();
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (field, msgs) {
                    $("[name='" + field + "']").addClass('is-invalid');
                    $("[name='" + field + "']").siblings('.invalid-feedback').html(msgs[0]);
                });
            }
        }
    });
});

$(document).on('click', '.edit-class-post', function (e) {
    e.preventDefault();
    var postId = $(this).data('post-id');

    $.getJSON('{{ url('/admin/classes/'.$class->id.'/posts') }}/' + postId + '/edit', function (res) {
        var $form = $('#edit_class_post_form');
        $form.attr('action', '{{ url('/admin/classes/'.$class->id.'/posts') }}/' + postId);
        $form.data('post-id', postId);
        $('#edit_class_post_content').val(res.content);
        $('#edit_class_post_files').trigger('picker:set', [res.files]);
        $('#edit_class_post_modal').modal('show');
    });
});

$('#edit_class_post_modal').on('hidden.bs.modal', function () {
/*
    $('#edit_class_post_form')[0].reset();
    $('#edit_class_post_files').trigger('picker:reset');
    $('.invalid-feedback').html('');
    $('#edit_class_post_form .form-control').removeClass('is-invalid');
    */ 
});

$('#edit_class_post_form').on('submit', function (e) {
    e.preventDefault();
    var $form = $(this);
    var postId = $form.data('post-id');
    $('.invalid-feedback').html('');
    $form.find('.form-control').removeClass('is-invalid');

    $.ajax({
        url: $form.attr('action'),
        type: 'POST',
        data: $form.serialize(),
        success: function (res) {
            $('#class_post_' + postId).replaceWith(res.html);
            $('#edit_class_post_modal').modal('hide');
            if (window.GLightbox) {
                GLightbox({ selector: '.class-post-photo, .class-meal-photo' });
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (field, msgs) {
                    $("[name='" + field + "']").addClass('is-invalid');
                    $("[name='" + field + "']").siblings('.invalid-feedback').html(msgs[0]);
                });
            }
        }
    });
});

$(document).on('click', '.delete-class-post', function (e) {
    e.preventDefault();
    if (!confirm('Xóa bài viết này?')) return;
    var postId = $(this).data('post-id');
    var $card = $('#class_post_' + postId);

    $.ajax({
        url: '{{ url('/admin/classes/'.$class->id.'/posts') }}/' + postId,
        type: 'POST',
        data: { _token: '{{ csrf_token() }}', _method: 'DELETE' },
        success: function () {
            $card.remove();
        }
    });
});

var todayMeals = {!! json_encode($todayMeals->map(function ($meal) {
    return ['description' => $meal->description, 'photo_id' => $meal->photo_id, 'path' => $meal->thumbnail_path];
})) !!};

function fillClassMealForm(mealTypeId) {
    var data = todayMeals[mealTypeId];
    $('#class_meal_description').val(data ? data.description : '');
    if (data && data.photo_id) {
        $('#class_meal_photo').trigger('picker:set', [[{ id: data.photo_id, path: data.path }]]);
    } else {
        $('#class_meal_photo').trigger('picker:reset');
    }
}

$('#class_meal_type_select').on('change', function () {
    fillClassMealForm($(this).val());
});

$('.class-meal-type-trigger').on('click', function () {
    $('#class_meal_type_select').val($(this).data('meal-type-id'));
});

$('#class_meal_modal').on('show.bs.modal', function (e) {
    // e.relatedTarget is only set when a real trigger element (the "Giờ ăn" button or a
    // meal-type link) opened this modal. When the photo picker's own modal closes and this
    // one is brought back on top of it, it's reopened programmatically with no relatedTarget -
    // skip refilling the form then, or it would overwrite the photo the user just picked with
    // whatever was last saved on the server.
    if (!e.relatedTarget) return;
    fillClassMealForm($('#class_meal_type_select').val());
});

$('#class_meal_modal').on('hidden.bs.modal', function () {
    $('.invalid-feedback').html('');
    $('#class_meal_form .form-control, #class_meal_form .form-select').removeClass('is-invalid');
});

$('#class_meal_form').on('submit', function (e) {
    e.preventDefault();
    var $form = $(this);
    $('.invalid-feedback').html('');
    $form.find('.form-control, .form-select').removeClass('is-invalid');

    $.ajax({
        url: '{{ route('classes.meals.update', $class->id) }}',
        type: 'POST',
        data: $form.serialize(),
        success: function () {
            window.location.reload();
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (field, msgs) {
                    $("[name='" + field + "']").addClass('is-invalid');
                    $("[name='" + field + "']").siblings('.invalid-feedback').html(msgs[0]);
                });
            }
        }
    });
});

(function () {
    var $board = $('#class-attendance-board');
    if (!$board.length) return;

    var updateUrl = $board.data('update-url');
    var dateValue = $board.data('date');
    var $errorAlert = $('#class-attendance-error-alert');
    var $selectAll = $('#class-attendance-select-all');
    var $rowChecks = $board.find('.class-attendance-row-select');
    var $countEl = $('#class-attendance-selected-count');
    var $noteWrapper = $('#class-attendance-bulk-note-wrapper');
    var $noteInput = $('#class-attendance-bulk-note-input');
    var attendanceChanged = false;

    function selectedIds() {
        return $rowChecks.filter(':checked').map(function () { return $(this).data('student-id'); }).get();
    }

    function updateCount() {
        $countEl.text(selectedIds().length + ' học sinh được chọn');
    }

    function showError(message) {
        $errorAlert.text(message).removeClass('d-none');
    }

    function clearError() {
        $errorAlert.addClass('d-none').text('');
    }

    function statusSelect(studentId) {
        return $board.find('.class-attendance-status-input[data-student-id="' + studentId + '"]');
    }

    function noteInputFor(studentId) {
        return $board.find('.class-attendance-note-input[data-student-id="' + studentId + '"]');
    }

    function setRowState(studentId, state) {
        var $el = $board.find('.class-attendance-row-status[data-student-id="' + studentId + '"]');
        if (!$el.length) return;
        if (state === 'saving') {
            $el.text('Đang lưu...').attr('class', 'class-attendance-row-status fs-10 text-body-tertiary');
        } else if (state === 'saved') {
            $el.text('Đã lưu').attr('class', 'class-attendance-row-status fs-10 text-success');
            setTimeout(function () {
                if ($el.text() === 'Đã lưu') $el.text('');
            }, 1500);
        } else if (state === 'error') {
            $el.text('Lỗi').attr('class', 'class-attendance-row-status fs-10 text-danger');
        }
    }

    function buildUpdates(studentIds, overrides) {
        return studentIds.map(function (studentId) {
            var $select = statusSelect(studentId);
            var $noteEl = noteInputFor(studentId);
            var status = (overrides && overrides.status) ? overrides.status : ($select.length ? $select.val() : 'unmarked');
            var note = (overrides && typeof overrides.note === 'string') ? overrides.note : ($noteEl.length ? $noteEl.val() : '');
            return { student_id: studentId, status: status, note: note };
        });
    }

    function sendUpdates(studentIds, updates) {
        studentIds.forEach(function (id) { setRowState(id, 'saving'); });
        clearError();

        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: { _token: '{{ csrf_token() }}', date: dateValue, updates: updates },
            success: function () {
                attendanceChanged = true;
                studentIds.forEach(function (id) { setRowState(id, 'saved'); });
            },
            error: function (xhr) {
                studentIds.forEach(function (id) { setRowState(id, 'error'); });
                showError((xhr.responseJSON && xhr.responseJSON.message) || 'Không thể lưu điểm danh.');
            }
        });
    }

    function saveRow(studentId) {
        sendUpdates([studentId], buildUpdates([studentId]));
    }

    $board.on('change', '.class-attendance-status-input', function () {
        saveRow($(this).data('student-id'));
    });

    $board.on('change', '.class-attendance-note-input', function () {
        saveRow($(this).data('student-id'));
    });

    $selectAll.on('change', function () {
        $rowChecks.prop('checked', $selectAll.is(':checked'));
        updateCount();
    });

    $rowChecks.on('change', function () {
        if (!$(this).is(':checked')) $selectAll.prop('checked', false);
        updateCount();
    });

    $board.on('click', '[data-bulk-status]', function () {
        var status = $(this).data('bulk-status');
        var ids = selectedIds();
        if (!ids.length) return;

        ids.forEach(function (studentId) {
            statusSelect(studentId).val(status);
        });

        $noteWrapper.removeClass('d-none').addClass('d-flex');
        $noteInput.trigger('focus');

        sendUpdates(ids, buildUpdates(ids, { status: status }));
    });

    $('#class-attendance-bulk-note-apply').on('click', function () {
        var ids = selectedIds();
        if (!ids.length) return;
        var text = $noteInput.val();

        ids.forEach(function (studentId) {
            noteInputFor(studentId).val(text);
        });

        sendUpdates(ids, buildUpdates(ids, { note: text }));
    });

    $('#class_attendance_modal').on('hidden.bs.modal', function () {
        if (attendanceChanged) {
            window.location.reload();
        }
    });

    updateCount();
})();

(function () {
    var $board = $('#class-daily-log-board');
    if (!$board.length) return;

    var updateUrl = $board.data('update-url');
    var dateValue = $board.data('date');
    var $errorAlert = $('#class-daily-log-error-alert');
    var $selectAll = $('#class-daily-log-select-all');
    var $rowChecks = $board.find('.class-daily-log-row-select');
    var $countEl = $('#class-daily-log-selected-count');
    var fields = ['nap_quality', 'mood', 'meal_amount', 'potty_count', 'notes'];
    var dailyLogChanged = false;

    function selectedIds() {
        return $rowChecks.filter(':checked').map(function () { return $(this).data('student-id'); }).get();
    }

    function updateCount() {
        $countEl.text(selectedIds().length + ' học sinh được chọn');
    }

    function showError(message) {
        $errorAlert.text(message).removeClass('d-none');
    }

    function clearError() {
        $errorAlert.addClass('d-none').text('');
    }

    function fieldInput(studentId, field) {
        return $board.find('.class-daily-log-input[data-field="' + field + '"][data-student-id="' + studentId + '"]');
    }

    function setRowState(studentId, state) {
        var $el = $board.find('.class-daily-log-row-status[data-student-id="' + studentId + '"]');
        if (!$el.length) return;
        if (state === 'saving') {
            $el.text('Đang lưu...').attr('class', 'class-daily-log-row-status fs-10 text-body-tertiary');
        } else if (state === 'saved') {
            $el.text('Đã lưu').attr('class', 'class-daily-log-row-status fs-10 text-success');
            setTimeout(function () {
                if ($el.text() === 'Đã lưu') $el.text('');
            }, 1500);
        } else if (state === 'error') {
            $el.text('Lỗi').attr('class', 'class-daily-log-row-status fs-10 text-danger');
        }
    }

    function buildUpdate(studentId) {
        var update = { student_id: studentId };
        fields.forEach(function (field) {
            var $el = fieldInput(studentId, field);
            var value = $el.length ? $el.val() : '';
            update[field] = value === '' ? null : value;
        });
        return update;
    }

    function sendUpdates(studentIds) {
        studentIds.forEach(function (id) { setRowState(id, 'saving'); });
        clearError();

        $.ajax({
            url: updateUrl,
            type: 'POST',
            data: { _token: '{{ csrf_token() }}', date: dateValue, updates: studentIds.map(buildUpdate) },
            success: function () {
                dailyLogChanged = true;
                studentIds.forEach(function (id) { setRowState(id, 'saved'); });
            },
            error: function (xhr) {
                studentIds.forEach(function (id) { setRowState(id, 'error'); });
                showError((xhr.responseJSON && xhr.responseJSON.message) || 'Không thể lưu.');
            }
        });
    }

    function saveRow(studentId) {
        sendUpdates([studentId]);
    }

    $board.on('change', '.class-daily-log-input', function () {
        saveRow($(this).data('student-id'));
    });

    $selectAll.on('change', function () {
        $rowChecks.prop('checked', $selectAll.is(':checked'));
        updateCount();
    });

    $rowChecks.on('change', function () {
        if (!$(this).is(':checked')) $selectAll.prop('checked', false);
        updateCount();
    });

    $('#class-daily-log-bulk-apply').on('click', function () {
        var ids = selectedIds();
        if (!ids.length) return;

        var bulkValues = {};
        fields.forEach(function (field) {
            var $bulkEl = $('#class-daily-log-bulk-' + field);
            if ($bulkEl.length && $bulkEl.val() !== '') {
                bulkValues[field] = $bulkEl.val();
            }
        });
        if (!Object.keys(bulkValues).length) return;

        ids.forEach(function (studentId) {
            Object.keys(bulkValues).forEach(function (field) {
                fieldInput(studentId, field).val(bulkValues[field]);
            });
        });

        sendUpdates(ids);
    });

    $('#class_daily_log_modal').on('hidden.bs.modal', function () {
        if (dailyLogChanged) {
            window.location.reload();
        }
    });

    updateCount();
})();
</script>
@endsection
