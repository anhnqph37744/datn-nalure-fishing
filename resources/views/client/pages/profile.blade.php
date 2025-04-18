@extends('client.layouts.main')
@section('main')
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
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img
                            src=""
                            alt="Profile Picture" style="width: 200px;height: 200px; object-fit: cover"
                            class="rounded-circle img-fluid mb-3" id="profilePicture">
                        <h5 class="card-title mb-0" id="userName">{{auth()->user()->name}}</h5>
                        <p class="text-muted mb-1" id="userEmail">{{auth()->user()->email}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn bg-success pull-right m-t-n-xs text-white" data-bs-toggle="modal"
                                    data-bs-target="#editProfileModal">Cập nhật thông tin
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title mb-3">Social Media</h6>
                        <div class="d-flex justify-content-start">
                            <p class="me-3">Ngày tham
                                gia: </p>
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
                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <h6 class="mb-0">Họ và tên</h6>
                                        <p class="text-muted">{{ $user->name }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="mb-0">Email</h6>
                                        <p class="text-muted">{{ $user->email }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="mb-0">Giới tính</h6>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="mb-0">Ngày sinh</h6>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="mb-0">Số điện thoại</h6>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="mb-0">Địa chỉ</h6>
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="preferences" role="tabpanel"
                                 aria-labelledby="preferences-tab">
                                <div class="form-check form-switch mb-3">
                                    {{-- @if(\App\Models\user_voucher::where('user_id', auth()->user()->user_id)->exists()) --}}
                                        <div class="container text-center">
                                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                                {{-- @foreach($vouchers as $item) --}}
                                                    <div class="col">
                                                        <div class="voucher-card">
                                                            <div class="voucher-title"></div>
                                                            <div class="voucher-discount">%
                                                                OFF
                                                            </div>
                                                            <div class="voucher-details">Use code:
                                                                <strong></strong></div>
                                                            <div class="voucher-expiry mb-3">
                                                                Hạn dùng mã: <br>
                                                              
                                                            </div>
                                                            <a href="{{route('home')}}" class="use-btn">Sử dụng</a>
                                                        </div>
                                                    </div>
                                                {{-- @endforeach --}}
                                            </div>
                                        </div>
                                    {{-- @else --}}
                                        <h3 class="text-center text-danger" style="margin: 50px 0;">Bạn không có mã giảm
                                            giá nào</h3>
                                    {{-- @endif --}}
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
                    <form id="editProfileForm" action="" enctype="multipart/form-data"
                          method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="editName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="username" id="editName"
                                   value=""
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="editEmail"
                                   value=""
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="editGender" class="form-label">Giới tính:</label>
                            <input type="radio" name="gender" value="Nam" checked> Nam
                            <input type="radio" name="gender" value="Nữ"> Nữ
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Số điện thoại</label>
                            <input type="number" class="form-control" name="phone" id="editEmail"
                                   value=""
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="editBirthdate" class="form-label">Ngày sinh</label>
                            <input type="date" name="birthday" class="form-control" id="editBirthdate"
                                   value="">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="editEmail"
                                   value=""
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="editProfilePicture" class="form-label">Ảnh đại diện</label>
                            <input type="file" name="avatar" class="form-control" id="editProfilePicture">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cr-button btn-secondary" data-bs-dismiss="modal">Thoát</button>
                            <button type="submit" class="cr-button btn-primary" id="saveProfileChanges">Lưu thay đổi
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection