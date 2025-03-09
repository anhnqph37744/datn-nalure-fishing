<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Marino HTML Template - Home One</title>
    <meta name="author" content="vecuro">
    <meta name="description" content="Marino HTML Template">
    <meta name="keywords" content="Marino HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png"
        href="{{ asset('client/assets/img/favicons/favicon.png"') }}>
    <meta name="msapplication-TileColor"
        content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600;700;800&amp;family=Inter&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
</head>

<body>



    @include('client.layouts._menu')

    @include('client.layouts._loader')

    <div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="vs-widget-about">
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{ asset('client/assets/img/logo.svg') }}" alt="Marino"></a>
                    </div>
                    <p class="footer-text">Ut tellus dolor, dapibus eget, elementum ifend cursus eleifend, elit. Aenea
                        ifen dn tor wisi Aliquam er at volutpat. Dui ac tui end cursus eleifendrpis.</p>
                    <div class="info-social style3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget  ">
                <h3 class="widget_title">Recent Articles</h3>
                <div class="recent-post-wrap">
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img
                                    src="{{ asset('client/assets/img/blog/recent-post-1-1.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <div class="recent-post-meta">
                                <a href="blog.html"><i class="fal fa-calendar-alt"></i>December 15, 2022</a>
                            </div>
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Expanding The
                                    Solar
                                    Supply Chain Finance</a></h4>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img
                                    src="{{ asset('client/assets/img/blog/recent-post-1-2.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <div class="recent-post-meta">
                                <a href="blog.html"><i class="fal fa-calendar-alt"></i>March 13, 2022</a>
                            </div>
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Surviving
                                    sustainably solar energy 2022</a></h4>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img
                                    src="{{ asset('client/assets/img/blog/recent-post-1-3.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <div class="recent-post-meta">
                                <a href="blog.html"><i class="fal fa-calendar-alt"></i>Augest 23, 2022</a>
                            </div>
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Future Solar
                                    Energy
                                    Innovation Challenges</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sideCart-wrapper offcanvas-wrapper d-none d-lg-block">
        <div class="sidemenu-content">
            <button class="closeButton border-theme bg-theme-hover sideMenuCls2"><i class="far fa-times"></i></button>
            <div class="widget widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="cart_list">
                        <li class="mini_cart_item">
                            <a href="shop.html" class="remove"><i class="fal fa-trash-alt"></i></a> <a
                                href="shop.html"><img src="{{ asset('client/assets/img/cart/cart-img-1.png') }}"
                                    alt="Cart Image" />Fishing
                                Reels Spin</a>
                            <span class="quantity">
                                1 × <span class="amount"><span>$</span>100.00</span>
                            </span>
                        </li>
                        <li class="mini_cart_item">
                            <a href="shop.html" class="remove"><i class="fal fa-trash-alt"></i></a> <a
                                href="shop.html"><img src="{{ asset('client/assets/img/cart/cart-img-2.png') }}"
                                    alt="Cart Image" />Spoon
                                lure tackle Baits</a>
                            <span class="quantity">
                                1 × <span class="amount"><span>$</span>19.00</span>
                            </span>
                        </li>
                        <li class="mini_cart_item">
                            <a href="shop.html" class="remove"><i class="fal fa-trash-alt"></i></a> <a
                                href="shop.html"><img src="{{ asset('client/assets/img/cart/cart-img-3.png') }}"
                                    alt="Cart Image" />Fishing
                                Reels Globeride</a>
                            <span class="quantity">
                                1 × <span class="amount"><span>$</span>10.00</span>
                            </span>
                        </li>
                    </ul>
                    <div class="total">
                        <strong>Subtotal:</strong> <span class="amount"><span>$</span>129.00</span>
                    </div>
                    <div class="buttons">
                        <a href="cart.html" class="vs-btn style4">View cart</a>
                        <a href="checkout.html" class="vs-btn style4">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('client.layouts._header')

    @yield('main')

    @include('client.layouts._footer');


    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>
    <svg class="svg-shep1">
        <clipPath id="product-clip-path" clipPathUnits="objectBoundingBox">
            <path
                d="M0.289,0.963 C0.143,1,0.035,0.938,0,0.901 V0 H1 V0.963 C0.958,0.985,0.842,1,0.711,0.984 C0.547,0.938,0.473,0.915,0.289,0.963">
            </path>
        </clipPath>
    </svg>





    <script src="{{ asset('client/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('client/assets/js/slick.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Wow.js -->
    <script src="{{ asset('client/assets/js/wow.min.js') }}"></script>
    <!-- Imagesloaded -->
    <script src="{{ asset('client/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('client/assets/js/main.js') }}"></script>




</body>



</html>
