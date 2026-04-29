<x-guest-layout>
    <div class="mb-4">
        <a href="{{ route('home') }}" class="text-decoration-none text-primary fw-semibold"><i class="bi bi-arrow-left me-2"></i>Kembali ke Website</a>
    </div>

    <div class="mb-4">
        <h1 class="fw-bold mb-2">Login Admin</h1>
        <p class="text-muted mb-0">Masuk ke dashboard untuk mengelola berita, kunjungan, dan pengaduan.</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success rounded-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input id="email" class="form-control form-control-lg rounded-4" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <label for="password" class="form-label fw-semibold mb-0">Password</label>
                @if (Route::has('password.request'))
                    <a class="small text-decoration-none" href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </div>
            <input id="password" class="form-control form-control-lg rounded-4" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-4">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-4">Masuk ke Dashboard</button>
    </form>
</x-guest-layout>
