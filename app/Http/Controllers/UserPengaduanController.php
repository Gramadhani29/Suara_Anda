<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class UserPengaduanController extends Controller
{
    /**
     * Menampilkan form pelaporan.
     */
    public function create()
    {
        return view('user.pengaduan.create');
    }

    /**
     * Menyimpan laporan ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan laporan ke database
        Pengaduan::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'kategori' => $validated['kategori'],
            'lokasi' => $validated['lokasi'],
            'gambar' => $request->hasFile('gambar') ? $request->gambar->store('laporan', 'public') : null,
            'status' => 'menunggu konfirmasi', // Status default
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim! Status: Menunggu konfirmasi.');
    }

    /**
     * Menampilkan detail laporan.
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('user.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Menampilkan daftar laporan pengguna.
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())->get();
        return view('user.pengaduan.index', compact('pengaduan'));
    }

    /**
     * Menghapus laporan.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('laporan.index')->with('success', 'Pengaduan berhasil dihapus');
    }

    /**
     * Menampilkan form edit laporan.
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('user.pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Memperbarui laporan.
     */
    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Perbarui data laporan
        $pengaduan->update([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'kategori' => $validated['kategori'],
            'lokasi' => $validated['lokasi'],
            'gambar' => $request->hasFile('gambar') ? $request->gambar->store('laporan', 'public') : $pengaduan->gambar,
        ]);

        return redirect()->route('laporan.show', $pengaduan->id)
            ->with('success', 'Pengaduan berhasil diperbarui!');
    }
}
