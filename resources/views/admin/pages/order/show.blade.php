@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Chi tiết đơn hàng #{{ $order->code }}</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.order.index') }}">Danh sách đơn hàng</a></li>
                    <li class="active"><strong>Chi tiết đơn hàng</strong></li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Thông tin đơn hàng</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Thông tin khách hàng</h3>
                                    <p><strong>Tên:</strong> {{ $order->user->name }}</p>
                                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                    <p><strong>Số điện thoại:</strong> {{ $order->user->phone }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h3>Thông tin giao hàng</h3>
                                    <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                                    <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Biến thể</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->variant_id ? $item->variant->name : 'N/A' }}</td>
                                            <td>{{ number_format($item->price) }}đ</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->total_price) }}đ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Tổng tiền hàng:</strong></td>
                                            <td>{{ number_format($order->total_price) }}đ</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Phí vận chuyển:</strong></td>
                                            <td>{{ number_format($order->shipping_fee) }}đ</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Giảm giá:</strong></td>
                                            <td>{{ number_format($order->discount_amount) }}đ</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>Tổng thanh toán:</strong></td>
                                            <td><strong>{{ number_format($order->total_price + $order->shipping_fee - $order->discount_amount) }}đ</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="row m-t">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.order.update', $order->id) }}" method="POST" class="form-inline">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="mr-2">Trạng thái đơn hàng:</label>
                                            <select name="order_status" class="form-control">
                                                <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                                <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                                                <option value="shipping" {{ $order->order_status == 'shipping' ? 'selected' : '' }}>Đang giao hàng</option>
                                                <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                                                <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection