@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Tambah User</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                @include('admin.users._form')
            </form>
        </div>
    </div>
</div>
@endsection
