<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpesialisModel;
use App\Models\DoktorModel;
use Illuminate\Support\Facades\Storage;

class DoktorController extends Controller
{
    public function index()
    {
        $data = DoktorModel::with('spesialis')->paginate(12);
        return view('admin.doktor.index', compact('data'));
    }

    public function create()
    {
        try{
            $spesialis = SpesialisModel::all();
            return view('admin.doktor.form-doktor', [
                "spesialis" => $spesialis,
                "id" => null
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'dokter' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'spesialis_id' => 'required',
            'lulusan' => 'required',
            'tahun_lulus' => 'required|numeric|min:1900|max:' . date('Y'),
        ]);
        try {
            $dokter = new DoktorModel;

            // Simpan nama dokter
            $dokter->dokter = $request->dokter;

            // Simpan file gambar dengan nama random
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('doktor', $fileName, 'public');
                $dokter->gambar = $filePath; // Simpan path gambar
            }

            $dokter->spesialis_id = $request->spesialis_id;
            $dokter->lulusan = $request->lulusan;
            $dokter->tahun_lulus = $request->tahun_lulus;

            $dokter->save();

            return redirect()->route('admin.manage-doctor')->with('success', 'Dokter berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {

        try{
            $doktor = DoktorModel::find($id);
            $spesialis = SpesialisModel::all();
            return view('admin.doktor.form-doktor', [
                "spesialis" => $spesialis,
                "dokter" => $doktor,
                "id" => $id
            ]);

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'dokter' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'spesialis_id' => 'required',
            'lulusan' => 'required',
            'tahun_lulus' => 'required|numeric|min:1900|max:' . date('Y'),
        ]);

        try {
            $dokter = DoktorModel::find($id);

            // Simpan nama dokter
            $dokter->dokter = $request->dokter;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('doktor', $fileName, 'public');
                $dokter->gambar = $filePath; // Simpan path gambar
                Storage::disk('public')->delete($request->old_gambar);
            }

            $dokter->spesialis_id = $request->spesialis_id;
            $dokter->lulusan = $request->lulusan;
            $dokter->tahun_lulus = $request->tahun_lulus;

            $dokter->save();

            return redirect()->route('admin.manage-doctor')->with('success', 'Dokter berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function destroy($id)
    {
        try {
            $dokter = DoktorModel::find($id);
              // Periksa apakah gambar ada dan hapus dari storage
            if ($dokter->gambar) {
                Storage::disk('public')->delete($dokter->gambar);
            }
            $dokter->delete();
            return redirect()->route('admin.manage-doctor')->with('success', 'Dokter berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



}
