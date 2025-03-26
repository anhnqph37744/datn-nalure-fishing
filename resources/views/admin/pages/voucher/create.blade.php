@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>THÊM THUỘC TÍNH</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Thuộc Tính</a>
                    </li>
                    <li class="active">
                        <strong>Thêm Thuộc Tính</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thuộc tính</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Trở Về Danh Sách</a>
                            </li>
                            <li><a href="#">Về Trang Chủ</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">Thêm Thuộc Tính</h3>
                            <p>Thêm thuộc tính cho sản phẩm của bạn</p>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                              
                            <form role="form" action="{{route('admin.voucher.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="code">Mã Voucher</label>
                                    <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="title">Tiêu Đề</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="voucher_type">Loại Voucher</label>
                                    <select name="voucher_type" id="voucher_type" class="form-control" required>
                                        <option value="discount" {{ old('voucher_type') == 'discount' ? 'selected' : '' }}>Giảm Giá</option>
                                        <option value="freeship" {{ old('voucher_type') == 'freeship' ? 'selected' : '' }}>Miễn Phí Vận Chuyển</option>
                                    </select>
                                    @error('voucher_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="value">Giá Trị Voucher</label>
                                    <input type="number" step="0.01" name="value" id="value" class="form-control" value="{{ old('value') }}" required>
                                    @error('value')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="discount_type">Loại Giảm Giá</label>
                                    <select name="discount_type" id="discount_type" class="form-control" required>
                                        <option value="amount" {{ old('discount_type') == 'amount' ? 'selected' : '' }}>Số Tiền</option>
                                        <option value="percent" {{ old('discount_type') == 'percent' ? 'selected' : '' }}>Phần Trăm</option>
                                    </select>
                                    @error('discount_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="min_order_value">Giá Trị Đơn Hàng Tối Thiểu</label>
                                    <input type="number" step="0.01" name="min_order_value" id="min_order_value" class="form-control" value="{{ old('min_order_value') }}">
                                    @error('min_order_value')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="max_discount_value">Giảm Giá Tối Đa</label>
                                    <input type="number" step="0.01" name="max_discount_value" id="max_discount_value" class="form-control" value="{{ old('max_discount_value') }}">
                                    @error('max_discount_value')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="start_date">Ngày Bắt Đầu</label>
                                    <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="end_date">Ngày Kết Thúc</label>
                                    <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="limit">Giới Hạn</label>
                                    <input type="number" name="limit" id="limit" class="form-control" value="{{ old('limit') }}" required>
                                    @error('limit')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="is_active">Trạng Thái</label>
                                    <select name="is_active" id="is_active" class="form-control" required>
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Đang Hoạt Động</option>
                                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Không Hoạt Động</option>
                                    </select>
                                    @error('is_active')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <button type="submit" class="btn btn-primary">Tạo Voucher</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h4>Hãy thêm thuộc tính cho sản phẩm</h4>
                            <p>Để website của bạn phong phú hơn </p>
                            <p class="text-center">
                                <span><i class="fa fa-sign-in big-icon"></i></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
