@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="d-flex align-items-center mb-4">
    <h2 class="mb-0 flex-1">Album lớp {{ $class->name }}</h2>
    <a class="btn btn-phoenix-secondary" href="{{ route('classes.show', $class->id) }}">
      <span class="fa-solid fa-arrow-left me-2"></span>Quay lại lớp học
    </a>
  </div>

  <div class="row g-4" id="gallery-album" data-sl-isotope="{&quot;layoutMode&quot;:&quot;packery&quot;,&quot;packery&quot;:{&quot;gutter&quot;:0}}">
    @forelse($albums as $album)
    @php $stackPhotos = $album->photos->take(3); @endphp
    <div class="col-sm-6 col-md-4 col-xl-3 isotope-item image">
      <div class="album-item position-relative overflow-hidden">
        <a class="text-decoration-none" href="{{ route('classes.albums.show', [$class->id, $album->id]) }}">
          <div class="photo-stack">
            @foreach($stackPhotos as $index => $photo)
            <div class="rounded-2 overflow-hidden photo-stack-{{ $index === 0 ? 'top' : ($index === 1 ? 'middle' : 'bottom') }}">
              <img class="w-100 object-fit-cover" src="<?php echo getPhotoThumbnail($photo->id, 500); ?>" alt="">
            </div>
            @endforeach
          </div>
          <h4 class="mt-5 title">{{ $album->title ?: 'Bài viết ' . \Carbon\Carbon::parse($album->created_at)->format('d/m/Y') }}</h4>
          <p class="mb-0 fs-9 text-body">{{ $album->photos->count() }} ảnh</p>
        </a>
        <div class="dropdown position-absolute top-0 end-0 mt-3 me-3 z-5">
          <button class="btn btn-sm px-3 dropdown-toggle dropdown-caret-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
          <div class="dropdown-menu dropdown-menu-end py-2">
            <a class="dropdown-item" href="{{ route('classes.albums.show', [$class->id, $album->id]) }}">Xem</a>
            <a class="dropdown-item" href="{{ route('classes.albums.download', [$class->id, $album->id]) }}">Tải xuống (zip)</a>
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="col-12">
      <div class="card">
        <div class="card-body p-4 text-center text-body-tertiary">
          Chưa có album nào cho lớp học này.
        </div>
      </div>
    </div>
    @endforelse
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
if (window.GLightbox) {
    GLightbox({ selector: '.class-album-photo' });
}
</script>
@endsection
