@extends('user.layouts-user.app')  <!-- Menggunakan layout utama -->

@section('title', 'Daftar Artikel')  <!-- Menentukan judul halaman -->

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Artikel</h1>
    <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary btn-tambah">Tambah artikel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artikel as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ Str::limit($item->isi, 50) }}</td>
                <td>
                    <a href="{{ route('admin.artikel.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('admin.artikel.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
