@extends('client.layouts.main')
@section('main')
<style>
    /* Reset mặc định và cấu hình chung */
    /* Reset mặc định và cấu hình chung */
    .vs-checkout-wrapper {
        padding: 40px 0;
        background-color: #f9f9f9;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Tiêu đề */
    h4 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    /* Form thông tin nhận hàng */
    .shipping_address {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        color: #555;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    .form-control::placeholder {
        color: #999;
    }

    /* Checkbox địa chỉ nhận hàng */
    #ship-to-different-address {
        margin: 20px 0;
    }

    #ship-to-different-address-checkbox {
        display: none;
    }

    #ship-to-different-address label {
        position: relative;
        padding-left: 30px;
        font-size: 16px;
        color: #333;
        cursor: pointer;
    }

    #ship-to-different-address .checkmark {
        position: absolute;
        left: 0;
        top: 2px;
        width: 18px;
        height: 18px;
        border: 2px solid #007bff;
        border-radius: 3px;
        background-color: #fff;
        transition: background-color 0.3s ease;
    }

    #ship-to-different-address-checkbox:checked+label .checkmark {
        background-color: #007bff;
    }

    #ship-to-different-address-checkbox:checked+label .checkmark:after {
        content: '';
        position: absolute;
        left: 5px;
        top: 1px;
        width: 5px;
        height: 10px;
        border: solid #fff;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    /* Textarea ghi chú */
    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .shipping_address .col-md-6 {
            width: 100%;
        }
    }

    /* Phần còn lại của CSS giữ nguyên */
    .cart_table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    /* ... (Giữ nguyên các phần CSS khác như bảng giỏ hàng, nút đặt hàng, v.v.) */
</style>
<div class="breadcumb-wrapper" data-bg-src="{{asset('client/assets/img/breadcrumb/breadcrumb-1-1.png')}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Check Out</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Check Out</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="vs-checkout-wrapper space">
    <div class="container">
        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="woocommerce-form-login-toggle">
                    <div class="woocommerce-info"><i class="fas fa-info-circle"></i> Returning customer? <a href="#" class="showlogin"> Click here to login</a>
                    </div>
                </div>
                <div class="form-area">
                <div class="row">
                    <div class="col-lg-4">
                        <form action="#" class="form-login">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username or email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="remembermylogin">
                                    <label for="remembermylogin">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="vs-btn shadow-none">Login</button>
                                <p class="fs-xs mt-2 mb-0">
                                    <a class="reset-color" href="#">Lost your password?</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="woocommerce-form-login-toggle">
                    <div class="woocommerce-info"><i class="fas fa-info-circle"></i> Returning customer? <a href="#" class="showlogin"> Click here to login</a>
                    </div>
                </div>
                <div class="form-area">
                <div class="row">
                    <div class="col-lg-4">
                        <form action="#" class="form-login">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Write your coupon code">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="vs-btn">Apply Coupon Code</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
        </div>
        {{-- <form action="{{ route('bill') }}" method="POST">
        @csrf
        <input type="text" name="hello">
        <button type="submit">hel</button>
        </form> --}}

        <form action="{{ route('order') }}" method="POST">
            @csrf
            <h4 class="mt-4 pt-lg-2">Thông tin nhận hàng</h4>

            <div class=" shipping_address">

                <button class="btn btn-primary mb-3" type="button" data-bs-toggle="modal" data-bs-target="#addressModal" onclick="openAddressModal()">Thêm địa chỉ mới</button>

                <div class="list-group mb-4">
                    @foreach ($addresses as $address)
                    <div id="address-item-{{ $address->id }}" class="list-group-item d-flex justify-content-between align-items-start mt-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $address->full_name }} - {{ $address->phone }}</div>
                            {{ $address->address }}, {{ $address->ward }}, {{ $address->district }}, {{ $address->province }}
                            <br>
                            <small>Email: {{ $address->email }} | Ghi chú: {{ $address->note }}</small>
                            @if ($address->is_default)
                            <span class="badge bg-success ms-2">Mặc định</span>
                            @endif
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="editAddress({{ $address }})">Sửa</button>

                            <button type="button" class="btn btn-sm btn-outline-danger"
                                onclick="deleteAddress({{ $address->id }})">Xóa</button>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <table class="cart_table mb-20">
                <thead>
                    <tr>
                        <th class="cart-col-image">Hình ảnh</th>
                        <th class="cart-col-productname">Tên sản phẩm</th>
                        <th class="cart-col-price">Giá sản phẩm</th>
                        <th class="cart-col-quantity">Số lượng</th>
                        <th class="cart-col-total">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $subtotal = 0;
                    @endphp

                    @foreach ($cart as $item)
                    @php
                    $total = $item->quantity * $item->price;
                    $subtotal += $total;
                    @endphp
                    <tr class="cart_item">
                        <td data-title="Product">
                            <a class="cart-productimage" href="shop-details.html">
                                <img width="91" height="91" src="{{ $item->image }}" alt="Image">
                            </a>
                        </td>
                        <td data-title="Name">
                            <a class="cart-productname" href="shop-details.html">{{ $item->name }}</a>
                            <input type="hidden" name="products[{{ $item->id }}][id]" value="{{ $item->id_product }}">
                            <input type="hidden" name="products[{{ $item->id }}][quantity]" value="{{ $item->quantity }}">
                            <input type="hidden" name="products[{{ $item->id }}][price]" value="{{ $item->price }}">
                            <input type="hidden" name="products[{{ $item->id }}][variant_id]" value="{{ $item->variant_id }}">
                        </td>
                        <td data-title="Price">
                            <span class="amount"><bdi>{{ number_format($item->price, 0, ',', '.') }}đ</bdi></span>
                        </td>
                        <td data-title="Quantity">
                            <strong class="product-quantity">{{ $item->quantity }}</strong>
                        </td>
                        <td data-title="Total">
                            <span class="amount"><bdi>{{ number_format($total, 0, ',', '.') }}đ</bdi></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="checkout-ordertable">
                    <tr class="cart-subtotal">
                        <th>Tạm tính</th>
                        <td data-title="Tạm tính" colspan="4">
                            <span class="woocommerce-Price-amount amount">
                                <bdi id="subtotal-amount">{{ number_format($subtotal, 0, ',', '.') }}đ</bdi>
                            </span>
                        </td>
                    </tr>

                    <!-- Phí vận chuyển -->
                    <tr class="woocommerce-shipping-totals shipping">
                        <th>Phí vận chuyển</th>
                        <td data-title="Phí vận chuyển" colspan="4">
                            <span id="shipping-fee">{{ number_format(30000, 0, ',', '.') }}đ</span>
                            <span id="shipping-discount" style="color:red; display:none;">(-<span id="discount-amount">0</span>đ)</span>
                        </td>
                    </tr>

                    <!-- Chọn mã giảm giá -->
                    <tr class="woocommerce-shipping-totals shipping">
                        <th>Mã giảm giá</th>
                        <td colspan="4">
                            <select id="voucher-select" name="voucher_id" class="form-control">
                                <option value="0" selected>Chọn mã giảm giá</option>
                                @foreach ($vouchers as $voucher)
                                <option value="{{ $voucher->id }}"  
                                    data-value="{{ $voucher->value }}"  
                                    data-type="{{ $voucher->voucher_type }}"
                                    data-min="{{ $voucher->min_order_value }}"
                                    data-max="{{ $voucher->max_discount_value ?? null }}">
                                    {{ $voucher->title }} -
                                    @if ($voucher->voucher_type == 'freeship')
                                    Giảm {{ number_format(min($voucher->value, 30000), 0, ',', '.') }}đ phí vận chuyển
                                    @elseif ($voucher->voucher_type == 'discount')
                                    Giảm {{ number_format($voucher->value, 0, ',', '.') }}đ
                                    (ĐH tối thiểu {{ number_format($voucher->min_order_value, 0, ',', '.') }}đ)
                                    @endif
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <!-- Tổng cộng -->
                    <tr class="order-total">
                        <th>Tổng cộng</th>
                        <td data-title="Tổng cộng" colspan="4">
                            <strong>
                                <span class="woocommerce-Price-amount amount">
                                    <bdi id="total-price">{{ number_format($subtotal + 30000, 0, ',', '.') }}đ</bdi>
                                </span>
                            </strong>
                        </td>
                    </tr>
                </tfoot>
            </table>

            <!-- Các trường ẩn cần thiết -->
            <input type="hidden" name="subtotal" id="input-subtotal" value="{{ $subtotal }}">
            <input type="hidden" name="shipping_fee" id="input-shipping-fee" value="30000">
            <input type="hidden" name="discount_amount" id="input-discount-amount" value="0">
            {{-- <input type="hidden" name="voucher_id" id="input-voucher-id" value="0"> --}}
            <input type="hidden" name="total_price" id="input-total-price" value="{{ $subtotal + 30000 }}">
            <div class="mt-lg-3">
                <div class="woocommerce-checkout-payment">
                    <ul class="wc_payment_methods payment_methods methods">
                        <li class="wc_payment_method payment_method_bacs">
                            <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">
                            <label for="payment_method_bacs">Thanh toán khi nhận hàng</label>
                            <div class="payment_box payment_method_bacs">
                                <p>Thanh toán khi nhận hàng (COD)</p>
                            </div>
                        </li>
                        <li class="wc_payment_method payment_method_vnpay">
                            <input id="payment_method_vnpay" type="radio" class="input-radio" name="payment_method" value="vnpay" onchange="updateFormAction(this)">
                            <label for="payment_method_vnpay">Thanh toán qua VNPay <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/10/Icon-VNPAY-QR.png" alt="VNPay" style="height: 32px;"></label>
                            <div class="payment_box payment_method_vnpay">
                                <p>Thanh toán qua cổng thanh toán VNPay - Hỗ trợ thanh toán qua QR Code, thẻ ATM, thẻ tín dụng</p>
                            </div>
                        </li>
                    </ul>
                    <div class="form-row place-order">
                        <button type="submit" class="vs-btn style-1">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('address.store') }}" id="addressForm">
                @csrf
                <input type="hidden" name="id" id="address_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addressModalLabel">Thêm địa chỉ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Họ tên" required>
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại" required>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="province" id="province" class="form-control" placeholder="Tỉnh / Thành phố" required>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="district" id="district" class="form-control" placeholder="Quận / Huyện" required>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="ward" id="ward" class="form-control" placeholder="Phường / Xã" required>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="address" id="address" class="form-control" placeholder="Số nhà, tên đường" required>
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="note" id="note" class="form-control" placeholder="Ghi chú (không bắt buộc)"></textarea>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="is_default" value="1" id="is_default">
                            <label class="form-check-label" for="is_default">Đặt làm địa chỉ mặc định</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu địa chỉ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Thiết lập action form ban đầu dựa trên radio button được chọn
    document.addEventListener('DOMContentLoaded', function() {
        var selectedPayment = document.querySelector('input[name="payment_method"]:checked');
        if (selectedPayment) {
            updateFormAction(selectedPayment);
        }
    });
    document.getElementById('voucher-select').addEventListener('change', function() {
        var subtotal = parseFloat({{$subtotal}});
        var defaultShippingFee = 30000;
        var selectedVoucher = this.options[this.selectedIndex];
        var totalPrice = subtotal + defaultShippingFee;
        var newShippingFee = defaultShippingFee;
        var discount = 0;

        // Reset về giá trị ban đầu nếu không chọn voucher
        if (this.value == "0") {
            document.getElementById('shipping-fee').textContent =
                new Intl.NumberFormat('vi-VN').format(defaultShippingFee) + 'đ';
            document.getElementById('shipping-discount').style.display = 'none';
            document.getElementById('total-price').textContent =
                new Intl.NumberFormat('vi-VN').format(totalPrice) + 'đ';
            return;
        }

        // Lấy thông tin voucher
        var voucherValue = parseFloat(selectedVoucher.getAttribute('data-value'));
        var voucherType = selectedVoucher.getAttribute('data-type');
        var minOrderValue = parseFloat(selectedVoucher.getAttribute('data-min'));
        var maxDiscount = selectedVoucher.getAttribute('data-max') ?
            parseFloat(selectedVoucher.getAttribute('data-max')) : null;

        // Kiểm tra điều kiện đơn hàng tối thiểu
        if (subtotal < minOrderValue) {
            alert('Đơn hàng phải có giá trị tối thiểu ' +
                new Intl.NumberFormat('vi-VN').format(minOrderValue) +
                'đ để áp dụng voucher này');
            this.value = "0";
            return;
        }

        // Xử lý từng loại voucher
        if (voucherType === 'freeship') {
            // Voucher freeship - chỉ giảm phí ship, không trừ vào tổng đơn hàng
            discount = Math.min(voucherValue, defaultShippingFee);
            newShippingFee = defaultShippingFee - discount;

            // Hiển thị phí ship mới và số tiền được giảm
            document.getElementById('shipping-fee').textContent =
                new Intl.NumberFormat('vi-VN').format(newShippingFee) + 'đ';
            document.getElementById('discount-amount').textContent =
                new Intl.NumberFormat('vi-VN').format(discount);
            document.getElementById('shipping-discount').style.display = 'inline';

            // Tổng đơn hàng = subtotal + phí ship mới
            totalPrice = subtotal + newShippingFee;
        } else if (voucherType === 'discount') {
            // Voucher discount - giảm trực tiếp vào subtotal
            if (maxDiscount) {
                discount = Math.min(voucherValue, maxDiscount, subtotal);
            } else {
                discount = Math.min(voucherValue, subtotal);
            }
            // Tổng đơn hàng = (subtotal - discount) + phí ship
            totalPrice = (subtotal - discount) + defaultShippingFee;
        }
        document.querySelector('#input-total-price').value = totalPrice;
        // Cập nhật giao diện
        document.getElementById('total-price').textContent =
            new Intl.NumberFormat('vi-VN').format(totalPrice) + 'đ';

        // Hiển thị thông báo
        var voucherMessage = 'Áp dụng voucher thành công!\n';
        if (voucherType === 'freeship') {
            voucherMessage += 'Đã giảm ' + new Intl.NumberFormat('vi-VN').format(discount) +
                'đ phí vận chuyển (Còn ' + new Intl.NumberFormat('vi-VN').format(newShippingFee) + 'đ)';
        } else {
            voucherMessage += 'Đã giảm ' + new Intl.NumberFormat('vi-VN').format(discount) +
                'đ vào giá trị đơn hàng';
        }
        toastr.success(voucherMessage);
    });
</script>
<script>
    function openAddressModal() {
        document.getElementById('addressForm').reset();
        document.getElementById('addressModalLabel').innerText = "Thêm địa chỉ";
        document.getElementById('address_id').value = "";
        document.getElementById('is_default').checked = false;
    }

    function editAddress(data) {
        openAddressModal();
        document.getElementById('addressModalLabel').innerText = "Cập nhật địa chỉ";
        document.getElementById('address_id').value = data.id;
        document.getElementById('full_name').value = data.full_name;
        document.getElementById('email').value = data.email;
        document.getElementById('phone').value = data.phone;
        document.getElementById('province').value = data.province;
        document.getElementById('district').value = data.district;
        document.getElementById('ward').value = data.ward;
        document.getElementById('address').value = data.address;
        document.getElementById('note').value = data.note ?? '';
        document.getElementById('is_default').checked = data.is_default == 1;
        new bootstrap.Modal(document.getElementById('addressModal')).show();
    }
</script>

<script>
    function deleteAddress(id) {
        if (confirm('Bạn chắc chắn muốn xóa?')) {
            $.ajax({
                url: 'http://127.0.0.1:8000/address/' + id,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#address-item-' + id).remove();
                    toastr.success('Xóa địa chỉ thành công!');
                },
                error: function (xhr) {
                 toastr.error('Có lỗi xảy ra khi xóa địa chỉ!');
                 alert(JSON.stringify(xhr.responseJSON));    
                }
            });
        }
    }
</script>

@endsection