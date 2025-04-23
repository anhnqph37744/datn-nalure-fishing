@extends('client.layouts.main')
@section('main')
    <div class="breadcumb-wrapper " data-bg-src="assets/img/breadcrumb/breadcrumb-1-1.png">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $post->title }}</h1> <!-- Hiển thị tiêu đề bài viết -->
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="#">Home</a></li>
                        <li>{{ $post->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="space blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="vs-blog blog-single">
                        <div class="blog-img">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Image">
                        </div>
                        <div class="blog-inner">
                            <div class="blog-content">
                                <h2 class="blog-title h3">{{ $post->title }}</h2>
                                <div class="blog-meta mb-3">
                                    <a href="#" class="blog-date"><i
                                            class="fas fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</a>
                                    <a href="#"><i class="fas fa-comments"></i>09 Comments</a>
                                </div>
                                <p>{!! $post->excerpt !!}</p>
                                <blockquote class="vs-quote">
                                    <p>{!! $post->content !!}</p>
                                    {{-- <span class="quote-name">Rodja Heartmann</span> --}}

                                </blockquote>

                                {{-- <h4 class="blog-title fw-bold mb-2">Lorem ipsum dolor sit amet consectetur.</h4> --}}

                                <div class="row mt-30">
                                    {{-- @foreach ($post->gallery_images as $image)
                                        <div class="col-md-4 mb-40">
                                            <div class="mega-hover">
                                                <img src="{{ asset('storage/' . $image->path) }}" class="w-100"
                                                    alt="Hình ảnh liên quan">
                                            </div>
                                        </div>
                                    @endforeach --}}
                                </div>

                            </div>

                            <div class="share-links">
                                <div class="row justify-content-between align-items-center">
                                    {{-- <div class="col-md-auto"><span class="share-links-title">Tags:</span>
                                        <div class="tagcloud style1">
                                            @foreach ($post->tags as $tag)
                                                <!-- Hiển thị tags của bài viết -->
                                                <a
                                                    href="{{ route('client.blog.index') }}?tag={{ $tag->slug }}">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div> --}}
                                    <div class="col-md-auto text-xl-end"><span class="share-links-title">Social
                                            Network:</span>
                                        <ul class="social-links">
                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="vs-comments-wrap">
                            <h2 class="blog-inner-title">Comments (3)</h2>
                            <ul class="comment-list">
                                <li class="vs-comment-item">
                                    <div class="vs-post-comment">
                                        <div class="comment-avater">
                                            <img src="assets/img/blog/comment-author-1.jpg" alt="Comment Author">
                                        </div>
                                        <div class="comment-content">
                                            <span class="commented-on"><i class="fas fa-calendar-alt"></i> July 21, 2023</span>
                                            <h4 class="name h4">Rosalina Kelian</h4>
                                            <p class="text">Lorem lipsum dolor sit amet, adipiscfvdg fgjnving consectetur adipiscing elit dolor sit amet.</p>
                                            <div class="reply_and_edit">
                                                <a href="#" class="replay-btn">Replay <i class="fas fa-reply"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Comments Continues... -->
                            </ul>
                        </div> --}}
                        </div>
                    </div>
                    <div class="vs-comment-form">
                        <div class="form-title">
                            <h3 class="blog-inner-title">Leave a Comment</h3>
                        </div>
                        <div id="respond" class="comment-respond">
                            <div class="row gx-20">
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" placeholder="Complete Name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="col-12 form-group">
                                    <textarea class="form-control" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-12 ">
                                    <div class="custom-checkbox notice">
                                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent"
                                            type="checkbox" value="yes">
                                        <label for="wp-comment-cookies-consent"> Save my name, email, and website in this
                                            browser for the next time I comment.</label>
                                    </div>
                                </div>
                                <div class="col-12 form-group mb-0">
                                    <button class="vs-btn" type="submit">Post Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <h3 class="widget_title">Search</h3>
                            <form class="search-form" method="GET" action="{{ route('client.blog.pages.show', $post->slug) }}">
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
                                @foreach ($recentPosts as $recent)
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="{{ route('client.blog.pages.show', $recent->slug) }}">
                                                <img src="{{ asset('storage/' . $recent->thumbnail) }}"
                                                    alt="{{ $recent->title }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="post-title">
                                                <a class="text-inherit"
                                                    href="{{ route('client.blog.pages.show', $recent->slug) }}">
                                                    {{ $recent->title }}
                                                </a>
                                            </h4>
                                            <div class="recent-post-meta">
                                                <i class="fal fa-calendar-alt"></i>
                                                {{ \Carbon\Carbon::parse($recent->created_at)->format('M d, Y') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">Popular Products</h3>
                            <div class="recent-post-wrap">
                                @foreach ($popularProducts as $product)
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="{{ route('detail', $product->id) }}">
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="post-title">
                                                <a class="text-inherit"
                                                    href="{{ route('client.product.show', $product->slug) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h4>
                                            <div class="recent-post-meta">
                                                <a
                                                    href="{{ route('client.product.show', $product->slug) }}">${{ number_format($product->price, 2) }}</a>
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
@endsection
