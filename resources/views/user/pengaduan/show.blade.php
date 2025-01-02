@extends('user.layouts-user.app')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Konten Pengaduan -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Detail Pengaduan</h3>
                    </div>
                    <div class="card-body">
                        <div style="background: #F9FAFB; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            
                            <!-- Informasi Pengaduan -->
                            <p><strong>Judul:</strong> {{ $pengaduan->judul }}</p>
                            <p><strong>Isi:</strong> {{ $pengaduan->deskripsi }}</p>
                            <p><strong>Kategori:</strong> {{ $pengaduan->kategori }}</p>
                            <p><strong>Lokasi:</strong> {{ $pengaduan->lokasi }}</p>

                            <!-- Menampilkan Gambar -->
                            <p><strong>Gambar:</strong></p>
                            <div style="overflow: hidden; position: relative; width: 100%; height: 400px; margin-top: 10px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                @if($pengaduan->gambar)
                                    <img src="{{ asset('storage/' . $pengaduan->gambar) }}" 
                                         alt="Gambar Pengaduan" 
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <p style="text-align: center; padding: 20px; color: #6c757d;">Tidak ada gambar tersedia</p>
                                @endif
                            </div>

                            <!-- Status Pengaduan -->
                            <p>
                                <span style="display: inline-block; background-color: #D1ECF1; color: #0C5460; padding: 5px 10px; border-radius: 5px; font-size: 14px; margin-top: 10px;">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </p>

                            <!-- Tombol Aksi -->
                            <div style="margin-top: 20px; display: flex; gap: 10px;">
                                <!-- Tombol Hapus -->
                                <form action="{{ route('laporan.destroy', $pengaduan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #F8D7DA; color: #721C24; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer;">
                                        Hapus Pengaduan
                                    </button>
                                </form>

                                <!-- Tombol Ubah -->
                                <a href="{{ route('laporan.edit', $pengaduan->id) }}" style="display: inline-block; background-color: #D4EDDA; color: #155724; text-decoration: none; padding: 8px 12px; border-radius: 5px; font-size: 14px; text-align: center; cursor: pointer;">
                                    Ubah Pengaduan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
