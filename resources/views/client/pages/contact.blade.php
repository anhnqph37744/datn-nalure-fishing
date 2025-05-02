@extends('client.layouts.main')
@section('main')
<div class="breadcumb-wrapper background-image" style="background-image: url(&quot;assets/img/breadcrumb/breadcrumb-1-1.png&quot;);">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Liên hệ</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="http://127.0.0.1:8000/">Trang chủ</a></li>
                        <li>Liên hệ </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="contact-form">
                <div class="title-area text-start mb-40">
                    <span class="sec-subtitle">Contact With Us</span>
                    <h2 class="sec-title">Have Any Questions?</h2>
                    <div class="sec-line sec-line-left"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.4s">
                        <form class="form-style2 ajax-contact" action="mail.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input name="name" id="name" type="text" placeholder="Enter Your Name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" id="email" type="email" placeholder="Enter Your Email">
                                </div>
                                <div class="col-md-6 form-group">
                                    <select class="form-select" name="subject" aria-label="Default select example">
                                        <option selected="">Select Subject</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="number" id="number" type="number" placeholder="Your number">
                                </div>
                                <div class="col-12 form-group">
                                    <textarea name="message" id="message" placeholder="Your message"></textarea>
                                </div>
                                <div class="col-12 form-group mb-2">
                                    <button type="submit" class="vs-btn">Send Message</button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="">
        <div class="container">
            <div class="info-box">
                <div class="row g-xl-5">
                    <div class="col-lg-4">
                        <div class="vs-media align-items-center">
                            <div class="media-icon"><i class="fas fa-map-marked-alt"></i></div>
                            <div class="media-body">
                                <h3 class="info-box-title">Địa chỉ</h3>
                                <p class="media-info">63/33/52 lê đức thọ , Phường mỹ đình 2 , thành phố hà nội </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="vs-media align-items-center">
                            <div class="media-icon"><i class="fas fa-address-card"></i></div>
                            <div class="media-body">
                                <h3 class="info-box-title">Liên hệ</h3>
                                <!-- <p class="media-info">Mobile: <a class="text-inherit" href="">068 26589 996</a></p> -->
                                <p class="media-info">Sdt: <a class="text-inherit" href="">0356807235</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="vs-media align-items-center">
                            <div class="media-icon"><i class="fas fa-clock"></i></div>
                            <div class="media-body">
                                <h3 class="info-box-title">Giờ làm việcviệc</h3>
                                <p class="media-info">Thứ 2 - cncn <a class="text-inherit" href="">8:30 - 20:00</a>
                                </p>
                                <!-- <p class="media-info">Saturday &amp; Sunday: <a class="text-inherit" href="">9:30 -
                                        21:30</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="ratio ratio-21x9" style="height:620px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3408.842593627511!2d105.77053087476932!3d21.03159818768202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b12361d593%3A0x33993b8a478a1aa2!2zMiBOZy4gMjAgxJAuIE3hu7kgxJDDrG5oLCBN4bu5IMSQw6xuaCwgTmFtIFThu6sgTGnDqm0sIEjDoCBO4buZaSAxMDAwMDAsIFZp4buHdCBOYW0!5e1!3m2!1svi!2s!4v1745828421164!5m2!1svi!2s" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <section class="bg-body space-title">
        <div class="container">
            <div class="subscribe">
                <div class="row gx-0 align-items-center justify-content-between z-index-common ">
                    <div class="col-xl-auto">
                        <p class="sec-subtitle mb-0">Newsletter</p>
                        <h2 class="sec-title h1 text-white">Get Regular Update</h2>
                    </div>
                    <div class="col-xl-auto">
                        <form action="#" class="form-style">
                            <div class="row align-items-center">
                                <div class="form-group mb-0 col">
                                    <input type="text" placeholder="Enter your email address....">
                                </div>
                                <div class="col-md-auto col-12">
                                    <button class="vs-btn w-100">Subscribe <i class="fab fa-telegram-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection