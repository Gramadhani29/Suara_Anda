@extends('layouts.admin')

@section('title', 'Manage Psikolog')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Manage Jadwal {{$psikolog->psikolog}}</h1>

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
            <a href={{"/admin/manage-doktor/$psikolog->id/form-jadwal"}} class="btn btn-primary">Tambah Jadwal</a>
        </div>

        <!-- Responsive Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($psikolog->jadwal as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jam_mulai)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $item->jam_selesai)->format('H:i') }}</td>
                        <td>
                            <a href="/admin/manage-doktor/{{ $psikolog->id }}/edit-jadwal/{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/manage-doktor/{{ $psikolog->id }}/delete-jadwal/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
