<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use Storage;
use PDF;

use App\Chat;
use App\Prescription;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('prescription-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (Auth::user()->role == 'patient') {
            $prescription = Prescription::where('patient_id',Auth::user()->patient->id)
                ->latest()->get();
        } elseif(Auth::user()->role == 'doctor') {
            $prescription = Prescription::where('doctor_id',Auth::user()->doctor->id)
            ->latest()->get();
        }
        Helper::activityStore('Show','prescription  Show All Record');
        return view('admin.prescription.index', compact('prescription'));
    }


    public function create()
    {
        if (!Helper::authCheck('prescription-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','prescription Add New button clicked');
        return view('admin.prescription.create');
    }

    public function print_prescription(Request $request){
        $page = $request->post();

        $prescription = PDF::loadHTML($page['doc'])->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');
        return $prescription->download('prescription.pdf');
    }


    public function store(Request $request)
    {
        // dd($request->all());

        // $this->validate($request, [
		// 	'prescription' => 'required'
		// ]);
        $requestData = $request->all();
        if ($request->hasFile('prescription')) {
            $requestData['prescription'] = $request->file('prescription')
                ->store('uploads', 'public');
        }
       $info =  Prescription::create($requestData);
        $data =[];
        if ($request->save_send == 'SAVE & SEND') {
            $data['from'] = Auth::user()->id;
            $data['to'] = $request->patient_id;
            $address = url('admin/prescription/'.$info->id);
            // Chat::create($data);
            $html = '<a href='.$address.'>prescription click here for download and show</a>';
            $data['content'] = $html;
            Chat::create($data);
         }
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','prescription Record Saved');
        // return redirect('admin/prescription');
        return redirect()->back();

    }


    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);
        Helper::activityStore('Store','prescription Single Record showed');
        return view('admin.prescription.show', compact('prescription'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('prescription-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $prescription = Prescription::findOrFail($id);
        Helper::activityStore('Edit','prescription Edit button clicked');
        return view('admin.prescription.edit', compact('prescription'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'prescription' => 'required'
		]);
        $requestData = $request->all();

        $prescription = Prescription::findOrFail($id);
        $prescription->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','prescription Record Updated');
        return redirect()->back();
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('prescription-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Prescription::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','prescription Delete button clicked');
        return redirect('admin/prescription');
    }
}

