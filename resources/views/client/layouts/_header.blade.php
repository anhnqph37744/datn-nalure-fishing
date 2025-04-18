<header class="vs-header">
    <div class="header-top" style="background-color: #ff8c00; color: white;">
        <div class="container">
            <div class="row justify-content-xl-between justify-content-md-center align-items-center gx-50">
            <div class="col d-none d-xl-block">
                <div class="header-links">
                    <ul>
                        <li>
                            <a href="#"><i class="fas fa-map-marker-alt"></i> Nam Từ Liêm , Hà Nội , Việt Nam  </a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-envelope"></i> anhnqph37744@fpt.edu.vn </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="vs-container1">
        <div class="sticky-wrapper">
            <div class="sticky-active">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="vs-logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('client/assets/img/logo.png') }}"
                                        alt="logo"></a>
                                <a href="{{ url('/') }}" class="sticky-logo"><img
                                        src="{{ asset('client/assets/img/logo.png') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row gx-50 align-items-center ">
                                <div class="col">
                                    <nav class="main-menu d-none d-lg-block">
                                        <ul>
                                            <li>
                                                <a href="{{ url('/') }}">Home</a>

                                            </li>
                                            <li >
                                                <a href="{{url('/shop')}}">Shop</a>
                                            </li>
                                            <li>
                                                <a href="">Service</a>

                                            </li>

                                            <li>
                                                <a href="">Blog</a>

                                            </li>
                                            <li class="mega-menu-wrap">
                                                <a href="#">Pages</a>

                                            </li>
                                            <li>
                                                <a href="">Contact Us</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-auto d-lg-none">
                                    <button class="vs-menu-toggle d-inline-block">
                                        <i class="fal fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="header-info">
                                        <div class="icon-btn">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="header-info_label">Call Now</span>
                                            <div class="header-info_link">
                                                <a href="tel:+26921562148">(+269) 2156 2148</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    @if (Auth::check())
                                        <button class="icon-btn sideMenuToggler has-badge" type="button">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span class="badge">{{ count($cart) }}</span>
                                        </button>
                                    @else
                                        <button class="icon-btn has-badge" type="button" id="no-auth">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    @endif
                                    @if (Auth::check())
                                        <div class="user-dropdown">
                                            <button class="icon-btn has-badge" type="button" id="profile-btn">
                                                <i class="fas fa-user"></i>
                                            </button>
                                            <div class="user-dropdown-menu">
                                                <a href="{{ route('profile.index') }}" class="dropdown-item">
                                                    <i class="fas fa-user-circle"></i> Trang cá nhân
                                                </a>
                                                <a href="{{ route('client.orders.index') }}" class="dropdown-item">
                                                    <i class="fas fa-shopping-bag"></i> Đơn hàng của tôi
                                                </a>
                                                <a href="" class="dropdown-item">
                                                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('login') }}" class="icon-btn has-badge" type="button">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    @endif
                                    <style>
                                        .bg-orange {
                                            background-color: #ff8c00;
                                            color: white;
                                        }

                                        .user-dropdown {
                                            position: relative;
                                            display: inline-block;
                                        }

                                        .user-dropdown-menu {
                                            display: none;
                                            position: absolute;
                                            right: 0;
                                            top: 100%;
                                            background: white;
                                            min-width: 200px;
                                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                                            border-radius: 4px;
                                            padding: 8px 0;
                                            z-index: 1000;
                                        }

                                        .user-dropdown:hover .user-dropdown-menu {
                                            display: block;
                                            animation: fadeIn 0.3s ease;
                                        }

                                        .dropdown-item {
                                            display: flex;
                                            align-items: center;
                                            padding: 8px 16px;
                                            color: #333;
                                            text-decoration: none;
                                            transition: background 0.2s;
                                        }

                                        .dropdown-item:hover {
                                            background: #f5f5f5;
                                        }

                                        .dropdown-item i {
                                            margin-right: 8px;
                                            width: 16px;
                                        }

                                        @keyframes fadeIn {
                                            from {
                                                opacity: 0;
                                                transform: translateY(-10px);
                                            }

                                            to {
                                                opacity: 1;
                                                transform: translateY(0);
                                            }
                                        }
                                    </style>
                                </div>

                                {{-- <div class="col-auto">
                                    <button class="bar-btn sideMenuToggler d-none d-xl-block">
                                        <i class="far fa-bars"></i>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('#no-auth')?.addEventListener('click', () => {
            toastr.error("Vui lòng đăng nhập !", "Lỗi");
        })
    </script>
</header>
<style>
    .dropdown button {
        background: #FFCC99;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        color: #333;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .dropdown button:hover {
        background: #FFB366;
        transform: translateY(-2px);
    }

    .dropdown .dropdown-menu {
        background: #FFCC99;
        border: none;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        animation: fadeInDown 0.3s ease;
    }

    .dropdown .dropdown-menu .dropdown-item {
        color: #333;
        padding: 8px 15px;
        transition: all 0.2s ease;
    }

    .dropdown .dropdown-menu .dropdown-item:hover {
        background: #FFB366;
        color: #fff;
    }

    .social-media {
        display: flex;
        align-items: center;
        margin-left: 20px;
        gap: 15px;
    }

    .social-media a {
        color: #333;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .social-media a:hover {
        color: #FFB366;
        transform: scale(1.2);
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
