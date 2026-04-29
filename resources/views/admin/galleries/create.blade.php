@extends('layouts.admin')

@section('title', 'Tambah Publikasi & Galeri')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Tambah Publikasi & Galeri</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.galleries._form')
            </form>
        </div>
    </div>
</div>
@endsection