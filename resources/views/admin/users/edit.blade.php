@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit User</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.users._form', ['user' => $user])
            </form>
        </div>
    </div>
</div>
@endsection
