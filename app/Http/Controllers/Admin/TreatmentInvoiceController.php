<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\TreatmentInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TreatmentInvoiceController extends Controller
{
    public function index(Request $request)
    {
         
        if (Auth::user()->role == 'patient') {
            $treatmentinformation = TreatmentInformation::where('patient_id', Auth::user()->patient->id)->latest()->get();
        } elseif (Auth::user()->role == 'doctor') {
            $treatmentinformation = TreatmentInformation::where('doctor_id', Auth::user()->doctor->id)->latest()->get();
          
        } else {
            $treatmentinformation = TreatmentInformation::latest()->get();
        }
        
        return view('admin.treatment-invoice.index', compact('treatmentinformation'));
    }
    public function show($id)
    {
        $treatmentinformation = TreatmentInformation::findOrFail($id); 
        return view('admin.treatment-invoice.show', compact('treatmentinformation'));
    }
}