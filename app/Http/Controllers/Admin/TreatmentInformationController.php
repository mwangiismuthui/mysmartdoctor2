<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Helper;
use Session;
use Illuminate\Http\Request;
use App\TreatmentInformation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TreatmentInformationController extends Controller
{

    public function index(Request $request)
    {
        if (!Helper::authCheck('treatmentinformation-show')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        if (Auth::user()->role == 'patient') {
            $treatmentinformation = TreatmentInformation::where('patient_id', Auth::user()->patient->first()->id)->latest()->get();
        } elseif (Auth::user()->role == 'doctor') {
            $treatmentinformation = TreatmentInformation::where('doctor_id', Auth::user()->doctor->first()->id)->latest()->get();
            // dd($treatmentinformation);
        } else {
            $treatmentinformation = TreatmentInformation::latest()->get();
        }
        Helper::activityStore('Show', 'treatmentinformation  Show All Record');
        return view('admin.treatment-information.index', compact('treatmentinformation'));
    }

    public function create()
    {
        if (!Helper::authCheck('treatmentinformation-create')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        Helper::activityStore('Create', 'treatmentinformation Add New button clicked');
        return view('admin.treatment-information.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'treatment' => 'required',
            'time' => 'required',
            'cost' => 'required',
            'total_paid' => 'required',
            'balance' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['doctor_id'] = Auth::user()->doctor->first()->id;
        $data = TreatmentInformation::create($requestData);
        Session::flash('success', 'Successfully Saved!');
        Helper::activityStore('Store', 'treatmentinformation Record Saved');
        return redirect('admin/treatment-information/' . $data->id);
    }

    public function show($id)
    {
        $treatmentinformation = TreatmentInformation::findOrFail($id);
        Helper::activityStore('Store', 'treatmentinformation Single Record showed');
        return view('admin.treatment-information.show', compact('treatmentinformation'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('treatmentinformation-edit')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        $treatmentinformation = TreatmentInformation::findOrFail($id);
        Helper::activityStore('Edit', 'treatmentinformation Edit button clicked');
        return view('admin.treatment-information.edit', compact('treatmentinformation'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'treatment' => 'required',
            'time' => 'required',
            'cost' => 'required',
            'total_paid' => 'required',
            'balance' => 'required',
        ]);
        $requestData = $request->all();

        $treatmentinformation = TreatmentInformation::findOrFail($id);
        $treatmentinformation->update($requestData);
        Session::flash('success', 'Successfully Updated!');
        Helper::activityStore('Update', 'treatmentinformation Record Updated');
        return redirect('admin/treatment-information');
    }

    public function destroy($id)
    {
        if (!Helper::authCheck('treatmentinformation-delete')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        TreatmentInformation::destroy($id);
        Session::flash('success', 'Successfully Deleted!');
        Helper::activityStore('Delete', 'treatmentinformation Delete button clicked');
        return redirect('admin/treatment-information');
    }
    public function addNewTreatment(Request $request)
    {
        $requestData = $request->except('_token');
        DB::table('treatments')->insert([$requestData]); 
        return redirect()->back();
    }
}