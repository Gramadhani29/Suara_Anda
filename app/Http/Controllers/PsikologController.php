<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpesialisModel;
use App\Models\PsikologModel;
use Illuminate\Support\Facades\Storage;

class PsikologController extends Controller
{
    public function index()
    {
        $data = PsikologModel::with('spesialis')->get();
        return view('admin.psikolog.index', compact('data'));
    }

    public function create()
    {
        try{
            $spesialis = SpesialisModel::all();
            return view('admin.psikolog.form-psikolog', [
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
            'psikolog' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'spesialis_id' => 'required',
            'lulusan' => 'required',
            'tahun_lulus' => 'required|numeric|min:1900|max:' . date('Y'),
        ]);
        try {
            $psikolog = new PsikologModel;

            // Simpan nama psikolog
            $psikolog->psikolog = $request->psikolog;

            // Simpan file gambar dengan nama random
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('psikolog', $fileName, 'public');
                $psikolog->gambar = $filePath; // Simpan path gambar
            }

            $psikolog->spesialis_id = $request->spesialis_id;
            $psikolog->lulusan = $request->lulusan;
            $psikolog->tahun_lulus = $request->tahun_lulus;

            $psikolog->save();

            return redirect()->route('admin.manage-psikolog')->with('success', 'Psikolog berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {

        try{
            $psikolog = PsikologModel::find($id);
            $spesialis = SpesialisModel::all();
            return view('admin.psikolog.form-psikolog', [
                "spesialis" => $spesialis,
                "psikolog" => $psikolog,
                "id" => $id
            ]);

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'psikolog' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'spesialis_id' => 'required',
            'lulusan' => 'required',
            'tahun_lulus' => 'required|numeric|min:1900|max:' . date('Y'),
        ]);

        try {
            $psikolog = PsikologModel::find($id);

            // Simpan nama psikolog
            $psikolog->psikolog = $request->psikolog;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('psikolog', $fileName, 'public');
                $psikolog->gambar = $filePath; // Simpan path gambar
                Storage::disk('public')->delete($request->old_gambar);
            }

            $psikolog->spesialis_id = $request->spesialis_id;
            $psikolog->lulusan = $request->lulusan;
            $psikolog->tahun_lulus = $request->tahun_lulus;

            $psikolog->save();

            return redirect()->route('admin.manage-psikolog')->with('success', 'psikolog berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function destroy($id)
    {
        try {
            $psikolog = PsikologModel::find($id);
              // Periksa apakah gambar ada dan hapus dari storage
            if ($psikolog->gambar) {
                Storage::disk('public')->delete($psikolog->gambar);
            }
            $psikolog->delete();
            return redirect()->route('admin.manage-psikolog')->with('success', 'psikolog berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
