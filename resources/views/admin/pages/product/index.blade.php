@extends('admin.layouts.main')
@section('main')
<style>


.content {
  display: flex;
  justify-content: center;
  align-items: center;
}

.visually-hidden {
  clip: rect(0 0 0 0);
  clip-path: inset(50%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

.checkbox-group {
  display: flex;
  flex-direction: row;
  gap: .75rem;
  justify-content: center;
  align-items: center;
  border: none;
}

.toggle {
  display: flex;
  min-width: 6rem;
  height: 3rem;
  border-radius: 25rem;
  padding: 0.25rem;
  transition: background 0.3s ease;
  background-color: #bababa; 
  position: relative;
}

.toggle::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 0.75rem;
  transform: translateY(-50%);
  width: 3rem;
  height: 3rem;
  border-radius: 50%;
  background-color: #444; 
  transition: opacity 0.3s ease, transform 0.3s ease;
}

.toggle::after {
  content: "";
  position: absolute;
  top: 50%;
  left: .85rem;
  transform: translateY(-50%);
  width: 3rem;
  height: 3rem;
  border-radius: 50%;
  background-color: #00ff94; 
  mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 61 45'%3E%3Cpath d='M48.7498 2.28142C51.3913 -0.359957 55.6739 -0.359921 58.3153 2.28153C60.7556 4.72181 60.9404 8.55699 58.8749 11.2134L58.8041 11.3044L58.3963 11.7663L27.5701 42.5925C25.1298 45.0327 21.2946 45.2175 18.6382 43.152L18.5472 43.0812L18.0853 42.6734L2.63175 27.2198C-0.00973761 24.5784 -0.00973773 20.2957 2.63175 17.6542C5.07203 15.2139 8.9072 15.0291 11.5636 17.0946L11.6546 17.1654L12.1164 17.5731L22.7871 28.2419L48.7498 2.28142C48.7498 2.28138 48.7497 2.28146 48.7498 2.28142Z'/%3E%3C/svg%3E") no-repeat center / 60%;
  -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 61 45'%3E%3Cpath d='M48.7498 2.28142C51.3913 -0.359957 55.6739 -0.359921 58.3153 2.28153C60.7556 4.72181 60.9404 8.55699 58.8749 11.2134L58.8041 11.3044L58.3963 11.7663L27.5701 42.5925C25.1298 45.0327 21.2946 45.2175 18.6382 43.152L18.5472 43.0812L18.0853 42.6734L2.63175 27.2198C-0.00973761 24.5784 -0.00973773 20.2957 2.63175 17.6542C5.07203 15.2139 8.9072 15.0291 11.5636 17.0946L11.6546 17.1654L12.1164 17.5731L22.7871 28.2419L48.7498 2.28142C48.7498 2.28138 48.7497 2.28146 48.7498 2.28142Z'/%3E%3C/svg%3E") no-repeat center / 60%;
  opacity: 0; /* Hidden by default */
  transition: opacity 0.3s ease, transform 0.3s ease;
}


.toggle:has(input[type="checkbox"]:checked) {
  background-color: #00ff94; 
}

.toggle:has(input[type="checkbox"]:checked)::after {
  opacity: 1; 
  transform: translate(75%, -50%);
}

.toggle:has(input[type="checkbox"]:checked)::before {
  background-color: #333;
  transform: translate(75%, -50%);
}


</style>
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
                    <div style="margin-bottom: 15px;">
                        <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm..." class="form-control">
                    </div>

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
                                <th>Số lượng đã bán</th>
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
                                    @php
                                    $totalSold = $product->orderDetails->sum('quantity');
                                    @endphp
                                    {{ $totalSold }} sản phẩm
                                    @if($totalSold > 0)
                                    <span class="badge bg-success">Đã bán</span>
                                    @else
                                    <span class="badge bg-warning">Chưa bán</span>
                                    @endif
                                </td>
                                <td>
                                <div class="content">
                                <div class="checkbox-group">
                                    <label class="toggle">
                                    <input type="checkbox" id="toggle" class="visually-hidden toggle-checked-status" data-id="{{ $product->id }}"  {{ $product->active == 1 ? 'checked' : '' }} >
                                    </label>
                                </div>
                                </div>
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
                                <th>Số lượng đã bán</th>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('searchInput');
        const table = document.querySelector('.dataTables-example tbody');
        const rows = table.getElementsByTagName('tr');

        input.addEventListener('keyup', function() {
            const filter = input.value.toLowerCase();
            for (let i = 0; i < rows.length; i++) {
                const rowText = rows[i].innerText.toLowerCase();
                if (rowText.indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    });
    const checkedBox = document.querySelectorAll('.toggle-checked-status'); 
       for (const element of checkedBox) {
         element.addEventListener('change',(ee)=>{
           let id = element.dataset.id;
           let status = element.checked ? 1 : 0;
           $.ajax({
             url: "{{ route('admin.product.active') }}",
             type: "GET",
             data: {
               id,
               status,
             },
             success: function(response) {
               toastr.success(response.message);
             },
             error: function(xhr, status, error) {
               console.error(error);
             }
           });
         })
       }    
</script>


@endsection
