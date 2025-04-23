@extends('client.layouts.main')

@section('main')
<div class="container py-5">
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('client/assets/img/breadcrumb/breadcrumb-1-1.png') }}"
        style="height: 100px">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Danh sách đơn hàng</h1>

            </div>
        </div>
    </div>

    <!-- Modal Hủy đơn hàng -->
    <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelOrderModalLabel">Lý do hủy đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cancelReason" class="form-label">Vui lòng chọn lý do hủy đơn:</label>
                        <select class="form-select" id="cancelReason">
                            <option value="">-- Chọn lý do --</option>
                            <option value="wrong_product">Đặt nhầm sản phẩm</option>
                            <option value="change_mind">Đổi ý không muốn mua nữa</option>
                            <option value="found_better_price">Tìm được giá tốt hơn</option>
                            <option value="financial_reason">Lý do tài chính</option>
                            <option value="other">Lý do khác</option>
                        </select>
                        <div class="mt-3 d-none" id="otherReasonContainer">
                            <label for="otherReason" class="form-label">Lý do khác:</label>
                            <textarea class="form-control" id="otherReason" rows="3" placeholder="Vui lòng nhập lý do..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" id="confirmCancelOrder">Xác nhận hủy</button>
                </div>
            </div>
        </div>
    </div>

    @if($orders->isEmpty())
    <div class="text-center py-5">
        <h4>Bạn chưa có đơn hàng nào</h4>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
    </div>
    @else
    <div class="table-responsive shadow rounded">
        <table class="table table-hover mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="py-3">Mã đơn hàng</th>
                    <th class="py-3">Ngày đặt</th>
                    <th class="py-3">Tổng tiền</th>
                    <th class="py-3">Trạng thái đơn hàng</th>
                    <th class="py-3">Trạng thái thanh toán</th>
                    <th class="py-3">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="align-middle hover-bg-light transition-all">
                    <td class="py-3"><strong>{{ $order->code }}</strong></td>
                    <td class="py-3">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td class="py-3 text-primary"><strong>{{ number_format($order->total_price, 0, ',', '.') }}đ</strong></td>
                    <td class="py-3" id="status_order_{{ $order->id }}">
                        @switch($order->order_status)
                        @case('pending')
                        <span class="btn btn-secondary"><i class="fas fa-clock me-1"></i>Chờ xử lý</span>
                        @break
                        @case('processing')
                        <span class="btn btn-info"><i class="fas fa-cog me-1"></i>Đang xử lý</span>
                        @break
                        @case('shipping')
                        <span class="btn btn-primary"><i class="fas fa-shipping-fast me-1"></i>Đang giao hàng</span>
                        @break
                        @case('delivered')
                        <span class="btn btn-success"><i class="fas fa-check-circle me-1"></i>Đã giao hàng</span>
                        @break
                        @case('cancelled')
                        <span class="btn btn-danger"><i class="fas fa-times-circle me-1"></i>Đã hủy</span>
                        @break
                        @default
                        <span class="btn btn-secondary">{{ $order->order_status }}</span>
                        @endswitch
                    </td>
                    <td class="py-3">
                        @switch($order->payment_status)
                        @case('pending')
                        <span class="btn btn-secondary"><i class="fas fa-hourglass-start me-1"></i>Chưa thanh toán</span>
                        @break
                        @case('paid')
                        <span class="btn btn-success"><i class="fas fa-check-circle me-1"></i>Đã thanh toán</span>
                        @break
                        @case('failed')
                        <span class="btn btn-danger"><i class="fas fa-times-circle me-1"></i>Thanh toán thất bại</span>
                        @break
                        @endswitch
                    </td>
                    <td class="py-3">
                        <a href="{{ route('client.orders.show', $order->id) }}" class="btn btn-sm btn-info me-2 hover-shadow-sm transition-all"><i class="fas fa-eye me-1"></i>Chi tiết</a>
                        @if($order->order_status == 'pending' || $order->order_status == 'processing')
                        <button type="button" class="btn btn-sm btn-danger cancel-order hover-shadow-sm transition-all" data-order-id="{{ $order->id }}"><i class="fas fa-ban me-1"></i>Hủy đơn</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <div class="pagination-style-one">
            {{ $orders->links() }}
        </div>
    </div>
    @endif
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentOrderId = null;
    
        document.querySelectorAll('.cancel-order').forEach(function (btn) {
            btn.addEventListener('click', function () {
                currentOrderId = this.getAttribute('data-order-id');
                document.getElementById('cancelReason').value = '';
                document.getElementById('otherReason').value = '';
                document.getElementById('otherReasonContainer').classList.add('d-none');
                $('#cancelOrderModal').modal('show'); 
            });
        });

        document.getElementById('cancelReason').addEventListener('change', function () {
            if (this.value === 'other') {
                document.getElementById('otherReasonContainer').classList.remove('d-none');
            } else {
                document.getElementById('otherReasonContainer').classList.add('d-none');
            }
        });

        document.getElementById('confirmCancelOrder').addEventListener('click', function () {
            const reason = document.getElementById('cancelReason').value;
            if (!reason) {
                toastr.error('Vui lòng chọn lý do hủy đơn hàng');
                return;
            }

            let cancelReason = reason;
            if (reason === 'other') {
                const otherReason = document.getElementById('otherReason').value.trim();
                if (!otherReason) {
                    toastr.error('Vui lòng nhập lý do khác');
                    return;
                }
                cancelReason = otherReason;
            }

            $.ajax({
                url: `/client/orders/${currentOrderId}/cancel`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    reason: cancelReason
                },
                success: function (response) {
                    $('#cancelOrderModal').modal('hide');
                    toastr.success('Đơn hàng đã được hủy thành công.');
                    location.reload();
                },
                error: function (xhr) {
                    toastr.error('Có lỗi xảy ra. Vui lòng thử lại sau.');
                }
            });
        });
    });
</script>
@push('style')
<style>
    .pagination-style-one .pagination {
        display: flex;
        gap: 8px;
    }

    .pagination-style-one .page-item .page-link {
        border-radius: 8px;
        color: #666;
        padding: 8px 16px;
        font-weight: 500;
        background: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .pagination-style-one .page-item.active .page-link {
        background: #ff9900;
        border-color: #ff9900;
        color: #fff;
    }

    .pagination-style-one .page-item .page-link:hover {
        background: #ff9900;
        border-color: #ff9900;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 153, 0, 0.2);
    }

    .pagination-style-one .page-item.disabled .page-link {
        background: #f5f5f5;
        border-color: #ddd;
        color: #999;
        cursor: not-allowed;
    }
</style>
@endpush
@endsection