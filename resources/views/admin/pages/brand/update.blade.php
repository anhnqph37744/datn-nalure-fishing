@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Thêm Thương Hiệu</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Thương hiệu</a>
                    </li>
                    <li class="active">
                        <strong>Thêm Thương Hiệu</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thương hiệu</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Trở Về Danh Sách</a></li>
                            <li><a href="#">Về Trang Chủ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">Thêm Thương Hiệu</h3>
                            <p>Thêm thương hiệu cho sản phẩm của bạn</p>

                            {{-- Hiển thị thông báo thành công --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- Hiển thị lỗi validate --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form role="form" action="{{ route('admin.brand.update', $brand->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tên Thương Hiệu</label>
                                    <input type="text" placeholder="Nhập tên thương hiệu" class="form-control"
                                        value="{{ old('name', $brand->name) }}" name="name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <img src="{{ asset($brand->image) }}"
                                    alt="" width="100px">
                                <div class="form-group">
                                    <label>Ảnh Thương Hiệu</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                        <strong>Sửa thương hiệu</strong>
                                    </button>
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-6">
                            <h4>Hãy thêm thương hiệu cho sản phẩm</h4>
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
