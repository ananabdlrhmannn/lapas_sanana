<?php $__env->startSection('title', $news->title . ' | Lapas Sanana'); ?>
<?php
    $shareDescription = $news->excerpt
        ?: \Illuminate\Support\Str::limit(strip_tags($news->content), 160);

    $shareImage = $news->thumbnail
        ? asset('storage/' . $news->thumbnail)
        : asset('arsha/assets/img/blog/blog-hero-2.webp');
?>

<?php $__env->startSection('meta_description', $shareDescription); ?>
<?php $__env->startSection('og_type', 'article'); ?>
<?php $__env->startSection('og_title', $news->title . ' | Lapas Sanana'); ?>
<?php $__env->startSection('og_url', route('news.show', $news->slug)); ?>
<?php $__env->startSection('og_image', $shareImage); ?>
<?php
    $shareUrl = route('news.show', $news->slug ?? $news->id);
    $shareText = $news->title . ' - Baca selengkapnya di: ' . $shareUrl;
?>

<?php $__env->startSection('content'); ?>
<section class="page-hero">
    <div class="container">
        <div class="row align-items-end gy-3">
            <div class="col-lg-8">
                <span class="badge rounded-pill bg-light text-primary px-3 py-2 mb-3"><?php echo e($news->category ?: 'Berita'); ?></span>
                <h1><?php echo e($news->title); ?></h1>
                <p class="mb-0">Dipublikasikan pada <?php echo e(optional($news->published_at)->translatedFormat('d F Y') ?: $news->created_at->translatedFormat('d F Y')); ?></p>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-lg-end mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('news.index')); ?>">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="article-card p-4 p-lg-5">
                    <img src="<?php echo e($news->thumbnail ? asset('storage/' . $news->thumbnail) : asset('arsha/assets/img/blog/blog-hero-2.webp')); ?>" class="img-fluid rounded-4 shadow-sm mb-4 w-100" alt="<?php echo e($news->title); ?>">

                    <?php if($news->excerpt): ?>
                        <div class="official-note mb-4">
                            <h4 class="mb-2">Ringkasan</h4>
                            <p class="mb-0"><?php echo e($news->excerpt); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="news-detail-content" style="font-size: 1rem; line-height: 1.9; color: #444;">
                        <?php echo nl2br(e($news->content)); ?>

                    </div>

                    <div class="mt-5 d-flex flex-wrap gap-3">
                        <a href="<?php echo e(route('news.index')); ?>" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Berita
                        </a>

                        <a href="<?php echo e(route('home')); ?>#pengaduan" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-chat-dots me-2"></i>Kirim Pengaduan
                        </a>

                        <div class="dropdown">
                            <button class="btn btn-success rounded-pill px-4 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-share me-2"></i>Bagikan Berita
                            </button>
                            <ul class="dropdown-menu shadow border-0 rounded-4">
                                <li>
                                    <a class="dropdown-item" target="_blank"
                                       href="https://wa.me/?text=<?php echo e(urlencode($shareText)); ?>">
                                        <i class="bi bi-whatsapp me-2 text-success"></i>Bagikan ke WhatsApp
                                    </a>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item" onclick="copyNewsLink('<?php echo e($shareUrl); ?>')">
                                        <i class="bi bi-link-45deg me-2 text-primary"></i>Salin Tautan
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="copyAlert" class="alert alert-success mt-3 d-none rounded-4" role="alert">
                        Tautan berita berhasil disalin.
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    function copyNewsLink(url) {
        navigator.clipboard.writeText(url).then(function () {
            const alertBox = document.getElementById('copyAlert');
            alertBox.classList.remove('d-none');

            setTimeout(() => {
                alertBox.classList.add('d-none');
            }, 2000);
        }).catch(function () {
            alert('Gagal menyalin tautan.');
        });
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/news/show.blade.php ENDPATH**/ ?>