 <style>

    .files.selected img{
        border: 2px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        border-color: #007bff;
    }
 </style>
 
 <div class="modal fade" id="mediaBrowserModal" tabindex="-1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-xl" >
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ảnh/Video</h5><button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                       
                       <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 col-xl-4 mt-3">
                          <label class="btn btn-primary me-4 w-100" for="feature_file_browser_2"><span class="fas fa-plus me-2"></span>Add New</label>
                          <input class="d-none"  id="feature_file_browser_2" type="file" multiple />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-xl-6 mt-3">
                          <div class="input-group mb-3">
                          <input class="form-control" type="text" placeholder="tên ảnh/video" aria-label="" aria-describedby="basic-addon2">
                          <span class="input-group-text" id="basic-addon2">tìm</span>
                          </div>
                        </div>
                       </div>
                       <div class="row g-3" > 

                       
                       <?php for ($i=0; $i<=48;$i++) { 
                        ?> 
                                <a style="cursor: pointer;" class="files col-6 col-sm-6 col-md-4 col-xl-2 hidden " id="file_{{$i}}" data-photo-id=""> 
                                    <div class="hoverbox img-zoom-hover rounded-2"> 
                                        <img  for="input_{{$i}}"  srcset="" style="aspect-ratio:1 / 1;object-fit: cover;" class="src img-fluid" src="" alt="" />
                                        <div class="hoverbox-content flex-center flex-column"> 
                                        <lable  class="name text-white"></lable>
                                        </div>
                                    </div>
                                </a>
                        <?php }
                        ?>
                       
  </div>


         
<div style="padding: 10px;" data-list="" class="mb-9 card center col-auto d-flex">
                  <ul id="pagination" class="mb-0 pagination">
                  </ul>
</div> 




                          </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="button">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </div>
                        </div>
                      </div>
                    

 


<script type="text/javascript">

var type="single";
var uploadedFiles =[];
$('#feature_file_browser_2').on('change', function() {
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


window.type='single';
window.media_input_id = '';
$(".media-browser-input").on('click', function() {
    window.type="single";
    window.media_input_id = $(this).attr('id');
    $('#mediaBrowserModal').modal('show');
    loadFiles();
});
window.data_input_class='';
$(".multiple-media-browser-input").on('click', function() {
    window.type="multiple";
    window.data_input_class = $(this).attr('data-input-class');
    loadSelectedFiles();
    $('#mediaBrowserModal').modal('show');
    loadFiles();
});

   
$('.multiple-media-browser-input').each(function(index) {
    var inputClass = $(this).attr('data-input-class');
    $("."+$(this).attr('data-input-class')+' .delete_selected_file').on('click', function() {
        window.type="multiple";
        window.data_input_class = inputClass;
        loadSelectedFiles();
        var img_id = $(this).parent().parent().find('.photo_input').val();
        
        $(this).parent().parent().find('.photo_delete').val(img_id);
        $(this).parent().parent().parent().addClass("deleted");    
        //window.selected_files = window.selected_files.filter(item => item.id !== img_id);
        renderPreviewFiles();
    });
});
function renderPreviewFiles(){
     $('.'+window.data_input_class+" img").attr('src', '');
     $('.'+window.data_input_class+" .photo_input").val('');   
     $('.'+window.data_input_class).hide();
  
     $.each(window.selected_files, function(index, file) {
                      console.log(file);
                      console.log(window.data_input_class);
                      $('.'+window.data_input_class).eq(index).find('img').attr('src', file.src);
                      $('.'+window.data_input_class).eq(index).find('.photo_input').val(file.id);
                      $('.'+window.data_input_class).eq(index).show();
     });
}
window.selected_files = [];
$(".files").on('click', function () {
    if(window.type == 'single'){
        
    var img_src=$(this).find('img').attr('src');
    var img_id=$(this).attr('data-photo-id');
    $("#"+media_input_id).val(img_id).trigger('change');
    $('[preview-input-id="'+media_input_id+'"]').attr('src',img_src);
    $('.modal').modal('hide');
                    }
                    else{


                         var img_src=$(this).find('img').attr('src');
                         var img_id=$(this).attr('data-photo-id');

                         if ($(this).hasClass('selected')) {
                                window.selected_files = window.selected_files.filter(item => item.id !== img_id);
                                $(this).removeClass("selected");
                                deleteFiles.push(img_id);
                        }
                        else {
                               if (!window.selected_files.some(item => item.id === img_id)) {
                                window.selected_files.push({id:img_id,src:img_src});
                                $(this).addClass("selected");
                                }
                         }
                         
                         
                         
                         
                         renderSelectedFiles();
                    }
});
function renderSelectedFiles(){
     $('.'+window.data_input_class+" img").attr('src', '');
     $('.'+window.data_input_class+" photo_input").val('');   
     $('.'+window.data_input_class).hide();
     $.each(window.selected_files, function(index, file) {
                      console.log(file);
                      console.log(window.data_input_class);
                      $('.'+window.data_input_class).eq(index).find('img').attr('src', file.src);
                       $('.'+window.data_input_class).eq(index).find('.photo_input').val(file.id);
                      $('.'+window.data_input_class).eq(index).show();
     });
}

function loadSelectedFiles(){
     window.selected_files = [];
    $('.'+window.data_input_class).each(function(index, element) {
        var img = $(element).find('img').attr('src');
        if(img){
            var id = $(element).find('.photo_input').val();
            window.selected_files.push({id:id,src:img}); 
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
            $('#file_'+index).attr('data-photo-id', file.id);
            $('#file_'+index+' img').attr('srcset', file.srcset);
            $('#file_'+index+' .name').html(file.original_name);
            $('#file_'+index+' img').attr('src', file.path);
            
              
            if(window.type == 'single'){
                 $('#file_'+index+" .form-check-input").hide().prop('checked', false);
            }
            else{
                console.log("checking "+file.id);
                console.log(window.selected_files);
                        if (window.selected_files.some(item => item.id == file.id)) {
                            $('#file_'+index).addClass("selected");
                         }
                         else{
                            $('#file_'+index).removeClass("selected"); 
                         }
                        
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
















     

      </script>