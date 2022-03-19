<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Web Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Primary Meta Tags -->
    <title>Cyber Competition And Talkshow | UKM-POLICY</title>
    <meta name="title" content="Cyber Competition And Talkshow | UKM-POLICY">
    <meta name="description" content="Cyber Competition And Talkshow adalah suatu acara besar yang diadakan oleh Unit Kegiatan Mahasiswa Polytechnic Linux Community. Acara ini bermaksud untuk memasyarakat linux melalui ajang perlombaan dan talkshow.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://cct.ukmpolicy.org/">
    <meta property="og:title" content="Cyber Competition And Talkshow | UKM-POLICY">
    <meta property="og:description" content="Cyber Competition And Talkshow adalah suatu acara besar yang diadakan oleh Unit Kegiatan Mahasiswa Polytechnic Linux Community. Acara ini bermaksud untuk memasyarakat linux melalui ajang perlombaan dan talkshow.">
    <meta property="og:image" content="{{ asset('images/278042.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://cct.ukmpolicy.org/">
    <meta property="twitter:title" content="Cyber Competition And Talkshow | UKM-POLICY">
    <meta property="twitter:description" content="Cyber Competition And Talkshow adalah suatu acara besar yang diadakan oleh Unit Kegiatan Mahasiswa Polytechnic Linux Community. Acara ini bermaksud untuk memasyarakat linux melalui ajang perlombaan dan talkshow.">
    <meta property="twitter:image" content="{{ asset('images/278042.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="cct, ukmpolicy, policy, ukm, pnl, politeknik negeri lhokseunawe, talkshow, competition, indonesia, lks, lomba, kompetensi, siswa, mahasiswa, aceh, lhokseumawe, cyber, cyber competition and talkshow, nasional, local, seminar">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="zulfahmidev">

    <!-- Vendor Css -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel/css/owl.carousel.min.css') }}">

    <!-- Local Css -->
    <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">

    <!-- Local Css -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    
    <!-- Navbar -->
    <nav id="navbar">
        <div class="container">
            
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo">
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
                <li><a href="https://ukmpolicy.org"><i class="fa fa-globe"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCrRUKJF8F7TpbhWTUNP988Q"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://www.instagram.com/policy.kbmpnl/"><i class="fab fa-instagram"></i></a></li>
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