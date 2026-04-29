<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Lapas Sanana') }}</title>
    <link href="{{ asset('arsha/assets/img/fav.png') }}" rel="icon">
    <link href="{{ asset('arsha/assets/img/logo imipas.jpg') }}" rel="apple-touch-icon">       
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(55, 81, 126, 0.96), rgba(71, 178, 228, 0.84)), url('{{ asset('arsha/assets/img/foto_kantor.jpeg') }}') center/cover no-repeat fixed;
        }

        .auth-card {
            border: 0;
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.25);
            overflow: hidden;
        }

        .auth-side {
            background: linear-gradient(180deg, #37517e, #233557);
            color: #fff;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container py-5 min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card auth-card w-100" style="max-width: 1080px;">
            <div class="row g-0">
                <div class="col-lg-5 auth-side d-none d-lg-flex flex-column justify-content-center p-5">
                    <img src="{{ asset('arsha/assets/img/logo imipas.jpg') }}" alt="Logo" style="width: 1000px;" class="mb-4">
                    <h4 class="fw-bold mb-3 text-center display-5 w-100">Lapas Kelas IIB Sanana</h4>
                    <p class="mb-0">Selamat datang di sistem informasi Lapas Kelas IIB Sanana. Silakan masuk untuk mengelola data dan informasi terkait lapas kami.</p>
                </div>
                <div class="col-lg-7 bg-white p-4 p-lg-5">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
