@extends('admin.layouts.app')
@section('content')

        <div class="border-bottom border-translucent mb-7 mx-n3 px-2 mx-lg-n6 px-lg-6"> 
          <div class="row">
            <div class="col-xl-9">
              <div class="d-sm-flex justify-content-between">
                <h2 class="mb-4">Thêm chương trình</h2>
                <div class="d-flex mb-3"><a href="/admin/programs" class="btn btn-phoenix-primary me-2 px-6">Cancel</a><button class="btn btn-primary">Create lead</button></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-xl-9">
                <h5 class="mb-3">Ảnh đại diện </h5> <br />
            <div class="d-flex align-items-end position-relative mb-7">
                
                <input class="d-none" id="upload-avatar" type="file" />
              <div class="hoverbox" style="width: 150px; height: 150px">
                <div class="hoverbox-content rounded-square d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary"></span></div>
                <div class="position-relative bg-body-quaternary rounded-square cursor-pointer d-flex flex-center mb-xxl-7">
                  <div class="avatar avatar-5xl"><img class="rounded-square" src="/themes/star/images/courses/1.png" alt="" /></div><label class="w-100 h-100 position-absolute z-1" for="upload-avatar"></label>
                </div>
              </div>
            </div>
            <h5 class="mb-3">Thông tin </h5>
            <form action="/admin/programs" id="createBoardForm1" method="POST" class="row g-3 mb-9">
              @csrf
              <div class="col-sm-12 col-md-12"> 
                <div class="form-floating">
                    <input required class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Event title" value="">
                            <label for="create-boardwizard-name">Tên chương trình</label>
                </div>
              </div>
              <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <input required class="form-control" type="text" name="cost" id="create-boardwizard-name" placeholder="Event title" value="">
                            <label for="create-boardwizard-name">Học phí căn bản</label>
                </div>
              </div>
              <label>Lứa tuổi (tháng)</label>
              <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                   
                            <input type="hidden" name="min_age" id="min_age">
                            <input type="hidden" name="max_age" id="max_age">
                            <div id="slider"></div>
                </div>
              </div>
             
              
              <div class="col-12 d-flex justify-content-end mt-6">
                <input type="hidden" name="school_id" value="<?php echo $app['school']->id; ?>"/>
                <button class="btn btn-primary">Create lead</button>
              </div>
            </form>
          </div>
        </div>




@endsection



@section('js')
<script type="text/javascript">
var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        'min': 0,
        'max': 60
    },
    tooltips: true,
    format: wNumb({
  decimals: 0
})
});
slider.noUiSlider.on('update', function (values, handle) {
  if (handle === 0) {
    document.getElementById('min_age').value = values[0];
  } else {
    document.getElementById('max_age').value = values[1];
  }
});

</script>
@endsection