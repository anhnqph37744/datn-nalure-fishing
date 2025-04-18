@extends('client.layouts.main')
@section('main')
<div class="breadcumb-wrapper " data-bg-src="assets/img/breadcrumb/breadcrumb-1-1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Blog Grid Sidebar</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Blog Grid Sidebar</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="space">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="row g-4">
                    <div class="col-xl-6 col-lg-12">
                        <div class="blog-style2">
                            <div class="blog-img">
                                <img class="w-100" src="{{asset('client/assets/img/blog/blog-1-1.jpg')}}" alt="Blog Img">
                                <div class="blog-meta2">
                                    <span class="day">08</span>
                                    <span class="month">January</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h4 class="blog-title">
                                    <a href="blog-details.html">Mastering the Art of Fly Fishing Tips for Beginners</a>
                                </h4>
                                <p class="blog-text">
                                    Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei.
                                </p>
                                <div class="blog-bottom">
                                    <div class="blog-author">
                                        <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                    </div>
                                    <a href="blog-details.html" class="vs-btn style3">Read More <i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <h3 class="widget_title">Search</h3>
                        <form class="search-form">
                            <input type="text" placeholder="Search Tour">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget widget_categories">
                        <h3 class="widget_title">Categories</h3>
                        <ul>
                            <li>
                                <a href="blog.html">Sea Fish</a>
                                <span>(09)</span>
                            </li>
                            <li>
                                <a href="blog.html">Rock Fishing</a>
                                <span>(10)</span>
                            </li>
                            <li>
                                <a href="blog.html">Wild Fishing</a>
                                <span>(21)</span>
                            </li>
                            <li>
                                <a href="blog.html">Sea Fish</a>
                                <span>(12)</span>
                            </li>
                            <li>
                                <a href="blog.html">Boat Fishing</a>
                                <span>(10)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="widget widget-postes">
                        <h3 class="widget_title">Recent Postes</h3>
                        <div class="recent-post-wrap">
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-1.jpg"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="blog-details.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="blog.html"><i class="fal fa-calendar-alt"></i>July 15, 2022</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-2.jpg"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="blog-details.html">Ut enim ad minim veniam, quis nostrud citation ullamco</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="blog.html"><i class="fal fa-calendar-alt"></i>July 15, 2022</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-3.jpg"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="blog-details.html">Duis aute irure dolor on the reprehenderit voluptate</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="blog.html"><i class="fal fa-calendar-alt"></i>July 15, 2022</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="widget_title">Popular Products</h3>
                        <div class="recent-post-wrap">
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="blog-details.html"><img src="assets/img/blog/popular-p-1-1.png"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="blog-details.html">Fishing Reels</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="blog.html">$100.00</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="blog-details.html"><img src="assets/img/blog/popular-p-1-2.png"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="blog-details.html">Fishing Hook</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="blog.html">$60.00</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/popular-p-1-3.png" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="blog-details.html">Fishing Baits</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="blog.html">$100.00</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
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
