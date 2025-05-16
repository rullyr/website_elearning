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
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing-page/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="{{ asset('assets/landing-page/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing-page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing-page/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing-page/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing-page/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
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
                                <h2>{{ $classes->name }}</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <section id="tabs" class="tabs section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            @if ($haveQuiz)
                <div class="row">
                    <div class="alert alert-success">
                        Nilai kamu: {{ $score }} ( Benar : {{ $correct_answer }} dari {{ $total }} )
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        @foreach ($materials as $index => $material)
                            <li class="nav-item">
                                <a class="nav-link {{ $index === 0 ? 'active show' : '' }}" data-bs-toggle="tab"
                                    href="#tab-{{ $index + 1 }}">
                                    {{ $material->title }}
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-quiz">Quiz</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">

                        @foreach ($materials as $index => $material)
                            <div class="tab-pane {{ $index === 0 ? 'active show' : '' }}"
                                id="tab-{{ $index + 1 }}">
                                <iframe width="100%" height="500" src="{{ $material->source }}" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        @endforeach

                        <div class="tab-pane" id="tab-quiz">
                            <div class="row">
                                <div class="col-lg-8 details">
                                    <form method="POST" action="{{ route('kelas.submit', $classes->id) }}">
                                        @csrf
                                        @foreach ($quizzes as $index => $quiz)
                                            <div class="mb-4">
                                                {!! $loop->iteration . '. ' . $quiz->question !!}
                                                @foreach (['a', 'b', 'c', 'd', 'e'] as $opt)
                                                    <div class="form-check">
                                                        <input type="radio" name="quiz[{{ $index }}]"
                                                            value="{{ $opt }}"
                                                            id="q{{ $index }}_{{ $opt }}"
                                                            class="form-check-input">
                                                        <label for="q{{ $index }}_{{ $opt }}"
                                                            class="form-check-label">
                                                            {{ $quiz->{'option_' . $opt} }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary">Submit Jawaban</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- /Tabs Section -->

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
    <script src="{{ asset('assets/landing-page/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/counter.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/custom.js') }}"></script>
    {{-- <script>
        document.getElementById('quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            let correct = 0;
            let total = {{ count($quizzes) }};
            @foreach ($quizzes as $index => $quiz)
                if (formData.get("quiz[{{ $index }}]") === "{{ strtolower($quiz->correct_answer) }}") {
                    correct++;
                }
            @endforeach

            document.getElementById('quiz-result').innerHTML =
                `<div class="alert alert-info">Skor kamu: ${correct} dari ${total}</div>`;
        });
    </script> --}}

</body>

</html>
