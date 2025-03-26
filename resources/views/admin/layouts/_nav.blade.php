<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ asset('admin/img/profile_small.jpg') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Quang Anh</strong>
                            </span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">IN+</div>
            </li>

            <li class="active">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="fas fa-list"></i>
                    <span class="nav-label">Danh Mục</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('admin.category.create') }}">Thêm Danh Mục</a></li>
                    <li><a href="{{ route('admin.category.index') }}">Danh Sách Danh Mục</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-cogs"></i>
                    <span class="nav-label">Thuộc Tính</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('admin.attribute.create') }}">Thêm Thuộc Tính</a></li>
                    <li><a href="{{ route('admin.attribute.index') }}">Danh Sách Thuộc Tính</a></li>
                    <li><a href="{{ route('admin.attribute_value.create') }}">Thêm Giá Trị Thuộc Tính</a></li>
                    <li><a href="{{ route('admin.attribute_value.index') }}">Danh Sách Giá Trị Thuộc Tính</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-cogs"></i>
                    <span class="nav-label">Banner</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('banner.create')}}">Thêm Banner</a></li>
                    <li><a href="{{ route('banner.index') }}">Danh Sách Banner</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-box"></i>
                    <span class="nav-label">Sản Phẩm</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('admin.product.create') }}">Thêm Sản Phẩm</a></li>
                    <li><a href="{{ route('admin.product.index') }}">Danh Sách Sản Phẩm</a></li>
                </ul>
            </li>
            <li>
                <a href=""><i class="fas fa-shopping-cart"></i>
                    <span class="nav-label">Đơn Hàng </span><span class="label label-info pull-right">62</span></a>
            </li>
            <li>
                <a href="#"><i class="fas fa-list"></i>
                    <span class="nav-label">Voucher</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('admin.voucher.create') }}">Thêm Voucher</a></li>
                    <li><a href="{{ route('admin.voucher.index') }}">Danh Sách Voucher</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-user"></i>
                    <span class="nav-label">Tài Khoản</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('admin.user.create') }}">Thêm Tài Khoản</a></li>
                    <li><a href="{{ route('admin.user.index') }}">Danh Sách Tài Khoản</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-user-shield"></i>
                    <span class="nav-label">Vai Trò</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('admin.role.create') }}">Thêm Vai Trò</a></li>
                    <li><a href="{{ route('admin.role.index') }}">Danh Sách Vai Trò</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-user-tag"></i>
                    <span class="nav-label">Cấp Vai Trò</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('admin.user-role.create') }}">Cấp Vai Trò</a></li>
                    <li><a href="{{ route('admin.user-role.index') }}">Danh Sách Vai Trò</a></li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-shield-alt"></i>
                    <span class="nav-label"> Quyền Hạn</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li><a href="{{ route('admin.permission.create') }}">Thêm Quyền hạn</a></li>
                    <li><a href="{{ route('admin.permission.index') }}">Danh Sách Quyền Hạn</a></li>
                    <li><a href="{{ route('admin.perrmission-role.create') }}">Gán Quyền Cho Vai Trò</a></li>
                    <li><a href="{{ route('admin.perrmission-role.index') }}">Danh Sách Quyền Hạn Cho Vai Trò</a></li>
                </ul>
            </li>


        </ul>
    </div>
</nav>
