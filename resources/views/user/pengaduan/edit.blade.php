@extends('user.layouts-user.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Edit Pengaduan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Input Judul -->
                            <div class="mb-3">
                                <label for="judul" class="form-label fw-bold">Judul</label>
                                <input 
                                    type="text" 
                                    name="judul" 
                                    value="{{ $pengaduan->judul }}" 
                                    class="form-control" 
                                    required>
                                @error('judul')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Input Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-bold">Isi</label>
                                <textarea 
                                    name="deskripsi" 
                                    class="form-control" 
                                    rows="5" 
                                    required>{{ $pengaduan->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Input Kategori -->
                            <div class="mb-3">
                                <label for="kategori" class="form-label fw-bold">Kategori</label>
                                <input 
                                    type="text" 
                                    name="kategori" 
                                    value="{{ $pengaduan->kategori }}" 
                                    class="form-control" 
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
                                    name="lokasi" 
                                    value="{{ $pengaduan->lokasi }}" 
                                    class="form-control" 
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
                                    name="gambar" 
                                    class="form-control">
                                @error('gambar')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Menampilkan Gambar Saat Ini -->
                            @if($pengaduan->gambar)
                                <div class="mb-3">
                                    <p><strong>Gambar Saat Ini:</strong></p>
                                    <img src="{{ asset('storage/' . $pengaduan->gambar) }}" 
                                         alt="Gambar Pengaduan" 
                                         style="max-width: 200px; margin-bottom: 10px;">
                                </div>
                            @endif

                            <!-- Tombol Submit -->
                            <div class="text-center mt-4">
                                <button 
                                    type="submit" 
                                    class="btn btn-success px-4">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
