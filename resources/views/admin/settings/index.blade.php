@extends('admin.layouts.app')
@section('content')
<div class="pb-9">
          <div class="row g-5">
            <div class="col-12 col-xl-9">
            



            <div class="col-sm-12 col-md-12"> 
                <div class="form-floating">
                    
                  
                        <div class="card mt-5">
                          
                          <div class="card-body pt-0">
                            <div class="myfiles-action-bar mx-n4 mb-4">
                              <h6 class="mb-0 text-body-tertiary" id="file-manager-replace-element">Thông tin nhà trường</h6>
                              <a id="file_browser" class="btn btn-phoenix-secondary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" >
                                
                                <span class="uil-setting"></span> Thay đổi 
                              </a>
                              
                              <script type="text/javascript">
                                
                              </script>
                            </div>
                            <div class="row gx-xxl-9" id="bulk-select-body">
                              
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Tên trường</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->name}}</h6></div>
                             </div>
                             <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Khẩu hiệu nhà trường</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->slogan}}</h6></div>
                            </div>
                             <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Địa chỉ nhà trường</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->address}}</h6></div>
                            </div>
                            <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Email nhà trường</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->email}}</h6></div>
                            </div>
                            <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Điện thoại nhà trường</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->phone}}</h6></div>
                            </div>
                             
                             <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Hiệu trưởng</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->principal_name}} | {{$school->principal_email}}| {{$school->principal_phone}}</h6></div>
                            </div>
                           
                           
                            

                            </div>
                          </div>
                        </div>


                </div>
              </div>

              <div class="offcanvas offcanvas-end" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Cập nhật thông tin nhà trường</h5>
                    <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                <div class="offcanvas-body">
                   <form class="ajax_form" action="/admin/settings/{{$school->id}}" class="mb-9" method="PUT" >
                                @csrf
                                @method('PUT')
                                <label>Thông tin nhà trường:</label>
                <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->name}}" name="name" id="name_input" type="text" placeholder="Project title">
                  <label for="name_input">Tên trường</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->slogan}}" name="slogan" id="slogan_input" type="text" placeholder="Project title">
                  <label for="slogan_input">Khẩu hiệu nhà trường</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->address}}" name="address" id="address_input" type="text" placeholder="Project title">
                  <label for="name_input">Địa chỉ</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->email}}" name="email" id="email_input" type="text" placeholder="Project title">
                  <label for="email_input">Email</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->phone}}" name="phone" id="phone_input" type="text" placeholder="Project title">
                  <label for="name_input">Điện thoại</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>

              <hr>
              <label>Thông tin hiệu trưởng:</label>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->principal_name}}" name="principal_name" id="principal_name_input" type="text" placeholder="Project title">
                  <label for="name_input">Tên thầy cô hiệu trưởng</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->principal_email}}" name="principal_email" id="principal_email_input" type="text" placeholder="Project title">
                  <label for="name_input">Email hiệu trưởng</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->principal_phone}}" name="principal_phone" id="principal_phone_input" type="text" placeholder="Project title">
                  <label for="name_input">Điện thoại</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>



              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px; padding:10px"> 
                <input type="hidden" name="redirect_url"  value="/admin/settings">
                <button  style="margin-bottom:10px !important; width:100%" class="btn btn-primary rounded-pill me-1 mb-1" type="submit">
                <span class="fas fas fa-plus" data-fa-transform="shrink-3"></span>Cập nhật</button>
                </div>

                  </form>
                </div>
              </div>









            <div class="col-sm-12 col-md-12"> 
                <div class="form-floating">
                    
                  
                        <div class="card mt-5">
                          
                          <div class="card-body pt-0">
                            <div class="myfiles-action-bar mx-n4 mb-4">
                              <h6 class="mb-0 text-body-tertiary" id="file-manager-replace-element">Mạng xã hội</h6>
                              <a id="file_browser" class="btn btn-phoenix-secondary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" >
                                
                                <span class="uil-setting"></span> Thay đổi 
                              </a>
                              
                              <script type="text/javascript">
                                
                              </script>
                            </div>
                            <div class="row gx-xxl-9" id="bulk-select-body">
                              
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Facebook</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->name}}</h6></div>
                             </div>
                             <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Youtube</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->slogan}}</h6></div>
                            </div>
                             <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Địa chỉ nhà trường</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->address}}</h6></div>
                            </div>
                            <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Email nhà trường</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->email}}</h6></div>
                            </div>
                            <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Điện thoại nhà trường</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->phone}}</h6></div>
                            </div>
                             
                             <hr class="my-2">
                             <div class="row ">
                              <div class="col-3"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">Hiệu trưởng</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">:</h6></div>
                              <div class="col-auto"><h6 class="mb-0 fw-semibold fs-9 text-body-tertiary">{{$school->principal_name}} | {{$school->principal_email}}| {{$school->principal_phone}}</h6></div>
                            </div>
                           
                           
                            

                            </div>
                          </div>
                        </div>


                </div>
              </div>

              <div class="offcanvas offcanvas-end" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Cập nhật thông tin nhà trường</h5>
                    <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                <div class="offcanvas-body">
                   <form class="ajax_form" action="/admin/settings/{{$school->id}}" class="mb-9" method="PUT" >
                                @csrf
                                @method('PUT')
                                <label>Thông tin nhà trường:</label>
                <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->name}}" name="name" id="name_input" type="text" placeholder="Project title">
                  <label for="name_input">Tên trường</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->slogan}}" name="slogan" id="slogan_input" type="text" placeholder="Project title">
                  <label for="slogan_input">Khẩu hiệu nhà trường</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>

              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->address}}" name="address" id="address_input" type="text" placeholder="Project title">
                  <label for="name_input">Địa chỉ</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->email}}" name="email" id="email_input" type="text" placeholder="Project title">
                  <label for="email_input">Email</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->phone}}" name="phone" id="phone_input" type="text" placeholder="Project title">
                  <label for="name_input">Điện thoại</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>

              <hr>
              <label>Thông tin hiệu trưởng:</label>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->principal_name}}" name="principal_name" id="principal_name_input" type="text" placeholder="Project title">
                  <label for="name_input">Tên thầy cô hiệu trưởng</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->principal_email}}" name="principal_email" id="principal_email_input" type="text" placeholder="Project title">
                  <label for="name_input">Email hiệu trưởng</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <input class="form-control" value="{{$school->principal_phone}}" name="principal_phone" id="principal_phone_input" type="text" placeholder="Project title">
                  <label for="name_input">Điện thoại</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>



              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px; padding:10px"> 
                <input type="hidden" name="redirect_url"  value="/admin/settings">
                <button  style="margin-bottom:10px !important; width:100%" class="btn btn-primary rounded-pill me-1 mb-1" type="submit">
                <span class="fas fas fa-plus" data-fa-transform="shrink-3"></span>Cập nhật</button>
                </div>

                  </form>
                </div>
              </div>
















              <div class="col-sm-12 col-md-12"> 
                <div class="form-floating">
                    
                  
                        <div class="card mt-5">
                          
                          <div class="card-body pt-0">
                            <div class="myfiles-action-bar mx-n4 mb-4">
                              <h6 class="mb-0 text-body-tertiary" id="file-manager-replace-element">Bản đồ</h6>
                              <a id="file_browser" class="btn btn-phoenix-secondary" data-bs-toggle="offcanvas" data-bs-target="#map_canvas" aria-controls="offcanvasRight">
                                
                                <span class="uil-setting"></span> Thay đổi 
                              </a>
                              
                             
                            </div>
                            <div class="row gx-xxl-9" id="bulk-select-body">
                              
                         {!! $school->map_embed !!}
                            </div>
                          </div>
                        </div>


                </div>
              </div>




<div class="offcanvas offcanvas-end" id="map_canvas" tabindex="-1" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Bản đồ nhúng</h5>
                    <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                <div class="offcanvas-body">
                   <form class="ajax_form" action="/admin/settings/{{$school->id}}" class="mb-9" method="POST" >
                                @csrf
                                @method('PUT')
                                <label>Bản đồ</label>
               
              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px;"> 
                 <div class="form-floating">
                  <textarea class="form-control" style="height:200px" cols="10" rows="5" name="map_embed" id="map_embed_input" type="text" placeholder="Project title">{{$school->map_embed}}</textarea>
                  <label for="map_embed_input">Bản đồ nhúng</label>
                  <div class="invalid-feedback"></div> 
                </div>
              </div>
                           


              <div class="col-sm-12 col-md-12" style="margin-bottom: 10px; padding:10px"> 
                <input type="hidden" name="redirect_url"  value="/admin/settings">
                <button  style="margin-bottom:10px !important; width:100%" class="btn btn-primary rounded-pill me-1 mb-1" type="submit">
                <span class="fas fas fa-plus" data-fa-transform="shrink-3"></span>Cập nhật</button>
                </div>

                  </form>
                </div>
              </div>
                
  
         




             

               





            
            <div class="col-12 col-xl-3">
             456
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
    $("select").removeClass("is-invalid");
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (res) {
            window.location.href = formData.get('redirect_url'); 
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
</script>
@endsection
