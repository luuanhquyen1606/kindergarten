@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="row">
    <div class="row g-3 flex-between-end mb-5" style="padding-top:0px !important">
            <div class="col-auto">
              <h2 class="mb-2">Tin tức &amp; sự kiện</h2>
            </div>
            <div class="col-auto">
              <a href="/admin/posts/create" class="btn btn-primary mb-2 mb-sm-0" type="submit">Thêm bài viết</a>
              <a href="/admin/posts/create?type=event" class="btn btn-phoenix-secondary mb-2 mb-sm-0" type="submit">Thêm sự kiện</a>
            </div>
    </div>


    <div class="card col-xl-8" >
        <div class="d-flex flex-wrap p-4">
                              <h5 class="mb-0 text-body-highlight me-2">Bài viết</h5>
                            </div>
       <div id="products">
@include('admin.posts.partials.list')
          </div>


    </div>

    <!-- Shared delete confirmation, reused for single-row and bulk delete -->
    <div class="offcanvas offcanvas-end" id="offcanvas_delete_post" tabindex="-1" aria-labelledby="offcanvas_delete_post_label">
      <div class="offcanvas-body" style="padding-top: 100px;">
        <h6 id="delete_post_message">Xóa bài viết này?</h6>
      </div>
      <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
        <div class="mt-3">
          <form method="POST" id="delete_post_form" class="ajax_delete_form">
            @csrf
            <input type="hidden" name="_method" id="delete_post_method" value="DELETE">
            <div id="delete_post_ids"></div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Hủy</button>
            <button type="submit" class="btn btn-danger">Xóa</button>
          </form>
        </div>
      </div>
    </div>
                    

    <div class="col-md-4 col-xl-4 col-xxl-4 ">  
                


          <div class=" shadow-none border " data-component-card="data-component-card" style="background-color: white;">
                  
                  <div class="card-body p-0" style="padding-bottom:10px">
                    
                  <div class="card-header p-4 border-bottom bg-body d-flex flex-wrap p-4">
                              <h5 class="mb-0 text-body-highlight me-2">Chuyên mục bài viết</h5>
                              <a data-bs-toggle="offcanvas" data-bs-target="#offcanvas_new_category" aria-controls="offcanvas_new_category" class="fw-bold fs-9" href="#!">thêm chuyên mục</a>
                              
                         
                            </div>
                            <div class="p-2">
                   <table class="table table-striped table-sm fs-9 mb-0 p-2">
                            <thead>
                              <tr>
                                <th class="sort " data-sort="name">Tên</th>
                                <th class="sort " data-sort="email">Bài viết</th>
                                <th class="sort align-middle text-end pe-3" scope="col">tác vụ</th>
                              </tr>
                            </thead>
                            <tbody class="list">

                            <?php
                            foreach ($categories as $category)
                            {
                            ?>
                              <tr>
                                <td class="align-middle ps-3 name">{{$category->name}}</td>
                                <td class="align-middle email">{{$category->posts_count}}</td>
                                <td class="align-middle white-space-nowrap text-end pe-0">
                                  <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                      <span class="fas fa-ellipsis-h fs-10"></span> 
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2" style="">
                                      <a class="dropdown-item"  data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit_category_{{$category->id}}">Thay đổi</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item text-danger" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_delete_category_{{$category->id}}">Xóa</a>
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
                   
                  </div>

                          <!-- Offcanvas edit category -->
                           <?php
                            foreach ($categories as $category)
                            {
                            ?>
                              <div class="offcanvas offcanvas-end" id="offcanvas_edit_category_{{$category->id}}" tabindex="-1" aria-labelledby="offcanvas_new_category_abel">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                            
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                             
                              <div class="mt-3">
                                <form method="POST" class="ajax_form" action="/admin/categories/{{$category->id}}">
                                  @csrf
                                  @method('PUT')
                                  <h6>Cập nhật chuyên mục </h6>
                                  <div class="col-sm-12 col-md-12" style="margin-bottom: 20px;"> 
                                    <div class="form-floating " >
                                        <input  class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tên chuyên mục" value="{{$category->name}}">
                                        <label for="create-boardwizard-name">Tên chuyên mục</label>
                                      <div class="invalid-feedback"></div> 
                                    </div> 
                                  </div>
                                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </form>
                              </div>
                            </div>
                          </div>
                            <?php
                            }
                            ?>

                            <!-- Offcanvas delete category -->
                           <?php
                            foreach ($categories as $category)
                            {
                            ?>
                              <div class="offcanvas offcanvas-end" id="offcanvas_delete_category_{{$category->id}}" tabindex="-1" aria-labelledby="offcanvas_new_category_abel">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                            
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                             
                              <div class="mt-3">
                                <form method="POST" class="ajax_form" action="/admin/categories/{{$category->id}}">
                                  @csrf
                                  @method('DELETE')
                                  <h6>Xóa chuyên mục {{$category->name}}?</h6>
                                  <div class="col-sm-12 col-md-12" style="margin-bottom: 20px;"> 
                                    <div class="form-floating " >
                                        <input disabled  class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tên chuyên mục" value="{{$category->name}}">
                                        <label for="create-boardwizard-name">Tên chuyên mục</label>
                                      <div class="invalid-feedback"></div> 
                                    </div> 
                                  </div>
                                  <button type="submit" class="btn btn-danger">XÓA</button>
                                </form>
                              </div>
                            </div>
                          </div>
                            <?php
                            }
                            ?>


                          <div class="offcanvas offcanvas-end" id="offcanvas_new_category" tabindex="-1" aria-labelledby="offcanvas_new_category_abel">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                            
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                             
                              <div class="mt-3">
                                <form method="POST" class="ajax_form" action="/admin/categories/">
                                  @csrf
                                  <h6>Thêm chuyên mục mới</h6>
                                  <div class="col-sm-12 col-md-12" style="margin-bottom: 20px;"> 
                                    <div class="form-floating " >
                                        <input  class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tên chuyên mục" value="">
                                        <label for="create-boardwizard-name">Tên chuyên mục</label>
                                      <div class="invalid-feedback"></div> 
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Thêm chuyên mục</button>
                                </form>
                              </div>
                            </div>
                          </div>
                </div>


                <div class=" shadow-none border " data-component-card="data-component-card" style="margin-top:20px; background-color: white;">
                  
                  <div class="card-body p-0" style="padding-bottom:10px">
                    
                  <div class="card-header p-4 border-bottom bg-body d-flex flex-wrap p-4">
                              <h5 class="mb-0 text-body-highlight me-2">Thẻ</h5>
                              <a class="fw-bold fs-9" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_new_tag" >thêm thẻ</a>
                            </div>
                            <div class="p-2">
                   <table class="table table-striped table-sm fs-9 mb-0 p-2">
                            <thead>
                              <tr>
                                <th class="sort border-translucent ps-3" data-sort="name">Tên</th>
                                <th class="sort " data-sort="email">Bài viết</th>
                                <th class="sort text-end align-middle pe-0 " scope="col">tác vụ</th>
                              </tr>
                            </thead>
                            <tbody class="list">

                            <?php
                            foreach ($tags as $tag)
                            {
                            ?>
                              <tr>
                                <td class="align-middle ps-3 name">{{$tag->name}}</td>
                                <td class="align-middle email">{{$tag->posts_count}}</td>
                                <td class="align-middle white-space-nowrap text-end pe-0">
                                  <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                      <span class="fas fa-ellipsis-h fs-10"></span> </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2" style="">
                                      <a class="dropdown-item"  data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit_tag_{{$tag->id}}">Thay đổi</a>
                                
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item text-danger" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_delete_tag_{{$tag->id}}">Xóa</a>
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
                   
                  </div>



                  <!-- Offcanvas edit tags -->
                           <?php
                            foreach ($tags as $tag)
                            {
                            ?>
                              <div class="offcanvas offcanvas-end" id="offcanvas_edit_tag_{{$tag->id}}" tabindex="-1" aria-labelledby="offcanvas_new_category_abel">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                            
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                             
                              <div class="mt-3">
                                <form method="POST" class="ajax_form" action="/admin/tags/{{$tag->id}}">
                                  @csrf
                                  @method('PUT')
                                  <h6>Cập nhật thẻ </h6>
                                  <div class="col-sm-12 col-md-12" style="margin-bottom: 20px;"> 
                                    <div class="form-floating " >
                                        <input  class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tên chuyên mục" value="{{$tag->name}}">
                                        <label for="create-boardwizard-name">Tên thẻ</label>
                                      <div class="invalid-feedback"></div> 
                                    </div> 
                                  </div>
                                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </form>
                              </div>
                            </div>
                          </div>
                            <?php
                            }
                            ?>

                            <!-- Offcanvas delete category -->
                           <?php
                            foreach ($tags as $tag)
                            {
                            ?>
                              <div class="offcanvas offcanvas-end" id="offcanvas_delete_tag_{{$tag->id}}" tabindex="-1" aria-labelledby="offcanvas_new_category_abel">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                            
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                             
                              <div class="mt-3">
                                <form method="POST" class="ajax_form" action="/admin/tags/{{$tag->id}}">
                                  @csrf
                                  @method('DELETE')
                                  <h6>Xóa chuyên mục {{$tag->name}}?</h6>
                                  <div class="col-sm-12 col-md-12" style="margin-bottom: 20px;"> 
                                    <div class="form-floating " >
                                        <input disabled  class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tên chuyên mục" value="{{$tag->name}}">
                                        <label for="create-boardwizard-name">Tên chuyên mục</label>
                                      <div class="invalid-feedback"></div> 
                                    </div> 
                                  </div>
                                  <button type="submit" class="btn btn-danger">XÓA</button>
                                </form>
                              </div>
                            </div>
                          </div>
                            <?php
                            }
                            ?>



                  <div class="offcanvas offcanvas-end" id="offcanvas_new_tag" tabindex="-1" aria-labelledby="offcanvas_new_tag_abel">
                           <div class="offcanvas-body " style="padding-top: 100px;" >
                            
                            </div>
                            <div class="offcanvas-body bottom" style="position: absolute;bottom: 0;width: 100%;">
                             
                              <div class="mt-3">
                                <form method="POST" class="ajax_form" action="/admin/tags/"> 
                                  @csrf
                                  <h6>Thêm thẻ</h6>
                                  <div class="col-sm-12 col-md-12" style="margin-bottom: 20px;"> 
                                    <div class="form-floating " >
                                        <input  class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tên chuyên mục" value="">
                                        <label for="create-boardwizard-name">Tên thẻ</label>
                                      <div class="invalid-feedback"></div> 
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Thêm thẻ</button>
                                </form>
                              </div>
                            </div>
                          </div>


                </div>

  
               
                
             












    </div>
</div>
</div>
@endsection

@section('js')
<script type="text/javascript">

$(".ajax_form").on("submit", function (e) {
    e.preventDefault();        // stop full page reload

    var formData = new FormData(this);
    $(".invalid-feedback").html('');
    $("input").removeClass("is-invalid");
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (res) {
            window.location.href = "/admin/posts";
        },

        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(field, msgs) {
                    $("[name='" + field + "']").addClass("is-invalid");
                    $("[name='" + field + "']").siblings(".invalid-feedback").html(msgs);
                });

            }
        }
    });
});

function loadPosts(url, pushState) {
    var $products = $('#products');
    $products.css('opacity', 0.5);

    $.ajax({
        url: url,
        type: "GET",
        success: function (html) {
            $products.html(html);
            if (pushState) {
                history.pushState({ postsUrl: url }, '', url);
            }
        },
        complete: function () {
            $products.css('opacity', 1);
        }
    });
}

// Filter dropdowns and pagination links, both rendered server-side inside #products.
$(document).on('click', '#products a[href]:not([target])', function (e) {
    e.preventDefault();
    loadPosts($(this).attr('href'), true);
});

window.addEventListener('popstate', function () {
    loadPosts(location.href, false);
});

// Live search: debounce keystrokes, merge with whatever filters are already in the URL.
var searchTimer = null;
$(document).on('submit', '#products .search-box form', function (e) {
    e.preventDefault();
});
$(document).on('input', '#products .search-input', function () {
    var value = $(this).val();
    clearTimeout(searchTimer);
    searchTimer = setTimeout(function () {
        var url = new URL(location.href);
        if (value) {
            url.searchParams.set('q', value);
        } else {
            url.searchParams.delete('q');
        }
        url.searchParams.delete('page');
        loadPosts(url.toString(), true);
    }, 350);
});

// Publish / unpublish toggle in the list.
$(document).on('change', '.js-toggle-publish', function () {
    var $toggle = $(this);
    var url = $toggle.data('url');

    $.ajax({
        url: url,
        type: "POST",
        data: { _token: $('meta[name="csrf-token"]').attr('content'), _method: 'PATCH' },
        success: function (res) {
            var $badge = $toggle.closest('td').find('.js-publish-badge');
            if (res.is_published) {
                $badge.removeClass('badge-phoenix-secondary').addClass('badge-phoenix-success').text('Đã đăng');
            } else {
                $badge.removeClass('badge-phoenix-success').addClass('badge-phoenix-secondary').text('Bản nháp');
            }
        },
        error: function () {
            $toggle.prop('checked', !$toggle.prop('checked'));
        }
    });
});

// Bulk selection bar.
function updateBulkBar() {
    var count = $('#products .js-row-select:checked').length;
    $('#products .js-bulk-bar').toggleClass('d-none', count === 0);
    $('#products .js-bulk-count').text(count);
}

$(document).on('change', '#checkbox-bulk-customers-select', function () {
    $('#products .js-row-select').prop('checked', $(this).prop('checked'));
    updateBulkBar();
});

$(document).on('change', '.js-row-select', function () {
    if (!$(this).prop('checked')) {
        $('#checkbox-bulk-customers-select').prop('checked', false);
    }
    updateBulkBar();
});

$(document).on('click', '.js-clear-selection', function () {
    $('#products .js-row-select, #checkbox-bulk-customers-select').prop('checked', false);
    updateBulkBar();
});

// Shared delete dialog: used for a single post row and for the bulk-selection bar.
var deleteOffcanvasEl = document.getElementById('offcanvas_delete_post');
var deleteOffcanvas = deleteOffcanvasEl ? new bootstrap.Offcanvas(deleteOffcanvasEl) : null;

$(document).on('click', '.js-delete-post', function () {
    var id = $(this).data('id');
    var title = $(this).data('title');

    $('#delete_post_message').text('Xóa bài viết "' + title + '"?');
    $('#delete_post_form').attr('action', '/admin/posts/' + id);
    $('#delete_post_method').prop('disabled', false).val('DELETE');
    $('#delete_post_ids').empty();

    if (deleteOffcanvas) deleteOffcanvas.show();
});

$(document).on('click', '.js-bulk-delete', function () {
    var ids = $('#products .js-row-select:checked').map(function () {
        return $(this).val();
    }).get();

    if (!ids.length) return;

    $('#delete_post_message').text('Xóa ' + ids.length + ' bài viết đã chọn?');
    $('#delete_post_form').attr('action', '/admin/posts/bulk-delete');
    $('#delete_post_method').prop('disabled', true);

    var $ids = $('#delete_post_ids').empty();
    ids.forEach(function (id) {
        $ids.append($('<input type="hidden" name="ids[]">').val(id));
    });

    if (deleteOffcanvas) deleteOffcanvas.show();
});

$(document).on('submit', '.ajax_delete_form', function (e) {
    e.preventDefault();

    var $form = $(this);
    var formData = new FormData(this);

    $.ajax({
        url: $form.attr("action"),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function () {
            if (deleteOffcanvas) deleteOffcanvas.hide();
            loadPosts(location.href, false);
        }
    });
});

</script>
@endsection