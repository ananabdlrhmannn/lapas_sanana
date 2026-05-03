<div class="row g-4">
    <div class="col-lg-8">
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $news->title ?? '')); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <input type="text" name="category" class="form-control" value="<?php echo e(old('category', $news->category ?? '')); ?>" placeholder="Contoh: Kegiatan, Pembinaan, Layanan Publik">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Ringkasan</label>
            <textarea name="excerpt" class="form-control" rows="4" placeholder="Tulis ringkasan singkat berita"><?php echo e(old('excerpt', $news->excerpt ?? '')); ?></textarea>
        </div>

        <div class="mb-0">
            <label class="form-label fw-semibold">Isi Berita</label>
            <textarea name="content" class="form-control" rows="12" required><?php echo e(old('content', $news->content ?? '')); ?></textarea>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel-card p-4 h-100">
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Publish</label>
                <input type="date" name="published_at" class="form-control" value="<?php echo e(old('published_at', isset($news) && $news->published_at ? $news->published_at->format('Y-m-d') : '')); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control">
            </div>

            <?php if(!empty($news?->thumbnail)): ?>
                <div class="mb-3">
                    <img src="<?php echo e(asset('storage/' . $news->thumbnail)); ?>" alt="Thumbnail berita" class="img-fluid rounded-4 shadow-sm">
                </div>
            <?php endif; ?>

            <div class="form-check form-switch mb-0">
                <input type="checkbox" name="is_published" value="1" class="form-check-input" id="is_published" <?php if(old('is_published', $news->is_published ?? true)): echo 'checked'; endif; ?>>
                <label class="form-check-label fw-semibold" for="is_published">Publish berita</label>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\CPNS\LATSAR\sistem\lapas-sanana\resources\views/admin/news/_form.blade.php ENDPATH**/ ?>