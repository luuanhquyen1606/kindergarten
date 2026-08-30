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

            <?php for ($i=0; $i<=$per_page;$i++) { 
              ?> 
              
                    <a style="cursor: pointer;"  data-bs-toggle="offcanvas" data-bs-target="#offcanvas_{{$i}}"  class="files col-6 col-sm-6 col-md-4 col-xl-2 hidden " id="file_{{$i}}"  >
                        
                        <div class="hoverbox img-zoom-hover rounded-2">
                            <img  srcset="" style="aspect-ratio:1 / 1;object-fit: cover;" class="src img-fluid" src="" alt="" />
                            <div class="hoverbox-content flex-center flex-column">
                            <h4  class="name text-white"></h4>
                            </div>
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

        <?php for ($i=0; $i<=48;$i++) { 
              ?> 
              
                    


              <div class="offcanvas offcanvas-end" style="width:60% !important" id="offcanvas_{{$i}}" tabindex="-1" aria-labelledby="offcanvas_label">
                               <div class="offcanvas-body "  >  
                                
                                <div style="margin-bottom: 10px;" class="overflow-hidden rounded">

                                    <img style="width: 100%;" src="" />
                                    <video class="video" id="video_{{$i}}" class="video" style="display: none; " height="600" controls>
                                        <source class="video_source" src="/files/1/1779874547_2025-04-05-114749727.mp4" type="video/mp4">
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
                                <div class="offcanvas-body">
                                
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


var uploadedFiles =[];
$('#feature_file_browser').on('change', function() {
    var files = this.files;
    if (files.length === 0) return;

    var formData = new FormData();
    uploadedFiles=[];
    for (let i = 0; i < files.length; i++) {
        uploadSingleFile(files[i], function(response) {
            uploadDone(files.length,i);
        });
    }

});

function uploadDone(all,uploaded){
uploadedFiles.push(uploaded);
    if(all == uploadedFiles.length){
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
            callback(response);   // return here
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
        $('.files').addClass("hidden");
        let files = response.files.data;
        $.each(files, function(index, file) {
            $('#file_'+index+' img').attr('src', file.path);
            $('#file_'+index+' img').attr('srcset', file.srcset);
            $('#file_'+index+' .name').html(file.original_name);
            // preview media
            $('#offcanvas_'+index+' .name').html(file.original_name); 
            $('#offcanvas_'+index+' img').attr('src', file.path);
            $('#offcanvas_'+index+' img').attr('srcset', file.srcset);
            $('#offcanvas_'+index+' .copy_btn').attr('data-url', "{{ url('/') }}"+file.path);
            $('#offcanvas_'+index+' .input_url').val("{{ url('/') }}"+file.path); 
            $('#file_'+index).removeClass("hidden");
            if (file.mime_type.includes("video")) { 
                $('#offcanvas_'+index+' .video_source').attr('src', "{{ url('/') }}"+file.path);
                $('#offcanvas_'+index+' img').hide();
                $('#offcanvas_'+index+' video').show(); 
                $('#offcanvas_'+index+' video')[0].load();
                $('.video').on('play', function() {
                    $('.video').not(this).each(function() {
                        this.pause();
                    });
                });
            }
        });
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