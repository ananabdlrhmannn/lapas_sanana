<?php $__env->startSection('title', 'Data Berita | Admin Lapas Sanana'); ?>
<?php $__env->startSection('page_heading', 'Manajemen Berita'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel-card p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h4 class="mb-1">Data Berita</h4>
            <p class="text-muted mb-0">Kelola seluruh berita yang tampil pada website publik.</p>
        </div>
        <a href="<?php echo e(route('admin.news.create')); ?>" class="btn btn-primary px-4"><i class="bi bi-plus-circle me-2"></i>Tambah Berita</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($news->firstItem() + $loop->index); ?></td>
                        <td>
                            <div class="fw-semibold"><?php echo e($item->title); ?></div>
                            <small class="text-muted"><?php echo e(\Illuminate\Support\Str::limit($item->excerpt, 70)); ?></small>
                        </td>
                        <td><?php echo e($item->category ?: '-'); ?></td>
                        <td><?php echo e(optional($item->published_at)->format('d-m-Y') ?: '-'); ?></td>
                        <td>
                            <span class="badge <?php echo e($item->is_published ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary'); ?> px-3 py-2 rounded-pill">
                                <?php echo e($item->is_published ? 'Publish' : 'Draft'); ?>

                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="<?php echo e(route('admin.news.edit', $item)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <form action="<?php echo e(route('admin.news.destroy', $item)); ?>" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">Belum ada berita.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        <?php echo e($news->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/admin/news/index.blade.php ENDPATH**/ ?>