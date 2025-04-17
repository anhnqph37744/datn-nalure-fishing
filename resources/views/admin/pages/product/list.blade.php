@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Danh sách sản phẩm</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="active">
                        <strong>Danh sách sản phẩm</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách Sản Phẩm</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Thêm sản phẩm
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng đã bán</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price, 0, ',', '.') }}đ</td>
                                    <td>{{ $product->order_details_sum_quantity ?? 0 }}</td>
                                    <td>
                                        @if($product->order_details_sum_quantity > 0)
                                            <span class="label label-primary">Đã bán</span>
                                        @else
                                            <span class="label label-default">Chưa bán</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->order_details_sum_quantity == 0)
                                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        @else
                                            <span class="text-muted">Không thể chỉnh sửa</span>
                                        @endif
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
