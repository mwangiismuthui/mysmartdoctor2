<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use Storage;
use App\LabReport;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LabReportController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('labreport-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $labreport = LabReport::where('report_name', 'LIKE', "%$keyword%")
        //         ->orWhere('file', 'LIKE', "%$keyword%")
        //         ->orWhere('patient_id', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $labreport = LabReport::latest()->paginate($perPage);
        // }
        if (Auth::user()->role == 'patient') {
            $labreport = LabReport::where('patient_id', Auth::user()->first()->id)->latest()->get();
        } else {
            $labreport = LabReport::latest()->get();
        }
        Helper::activityStore('Show','labreport  Show All Record');
        return view('admin.lab-report.index', compact('labreport'));
    }


    public function create()
    {
        if (!Helper::authCheck('labreport-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','labreport Add New button clicked');
        return view('admin.lab-report.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'report_name' => 'required',
			'file' => 'required',
			// 'patient_id' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
            if($request->oldfile){
                Storage::delete($request->oldfile);
            }
        }
        $requestData["patient_id"] =  Auth::user()->first()->id;
        LabReport::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','labreport Record Saved');
        return redirect('admin/lab-report');
    }


    public function show($id)
    {
        $labreport = LabReport::findOrFail($id);
        Helper::activityStore('Store','labreport Single Record showed');
        return view('admin.lab-report.show', compact('labreport'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('labreport-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $labreport = LabReport::findOrFail($id);
        Helper::activityStore('Edit','labreport Edit button clicked');
        return view('admin.lab-report.edit', compact('labreport'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'report_name' => 'required',
			'file' => 'required',
			// 'patient_id' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
            if($request->oldfile){
                Storage::delete($request->oldfile);
            }
        }
        $requestData["patient_id"] =  Auth::user()->first()->id;
        $labreport = LabReport::findOrFail($id);
        $labreport->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','labreport Record Updated');
        return redirect('admin/lab-report');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('labreport-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        LabReport::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','labreport Delete button clicked');
        return redirect('admin/lab-report');
    }
}