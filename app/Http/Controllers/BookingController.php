<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PsikologModel;
use App\Models\SpesialisModel;
use App\Models\BookingModel;
use Carbon\Carbon;


class BookingController extends Controller
{
    public function listPsikolog(Request $request){

        $spesialis = SpesialisModel::all();
        if($request->get('spesialis_id') ){
            $psikologs = PsikologModel::with('jadwal','spesialis')->where('spesialis_id', $request->get('spesialis_id'))->get();
            return view('user.booking.list-psikolog',compact('psikologs'),compact('spesialis'));
        }

        $psikologs = PsikologModel::with('jadwal','spesialis')->get();
        return view('user.booking.list-psikolog',compact('psikologs'),compact('spesialis'));
    }

    public function formBooking($id){    
        $psikolog = PsikologModel::find($id);
        return view('user.booking.form-booking',compact('psikolog'));
    }

    public function storeBooking(Request $request, $id){

        $validate = $request->validate([
            "nama" => "required|string",
            "email" => "required|email",
            "telpon" => "required|numeric",
            "tanggal" => "required|date",
            "jadwal_id" => "required|numeric",
        ]);
        try{
            $booking = new BookingModel();
            $booking->name = $request->nama;
            $booking->email = $request->email;
            $booking->phone = $request->telpon;
            $booking->tanggal = $request->tanggal;
            $booking->jadwal_id = $request->jadwal_id;
            $booking->psikolog_id = $id;
            $booking->user_id = auth()->user()->id;
            $booking->save();

            return redirect()->route("user.my-booking")->with('success', 'Booking berhasil ditambahkan.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function myBooking(Request $request){
        $bookings = BookingModel::with('psikolog.spesialis','jadwal')->where('user_id',auth()->user()->id)->get();
        return view('user.booking.my-booking',compact('bookings'));
    }

    public function destroyBooking($id){
        try{
            $booking = BookingModel::find($id);
            $booking->delete();
            return redirect()->route("user.my-booking")->with('success', 'Booking berhasil dihapus.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
