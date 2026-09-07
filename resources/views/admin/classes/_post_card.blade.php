<div class="card mb-4" id="class_post_{{ $post->id }}">
  <div class="card-body p-3 p-sm-4">
    <div class="d-flex align-items-center mb-3">
      <div class="avatar avatar-xl me-2">
        <img class="rounded-circle" src="{{ getPhotoThumbnail($post->author_photo_id, 100) }}" alt="">
      </div>
      <div class="flex-1">
        <span class="fw-bold mb-0 text-body-emphasis d-block">{{ $post->author_name ?? 'Giáo viên' }}</span>
        <p class="fs-10 mb-0 text-body-tertiary text-opacity-85 fw-semibold">{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</p>
      </div>
      <div class="btn-reveal-trigger">
        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
        <div class="dropdown-menu dropdown-menu-end py-2">
          <a class="dropdown-item edit-class-post" href="#!" data-post-id="{{ $post->id }}">Sửa</a>
          <a class="dropdown-item text-danger delete-class-post" href="#!" data-post-id="{{ $post->id }}">Xóa</a>
      </div>
      </div>
    </div>
    <p class="text-body-secondary mb-3" style="white-space: pre-line;">{{ $post->content }}</p>
    @if($post->photos->isNotEmpty())
    <div class="row g-1">
      @foreach($post->photos as $photo)
      <div class="{{ $post->photos->count() === 1 ? 'col-12' : ($post->photos->count() === 2 ? 'col-6' : 'col-4') }}">
        <a href="{{ $photo->path }}" class="class-post-photo" data-gallery="gallery-class-post-{{ $post->id }}">
          <img class="rounded w-100 h-100" style="object-fit: cover; aspect-ratio: 1 / 1;" src="<?php echo getPhotoThumbnail($photo->id, 500); ?>" alt="">
        </a>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</div>
