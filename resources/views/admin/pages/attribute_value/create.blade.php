@extends('admin.layouts.main')
@section('main')
<style>
.main {
    background-color: #f5f5f5;
    padding: 20px;
}

.page-heading {
    background-color: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.breadcrumb {
    background: transparent;
    margin-bottom: 0;
}

.breadcrumb a {
    color: #1ab394;
    transition: color 0.3s;
}

.breadcrumb a:hover {
    color: #18a689;
    text-decoration: none;
}

.ibox {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.ibox-title {
    border-radius: 8px 8px 0 0;
    border-bottom: 1px solid #e7eaec;
    padding: 15px;
}

.ibox-content {
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    border-radius: 4px;
    border: 1px solid #e5e6e7;
    padding: 8px 12px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-control:focus {
    border-color: #1ab394;
    box-shadow: 0 0 0 0.2rem rgba(26,179,148,0.25);
}

.form-select {
    border-radius: 4px;
    border: 1px solid #e5e6e7;
    padding: 8px 12px;
    width: 100%;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-select:focus {
    border-color: #1ab394;
    box-shadow: 0 0 0 0.2rem rgba(26,179,148,0.25);
}

.btn-primary {
    background-color: #1ab394;
    border-color: #1ab394;
    padding: 8px 20px;
    border-radius: 4px;
    transition: all 0.3s;
}

.btn-primary:hover {
    background-color: #18a689;
    border-color: #18a689;
    transform: translateY(-1px);
}

.text-danger {
    color: #ed5565;
    font-size: 0.9em;
    margin-top: 5px;
}

.ibox-tools a {
    color: #676a6c;
    transition: color 0.3s;
}

.ibox-tools a:hover {
    color: #1ab394;
}

.dropdown-menu {
    border-radius: 4px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.dropdown-menu > li > a {
    padding: 8px 20px;
    color: #676a6c;
    transition: all 0.3s;
}

.dropdown-menu > li > a:hover {
    background-color: #f5f5f5;
    color: #1ab394;
}

.big-icon {
    font-size: 50px;
    color: #1ab394;
    margin-top: 20px;
}
</style>
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>THÊM GIÁ TRỊ THUỘC TÍNH</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li>
                        <a>Thuộc Tính</a>
                    </li>
                    <li class="active">
                        <strong>Thêm Giá Trị Thuộc Tính</strong>
                    </li>
                </ol>
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
                            <li><a href="#">Trở Về Danh Sách</a></li>
                            <li><a href="#">Về Trang Chủ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">Thêm Giá Trị Thuộc Tính</h3>
                            <p>Thêm giá trị thuộc tính cho sản phẩm của bạn</p>
        
                            <form role="form" action="{{ route('admin.attribute_value.store') }}" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="attribute_id">Chọn thuộc tính:</label>
                                    <select class="form-select form-select-sm" name="attribute_id" id="attribute_id" aria-label="Chọn thuộc tính">
                                        <option value="" disabled selected>Chọn thuộc tính</option>
                                        @foreach($attributeValue as $attributeValue)
                                            <option value="{{ $attributeValue->id }}">{{ $attributeValue->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('attribute_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="value">Tên giá trị Thuộc Tính</label>
                                    <input type="text" placeholder="Nhập giá trị thuộc tính" class="form-control" value="{{ old('value') }}" name="value">
                                    @error('value')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Thêm</strong></button>
                            </form>
                        </div>
                        
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
@endsection
