@extends('layouts.admin')

@section('title', 'Data Pengaduan | Admin Lapas Sanana')
@section('page_heading', 'Manajemen Pengaduan')

@section('content')
<div class="panel-card p-4">
    <div class="mb-4">
        <h4 class="mb-1">Data Pengaduan Masyarakat</h4>
        <p class="text-muted mb-0">Kelola status dan tindak lanjut pengaduan yang dikirim melalui website.</p>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelapor</th>
                    <th>Kategori</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th style="min-width: 280px;">Tindak Lanjut</th>
                </tr>
            </thead>
            <tbody>
                @forelse($complaints as $complaint)
                    <tr>
                        <td>{{ $complaints->firstItem() + $loop->index }}</td>
                        <td>
                            <div class="fw-semibold">{{ $complaint->name }}</div>
                            <small class="text-muted">{{ $complaint->contact }}</small>
                        </td>
                        <td>{{ $complaint->category }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($complaint->message, 120) }}</td>
                        <td>
                            <span class="badge {{ match($complaint->status) {
                                'diproses' => 'bg-warning-subtle text-warning',
                                'selesai' => 'bg-success-subtle text-success',
                                default => 'bg-primary-subtle text-primary'
                            } }} px-3 py-2 rounded-pill">{{ ucfirst($complaint->status) }}</span>
                        </td>
                        <td>
                            <form action="{{ route('admin.complaints.update', $complaint) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="mb-2">
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="baru" @selected($complaint->status === 'baru')>Baru</option>
                                        <option value="diproses" @selected($complaint->status === 'diproses')>Diproses</option>
                                        <option value="selesai" @selected($complaint->status === 'selesai')>Selesai</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <textarea name="admin_note" class="form-control form-control-sm" rows="3" placeholder="Catatan admin">{{ $complaint->admin_note }}</textarea>
                                </div>
                                <button class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">Belum ada pengaduan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $complaints->links() }}
    </div>
</div>
@endsection
