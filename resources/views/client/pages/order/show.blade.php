@extends('client.layouts.main')

@section('main')



<div class="container py-5">
    
    <div class="container">
        <div class="container py-5">
            <div class="card shadow-sm rounded mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="text-primary mb-0"><i class="fas fa-file-invoice me-2"></i>Chi tiết đơn hàng #{{ $order->code }}</h2>
                        <a href="{{ route('client.orders.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Quay lại
                        </a>
                    </div>
                </div>
            </div>
    </div>
</div>


    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm hover-shadow-lg">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0 text-primary"><i class="fas fa-shopping-cart me-2"></i>Danh sách sản phẩm</h5>
                </div>
                <div class="card-body p-0">
                    @foreach($order->orderItems as $item)
                    <div class="row p-3 border-bottom align-items-center hover-bg-light transition-all">
                        <div class="col-md-2">
                            <div class="rounded overflow-hidden">
                                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid hover-scale transition-all">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-1 text-primary">{{ $item->product->name }}</h6>
                            @if($item->variant_id)
                                <small class="text-muted d-block"><i class="fas fa-tag me-1"></i>Phân loại: {{ $item->variant->name }}</small>
                            @endif
                        </div>
                        <div class="col-md-2 text-center">
                            <span class=" text-dark p-2">x{{ $item->quantity }}</span>
                        </div>
                        <div class="col-md-2 text-end">
                            <span class="fw-bold text-primary">{{ number_format($item->total_price, 0, ',', '.') }}đ</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-primary"><i class="fas fa-clipboard-list me-2"></i>Trạng thái đơn hàng</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3">
                        <span class="fw-bold">Trạng thái đơn hàng:</span>
                        @switch($order->order_status)
                            @case('pending')
                                <span class="badge bg-warning text-dark d-flex align-items-center gap-2">
                                    <i class="fas fa-clock"></i> Chờ xử lý
                                </span>
                                @break
                            @case('processing')
                                <span class=" d-flex align-items-center gap-2">
                                    <i class="fas fa-cog fa-spin"></i> Đang xử lý
                                </span>
                                @break
                            @case('shipped')
                                <span class="badge bg-primary d-flex align-items-center gap-2">
                                    <i class="fas fa-shipping-fast"></i> Đang giao hàng
                                </span>
                                @break
                            @case('delivered')
                                <span class="badge bg-success d-flex align-items-center gap-2">
                                    <i class="fas fa-check-circle"></i> Đã giao hàng
                                </span>
                                @break
                            @default
                                <span class="badge bg-danger d-flex align-items-center gap-2">
                                    <i class="fas fa-times-circle"></i> Đã hủy
                                </span>
                        @endswitch
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded">
                        <span class="fw-bold">Trạng thái thanh toán:</span>
                        @switch($order->payment_status)
                            @case('pending')
                                <span class=" text-dark d-flex align-items-center gap-2">
                                    <i class="fas fa-hourglass-half"></i> Chưa thanh toán
                                </span>
                                @break
                            @case('paid')
                                <span class="badge bg-success d-flex align-items-center gap-2">
                                    <i class="fas fa-check-circle"></i> Đã thanh toán
                                </span>
                                @break
                            @default
                                <span class="badge bg-danger d-flex align-items-center gap-2">
                                    <i class="fas fa-exclamation-circle"></i> Thanh toán thất bại
                                </span>
                        @endswitch
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm rounded-3 border-0 mb-4 hover-shadow-lg">
                <div class="card-header bg-light border-bottom">
                    <h5 class="mb-0 text-primary"><i class="fas fa-file-invoice me-2"></i>Thông tin đơn hàng</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted"><i class="fas fa-shopping-cart me-2"></i>Tổng tiền hàng:</span>
                            <span class="fw-bold">{{ number_format($order->total_price - $order->shipping_fee + $order->discount_amount, 0, ',', '.') }}đ</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted"><i class="fas fa-truck me-2"></i>Phí vận chuyển:</span>
                            <span class="fw-bold">{{ number_format($order->shipping_fee, 0, ',', '.') }}đ</span>
                        </div>
                        @if($order->discount_amount > 0)
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted"><i class="fas fa-tag me-2"></i>Giảm giá:</span>
                            <span class="fw-bold text-success">-{{ number_format($order->discount_amount, 0, ',', '.') }}đ</span>
                        </div>
                        @endif
                        <hr class="my-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="text-primary"><i class="fas fa-money-bill me-2"></i>Tổng thanh toán:</strong>
                            <strong class="text-primary fs-5">{{ number_format($order->total_price, 0, ',', '.') }}đ</strong>
                        </div>
                        <div class="mt-3 pt-3 border-top">
                            <strong class="d-block mb-2 text-primary"><i class="fas fa-credit-card me-2"></i>Phương thức thanh toán:</strong>
                            <p class="mb-0 ps-4">{{ $order->payment_method == 'bacs' ? 'Thanh toán khi nhận hàng' : ($order->payment_method == 'vnpay' ? 'VNPay' : 'Momo') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm rounded-3 border-0 mb-4">
                <div class="card-header bg-light border-bottom">
                    <h5 class="mb-0 text-primary"><i class="fas fa-file-invoice me-2"></i>Thông tin đơn hàng</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex flex-column gap-3">
                        <p class="mb-0 d-flex align-items-center">
                            <i class="fas fa-user text-primary me-3"></i>
                            <span><strong>Người nhận:</strong> {{ $order->user->name }}</span>
                        </p>
                        <p class="mb-0 d-flex align-items-center">
                            <i class="fas fa-phone text-primary me-3"></i>
                            <span><strong>Số điện thoại:</strong> {{ $order->user->profile->phone }}</span>
                        </p>
                        <p class="mb-0 d-flex align-items-center">
                            <i class="fas fa-envelope text-primary me-3"></i>
                            <span><strong>Email:</strong> {{ $order->user->email }}</span>
                        </p>
                        <p class="mb-0 d-flex align-items-center">
                            <i class="fas fa-home text-primary me-3"></i>
                            <span><strong>Địa chỉ:</strong> {{$order->user->profile->address}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection