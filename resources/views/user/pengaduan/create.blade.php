@extends('user.layouts-user.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Formulir Laporan Pengaduan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Input Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-bold">Judul</label>
                            <input 
                                type="text" 
                                id="judul" 
                                name="judul" 
                                class="form-control" 
                                value="{{ old('judul') }}" 
                                required>
                            @error('judul')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Input Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                            <textarea 
                                id="deskripsi" 
                                name="deskripsi" 
                                class="form-control" 
                                rows="5" 
                                required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Input Kategori -->
                        <div class="mb-3">
                            <label for="kategori" class="form-label fw-bold">Kategori</label>
                            <input 
                                type="text" 
                                id="kategori" 
                                name="kategori" 
                                class="form-control" 
                                value="{{ old('kategori') }}" 
                                required>
                            @error('kategori')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Input Lokasi -->
                        <div class="mb-3">
                            <label for="lokasi" class="form-label fw-bold">Lokasi</label>
                            <input 
                                type="text" 
                                id="lokasi" 
                                name="lokasi" 
                                class="form-control" 
                                value="{{ old('lokasi') }}" 
                                required>
                            @error('lokasi')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Input Gambar -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-bold">Gambar</label>
                            <input 
                                type="file" 
                                id="gambar" 
                                name="gambar" 
                                class="form-control"
                                accept="image/*">
                            @error('gambar')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="text-center mt-4">
                            <button 
                                type="submit" 
                                class="btn btn-success px-4">
                                Laporkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
