@extends('admin.layouts.main')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Sửa
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-4">
            <div class="card">
                <div class="card-header" id="bannerFormToggle">
                    <div class="d-flex ">
                        <div class="flex-grow-1">
                            <h5 class="fs-16" style="cursor: pointer;">Sửa banner</h5>
                        </div>
                    </div>
                </div>
                <div id="bannerFormSection" class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                            <!-- Tiêu đề -->
                            <div class="filter-choices-input mt-3">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $banner->title) }}">
                            </div>
                        
                            <!-- Hình ảnh -->
                            <div class="filter-choices-input mt-3">
                                <label for="image">Hình ảnh:</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @if ($banner->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $banner->image) }}" width="100px" alt="Banner Image">
                                    </div>
                                @endif
                            </div>
                        
                            <!-- Nội dung -->
                            <div class="filter-choices-input mt-3">
                                <label for="content">Nội dung:</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content', $banner->content) }}</textarea>
                            </div>
                        
                            <!-- Liên kết -->
                            <div class="filter-choices-input mt-3">
                                <label for="link">Liên kết:</label>
                                <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                                       value="{{ old('link', $banner->link) }}">
                            </div>
                        
                            <!-- Trạng thái -->
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Trạng thái</label>
                                <select name="active" class="form-control">
                                    <option value="1" {{ old('active', $banner->active) == 1 ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="0" {{ old('active', $banner->active) == 0 ? 'selected' : '' }}>Không hoạt động</option>
                                </select>
                            </div>
                        
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-warning me-2">Cập nhật</button>
                                <a href="{{ route('banner.index') }}" class="btn btn-secondary" style="width: 100px;">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- end col -->

        <div class="col-xl-7 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h1>Slide ở đây</h1>
                        <div id="bannerCarousel" class="carousel slide mb-3 " data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($banner->hinhAnhBanner as $key => $hinhAnh)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ Storage::url($hinhAnh->hinh_anh) }}" class="d-block w-100 img-fluid" style="height: 300px; object-fit: cover;" alt="Banner {{ $banner->id }} Image {{ $key + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
@endpush
@push('scripts')
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowCount = {{ count($banner->hinhAnhBanner) }};

            // Thêm sự kiện cho nút 'Thêm hàng'
            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body');
                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <img id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s" width="50px">
                            <input type="file" id="hinh_anh" name="list_image[id_${rowCount}]" class="form-control mx-2" onchange="previewImage(this, ${rowCount})">
                                                        <button class="btn btn-light remove-row" onclick="removeRow(this)"><i class="bx bx-trash"></i></button>
                        </div>
                    </td>
                `;

                tableBody.appendChild(newRow);
                rowCount++;
            });




        });

        function previewImage(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }
    </script>
@endpush
