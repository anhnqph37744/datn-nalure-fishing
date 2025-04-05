@extends('client.layouts.main')
@section('main')
<div class="row vs-carousel" data-arrows="false" data-dots="true" data-dots-lg-show="true" data-fade="true">
    <div class="hero-inner">
        <!-- Background image -->
        <div class="hero-bg background-image" data-bg-src="{{ asset('client/assets/img/bg/hero-bg-1-1.jpg') }}">
        </div>
        <!-- Shape mockup -->
        <div class="shape-mockup hero-shape jump-img d-none d-xxl-block">
            <img src="{{ asset('client/assets/img/bg/hero-shape1.png') }}" alt="hero shape">
        </div>
        <!-- Carousel -->
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1900">
            <div class="carousel-inner">
                @foreach ($banners as $index => $banner)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <a href="{{ $banner->link ?? '#' }}">
                            <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="{{ $banner->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
            
            <!-- Hero Content -->
            {{-- <div class="hero-content">
                <h1 class="hero-title">Let’s Go..! <br> Fishing With Marino</h1>
                <p class="hero-text">Lorem ipsum dolor sit amet consectur adipiscing elit
                    eiusmod ex tempor incididunt labore dolore magna
                    aliquaenim ad minim veniam quis nostrud exercitation laboris.</p>
                <div class="hero-btns">
                    <a href="about.html" class="vs-btn me-3">About Us <i class="far fa-arrow-right"></i></a>
                    <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                            class="fas fa-play"></i></a>
                </div>
            </div> --}}
            
            {{-- <div class="hero-inner">
                <div class="hero-bg background-image" data-bg-src="assets/img/bg/hero-bg-1-2.jpg">
                </div>
                <div class="shape-mockup hero-shape jump-img d-none d-xxl-block">
                    <img src="{{ asset('client/assets/img/bg/hero-shape1.png') }}" alt="hero shape">
                </div>
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title">With Marino <br> Fishing Let’s Go</h1>
                        <p class="hero-text">Lorem ipsum dolor sit amet consectur adipiscing elit
                            eiusmod ex tempor incididunt labore dolore magna
                            aliquaenim ad minim veniam quis nostrud exercitation laboris.</p>
                        <div class="hero-btns">
                            <a href="course.html" class="vs-btn me-3">About Us <i class="far fa-arrow-right"></i></a>
                            <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-inner">
                <div class="hero-bg background-image" data-bg-src="{{ asset('client/assets/img/bg/hero-bg-1-3.jpg') }}">
                </div>
                <div class="shape-mockup hero-shape jump-img d-none d-xxl-block">
                    <img src="{{ asset('client/assets/img/bg/hero-shape1.png') }}" alt="hero shape">
                </div>
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title">nostrud exercitation <br> Fishing With Marino</h1>
                        <p class="hero-text">Lorem ipsum dolor sit amet consectur adipiscing elit
                            eiusmod ex tempor incididunt labore dolore magna
                            aliquaenim ad minim veniam quis nostrud exercitation laboris.</p>
                        <div class="hero-btns">
                            <a href="course.html" class="vs-btn me-3">About Us <i class="far fa-arrow-right"></i></a>
                            <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}} 

    <section class="space service">
        <div class="container">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">our Service</span>
                <h2 class="sec-title">Our Awesome Services</h2>
                <div class="sec-line"></div>
            </div>
            <div class="row vs-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2"
                data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true"
                data-md-center-mode="true" data-sm-center-mode="true" data-xs-center-mode="true" data-arrows="true"
                data-dots="false">
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="{{ asset('client/assets/img/service/sr-1-1.png') }}"
                                alt="service thumbnail"></div>
                        <div class="service-icon"><img src="{{ asset('client/assets/img/icon/sr-1-1.svg') }}"
                                alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Free Fishing</a>
                        </h3>
                        <p class="service-text">Curabitur is a aliquet quam id dui posre blandgit ivamus magna.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="{{ asset('client/assets/img/service/sr-1-2.png') }}"
                                alt="service thumbnail"></div>
                        <div class="service-icon"><img src="{{ asset('client/assets/img/icon/sr-1-2.svg') }}"
                                alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Float
                                Fishing</a></h3>
                        <p class="service-text">Curabitur is a aliquet quam id dui posre blandgit ivamus magna.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="{{ asset('client/assets/img/service/sr-1-3.png') }}"
                                alt="service thumbnail"></div>
                        <div class="service-icon"><img src="{{ asset('client/assets/img/icon/sr-1-3.svg') }}"
                                alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Solo & Team
                                Fishing</a></h3>
                        <p class="service-text">Curabitur is a aliquet quam id dui posre blandgit ivamus magna.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="{{ asset('client/assets/img/service/sr-1-4.png') }}"
                                alt="service thumbnail"></div>
                        <div class="service-icon"><img src="{{ asset('client/assets/img/icon/sr-1-4.svg') }}"
                                alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Wild Fishing</a>
                        </h3>
                        <p class="service-text">Curabitur is a aliquet quam id dui posre blandgit ivamus magna.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="{{ asset('client/assets/img/service/sr-1-1.png') }}"
                                alt="service thumbnail"></div>
                        <div class="service-icon"><img src="{{ asset('client/assets/img/icon/sr-1-5.svg') }}"
                                alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Free Fishing</a>
                        </h3>
                        <p class="service-text">Curabitur is a aliquet quam id dui posre blandgit ivamus magna.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="{{ asset('client/assets/img/service/sr-1-2.png') }}"
                                alt="service thumbnail"></div>
                        <div class="service-icon"><img src="{{ asset('client/assets/img/icon/sr-1-6.svg') }}"
                                alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Float
                                Fishing</a></h3>
                        <p class="service-text">Curabitur is a aliquet quam id dui posre blandgit ivamus magna.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="{{ asset('client/assets/img/service/sr-1-3.png') }}"
                                alt="service thumbnail"></div>
                        <div class="service-icon"><img src="{{ asset('client/assets/img/icon/sr-1-7.svg') }}"
                                alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Solo & Team
                                Fishing</a></h3>
                        <p class="service-text">Curabitur is a aliquet quam id dui posre blandgit ivamus magna.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="{{ asset('client/assets/img/service/sr-1-4.png') }}"
                                alt="service thumbnail"></div>
                        <div class="service-icon"><img src="{{ asset('client/assets/img/icon/sr-1-5.svg') }}"
                                alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Wild Fishing</a>
                        </h3>
                        <p class="service-text">Curabitur is a aliquet quam id dui posre blandgit ivamus magna.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-smoke position-relative overflow-hidden">
        <div class="shape-mockup explore-shape jump-img d-none d-xxl-block">
            <img src="{{ asset('client/assets/img/bg/explore-shape1.png') }}" alt="explore shape">
        </div>
        <div class="container">
            <div class="row gx-40">
                <div class="col-lg-6">
                    <div class="space">
                        <div class="title-area text-start mb-4 pb-1 wow fadeInUp wow-animated" data-wow-delay="0.3s">
                            <span class="sec-subtitle">Explore Us</span>
                            <h2 class="sec-title">Welcome To Marino</h2>
                            <div class="sec-line sec-line-left"></div>
                        </div>
                        <p class="explore-text">
                            Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei.
                            Xei an periculaeuripidis, fincartem ei est. Dlienum phaed is in mei. Lei an Hericulaeuripidis,
                            hincartem ei est.
                        </p>
                        <div class="explore-list">
                            <ul class="list-unstyled">
                                <li>Lorem ipsum dolor sit amet consectur adipiscing elit eiusmod</li>
                                <li>Mei an lericulaeu adipiscing elit eiusmod ripidist.</li>
                                <li>lericulaeuripidist sit amet consectur.</li>
                                <li>Ipsum dolor sit amet consectur adipiscing Mei an lericulaeuripidist.</li>
                            </ul>
                        </div>
                        <a href="about.html" class="vs-btn">About Us <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="img_box1">
                        <div class="img_1 mega-hover"><img src="{{ asset('client/assets/img/explore/exp-1-2.png') }}"
                                alt="about"></div>
                        <div class="img_2 mega-hover"><img src="{{ asset('client/assets/img/explore/exp-1-1.png') }}"
                                alt="about"></div>
                        <div class="exp_box1">
                            <h3 class="exp_box_title">15+ Great</h3>
                            <p class="exp_box_text">Hunting Shot</p>
                        </div>
                        <div class="exp_box1">
                            <h3 class="exp_box_title">25+ Years</h3>
                            <p class="exp_box_text">Of Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space overflow-hidden position-relative counter"
        data-bg-src="{{ asset('client/assets/img/bg/counter-bg.png') }}">
        <div class="shape-mockup counter-shape jump-img d-none d-xxl-block">
            <img src="assets/img/bg/counter-shape.png" alt="counter shape">
        </div>
        <div class="counter-style2">
            <div class="container">
                <div class="row g-xl-5 justify-content-lg-between justify-content-center">
                    <div class="col-lg-auto col-md-6">
                        <div class="media-style1">
                            <div class="media-icon">
                                <img src="{{ asset('client/assets/img/icon/counter-bg.png') }}" alt="counter icon">
                                <div class="icon">
                                    <img src="{{ asset('client/assets/img/icon/ci-1-1.svg') }}" alt="">
                                </div>
                            </div>
                            <div class="media-counter">
                                <h2 class="media-title counter-number" data-count="990">00</h2>
                                <span class="media-count_icon"><i class="far fa-plus"></i></span>
                            </div>
                            <p class="media-text">Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-6">
                        <div class="media-style1">
                            <div class="media-icon">
                                <img src="{{ asset('client/assets/img/icon/counter-bg.png') }}" alt="counter image">
                                <div class="icon">
                                    <img src="assets/img/icon/ci-1-2.svg" alt="icon">
                                </div>
                            </div>
                            <div class="media-counter">
                                <h2 class="media-title counter-number" data-count="1320">00</h2>
                            </div>
                            <p class="media-text">Rating Customer</p>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-6">
                        <div class="media-style1">
                            <div class="media-icon">
                                <img src="{{ asset('client/assets/img/icon/counter-bg.png') }}" alt="counter image">
                                <div class="icon">
                                    <img src="assets/img/icon/ci-1-3.svg" alt="icon">
                                </div>
                            </div>
                            <div class="media-counter">
                                <h2 class="media-title counter-number" data-count="870">00</h2>
                                <span class="media-count_icon"><i class="far fa-plus"></i></span>
                            </div>
                            <p class="media-text">Project Done</p>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-6">
                        <div class="media-style1">
                            <div class="media-icon">
                                <img src="{{ asset('client/assets/img/icon/counter-bg.png') }}" alt="counter image">
                                <div class="icon">
                                    <img src="assets/img/icon/ci-1-4.svg" alt="icon">
                                </div>
                            </div>
                            <div class="media-counter">
                                <h2 class="media-title counter-number" data-count="950">00</h2>
                                <span class="media-count_icon"><i class="far fa-plus"></i></span>
                            </div>
                            <p class="media-text">Awards Winning</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial">
        <div class="vs-container1">
            <div class="testi_wrap1" data-bg-src="{{ asset('client/assets/img/bg/testmonial-bg.png') }}">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-6">
                        <div class="testi_style1">
                            <div class="title-area mb-4 wow fadeInUp wow-animated" data-wow-delay="0.3s">
                                <span class="sec-subtitle">Testimonials</span>
                                <h2 class="sec_title h3">What Clients Say?</h2>
                            </div>
                            <div id="testis_4_1">
                                <div class="testi_inner">
                                    <div class="testi_quote">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                    <p class="testi_text">
                                        “Lorem ipsum dolor sit amet is the good ectur adipiscing elit
                                        eiusmod ex tempor incididunt labore dolore exercitation”
                                    </p>
                                    <h3 class="testi_author">Jerzzy Lamot</h3>
                                    <span class="testi_degi">Tiger Hunter</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                    <p class="testi_text">“Latin derived from Cicero's 1st-century BC text De Finibus
                                        Bonorum et Malorum lorem ipsum was born as a nonsense text Latin”</p>
                                    <h3 class="testi_author">Peter Parker</h3>
                                    <span class="testi_degi">Lion Hunter</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote"><i class="fas fa-quote-right"></i></div>
                                    <p class="testi_text">“Richard McClintock, a Latin scholar from Hampden-Sydney
                                        College, is credited with discovering source behind the ubiquitous filler text”
                                    </p>
                                    <h3 class="testi_author">Vivi Marian</h3>
                                    <span class="testi_degi">Club Member</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote"><i class="fas fa-quote-right"></i></div>
                                    <p class="testi_text">“Nor is there anyone who loves or pursues or desires to obtain
                                        pain of itself, because is pain but occasionally circumstances”</p>
                                    <h3 class="testi_author">John Donal</h3>
                                    <span class="testi_degi">Hunting Lover</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                    <p class="testi_text">“Creation timelines for the standard lorem ipsum passage vary,
                                        with some citing the 15th century and others the 20th According”</p>
                                    <h3 class="testi_author">Harry Poter</h3>
                                    <span class="testi_degi">Young member</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote"><i class="fas fa-quote-right"></i></div>
                                    <p class="testi_text">“Rrow itself, let it be sorrow; let him love it; let him
                                        pursue it, ishing for its acquisitiendum. Because he will ab hold”
                                    </p>
                                    <h3 class="testi_author">Marry Jain</h3>
                                    <span class="testi_degi">Sniper Hunter</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto position-relative">
                        <div class="testi_avater1">
                            <div id="testis_4_2">
                                <div class="avater"><img src="{{ asset('client/assets/img/testimonial/testi-1-1.png') }}"
                                        alt="author">
                                </div>
                                <div class="avater"><img src="{{ asset('client/assets/img/testimonial/testi-1-2.png') }}"
                                        alt="author">
                                </div>
                                <div class="avater"><img src="{{ asset('client/assets/img/testimonial/testi-1-3.png') }}"
                                        alt="author">
                                </div>
                                <div class="avater"><img src="{{ asset('client/assets/img/testimonial/testi-1-4.png') }}"
                                        alt="author">
                                </div>
                                <div class="avater"><img src="{{ asset('client/assets/img/testimonial/testi-1-5.png') }}"
                                        alt="author">
                                </div>
                                <div class="avater"><img src="{{ asset('client/assets/img/testimonial/testi-1-6.png') }}"
                                        alt="author">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testi-img1" id="testis_4_3">
                            <div><img src="{{ asset('client/assets/img/testimonial/testi-img-2-1.jpg') }}"
                                    alt="testimonial"></div>
                            <div><img src="{{ asset('client/assets/img/testimonial/testi-img-2-2.jpg') }}"
                                    alt="testimonial"></div>
                            <div><img src="{{ asset('client/assets/img/testimonial/testi-img-2-3.jpg') }}"
                                    alt="testimonial"></div>
                            <div><img src="{{ asset('client/assets/img/testimonial/testi-img-2-4.jpg') }}"
                                    alt="testimonial"></div>
                            <div><img src="{{ asset('client/assets/img/testimonial/testi-img-2-1.jpg') }}"
                                    alt="testimonial"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space">
        <div class="container">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Featured Spot</span>
                <h2 class="sec-title">Find your next Hunting Spot</h2>
                <div class="sec-line"></div>
            </div>
            <div class="service_style3">
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="{{ asset('client/assets/img/service/service-2-1.jpg') }}"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Tuba Island Hunting Spot</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="{{ asset('client/assets/img/service/service-2-2.jpg') }}"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Magic Gun Powder Short</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="{{ asset('client/assets/img/service/service-2-3.jpg') }}"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Turkey Season hunting</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="{{ asset('client/assets/img/service/service-2-4.jpg') }}"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Small Island short Area</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="{{ asset('client/assets/img/service/service-2-1.jpg') }}"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Medium Animals Catch</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="space bg-smoke">
        <div class="container">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Our Team</span>
                <h2 class="sec-title">Our Fishing Expert Team </h2>
                <div class="sec-line"></div>
            </div>
            <div class="row vs-carousel" data-arrows="true" data-wow-delay="0.4s" data-slide-show="3"
                data-lg-slide-show="3" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true"
                data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
                data-sm-center-mode="true">
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="{{ asset('client/assets/img/team/team-1-1.png') }}" alt="member">
                            </a>
                        </div>
                        <div class="social-media2">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                        <div class="team-content">
                            <h3 class="team-name h4">
                                <a href="team-details.html">Andrew John</a>
                            </h3>
                            <p class="team-degi">Marketing Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="{{ asset('client/assets/img/team/team-1-2.png') }}" alt="member">
                            </a>
                        </div>
                        <div class="social-media2">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                        <div class="team-content">
                            <h3 class="team-name h4">
                                <a href="team-details.html">Jeremy Weber</a>
                            </h3>
                            <p class="team-degi">Marketing Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="{{ asset('client/assets/img/team/team-1-3.png') }}" alt="member">
                            </a>
                        </div>
                        <div class="social-media2">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                        <div class="team-content">
                            <h3 class="team-name h4">
                                <a href="team-details.html">Craig Jackman</a>
                            </h3>
                            <p class="team-degi">Marketing Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="{{ asset('client/assets/img/team/team-1-1.png') }}" alt="member">
                            </a>
                        </div>
                        <div class="social-media2">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                        <div class="team-content">
                            <h3 class="team-name h4">
                                <a href="team-details.html">Andrew John</a>
                            </h3>
                            <p class="team-degi">Marketing Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="{{ asset('client/assets/img/team/team-1-2.png') }}" alt="member">
                            </a>
                        </div>
                        <div class="social-media2">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                        <div class="team-content">
                            <h3 class="team-name h4">
                                <a href="team-details.html">Jeremy Weber</a>
                            </h3>
                            <p class="team-degi">Marketing Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-style1">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="{{ asset('client/assets/img/team/team-1-3.png') }}" alt="member">
                            </a>
                        </div>
                        <div class="social-media2">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                        <div class="team-content">
                            <h3 class="team-name h4">
                                <a href="team-details.html">Craig Jackman</a>
                            </h3>
                            <p class="team-degi">Marketing Expert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-title space">
        <div class="container space-bottom">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Shop</span>
                <h2 class="sec-title text-white">Awesome New Products</h2>
                <div class="sec-line"></div>
            </div>
            <div class="row vs-carousel mb-4" data-arrows="true" data-wow-delay="0.4s" data-lg-slide-show="3"
                data-slide-show="4" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true"
                data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
                data-sm-center-mode="true">
                @foreach ($products as $p)
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="{{$p->image}}" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="#" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="{{route('detail',$p->id)}}" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{route('detail',$p->id)}}" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="{{route('detail',$p->id)}}">{{Str::limit($p->name,50,'...')}}</a></h3>
                            <span class="product-price">{{number_format($p->price,0,',','.')}} đ</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <div>
        <div class="vs-container1">
            <div class="brands">
                <div class="row gx-5 vs-carousel z-index-common" data-arrows="false" data-wow-delay="0.4s"
                    data-slide-show="5" data-lg-slide-show="5" data-md-slide-show="3" data-xs-slide-show="1"
                    data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true"
                    data-lg-center-mode="true" data-md-center-mode="true" data-sm-center-mode="true"
                    data-xs-center-mode="true">
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="{{ asset('client/assets/img/brand/b-1-1.png') }}" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="{{ asset('client/assets/img/brand/b-1-2.png') }}" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="{{ asset('client/assets/img/brand/b-1-3.png') }}" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="{{ asset('client/assets/img/brand/b-1-4.png') }}" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="{{ asset('client/assets/img/brand/b-1-1.png') }}" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="{{ asset('client/assets/img/brand/b-1-2.png') }}" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="{{ asset('client/assets/img/brand/b-1-3.png') }}" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="{{ asset('client/assets/img/brand/b-1-4.png') }}" alt="brand">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Our Blog</span>
                <h2 class="sec-title">Our Latest News & Update</h2>
                <div class="sec-line"></div>
            </div>
            <div class="row vs-carousel" data-arrows="true" data-wow-delay="0.4s" data-slide-show="3"
                data-lg-slide-show="2" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true"
                data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
                data-sm-center-mode="true">
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-1.jpg') }}" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">07</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-details.html">Sharing Their Group Of Students Ideas</a>
                            </h4>
                            <a href="blog-details.html" class="link-btn">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="w-100" src="{asset('client/assets/img/blog/blog-1-2.jpg')}" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">08</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-details.html">Students Group Of Sharing Their Ideas</a>
                            </h4>
                            <a href="blog-details.html" class="link-btn">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-3.jpg') }}" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">09</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-details.html">consectetur ipsum dolor sit amet adipisicing elit</a>
                            </h4>
                            <a href="blog-details.html" class="link-btn">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-4.jpg') }}" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">07</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-details.html">Lorem ipsum dolor sit amet consectetur.</a>
                            </h4>
                            <a href="blog-details.html" class="link-btn">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-5.jpg') }}"
                                alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">08</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-details.html">adipisicing ipsum dolor sit amet consectetur elit.</a>
                            </h4>
                            <a href="blog-details.html" class="link-btn">Read More <i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <img class="w-100" src="{{ asset('client/assets/img/blog/blog-1-6.jpg') }}"
                                alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">09</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                <a href="blog.html"><i class="fas fa-comment-dots"></i>Comments (3)</a>
                            </div>
                            <h4 class="blog-title">
                                <a href="blog-details.html">a group of students exchanging concepts</a>
                            </h4>
                            <a href="blog-details.html" class="link-btn">Read More <i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <div class="vs-container1">
            <div class="subscribe style1">
                <div class="container">
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
                                        <button class="vs-btn w-100">Subscribe <i
                                                class="fab fa-telegram-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
