@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Thêm Danh Mục</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Danh mục</a>
                    </li>
                    <li class="active">
                        <strong>Thêm Danh Mục</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh mục</h5>
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
                            
                            <form role="form" action="{{ route('admin.attribute.update', $attribute->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group"><label>Tên Thuộc tính</label> <input type="text"
                                        placeholder="Nhập tên thuộc tính" class="form-control" value="{{ old('name', $attribute->name) }}" name="name""
                                        name="name"></div>
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Cập nhật</strong></button>

                                </div>
                                
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
