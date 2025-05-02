@extends('client.layouts.main')

@section('main')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('client/assets/img/breadcrumb/breadcrumb-1-1.png') }}"
        style="height: 100px">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Đặt hàng thành công</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li>Đơn hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="order-success pt-5 pb-5">
        <div class="container">
            <div class="text-center">
                <h2 class="text-success">🎉 Cảm ơn bạn đã đặt hàng! 🎉</h2>
                <p>Mã đơn hàng của bạn: <strong>#{{ $order->code }}</strong></p>
                <p>Ngày đặt hàng: {{ $order->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h4>Thông tin giao hàng</h4>
                    <p><strong>Họ và tên:</strong> {{ $order->address->full_name ?: 'Không có' }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order->address->address }} , {{ $order->address->ward }}, {{ $order->address->district }}, {{ $order->address->province }}</p>
                    <p><strong>Email:</strong> {{ $order->address->email ?: 'Không có' }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->address->phone ?: 'Không có' }}</p>
                    <p><strong>Ghi chú:</strong> {{ $order->address->note ?: 'Không có' }}</p>
                </div>
                <div class="col-md-6">
                    <h4>Thông tin thanh toán</h4>
                    <p><strong>Phương thức:</strong> {{ $order->payment_method == 'bacs' ? 'Thanh toán bằng tiền mặt' : 'Thanh toán bằng VNPAY' }}</p>
                    <p><strong>Trạng thái:</strong> {{ $order->order_status == 'pending' ? 'Chờ xác nhận' : 'Khác' }}</p>
                    <p><strong>Trạng thái thanh toán:</strong> {{ $order->payment_status ==  'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
                </div>
            </div>      

            <h4 class="mt-4">Chi tiết đơn hàng</h4>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                            <td>{{ number_format($item->total_price, 0, ',', '.') }}₫</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Tạm tính:</th>
                        <th>{{ number_format($total, 0, ',', '.') }}₫</th>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-end">Phí vận chuyển:</th>
                        <th>{{ number_format($order->shipping_fee, 0, ',', '.') }}₫</th>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-end">Giảm giá:</th>
                        <th>-{{ number_format($order->discount_amount, 0, ',', '.') }}₫</th>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-end">Tổng cộng:</th>
                        <th class="text-danger">{{ number_format($order->total_price, 0, ',', '.') }}₫</th>
                    </tr>
                </tfoot>
            </table>

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
                <a href="{{ route('client.orders.index') }}" class="btn btn-secondary">Xem lịch sử đơn hàng</a>
            </div>
        </div>
    </section>
@endsection             
