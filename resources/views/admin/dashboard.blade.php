@extends('layouts.admin')

@section('title', 'Dashboard Admin | Lapas Sanana')
@section('page_heading', 'Dashboard Admin')

@section('content')
<div class="row g-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-2">Total Berita</p>
                    <h3 class="mb-0">{{ $newsCount }}</h3>
                </div>
                <span class="icon-wrap"><i class="bi bi-newspaper"></i></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-2">Total Kunjungan</p>
                    <h3 class="mb-0">{{ $visitCount }}</h3>
                </div>
                <span class="icon-wrap"><i class="bi bi-calendar2-check"></i></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-2">Total Pengaduan</p>
                    <h3 class="mb-0">{{ $complaintCount }}</h3>
                </div>
                <span class="icon-wrap"><i class="bi bi-chat-left-text"></i></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-2">Kunjungan Menunggu</p>
                    <h3 class="mb-0">{{ $pendingVisits }}</h3>
                </div>
                <span class="icon-wrap"><i class="bi bi-hourglass-split"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-lg-7">
        <div class="panel-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="mb-1">Ringkasan Operasional</h4>
                    <p class="text-muted mb-0">Pantau aktivitas utama website secara cepat.</p>
                </div>
                <span class="badge-soft">Live Summary</span>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="border rounded-4 p-3 h-100">
                        <div class="text-muted small mb-1">Pengaduan Baru</div>
                        <div class="fs-3 fw-bold">{{ $newComplaints }}</div>
                        <p class="mb-0 small text-muted">Perlu ditinjau dan ditindaklanjuti dari menu pengaduan.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded-4 p-3 h-100">
                        <div class="text-muted small mb-1">Status Website</div>
                        <div class="fs-3 fw-bold text-success">Aktif</div>
                        <p class="mb-0 small text-muted">Tampilan publik dan dashboard admin telah menggunakan Bootstrap yang lebih rapi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="panel-card p-4 h-100">
            <h4 class="mb-3">Akses Cepat</h4>
            <div class="d-grid gap-3">
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-lg text-start"><i class="bi bi-plus-circle me-2"></i>Tambah Berita Baru</a>
                <a href="{{ route('admin.visits.index') }}" class="btn btn-outline-primary btn-lg text-start"><i class="bi bi-calendar-event me-2"></i>Kelola Kunjungan</a>
                <a href="{{ route('admin.complaints.index') }}" class="btn btn-outline-primary btn-lg text-start"><i class="bi bi-chat-dots me-2"></i>Tinjau Pengaduan</a>
            </div>
        </div>
    </div>
</div>
@endsection
