<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login'); // Redirect to login if user is not authenticated
        }
        return view('user.dashboard');
    }

    public function artikel(){
        $artikel = Artikel::all();
        return view('user.artikel.index', compact('artikel'));
    }

    public function artikeldetail($id)
    {
        // Mengambil artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id); // Akan menghasilkan 404 jika artikel tidak ditemukan
        return view('user.artikel.show', compact('artikel'));
    }
}