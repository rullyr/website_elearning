<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Belajar</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/landing-page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <h1>Belajar</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section">
                                <a href="{{ route('landing-page') }}">Beranda</a>
                            </li>
                            <li class="scroll-to-section">
                                <a class="active">Kelas</a>
                            </li>

                            @auth
                                @if (auth()->user()->role === 'user')
                                    <li class="scroll-to-section">
                                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="text-dark">Logout</button>
                                        </form>
                                    </li>
                                @endif
                            @else
                                <li class="scroll-to-section">
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                            @endauth
                        </ul>

                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-banner">
                        <!-- ***** Item 1 ***** -->
                        <div class="item item-1">
                            <div class="header-text">
                                <span class="category">Belajar Bersama</span>
                                <h2>Selamat Datang di Website Belajar Bersama</h2>
                                <p>Belajar Bersama merupakan platform belajar online yang berbasis website</p>
                            </div>
                        </div>
                        <!-- ***** Item 2 ***** -->
                        <div class="item item-2">
                            <div class="header-text">
                                <span class="category">Belajar Bersama</span>
                                <h2>Welcome to the Belajar Bersama Website</h2>
                                <p>Belajar Bersama is a website-based online learning platform</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------ ***** courses ***** ------------------>
    <section class="section courses" id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>Latest Courses</h6>
                        <h2>Kelas Terbaru</h2>
                    </div>
                </div>
            </div>

            <div class="row event_box">
                @foreach ($classes as $class)
                    @php
                        $color = $class->is_tryout == 1 ? '#036a05' : '#6a7a1c';
                        $label = $class->is_tryout == 1 ? 'Try Out' : 'Kelas';
                        $bg = $class->is_tryout == 1 ? 'rgb(146 250 22 / 95%)' : 'rgb(255 241 14 / 95%)';
                    @endphp
                    <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
                        <a href="{{ route('kelas.index', $class->id) }}">
                            <div class="events_item">
                                {{-- <div class="thumb">
                                <a href="tiu.html"><img src=""></a>
                            </div> --}}
                                <div class="down-content">
                                    <span
                                        style="font-size: 10px; text-transform: uppercase; color: {{ $color }};
                                    background-color: {{ $bg }}; padding: 6px 15px; border-radius: 10px;
                                    font-weight: 500; margin-bottom:10px; display: inline-block;">
                                        {{ $label }}
                                    </span>
                                    <h4>{{ $class->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright © 2025 Scholar Organization. All rights reserved. &nbsp;&nbsp;&nbsp;</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/landing-page/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/owl-carousel.js"') }}"></script>
    <script src="{{ asset('assets/landing-page/js/counter.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/custom.js') }}"></script>
</body>

</html>
