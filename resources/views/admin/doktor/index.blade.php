@extends('layouts.admin')

@section('title', 'Manage Dokter')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Manage Dokter</h1>

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

        <!-- Button Tambah Dokter -->
        <div class="mb-3">
            <a href="{{ route('admin.create-doctor') }}" class="btn btn-primary">Tambah Dokter</a>
        </div>

        <!-- Responsive Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Dokter</th>
                        <th>Gambar</th>
                        <th>Lulusan</th>
                        <th>Tahun Lulus</th>
                        <th>Spesialis</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dokter)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dokter->dokter }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $dokter->gambar) }}" alt="Dokter" class="img-thumbnail" style="width: 100px;">
                        </td>
                        <td>{{ $dokter->lulusan }}</td>
                        <td>{{ $dokter->tahun_lulus }}</td>
                        <td>{{ $dokter->spesialis->spesialis }}</td>
                        <td>
                            <a href="{{ route('admin.edit-doctor', $dokter->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/delete-doctor/{{ $dokter->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
@endsection
