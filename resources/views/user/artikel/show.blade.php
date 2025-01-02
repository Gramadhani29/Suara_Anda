@extends('user.layouts-user.app')

@section('judul', $artikel->judul)

@section('content')
<div class="container">
    <!-- Banner -->
    <div class="mb-4">
        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Banner {{ $artikel->judul }}" class="img-fluid w-100" style="max-height: 200px; object-fit: cover;">
    </div>

    <!-- Judul dan Isi Artikel -->
    <div class="p-4 bg-white shadow-sm">
        <h1 class="mb-3">{{ $artikel->judul }}</h1>
        <p>{{ $artikel->isi }}</p>
    </div>
</div>
@endsection
