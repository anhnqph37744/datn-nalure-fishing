@extends('admin.layouts.app')

@section('start-point')
    Quản lý banner
@endsection

@section('title')
    Chi tiết banner
@endsection

@section('content')
    <div class="row">
        <!-- Nội dung chi tiết banner -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Thông tin Banner</h5>
                    <div>
                        <span class="badge bg-light text-dark me-2">ID: {{ $banner->id }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <!-- Nội dung -->
                        <div class="mb-3">
                            <label for="bannerImage" class="form-label fw-bold">Nội dung:</label>
                            <textarea class="form-control" id="content" rows="5" readonly>{{ $banner->noi_dung }}</textarea>
                        </div>

                        <!-- Loại Banner -->
                        <div class="mb-3">
                            <label for="loaiBanner" class="form-label fw-bold">Loại Banner:</label>
                            <input type="text" class="form-control" id="loaiBanner" value="{{ $banner->loai_banner }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label for="updatedAt" class="form-label fw-bold">Ngày cập nhật:</label>
                            <span class="text-muted">{{ $banner->updated_at->format('d/m/Y') }}</span>
                        </div>

                        <div class="mb-3">
                            <label for="updatedAt" class="form-label fw-bold">Ngày thêm:</label>
                            <span class="text-muted">{{ $banner->created_at->format('d/m/Y') }}</span>
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Trạng thái:</label>
                            <span class="badge {{ $banner->trang_thai === 'hien' ? 'bg-success' : 'bg-danger' }}">
                                {{ $banner->trang_thai === 'hien' ? 'Hiển thị' : 'Ẩn' }}
                            </span>
                        </div>

                        <!-- Nút quay lại -->
                        <div class="text-center">
                            <a href="{{ route('banner.index') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ảnh banner -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body text-center" style="padding: 0;">
                    <div id="bannerCarouselModal" class="carousel slide mb-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($banner->hinhAnhBanner as $key => $hinhAnh)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ Storage::url($hinhAnh->hinh_anh) }}" class="d-block w-100 img-fluid"
                                        style="max-height: 300px; object-fit: cover;"
                                        alt="Banner {{ $banner->id }} Image {{ $key + 1 }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarouselModal"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarouselModal"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- Nút xem lớn -->
                    <div>
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#imageModal">
                            Xem lớn
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Hình ảnh lớn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="bannerCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($banner->hinhAnhBanner as $key => $hinhAnh)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ Storage::url($hinhAnh->hinh_anh) }}" class="d-block w-100 img-fluid"
                                        alt="Banner {{ $banner->id }} Image {{ $key + 1 }}">
                                </div>
                            @endforeach
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
@endsection

@push('styles')
    <style>
        .carousel {
            display: flex;
            justify-content: space-between;
        }

        .modal-body img {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
        }

        .carousel-inner img {
            max-width: 100%;
            max-height: 500px;
            width: auto;
            height: auto;
            object-fit: contain;
        }
    </style>
@endpush

@push('scripts')
    <script></script>
@endpush
