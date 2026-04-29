@php
    $gallery = $gallery ?? null;
@endphp

<div class="mb-3">
    <label for="title" class="form-label">Judul</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $gallery->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="layanan" {{ old('category', $gallery->category ?? '') == 'layanan' ? 'selected' : '' }}>Layanan</option>
        <option value="pembinaan" {{ old('category', $gallery->category ?? '') == 'pembinaan' ? 'selected' : '' }}>Pembinaan</option>
        <option value="publikasi" {{ old('category', $gallery->category ?? '') == 'publikasi' ? 'selected' : '' }}>Publikasi</option>
    </select>
    @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $gallery->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Gambar</label>
    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" {{ isset($gallery) ? '' : 'required' }}>
    <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Maksimal 10 MB. Gambar akan dikompres otomatis.</small>
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@if(isset($gallery) && $gallery->image)
    <div class="mb-3">
        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="max-width: 220px; border-radius: 12px;">
    </div>
@endif

<div class="mb-3">
    <label for="sort_order" class="form-label">Urutan Tampil</label>
    <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
           value="{{ old('sort_order', $gallery->sort_order ?? 0) }}" min="0">
    @error('sort_order')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-check form-switch mb-3">
    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1"
           {{ old('is_published', $gallery->is_published ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_published">Publish foto</label>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>