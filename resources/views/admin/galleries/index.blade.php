@extends('layouts.admin')

@section('title', 'Publikasi & Galeri')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Publikasi & Galeri</h1>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Foto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($galleries->count())
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Urutan</th>
                                <th>Dibuat</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                             alt="{{ $item->title }}"
                                             style="width: 90px; height: 70px; object-fit: cover; border-radius: 10px;">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td class="text-capitalize">{{ $item->category }}</td>
                                    <td>
                                        @if($item->is_published)
                                            <span class="badge bg-success">Publish</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->sort_order }}</td>
                                    <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.galleries.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('admin.galleries.destroy', $item) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $galleries->links() }}
                </div>
            @else
                <p class="text-muted mb-0">Belum ada data galeri.</p>
            @endif
        </div>
    </div>
</div>
@endsection