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
                        <th>Psikolog</th>
                        <th>Gambar</th>
                        <th>Lulusan</th>
                        <th>Tahun Lulus</th>
                        <th>Spesialis</th>
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
                        <td>{{ $psikolog->lulusan }}</td>
                        <td>{{ $psikolog->tahun_lulus }}</td>
                        <td>{{ $psikolog->spesialis->spesialis }}</td>
                        <td>
                            <a href="{{ route('admin.edit-psikolog', $psikolog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/delete-psikolog/{{ $psikolog->id }}" method="POST">
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
