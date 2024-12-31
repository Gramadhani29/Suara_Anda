@extends('layouts.app') <!-- Menggunakan layout utama -->

@section('title', 'Tambah Artikel')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Artikel</h2>
    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul artikel" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" placeholder="Masukkan isi artikel" required></textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Artikel</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-danger me-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Tambah Artikel</button>
        </div>
    </form>
</div>
@endsection
