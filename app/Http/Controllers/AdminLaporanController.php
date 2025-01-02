<?php
namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    // Menampilkan daftar pengaduan
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    // Mengupdate status pengaduan
    public function updateStatus(Request $request, $id)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:menunggu konfirmasi,telah dikonfirmasi,dalam proses,ditolak,diterima'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->route('admin.pengaduan.index')->with('success', 'Status pengaduan berhasil diperbarui');
    }
}
