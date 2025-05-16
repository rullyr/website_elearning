<!DOCTYPE html>
<html lang="en">

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
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#courses">Courses</a></li>
                            <li class="scroll-to-section"><a href="#contact">Register Now!</a></li>
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
    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="contact-form" method="POST" action="{{ route('actionlogin') }}"
                            class="needs-validation" novalidate="">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                            placeholder="Email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="password-field">
                                        <input type="password" name="password" id="password" placeholder="Kata Sandi"
                                            autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <button type="submit" id="form-submit" class="orange-button">Login</button>
                                <button type="button" class="orange-button mt-2" id="form-submit"><a
                                        href="{{ route('register') }}">Register</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .password-field {
            display: flex;
            align-items: center;
        }

        .eye-icon {
            justify-self: end;
        }
    </style>

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

    <script>
        const passwordField = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', (e) => {
            // toggle the type attribute
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // toggle the eye icon
            togglePassword.classList.toggle('fa-eye-slash');
        });
    </script>


</body>

</html>
