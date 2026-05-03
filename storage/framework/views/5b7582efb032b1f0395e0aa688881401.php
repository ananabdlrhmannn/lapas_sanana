<?php
    $user = $user ?? null;
    $selectedPermissions = old('permissions', $user->permissions ?? []);
?>

<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" id="name"
           class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
           value="<?php echo e(old('name', $user->name ?? '')); ?>" required>
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email"
           class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
           value="<?php echo e(old('email', $user->email ?? '')); ?>" required>
    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select name="role" id="role" class="form-select <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
        <option value="">-- Pilih Role --</option>
        <option value="admin" <?php echo e(old('role', $user->role ?? '') === 'admin' ? 'selected' : ''); ?>>Admin</option>
        <option value="registrasi" <?php echo e(old('role', $user->role ?? '') === 'registrasi' ? 'selected' : ''); ?>>Petugas Registrasi</option>
        <option value="humas" <?php echo e(old('role', $user->role ?? '') === 'humas' ? 'selected' : ''); ?>>Petugas Humas</option>
    </select>
    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="mb-3">
    <label class="form-label d-block">Hak Akses Menu</label>

    <div class="border rounded p-3">
        <?php $__currentLoopData = $availablePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check mb-2">
                <input class="form-check-input permission-checkbox"
                       type="checkbox"
                       name="permissions[]"
                       value="<?php echo e($key); ?>"
                       id="permission_<?php echo e($key); ?>"
                       <?php echo e(in_array($key, $selectedPermissions, true) ? 'checked' : ''); ?>>
                <label class="form-check-label" for="permission_<?php echo e($key); ?>">
                    <?php echo e($label); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger small mt-1"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php $__errorArgs = ['permissions.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger small mt-1"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="mb-3">
    <label for="password" class="form-label">
        Password
        <?php if(isset($user)): ?>
            <small class="text-muted">(kosongkan jika tidak ingin diubah)</small>
        <?php endif; ?>
    </label>
    <input type="password" name="password" id="password"
           class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
           <?php echo e(isset($user) ? '' : 'required'); ?>>
    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="mb-3">
    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">Kembali</a>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const roleSelect = document.getElementById('role');
    const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

    function syncPermissionsByRole() {
        if (roleSelect.value === 'admin') {
            permissionCheckboxes.forEach((checkbox) => {
                checkbox.checked = true;
                checkbox.disabled = true;
            });
        } else {
            permissionCheckboxes.forEach((checkbox) => {
                checkbox.disabled = false;
            });
        }
    }

    roleSelect.addEventListener('change', syncPermissionsByRole);
    syncPermissionsByRole();
});
</script>
<?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/admin/users/_form.blade.php ENDPATH**/ ?>