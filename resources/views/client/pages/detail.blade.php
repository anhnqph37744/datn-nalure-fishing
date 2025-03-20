@extends('client.layouts.main')
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
                                    <ul>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                                <span class="count"> ( 3 Customer Review ) </span>
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
                            aria-controls="reviews" aria-selected="true">reviews(2)</a>
                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane fade active show" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <p class="desc-title">{!! $product->description !!}
                        </p>
                        <div class="row mt-30">
                            <div class="col-md-6 mb-30">
                                <div class="mega-hover">
                                    <img src="{{ asset('client/assets/img/shop/shop-desc-1.jpg') }}"
                                        class="w-100 rounded-2" alt="Shop Image">
                                </div>
                            </div>
                            <div class="col-md-6 mb-30">
                                <div class="mega-hover">
                                    <img src="{{ asset('client/assets/img/shop/shop-desc-2.jpg') }}"
                                        class="w-100 rounded-2" alt="Shop Image">
                                </div>
                            </div>
                        </div>
                        <div class="product-inner-list mb-4">
                            <ul>
                                <li><i class="fal fa-hand-point-right"></i> Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit.</li>
                                <li><i class="fal fa-hand-point-right"></i> Fusce vitae orci id leo pulvinar euismod et
                                    placerat diam.</li>
                                <li><i class="fal fa-hand-point-right"></i> Etiam pharetra mauris at fringilla laoreet.
                                </li>
                                <li> <i class="fal fa-hand-point-right"></i>Vivamus eu tellus pretium, fringilla justo nec,
                                    volutpat sapien.</li>
                            </ul>
                        </div>
                        <div class="product-inner-list">
                            <ul>
                                <li><i class="fal fa-hand-point-right"></i> Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit.</li>
                                <li><i class="fal fa-hand-point-right"></i> Fusce vitae orci id leo pulvinar euismod et
                                    placerat diam.</li>
                                <li><i class="fal fa-hand-point-right"></i> Etiam pharetra mauris at fringilla laoreet.
                                </li>
                                <li> <i class="fal fa-hand-point-right"></i>Vivamus eu tellus pretium, fringilla justo nec,
                                    volutpat sapien.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="vs-comments-wrap mt-0 vs-comments-layout1">
                            <ul class="comment-list">
                                <li class="review vs-comment">
                                    <div class="vs-post-comment">
                                        <div class="comment-avater">
                                            <img src="{{ asset('client/assets/img/blog/comment-author-1.jpg') }}"
                                                alt="Comment Author">
                                        </div>
                                        <div class="comment-content">
                                            <div class="star-rating1">
                                                <ul>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <h4 class="name h5">Mark Jack</h4>
                                            <p class="text mb-2">Progressively procrastinate mission-critical action items
                                                before team building ROI. Interactively provide access to cross functional
                                                quality vectors for client-centric catalysts for change.</p>
                                            <span class="commented-on">Published 1 day ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="review vs-comment">
                                    <div class="vs-post-comment">
                                        <div class="comment-avater">
                                            <img src="{{ asset('client/assets/img/blog/comment-author-2.jpg') }}"
                                                alt="Comment Author">
                                        </div>
                                        <div class="comment-content">
                                            <div class="star-rating1">
                                                <ul>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <h4 class="name h5">Jack anderson</h4>

                                            <p class="text mb-2">Progressively procrastinate mission-critical action items
                                                before team building ROI. Interactively provide access to cross functional
                                                quality vectors for client-centric catalysts for change.</p>
                                            <span class="commented-on">Published 1 day ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="vs-comment-form style2 pt-3">
                            <div class="form-title">
                                <h3 class="h4 mb-lg-4 pb-lg-1">Add a review</h3>
                            </div>
                            <div class="row g-2">
                                <div class="form-group rating-select d-flex align-items-center">
                                    <label>Your Rating : </label>
                                    <div class="star-rating2 ms-3">
                                        <span class="active"><i class="fas fa-star"></i></span>
                                        <span class="active"><i class="fas fa-star"></i></span>
                                        <span class="active"><i class="fas fa-star"></i></span>
                                        <span class="active"><i class="fas fa-star"></i></span>
                                        <span class="active"><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group mb-20">
                                    <input type="text" placeholder="Your Name" class="form-control">
                                </div>
                                <div class="col-md-6 form-group mb-20">
                                    <input type="text" placeholder="Your Email" class="form-control">
                                </div>
                                <div class="col-12 form-group mb-20">
                                    <textarea placeholder="Write a Message" class="form-control"></textarea>
                                </div>
                                <div class="col-12 form-group mt-3 mb-2">
                                    <input id="reviewcheck" name="reviewcheck" type="checkbox">
                                    <label for="reviewcheck">Save my name, email, and website in this browser for the next
                                        time I comment.<span class="checkmark">
                                        </span>
                                    </label>
                                </div>
                                <div class="col-12 form-group mb-0 mt-20">
                                    <button class="vs-btn w-100 d-block rounded-1">Submit</button>
                                </div>
                            </div>
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
    <script>
        const variants = @json($product->variant);
        const quantityInput = document.querySelector('input[name="quantity"]');
        const minusBtn = document.querySelector('.quantity-minus');
        const plusBtn = document.querySelector('.quantity-plus');

        let maxQuantity = 1;

        const attributes = {};
        variants.forEach(variant => {
            variant.varian_attribute_value.forEach(attr => {
                const attrName = attr.attribute.name;
                const attrValue = attr.attribute_value.value;
                if (!attributes[attrName]) attributes[attrName] = new Set();
                attributes[attrName].add(attrValue);
            });
        });

        const container = document.getElementById("attributes");
        const selectedAttributes = {};

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
            if (!Object.keys(selectedAttributes).length) {
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

            if (!Object.keys(selectedAttributes).length) {
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

            const quantity = quantityInput.value;
            console.log(quantity);

            $.ajax({
                url: '{{ route('add-to-cart') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    variant_id: matchingVariant.id,
                    quantity: quantity,
                    product_id: {{ $product->id }}
                },
                dataType: 'json',
                success: function(data) {
                    if (data.type =='success') {
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
@endsection
