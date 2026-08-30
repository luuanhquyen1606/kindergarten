       <div class="mb-4">
              <div class="row g-3">

                <div class="col-auto">
                  <div class="search-box">
                    <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Tìm" aria-label="Tìm" />
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
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['type' => 'news']) }}">Tin tức</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['type' => 'event']) }}">Sự kiện</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['type' => null]) }}">Tất cả</a></li>
                      </ul>
                    </div>
                    <div class="btn-group position-static text-nowrap">
                      <button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                        {{ optional($categories->firstWhere('id', request('category_id')))->name ?? 'Chuyên mục' }}
                      <span class="fas fa-angle-down ms-2"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <?php
                        foreach ($categories as $category)
                        {
                        ?>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['category_id' => $category->id]) }}">{{$category->name}}</a></li>
                       <?php
                        }
                        ?>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['category_id' => null]) }}">Tất cả</a></li>
                      </ul>
                    </div>
                    <div class="btn-group position-static text-nowrap">
                      <button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                        {{ optional($tags->firstWhere('id', request('tag_id')))->name ?? 'Thẻ' }}
                        <span class="fas fa-angle-down ms-2"></span></button>
                      <ul class="dropdown-menu">
                        <?php
                        foreach ($tags as $tag)
                        {
                        ?>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['tag_id' => $tag->id]) }}">{{$tag->name}}</a></li>
                       <?php
                        }
                        ?>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['tag_id' => null]) }}">Tất cả</a></li>
                      </ul>
                    </div>
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
                      <th class="sort align-middle pe-5" scope="col" data-sort="customer" style="width:60%;">Tiêu đề</th>
                      <th class="sort align-middle pe-5" scope="col" style="width:10%;">Loại</th>
                      <th class="sort align-middle pe-5" scope="col" data-sort="email" style="width:20%;">Danh mục</th>
                      <th class="sort align-middle text-end pe-3" scope="col"  style="min-width:100px">tác vụ</th>

                    </tr>
                  </thead>
                  <tbody class="list" id="customers-table-body">

                    <?php
                    foreach ($posts as $post)
                    {
                        $post_href = $post->type === 'event'
                            ? '/su-kien-'.$post->slug
                            : '/'.$post->routing_slug;
                        ?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                      <td class="fs-9 align-middle ps-0 py-3">
                        <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"email":"annac34@gmail.com","city":"Budapest","totalOrders":89,"totalSpent":23987,"lastSeen":"34 min ago","lastOrder":"Dec 12, 12:56 PM"}' /></div>
                      </td>
                      <td class="customer align-middle white-space-nowrap pe-5">
                        <a target="_blank" class="d-flex align-items-center text-body-emphasis" href="<?php echo $post_href; ?>">
                          <div class="avatar avatar-m"><img class="rounded-square" src="<?php echo $post->photo_id? getPhotoUrl($post->photo_id) :'/assets/admin/trans.png'; ?>" alt="" /></div>
                          <p class="mb-0 ms-3 text-body-emphasis fw-bold"><?php echo $post->title; ?>
                          <br />
                          <?php
                          foreach ($post->tags as $tag)
                          {
                          ?>
                          <span class="badge badge-phoenix badge-phoenix-secondary">{{$tag->name}}</span>
                            <?php
                            }
                            ?>

                        </p>
                        </a>

                      </td>
                      <td class="align-middle white-space-nowrap pe-5">
                        <?php if ($post->type === 'event') { ?>
                        <span class="badge badge-phoenix badge-phoenix-warning">Sự kiện</span>
                        <?php } else { ?>
                        <span class="badge badge-phoenix badge-phoenix-info">Tin tức</span>
                        <?php } ?>
                      </td>
                      <td class="email align-middle white-space-nowrap pe-5">{{$post->category_name}} <br /></td>

                      <td class="align-middle actions  text-end pe-3">
                        <a href="/admin/posts/{{$post->id}}/edit"  class="btn btn-link text-body-quaternary p-0 me-2">
                         <span class="fas fa-edit text-body"></span>
                        </a>
                        <button data-bs-toggle="offcanvas" data-bs-target="#offcanvas_<?php echo $post->id; ?>" aria-controls="offcanvas_<?php echo $post->id; ?>" class="btn btn-link text-body-quaternary p-0 text-danger">
                          <span class="fa-solid fa-trash text-danger"></span>
                        </button>
                          <div class="offcanvas offcanvas-end" id="offcanvas_<?php echo $post->id; ?>" tabindex="-1" aria-labelledby="offcanvas_<?php echo $post->id; ?>Label">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                             {{$post->title}}
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                              Xóa bài viết này?
                              <div class="mt-3">
                                <form method="POST" class="ajax_delete_form" action="/admin/posts/<?php echo $post->id; ?>">
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
