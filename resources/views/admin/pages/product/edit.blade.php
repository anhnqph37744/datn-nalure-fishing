@extends('admin.layouts.main')
@section('main')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Thêm sản phẩm</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a>Sản phẩm</a>
                </li>
                <li class="active">
                    <strong>Sửa sản phẩm</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
        class="wrapper wrapper-content animated " style="position: relative;">
        @method('PUT')
        <div class="row">
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            Thông tin cơ bản sản phẩm</small>
                        </h5>

                    </div>
                    <div class="ibox-content">
                        @csrf
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input type="text" placeholder="Nhập tên sản phẩm"
                                class="form-control @error('name') custom-invalid @enderror"
                                value="{{ old('name', $product->name) }}" name="name">
                            @error('name')
                                <div class="custom-invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Mã sản phẩm</label>
                            <input type="text" placeholder="Nhập mã sản phẩm"
                                class="form-control "
                                value="{{ old('sku', $product->sku) }}" name="sku">
                            @error('sku')
                                <div class="custom-invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Giá Sản Phẩm</label>
                            <input type="text" placeholder="Nhập giá sản phẩm"
                                class="form-control @error('price') custom-invalid @enderror"
                                value="{{ old('price', $product->price) }}" name="price">
                            @error('price')
                                <div class="custom-invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số lượng </label>
                            <input type="text" placeholder="Nhập số lượng chung"
                                class="form-control @error('quantity') custom-invalid @enderror"
                                value="{{ old('quantity', $product->quantity) }}" name="quantity">
                            @error('quantity')
                                <div class="custom-invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số lượng cảnh báo (min)</label>
                            <input type="text" placeholder="Nhập số lượng cảnh báo sắp hết hàng" class="form-control"
                                value="{{ old('quantity_warning', $product->quantity_warning) }}" name="quantity_warning">
                        </div>
                        <div class="form-group">
                            <label>Cân nặng sản phẩm</label>
                            <input type="text" placeholder="Cân nặng" class="form-control"
                                value="{{ old('weight', $product->weight) }}" name="weight">
                        </div>

                        <div class="form-group">
                            <label for="">Tags</label>
                            <div class="tags-input" id="tags-container">
                                @foreach (explode(',', $product->tags) as $tag)
                                    <span>
                                        {{ $tag }}
                                        <button type="button" onclick="this.parentElement.remove()">x</button>
                                    </span>
                                @endforeach


                                <input type="text" id="tag-input" placeholder="Nhập tag và nhấn Enter">
                            </div>
                        </div>
                        <input type="hidden" name="tags" id="tags-hidden" value="{{ $product->tags }}">

                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea id="editor" name="description">{{ $product->description }}</textarea>
                        </div>

                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            Chọn danh mục và thương hiệu
                        </h5>

                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <label>Danh mục </label>
                            <select name="category_id" id=""
                                class="form-control @error('category_id') custom-invalid @enderror">
                                <option selected value="">Chọn Danh Mục</option>

                                @foreach ($category as $c)
                                    <option value="{{ $c->id }}"
                                        {{ $c->id === $product->category_id ? 'selected' : '' }}>{{ $c->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="custom-invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu </label>
                            <select name="brand_id" id=""
                                class="form-control @error('brand_id') custom-invalid @enderror">
                                <option selected value="">Chọn Thương Hiệu</option>
                                @foreach ($brand as $c)
                                    <option value="{{ $c->id }}"
                                        {{ $c->id === $product->brand_id ? 'selected' : '' }}>{{ $c->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="custom-invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            Hình ảnh mô tả sản phẩm
                        </h5>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">

                                    <div class="ibox-content">

                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="image-crop @error('image') custom-invalid @enderror">
                                                    <img src="{{ asset($product->image) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Ảnh xem trước</h4>
                                                <div
                                                    class="img-preview img-preview-sm @error('image') custom-invalid @enderror">
                                                </div>
                                                <p>
                                                    Bạn cần upload 1 hình ảnh để xem nó
                                                </p>
                                                <div class="btn-group">
                                                    <label title="Upload image file" for="inputImage"
                                                        class="btn btn-primary ">
                                                        <input type="file" name="image" id="inputImage"
                                                            class="hide">
                                                        Thêm ảnh chính của sản phẩm
                                                    </label>

                                                </div>


                                            </div>
                                        </div>
                                        @error('image')
                                            <div class="custom-invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <label style="font-weight:bold">Thêm hình ảnh nhỏ (multiple)</label>
                        <div class="row mt-5" style="margin-top: 10px">
                            <div class="container mt-4 upload-file-img">
                                <label title="Upload image file" for="fileInput">
                                    <input type="file" name="images[]" id="fileInput" multiple class="hide">
                                    Thêm ảnh sản phẩm nhỏ ( nhiều file)
                                </label>
                            </div>
                            <div class="image-preview border p-3 mt-3">
                                @foreach ($product->images as $item)
                                    <div class="image-container">
                                        <img src="{{ $item->image_url }}" alt="">
                                        <a class="remove-btn">&#10006;</a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group" style="margin-top: 10px">
                            <label for="">Thêm ảnh hướng dẫn chọn size ( Không bắt buộc )</label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Select file</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="instructional_images" />
                                </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                    data-dismiss="fileinput">Remove</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Biến thể sản phẩm</h5>
                        <div class="ibox-tools">
                            <input type="checkbox" checked class="js-switch" id="checkbox-status" />
                        </div>
                    </div>
                    <div class="ibox-content" id="box-variant-checked" style="display: block;">
                        <div class="form-group">
                            <label for="">Chọn thuộc tính cho biến thể</label>
                            <select id="attribute_id" class="form-control">
                                <option value="" selected>Chọn thuộc tính</option>
                                @foreach ($attribute as $a)
                                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="attribute-values-container"></div>
                        <button id="generate-variants" class="btn btn-primary mt-3">Tạo biến thể</button>

                        <div id="variants-container" class="mt-4"></div>

                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-success w-75 h-50 text-white"
            style="background-color: #1ab394; border-color: #1ab394; position: fixed; right: 23px; bottom: 5px; z-index: 100;">
            Hoàn tất thêm sản phẩm
        </button>

    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var selectedAttributes = {};

        $(document).ready(function() {
            let variants = @json($product->variant);

            if (variants.length > 0) {
                let variantHtml = '';

                variants.forEach((variant, index) => {
                    let attributesHtml = '';
                    variant.varian_attribute_value.forEach(attr => {
                        attributesHtml += `
                    <select class="variant-select" name="variants[${index}][attribute_values][]">
                        <option value="${attr.attribute_value.id}" selected>${attr.attribute_value.value}</option>
                    </select>
                `;
                    });

                    variantHtml += `
                <div class="variant-box border p-3 mb-2 d-flex align-items-center">
                    <div class="header-variant-box">
                        <div class="variant-select">${attributesHtml}</div>
                        <button type="button" class="btn btn-danger remove-variant ml-2">Xóa</button>
                    </div>
                    <div class="flex-grow-1">
                        <div class="box-variant-image-sku">
                            <div class="image-box">
                                <label for="variant-image-${index}">Chọn ảnh</label>
                                <input type="file" name="variants[${index}][image]" id="variant-image-${index}" class="variant-image-input" hidden accept="image/*"/>
                                <img id="preview-image-${index}" class="img-thumbnail" src="${variant.image}" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                            <div class="sku-box">
                                <label>Mã SKU</label>
                                <input type="text" class="form-control variant-sku" name="variants[${index}][sku]" value="${variant.sku}" readonly style="cursor:not-allowed;">
                            </div>
                        </div>
                        <div class="box-price-quantity">
                            <div class="form-group" style="flex:1;">
                                <label>Giá</label>
                                <input type="number" class="form-control variant-price" name="variants[${index}][price]" value="${variant.price}" required>
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label>Số lượng</label>
                                <input type="number" class="form-control variant-quantity" name="variants[${index}][quantity]" value="${variant.quantity}" required min="1">
                            </div>
                        </div>

                                <input type="text" class="form-control variant-price" name="variants[${index}][image]"  placeholder="Nhập giá" style="display:none !important"  value="${variant.image}">

                        <div class="variant-box-input">
                            <div class="form-group mt-4">
                                <label>Cân nặng (Không bắt buộc)</label>
                                <input type="text" class="form-control variant-weight" name="variants[${index}][weight]" value="${variant.weight}">
                            </div>
                            <div class="form-group mt-4">
                                <label>Mô tả biến thể</label>
                                <textarea class="form-control variant-description" name="variants[${index}][description]">${variant.description}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                });

                $("#variants-container").html(variantHtml);
            }
        });



        function addAttributeSelect(attributeId, attributeName, values) {
            if ($("#attribute-values-" + attributeId).length == 0) {
                var selectHtml = `
                    <div class="form-group" id="attribute-values-${attributeId}">
                        <label>${attributeName}</label>
                        <select class="form-control attribute-values" multiple data-attribute-id="${attributeId}" >
                        </select>
                    </div>
                `;
                $("#attribute-values-container").append(selectHtml);

                var $select = $("#attribute-values-" + attributeId + " select");
                values.forEach(function(value) {
                    $select.append(`<option value="${value.id}">${value.value}</option>`);
                });

                $select.select2({
                    placeholder: "Chọn giá trị",
                    allowClear: true
                });

                $select.on("change", function() {
                    var attributeId = $(this).data("attribute-id");
                    var selectedValues = $(this).val() || [];
                    selectedAttributes[attributeId] = selectedValues;
                });
            }
        }

        function generateCombinations(arrays, prefix = []) {
            if (!arrays.length) return [prefix.join("-")];

            let result = [];
            let firstArray = arrays[0];
            let remainingArrays = arrays.slice(1);

            firstArray.forEach(function(value) {
                result = result.concat(generateCombinations(remainingArrays, [...prefix, value]));
            });

            return result;
        }
    </script>
    <script>
        const checkbox = document.querySelector('#checkbox-status');
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                document.querySelector('#box-variant-checked').style.display = 'block';
            } else {
                document.querySelector('#box-variant-checked').style.display = 'none';

            }

        });
    </script>



    <script>
        $(document).on("change", ".variant-image-input", function() {
            let input = this;
            let index = input.id.split("-")[2];
            let previewId = "#preview-image-" + index;
            let label = $(`label[for="${input.id}"]`);

            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let previewElement = $(previewId);
                    if (previewElement.length) {
                        previewElement.attr("src", e.target.result);
                    } else {
                        label.html(
                            `<img id="preview-image-${index}" class="img-thumbnail" src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover;">`
                            );
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => console.error(error));
    </script>
@endsection
