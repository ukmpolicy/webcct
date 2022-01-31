<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Web Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Vendor Css -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel/css/owl.carousel.min.css') }}">

    <!-- Local Css -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>

    <!-- Navbar -->
    <nav id="navbar">
        <div class="container">
            
            <!-- Logo -->
            <a href="" class="logo">
                <img src="{{ asset('images/logo_w.svg') }}" alt="CCT LOGO">
            </a>

            <div class="toggle"><i class="fa fa-bars"></i></div>

            <!-- Navs -->
            <ul class="navs">
                <li>
                    <a href="{{ route('home') }}#header" class="link">Home</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#about" class="link">About</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#talkshow" class="link">Talkshow</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#competition" class="link">Competitions</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#contact" class="link">Contact</a>
                </li>
            </ul>

        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="copy" style="gap: 3px">
                <div>Copyright &copy;2022 UKM-POLICY, </div>
                <div>Created by <a href="https://zulfahmidev.github.io">zulfahmidev</a>.</div>
            </div>
            <ul>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-facebook"></i></a></li>
            </ul>
        </div>
    </footer>
    
    <!-- Vendor JS -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Local JS -->
    <script src="{{ asset('js/index.js') }}"></script>

    {{-- Internal JS --}}
    @yield('js')
</body>
</html>