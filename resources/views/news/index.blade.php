@extends('layouts.app')

@section('title', 'Berita | Lapas Sanana')

@section('content')
<section class="page-hero">
    <div class="container">
        <div class="row align-items-end gy-3">
            <div class="col-lg-8">
                <h1>Berita & Kegiatan</h1>
                <p class="mb-0">Daftar berita resmi, publikasi kegiatan, dan informasi terbaru Lapas Kelas IIB Sanana.</p>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-lg-end mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            @forelse($news as $item)
                <div class="col-lg-4 col-md-6">
                   <article class="news-card h-100">
                        <div class="news-thumb">
                             <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : asset('arsha/assets/img/blog/blog-post-3.webp') }}" class="img-fluid" alt="{{ $item->title }}">
                        </div>
                        <div class="news-content">
                            <span class="category">{{ $item->category ?: 'Berita' }}</span>
                            <h3>{{ $item->title }}</h3>
                            <small>{{ optional($item->published_at)->translatedFormat('d F Y') ?: $item->created_at->translatedFormat('d F Y') }}</small>
                            <p>{{ $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 140) }}</p>
                            <a href="{{ route('news.show', $item->slug) }}" class="btn btn-outline-primary rounded-pill px-4">Baca Selengkapnya</a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="soft-panel p-5 text-center">
                        <i class="bi bi-newspaper fs-1 text-primary"></i>
                        <h3 class="mt-3">Belum ada berita tersedia</h3>
                        <p class="mb-0">Silakan tambahkan berita dari dashboard admin.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $news->links() }}
        </div>
    </div>
</section>
@endsection
