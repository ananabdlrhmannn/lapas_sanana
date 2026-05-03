<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="mb-4">
        <a href="<?php echo e(route('home')); ?>" class="text-decoration-none text-primary fw-semibold"><i class="bi bi-arrow-left me-2"></i>Kembali ke Website</a>
    </div>

    <div class="mb-4">
        <h1 class="fw-bold mb-2">Login Admin</h1>
        <p class="text-muted mb-0">Masuk ke dashboard untuk mengelola berita, kunjungan, dan pengaduan.</p>
    </div>

    <?php if(session('status')): ?>
        <div class="alert alert-success rounded-4"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input id="email" class="form-control form-control-lg rounded-4" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger small mt-2"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label for="password" class="form-label fw-semibold mb-0">Password</label>
                <?php if(Route::has('password.request')): ?>
                    <a class="small text-decoration-none" href="<?php echo e(route('password.request')); ?>">Lupa password?</a>
                <?php endif; ?>
            </div>
            <input id="password" class="form-control form-control-lg rounded-4" type="password" name="password" required autocomplete="current-password">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger small mt-2"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-check mb-4">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-4">Masuk ke Dashboard</button>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/auth/login.blade.php ENDPATH**/ ?>