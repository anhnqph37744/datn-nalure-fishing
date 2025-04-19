@extends('admin.layouts.main')

@section('main')
<div class="main">
    <div class="row border-bottom white-bg dashboard-header">
        <div class="col-md-3">
            <h2>Welcome {{ Auth::user()->name }}</h2>
            <small>Top 5 sản phẩm bán chạy</small>
            <ul class="list-group clear-list m-t">
                @foreach ($topProducts as $key => $top)
                <li class="list-group-item fist-item">
                    <span class="pull-right"> {{ $top->total_sold }} </span>
                    <span class="label label-success">{{ $key + 1 }}</span>
                    {{ $top->name }}
                </li>
                @endforeach

            </ul>
        </div>
        <div class="col-md-6">
            <div class="flot-chart dashboard-chart">
                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
            </div>
            <div class="row text-left">
                <div class="col-xs-4">
                    <div class="m-l-md">
                        <span class="h4 font-bold m-t block">{{ $totalRevenueFormatted }} VNĐ</span>
                        <small class="text-muted m-b block">Doanh Thu Trong Năm</small>
                    </div>
                </div>
                <div class="col-xs-4">
                    <span class="h4 font-bold m-t block">{{ $halfYearProfit }} VNĐ</span>
                    <small class="text-muted m-b block">Lợi nhuận nửa đầu năm</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="statistic-box">
                <p>Thống kê theo sản phẩm.</p>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <canvas
                            id="doughnutChart2"
                            width="80"
                            height="80"
                            style="margin: 18px auto 0"></canvas>
                        <h5>Tỷ lệ huỷ đơn </h5>
                    </div>
                    <div class="col-lg-6">
                        <canvas
                            id="doughnutChart"
                            width="80"
                            height="80"
                            style="margin: 18px auto 0"></canvas>
                        <h5>Top sản phẩm bán chạy nhất</h5>
                    </div>
                </div>
                <div class="m-t">
                    <small>Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry.</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Lọc doanh thu theo khoảng thời gian</h5>
                                <span class="label label-primary">New+</span>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a
                                        class="dropdown-toggle"
                                        data-toggle="dropdown"
                                        href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a></li>
                                        <li><a href="#">Config option 2</a></li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row align-items-end g-3 filter-form">
                                    <div class="col-md-4">
                                        <label for="start_date" class="form-label">Từ ngày</label>
                                        <input type="date" class="form-control" id="start_date">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="end_date" class="form-label">Đến ngày</label>
                                        <input type="date" class="form-control" id="end_date">
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end mt-5" style="margin-top: 23px !important;">
                                        <button type="submit" class="btn btn-primary w-100" id="filter-revenure">
                                            <i class="fa fa-filter "></i>Lọc
                                        </button>
                                    </div>
                                </div>
                                <p>Doanh thu : <span id="revenure-result">?</span></p>
                            </div>

                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Đơn hàng theo các trạng thái</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a
                                        class="dropdown-toggle"
                                        data-toggle="dropdown"
                                        href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a></li>
                                        <li><a href="#">Config option 2</a></li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content no-padding">
                            <canvas id="orderStatusChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Sản phầm tồn kho lâu && không bán được</h5>
                                <div class="ibox-tools">
                                    <span class="label label-warning-light pull-right">{{ count($slowMoving) + count($lowStock) }} Sản Phẩm</span>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <div class="feed-activity-list">
                                        @foreach($lowStock as $lowS)
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="{{$lowS->image}}" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right badge bg-{{ $lowS->quantity == 0 ? "danger" : "warning" }}">{{ $lowS->quantity == 0 ? "Hết hàng" : "Sắp hết hàng" }}</small>
                                                <strong>{{ $lowS->name }}</strong>
                                                <br />
                                                <small class="text-muted">SL : {{ $lowS->quantity }}</small>
                                            </div>
                                        </div>

                                        @endforeach
                                        @foreach($slowMoving as $lowS)
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="{{$lowS->image}}" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right badge bg-warning">Tồn kho lâu ngày</small>
                                                <strong>{{ $lowS->name }}</strong>
                                                <br />
                                                <small class="text-muted">SL : {{ $lowS->quantity }}</small>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Thống kê</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a
                                        class="dropdown-toggle"
                                        data-toggle="dropdown"
                                        href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a></li>
                                        <li><a href="#">Config option 2</a></li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3>Đơn hàng chưa được xử lí</h3>
                            </div>
                            <div class="ibox-content inspinia-timeline">
                                @foreach ($latestOrders as $lates)
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-briefcase"></i>
                                            {{ $lates->created_at->format('d/m/Y') }}
                                            <br />
                                            <small class="text-navy">2 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content no-top-border">
                                            <p class="m-b-xs"><strong>{{ $lates->code }}</strong></p>

                                            @foreach ($lates->orderItems ?? [] as $item)
                                            x{{ $item->quantity }} {{ optional($item->product)->name ?? 'Sản phẩm không tồn tại' }} <br>
                                            @endforeach


                                            <p>
                                                <span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2017
                </div>
            </div>
        </div>
    </div>

    <div class="small-chat-box fadeInRight animated">
        <div class="heading" draggable="true">
            <small class="chat-date pull-right"> 02.19.2015 </small>
            Small chat
        </div>

        <div class="content">
            <div class="left">
                <div class="author-name">
                    Monica Jackson <small class="chat-date"> 10:02 am </small>
                </div>
                <div class="chat-message active">
                    Lorem Ipsum is simply dummy text input.
                </div>
            </div>
            <div class="right">
                <div class="author-name">
                    Mick Smith
                    <small class="chat-date"> 11:24 am </small>
                </div>
                <div class="chat-message">Lorem Ipsum is simpl.</div>
            </div>
            <div class="left">
                <div class="author-name">
                    Alice Novak
                    <small class="chat-date"> 08:45 pm </small>
                </div>
                <div class="chat-message active">Check this stock char.</div>
            </div>
            <div class="right">
                <div class="author-name">
                    Anna Lamson
                    <small class="chat-date"> 11:24 am </small>
                </div>
                <div class="chat-message">
                    The standard chunk of Lorem Ipsum
                </div>
            </div>
            <div class="left">
                <div class="author-name">
                    Mick Lane
                    <small class="chat-date"> 08:45 pm </small>
                </div>
                <div class="chat-message active">
                    I belive that. Lorem Ipsum is simply dummy text.
                </div>
            </div>
        </div>
        <div class="form-chat">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" />
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Send</button>
                </span>
            </div>
        </div>
    </div>
    <div id="small-chat">
        <span class="badge badge-warning pull-right">5</span>
        <a class="open-small-chat">
            <i class="fa fa-comments"></i>
        </a>
    </div>
    <div id="right-sidebar" class="animated">
        <div class="sidebar-container">
            <ul class="nav nav-tabs navs-3">
                <li class="active">
                    <a data-toggle="tab" href="#tab-1"> Notes </a>
                </li>
                <li><a data-toggle="tab" href="#tab-2"> Projects </a></li>
                <li class>
                    <a data-toggle="tab" href="#tab-3">
                        <i class="fa fa-gear"></i>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="sidebar-title">
                        <h3><i class="fa fa-comments-o"></i> Latest Notes</h3>
                        <small><i class="fa fa-tim"></i> You have 10 new message.</small>
                    </div>

                    <div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img
                                        alt="image"
                                        class="img-circle message-avatar"
                                        src="img/a1.jpg" />

                                    <div class="m-t-xs">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    There are many variations of passages of Lorem Ipsum
                                    available.
                                    <br />
                                    <small class="text-muted">Today 4:21 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img
                                        alt="image"
                                        class="img-circle message-avatar"
                                        src="img/a2.jpg" />
                                </div>
                                <div class="media-body">
                                    The point of using Lorem Ipsum is that it has a
                                    more-or-less normal.
                                    <br />
                                    <small class="text-muted">Yesterday 2:45 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img
                                        alt="image"
                                        class="img-circle message-avatar"
                                        src="img/a3.jpg" />

                                    <div class="m-t-xs">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    Mevolved over the years, sometimes by accident,
                                    sometimes on purpose (injected humour and the like).
                                    <br />
                                    <small class="text-muted">Yesterday 1:10 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img
                                        alt="image"
                                        class="img-circle message-avatar"
                                        src="{{asset('admin/img/a4.jpg')}}" />
                                </div>

                                <div class="media-body">
                                    Lorem Ipsum, you need to be sure there isn't anything
                                    embarrassing hidden in the
                                    <br />
                                    <small class="text-muted">Monday 8:37 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img
                                        alt="image"
                                        class="img-circle message-avatar"
                                        src="img/a8.jpg" />
                                </div>
                                <div class="media-body">
                                    All the Lorem Ipsum generators on the Internet tend to
                                    repeat.
                                    <br />
                                    <small class="text-muted">Today 4:21 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img
                                        alt="image"
                                        class="img-circle message-avatar"
                                        src="{{asset('admin/img/a7.jpg')}}" />
                                </div>
                                <div class="media-body">
                                    Renaissance. The first line of Lorem Ipsum, "Lorem
                                    ipsum dolor sit amet..", comes from a line in section
                                    1.10.32.
                                    <br />
                                    <small class="text-muted">Yesterday 2:45 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img
                                        alt="image"
                                        class="img-circle message-avatar"
                                        src="img/a3.jpg" />

                                    <div class="m-t-xs">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    The standard chunk of Lorem Ipsum used since the 1500s
                                    is reproduced below.
                                    <br />
                                    <small class="text-muted">Yesterday 1:10 pm</small>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-message">
                            <a href="#">
                                <div class="pull-left text-center">
                                    <img
                                        alt="image"
                                        class="img-circle message-avatar"
                                        src="{{asset('admin/img/a4.jpg')}}" />
                                </div>
                                <div class="media-body">
                                    Uncover many web sites still in their infancy. Various
                                    versions have.
                                    <br />
                                    <small class="text-muted">Monday 8:37 pm</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="tab-2" class="tab-pane">
                    <div class="sidebar-title">
                        <h3><i class="fa fa-cube"></i> Latest projects</h3>
                        <small><i class="fa fa-tim"></i> You have 14 projects. 10 not
                            completed.</small>
                    </div>

                    <ul class="sidebar-list">
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Business valuation</h4>
                                It is a long established fact that a reader will be
                                distracted.

                                <div class="small">Completion with: 22%</div>
                                <div class="progress progress-mini">
                                    <div
                                        style="width: 22%"
                                        class="progress-bar progress-bar-warning"></div>
                                </div>
                                <div class="small text-muted m-t-xs">
                                    Project end: 4:00 pm - 12.06.2014
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Contract with Company</h4>
                                Many desktop publishing packages and web page editors.

                                <div class="small">Completion with: 48%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 48%" class="progress-bar"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Meeting</h4>
                                By the readable content of a page when looking at its
                                layout.

                                <div class="small">Completion with: 14%</div>
                                <div class="progress progress-mini">
                                    <div
                                        style="width: 14%"
                                        class="progress-bar progress-bar-info"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-primary pull-right">NEW</span>
                                <h4>The generated</h4>
                                There are many variations of passages of Lorem Ipsum
                                available.
                                <div class="small">Completion with: 22%</div>
                                <div class="small text-muted m-t-xs">
                                    Project end: 4:00 pm - 12.06.2014
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Business valuation</h4>
                                It is a long established fact that a reader will be
                                distracted.

                                <div class="small">Completion with: 22%</div>
                                <div class="progress progress-mini">
                                    <div
                                        style="width: 22%"
                                        class="progress-bar progress-bar-warning"></div>
                                </div>
                                <div class="small text-muted m-t-xs">
                                    Project end: 4:00 pm - 12.06.2014
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Contract with Company</h4>
                                Many desktop publishing packages and web page editors.

                                <div class="small">Completion with: 48%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 48%" class="progress-bar"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="small pull-right m-t-xs">9 hours ago</div>
                                <h4>Meeting</h4>
                                By the readable content of a page when looking at its
                                layout.

                                <div class="small">Completion with: 14%</div>
                                <div class="progress progress-mini">
                                    <div
                                        style="width: 14%"
                                        class="progress-bar progress-bar-info"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-primary pull-right">NEW</span>
                                <h4>The generated</h4>
                                <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                There are many variations of passages of Lorem Ipsum
                                available.
                                <div class="small">Completion with: 22%</div>
                                <div class="small text-muted m-t-xs">
                                    Project end: 4:00 pm - 12.06.2014
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div id="tab-3" class="tab-pane">
                    <div class="sidebar-title">
                        <h3><i class="fa fa-gears"></i> Settings</h3>
                        <small><i class="fa fa-tim"></i> You have 14 projects. 10 not
                            completed.</small>
                    </div>

                    <div class="setings-item">
                        <span> Show notifications </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input
                                    type="checkbox"
                                    name="collapsemenu"
                                    class="onoffswitch-checkbox"
                                    id="example" />
                                <label class="onoffswitch-label" for="example">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span> Disable Chat </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input
                                    type="checkbox"
                                    name="collapsemenu"
                                    checked
                                    class="onoffswitch-checkbox"
                                    id="example2" />
                                <label class="onoffswitch-label" for="example2">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span> Enable history </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input
                                    type="checkbox"
                                    name="collapsemenu"
                                    class="onoffswitch-checkbox"
                                    id="example3" />
                                <label class="onoffswitch-label" for="example3">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span> Show charts </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input
                                    type="checkbox"
                                    name="collapsemenu"
                                    class="onoffswitch-checkbox"
                                    id="example4" />
                                <label class="onoffswitch-label" for="example4">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span> Offline users </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input
                                    type="checkbox"
                                    checked
                                    name="collapsemenu"
                                    class="onoffswitch-checkbox"
                                    id="example5" />
                                <label class="onoffswitch-label" for="example5">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span> Global search </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input
                                    type="checkbox"
                                    checked
                                    name="collapsemenu"
                                    class="onoffswitch-checkbox"
                                    id="example6" />
                                <label class="onoffswitch-label" for="example6">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                        <span> Update everyday </span>
                        <div class="switch">
                            <div class="onoffswitch">
                                <input
                                    type="checkbox"
                                    name="collapsemenu"
                                    class="onoffswitch-checkbox"
                                    id="example7" />
                                <label class="onoffswitch-label" for="example7">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-content">
                        <h4>Settings</h4>
                        <div class="small">
                            I belive that. Lorem Ipsum is simply dummy text of the
                            printing and typesetting industry. And typesetting
                            industry. Lorem Ipsum has been the industry's standard
                            dummy text ever since the 1500s. Over the years, sometimes
                            by accident, sometimes on purpose (injected humour and the
                            like).
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    const btn = document.querySelector('#filter-revenure');
    btn.addEventListener('click', () => {
        var startDate = document.querySelector('#start_date').value;
        var endDate = document.querySelector('#end_date').value;
        if (startDate && endDate) {
            $.ajax({
                url: '{{ route('admin.revenue.filter') }}',
                method: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate,
                },
                success: function(response) {
                    document.querySelector('#revenure-result').innerHTML = response.totalRevenue != 0 ? response.totalRevenue + ' VNĐ' : 'Không có doanh thu ';
                },
                error: function(xhr) {
                    console.error('Lỗi:', xhr.responseText);
                }
            });
        } else {
            alert("Vui lòng chọn đầy đủ ngày bắt đầu và kết thúc.");
        }
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = @json(array_values($orderStatusData));
    const labels = @json(array_keys($orderStatusData));

    const ctx = document.getElementById('orderStatusChart').getContext('2d');
    const orderStatusChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Tỷ lệ đơn hàng theo trạng thái',
                data: data,
                backgroundColor: [
                    '#1ab394', // green - delivered
                    '#f8ac59', // yellow - processing
                    '#ed5565', // red - canceled
                    '#23c6c8'  // blue - returned
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            return `${label}: ${value} đơn`;
                        }
                    }
                }
            }
        }
    });
</script>

@endsection