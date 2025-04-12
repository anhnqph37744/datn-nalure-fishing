@extends('client.layouts.main')
@section('main')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('client/assets/img/breadcrumb/breadcrumb-1-1.png') }}"
        style="height: 100px ">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Đăng kí tài khoản</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li>Đăng kí tài khoản</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="vs-checkout-wrapper space">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="woocommerce-form-login-toggle">
                        <div class="woocommerce-info"><i class="fas fa-info-circle"></i> Đăng kí
                        </div>
                    </div>
                    <div class="form-area">
                        <div class="row">
                            <div class="col-lg-4">
                                <form action="{{route('register')}}" class="form-login" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Username ">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="remembermylogin">
                                            <label for="remembermylogin">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="vs-btn shadow-none">Đăng kí</button>
                                        <p class="fs-xs mt-2 mb-0">
                                            <a class="reset-color" href="#">Bạn quên mật khẩu ?</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endsection
