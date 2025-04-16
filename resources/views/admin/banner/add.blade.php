@extends('admin.layouts.main')

@section('title')
    Thêm mới banner
@endsection
@section('main')
    <div class="row">
        <div class="col-xl-5 col-lg-4">
            <div class="card">
                <div class="card-header" id="bannerFormToggle">
                    <div class="d-flex ">
                        <div class="flex-grow-1">
                            <h5 class="fs-16" style="cursor: pointer;">Thêm banner mới</h5>
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
                                <strong class="fs-5 text-uppercase">⚠ Vui lòng nhập đầy đủ thông tin!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Tiêu đề -->
                            <div class="mt-3">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            </div>

                            <!-- Ảnh -->
                            <div class="mt-3">
                                <label for="image">Ảnh Banner:</label>
                                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                                <img id="imagePreview" src="#" alt="Xem trước ảnh" style="max-width: 100%; height: auto; display: none; margin-top: 10px;">
                            </div>

                            <!-- Nội dung -->
                            <div class="mt-3">
                                <label for="content">Nội dung:</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            </div>

                            <!-- Link (tùy chọn) -->
                            <div class="mt-3">
                                <label for="link">Liên kết (tùy chọn):</label>
                                <input type="url" name="link" class="form-control" value="{{ old('link') }}">
                            </div>

                           
                            <div class="mt-3">
                                <label for="active">Trạng thái:</label>
                                <select name="active" class="form-control">
                                    <option value="1" {{ old('active', 1) == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Ẩn</option>                                  
                                </select>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-sm btn-success me-2"
                                    style="width: 100px; height: 37.5px">Thêm</button>
                                <a href="{{ route('banner.index') }}" class="btn btn-secondary" style="width: 100px;">Quay
                                    lại</a>
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
                        <div id="bannerCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                {{-- @php
                                    $images = json_decode($banner->image, true);
                                @endphp

                                @if ($images)
                                    @foreach ($images as $index => $img)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $img) }}" class="d-block w-100 img-fluid" style="height: 300px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                @endif --}}
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
                                data-bs-slide="next">
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
            var rowCount = 1;

            // Thêm hàng mới khi nhấn nút "Thêm"
            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body');
                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                <td class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <img id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s" width="50px">
                        <input type="file" id="hinh_anh" name="list_image[id_${rowCount}]" class="form-control mx-2" onchange="previewImageAndAddToSlideshow(this, ${rowCount})">
                        <button class="btn btn-light remove-row" onclick="removeRow(this)"><i class="bx bx-trash"></i></button>
                    </div>
                </td>
            `;
                tableBody.appendChild(newRow);
                rowCount++;
            });
        });

        // Hàm xem trước ảnh và thêm ảnh vào slideshow
        function previewImageAndAddToSlideshow(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Cập nhật ảnh xem trước
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result);

                    // Thêm ảnh vào carousel
                    var carouselInner = document.getElementById('carouselImages');
                    var newCarouselItem = document.createElement('div');
                    newCarouselItem.classList.add('carousel-item');
                    newCarouselItem.innerHTML = `
                    <img src="${e.target.result}" class="d-block w-100 img-fluid" style="height: 300px; object-fit: cover;" alt="Image ${rowIndex + 1}">
                `;

                    // Nếu là ảnh đầu tiên, đặt class 'active'
                    if (carouselInner.children.length === 0) {
                        newCarouselItem.classList.add('active');
                    }

                    // Thêm ảnh vào carousel
                    carouselInner.appendChild(newCarouselItem);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }

        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var img = document.getElementById('imagePreview');
                img.src = reader.result;
                img.style.display = 'block'; // Hiện ảnh xem trước
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
