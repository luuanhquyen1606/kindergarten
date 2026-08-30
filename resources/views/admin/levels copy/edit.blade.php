@extends('admin.layouts.app')
@section('content')
<div class="d-flex align-items-center"><img class="me-3" src="/assets/admin/img/kanban/board.png" alt="">
    <h1 class="mb-0 text-body-emphasis fw-semibold">Chương trình</h1>
</div>
<p class="mt-3">Thêm chương trình học </p>
<div class="kanban-create-board row">
    <div class="col-xxl-5 col-xl-6 col-12 pb-8 order-1 order-xl-0">

        <div class="">
            <div class="pt-4 pb-0">
                <div class="tab-content">
                    <form action="/admin/programs/{{ $level->id }}" id="createBoardForm1"   method="POST">
                         @csrf
                         @method('PUT')
                        <div class="form-floating">
                            <input required class="form-control" type="text" name="name" id="create-boardwizard-name" placeholder="Event title" value="{{ $level->name }}">
                            <label for="create-boardwizard-name">Tên</label>
                        </div>
                        <div class="p-4 code-to-copy">
                            <label for="create-boardwizard-name">lứa tuổi (tháng)</label>
                            <input type="hidden" name="min_age" id="min_age" value="{{ $level->min_age }}">
                            <input type="hidden" name="max_age" id="max_age" value="{{ $level->max_age }}">
                            <div id="slider"></div>

                        </div>
                        <div class="form-floating">
                            <input required class="form-control" type="text" name="cost" id="create-boardwizard-name" placeholder="Event title" value="{{ $level->cost }}">
                            <label for="create-boardwizard-name">Học phí căn bản</label>
                        </div>
                        
                        
                        <div class="d-flex pager wizard list-inline mb-0">

                            <div class="flex-1 text-end order-top-0 mt-10">
                                <input type="hidden" name="school_id" value="{{ $app['school']->id }}">
                                <button class="btn btn-primary px-6 px-sm-6" type="submit" data-wizard-next-btn="data-wizard-next-btn">Next<span class="fas fa-chevron-right ms-1" data-fa-transform="shrink-3"> </span></button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
    <div class="col-xxl-7 col-xl-6 col-12 text-center kanban-board-bg"><img class="d-dark-none mt-5 position-sticky" src="/assets/admin/img/kanban/board-ligth.png" alt="" style="top: 200px"><img class="d-light-none position-sticky" src="/assets/admin/img/kanban/board-dark.png" alt="" style="top: 200px"></div>
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