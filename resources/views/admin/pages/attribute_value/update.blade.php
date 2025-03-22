@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>SỬA GIÁ TRỊ THUỘC TÍNH</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Thuộc Tính</a>
                    </li>
                    <li class="active">
                        <strong>Sửa Giá Trị Thuộc Tính</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Giá trị Thuộc tính</h5>
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
                            <h3 class="m-t-none m-b">Sửa Giá Trị Thuộc Tính</h3>
                            <p>Sửa giá trị thuộc tính cho sản phẩm của bạn</p>

                            <form role="form" action="{{ route('admin.attribute_value.update', $attributeValue->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                <label for="attribute_id">Chọn thuộc tính:</label>
                                <select class="form-select" name="attribute_id" id="attribute_id">
                                    
                                    @foreach($attribute as $attribute)
                                    <option value="{{ $attribute->id }}" 
                                        {{ $attributeValue->attribute_id == $attribute->id ? 'selected' : '' }}>
                                        {{ $attribute->name }}
                                    </option>
                                    @endforeach
                                </div>
                                </select>
                                @error('attribute_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                                <div class="form-group"><label>Tên giá trị Thuộc Tính</label> <input type="text"
                                         class="form-control" value="{{ old('value', $attributeValue->value) }}"
                                        name="value"></div>
                                {{-- @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror --}}
                                @error('value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs"
                                    type="submit"><strong>Thêm</strong></button>

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
