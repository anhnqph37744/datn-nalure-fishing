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
                                <p><strong>Tên:</strong> {{ $order->address->full_name }}</p>
                                <p><strong>Email:</strong> {{ $order->address->email }}</p>
                                <p><strong>Số điện thoại:</strong> {{ $order->address->phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <h3>Thông tin giao hàng</h3>
                                <p><strong>Địa chỉ:</strong> {{ $order->address->address }} , {{ $order->address->ward }}, {{ $order->address->district }}, {{ $order->address->province }}</p>
                                <p><strong>Ghi chú:</strong> {{ $order->address->note }}</p>
                                <p><strong>Trạng thái thanh toán:</strong> {{ $order->payment_status == 'paid' ? 'Đã thanh toán' : ' Chưa thanh toán' }}</p>
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
                                        <td>
                                            @if(isset($item->variant))
                                            <div>
                                                <strong>SKU:</strong> {{ $item->variant->sku }} <br>
                                                <strong>Giá:</strong> {{ number_format($item->variant->price, 0, ',', '.') }} VNĐ
                                                <br>
                                                <strong>Số lượng:</strong> {{ $item->variant->quantity }} <br>
                                                <strong>Thuộc tính:</strong>
                                                @if (!empty($item->variant->varianAttributeValue))
                                                @foreach ($item->variant->varianAttributeValue as $attr)
                                                <span class="badge bg-warning">
                                                    {{ $attr->attribute->name ?? 'N/A' }}:
                                                    {{ $attr->attributeValue->value ?? 'N/A' }}
                                                </span>
                                                @endforeach
                                                @else
                                                <span class="text-muted">Không có thuộc tính</span>
                                                @endif
                                                <hr>
                                            </div>
                                            @else
                                            <p>Sản phẩm không có biến thể</p>
                                            @endif
                                        </td>
                                        <td>{{ number_format($item->price) }}đ</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->total_price) }}đ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Tổng tiền hàng:</strong></td>
                                        <td>{{ number_format($order->total_items_price) }}đ</td>
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
                                        <td><strong>{{ number_format($order->total_price  - $order->discount_amount) }}đ</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="row m-t">
                            <div class="col-md-12">
                                <div class="form-inline">

                                    <div class="form-group">
                                        <label class="mr-2">Trạng thái đơn hàng:</label>
                                        @php
                                        $statuses = [
                                        'pending' => 'Chờ xử lý',
                                        'processing' => 'Đang xử lý',
                                        'shipping' => 'Đang giao hàng',
                                        'delivered' => 'Hoàn thành',
                                        'cancelled' => 'Đã hủy',
                                        ];
                                        $currentIndex = array_search($order->order_status, array_keys($statuses));
                                        @endphp

                                        <select name="order_status" class="form-control" id="change-status">
                                            @foreach($statuses as $key => $label)
                                            @php
                                            $index = array_search($key, array_keys($statuses));
                                            $disabled = $index < $currentIndex ? 'disabled' : '' ;
                                                $selected=$order->order_status == $key ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $selected }} {{ $disabled }}>{{ $label }}</option>
                                                @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const change_status = document.querySelector('#change-status');
    change_status.addEventListener('change', () => {
        let newStatus = change_status.value;
        let id = {{$order -> id}};

        $.ajax({
            url: "{{route('admin.order.update')}}",
            method: "GET",
            data: {
                id,
                status: newStatus
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Cập nhật trạng thái đơn hàng thành công');
                    currentStatus = newStatus;
                } else {
                    toastr.error('Có lỗi xảy ra khi cập nhật trạng thái');
                    change_status.value = currentStatus;
                }
            },
            error: function() {
                toastr.error('Có lỗi xảy ra khi cập nhật trạng thái');
                change_status.value = currentStatus;
            }
        })
    })
</script>
@endsection