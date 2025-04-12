@extends('admin.layouts.main')
@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Danh sách sản phẩm</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>

                    <li class="active">
                        <strong>Danh sách sản phẩm</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
                @if (session('messages'))
                    <div class="alert alert-success">
                        {{ session('messages') }}
                    </div>
                @endif

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Danh Sách Sản Phẩm</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ route('admin.product.create') }}">Thêm Sản Phẩm</a></li>
                            <li><a href="{{ url('/dashboard') }}">Về Trang Chủ</a></li>
                        </ul>

                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá chung</th>
                                    <th>Hình ảnh</th>
                                    <th>Ảnh phân loại</th>
                                    <th>Tags</th>
                                    <th>Thương hiệu</th>
                                    <th>Danh mục</th>
                                    <th>Phân loại</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr class="gradeX">
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>{{ Str::limit($product->name, 100, '...') }}</td>
                                        <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                                        <td class="center">
                                            <img src="{{ $product->image }}" width="100px" alt="">
                                        </td>
                                        <td class="center">
                                            @foreach ($product->images as $image)
                                                <div class="box-variant-image">
                                                    <img src="{{ $image->image_url }}" width="50px" alt="">
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach (explode(',', $product->tags) as $tag)
                                                @php
                                                    $colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary', 'dark'];
                                                    $randomColor = $colors[array_rand($colors)];
                                                @endphp
                                                <span class="badge bg-{{ $randomColor }}">{{ trim($tag) }}</span>
                                            @endforeach
                                        </td>

                                        <td>
                                            {{ $product->brand->name }}
                                        </td>
                                        <td>
                                            {{ $product->category->name }}
                                        </td>
                                        <td>
                                            @foreach ($product->variant as $v)
                                                <div>
                                                    <strong>SKU:</strong> {{ $v->sku }} <br>
                                                    <strong>Giá:</strong> {{ number_format($v->price, 0, ',', '.') }} VNĐ
                                                    <br>
                                                    <strong>Số lượng:</strong> {{ $v->quantity }} <br>
                                                    <strong>Thuộc tính:</strong>
                                                    @if (!empty($v->varianAttributeValue))
                                                        @foreach ($v->varianAttributeValue as $attr)
                                                            <span class="badge bg-warning">
                                                                {{ $attr->attribute->name ?? 'N/A' }}:
                                                                {{ $attr->attributeValue->value ?? 'N/A' }}
                                                            </span>
                                                        @endforeach
                                                    @else
                                                        <span class="text-muted">Không có thuộc tính</span>
                                                    @endif
                                                    <hr>
                                                </div>
                                            @endforeach

                                        </td>
                                        <td>
                                            <input type="checkbox" class="js-switch" id="checkbox-status-{{$key}}"
                                                {{ $product->active ? 'checked' : '' }} />
                                        </td>
                                        <td>
                                            <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('admin.product.destroy',$product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Bạn muốn xoá sản phẩm này không !')"><i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá chung</th>
                                    <th>Hình ảnh</th>
                                    <th>Ảnh phân loại</th>
                                    <th>Tags</th>
                                    <th>Thương hiệu</th>
                                    <th>Danh mục</th>
                                    <th>Phân loại</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
