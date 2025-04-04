@extends('admin.layouts.main')

@section('main')
<div class="main">
    <div class="row border-bottom white-bg dashboard-header">
        <div class="col-md-3">
            <h2>Welcome Amelia</h2>
            <small>You have 42 messages and 6 notifications.</small>
            <ul class="list-group clear-list m-t">
                <li class="list-group-item fist-item">
                    <span class="pull-right"> 09:00 pm </span>
                    <span class="label label-success">1</span>
                    Please contact me
                </li>
                <li class="list-group-item">
                    <span class="pull-right"> 10:16 am </span>
                    <span class="label label-info">2</span> Sign a contract
                </li>
                <li class="list-group-item">
                    <span class="pull-right"> 08:22 pm </span>
                    <span class="label label-primary">3</span>
                    Open new shop
                </li>
                <li class="list-group-item">
                    <span class="pull-right"> 11:06 pm </span>
                    <span class="label label-default">4</span>
                    Call back to Sylvia
                </li>
                <li class="list-group-item">
                    <span class="pull-right"> 12:00 am </span>
                    <span class="label label-primary">5</span>
                    Write a letter to Sandra
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="flot-chart dashboard-chart">
                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
            </div>
            <div class="row text-left">
                <div class="col-xs-4">
                    <div class="m-l-md">
                        <span class="h4 font-bold m-t block">$ 406,100</span>
                        <small class="text-muted m-b block">Sales marketing report</small>
                    </div>
                </div>
                <div class="col-xs-4">
                    <span class="h4 font-bold m-t block">$ 150,401</span>
                    <small class="text-muted m-b block">Annual sales revenue</small>
                </div>
                <div class="col-xs-4">
                    <span class="h4 font-bold m-t block">$ 16,822</span>
                    <small class="text-muted m-b block">Half-year revenue margin</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="statistic-box">
                <h4>Project Beta progress</h4>
                <p>You have two project with not compleated task.</p>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <canvas
                            id="doughnutChart2"
                            width="80"
                            height="80"
                            style="margin: 18px auto 0"></canvas>
                        <h5>Kolter</h5>
                    </div>
                    <div class="col-lg-6">
                        <canvas
                            id="doughnutChart"
                            width="80"
                            height="80"
                            style="margin: 18px auto 0"></canvas>
                        <h5>Maxtor</h5>
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
                                <h5>New data for the report</h5>
                                <span class="label label-primary">IN+</span>
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
                                <div>
                                    <div class="pull-right text-right">
                                        <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>
                                        <br />
                                        <small class="font-bold">$ 20 054.43</small>
                                    </div>
                                    <h4>
                                        NYS report new data!
                                        <br />
                                        <small class="m-r"><a href="graph_flot.html">
                                                Check the stock price!
                                            </a>
                                        </small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Read below comments</h5>
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
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p>
                                            <a class="text-info" href="#">@Alan Marry</a> I
                                            belive that. Lorem Ipsum is simply dummy text of
                                            the printing and typesetting industry.
                                        </p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 minuts ago</small>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <a class="text-info" href="#">@Stock Man</a> Check
                                            this stock chart. This price is crazy!
                                        </p>
                                        <div class="text-center m">
                                            <span id="sparkline8"></span>
                                        </div>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 hours ago</small>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <a class="text-info" href="#">@Kevin Smith</a>
                                            Lorem ipsum unknown printer took a galley
                                        </p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <a class="text-info" href="#">@Jonathan Febrick</a>
                                            The standard chunk of Lorem Ipsum
                                        </p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 hour ago</small>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <a class="text-info" href="#">@Alan Marry</a> I
                                            belive that. Lorem Ipsum is simply dummy text of
                                            the printing and typesetting industry.
                                        </p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 minuts ago</small>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <a class="text-info" href="#">@Kevin Smith</a>
                                            Lorem ipsum unknown printer took a galley
                                        </p>
                                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Your daily feed</h5>
                                <div class="ibox-tools">
                                    <span class="label label-warning-light pull-right">10 Messages</span>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <div class="feed-activity-list">
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="{{asset('admin/img/profile.jpg')}}" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">5m ago</small>
                                                <strong>Monica Smith</strong>
                                                posted a new blog.
                                                <br />
                                                <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                            </div>
                                        </div>

                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="img/a2.jpg" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">2h ago</small>
                                                <strong>Mark Johnson</strong>
                                                posted message on
                                                <strong>Monica Smith</strong>
                                                site. <br />
                                                <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="img/a3.jpg" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">2h ago</small>
                                                <strong>Janet Rosowski</strong>
                                                add 1 photo on
                                                <strong>Monica Smith</strong>.
                                                <br />
                                                <small class="text-muted">2 days ago at 8:30am</small>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="{{asset('admin/img/a4.jpg')}}" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right text-navy">5h ago</small>
                                                <strong>Chris Johnatan Overtunk</strong>
                                                started following
                                                <strong>Monica Smith</strong>.
                                                <br />
                                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                <div class="actions">
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i>
                                                        Like
                                                    </a>
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="img/a5.jpg" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">2h ago</small>
                                                <strong>Kim Smith</strong>
                                                posted message on
                                                <strong>Monica Smith</strong>
                                                site. <br />
                                                <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                <div class="well">
                                                    Lorem Ipsum is simply dummy text of the
                                                    printing and typesetting industry. Lorem Ipsum
                                                    has been the industry's standard dummy text
                                                    ever since the 1500s. Over the years,
                                                    sometimes by accident, sometimes on purpose
                                                    (injected humour and the like).
                                                </div>
                                                <div class="pull-right">
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i>
                                                        Like
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="{{asset('admin/img/profile.jpg')}}" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">23h ago</small>
                                                <strong>Monica Smith</strong>
                                                love
                                                <strong>Kim Smith</strong>.
                                                <br />
                                                <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="profile.html" class="pull-left">
                                                <img
                                                    alt="image"
                                                    class="img-circle"
                                                    src="{{asset('admin/img/a7.jpg')}}" />
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">46h ago</small>
                                                <strong>Mike Loreipsum</strong>
                                                started following
                                                <strong>Monica Smith</strong>.
                                                <br />
                                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block m-t">
                                        <i class="fa fa-arrow-down"></i>
                                        Show More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Alpha project</h5>
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
                                <h3>You have meeting today!</h3>
                                <small><i class="fa fa-map-marker"></i> Meeting is on
                                    6:00am. Check your schedule to see detail.</small>
                            </div>
                            <div class="ibox-content inspinia-timeline">
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-briefcase"></i>
                                            6:00 am
                                            <br />
                                            <small class="text-navy">2 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content no-top-border">
                                            <p class="m-b-xs"><strong>Meeting</strong></p>

                                            <p>
                                                Conference on the sales results for the previous
                                                year. Monica please examine sales trends in
                                                marketing and products. Below please find the
                                                current status of the sale.
                                            </p>

                                            <p>
                                                <span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-file-text"></i>
                                            7:00 am
                                            <br />
                                            <small class="text-navy">3 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs">
                                                <strong>Send documents to Mike</strong>
                                            </p>
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing
                                                and typesetting industry. Lorem Ipsum has been
                                                the industry's standard dummy text ever since.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-coffee"></i>
                                            8:00 am
                                            <br />
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs">
                                                <strong>Coffee Break</strong>
                                            </p>
                                            <p>
                                                Go to shop and find some products. Lorem Ipsum
                                                is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the
                                                industry's.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-phone"></i>
                                            11:00 am
                                            <br />
                                            <small class="text-navy">21 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs">
                                                <strong>Phone with Jeronimo</strong>
                                            </p>
                                            <p>
                                                Lorem Ipsum has been the industry's standard
                                                dummy text ever since.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-user-md"></i>
                                            09:00 pm
                                            <br />
                                            <small>21 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs">
                                                <strong>Go to the doctor dr Smith</strong>
                                            </p>
                                            <p>Find some issue and go to doctor.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-comments"></i>
                                            12:50 pm
                                            <br />
                                            <small class="text-navy">48 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs">
                                                <strong>Chat with Monica and Sandra</strong>
                                            </p>
                                            <p>
                                                Web sites still in their infancy. Various
                                                versions have evolved over the years, sometimes
                                                by accident, sometimes on purpose (injected
                                                humour and the like).
                                            </p>
                                        </div>
                                    </div>
                                </div>
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

@endsection
