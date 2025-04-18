@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>DANH SÁCH GIÁ TRỊ THUỘC TÍNH</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Thuộc Tính</a>
                    </li>
                    <li class="active">
                        <strong>Danh Sách Giá Trị Thuộc Tính</strong>
                    </li>
                </ol>
            </div>
        </div>

        <!-- Form tìm kiếm và lọc -->
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox" style="margin-top: 20px">
                    <div class="ibox-title">
                        <h5>Tìm Kiếm và Lọc</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="GET" action="{{ route('admin.attribute_value.index') }}" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tìm theo tên giá trị</label>
                                        <input type="text" name="search" class="form-control" placeholder="Nhập tên giá trị..." value="{{ request('search') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lọc theo thuộc tính</label>
                                        <select class="form-control" name="attribute_id">
                                            <option value="">Tất cả thuộc tính</option>
                                            @foreach($attributes as $attr)
                                                <option value="{{ $attr->id }}" {{ request('attribute_id') == $attr->id ? 'selected' : '' }}>
                                                    {{ $attr->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="margin-top: 25px;">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                        <a href="{{ route('admin.attribute_value.index') }}" class="btn btn-default"><i class="fa fa-refresh"></i> Đặt Lại</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách Giá Trị Thuộc Tính</h5>
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
                <a href="{{ route('admin.attribute_value.create') }}" class="btn btn-primary mb-3" style="margin-bottom: 15px; display: inline-block; padding: 8px 16px; font-weight: 500; transition: all 0.3s ease;"><i class="fa fa-plus-circle"></i> Tạo Giá Trị Thuộc Tính Mới</a>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover custom-table">
                        <style>
                            .custom-table {
                                box-shadow: 0 0 20px rgba(0,0,0,.1);
                                border-radius: 8px;
                                overflow: hidden;
                                margin: 20px 0;
                                animation: fadeIn 0.5s ease-in-out;
                            }
                            <style>
                            .custom-table thead th {
                                background-color: #FFCC99;
                                color: #333;
                                font-weight: 600;
                                text-align: center;
                                padding: 15px;
                                border: 1px solid #ddd;
                                transition: all 0.3s ease;
                                position: relative;
                                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                            }
                            
                           
                            
                            .custom-table thead tr {
                                border-radius: 8px 8px 0 0;
                                overflow: hidden;
                            }
                            
                            .custom-table thead th:first-child {
                                border-top-left-radius: 8px;
                            }
                            
                            .custom-table thead th:last-child {
                                border-top-right-radius: 8px;
                            }
                            </style>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Thuộc tính</th>
                                    <th>Giá trị thuộc tính</th>
                                    <th>Thao Tác</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attribute_values as $attributeValue)
                                <tr class="gradeX">
                                    <td>{{ $attributeValue->id }}</td>
                                    <td>{{ $attributeValue->attribute->name }}</td>
                                    <td>{{ $attributeValue->value }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.attribute_value.edit',$attributeValue->id)}}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                                        <form action="{{route('admin.attribute_value.destroy',$attributeValue->id)}}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc muốn xóa giá trị thuộc tính này?')"><i class="fa fa-trash"></i> Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Phân trang -->
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            {{ $attribute_values->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
