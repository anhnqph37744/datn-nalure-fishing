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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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

    @if (Auth::check())


        {{-- <div class="sidemenu-wrapper d-none d-lg-block">
            <div class="sidemenu-content">
                <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
                <div class="widget widget_shopping_cart">
                    <h3 class="widget_title">Giỏ hàng</h3>
                    <div class="widget_shopping_cart_content">
                        <ul class="cart_list">
                            @foreach ($cart as $c)
                                <li class="mini_cart_item">
                                    <form action="{{ route('remove-cart', $c->id) }}" method="POST"> @csrf
                                        @method('DELETE')<button style="border:none;" class="remove"><i
                                                class="fal fa-trash-alt"></i></button></form> <a
                                        href="{{ route('detail', $c->id_product) }}"><img src="{{ $c->image }}"
                                            alt="Cart Image" />{{ Str::limit($c->name, 50, '...') }}</a>
                                    <span class="quantity">
                                        {{ $c->quantity }} × <span
                                            class="amount"><span>{{ number_format($c->price, 0, ',', '.') }}
                                                đ</span></span>
                                    </span>
                                </li>
                            @endforeach

                        </ul>
                        <div class="total">
                            <strong>Tổng tiền:</strong> <span class="amount"><span>67.000 đ</span></span>
                        </div>
                        <div class="buttons">
                            <a href="{{ route('cart') }}" class="vs-btn style4">View cart</a>
                            <a href="checkout.html" class="vs-btn style4">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endif



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}", "Thành công");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}", "Lỗi");
            @endif

            @if (session('warning'))
                toastr.warning("{{ session('warning') }}", "Cảnh báo");
            @endif

            @if (session('info'))
                toastr.info("{{ session('info') }}", "Thông báo");
            @endif
        });
    </script>




</body>



</html>
