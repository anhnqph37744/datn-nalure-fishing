@extends('admin.layouts.main')

@section('title', 'Chi tiết bài viết')

@section('main')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">

          
            @if ($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Ảnh đại diện" class="img-fluid mb-4 rounded">
            @endif

          
            <h1 class="mb-3">{{ $post->title }}</h1>

          
            <div class="mb-4 text-muted">
                <small>
                    <strong>Slug:</strong> {{ $post->slug ?? '—' }} <br>
                    <strong>Chuyên mục:</strong> {{ $post->postCategory->name ?? 'Không có' }} |
                    <strong>Trạng thái:</strong>
                    @if ($post->status === 'published')
                        <span class="text-success">Đã xuất bản</span>
                    @else
                        <span class="text-warning">Bản nháp</span>
                    @endif |
                    <strong>Ngày đăng:</strong> {{ $post->created_at->format('d/m/Y H:i') }}
                </small>
            </div>

           
            <div class="mb-4">
                <strong>Trích đoạn:</strong>
                <p class="lead mb-0">
                    {{ $post->excerpt ?? '—' }}
                </p>
            </div>

           
            <div class="mt-4 post-content">
                <strong>Nội dung:</strong>
                {!! $post->content !!}
            </div>

            <div class="text-end mb-3">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary me-2">Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection
