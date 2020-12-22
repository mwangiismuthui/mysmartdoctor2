<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class BookingInvoiceController extends Controller
{
    public function index(Request $request)
    {
        

        if (Auth::user()->role == 'doctor') {
            $booking = Booking::where('doctor_id', Auth::user()->doctor->id)->latest()->get();
        } 
        elseif (Auth::user()->role == 'patient') {
            $booking = Booking::where('patient_id', Auth::user()->patient->id)->latest()->get();
        } 
        else {
            $booking = Booking::latest()->get();
        }

        
        return view('admin.booking-invoice.index', compact('booking'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking-invoice.show', compact('booking'));
    }
}