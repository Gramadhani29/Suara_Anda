@extends('layouts.user')

@section('title', 'Form Booking')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h4>Form Booking</h4>
                    <p>Silakan isi data Anda untuk melakukan booking.</p>
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
                    <form method="POST" action="/user/list-psikolog/{{ $psikolog->id }}/store-booking">
                        @csrf
                        @method('POST')
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                            @error('nama')
                            <div class="text-danger mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                            @error('email')
                            <div class="text-danger mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>

                        <!-- Telepon -->
                        <div class="mb-3">
                            <label for="telpon" class="form-label">Telepon <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="telpon" name="telpon" placeholder="Masukkan Nomor Telepon" required>
                            @error('telpon')
                            <div class="text-danger mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>

                        <!-- Tanggal -->
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            @error('tanggal')
                            <div class="text-danger mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>

                        <!-- Jam -->
                        <div class="mb-3">
                            <label for="jadwal_id" class="form-label">Jadwal <span class="text-danger">*</span></label>
                            <select class="form-select" id="jadwal_id" name="jadwal_id" required>
                                <option value="" selected disabled>Pilih Jadwal</option>
                                @foreach ($psikolog->jadwal as $ps )
                                <option value="{{ $ps->id }}">{{ $ps->hari }} ( {{ \Carbon\Carbon::createFromFormat('H:i:s', $ps->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $ps->jam_selesai)->format('H:i') }} )</option>
                                @endforeach
                            </select>
                            @error('jadwal_id')
                            <div class="text-danger mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>

                        <!-- Button Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Booking Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
