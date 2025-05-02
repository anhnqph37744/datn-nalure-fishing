@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Sửa Quyền Hạn</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Quyền Hạn</a>
                    </li>
                    <li class="active">
                        <strong>Sửa Quyền</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Sửa Quyền</h5>
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
                            <h3 class="m-t-none m-b">Sửa Quyền</h3>
                            <p>Thêm quyền hạn cho vai trò của bạn</p>
                            <form action="{{ route('admin.permission.update',$permission->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tên Quyền</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $permission->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <textarea class="form-control" name="description">{{ old('description', $permission->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Sửa</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h4>Hãy thêm quyền hạn cho cai trò</h4>
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
