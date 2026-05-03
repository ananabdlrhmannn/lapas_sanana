<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'published_at' => 'nullable|date',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'is_published' => 'nullable|boolean',
        ];

        $messages = [
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'category.max' => 'Kategori maksimal 100 karakter.',
            'published_at.date' => 'Tanggal publikasi tidak valid.',
            'content.required' => 'Konten berita wajib diisi.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat jpg, jpeg, png, atau webp.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 4 MB.',
        ];

        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->storePublicThumbnail($request->file('thumbnail'));
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        $validated['user_id'] = auth()->id();
        $validated['is_published'] = $request->boolean('is_published');

        News::create($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'published_at' => 'nullable|date',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'is_published' => 'nullable|boolean',
        ];

        $messages = [
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'category.max' => 'Kategori maksimal 100 karakter.',
            'published_at.date' => 'Tanggal publikasi tidak valid.',
            'content.required' => 'Konten berita wajib diisi.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat jpg, jpeg, png, atau webp.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 4 MB.',
        ];

        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('thumbnail')) {
            $this->deletePublicStorageFile($news->thumbnail);

            $validated['thumbnail'] = $this->storePublicThumbnail($request->file('thumbnail'));
        }

        $validated['is_published'] = $request->boolean('is_published');

        $news->update($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->deletePublicStorageFile($news->thumbnail);

        $news->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }

    private function storePublicThumbnail($file): string
    {
        $filename = $file->hashName('news');

        $fullPath = public_path('storage/' . $filename);
        $directory = dirname($fullPath);

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $file->move($directory, basename($filename));

        return $filename;
    }

    private function deletePublicStorageFile(?string $path): void
    {
        if (!$path) {
            return;
        }

        $fullPath = public_path('storage/' . $path);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }
}