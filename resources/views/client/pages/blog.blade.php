@extends('client.layouts.main')
@section('main')
<div class="breadcumb-wrapper " data-bg-src="assets/img/breadcrumb/breadcrumb-1-1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Bài viết phổ biến</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="http://127.0.0.1:8000/">Trang chủ</a></li>
                    <li>Bài viết</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="space">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($posts as $post)
                    <div class="col">
                        <div class="blog-style2 h-100 d-flex flex-column">
                            <div class="blog-img">
                                <img class="w-100" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                                <div class="blog-meta2">
                                    <span class="day">{{ \Carbon\Carbon::parse($post->created_at)->format('d') }}</span>
                                    <span class="month">{{ \Carbon\Carbon::parse($post->created_at)->format('F') }}</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h4 class="blog-title">
                                    <a href="#">{{ $post->title }}</a>
                                </h4>
                                <p class="blog-text">
                                    {{ $post->excerpt }}
                                </p>
                                <div class="blog-bottom">
                                    {{-- <div class="blog-author">
                                        <a href="#"><i class="fas fa-user"></i>Admin</a>
                                    </div> --}}
                                    <div class="blog-bottom">
                                        {{-- <div class="blog-author">
                                            <a href="#"><i class="fas fa-user"></i>Admin</a>
                                        </div> --}}
                                        
                                        <a href="{{ route('client.blog.pages.show', $post->slug) }}" class="vs-btn style3">Read More <i class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <h3 class="widget_title">Search</h3>
                        <form class="search-form" method="GET" action="{{ route('client.blog.pages.index') }}">
                            <input type="text" name="search"  placeholder="Search" value="{{ request('search') }}">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="widget widget_categories">
                        <h3 class="widget_title">Danh mục bài viết</h3>
                        <ul>
                            <li>
                                <a href="{{ route('client.blog.pages.index') }}">Tất cả danh mục</a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('client.blog.pages.index', ['category' => $category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                    <span>({{ $category->posts_count }})</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="widget widget-postes">
                        <h3 class="widget_title">Bài viết gần đây</h3>
                        <div class="recent-post-wrap">
                            @foreach($recentPosts as $recent)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('client.blog.pages.show', $recent->slug) }}">
                                        <img src="{{ asset('storage/' . $recent->thumbnail) }}" alt="{{ $recent->title }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title">
                                        <a class="text-inherit" href="{{ route('client.blog.pages.show', $recent->slug) }}">
                                            {{ $recent->title }}
                                        </a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <i class="fal fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($recent->created_at)->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="widget_title">Sản phẩm phổ biến</h3>
                        <div class="recent-post-wrap">
                            @foreach($popularProducts as $product)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('detail', $product->id) }}">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title">
                                        <a class="text-inherit" href="{{ route('detail', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="{{ route('detail', $product->id) }}">${{ number_format($product->price, 2) }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

{{-- <section class="bg-body space-title">
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
</section> --}}
<style>
    .blog-style2 .blog-img img {
    height: 220px;
    object-fit: cover;
    width: 100%;
}
</style>
@endsection
