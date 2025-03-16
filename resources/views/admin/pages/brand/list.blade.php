@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Danh sách thương hiệu</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Dashboard</a>
                    </li>

                    <li class="active">
                        <strong>Danh sách thương hiệu</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách Thương Hiệu</h5>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên Thương Hiệu</th>
                                    <th>Ảnh minh hoạ</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr class="gradeX">
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            @if ($brand->image)
                                                <img src="{{ asset($brand->image) }}" width="80">
                                            @else
                                                Không có ảnh
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                                class="btn btn-warning btn-sm">Sửa</a>
                                            <form action="{{ route('admin.brand.destroy', $brand->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Xóa thương hiệu này?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
