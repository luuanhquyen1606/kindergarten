       <div class="mb-4">
              <div class="row g-3">

                <div class="col-auto">
                  <div class="search-box">
                    <form class="position-relative"><input class="form-control search-input search" type="search" name="q" value="{{ request('q') }}" placeholder="Tìm bài viết" aria-label="Tìm" />
                      <span class="fas fa-search search-box-icon"></span>
                    </form>
                  </div>
                </div>
                <div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
                  <div class="btn-group position-static" role="group">
                    <div class="btn-group position-static text-nowrap">
                      <button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                        {{ request('type') === 'event' ? 'Sự kiện' : (request('type') === 'news' ? 'Tin tức' : 'Loại nội dung') }}
                      <span class="fas fa-angle-down ms-2"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['type' => 'news', 'page' => null]) }}">Tin tức</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['type' => 'event', 'page' => null]) }}">Sự kiện</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['type' => null, 'page' => null]) }}">Tất cả</a></li>
                      </ul>
                    </div>
                    <div class="btn-group position-static text-nowrap">
                      <button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                        {{ optional($categories->firstWhere('id', request('category_id')))->name ?? 'Chuyên mục' }}
                      <span class="fas fa-angle-down ms-2"></span>
                      </button>
                      <ul class="dropdown-menu">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['category_id' => $category->id, 'page' => null]) }}">{{ $category->name }}</a></li>
                        @endforeach
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['category_id' => null, 'page' => null]) }}">Tất cả</a></li>
                      </ul>
                    </div>
                    <div class="btn-group position-static text-nowrap">
                      <button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                        {{ optional($tags->firstWhere('id', request('tag_id')))->name ?? 'Thẻ' }}
                        <span class="fas fa-angle-down ms-2"></span></button>
                      <ul class="dropdown-menu">
                        @foreach($tags as $tag)
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['tag_id' => $tag->id, 'page' => null]) }}">{{ $tag->name }}</a></li>
                        @endforeach
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['tag_id' => null, 'page' => null]) }}">Tất cả</a></li>
                      </ul>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="js-bulk-bar alert alert-subtle-primary d-none d-flex align-items-center justify-content-between py-2 px-3 mb-3">
              <span class="fs-9"><span class="js-bulk-count fw-bold">0</span> bài viết được chọn</span>
              <div>
                <button type="button" class="btn btn-sm btn-link text-body js-clear-selection">Bỏ chọn</button>
                <button type="button" class="btn btn-sm btn-danger js-bulk-delete">
                  <span class="fas fa-trash me-1"></span>Xóa đã chọn
                </button>
              </div>
            </div>

            <div class=" border-top border-bottom border-translucent position-relative top-1">
              <div class="table-responsive scrollbar-overlay mx-n1 px-1">
                <table class="table table-sm fs-9 mb-0">
                  <thead>
                    <tr>
                      <th class="white-space-nowrap fs-9 align-middle ps-0">
                        <div class="form-check mb-0 fs-8"><input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" /></div>
                      </th>
                      <th class="align-middle pe-5" scope="col" style="width:45%;">Tiêu đề</th>
                      <th class="align-middle pe-5" scope="col" style="width:10%;">Loại</th>
                      <th class="align-middle pe-5" scope="col" style="width:15%;">Danh mục</th>
                      <th class="align-middle pe-5" scope="col" style="width:12%;">Trạng thái</th>
                      <th class="align-middle pe-5" scope="col" style="width:10%;">Ngày tạo</th>
                      <th class="align-middle text-end pe-3" scope="col" style="min-width:100px">Tác vụ</th>
                    </tr>
                  </thead>
                  <tbody id="customers-table-body">

                    @forelse($posts as $post)
                    <?php
                        $post_href = $post->type === 'event'
                            ? '/su-kien-'.$post->slug
                            : '/'.$post->routing_slug;
                    ?>
                    <tr class="hover-actions-trigger position-static">
                      <td class="fs-9 align-middle ps-0 py-3">
                        <div class="form-check mb-0 fs-8"><input class="form-check-input js-row-select" type="checkbox" value="{{ $post->id }}" /></div>
                      </td>
                      <td class="align-middle pe-5">
                        <a target="_blank" class="d-flex align-items-center text-body-emphasis" href="{{ $post_href }}">
                          <div class="avatar avatar-m">
                            @if($post->photo_id)
                              <img class="rounded-square" src="{{ getPhotoUrl($post->photo_id) }}" alt="" />
                            @else
                              <div class="rounded-square bg-body-tertiary d-flex align-items-center justify-content-center h-100 w-100">
                                <span class="fas fa-image text-body-quaternary"></span>
                              </div>
                            @endif
                          </div>
                          <div class="ms-3">
                            <p class="mb-0 text-body-emphasis fw-bold">{{ $post->title }}</p>
                            @if($post->tags->count())
                              <div class="mt-1">
                                @foreach($post->tags as $tag)
                                  <span class="badge badge-phoenix badge-phoenix-secondary">{{ $tag->name }}</span>
                                @endforeach
                              </div>
                            @endif
                          </div>
                        </a>
                      </td>
                      <td class="align-middle white-space-nowrap pe-5">
                        @if($post->type === 'event')
                          <span class="badge badge-phoenix badge-phoenix-warning">Sự kiện</span>
                        @else
                          <span class="badge badge-phoenix badge-phoenix-info">Tin tức</span>
                        @endif
                      </td>
                      <td class="align-middle white-space-nowrap pe-5">{{ $post->category_name ?? '—' }}</td>
                      <td class="align-middle white-space-nowrap pe-5">
                        <div class="form-check form-switch mb-0 d-flex align-items-center gap-2">
                          <input class="form-check-input js-toggle-publish" type="checkbox" role="switch"
                                 data-url="{{ route('posts.togglePublish', $post->id) }}"
                                 {{ $post->is_published ? 'checked' : '' }}>
                          <span class="badge badge-phoenix js-publish-badge {{ $post->is_published ? 'badge-phoenix-success' : 'badge-phoenix-secondary' }}">
                            {{ $post->is_published ? 'Đã đăng' : 'Bản nháp' }}
                          </span>
                        </div>
                      </td>
                      <td class="align-middle white-space-nowrap pe-5">{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</td>

                      <td class="align-middle actions text-end pe-3">
                        <a href="/admin/posts/{{ $post->id }}" class="btn btn-link text-body-quaternary p-0 me-2" title="Xem chi tiết">
                          <span class="fas fa-eye text-body"></span>
                        </a>
                        <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-link text-body-quaternary p-0 me-2" title="Chỉnh sửa">
                         <span class="fas fa-edit text-body"></span>
                        </a>
                        <button type="button" class="btn btn-link text-body-quaternary p-0 text-danger js-delete-post" data-id="{{ $post->id }}" data-title="{{ $post->title }}" title="Xóa">
                          <span class="fa-solid fa-trash text-danger"></span>
                        </button>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="text-center text-body-tertiary py-6">
                        <span class="fas fa-newspaper fs-3 d-block mb-2 text-body-quaternary"></span>
                        Không tìm thấy bài viết nào.
                      </td>
                    </tr>
                    @endforelse

                  </tbody>
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body">
                    @if($posts->total())
                      Hiển thị {{ $posts->firstItem() }}-{{ $posts->lastItem() }} trong {{ $posts->total() }} bài viết
                    @else
                      0 bài viết
                    @endif
                  </p>
                </div>
                <div class="col-auto d-flex">
                  {{ $posts->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
              </div>
            </div>
