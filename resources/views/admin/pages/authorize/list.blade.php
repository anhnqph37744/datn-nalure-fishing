@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Danh sách quyền của người dùng</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Dashboard</a>
                    </li>

                    <li class="active">
                        <strong>Danh sách quyền đc cấp</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách Quyền Được Cấp</h5>
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
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên Tài Khoản</th>
                                    <th>Quyền Hạn</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userRoles as $ur)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ur->user->name }}</td>
                                        <td>{{ $ur->role->name }}</td>
                                        <td>
                                            <a href="{{route('admin.user-role.edit',$ur->id)}}" class="btn btn-warning">Sửa</a>
                                            <form action="{{ route('admin.user-role.destroy', $ur->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Xóa vai trò này?')">Xóa</button>
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
