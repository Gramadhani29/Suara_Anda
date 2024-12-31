@extends('layouts.user')

@section('title', 'Daftar Booking')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Booking</h2>
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
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Psikolog</th>
                    <th>Spesialis</th>
                    <th>Jadwal</th>
                    <th>Tanggal</th>
                    <th>Atas Nama</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->psikolog->psikolog }}</td>
                    <td>{{ $item->psikolog->spesialis->spesialis }}</td>
                    <td>
                        {{ $item->jadwal->hari }} 
                        ({{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jadwal->jam_selesai)->format('H:i') }})
                    </td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td class="text-center">
                        <form action="/user/generate-my-booking" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" href="" class="btn btn-sm btn-primary">
                                Cetak PDF
                            </button>
                        </form>
                        <form action="/user/delete-booking/{{ $item->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus booking ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
