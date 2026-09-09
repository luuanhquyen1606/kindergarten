@extends('admin.layouts.app')
@section('content')

<?php
$post_href =  '/'.$post->routing_slug;
?>

<div class="pb-9">
  <div class="row g-3 flex-between-end mb-5">
    <div class="col-auto">
      <h2 class="mb-2">{{ $post->title }}</h2>
      <div class="d-flex align-items-center flex-wrap gap-2">
        @if($post->type === 'event')
          <span class="badge badge-phoenix badge-phoenix-warning">Sự kiện</span>
        @else
          <span class="badge badge-phoenix badge-phoenix-info">Tin tức</span>
        @endif

        @if($post->is_published)
          <span class="badge badge-phoenix badge-phoenix-success">Đã đăng</span>
        @else
          <span class="badge badge-phoenix badge-phoenix-secondary">Bản nháp</span>
        @endif

        @if($post->category_name)
          <span class="badge badge-phoenix badge-phoenix-primary">{{ $post->category_name }}</span>
        @endif

        <span class="fs-9 text-body-tertiary">Tạo lúc {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</span>
      </div>
    </div>
    <div class="col-auto">
      <a href="/admin/posts" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Quay về</a>
      @if($post->is_published)
        <a target="_blank" href="{{ $post_href }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">
          <span class="fas fa-external-link-alt me-1"></span> Xem trên web
        </a>
      @endif
      <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-primary mb-2 mb-sm-0">
        <span class="fas fa-edit me-1"></span> Chỉnh sửa
      </a>
    </div>
  </div>

  <div class="row g-5">
    <div class="col-12 col-xl-8">
      @if($post->photo_id)
        <div class="mb-4">
          <img src="{{ getPhotoUrl($post->photo_id) }}" class="rounded-3 w-100 object-fit-cover" style="max-height:360px" alt="{{ $post->title }}">
        </div>
      @endif

      <div class="card">
        <div class="card-body">
          <div class="post-content">
            {!! $post->content !!}
          </div>
        </div>
      </div>

      @if($post->files->count())
        <div class="card mt-4">
          <div class="card-header bg-body border-bottom">
            <h5 class="mb-0">File đính kèm</h5>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              @foreach($post->files as $file)
                <li class="mb-2">
                  <a href="{{ $file->path }}" target="_blank" class="text-body-emphasis">
                    <span class="fas fa-paperclip me-2"></span>{{ $file->original_name ?? $file->name }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif
    </div>

    <div class="col-12 col-xl-4">
      @if($post->type === 'event')
        <div class="card mb-3">
          <div class="card-header bg-body border-bottom">
            <h5 class="mb-0">Thông tin sự kiện</h5>
          </div>
          <div class="card-body">
            <dl class="row mb-0 fs-9">
              <dt class="col-5">Bắt đầu</dt>
              <dd class="col-7">{{ $post->start_at ?? '—' }}</dd>
              <dt class="col-5">Kết thúc</dt>
              <dd class="col-7">{{ $post->end_at ?? '—' }}</dd>
              <dt class="col-5">Địa điểm</dt>
              <dd class="col-7">{{ $post->location ?? '—' }}</dd>
              <dt class="col-5">Phí tham dự</dt>
              <dd class="col-7">{{ $post->price > 0 ? number_format($post->price).' đ' : 'Miễn phí' }}</dd>
              <dt class="col-5">Nhận ủng hộ</dt>
              <dd class="col-7">{{ $post->accept_donation == 1 ? 'Có' : 'Không' }}</dd>
            </dl>
          </div>
        </div>
      @endif

      <div class="card mb-3">
        <div class="card-header bg-body border-bottom">
          <h5 class="mb-0">Thẻ</h5>
        </div>
        <div class="card-body">
          @forelse($post->tags as $tag)
            <span class="badge badge-phoenix badge-phoenix-secondary me-1">{{ $tag->name }}</span>
          @empty
            <span class="fs-9 text-body-tertiary">Chưa gắn thẻ</span>
          @endforelse
        </div>
      </div>

      <div class="card">
        <div class="card-header bg-body border-bottom">
          <h5 class="mb-0">Chi tiết</h5>
        </div>
        <div class="card-body">
          <dl class="row mb-0 fs-9">
            <dt class="col-5">Cập nhật lúc</dt>
            <dd class="col-7">{{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y H:i') }}</dd>
            @if($post->type !== 'event')
              <dt class="col-5">Đường dẫn</dt>
              <dd class="col-7 text-truncate"><a href="{{ $post_href }}{{ $post->is_published ? '' : '?preview='.postPreviewCode($post->id) }}" target="_blank">{{ $post_href }}</a></dd>
            @endif
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
