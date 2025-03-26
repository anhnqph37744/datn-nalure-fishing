@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Danh sách giá trị thuộc tính</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Dashboard</a>
                    </li>

                    <li class="active">
                        <strong>Danh sách giá trị thuộc tính</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

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
                <a href="{{ route('admin.attribute_value.create') }}" class="btn btn-primary mb-3">Tạo Giá Trị Thuộc Tính Mới</a>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Thuộc tính</th>
                                    <th>Giá trị thuộc tính</th>
                                    <th>Thao Tác</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attribute as $attributeValue)
                                <tr class="gradeX">
                                    <td>{{ $attributeValue->id }}</td>
                                    <td>{{ $attributeValue->attribute->name }}</td>
                                    <td>{{ $attributeValue->value }}</td>
                                    <td>
                                        <a href="{{route('admin.attribute_value.edit',$attributeValue->id)}}"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{route('admin.attribute_value.destroy',$attributeValue->id)}}"
                                            method="POST" style="display:inline;">
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
