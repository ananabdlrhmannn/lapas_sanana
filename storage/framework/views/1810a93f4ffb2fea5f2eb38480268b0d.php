<?php $__env->startSection('title', 'Edit Berita | Admin Lapas Sanana'); ?>
<?php $__env->startSection('page_heading', 'Edit Berita'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel-card p-4">
    <form action="<?php echo e(route('admin.news.update', $news)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <?php echo $__env->make('admin.news._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="<?php echo e(route('admin.news.index')); ?>" class="btn btn-light px-4">Batal</a>
            <button class="btn btn-primary px-4"><i class="bi bi-save me-2"></i>Update</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/admin/news/edit.blade.php ENDPATH**/ ?>