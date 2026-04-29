@extends('layouts.admin')

@section('title', 'Edit Berita | Admin Lapas Sanana')
@section('page_heading', 'Edit Berita')

@section('content')
<div class="panel-card p-4">
    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.news._form')
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('admin.news.index') }}" class="btn btn-light px-4">Batal</a>
            <button class="btn btn-primary px-4"><i class="bi bi-save me-2"></i>Update</button>
        </div>
    </form>
</div>
@endsection
