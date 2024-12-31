@extends('layouts.admin')

@section('title', 'Manage Psikolog')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Manage Psikolog</h1>

        <!-- Menampilkan Pesan Sukses -->
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

        <!-- Button Tambah psikolog -->
        <div class="mb-3">
            <a href="{{ route('admin.create-psikolog') }}" class="btn btn-primary">Tambah Psikolog</a>
        </div>

        <!-- Responsive Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Psikolog</th>
                        <th>Gambar</th>
                        <th>Tahun Lulus</th>
                        <th>Spesialis</th>
                        <th>Jadwal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $psikolog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $psikolog->psikolog }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $psikolog->gambar) }}" alt="psikolog" class="img-thumbnail" style="width: 100px;">
                        </td>
                        <td>{{ $psikolog->tahun_lulus }}</td>
                        <td>{{ $psikolog->spesialis->spesialis }}</td>
                        <td>
                            @foreach($psikolog->jadwal as $jadwal)
                                <p><strong>{{ $jadwal->hari }}:</strong> 
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai)->format('H:i') }} - 
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai)->format('H:i') }}
                                </p>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.edit-psikolog', $psikolog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/delete-psikolog/{{ $psikolog->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <a href="/admin/manage-psikolog/{{ $psikolog->id }}/jadwal" class="btn btn-sm btn-info">Jadwal</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
