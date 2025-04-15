@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>THÊM THUỘC TÍNH</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Thuộc Tính</a>
                    </li>
                    <li class="active">
                        <strong>Thêm Thuộc Tính</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thuộc tính</h5>
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
                           
                              
                            <form role="form" action="{{route('admin.attribute.store')}}" method="POST">
                                @csrf
                                <div class="form-group"><label>Tên Thuộc Tính</label> <input type="text"
                                        placeholder="Nhập tên thuộc tính" class="form-control" value="{{ old('name') }}"
                                        name="name"></div>
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Thêm</strong></button>

                                </div>
                            </form>
                            <div class="col-sm-6">
                                <h4>Hãy thêm thuộc tính cho sản phẩm</h4>
                                <p>Để website của bạn phong phú hơn</p>
                                <p class="text-center">
                                    <span><i class="fa fa-sign-in big-icon"></i></span>
                                </p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
