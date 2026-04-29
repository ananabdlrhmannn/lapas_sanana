@extends('layouts.admin')

@section('title', 'Data Berita | Admin Lapas Sanana')
@section('page_heading', 'Manajemen Berita')

@section('content')
<div class="panel-card p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h4 class="mb-1">Data Berita</h4>
            <p class="text-muted mb-0">Kelola seluruh berita yang tampil pada website publik.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary px-4"><i class="bi bi-plus-circle me-2"></i>Tambah Berita</a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                    <tr>
                        <td>{{ $news->firstItem() + $loop->index }}</td>
                        <td>
                            <div class="fw-semibold">{{ $item->title }}</div>
                            <small class="text-muted">{{ \Illuminate\Support\Str::limit($item->excerpt, 70) }}</small>
                        </td>
                        <td>{{ $item->category ?: '-' }}</td>
                        <td>{{ optional($item->published_at)->format('d-m-Y') ?: '-' }}</td>
                        <td>
                            <span class="badge {{ $item->is_published ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }} px-3 py-2 rounded-pill">
                                {{ $item->is_published ? 'Publish' : 'Draft' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $news->links() }}
    </div>
</div>
@endsection
