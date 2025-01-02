<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(){
        return view ('admin.dashboard');
    }
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.index', compact('artikel'));
    }

    public function create()
    {
        $nav = 'Tambah Artikel';
        return view('admin.artikel.create', compact('nav'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Menyimpan artikel baru
        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $request->gambar->store('artikel', 'public'),
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        // Update artikel
        $artikel->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $request->hasFile('gambar') ? $request->gambar->store('artikel', 'public') : $artikel->gambar,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
