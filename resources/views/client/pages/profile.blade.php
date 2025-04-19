@extends('client.layouts.main')
@section('main')
<!-- Add this CSS section after the link tag -->
<style>
    .modal-content {
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .modal-title {
        color: #333;
        font-weight: 600;
    }

    .form-label {
        font-weight: 500;
        color: #555;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        margin-bottom: 15px;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
        padding: 1rem;
    }

    .cr-button {
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #545b62;
        transform: translateY(-1px);
    }

    /* Radio button styling */
    input[type="radio"] {
        margin-right: 5px;
        margin-left: 15px;
    }

    /* File input styling */
    input[type="file"] {
        padding: 8px;
    }

    /* Error message styling */
    .text-danger {
        font-size: 0.875rem;
        margin-top: 5px;
    }
</style>
<div class="breadcumb-wrapper" data-bg-src="{{ asset('client/assets/img/breadcrumb/breadcrumb-1-1.png') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Profile</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>Profile</li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <link rel="stylesheet" href="{{asset('assets/client/css/voucher-item.css')}}">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 profile-card">
                    <div class="card-body text-center">
                        <div class="profile-image-wrapper">
                            <img src="{{ asset('data:image/png;base64,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') }}" 
                                 alt="Profile Picture" 
                                 class="profile-image" 
                                 id="profilePicture">
                        </div>
                        <h5 class="profile-name" id="userName">{{auth()->user()->name}}</h5>
                        <p class="profile-email" id="userEmail">{{auth()->user()->email}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" 
                                    class="btn update-profile-btn text-white" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#editProfileModal">
                                Cập nhật thông tin
                            </button>
                        </div>
                    </div>
                </div>
               
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title mb-3">Social Media</h6>
                        <div class="d-flex justify-content-start">
                            <p class="me-3">Ngày tham gia: {{ date('d/m/Y', strtotime($user->created_at)) }}</p>
                            <a href="#" class="me-3"><i class="bi bi-twitter fs-4"></i></a>
                            <a href="#" class="me-3"><i class="bi bi-linkedin fs-4"></i></a>
                            <a href="#"><i class="bi bi-instagram fs-4"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="true">Thông tin cá nhân
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="preferences-tab" data-bs-toggle="tab"
                                        data-bs-target="#preferences" type="button" role="tab"
                                        aria-controls="preferences"
                                        aria-selected="false">Kho Voucher
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                                        data-bs-target="#settings"
                                        type="button" role="tab" aria-controls="settings" aria-selected="false">Cài đặt
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <style>
                                .profile-info-card {
                                    padding: 20px;
                                    border-radius: 15px;
                                    box-shadow: 0 0 20px rgba(0,0,0,0.1);
                                    background: #fff;
                                    transition: all 0.3s ease;
                                }
                            
                                .profile-info-item {
                                    padding: 15px;
                                    border-radius: 10px;
                                    transition: all 0.3s ease;
                                    margin-bottom: 15px;
                                }
                            
                                .profile-info-item:hover {
                                    background: #f8f9fa;
                                    transform: translateY(-2px);
                                }
                            
                                .profile-info-item h6 {
                                    color: #333;
                                    font-weight: 600;
                                    margin-bottom: 8px;
                                    display: flex;
                                    align-items: center;
                                }
                            
                                .profile-info-item h6 i {
                                    margin-right: 10px;
                                    color: #007bff;
                                }
                            
                                .profile-info-item p {
                                    margin: 0;
                                    color: #666;
                                    padding-left: 25px;
                                }
                            </style>
                            
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="profile-info-card">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="profile-info-item">
                                                <h6><i class="fas fa-user"></i>Họ và tên</h6>
                                                <p class="text-muted">{{ $user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-info-item">
                                                <h6><i class="fas fa-envelope"></i>Email</h6>
                                                <p class="text-muted">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-info-item">
                                                <h6><i class="fas fa-venus-mars"></i>Giới tính</h6>
                                                <p class="text-muted">{{ optional($profile)->gender }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-info-item">
                                                <h6><i class="fas fa-birthday-cake"></i>Ngày sinh</h6>
                                                <p class="text-muted">{{ optional($profile)->birthdate ? date('d/m/Y', strtotime($profile->birthdate)) : '' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-info-item">
                                                <h6><i class="fas fa-phone"></i>Số điện thoại</h6>
                                                <p class="text-muted">{{ optional($profile)->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-info-item">
                                                <h6><i class="fas fa-map-marker-alt"></i>Địa chỉ</h6>
                                                <p class="text-muted">{{ optional($profile)->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="tab-pane fade" id="preferences" role="tabpanel" aria-labelledby="preferences-tab">
                                    <style>
                                        .voucher-card {
                                            background: linear-gradient(135deg, #fff5e6 0%, #ffe0b3 100%);
                                            border-radius: 12px;
                                            padding: 20px;
                                            margin-bottom: 20px;
                                            box-shadow: 0 4px 15px rgba(255, 128, 0, 0.1);
                                            transition: all 0.3s ease;
                                            position: relative;
                                            overflow: hidden;
                                            display: flex;
                                            align-items: center;
                                            height: 150px;
                                            border: none;
                                        }
                                        
                                        .voucher-card::before {
                                            content: '';
                                            position: absolute;
                                            left: 0;
                                            top: 10px;
                                            bottom: 10px;
                                            width: 2px;
                                            background: repeating-linear-gradient(0deg, #ff8000 0px, #ff8000 4px, transparent 4px, transparent 8px);
                                        }
                                        
                                        .voucher-card:hover {
                                            transform: translateY(-3px);
                                            box-shadow: 0 8px 20px rgba(255, 128, 0, 0.15);
                                        }
                                        
                                        .voucher-left {
                                            flex: 0 0 30%;
                                            padding-right: 20px;
                                            border-right: 1.5px dashed #ff8000;
                                            position: relative;
                                        }
                                        
                                        .voucher-right {
                                            flex: 0 0 70%;
                                            padding-left: 20px;
                                            display: flex;
                                            flex-wrap: wrap;
                                            align-content: center;
                                        }
                                        
                                        .voucher-title {
                                            font-size: 1.1rem;
                                            font-weight: 600;
                                            color: #ff6600;
                                            margin-bottom: 10px;
                                            width: 100%;
                                            font-family: var(--title-font);
                                            transition: color 0.3s ease;
                                        }
                                        
                                        .voucher-discount {
                                            font-size: 1.8rem;
                                            font-weight: 700;
                                            color: #ff4d00;
                                            margin-bottom: 6px;
                                            text-align: center;
                                            font-family: var(--title-font);
                                            text-shadow: 1px 1px 3px rgba(255, 77, 0, 0.2);
                                            transition: transform 0.3s ease;
                                        }
                                        
                                        .use-btn {
                                            background: #ff8000;
                                            color: var(--white-color);
                                            padding: 8px 20px;
                                            border-radius: 6px;
                                            text-decoration: none;
                                            display: inline-block;
                                            margin-top: 15px;
                                            margin-right: 15px;
                                            transition: all 0.3s ease;
                                            position: relative;
                                            font-family: var(--title-font);
                                            font-weight: 500;
                                            border: 1.5px solid transparent;
                                            font-size: 0.9rem;
                                            float: right;
                                            clear: both;
                                        }
                                        
                                        .use-btn:hover {
                                            background: var(--white-color);
                                            color: #ff8000;
                                            border-color: #ff8000;
                                            transform: translateY(-2px);
                                        }
                                        
                                        .voucher-count {
                                            position: absolute;
                                            top: 12px;
                                            right: 12px;
                                            background: rgba(255,77,0,0.08);
                                            padding: 4px 10px;
                                            border-radius: 15px;
                                            font-size: 0.8rem;
                                            color: #ff4d00;
                                            font-weight: 500;
                                            display: flex;
                                            align-items: center;
                                            gap: 4px;
                                        }
                                        
                                        .voucher-count i {
                                            font-size: 0.9rem;
                                        }
                                        
                                        @media (max-width: 768px) {
                                            .voucher-card {
                                                flex-direction: column;
                                                height: auto;
                                                padding: 15px;
                                            }
                                        
                                            .voucher-left {
                                                flex: 0 0 100%;
                                                padding-right: 0;
                                                padding-bottom: 12px;
                                                border-right: none;
                                                border-bottom: 1.5px dashed var(--secondary-color);
                                            }
                                        
                                            .voucher-right {
                                                flex: 0 0 100%;
                                                padding-left: 0;
                                                padding-top: 12px;
                                            }
                                        
                                            .voucher-info {
                                                width: 100%;
                                            }
                                        
                                            .use-btn {
                                                position: relative;
                                                bottom: auto;
                                                right: auto;
                                                width: 100%;
                                                text-align: center;
                                                margin-top: 12px;
                                            }
                                        }
                                    </style>
                                    <div class="container text-center">
                                        <div class="row row-cols-1 g-4">
                                            @forelse($vouchers as $voucher)
                                                <div class="col">
                                                    <div class="voucher-card">
                                                        <div class="voucher-count"><i class="fas fa-ticket-alt me-1"></i>Còn lại: {{ $voucher->limit }}</div>
                                                        <div class="voucher-left">
                                                            <div class="voucher-discount">
                                                                <i class="fab fa-shopify mb-2" style="color: #ee4d2d; font-size: 32px;"></i>
                                                                <div>
                                                                    @if($voucher->discount_type == 'percentage')
                                                                        {{ $voucher->value }}% OFF
                                                                    @else
                                                                        {{ number_format($voucher->value) }}đ OFF
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="voucher-right">
                                                            <div class="voucher-title">
                                                                <i class="fab fa-shopify me-2" style="color: #ee4d2d; font-size: 24px;"></i>{{ $voucher->title }}
                                                            </div>
                                                            <div class="voucher-info">
                                                                <i class="fas fa-tags me-2"></i>Giảm tối đa: {{ number_format($voucher->max_discount_value) }}đ
                                                            </div>
                                                            <div class="voucher-info">
                                                                <i class="fas fa-shopping-cart me-2"></i>Đơn tối thiểu: {{ number_format($voucher->min_order_value) }}đ
                                                            </div>
                                                            <div class="voucher-info">
                                                                <i class="far fa-calendar-alt me-2"></i>Bắt đầu: {{ date('d/m/Y', strtotime($voucher->start_date)) }}
                                                            </div>
                                                            <a href="{{ route('home') }}" class="use-btn">
                                                                <i class="fas fa-shopping-bag me-2"></i>Sử dụng ngay
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="col-12">
                                                    <h3 class="text-center text-danger" style="margin: 50px 0;">
                                                        <i class="fas fa-ticket-alt me-2"></i>Bạn không có mã giảm giá nào
                                                    </h3>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <form id="formchangePassword">
                                    <h6>Thay đổi mật khẩu</h6>
                                    <div class="mb-3">
                                        <label for="changePassword" class="form-label">Nhập mật khẩu mới:</label>
                                        <input type="password" name="changePassword" class="form-control" id="changePassword"
                                               placeholder="">
                                        <p class="error-text text-danger" id="changePassword-error"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Xác nhận mật khẩu:</label>
                                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                                               placeholder="">
                                        <p class="error-text text-danger" id="confirmPassword-error"></p>
                                    </div>
                                    <button type="submit" class="cr-button btn-primary">Thay đổi mật khẩu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Cập nhật thông tin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="editName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="username" id="editName"
                                   value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="editEmail"
                                   value="{{ $user->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Ảnh đại diện</label>
                            <input type="file" class="form-control" name="avatar" id="avatar" accept="image/*">
                        </div>
                        <!-- Add these CSS rules to your existing style section -->
                        <style>
                            .profile-card {
                                border-radius: 15px;
                                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                                transition: all 0.3s ease;
                            }
                            
                            .profile-card:hover {
                                transform: translateY(-5px);
                                box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
                            }
                            
                            .profile-image-wrapper {
                                position: relative;
                                width: 200px;
                                height: 200px;
                                margin: 0 auto 20px;
                                border-radius: 50%;
                                overflow: hidden;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                            }
                            
                            .profile-image {
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                transition: transform 0.3s ease;
                            }
                            
                            .profile-image:hover {
                                transform: scale(1.05);
                            }
                            
                            .profile-name {
                                font-size: 1.5rem;
                                font-weight: 600;
                                color: #2c3e50;
                                margin-bottom: 5px;
                            }
                            
                            .profile-email {
                                color: #7f8c8d;
                                font-size: 0.95rem;
                                margin-bottom: 20px;
                            }
                            
                            .update-profile-btn {
                                background-color: #27ae60;
                                border: none;
                                padding: 10px 25px;
                                border-radius: 8px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                            }
                            
                            .update-profile-btn:hover {
                                background-color: #219a52;
                                transform: translateY(-2px);
                                box-shadow: 0 4px 15px rgba(39, 174, 96, 0.2);
                            }
                        </style>
                        
                        <!-- Replace the gender input section in your form -->
                        <div class="mb-3">
                            <label class="form-label">Giới tính</label>
                            <div class="gender-group">
                                <div class="gender-option">
                                    <input type="radio" name="gender" id="male" value="Nam" {{ optional($profile)->gender == 'Nam' ? 'checked' : '' }}>
                                    <label for="male">Nam</label>
                                </div>
                                <div class="gender-option">
                                    <input type="radio" name="gender" id="female" value="Nữ" {{ optional($profile)->gender == 'Nữ' ? 'checked' : '' }}>
                                    <label for="female">Nữ</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editPhone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="editPhone"
                                   value="{{ optional($profile)->phone }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBirthdate" class="form-label">Ngày sinh</label>
                            <input type="date" name="birthday" class="form-control" id="editBirthdate"
                                   value="{{ optional($profile)->birthdate }}">
                        </div>
                        <div class="mb-3">
                            <label for="editAddress" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="editAddress"
                                   value="{{ optional($profile)->address }}" required>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="cr-button btn-secondary" data-bs-dismiss="modal">Thoát</button>
                            <button type="submit" class="cr-button btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

<!-- Add this right after the breadcumb-wrapper div -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
