@extends('layouts.admin')

@section('title', 'Tambah psikolog')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Tambah Jadwal</h4>
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
                        <form action={{$idJadwal ? "/admin/manage-doktor/$idPsikolog/edit-jadwal/$idJadwal" : "/admin/manage-doktor/$idPsikolog/store-jadwal"}} method="POST" >
                            @csrf
                            @if($idJadwal)
                                @method('PUT')
                            @else
                                @method('POST')
                            @endif

                           <!-- Jam Mulai -->
                            <div class="mb-4">
                                <label for="jam_mulai" class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" id="jam_mulai" name="jam_mulai" value="{{ $idJadwal ? \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai)->format('H') : old('jam_mulai') }}" class="form-control" placeholder="Jam" min="0" max="23" required>
                                    <span class="input-group-text">:</span>
                                    <input type="number" id="menit_mulai" name="menit_mulai" value="{{ $idJadwal ? \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai)->format('i') : old('menit_mulai') }}" class="form-control" placeholder="Menit" min="0" max="59" required>
                                </div>
                                @error('jam_mulai')
                                <div class="text-danger mt-1">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>


                            <!-- Jam Selesai -->
                            <div class="mb-4">
                                <label for="jam_selesai" class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" id="jam_selesai" name="jam_selesai" class="form-control" value="{{ $idJadwal ? \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai)->format('H') : old('jam_selesai') }}" placeholder="Jam" min="00" max="23" required>
                                    <span class="input-group-text">:</span>
                                    <input type="number" id="menit_selesai" name="menit_selesai" class="form-control" value="{{ $idJadwal ? \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai)->format('i') : old('jam_selesai') }}" placeholder="Menit" min="00" max="59" required>
                                </div>
                                @error('jam_selesai')
                                <div class="text-danger mt-1">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <!-- Hari -->
                            <div class="mb-4">
                                <label for="hari" class="form-label">Hari <span class="text-danger">*</span></label>
                                <select class="form-select" id="hari" name="hari" required>
                                    <option value="" selected disabled>Pilih Hari</option>
                                    <option value="Senin" {{ $idJadwal && $jadwal->hari == 'Senin' ? 'selected' : ''}}>Senin</option>
                                    <option value="Selasa" {{ $idJadwal && $jadwal->hari == 'Selasa' ? 'selected' : ''}} >Selasa</option>
                                    <option value="Rabu" {{ $idJadwal && $jadwal->hari == 'Rabu' ? 'selected' : ''}} >Rabu</option>
                                    <option value="Kamis" {{ $idJadwal && $jadwal->hari == 'Kamis' ? 'selected' : ''}} >Kamis</option>
                                    <option value="Jumat" {{ $idJadwal && $jadwal->hari == 'Jumat' ? 'selected' : ''}} >Jumat</option>
                                    <option value="Sabtu" {{ $idJadwal && $jadwal->hari == 'Sabtu' ? 'selected' : ''}} >Sabtu</option>
                                    <option value="Minggu" {{ $idJadwal && $jadwal->hari == 'Minggu' ? 'selected' : ''}} >Minggu</option>
                                </select>
                                @error('hari')
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
