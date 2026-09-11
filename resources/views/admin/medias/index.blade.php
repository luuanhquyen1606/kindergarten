@extends('admin.layouts.app')
@section('content')

<style>

.custom-modal{
    max-width: 80vw; /* 80% of viewport width */ 
}
.custom-modal-content{
   height: 90vh; 
}

.modal-image{
    width: 100%;
    height: 100%;
    object-fit: contain; /* keeps aspect ratio */
}
.modal-body{
    height: 100%;
    padding: 0;
}

.delete-media-btn{
    position: absolute;
    top: 6px;
    right: 6px;
    z-index: 2;
    opacity: 0;
    transition: opacity .15s ease-in-out;
}
.hoverbox:hover .delete-media-btn,
.hoverbox:focus-within .delete-media-btn{
    opacity: 1;
}

</style>

<div class="mb-9">
          <h2 class="mb-5">Medias</h2>
          <div class="d-flex flex-wrap gap-3 justify-content-between">
            <div>
                <label class="btn btn-primary me-4" for="feature_file_browser"><span class="fas fa-plus me-2"></span>Add New</label>
            </div>
            <div class="search-box">
              <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div>
          </div>
          <div class="d-md-flex d-lg-block d-xl-flex justify-content-between gap-4 my-4">
            <div class="scrollbar">
              <ul class="nav nav-underline gap-md-5" data-filter-nav="data-filter-nav" style="min-width: 400px">
                <li class="nav-item"><a class="nav-link cursor-pointer active" data-filter="*">All</a></li>
              </ul>
            </div>
          </div>
          <div class="row g-3" > 

            <?php for ($i=0; $i<$per_page;$i++) {
              ?> 
              
                    <a style="cursor: pointer;" href="" class="files col-6 col-sm-6 col-md-4 col-xl-2 hidden " id="file_{{$i}}"  >
                        
                        <div class="hoverbox img-zoom-hover rounded-2">
                            <img  srcset="" style="aspect-ratio:1 / 1;object-fit: cover;" class="src img-fluid" src="" alt="" />
                            <div class="hoverbox-content flex-center flex-column">
                            <h4  class="name text-white"></h4>
                            </div>
                            <button type="button" class="delete-media-btn btn btn-sm btn-outline-danger" data-id="" title="Delete"><span class="fas fa-trash"></span></button>
                        </div>
                    </a>

<?php }
            ?>
            </div>

</div>

<div style="padding: 10px;" data-list="" class="mb-9 card center col-auto d-flex">
                  <ul id="pagination" class="mb-0 pagination">
                  </ul>
</div> 

<input class="d-none"  id="feature_file_browser" type="file" multiple />

        <?php for ($i=0; $i<$per_page;$i++) {
              ?> 

<div class="offcanvas offcanvas-end" style="width:60% !important" id="offcanvas_{{$i}}" tabindex="-1" aria-labelledby="offcanvas_label">
                               <div class="offcanvas-body "  >  
                                
                                <div style="margin-bottom: 10px;" class="overflow-hidden rounded">

                                    <img style="width: 100%;" src="" />
                                    <video class="video" id="video_{{$i}}" class="video" style="display: none; " height="600" controls>
                                        <source class="video_source" src="" type="video/mp4">
                                    </video>
                                </div> 
                                <div class="col-12 col-sm-12">

<h5 class="name"></h5>
                                        <div class="input-group mb-3">
                                            <input class="input_url form-control" type="text" disabled placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <button data-url="" class="copy_btn input-group-text" id="basic-addon2">copy</button>
                                        </div> 
                                   
                                </div>
                            </div>
                            </div>

<?php }
            ?>

@endsection

@section('js')
<script>

$('.copy_btn').on('click', function() {
    const text =$(this).attr('data-url');
    let sthis = $(this);
    navigator.clipboard.writeText(text)
        .then(() => {
            sthis.html("copied");
        })
        .catch(err => {
          
        });
});

var uploadedFiles = [];
var currentPage = 1;

// One instance, reused for the life of the page - reload() picks up hrefs
// that change after AJAX pagination/upload without rebinding click handlers.
var mediaLightbox = GLightbox({ selector: '.files' });

// Bound once on the static (per-slot) buttons rather than delegated through
// document, so stopPropagation() below actually runs before the click bubbles
// up to the parent .files anchor and reaches GLightbox's own listener on it.
$('.delete-media-btn').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();

    if (!confirm('Delete this file?')) return;

    var id = $(this).attr('data-id');
    if (!id) return;

    $.ajax({
        url: '{{ url('/admin/medias') }}/' + id,
        type: 'POST',
        data: { _token: '{{ csrf_token() }}', _method: 'DELETE' },
        success: function() {
            loadFiles(currentPage);
        },
        error: function() {
            alert('Could not delete this file.');
        }
    });
});

// Pause any other playing video when one starts - bound once, not per file/render.
$(document).on('play', '.video', function() {
    $('.video').not(this).each(function() {
        this.pause();
    });
});

$('#feature_file_browser').on('change', function() {
    var files = this.files;
    if (files.length === 0) return;

    uploadedFiles = [];
    for (let i = 0; i < files.length; i++) {
        uploadSingleFile(files[i], function(response) {
            uploadDone(files.length, i);
        });
    }

    // allow re-selecting the same file(s) again
    this.value = '';
});

function uploadDone(all, uploaded) {
    uploadedFiles.push(uploaded);
    if (all == uploadedFiles.length) {
        loadFiles(1);
    }
}

function uploadSingleFile(file, callback) {
    let formData = new FormData();
    formData.append('file', file);

    $.ajax({
        url: '/admin/upload',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            callback(response);
        }
    });
}

function loadFiles(page = 1)
{
$.ajax({
    url: '/admin/medias?page='+page,
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        let files = response.files.data;

        // Deleting the last item on the last page can leave this page empty
        // once re-paginated - fall back to the previous page instead of
        // rendering a blank grid.
        if (files.length === 0 && page > 1) {
            loadFiles(page - 1);
            return;
        }

        $('.files').addClass("hidden");
        $.each(files, function(index, file) {
            let $file = $('#file_'+index);

            $file.find('img').attr('src', file.thumbnailUrl);
            $file.find('.name').text(file.original_name);
            $file.find('.delete-media-btn').attr('data-id', file.id);
            $file.attr('href', file.thumbnailUrl);
            $file.removeClass("hidden");
        });
        mediaLightbox.reload();
        currentPage = response.files.current_page;
        buildPagination(response.files);
    },
    error: function(xhr, status, error) {
        console.log(error);
    }
});
}

function buildPagination(files)
{
    let pagination = '';

    let current = files.current_page;
    let last = files.last_page;

    let start = Math.max(1, current - 5);
    let end = Math.min(last, current + 5);
 
    // Previous
    if (current > 1)
    {
        pagination += `
            <li>
                <a href="#" class="page-link" data-page="${current - 1}">
                    Previous
                </a>
            </li>
        `;
    }

    // Always show first page if outside range
    if (start > 1)
    {
        pagination += `
            <li>
                <a href="#" class="page-link" data-page="1">1</a>
            </li>
        `;

        if (start > 2)
        {
            pagination += `<li><span>...</span></li>`;
        }
    }

    // Current range (5 before + current + 5 after)
    for(let i = start; i <= end; i++)
    {
        let active = (i === current) ? 'active' : '';

        pagination += `
            <li class="${active}">
                <a href="#" class="page-link" data-page="${i}">
                    ${i}
                </a>
            </li>
        `;
    }

    // Always show last page if outside range
    if (end < last)
    {
        if (end < last - 1)
        {
            pagination += `<li><span>...</span></li>`;
        }

        pagination += `
            <li>
                <a href="#" class="page-link" data-page="${last}">
                    ${last}
                </a>
            </li>
        `;
    }

    // Next 
    if (current < last)
    {
        pagination += `
            <li>
                <a href="#" class="page-link" data-page="${current + 1}">
                    Next
                </a>
            </li>
        `;
    }

    $('#pagination').html(pagination);
}

// Click event (works for dynamically added links)
$(document).on('click', '.page-link', function(e) {
    e.preventDefault();

    let page = $(this).data('page');

    loadFiles(page);
});

// Initial load
loadFiles();

</script>
@endsection 