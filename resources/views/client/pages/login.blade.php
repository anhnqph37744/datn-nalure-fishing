@extends('client.layouts.main')
@section('main')
<style>
.login-wrapper {
    min-height: 100vh;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    padding: 80px 0;
}
.login-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease;
}
.login-card:hover {
    transform: translateY(-5px);
}
.login-header {
    background: #FFD700;
    padding: 30px;
    text-align: center;
    color: white;
}
.login-header h1 {
    font-size: 2em;
    margin: 0;
    font-weight: 600;
}
.login-body {
    padding: 40px;
}
.form-group {
    margin-bottom: 25px;
    position: relative;
}
.form-control {
    border: none;
    border-bottom: 2px solid #e0e0e0;
    padding: 12px 40px;
    width: 100%;
    font-size: 16px;
    transition: all 0.3s ease;
}
.form-control:focus {
    border-color: #FFD700;
    box-shadow: none;
}
.form-group i {
    position: absolute;
    left: 12px;
    top: 14px;
    color: #FFD700;
}
.text-danger {
    font-size: 14px;
    margin-top: 5px;
    color: #e74c3c;
}
.custom-checkbox {
    margin: 15px 0;
}
.vs-btn.login-btn {
    width: 100%;
    padding: 12px;
    background: #FFD700;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    margin-top: 10px;
    transition: all 0.3s ease;
}
.vs-btn.login-btn:hover {
    background: #FFE44D;
}
.login-footer {
    text-align: center;
    margin-top: 20px;
}
.login-footer a {
    color: #FFD700;
    text-decoration: none;
    font-weight: 500;
}
.login-footer a:hover {
    text-decoration: underline;
}
</style>

<div class="login-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-card">
                    <div class="login-header">
                        <h1>Đăng nhập</h1>
                        <p class="mb-0">Chào mừng bạn trở lại!</p>
                    </div>
                    <div class="login-body">
                        <form action="{{ route('login') }}" method="POST" class="form-login">
                            @csrf
                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" class="form-control" placeholder="Email của bạn"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="remembermylogin">
                                    <label for="remembermylogin">Ghi nhớ đăng nhập</label>
                                </div>
                            </div>
                            <button type="submit" class="vs-btn login-btn">Đăng nhập</button>
                            <div class="login-footer">
                                <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                                <a href="#" class="forgot-password">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


    