<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PsikologModel;
use App\Models\JadwalModel;

class JadwalController extends Controller
{
    public function index($id)
    {
        $psikolog = PsikologModel::with('jadwal')->find($id);
        return view('admin.jadwal.index',[
            'psikolog' => $psikolog,
        ]);
    }

    public function create($id)
    {
        return view('admin.jadwal.form-jadwal',[
            "idPsikolog" => $id,
            "idJadwal" => null
        ]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required|numeric|min:0|max:23',
            'menit_mulai' => 'required|numeric|min:0|max:59',
            'jam_selesai' => 'required|numeric|min:0|max:23',
            'menit_selesai' => 'required|numeric|min:0|max:59',
        ]);
        try{
            $jadwal = new JadwalModel;
            $jadwal->psikolog_id = $id;
            $jadwal->hari = $request->hari;
            $jadwal->jam_mulai = $request->jam_mulai.":".$request->menit_mulai;
            $jadwal->jam_selesai = $request->jam_selesai.":".$request->menit_selesai;
            $jadwal->save();
    
            return redirect()->route('admin.manage-jadwal', $id)->with('success', 'Jadwal berhasil ditambahkan.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function edit($id,$id_jadwal)
    {
        $jadwal = JadwalModel::find($id_jadwal);
        return view('admin.jadwal.form-jadwal',[
            "idPsikolog" => $id,
            "idJadwal" => $id_jadwal,
            'jadwal' => $jadwal
        ]);
    }

    public function update(Request $request, $id,$id_jadwal)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required|numeric|min:0|max:23',
            'menit_mulai' => 'required|numeric|min:0|max:59',
            'jam_selesai' => 'required|numeric|min:0|max:23',
            'menit_selesai' => 'required|numeric|min:0|max:59',
        ]);
        try{
            $jadwal = JadwalModel::find($id_jadwal);
            $jadwal->hari = $request->hari;
            $jadwal->jam_mulai = $request->jam_mulai.":".$request->menit_mulai;
            $jadwal->jam_selesai = $request->jam_selesai.":".$request->menit_selesai;
            $jadwal->save();
    
            return redirect()->route('admin.manage-jadwal', $id)->with('success', 'Jadwal berhasil diupdate.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id,$id_jadwal)
    {
        try{
            $jadwal = JadwalModel::find($id_jadwal);
            $jadwal->delete();
            return redirect()->back()->with('success', 'Jadwal berhasil dihapus.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
