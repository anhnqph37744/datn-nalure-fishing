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
                        <td class="py-3">
                            @switch($order->payment_status)
                                @case('pending')                        
                                    <span class=" text-dark"><i class="fas fa-clock me-1"></i>Chờ xử lý</span>                                  
                                    @break
                                @case('processing')
                                    <span class="badge bg-info"><i class="fas fa-cog me-1"></i>Đang xử lý</span>
                                    @break
                                @case('shipped')
                                    <span class="badge bg-primary"><i class="fas fa-shipping-fast me-1"></i>Đang giao hàng</span>
                                    @break
                                @case('delivered')
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Đã giao hàng</span>
                                    @break
                                @case('canceled')
                                    <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i>Đã hủy</span>
                                    @break
                            @endswitch
                        </td>
                        <td class="py-3">
                            @switch($order->payment_status)
                                @case('pending')
                                    <span class=" text-dark"><i class="fas fa-hourglass-start me-1"></i>Chưa thanh toán</span>
                                    @break
                                @case('paid')
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Đã thanh toán</span>
                                    @break
                                @case('failed')
                                    <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i>Thanh toán thất bại</span>
                                    @break
                            @endswitch
                        </td>
                        <td class="py-3">
                            <a href="{{ route('client.orders.show', $order->id) }}" class="btn btn-sm btn-info me-2 hover-shadow-sm transition-all"><i class="fas fa-eye me-1"></i>Chi tiết</a>
                            @if($order->payment_status == 'pending')
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('.cancel-order').click(function() {
            const orderId = $(this).data('order-id');
            if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')) {
                $.ajax({
                    url: `/client/orders/${orderId}/cancel`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Hủy đơn hàng thành công');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
                    }
                });
            }
        });
    });
</script>
@endpush
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
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
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
    box-shadow: 0 4px 8px rgba(255,153,0,0.2);
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