<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingModel;
use PDF;

class PDFController extends Controller
{
    public function generateMyBookings(Request $request){
        try{

            $id = $request->id;
            $bookings = BookingModel::with('psikolog.spesialis','jadwal')->where('user_id',auth()->user()->id)->where("id",$id)->first();
            $pdf = PDF::loadView('template.pdf.my-booking',compact('bookings'));
            return $pdf->download('my-booking.pdf');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
