@extends('admin.layouts.main')

@section('start-point') Quản lý bài viết @endsection
@section('title') Chỉnh sửa bài viết @endsection

@section('main')
<div class="container py-4">
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Chuyên mục</label>
            <select name="post_category_id" class="form-select @error('post_category_id') is-invalid @enderror">
                <option value="">-- Chọn chuyên mục --</option>
                @foreach ($postCategories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('post_category_id', $post->post_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('post_category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}"
                class="form-control @error('slug') is-invalid @enderror">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

      
        <div class="mb-3">
            <label class="form-label">Trích đoạn</label>
            <textarea name="excerpt" rows="3"
                class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
            @error('excerpt')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

      
        <div class="mb-3 d-flex align-items-start gap-3">
            <label class="form-label mt-2" style="min-width: 120px;">Nội dung chính</label>
            <textarea id="editor" rows="12" name="content"
                class="form-control w-100 @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
        </div>
        @error('content')
            <div class="text-danger">{{ $message }}</div>
        @enderror

      
        <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label><br>
            @if ($post->thumbnail)
                <img src="{{ asset($post->thumbnail) }}" alt="Thumbnail" class="img-thumbnail mb-2" style="max-width: 200px;">
            @endif
            <input type="file" name="thumbnail"
                class="form-control @error('thumbnail') is-invalid @enderror">
            @error('thumbnail')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    
        <div class="mb-4">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Bản nháp</option>
                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Xuất bản</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<script src="{{ asset('assets/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
        </script>
@endsection
