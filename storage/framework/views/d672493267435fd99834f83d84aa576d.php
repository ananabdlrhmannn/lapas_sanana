

<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4">Edit User</h1>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.users.update', $user)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <?php echo $__env->make('admin.users._form', ['user' => $user], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>