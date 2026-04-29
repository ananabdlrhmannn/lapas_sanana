<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lapas Sanana')</title>
    <meta name="description" content="@yield('meta_description', 'Portal informasi, layanan publik, pendaftaran kunjungan, berita, dan pengaduan masyarakat Lapas Kelas IIB Sanana.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'Lapas Sanana')">
    <meta property="og:description" content="@yield('meta_description', 'Portal informasi, layanan publik, pendaftaran kunjungan, berita, dan pengaduan masyarakat Lapas Kelas IIB Sanana.')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:site_name" content="Lapas Sanana">
    <meta property="og:image" content="@yield('og_image', asset('arsha/assets/img/blog/blog-hero-2.webp'))">
    <meta property="og:image:secure_url" content="@yield('og_image', asset('arsha/assets/img/blog/blog-hero-2.webp'))">
    <meta property="og:image:alt" content="@yield('og_title', 'Lapas Sanana')">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Lapas Sanana')">
    <meta name="twitter:description" content="@yield('meta_description', 'Portal informasi, layanan publik, pendaftaran kunjungan, berita, dan pengaduan masyarakat Lapas Kelas IIB Sanana.')">
    <meta name="twitter:image" content="@yield('og_image', asset('arsha/assets/img/blog/blog-hero-2.webp'))">
    <link rel="icon" href="{{ asset('arsha/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('arsha/assets/img/logo imipas.jpg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/css/sanana.css') }}" rel="stylesheet">

    <style>
        main.page-content {
            min-height: 70vh;
        }

        .header .btn-login-admin {
            border-radius: 50px;
            padding: 10px 20px;
            color: #fff;
            background: color-mix(in srgb, var(--accent-color), transparent 15%);
            font-size: 14px;
            font-weight: 600;
        }

        .header .btn-login-admin:hover {
            background: color-mix(in srgb, var(--accent-color), transparent 5%);
            color: #fff;
        }

        .page-hero {
            padding: 160px 0 70px;
            background: linear-gradient(135deg, rgba(55, 81, 126, 0.95), rgba(71, 178, 228, 0.88));
            color: #fff;
        }

        .page-hero h1,
        .page-hero p,
        .page-hero .breadcrumb-item,
        .page-hero .breadcrumb-item a {
            color: #fff;
        }

        .page-hero .breadcrumb {
            margin-bottom: 0;
        }

        .alert-floating {
            margin-top: 110px;
        }

        .article-card,
        .soft-panel {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 14px 40px rgba(39, 51, 89, 0.08);
        }

        .section-spacer {
            padding: 80px 0;
        }
    </style>

    @stack('styles')
</head>
<body class="@yield('body_class', 'index-page')">
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('arsha/assets/img/logo imipas.jpg') }}" alt="Logo Lapas Sanana" class="logo-img me-3">
            <div>
                <h1 class="sitename mb-0">Lapas Sanana</h1>
                <small class="text-white-50 d-none d-md-block">Lembaga Pemasyarakatan Kelas IIB Sanana</small>
            </div>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}#hero" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('home') }}#profil">Profil</a></li>
                <li><a href="{{ route('home') }}#layanan">Layanan</a></li>
                <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">Berita</a></li>
                <li><a href="{{ route('home') }}#pengaduan">Pengaduan</a></li>
                <li><a href="{{ route('home') }}#kontak">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
{{--
        @auth
            @if(auth()->user()->isAdmin())
                <a class="btn-getstarted" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-login-admin border-0">Logout</button>
                </form>
            @endif
        @else
           <a class="btn-getstarted" href="{{ route('login') }}">Login Admin</a>
        @endauth
        --}}
    </div>
</header>

@if(session('success') || $errors->any())
    <div class="container alert-floating">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger shadow-sm" role="alert">
                <strong>Mohon periksa kembali data Anda.</strong>
                <ul class="mb-0 mt-2 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endif

<main class="main page-content">
    @yield('content')
</main>

<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('home') }}" class="d-flex align-items-center">
                        <span class="sitename">Lapas Sanana</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Portal Sistem Informasi</p>
                        <p>Lembaga Pemasyarakatan Kelas IIB Sanana</p>
                        <p class="mt-3"><strong>Lokasi:</strong> <span>Sanana, Kabupaten Kepulauan Sula, Maluku Utara</span></p>
                        <p><strong>Jam Layanan:</strong> <span>Senin - Jumat, 08.00 - 16.00 WIT</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Menu Utama</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}#hero">Beranda</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}#profil">Profil</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}#layanan">Layanan</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}#kontak">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Informasi</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('news.index') }}">Berita</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}#publikasi">Publikasi</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}#zi">Zona Integritas</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}#pengaduan">Pengaduan</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Layanan Digital</h4>
                    <p>Ikuti kami di media sosial untuk informasi terbaru dan update terkini.</p>
                    <div class="social-links d-flex">
                        <a href="https://share.google/yTwVnzhK5hqnxhuvw"><i class="bi bi-instagram"></i></a>
                        <a href="https://web.facebook.com/humaslapassanana/?_rdc=1&_rdr#"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.youtube.com/@HumasLapasSanana"><i class="bi bi-youtube"></i></a>
                        <a href="https://x.com/iib_sanana"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Lapas Sanana</strong> <span>All Rights Reserved</span></p>
        <div class="credits">Rancangan Aktualisasi Anan Abdul Rahman</div>
    </div>
</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<script src="{{ asset('arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('arsha/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('arsha/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('arsha/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('arsha/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('arsha/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('arsha/assets/js/main.js') }}"></script>
<script src="{{ asset('arsha/assets/js/sanana.js') }}"></script>
@stack('scripts')
</body>
</html>
