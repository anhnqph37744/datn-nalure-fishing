<header class="vs-header">
    <div class="header-top">
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
            <div class="col-md-auto d-flex align-items-center text-center">
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe"></i>  English
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="margin: 0px;">
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Bangla</a></li>
                    </ul>
                </div>
                <div class="social-media">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
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
                                <a href="{{url('/')}}"><img src="{{asset('client/assets/img/logo.svg')}}" alt="logo"></a>
                                <a href="{{url('/')}}" class="sticky-logo"><img src="{{asset('client/assets/img/logo.svg')}}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row gx-50 align-items-center ">
                                <div class="col">
                                    <nav class="main-menu d-none d-lg-block">
                                        <ul>
                                            <li >
                                                <a href="{{url('/')}}">Home</a>

                                            </li>
                                            <li >
                                                <a href="">Shop</a>

                                            </li>
                                            <li >
                                                <a href="">Service</a>

                                            </li>

                                            <li >
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
                                    @if(Auth::check())
                                    <button class="icon-btn sideMenuToggler has-badge" type="button">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span class="badge">0</span>
                                    </button>

                                    @else
                                    <button class="icon-btn has-badge" type="button" id="no-auth">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>

                                    @endif
                                    <a href="{{ route('profile.index') }}">
                                        <button class="icon-btn has-badge" type="button" id="profile-btn">
                                            <i class="fas fa-user"></i>
                                        </button>
                                    </a>
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
        document.querySelector('#no-auth')?.addEventListener('click',()=>{
            toastr.error("Vui lòng đăng nhập !", "Lỗi");
        })
    </script>
</header>
