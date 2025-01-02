@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pengaduan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengaduan as $laporan)
                <tr>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ Str::limit($laporan->deskripsi, 50) }}</td>
                    <td>
                        <form action="{{ route('admin.pengaduan.updateStatus', $laporan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="menunggu konfirmasi" {{ $laporan->status == 'menunggu konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                <option value="telah dikonfirmasi" {{ $laporan->status == 'telah dikonfirmasi' ? 'selected' : '' }}>Telah Dikonfirmasi</option>
                                <option value="dalam proses" {{ $laporan->status == 'dalam proses' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="ditolak" {{ $laporan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                <option value="diterima" {{ $laporan->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
