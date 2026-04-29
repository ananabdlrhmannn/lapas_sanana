@php
    $user = $user ?? null;
    $selectedPermissions = old('permissions', $user->permissions ?? []);
@endphp

<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" id="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $user->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email"
           class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $user->email ?? '') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
        <option value="">-- Pilih Role --</option>
        <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="registrasi" {{ old('role', $user->role ?? '') === 'registrasi' ? 'selected' : '' }}>Petugas Registrasi</option>
        <option value="humas" {{ old('role', $user->role ?? '') === 'humas' ? 'selected' : '' }}>Petugas Humas</option>
    </select>
    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label d-block">Hak Akses Menu</label>

    <div class="border rounded p-3">
        @foreach($availablePermissions as $key => $label)
            <div class="form-check mb-2">
                <input class="form-check-input permission-checkbox"
                       type="checkbox"
                       name="permissions[]"
                       value="{{ $key }}"
                       id="permission_{{ $key }}"
                       {{ in_array($key, $selectedPermissions, true) ? 'checked' : '' }}>
                <label class="form-check-label" for="permission_{{ $key }}">
                    {{ $label }}
                </label>
            </div>
        @endforeach
    </div>

    @error('permissions')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror

    @error('permissions.*')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">
        Password
        @if(isset($user))
            <small class="text-muted">(kosongkan jika tidak ingin diubah)</small>
        @endif
    </label>
    <input type="password" name="password" id="password"
           class="form-control @error('password') is-invalid @enderror"
           {{ isset($user) ? '' : 'required' }}>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>

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
