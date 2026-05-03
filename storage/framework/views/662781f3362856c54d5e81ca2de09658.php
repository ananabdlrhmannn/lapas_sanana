<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard Admin | Lapas Sanana'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('arsha/assets/img/fav.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('arsha/assets/img/fav.png')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --admin-primary: #37517e;
            --admin-accent: #47b2e4;
            --admin-dark: #1f2a44;
            --admin-soft: #f4f7fb;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--admin-soft);
            color: #1f2937;
        }

        .admin-sidebar {
            background: linear-gradient(180deg, var(--admin-dark), var(--admin-primary));
            min-height: 100vh;
            padding: 28px 20px;
            position: sticky;
            top: 0;
        }

        .admin-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #fff;
            text-decoration: none;
            margin-bottom: 30px;
        }

        .admin-brand img {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            object-fit: cover;
        }

        .admin-menu .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.82);
            padding: 12px 14px;
            border-radius: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .admin-menu .nav-link:hover,
        .admin-menu .nav-link.active {
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
        }

        .admin-main {
            padding: 28px;
        }

        .topbar-card,
        .panel-card,
        .stat-card {
            background: #fff;
            border: 0;
            border-radius: 22px;
            box-shadow: 0 16px 40px rgba(31, 41, 55, 0.08);
        }

        .stat-card {
            overflow: hidden;
        }

        .stat-card .icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(71, 178, 228, 0.12);
            color: var(--admin-accent);
            font-size: 22px;
        }

        .table thead th {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #6b7280;
            border-bottom-width: 1px;
        }

        .badge-soft {
            background: rgba(71, 178, 228, 0.12);
            color: var(--admin-primary);
            border-radius: 999px;
            padding: 8px 12px;
            font-weight: 700;
        }

        .page-title {
            font-weight: 800;
            color: var(--admin-dark);
        }

        .form-control,
        .form-select,
        .btn {
            border-radius: 14px;
        }

        .table-responsive {
            border-radius: 18px;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    
<div class="small text-muted">
    <?php echo e(auth()->user()->name); ?> - 
    <?php if(auth()->user()->role === 'admin'): ?>
        Admin
    <?php elseif(auth()->user()->role === 'registrasi'): ?>
        Petugas Registrasi
    <?php elseif(auth()->user()->role === 'humas'): ?>
        Petugas Humas
    <?php endif; ?>
</div>
<div class="container-fluid">
    <div class="row g-0">
        <div class="col-xl-2 col-lg-3">
            <aside class="admin-sidebar">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-brand">
                    <img src="<?php echo e(asset('arsha/assets/img/logo imipas.jpg')); ?>" alt="Logo">
                    <div>
                        <div class="fw-bold fs-5">Admin Lapas</div>
                        <small class="text-white-50">Sanana</small>
                    </div>
                </a>

                <nav class="nav flex-column admin-menu mb-4">
                    <ul class="nav flex-column">

   <ul class="nav flex-column">

    <li class="nav-item">
        <a href="<?php echo e(route('admin.dashboard')); ?>"
           class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
            <i class="bi bi-speedometer2 me-2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php if(auth()->user()->hasPermission('manage_users')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.users.index')); ?>"
               class="nav-link <?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>">
                <i class="bi bi-people me-2"></i>
                <span>Kelola User</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if(auth()->user()->hasPermission('manage_visits')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.visits.index')); ?>"
               class="nav-link <?php echo e(request()->routeIs('admin.visits.*') ? 'active' : ''); ?>">
                <i class="bi bi-calendar-check me-2"></i>
                <span>Kunjungan</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if(auth()->user()->hasPermission('manage_complaints')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.complaints.index')); ?>"
               class="nav-link <?php echo e(request()->routeIs('admin.complaints.*') ? 'active' : ''); ?>">
                <i class="bi bi-chat-dots me-2"></i>
                <span>Pengaduan</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if(auth()->user()->hasPermission('manage_news')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.news.index')); ?>"
               class="nav-link <?php echo e(request()->routeIs('admin.news.*') ? 'active' : ''); ?>">
                <i class="bi bi-newspaper me-2"></i>
                <span>Berita</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if(auth()->user()->hasPermission('manage_galleries')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.galleries.index')); ?>"
               class="nav-link <?php echo e(request()->routeIs('admin.galleries.*') ? 'active' : ''); ?>">
                <i class="bi bi-images me-2"></i>
                <span>Publikasi &amp; Galeri</span>
            </a>
        </li>
    <?php endif; ?>

</ul>

                    <a class="nav-link" href="<?php echo e(route('home')); ?>" target="_blank"><i class="bi bi-box-arrow-up-right"></i> Lihat Website</a>

                </nav>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger w-100 py-3 fw-semibold"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                </form>
            </aside>
        </div>

        <div class="col-xl-10 col-lg-9">
            <main class="admin-main">
                <div class="topbar-card p-4 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                    <div>
                        <span class="badge-soft">Panel Administrasi</span>
                        <h1 class="page-title h3 mt-3 mb-1"><?php echo $__env->yieldContent('page_heading', 'Dashboard Admin'); ?></h1>
                        <p class="text-muted mb-0">Kelola konten website, kunjungan online, dan pengaduan masyarakat dalam satu panel.</p>
                    </div>
                    <div class="text-md-end">
                        <div class="fw-semibold"><?php echo e(auth()->user()->name ?? 'Administrator'); ?></div>
                        <small class="text-muted"><?php echo e(auth()->user()->email ?? ''); ?></small>
                    </div>
                </div>

                <?php if(session('success')): ?>
                    <div class="alert alert-success shadow-sm border-0 rounded-4"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger shadow-sm border-0 rounded-4">
                        <strong>Terjadi kesalahan validasi.</strong>
                        <ul class="mb-0 mt-2 ps-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/layouts/admin.blade.php ENDPATH**/ ?>