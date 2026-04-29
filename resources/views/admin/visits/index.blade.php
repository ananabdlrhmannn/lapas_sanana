@extends('layouts.admin')

@section('title', 'Data Kunjungan | Admin Lapas Sanana')
@section('page_heading', 'Manajemen Kunjungan')

@section('content')
<div class="panel-card p-4">
    <div class="mb-4">
        <h4 class="mb-1">Data Pendaftaran Kunjungan</h4>
        <p class="text-muted mb-0">
            Kelola status pendaftaran kunjungan yang masuk dari halaman publik, lihat PDF,
            dan kirim tautan PDF ke WhatsApp pengunjung.
        </p>
    </div>

    <div class="alert alert-info border-0 rounded-4 mb-4">
        <div class="fw-semibold mb-1">
            <i class="bi bi-info-circle me-1"></i> Catatan pengiriman WhatsApp
        </div>

        <div class="small mb-0">
            Tombol WhatsApp akan membuka chat ke nomor pengunjung berisi pesan dan tautan PDF.
            Pastikan nilai <code>APP_URL</code> di file <code>.env</code> sudah memakai domain website aktif.
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengunjung</th>
                    <th>Kontak</th>
                    <th>Warga Binaan</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                    <th style="min-width: 340px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($visits as $visit)
                    @php
                        $pdfUrl = \Illuminate\Support\Facades\URL::signedRoute('visits.pdf', $visit);

                        $visitDate = optional($visit->visit_date)->format('d-m-Y') ?: '-';

                        $whatsappMessage = "Halo {$visit->visitor_name}, berikut file PDF surat izin kunjungan Lapas Sanana.\n\n".
                            "Nama Pengunjung: {$visit->visitor_name}\n".
                            "NIK: {$visit->nik}\n".
                            "Warga Binaan: {$visit->prisoner_name}\n".
                            "Tanggal Kunjungan: {$visitDate}\n".
                            "Sesi: ".($visit->session ?: '-')."\n".
                            "Status: ".ucfirst($visit->status)."\n\n".
                            "Link PDF: {$pdfUrl}\n\n".
                            "Terima kasih.";

                        $whatsappUrl = $visit->whatsapp_number
                            ? 'https://wa.me/'.$visit->whatsapp_number.'?text='.rawurlencode($whatsappMessage)
                            : null;
                    @endphp

                    <tr>
                        <td>{{ $visits->firstItem() + $loop->index }}</td>

                        <td>
                            <div class="fw-semibold">{{ $visit->visitor_name }}</div>
                            <small class="text-muted">NIK: {{ $visit->nik }}</small>
                        </td>

                        <td>
                            <div>{{ $visit->phone }}</div>
                            <small class="text-muted">{{ $visit->email ?: '-' }}</small>
                        </td>

                        <td>
                            <div class="fw-semibold">{{ $visit->prisoner_name }}</div>
                            <small class="text-muted">{{ $visit->relationship }}</small>
                        </td>

                        <td>
                            <div>{{ $visitDate }}</div>
                            <small class="text-muted">Sesi: {{ $visit->session ?: '-' }}</small>
                        </td>

                        <td>
                            <span class="badge {{ match($visit->status) {
                                'diterima' => 'bg-success-subtle text-success',
                                'ditolak' => 'bg-danger-subtle text-danger',
                                'selesai' => 'bg-primary-subtle text-primary',
                                default => 'bg-warning-subtle text-warning'
                            } }} px-3 py-2 rounded-pill">
                                {{ ucfirst($visit->status) }}
                            </span>
                        </td>

                        <td>
                            <form action="{{ route('admin.visits.update-status', $visit) }}" method="POST" class="d-flex gap-2 mb-2">
                                @csrf
                                @method('PATCH')

                                <select name="status" class="form-select form-select-sm">
                                    <option value="menunggu" @selected($visit->status === 'menunggu')>
                                        Menunggu
                                    </option>

                                    <option value="diterima" @selected($visit->status === 'diterima')>
                                        Diterima
                                    </option>

                                    <option value="ditolak" @selected($visit->status === 'ditolak')>
                                        Ditolak
                                    </option>

                                    <option value="selesai" @selected($visit->status === 'selesai')>
                                        Selesai
                                    </option>
                                </select>

                                <button class="btn btn-primary btn-sm">
                                    Update
                                </button>
                            </form>

                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ $pdfUrl }}" target="_blank" rel="noopener" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-file-earmark-pdf me-1"></i>
                                    Lihat PDF
                                </a>

                                @if($whatsappUrl)
                                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener" class="btn btn-success btn-sm">
                                        <i class="bi bi-whatsapp me-1"></i>
                                        Kirim WhatsApp
                                    </a>
                                @else
                                    <button type="button" class="btn btn-success btn-sm" disabled>
                                        <i class="bi bi-whatsapp me-1"></i>
                                        Nomor tidak valid
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            Belum ada data kunjungan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $visits->links() }}
    </div>
</div>
@endsection
