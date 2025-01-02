@extends('layouts.app')  <!-- Menggunakan layout utama -->

@section('title', 'Edit Artikel')  <!-- Menentukan judul halaman -->

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Artikel</h2>
    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')  <!-- Menggunakan PUT untuk update data -->

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul artikel" value="{{ old('judul', $artikel->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" placeholder="Masukkan isi artikel" required>{{ old('isi', $artikel->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Artikel</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            @if ($artikel->gambar)  <!-- Menampilkan gambar lama jika ada -->
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Artikel" class="img-thumbnail" width="150">
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-danger me-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Update Artikel</button>
        </div>
    </form>
</div>
@endsection
