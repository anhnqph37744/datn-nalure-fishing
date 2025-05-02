@extends('admin.layouts.main')
@section('start-point')
    Quản lý bài viết
@endsection
@section('title')
    Thêm mới
@endsection
@section('main')
<div class="container-fluid py-4">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong class="fs-5 text-uppercase">⚠ Vui lòng nhập đầy đủ thông tin!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row g-4">
          
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-pencil-alt me-2 text-primary"></i>Thông tin bài viết</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tiêu đề bài viết <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Slug (URL)</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Trích đoạn</label>
                            <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="3">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nội dung chính</label>
                            <textarea id="editor" name="content" class="form-control @error('content') is-invalid @enderror" rows="8">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary me-2"><i class="fas fa-arrow-left me-1"></i>Quay lại</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus me-1"></i>Thêm bài viết</button>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-image me-2 text-info"></i>Ảnh đại diện</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img id="anh_dai_dien" src="https://via.placeholder.com/200x150?text=Preview" class="img-fluid border rounded" style="max-height: 200px;">
                        </div>
                        <input type="file" name="thumbnail" onchange="hienThiAnh(event)" class="form-control @error('thumbnail') is-invalid @enderror">
                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cogs me-2 text-secondary"></i>Cài đặt khác</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Chuyên mục</label>
                            <select name="post_category_id" class="form-select @error('post_category_id') is-invalid @enderror">
                                @foreach($postCategories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('post_category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('post_category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Trạng thái</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Bản nháp</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Đã xuất bản</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('assets/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => console.error(error));

    function hienThiAnh(event) {
        const imgPreview = document.getElementById('anh_dai_dien');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                imgPreview.src = reader.result;
                imgPreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection

@push('styles')
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endpush


