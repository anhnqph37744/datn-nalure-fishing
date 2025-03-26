@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                
                <h2>Danh sách voucher</h2>
                
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Dashboard</a>
                    </li>

                    <li class="active">
                        <strong>Danh sách voucher</strong>
                    </li>
                    
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách voucher</h5>
                    
                    
                    <div class="ibox-tools">
                        
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Thêm Danh Mục</a></li>
                            <li><a href="#">Về Trang Chủ</a></li>
                        </ul>
                        

                    </div>
                </div>
                
                <div class="ibox-content">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary mb-3">Tạo Voucher Mới</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>MÃ VOUCHER</th>
                                    <th>TÊN VOUCHER</th>
                                    <th>LOẠI VOUCHER</th>
                                    <th>GIÁ TRỊ VOUCHER</th>
                                    <th>LOẠI VOUCHER</th>
                                    <th>GIÁ TRỊ ĐƠN HÀNG TỐI THIỂU</th>
                                    <th>GIÁ TRỊ GIẢM GIÁ TỐI ĐA</th>
                                    <th>THỜI GIAN BẮT ĐẦU VOUCHER</th>
                                    <th>THỜI GIAN KẾT THÚC VOUCHER</th>
                                    <th>SỐ LƯỢNG VOUCHER</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>Thao Tác</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($voucher as $voucher)
                                    <tr class="gradeX">
                                        <td>{{ $voucher->id }}</td>
                                        <td>{{ $voucher->code }}</td>
                                        <td>{{ $voucher->title }}</td>
                                        <td>{{ ucfirst($voucher->voucher_type) }}</td>
                                        <td>{{ $voucher->value }}</td>
                                        <td>{{ $voucher->discount_type }}</td>
                                        <td>{{ $voucher->min_order_value }}</td>
                                        <td>{{ $voucher->max_discount_value }}</td>
                                        <td>{{ $voucher->start_date }}
                                        </td>
                                        <td>{{ $voucher->end_date }}
                                        </td>
                                        
                                        <td>{{ $voucher->limit }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $voucher->is_active ? 'badge-success' : 'badge-danger' }}">
                                                {{ $voucher->is_active ? 'Hoạt động' : 'Không hoạt động' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.voucher.edit', parameters: $voucher->id) }}"
                                                class="btn btn-warning btn-sm">Sửa</a>
                                            <form action="{{ route('admin.voucher.destroy', $voucher->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Xóa danh mục này?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
