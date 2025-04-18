@extends('client.layouts.main')
@section('main')
    <div class="breadcumb-wrapper" data-bg-src="assets/img/breadcrumb/breadcrumb-1-1.png">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Cửa hàng</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li>Cửa hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
                                     Shop Area
                                     ==============================-->
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="vs-sort-bar mb-40">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-auto">
                                <p class="shop-result-count" id="product-count">Hiển thị 0 kết quả</p>
                            </div>
                            <div class="col-md-auto">
                                <select id="sort-select" class="orderby">
                                    <option value="latest">Sắp xếp theo mới nhất</option>
                                    <option value="price-asc">Giá: thấp đến cao</option>
                                    <option value="price-desc">Giá: cao đến thấp</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-30">
                        @foreach ($products as $product)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="product-style1">
                                    <div class="product-img">
                                        <div class="shape-style1"></div>
                                        <div class="clipped">
                                            <img src="{{ $product->image }}" alt="shop">
                                        </div>
                                        <div class="actions-style1">
                                            <a href="#" class="icon-btn2">
                                                <i class="far fa-heart"></i>
                                            </a>
                                            <a href="{{ route('detail', $product->id) }}" class="icon-btn2">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('detail', $product->id) }}" class="icon-btn2">
                                                <i class="far fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <div class="product-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h3 class="product-title"><a class="text-inherit"
                                                href="{{ route('detail', $product->id) }}">{{ Str::limit($product->name, 50, '...') }}</a>
                                        </h3>
                                        <span class="product-price"><span
                                                class="currency">{{ number_format($product->price, 0, ',', '.') }} đ</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="vs-pagination">

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <h3 class="widget_title">Tìm kiếm</h3>
                            <form onsubmit="return false;" class="search-form">
                                <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm...">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget">
                            <h3 class="widget_title">Lọc theo giá</h3>
                            <div class="range mt-4">
                                <div class="range-slider">
                                    <span class="range-selected"></span>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="min" min="0" max="1000000" value="0"
                                        step="1000">
                                    <input type="range" class="max" min="0" max="1000000" value="1000000"
                                        step="1000">
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col-auto">
                                        <button class="vs-btn filter-btn">Lọc</button>
                                    </div>
                                    <div class="col">
                                        <div class="range-price">
                                            <p class="mb-0"><span id="minAmount">0 đ</span> - <span
                                                    id="maxAmount">1.000.000 đ</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="widget widget_categories">
                            <h3 class="widget_title">Danh mục sản phẩm</h3>
                            <ul>
                                <li>
                                    <a href="#" class="category-link" data-category="all">Tất cả</a>
                                    <span>({{ $products->count() }})</span>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="#" class="category-link"
                                            data-category="{{ $category->id }}">{{ $category->name }}</a>
                                        <span>({{ $category->products_count }})</span>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
                                        Subscribe Area
                                        ==============================-->
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
        .category-link.active {
            font-weight: bold;
            color: #ff6600;
        }

        .range-price span::before {
            content: '';
        }
    </style>

    <script>
        const allProducts = @json($products);
        let filteredProducts = [...allProducts];
        let currentPage = 1;
        const perPage = 9;
        let selectedCategoryId = 'all';

        const rangeInputs = document.querySelectorAll(".range-input input");
        const rangeBar = document.querySelector(".range-selected");
        const minAmount = document.getElementById("minAmount");
        const maxAmount = document.getElementById("maxAmount");
        const filterBtn = document.querySelector(".filter-btn");

        const updatePriceSlider = () => {
            let minVal = parseInt(rangeInputs[0].value);
            let maxVal = parseInt(rangeInputs[1].value);
            const gap = 50000;

            if (maxVal - minVal < gap) {
                if (event.target.classList.contains("min")) {
                    rangeInputs[0].value = maxVal - gap;
                    minVal = maxVal - gap;
                } else {
                    rangeInputs[1].value = minVal + gap;
                    maxVal = minVal + gap;
                }
            }

            const percentMin = (minVal / rangeInputs[0].max) * 100;
            const percentMax = (maxVal / rangeInputs[1].max) * 100;

            rangeBar.style.left = percentMin + "%";
            rangeBar.style.right = (100 - percentMax) + "%";

            minAmount.textContent = minVal.toLocaleString('vi-VN') + " đ";
            maxAmount.textContent = maxVal.toLocaleString('vi-VN') + " đ";
        };

        const renderProducts = () => {
            const start = (currentPage - 1) * perPage;
            const end = start + perPage;
            const productsToShow = filteredProducts.slice(start, end);
            const container = document.querySelector('.row.gy-30');
            container.innerHTML = '';

            if (productsToShow.length === 0) {
                container.innerHTML = '<p>Không tìm thấy sản phẩm nào.</p>';
            } else {
                productsToShow.forEach(product => {
                    container.innerHTML += `
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="product-style1">
                                <div class="product-img">
                                    <div class="shape-style1"></div>
                                    <div class="clipped">
                                        <img src="${product.image}" alt="shop">
                                    </div>
                                    <div class="actions-style1">
                                        <a href="#" class="icon-btn2"><i class="far fa-heart"></i></a>
                                        <a href="/product-detail/${product.id}" class="icon-btn2"><i class="far fa-eye"></i></a>
                                        <a href="/product-detail/${product.id}" class="icon-btn2"><i class="far fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h3 class="product-title">
                                        <a class="text-inherit" href="/product-detail/${product.id}">
                                            ${product.name}
                                        </a>
                                    </h3>
                                    <span class="product-price"><span class="currency">${Number(product.price).toLocaleString('vi-VN')} đ</span></span>
                                </div>
                            </div>
                        </div>
                    `;
                });
            }

            document.getElementById('product-count').textContent =
                `Hiển thị ${productsToShow.length === 0 ? 0 : start + 1}–${Math.min(end, filteredProducts.length)} trong ${filteredProducts.length} sản phẩm`;

            renderPagination();
        };

        const renderPagination = () => {
            const totalPages = Math.ceil(filteredProducts.length / perPage);
            const paginationContainer = document.querySelector('.vs-pagination');
            paginationContainer.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                paginationContainer.innerHTML += `
                    <a href="#" class="${i === currentPage ? 'active' : ''}" onclick="goToPage(${i})">${i}</a>
                `;
            }
        };

        const goToPage = (page) => {
            currentPage = page;
            renderProducts();
        };

        const applyFilters = () => {
            const keyword = document.getElementById('search-input').value.toLowerCase();
            const sortBy = document.getElementById('sort-select').value;
            const minPrice = parseInt(rangeInputs[0].value);
            const maxPrice = parseInt(rangeInputs[1].value);

            filteredProducts = allProducts
                .filter(p => p.name.toLowerCase().includes(keyword))
                .filter(p => p.price >= minPrice && p.price <= maxPrice);

            if (selectedCategoryId !== 'all') {
                filteredProducts = filteredProducts.filter(p => p.category_id == selectedCategoryId);
            }

            if (sortBy === 'price-asc') {
                filteredProducts.sort((a, b) => a.price - b.price);
            } else if (sortBy === 'price-desc') {
                filteredProducts.sort((a, b) => b.price - a.price);
            } else {
                filteredProducts.sort((a, b) => b.id - a.id); // Mới nhất
            }

            currentPage = 1;
            renderProducts();
        };

        // Sự kiện lọc
        rangeInputs.forEach(input => input.addEventListener("input", updatePriceSlider));
        filterBtn.addEventListener("click", applyFilters);
        document.getElementById('search-input').addEventListener('input', applyFilters);
        document.getElementById('sort-select').addEventListener('change', applyFilters);

        // Danh mục
        document.querySelectorAll('.category-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                selectedCategoryId = this.dataset.category;
                document.querySelectorAll('.category-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                applyFilters();
            });
        });

        // Load lần đầu
        window.onload = () => {
            updatePriceSlider();
            applyFilters();
        };
    </script>
@endsection
