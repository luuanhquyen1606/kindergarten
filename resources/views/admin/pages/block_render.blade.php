<div class="card " style="margin-bottom:10px !important" >

                    <div class="card-body p-0">

                        <div class="p-2">



                            <div class="row align-items-end justify-content-between g-3">
                                    <div class="col-auto">
                                        <h6>Tên khối: {{$block->name}}</h6>
                                        <span>Khối: {{$block->block_name}}</span>  
                                        
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        <div class="row g-2 gy-3">
                                        <div class="col-auto flex-1">
                                            
                                           <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
                                                <li style="padding-top:8px;">
                                                        <div class="form-check form-switch">
                                                        <p data-bs-toggle="offcanvas"  aria-controls="offcanvasRight" data-bs-target="#offcanvasDelete_{{$block->id}}" class="mb-0 ps-3 text-danger fw-bold fs-9" style="cursor: pointer;">xóa?</p>
                                                        </div>
                                                </li>
                                                <li style="padding-top:8px;">
                                                        <div class="form-check form-switch">
                                                        <input <?php echo $block->show ? 'checked' : '' ?> name="page_block_show_checkbox" data-id="<?php echo $block->id ?>" class="page-block-show form-check-input" id="flexSwitchCheckDefault-<?php echo $block->id ?>" type="checkbox" />
                                                        <label class="form-check-label" for="flexSwitchCheckDefault-<?php echo $block->id ?>">Hiển thị</label>
                                                        </div>
                                                </li>
                                                <li style="padding-top:8px;">
                                                    <button data-bs-toggle="tooltip" data-bs-title="Xuống"  class="parent down btn btn-link text-body-quaternary p-0 me-2">
                                                    <span class="text" data-feather="arrow-down" style="height: 15px; width: 15px;"></span>
                                                     </button>
                                                 </li>
                                                 <li style="padding-top:8px;">
                                                <button data-bs-toggle="tooltip" data-bs-title="Lên"  class="parent up btn btn-link text-body-quaternary p-0 me-2">
                                                    <span class="text" data-feather="arrow-up" style="height: 15px; width: 15px;"></span>
                                                </button>
                                                </li>
                                                
                                                <li class="nav-item" role="presentation"><a class="nav-link active" id="show-tab-<?php echo $block->id?>" data-bs-toggle="tab" href="#tab-show-<?php echo $block->id?>" role="tab" aria-controls="tab-show-<?php echo $block->id?>" aria-selected="true">
                                                    <span class="text" data-feather="monitor" ></span> Hiển thị</a>
                                                </li>
                                                <li class="nav-item" role="presentation"><a class="nav-link" id="config-tab" data-bs-toggle="tab" href="#tab-config-<?php echo $block->id?>" role="tab" aria-controls="tab-config-<?php echo $block->id?>" aria-selected="false" tabindex="-1">
                                                    <span class="text" data-feather="settings" ></span> Thiết lập</a>
                                                </li>
                                            </ul> 
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>





                            
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade active show" id="tab-show-<?php echo $block->id?>" role="tabpanel" aria-labelledby="show-tab-<?php echo $block->id?>">
                                    <iframe id="block_iframe_<?php echo $block->id;?>" class="iframe_block_view" src="/block_view/<?php echo $block->id;?>" style=" width: 100%;border: none;overflow: hidden;display: block;overflow-x:hidden"></iframe>

                                </div>
                                <div class="tab-pane fade" id="tab-config-<?php echo $block->id?>" role="tabpanel" aria-labelledby="config-tab-<?php echo $block->id?>">
                

                                 @include("admin.pages.block_forms.$block->block_code", ['block' => $block])

                                </div>
                            </div>
                        </div>
                    </div>





                </div>

                <div class="offcanvas offcanvas-end" id="offcanvasDelete_{{$block->id}}" tabindex="-1" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Xóa khối</h5>
  
    <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
              <form action="/admin/page_blocks/{{$block->id}}" class="mb-9" method="POST" >
              @csrf
              @method('DELETE')            
                <div class="col-sm-12 col-md-12" style="margin-bottom: 10px; display: none;"> 
                <div class="form-floating " >
                    <input  class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Tiêu đề bài viết" value="">
                    <label for="create-boardwizard-name">Tên khối</label>
                   <div class="invalid-feedback"></div> 
                </div>
                <hr class="bg-body-secondary mb-6 mt-4">
              </div>
              </div>
               
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px; padding:10px"> 
                 <input type="hidden" name="redirect_url"  value="/admin/pages/{{$block->page_id}}/edit">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                                  <button type="submit" class="btn btn-danger">Xóa khối này?</button>
                </div>


</form>
  </div>