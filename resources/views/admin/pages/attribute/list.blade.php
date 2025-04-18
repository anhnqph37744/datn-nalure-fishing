@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Danh sách thuộc tính</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Dashboard</a>
                    </li>

                    <li class="active">
                        <strong>Danh sách thuộc tính</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách Thuộc Tính</h5>
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
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <form action="{{ route('admin.attribute.index') }}" method="GET" class="form-inline">
                                <div class="form-group mx-2">
                                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên..." value="{{ request('search') }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                <a href="{{ route('admin.attribute.index') }}" class="btn btn-default mx-2">Đặt lại</a>
                            </form>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('admin.attribute.create') }}" class="btn btn-primary">Tạo Mới Thuộc Tính</a>
                        </div>
                    </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Thuộc Tính</th>
                                    <th>Thao Tác</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attribute as $attribute)
                                <tr class="gradeX">
                                    <td>{{ $attribute->id }}</td>
                                    <td>{{ $attribute->name }}</td>
                                    <td>
                                        <a href="{{route('admin.attribute.edit',$attribute->id)}}"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        @if($attribute->values->count() == 0)
                                        <form action="{{route('admin.attribute.destroy',$attribute->id)}}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Xóa thuộc tính này?')">Xóa</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
