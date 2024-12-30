@extends('layouts.admin')

@section('title', 'Tambah psikolog')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Tambah Psikolog</h4>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
        
                <!-- Menampilkan Pesan Error -->
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <div class="card-body">
                        <form action="{{$id ? route('admin.update-psikolog', $id) : route('admin.store-psikolog') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if($id)
                                @method('PUT')
                            @else
                                @method('POST')
                            @endif
                            <!-- Nama psikolog -->
                            <div class="mb-4">
                                <label for="psikolog" class="form-label">Nama Psikolog <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" value="{{ $id ? $psikolog->psikolog : old('psikolog')}}" class="form-control" id="psikolog" name="psikolog" placeholder="Contoh: dr. John Doe" required>
                                    @error('psikolog')
                                    <div class="text-danger mt-1">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                                </div>
                            </div>

                            <!-- Gambar -->
                            <div class="mb-4">
                                <label for="gambar" class="form-label">Foto Psikolog <span class="text-danger">{{ $id ? '' : '*' }}</span></label>
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" {{ $id ? '' : 'required'}}>
                                @if ($id)
                                    <input type="hidden" name="old_gambar" value="{{ $psikolog->gambar }}">
                                @endif
                                <small class="text-muted">Unggah file gambar dalam format JPG atau PNG (maksimal 2MB).</small>
                                @error('gambar')
                                <div class="text-danger mt-1">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                            </div>

                            <!-- Lulusan -->
                            <div class="mb-4">
                                <label for="lulusan" class="form-label">Universitas Lulusan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-mortarboard-fill"></i></span>
                                    <input type="text" class="form-control" id="lulusan" value="{{ $id ? $psikolog->lulusan : old('lulusan') }}" name="lulusan" placeholder="Contoh: Universitas Indonesia" required>
                                    @error('lulusan')
                                    <div class="text-danger mt-1">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                                </div>
                            </div>

                            <!-- Tahun Lulus -->
                            <div class="mb-4">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-calendar2-check-fill"></i></span>
                                    <input type="number" class="form-control" id="tahun_lulus" value="{{ $id ? $psikolog->tahun_lulus : old('tahun_lulus') }}" name="tahun_lulus" placeholder="Contoh: 2020" min="1900" max="{{ date('Y') }}" required>
                                    @error('tahun_lulus')
                                    <div class="text-danger mt-1">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                                </div>
                            </div>

                            <!-- Spesialis -->
                            <div class="mb-4">
                                <label for="spesialis_id" class="form-label">Spesialisasi <span class="text-danger">*</span></label>
                                <select class="form-select" id="spesialis_id" name="spesialis_id" required>
                                    {{ $id ? '' : '<option value="" selected disabled>Pilih spesialisasi</option>' }}
                                    @foreach ($spesialis as $sp )
                                    <option value="{{ $sp->id }}" {{ $id && $sp->id == $psikolog->spesialis_id ? 'selected' : ''}}>{{ $sp->spesialis }}</option>
                                    @endforeach
                                </select>
                                @error('spesialis_id')
                                <div class="text-danger mt-1">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-save-fill"></i> Simpan
                                </button>
                                <a href="{{ route('admin.manage-psikolog') }}" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-arrow-left-circle-fill"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
