@extends('user.layouts-user.app') <!-- Menggunakan layout utama -->

@section('title', 'Daftar Artikel') <!-- Mengatur judul halaman -->

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Artikel</h1>
    <div class="row g-4">
        @forelse ($artikel as $item)
            <div class="col-md-4">
                <a href="{{ route('user.artikel.show', $item->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="max-height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ Str::limit($item->isi, 100, '...') }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">Belum ada artikel yang tersedia.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
