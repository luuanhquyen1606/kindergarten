@extends('admin.layouts.app')
@section('content')

<div class="pb-9">
  <div class="d-flex align-items-center mb-4">
    <div class="flex-1">
      <h2 class="mb-1">{{ $album->title ?: 'Bài viết ' . \Carbon\Carbon::parse($album->created_at)->format('d/m/Y') }}</h2>
      <p class="mb-0 fs-9 text-body-tertiary">
        {{ $album->author_name ?? 'Giáo viên' }} &middot;
        {{ \Carbon\Carbon::parse($album->created_at)->format('d/m/Y H:i') }} &middot;
        {{ $album->photos->count() }} ảnh
      </p>
    </div>
    @if($album->photos->isNotEmpty())
    <a class="btn btn-phoenix-secondary me-2" href="{{ route('classes.albums.download', [$class->id, $album->id]) }}">
      <span class="fa-solid fa-download me-2"></span>Tải xuống (zip)
    </a>
    @endif
    <a class="btn btn-phoenix-secondary" href="{{ route('classes.albums', $class->id) }}">
      <span class="fa-solid fa-arrow-left me-2"></span>Quay lại album
    </a>
  </div>

  @if($album->content)
  <p class="text-body-secondary mb-4" style="white-space: pre-line;">{{ $album->content }}</p>
  @endif

  <div class="position-relative">
    <div class="row gx-7 gy-5 overflow-hidden" id="image_gallery" data-gallery-column="data-gallery-column" data-sl-isotope='{"layoutMode":"packery"}'>
      @forelse($album->photos as $photo)
      <div class="col-sm-6 col-md-4 col-xl-3 isotope-item img-zoom-hover">
        <a class="text-decoration-none class-album-photo" href="<?php echo getPhotoThumbnail($photo->id, 1200); ?>" data-gallery="album-{{ $album->id }}">
          <div class="overflow-hidden rounded"><img class="img-fluid" src="<?php echo getPhotoThumbnail($photo->id, 500); ?>" alt="" /></div>
        </a>
        <div class="d-flex align-items-center mt-3">
          <div class="flex-1 text-truncate">
            <h5 class="title text-truncate mb-0">{{ \Illuminate\Support\Str::limit($photo->original_name, 25) }}</h5> 
          </div>
          <a class="btn btn-sm btn-phoenix-secondary p-1 lh-1 ms-2" href="{{ route('classes.albums.photos.download', [$class->id, $album->id, $photo->id]) }}" title="Tải xuống">
            <span class="fas fa-download"></span>
          </a>
        </div>
      </div>
      @empty
      <div class="col-12">
        <div class="card">
          <div class="card-body p-4 text-center text-body-tertiary">
            Album này chưa có ảnh nào.
          </div>
        </div>
      </div>
      @endforelse
    </div>
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
