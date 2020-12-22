<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use Storage;
use App\Medication;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MedicationController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('medication-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $medication = Medication::where('medication', 'LIKE', "%$keyword%")
        //         ->orWhere('patient_id', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $medication = Medication::latest()->paginate($perPage);
        // }

        if (Auth::user()->role == 'patient') {
            $medication = Medication::where('patient_id', Auth::user()->first()->id)->latest()->get();
        } else {
            $medication = Medication::latest()->get();

        }
        Helper::activityStore('Show','medication  Show All Record');
        return view('admin.medication.index', compact('medication'));
    }


    public function create()
    {
        if (!Helper::authCheck('medication-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','medication Add New button clicked');
        return view('admin.medication.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'medication' => 'required'
		]);
        $requestData = $request->all();
        $requestData["patient_id"] =  Auth::user()->first()->id;
        if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
            if($request->oldfile){
                Storage::delete($request->oldfile);
            }
        }
        Medication::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','medication Record Saved');
        return redirect('admin/medication');
    }


    public function show($id)
    {
        $medication = Medication::findOrFail($id);
        Helper::activityStore('Store','medication Single Record showed');
        return view('admin.medication.show', compact('medication'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('medication-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $medication = Medication::findOrFail($id);
        Helper::activityStore('Edit','medication Edit button clicked');
        return view('admin.medication.edit', compact('medication'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'medication' => 'required'
			// 'patient_id' => 'required'
		]);
        $requestData = $request->all();
        $requestData["patient_id"] =  Auth::user()->first()->id;
        if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
            if($request->oldfile){
                Storage::delete($request->oldfile);
            }
        }
        $medication = Medication::findOrFail($id);
        $medication->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','medication Record Updated');
        return redirect('admin/medication');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('medication-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Medication::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','medication Delete button clicked');
        return redirect('admin/medication');
    }
}
