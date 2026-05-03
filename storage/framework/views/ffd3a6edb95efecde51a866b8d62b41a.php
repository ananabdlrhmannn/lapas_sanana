

<?php $__env->startSection('title', 'Publikasi & Galeri'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Publikasi & Galeri</h1>
        <a href="<?php echo e(route('admin.galleries.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Foto
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <?php if($galleries->count()): ?>
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Urutan</th>
                                <th>Dibuat</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(asset('storage/' . $item->image)); ?>"
                                             alt="<?php echo e($item->title); ?>"
                                             style="width: 90px; height: 70px; object-fit: cover; border-radius: 10px;">
                                    </td>
                                    <td><?php echo e($item->title); ?></td>
                                    <td class="text-capitalize"><?php echo e($item->category); ?></td>
                                    <td>
                                        <?php if($item->is_published): ?>
                                            <span class="badge bg-success">Publish</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Draft</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->sort_order); ?></td>
                                    <td><?php echo e($item->created_at->format('d M Y H:i')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.galleries.edit', $item)); ?>" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="<?php echo e(route('admin.galleries.destroy', $item)); ?>" method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <?php echo e($galleries->links()); ?>

                </div>
            <?php else: ?>
                <p class="text-muted mb-0">Belum ada data galeri.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/admin/galleries/index.blade.php ENDPATH**/ ?>