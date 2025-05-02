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
.vs-btn.register-btn {
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
.vs-btn.register-btn:hover {
    background: #FFE44D;
}
.btn-toggle-password {
    background: transparent;
    border: none;
    color: #FFD700;
    padding: 8px;
    border-radius: 50%;
    transition: all 0.3s ease;
    opacity: 0.7;
}
.btn-toggle-password:hover {
    background: rgba(255, 215, 0, 0.1);
    opacity: 1;
}
.btn-toggle-password i {
    font-size: 16px;
}
</style>

<div class="login-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login-card">
                    <div class="login-header">
                        <h1>Đăng ký tài khoản</h1>
                    </div>
                    <div class="login-body">
                        <div class="register-form-wrapper">
                            @if ($errors->any())
                                <div class="alert alert-danger fade show">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success fade show">
                                    <i class="fas fa-check-circle me-2"></i>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{route('register')}}" class="form-login needs-validation" method="POST" novalidate>
                                @csrf
                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Họ và tên" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu" required>
                                    {{-- <button type="button" class="btn-toggle-password position-absolute end-0 top-50 translate-middle-y me-2" onclick="togglePassword('password', event)">
                                        <i class="fas fa-eye"></i>
                                    </button> --}}
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu" required>
                                    {{-- <button type="button" class="btn-toggle-password position-absolute end-0 top-50 translate-middle-y me-2" onclick="togglePassword('password_confirmation', event)">
                                        <i class="fas fa-eye"></i>
                                    </button> --}}
                                </div>
                                <div class="form-group mb-4">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="terms" name="terms" class="@error('terms') is-invalid @enderror" required>
                                        <label for="terms">Tôi đồng ý với <a href="#" class="text-theme">điều khoản sử dụng</a></label>
                                        @error('terms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 text-center">
                                    <button type="submit" class="vs-btn register-btn"><i class="fas fa-user-plus me-2"></i>Đăng ký</button>
                                </div>
                                <div class="text-center">
                                    <p class="mb-0">Đã có tài khoản? <a href="{{ route('login') }}" class="text-theme">Đăng nhập ngay</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script>
        function togglePassword(fieldId, event) {
            const field = document.getElementById(fieldId);
            const button = event.currentTarget;
            const icon = button.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script> --}}
@endsection
