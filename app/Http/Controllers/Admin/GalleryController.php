<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(12);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'title' => 'required|string|max:255',
                'category' => 'required|in:layanan,pembinaan,publikasi',
                'description' => 'nullable|string',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
                'sort_order' => 'nullable|integer|min:0',
                'is_published' => 'nullable|boolean',
            ],
            [
                'title.required' => 'Judul wajib diisi.',
                'category.required' => 'Kategori wajib dipilih.',
                'category.in' => 'Kategori tidak valid.',
                'image.required' => 'Gambar wajib diunggah.',
                'image.image' => 'File harus berupa gambar.',
                'image.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
                'image.max' => 'Ukuran gambar maksimal 10 MB.',
                'sort_order.integer' => 'Urutan tampil harus berupa angka.',
                'sort_order.min' => 'Urutan tampil minimal 0.',
            ]
        );

        $validated['image'] = $this->compressAndStoreImage($request->file('image'));
        $validated['user_id'] = auth()->id();
        $validated['is_published'] = $request->boolean('is_published');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Gallery::create($validated);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate(
            [
                'title' => 'required|string|max:255',
                'category' => 'required|in:layanan,pembinaan,publikasi',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
                'sort_order' => 'nullable|integer|min:0',
                'is_published' => 'nullable|boolean',
            ],
            [
                'title.required' => 'Judul wajib diisi.',
                'category.required' => 'Kategori wajib dipilih.',
                'category.in' => 'Kategori tidak valid.',
                'image.image' => 'File harus berupa gambar.',
                'image.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
                'image.max' => 'Ukuran gambar maksimal 10 MB.',
                'sort_order.integer' => 'Urutan tampil harus berupa angka.',
                'sort_order.min' => 'Urutan tampil minimal 0.',
            ]
        );

        if ($request->hasFile('image')) {
            $this->deletePublicStorageFile($gallery->image);

            $validated['image'] = $this->compressAndStoreImage($request->file('image'));
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $gallery->update($validated);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $this->deletePublicStorageFile($gallery->image);

        $gallery->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus.');
    }

    private function compressAndStoreImage($file): string
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath());

        $image->scaleDown(width: 1600, height: 1600);

        $filename = 'galleries/' . date('Y/m') . '/' . Str::uuid() . '.jpg';

        $fullPath = public_path('storage/' . $filename);
        $directory = dirname($fullPath);

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $encoded = $image->toJpeg(75);

        File::put($fullPath, (string) $encoded);

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