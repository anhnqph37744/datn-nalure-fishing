@extends('client.layouts.main')
@section('main')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('client/assets/img/breadcrumb/breadcrumb-1-1.png') }}"
        style="height: 100px ">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Đăng nhập</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li>Đăng nhập</li>
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
                        <div class="woocommerce-info"><i class="fas fa-info-circle"></i> Đăng nhập
                        </div>
                    </div>
                    <div class="form-area">
                        <div class="row">
                            <div class="col-lg-4">
                                <form action="{{ route('login') }}" method="POST" class="form-login">
                                    @if ($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif

                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="password" placeholder="Password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="remembermylogin">
                                            <label for="remembermylogin">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="vs-btn shadow-none">Login</button>
                                        <p class="fs-xs mt-2 mb-0">
                                            <a class="reset-color" href="#">Lost your password?</a>
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
