@extends('client.layouts.main')
@php
    $activeReviews = $product->reviews->where('is_active', true);
    $reviewCount = $activeReviews->unique('user_id')->count();
    $averageRating = $reviewCount > 0 ? round($activeReviews->avg('rating'), 1) : 0;
@endphp
@section('main')
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('client/assets/img/breadcrumb/breadcrumb-1-1.png') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Sản phẩm chi tiết</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li>Sản phẩm chi tiết</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="space">
        <div class="container">
            <div class="shop-details">
                <div class="row gx-5">
                    <div class="col-lg-5">
                        <div class="product-details-img vs-carousel" data-asnavfor="#reviews-slide2" data-arraw="true"
                            id="reviews-slide1" data-slide-show="1">
                            @foreach ($product->images as $img)
                                <div class="product-img">
                                    <img class="img" src="{{ $img->image_url }}" alt="product">
                                    <div class="propertie-wishlist">
                                        <a href="#"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <ol class="flex-control-nav control-thumbs vs-carousel g-5" data-slide-show="4"
                            data-lg-slide-show="3" data-md-slide-show="5" data-xs-slide-show="2" id="reviews-slide2"
                            data-asnavfor="#reviews-slide1" data-center-mode="true" data-xl-center-mode="true"
                            data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
                            data-xs-center-mode="true">
                            @foreach ($product->images as $img)
                                <li class="thumbs-item">
                                    <img src="{{ $img->image_url }}" alt="product">
                                </li>
                            @endforeach


                        </ol>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-about">
                            <div class="product-rating justify-content-start">
                                <div class="star-rating">
                                    <ul class="d-flex">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <li>
                                                @if ($i <= floor($averageRating))
                                                    <i class="fas fa-star text-warning"></i> {{-- Sao đầy --}}
                                                @elseif ($i - $averageRating <= 0.5)
                                                    <i class="fas fa-star-half-alt text-warning"></i> {{-- Nửa sao --}}
                                                @else
                                                    <i class="fas fa-star text-muted"></i> {{-- Sao rỗng --}}
                                                @endif
                                            </li>
                                        @endfor
                                    </ul>
                                    
                                </div>
                                <span class="count">
                                    ( {{ $reviewCount }} Customer Review{{ $reviewCount !== 1 ? 's' : '' }} - Avg:
                                    {{ $averageRating }}/5 )
                                </span>
                            </div>
                            <h2 class="h3 mb-3">{{ $product->name }}</h2>
                            <p class="price">
                                <span class="Price-currencySymbol">{{ number_format($product->price, 0, ',', '.') }}
                                    đ</span>
                            </p>
                            </p>
                            <div class="mt-2 mb-30 d-flex align-items-center">
                                <div class="product-available">
                                    <h4 class="text-title mb-0">Số lượng tồn kho :</h4>

                                    <i class="far fa-check-square me-2 ms-1" style="color: lightgreen;"></i> <span
                                        id="quantity-stock">{{ $product->quantity }} </span> <span
                                        style="margin-left: 5px">sản phẩm khả dụng</span>
                                </div>
                            </div>

                            <h5>Chọn Phân Loại</h5>
                            <div id="attributes"></div>
                            <div class="quantity-area">
                                <div class="product-quantity">
                                    <button class="quantity-minus qty-btn">
                                        <i class="fal fa-minus"></i>
                                    </button>
                                    <input type="number" class="input-text px-2" step="1" min="1"
                                        max="9999" name="quantity" value="1" title="Qty">
                                    <button class="quantity-plus qty-btn">
                                        <i class="fal fa-plus"></i>
                                    </button>
                                </div>
                                <a href="cart.html" name="add-to-cart" value="3263" class="vs-btn style1">Add to cart</a>
                            </div>
                            <div class="product_meta">
                                <h4 class="text-title">Info:</h4>
                                <div class="product-info">
                                    <span class="sku_wrapper">SKU:</span>
                                    <p class="meta-value d-inline-block mb-0" id="sku-variant">{{ $product->sku }}</p>
                                </div>
                                <div class="product-info">
                                    <span class="category_wrapper">Category:</span>
                                    <p class="meta-value d-inline-block mb-0">
                                        <a href="https://wordpress.vecurosoft.com/" class="category"
                                            rel="tag">{{ $product->category->name }}</a>
                                    </p>
                                </div>
                                <div class="product-info">
                                    <span class="tages_wrapper">Tages:</span>
                                    <p class="meta-value d-inline-block mb-0">
                                        @foreach (explode(',', $product->tags) as $tag)
                                            <a href="#" class="tage">#{{ $tag }} ,</a>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-area">
                <ul class="nav product-tab-style1 justify-content-start" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description"
                            role="tab" aria-controls="description" aria-selected="false">description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                            aria-controls="reviews" aria-selected="true">
                            reviews ({{ $product->reviews->where('is_active', true)->count() }})
                        </a>

                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane fade active show" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <p class="desc-title">{!! $product->description !!}</p>
                    </div>

                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="vs-comments-wrap mt-0 vs-comments-layout1">
                            <ul class="comment-list">
                                @foreach ($product->reviews->where('is_active', true)->sortByDesc('created_at') as $review)
                                    <li class="review vs-comment">
                                        <div class="vs-post-comment">
                                            <div class="comment-avater">
                                                <img src="{{ asset('client/assets/img/blog/comment-author-1.jpg') }}"
                                                    alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <div class="star-rating1">
                                                    <ul>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <li><i
                                                                    class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <h4 class="name h5">{{ $review->user->name ?? 'Ẩn danh' }}</h4>
                                                <p class="text mb-2">{{ $review->review }}</p>
                                                <span class="commented-on">Đăng
                                                    {{ $review->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="vs-comment-form style2 pt-3">
                            <div class="form-title">
                                <h3 class="h4 mb-lg-4 pb-lg-1">Add a review</h3>
                            </div>
                            @auth
                                <form action="{{ route('products.reviews.store', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="row g-2">
                                        <div class="form-group rating-select d-flex align-items-center">
                                            <label>Your Rating :</label>
                                            <div class="star-rating2 ms-3">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <label>
                                                        <input type="radio" name="rating" value="{{ $i }}"
                                                            style="display:none" {{ old('rating') == $i ? 'checked' : '' }}>
                                                        <i
                                                            class="fas fa-star {{ old('rating') >= $i ? 'text-warning' : '' }}"></i>
                                                    </label>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-12 form-group mb-20">
                                            <textarea name="review" placeholder="Write a Message" class="form-control" required></textarea>
                                        </div>
                                        <div class="col-12 form-group mb-0 mt-20">
                                            <button class="vs-btn w-100 d-block rounded-1">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="alert alert-warning">Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để
                                    đánh giá sản phẩm.</div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-body space-title">
        <div class="container">
            <div class="subscribe">
                <div class="row gx-0 align-items-center justify-content-between z-index-common ">
                    <div class="col-xl-auto">
                        <p class="sec-subtitle mb-0">Newsletter</p>
                        <h2 class="sec-title h1 text-white">Get Regular Update</h2>
                    </div>
                    <div class="col-xl-auto">
                        <form action="#" class="form-style">
                            <div class="row align-items-center">
                                <div class="form-group mb-0 col">
                                    <input type="text" placeholder="Enter your email address....">
                                </div>
                                <div class="col-md-auto col-12">
                                    <button class="vs-btn w-100">Subscribe <i class="fab fa-telegram-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .star-rating2 {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-start;
            cursor: pointer;
        }

        .star-rating2 label {
            font-size: 24px;
            color: #ccc;
            transition: color 0.2s;
        }

        .star-rating2 input[type="radio"]:checked~label i,
        .star-rating2 label:hover~label i,
        .star-rating2 label:hover i {
            color: #ffc107;
        }

        .text-warning {
            color: #ffc107 !important;
        }

        .text-muted {
            color: #ccc !important;
        }
    </style>
    <script>
        const variants = @json($product->variant);
        const quantityInput = document.querySelector('input[name="quantity"]');
        const minusBtn = document.querySelector('.quantity-minus');
        const plusBtn = document.querySelector('.quantity-plus');

        let maxQuantity = {{ $product->quantity }};
        const hasVariants = variants.length > 0;

        const attributes = {};
        const selectedAttributes = {};

        if (hasVariants) {
            variants.forEach(variant => {
                variant.varian_attribute_value.forEach(attr => {
                    const attrName = attr.attribute.name;
                    const attrValue = attr.attribute_value.value;
                    if (!attributes[attrName]) attributes[attrName] = new Set();
                    attributes[attrName].add(attrValue);
                });
            });

            const container = document.getElementById("attributes");
            for (const attrName in attributes) {
                const div = document.createElement("div");
                div.classList.add("attribute-group");
                div.innerHTML = `<strong>${attrName}:</strong> `;
                attributes[attrName].forEach(value => {
                    const btn = document.createElement("button");
                    btn.textContent = value;
                    btn.dataset.attribute = attrName;
                    btn.dataset.value = value;
                    btn.onclick = () => selectAttribute(btn);
                    div.appendChild(btn);
                });
                container.appendChild(div);
            }
        }

        function selectAttribute(button) {
            const attrName = button.dataset.attribute;
            const attrValue = button.dataset.value;

            document.querySelectorAll(`button[data-attribute="${attrName}"]`).forEach(btn => btn.classList.remove(
                "selected"));

            button.classList.add("selected");
            selectedAttributes[attrName] = attrValue;

            checkVariant();
        }

        function checkVariant() {
            const matchingVariant = variants.find(variant =>
                variant.varian_attribute_value.every(attr =>
                    selectedAttributes[attr.attribute.name] === attr.attribute_value.value
                )
            );

            if (matchingVariant) {
                maxQuantity = matchingVariant.quantity;
                const priceMatching = (matchingVariant.price ? Number(matchingVariant.price) : 0).toLocaleString('vi-VN') +
                    ' đ';

                document.querySelector('.Price-currencySymbol').innerHTML = priceMatching;
                document.querySelector('#quantity-stock').innerHTML = matchingVariant.quantity;
                document.querySelector('#sku-variant').innerHTML = matchingVariant.sku;

                quantityInput.value = 1;
                validateQuantity();
            } else {
                maxQuantity = 1;
            }
        }

        function validateQuantity() {
            let quantity = parseInt(quantityInput.value);
            if (isNaN(quantity) || quantity < 1) {
                quantityInput.value = 1;
            } else if (quantity > maxQuantity) {
                quantityInput.value = maxQuantity;
            }
        }

        minusBtn.addEventListener("click", () => {
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });

        plusBtn.addEventListener("click", () => {
            if (hasVariants && Object.keys(selectedAttributes).length === 0) {
                toastr.error("Vui lòng chọn biến thể trước khi tăng số lượng!", "Lỗi");
                return;
            }
            if (parseInt(quantityInput.value) < maxQuantity) {
                quantityInput.value = parseInt(quantityInput.value) + 1;
            } else {
                toastr.error("Số lượng không thể vượt quá giới hạn!", "Lỗi");
            }
        });

        quantityInput.addEventListener('input', validateQuantity);

        document.querySelector('.vs-btn.style1').addEventListener('click', function(event) {
            event.preventDefault();

            let variant_id = null;

            if (hasVariants) {
                if (Object.keys(selectedAttributes).length === 0) {
                    toastr.error("Vui lòng chọn biến thể trước khi thêm vào giỏ hàng!", "Lỗi");
                    return;
                }

                const matchingVariant = variants.find(variant =>
                    variant.varian_attribute_value.every(attr =>
                        selectedAttributes[attr.attribute.name] === attr.attribute_value.value
                    )
                );

                if (!matchingVariant) {
                    toastr.error("Không thấy phân loại phù hợp", "Lỗi");
                    return;
                }

                variant_id = matchingVariant.id;
            }

            const quantity = quantityInput.value;

            $.ajax({
                url: '{{ route('add-to-cart') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    product_id: {{ $product->id }},
                    variant_id: variant_id,
                    quantity: quantity
                },
                dataType: 'json',
                success: function(data) {
                    if (data.type === 'success') {
                        toastr.success(data.message, data.type);
                    } else {
                        toastr.error(data.message, data.type);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    toastr.error("Lỗi hệ thống !", "Lỗi");
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const labels = document.querySelectorAll('.star-rating2 label');

            labels.forEach((label) => {
                label.addEventListener('click', function() {
                    // Xoá hết highlight
                    labels.forEach(l => l.querySelector('i').classList.remove('text-warning'));

                    // Lấy value của input
                    const selectedValue = parseInt(this.querySelector('input').value);

                    // Highlight theo sao được chọn
                    labels.forEach((l) => {
                        const val = parseInt(l.querySelector('input').value);
                        if (val <= selectedValue) {
                            l.querySelector('i').classList.add('text-warning');
                        }
                    });
                });
            });
        });
    </script>
@endsection
