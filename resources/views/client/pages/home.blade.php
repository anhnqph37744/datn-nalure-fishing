@extends('client.layouts.main')
@section('main')
<div class="row vs-carousel" data-arrows="false" data-dots="true" data-dots-lg-show="true" data-fade="true">
    <div class="hero-inner">
        <!-- Background image -->
        <div class="hero-bg background-image" data-bg-src="{{ asset('client/assets/img/bg/hero-bg-1-1.jpg') }}">
        </div>
        <!-- Shape mockup -->
        <div class="shape-mockup hero-shape jump-img d-none d-xxl-block">
            <img src="{{ asset('client/assets/img/bg/hero-shape1.png') }}" alt="hero shape">
        </div>
        <!-- Carousel -->
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1900">
            <div class="carousel-inner">
                @foreach ($banners as $index => $banner)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <a href="{{ $banner->link ?? '#' }}">
                        <img src="{{ asset( $banner->image) }}" class="d-block w-100" alt="{{ $banner->title }}">
                    </a>
                </div>
                @endforeach
            </div>

            <!-- Hero Content -->
            {{-- <div class="hero-content">
                <h1 class="hero-title">Let’s Go..! <br> Fishing With Marino</h1>
                <p class="hero-text">Lorem ipsum dolor sit amet consectur adipiscing elit
                    eiusmod ex tempor incididunt labore dolore magna
                    aliquaenim ad minim veniam quis nostrud exercitation laboris.</p>
                <div class="hero-btns">
                    <a href="about.html" class="vs-btn me-3">About Us <i class="far fa-arrow-right"></i></a>
                    <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                            class="fas fa-play"></i></a>
                </div>
            </div> --}}

            {{-- <div class="hero-inner">
                <div class="hero-bg background-image" data-bg-src="assets/img/bg/hero-bg-1-2.jpg">
                </div>
                <div class="shape-mockup hero-shape jump-img d-none d-xxl-block">
                    <img src="{{ asset('client/assets/img/bg/hero-shape1.png') }}" alt="hero shape">
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">With Marino <br> Fishing Let’s Go</h1>
                <p class="hero-text">Lorem ipsum dolor sit amet consectur adipiscing elit
                    eiusmod ex tempor incididunt labore dolore magna
                    aliquaenim ad minim veniam quis nostrud exercitation laboris.</p>
                <div class="hero-btns">
                    <a href="course.html" class="vs-btn me-3">About Us <i class="far fa-arrow-right"></i></a>
                    <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                            class="fas fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-inner">
        <div class="hero-bg background-image" data-bg-src="{{ asset('client/assets/img/bg/hero-bg-1-3.jpg') }}">
        </div>
        <div class="shape-mockup hero-shape jump-img d-none d-xxl-block">
            <img src="{{ asset('client/assets/img/bg/hero-shape1.png') }}" alt="hero shape">
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">nostrud exercitation <br> Fishing With Marino</h1>
                <p class="hero-text">Lorem ipsum dolor sit amet consectur adipiscing elit
                    eiusmod ex tempor incididunt labore dolore magna
                    aliquaenim ad minim veniam quis nostrud exercitation laboris.</p>
                <div class="hero-btns">
                    <a href="course.html" class="vs-btn me-3">About Us <i class="far fa-arrow-right"></i></a>
                    <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                            class="fas fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div> --}}

<section class="space">
    <div class="container">
        <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <span class="sec-subtitle">Fishing Post</span>
            <h2 class="sec-title">Các bài viết phổ biến</h2>
            <div class="sec-line"></div>
        </div>
        <div class="service_style3">
            <div class="service_inner">
                <a href="service-details.html" class="service_img"
                    data-bg-src="{{ asset('client/assets/img/service/service-2-1.jpg') }}"></a>
                <div class="service_content">
                    <h3 class="service_title"><a href="service-details.html">Tuba Island Hunting Spot</a></h3>
                    <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                        tempor incididunt labore dolore exercitagtion laboris.</p>
                    <a href="service-details.html" class="vs-btn style3">View More<i
                            class="fal fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="service_inner">
                <a href="service-details.html" class="service_img"
                    data-bg-src="{{ asset('client/assets/img/service/service-2-2.jpg') }}"></a>
                <div class="service_content">
                    <h3 class="service_title"><a href="service-details.html">Magic Gun Powder Short</a></h3>
                    <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                        tempor incididunt labore dolore exercitagtion laboris.</p>
                    <a href="service-details.html" class="vs-btn style3">View More<i
                            class="fal fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="service_inner">
                <a href="service-details.html" class="service_img"
                    data-bg-src="{{ asset('client/assets/img/service/service-2-3.jpg') }}"></a>
                <div class="service_content">
                    <h3 class="service_title"><a href="service-details.html">Turkey Season hunting</a></h3>
                    <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                        tempor incididunt labore dolore exercitagtion laboris.</p>
                    <a href="service-details.html" class="vs-btn style3">View More<i
                            class="fal fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="service_inner">
                <a href="service-details.html" class="service_img"
                    data-bg-src="{{ asset('client/assets/img/service/service-2-4.jpg') }}"></a>
                <div class="service_content">
                    <h3 class="service_title"><a href="service-details.html">Small Island short Area</a></h3>
                    <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                        tempor incididunt labore dolore exercitagtion laboris.</p>
                    <a href="service-details.html" class="vs-btn style3">View More<i
                            class="fal fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="service_inner">
                <a href="service-details.html" class="service_img"
                    data-bg-src="{{ asset('client/assets/img/service/service-2-1.jpg') }}"></a>
                <div class="service_content">
                    <h3 class="service_title"><a href="service-details.html">Medium Animals Catch</a></h3>
                    <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                        tempor incididunt labore dolore exercitagtion laboris.</p>
                    <a href="service-details.html" class="vs-btn style3">View More<i
                            class="fal fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

    </div>
</section>

@foreach ($products as $product)
<section class="bg-title space">
    <div class="container space-bottom">
        <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <span class="sec-subtitle">Cửa hàng</span>
            <h2 class="sec-title text-white">Sản phẩm của cửa hàng về {{ $product->name }}</h2>
            <div class="sec-line"></div>
        </div>
        <div class="row vs-carousel mb-4" data-arrows="true" data-wow-delay="0.4s" data-lg-slide-show="3"
            data-slide-show="4" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true"
            data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
            data-sm-center-mode="true">
            @foreach ($product->products as $p)
            <div class="col-auto">
                <div class="product-style1">
                    <div class="product-img">
                        <div class="shape-style1"></div>
                        <div class="clipped">
                            <img src="{{$p->image}}" alt="shop">
                        </div>
                        <div class="actions-style1">
                            <a href="#" class="icon-btn2">
                                <i class="far fa-heart"></i>
                            </a>
                            <a href="{{route('detail',$p->id)}}" class="icon-btn2">
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{route('detail',$p->id)}}" class="icon-btn2">
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
                        <h3 class="product-title"><a class="text-inherit" href="{{route('detail',$p->id)}}">{{Str::limit($p->name,50,'...')}}</a></h3>
                        <span class="product-price">{{number_format($p->price,0,',','.')}} đ</span>
                    </div>
                </div>
            </div>
            @endforeach
         

        </div>
    </div>
</section>
@endforeach
<div class="d-flex justify-content-center">
                <a href="{{ url('/shop') }}" class="btn btn-primary">Xem tất cả sản phẩm</a>
            </div>
<section>
    <div class="container">
        <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
            <span class="sec-subtitle">Our Blog</span>
            <h2 class="sec-title">Our Latest News & Update</h2>
            <div class="sec-line"></div>
        </div>
        <div class="row vs-carousel" data-arrows="true" data-wow-delay="0.4s" data-slide-show="3"
            data-lg-slide-show="2" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true"
            data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
            data-sm-center-mode="true">
            <div class="col-lg-4 col-md-6">
                <div class="vs-blog blog-style1">
                    <div class="blog-img">
                        <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-1.jpg') }}" alt="Blog Img">
                        <div class="blog-meta2">
                            <span class="day">07</span>
                            <span class="month">January</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                            <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                        </div>
                        <h4 class="blog-title">
                            <a href="blog-details.html">Sharing Their Group Of Students Ideas</a>
                        </h4>
                        <a href="blog-details.html" class="link-btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="vs-blog blog-style1">
                    <div class="blog-img">
                        <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-3.jpg') }}" alt="Blog Img">
                        <div class="blog-meta2">
                            <span class="day">09</span>
                            <span class="month">January</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                            <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                        </div>
                        <h4 class="blog-title">
                            <a href="blog-details.html">consectetur ipsum dolor sit amet adipisicing elit</a>
                        </h4>
                        <a href="blog-details.html" class="link-btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="vs-blog blog-style1">
                    <div class="blog-img">
                        <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-4.jpg') }}" alt="Blog Img">
                        <div class="blog-meta2">
                            <span class="day">07</span>
                            <span class="month">January</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                            <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                        </div>
                        <h4 class="blog-title">
                            <a href="blog-details.html">Lorem ipsum dolor sit amet consectetur.</a>
                        </h4>
                        <a href="blog-details.html" class="link-btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="vs-blog blog-style1">
                    <div class="blog-img">
                        <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-5.jpg') }}"
                            alt="Blog Img">
                        <div class="blog-meta2">
                            <span class="day">08</span>
                            <span class="month">January</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                            <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                        </div>
                        <h4 class="blog-title">
                            <a href="blog-details.html">adipisicing ipsum dolor sit amet consectetur elit.</a>
                        </h4>
                        <a href="blog-details.html" class="link-btn">Read More <i
                                class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="vs-blog blog-style1">
                    <div class="blog-img">
                        <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-6.jpg') }}"
                            alt="Blog Img">
                        <div class="blog-meta2">
                            <span class="day">09</span>
                            <span class="month">January</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                            <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                        </div>
                        <h4 class="blog-title">
                            <a href="blog-details.html">a group of students exchanging concepts</a>
                        </h4>
                        <a href="blog-details.html" class="link-btn">Read More <i
                                class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div>
    <div class="vs-container1">
        <div class="subscribe style1">
            <div class="container">
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
                                    <button class="vs-btn w-100">Subscribe <i
                                            class="fab fa-telegram-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection