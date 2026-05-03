<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Lapas Sanana'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Portal informasi, layanan publik, pendaftaran kunjungan, berita, dan pengaduan masyarakat Lapas Kelas IIB Sanana.'); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta property="og:type" content="<?php echo $__env->yieldContent('og_type', 'website'); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', 'Lapas Sanana'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'Portal informasi, layanan publik, pendaftaran kunjungan, berita, dan pengaduan masyarakat Lapas Kelas IIB Sanana.'); ?>">
    <meta property="og:url" content="<?php echo $__env->yieldContent('og_url', url()->current()); ?>">
    <meta property="og:site_name" content="Lapas Sanana">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('arsha/assets/img/blog/blog-hero-2.webp')); ?>">
    <meta property="og:image:secure_url" content="<?php echo $__env->yieldContent('og_image', asset('arsha/assets/img/blog/blog-hero-2.webp')); ?>">
    <meta property="og:image:alt" content="<?php echo $__env->yieldContent('og_title', 'Lapas Sanana'); ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('og_title', 'Lapas Sanana'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('meta_description', 'Portal informasi, layanan publik, pendaftaran kunjungan, berita, dan pengaduan masyarakat Lapas Kelas IIB Sanana.'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('og_image', asset('arsha/assets/img/blog/blog-hero-2.webp')); ?>">
    <link rel="icon" href="<?php echo e(asset('arsha/assets/img/fav.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('arsha/assets/img/logo imipas.jpg')); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="<?php echo e(asset('arsha/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('arsha/assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('arsha/assets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('arsha/assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('arsha/assets/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('arsha/assets/css/sanana.css')); ?>" rel="stylesheet">

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

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="<?php echo $__env->yieldContent('body_class', 'index-page'); ?>">
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="<?php echo e(route('home')); ?>" class="logo d-flex align-items-center me-auto">
            <img src="<?php echo e(asset('arsha/assets/img/logo imipas.jpg')); ?>" alt="Logo Lapas Sanana" class="logo-img me-3">
            <div>
                <h1 class="sitename mb-0">Lapas Sanana</h1>
                <small class="text-white-50 d-none d-md-block">Lembaga Pemasyarakatan Kelas IIB Sanana</small>
            </div>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="<?php echo e(route('home')); ?>#hero" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Beranda</a></li>
                <li><a href="<?php echo e(route('home')); ?>#profil">Profil</a></li>
                <li><a href="<?php echo e(route('home')); ?>#layanan">Layanan</a></li>
                <li><a href="<?php echo e(route('news.index')); ?>" class="<?php echo e(request()->routeIs('news.*') ? 'active' : ''); ?>">Berita</a></li>
                <li><a href="<?php echo e(route('home')); ?>#pengaduan">Pengaduan</a></li>
                <li><a href="<?php echo e(route('home')); ?>#kontak">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>

<?php if(session('success') || $errors->any()): ?>
    <div class="container alert-floating">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger shadow-sm" role="alert">
                <strong>Mohon periksa kembali data Anda.</strong>
                <ul class="mb-0 mt-2 ps-3">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<main class="main page-content">
    <?php echo $__env->yieldContent('content'); ?>
</main>

<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="<?php echo e(route('home')); ?>" class="d-flex align-items-center">
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
                        <li><i class="bi bi-chevron-right"></i> <a href="<?php echo e(route('home')); ?>#hero">Beranda</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="<?php echo e(route('home')); ?>#profil">Profil</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="<?php echo e(route('home')); ?>#layanan">Layanan</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="<?php echo e(route('home')); ?>#kontak">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Informasi</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="<?php echo e(route('news.index')); ?>">Berita</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="<?php echo e(route('home')); ?>#publikasi">Publikasi</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="<?php echo e(route('home')); ?>#zi">Zona Integritas</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="<?php echo e(route('home')); ?>#pengaduan">Pengaduan</a></li>
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

<script src="<?php echo e(asset('arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('arsha/assets/vendor/aos/aos.js')); ?>"></script>
<script src="<?php echo e(asset('arsha/assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('arsha/assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('arsha/assets/vendor/waypoints/noframework.waypoints.js')); ?>"></script>
<script src="<?php echo e(asset('arsha/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('arsha/assets/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('arsha/assets/js/sanana.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/layouts/app.blade.php ENDPATH**/ ?>