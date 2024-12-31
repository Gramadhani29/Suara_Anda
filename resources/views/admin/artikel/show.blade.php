@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body p-0">
                    <!-- Menampilkan Gambar -->
                    <div style="overflow: hidden; position: relative; width: 100%; height: 300px;">
                        @if($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" 
                                 alt="Gambar Artikel" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <p class="text-center pt-5">Tidak ada gambar</p>
                        @endif
                    </div>

                    <!-- Menampilkan Judul -->
                    <div class="p-4">
                        <h3 class="mb-3">{{ $artikel->judul }}</h3>

                        <!-- Menampilkan Isi -->
                        <p>{{ $artikel->isi }}</p>
                    </div>
                </div>

                <!-- Tombol Footer -->
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Artikel
                    </a>
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
