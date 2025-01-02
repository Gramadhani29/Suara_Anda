@extends('user.layouts-user.app') <!-- Menggunakan layout sidebar yang Anda miliki -->

@section('content')
<div class="container mx-auto px-4">
    <div class="d-flex justify-content-between align-items-center mb-6">
        <h1 class="h3">Daftar Laporan</h1>
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">
            Tambah Laporan
        </a>
    </div>

    @if($pengaduan->isEmpty())
        <p class="text-muted">Belum ada laporan yang dibuat.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr class="table-light">
                    <th class="text-left">Judul</th>
                    <th class="text-left">Isi</th>
                    <th class="text-center">Status Laporan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengaduan as $laporan)
                <tr>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ Str::limit($laporan->deskripsi, 50, '...') }}</td>
                    <td class="text-center">
                        @if($laporan->status === 'menunggu konfirmasi')
                            <span class="badge bg-info">Menunggu konfirmasi</span>
                        @elseif($laporan->status === 'telah dikonfirmasi')
                            <span class="badge bg-warning">Telah dikonfirmasi</span>
                        @elseif($laporan->status === 'dalam proses')
                            <span class="badge bg-secondary">Dalam proses</span>
                        @elseif($laporan->status === 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @elseif($laporan->status === 'diterima')
                            <span class="badge bg-success">Diterima</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
