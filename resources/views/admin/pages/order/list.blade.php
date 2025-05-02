@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Danh sách đơn hàng</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <strong>Danh sách đơn hàng</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh sách đơn hàng</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                    <div style="margin-bottom: 20px;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm đơn hàng...">
                    </div>

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Phí vận chuyển</th>
                                    <th>Giảm giá</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Trạng thái thanh toán</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->code }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ number_format($order->total_price) }}đ</td>
                                        <td>{{ number_format($order->shipping_fee) }}đ</td>
                                        <td>{{ number_format($order->discount_amount) }}đ</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>
                                            @if ($order->payment_status == 'paid')
                                                <span class="label label-primary">Đã thanh toán</span>
                                            @else
                                                <span class="label label-warning">Chưa thanh toán</span>
                                            @endif
                                        </td>
                                        <td>
                                            <select class="form-control order-status" data-order_id="{{ $order->id }}"
                                                id="change-status">
                                                <option value="pending"
                                                    {{ $order->order_status == 'pending' ? 'selected' : '' }}>Chờ xử lý
                                                </option>
                                                <option value="processing"
                                                    {{ $order->order_status == 'processing' ? 'selected' : '' }}>Đang xử lý
                                                </option>
                                                <option value="shipping"
                                                    {{ $order->order_status == 'shipping' ? 'selected' : '' }}>Đang giao
                                                    hàng</option>
                                                <option value="delivered"
                                                    {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Hoàn thành
                                                </option>
                                                <option value="cancelled"
                                                    {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Đã hủy
                                                </option>
                                            </select>
                                        </td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.order.detail',$order->id) }}" class="btn btn-primary">Chi tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const statusOrder = {
            'pending': 0,
            'processing': 1,
            'shipping': 2,
            'completed': 3,
            'cancelled': 4
        };

        function isValidStatusTransition(currentStatus, newStatus) {
            return statusOrder[newStatus] > statusOrder[currentStatus];
        }

        const change_status = document.querySelectorAll('#change-status');
        for (const element of change_status) {
            let id = element.dataset.order_id;
            let currentStatus = element.value;

            // Disable invalid options based on current status
            Array.from(element.options).forEach(option => {
                if (statusOrder[option.value] <= statusOrder[currentStatus] && option.value !== currentStatus) {
                    option.disabled = true;
                }
            });

            element.addEventListener('change', () => { 
                let newStatus = element.value;
                
                $.ajax({
                    url:"{{route('admin.order.update')}}",
                    method:"GET",
                    data:{
                        id,
                        status: newStatus
                    },
                    success:function(response){
                        if(response.success) {
                            toastr.success('Cập nhật trạng thái đơn hàng thành công');
                            currentStatus = newStatus;
                            Array.from(element.options).forEach(option => {
                                if (statusOrder[option.value] <= statusOrder[currentStatus] && option.value !== currentStatus) {
                                    option.disabled = true;
                                }
                            });
                        } else {
                            toastr.error('Có lỗi xảy ra khi cập nhật trạng thái');
                            element.value = currentStatus;
                        }
                    },
                    error: function() {
                        toastr.error('Có lỗi xảy ra khi cập nhật trạng thái');
                        element.value = currentStatus;
                    }
                })
            })
        }
    </script>
   <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const table = document.querySelector('table');
        const rows = table.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();

            rows.forEach(row => {
                const rowText = row.innerText.toLowerCase();
                if (rowText.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }     
            });
        });
    });
</script>
@endsection 
