@extends('layouts.admin')

@section('title', 'Edit Publikasi & Galeri')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Publikasi & Galeri</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.galleries._form', ['gallery' => $gallery])
            </form>
        </div>
    </div>
</div>
@endsection