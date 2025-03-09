@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Sửa Vai Trò</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Vai trò</a>
                    </li>
                    <li class="active">
                        <strong>Sửa vai trò</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Vai Trò</h5>
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
                            <h3 class="m-t-none m-b">Sửa Vai Trò</h3>
                            <p>Thêm vai trò cho tài khoản của bạn</p>
                            <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tên Vai Trò</label>
                                    <input type="text" placeholder="Nhập tên vai trò" class="form-control" name="name"
                                        value="{{ old('name', $role->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <textarea class="form-control" name="description">{{ old('description', $role->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs"
                                    type="submit"><strong>Sửa</strong></button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h4>Hãy thêm vai trò cho tài khoản </h4>
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
