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
$(document).on('click', '#products a[href]:not([target]):not(.js-no-ajax-nav)', function (e) {
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