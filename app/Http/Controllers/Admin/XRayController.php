<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use Storage;
use App\XRay;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class XRayController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('xray-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $xray = XRay::where('name', 'LIKE', "%$keyword%")
        //         ->orWhere('file', 'LIKE', "%$keyword%")
        //         ->orWhere('patient_id', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $xray = XRay::latest()->paginate($perPage);
        // }
        if (Auth::user()->role == 'patient') {
            $xray = XRay::where('patient_id', Auth::user()->first()->id)->latest()->get();
        } else {
            $xray = XRay::latest()->get();
        }
        Helper::activityStore('Show','xray  Show All Record');
        return view('admin.x-ray.index', compact('xray'));
    }


    public function create()
    {
        if (!Helper::authCheck('xray-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','xray Add New button clicked');
        return view('admin.x-ray.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'file' => 'required',
			// 'patient_id' => 'required'
		]);
        $requestData = $request->all();
        // dd($requestData['file']);
        $requestData["patient_id"] =  Auth::user()->first()->id;

                if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
            if($request->oldfile){
                Storage::delete($request->oldfile);
            }
        }

        XRay::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','xray Record Saved');
        return redirect('admin/x-ray');
    }


    public function show($id)
    {
        $xray = XRay::findOrFail($id);
        Helper::activityStore('Store','xray Single Record showed');
        return view('admin.x-ray.show', compact('xray'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('xray-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $xray = XRay::findOrFail($id);
        Helper::activityStore('Edit','xray Edit button clicked');
        return view('admin.x-ray.edit', compact('xray'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
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

        $xray = XRay::findOrFail($id);
        $xray->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','xray Record Updated');
        return redirect('admin/x-ray');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('xray-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        XRay::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','xray Delete button clicked');
        return redirect('admin/x-ray');
    }
}