<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use Storage;
use App\Http\Requests;
use App\DoctorAvailable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorAvailableController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('doctoravailable-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $doctoravailable = DoctorAvailable::where('doctor_id',Auth::user()->id)->where('starting_time', 'LIKE', "%$keyword%")
                ->orWhere('ending_time', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('doctor_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doctoravailable = DoctorAvailable::where('doctor_id',Auth::user()->id)->latest()->paginate($perPage);
        }

        Helper::activityStore('Show','doctoravailable  Show All Record');

        return view('admin.doctor-available.index', compact('doctoravailable'));
    }


    public function create()
    {
        if (!Helper::authCheck('doctoravailable-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','doctoravailable Add New button clicked');
        return view('admin.doctor-available.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'date' => 'required',
			'option' => 'required'
        ]);
        // dd($request->date);
        $count = count($request->option);
        for ($i=0; $i < $count; $i++) {
            if ($request->option[$i]=='on') {
                $check = DoctorAvailable::where('date', $request->date)->where('starting_time',$request->starting_time[$i])->first();
                // dd($check);
                if (empty($check)) {
                    $doctor = new DoctorAvailable;
                    $doctor->starting_time = $request->starting_time[$i];
                    $doctor->ending_time = $request->ending_time[$i];
                    $doctor->date = $request->date;
                    $doctor->doctor_id = Auth::user()->doctor->id;
                    $doctor->save();
                    Session::flash('success','Successfully Saved!');
                }else{
                    Session::flash('error','Select unique time for each date');
                    return redirect()->back();
                }
            }

        }
        Helper::activityStore('Store','doctoravailable Record Saved');
        return redirect('admin/doctor-available');
    }


    public function show($id)
    {
        $doctoravailable = DoctorAvailable::findOrFail($id);
        Helper::activityStore('Store','doctoravailable Single Record showed');
        return view('admin.doctor-available.show', compact('doctoravailable'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('doctoravailable-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $doctoravailable = DoctorAvailable::findOrFail($id);
        Helper::activityStore('Edit','doctoravailable Edit button clicked');
        return view('admin.doctor-available.edit', compact('doctoravailable'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $doctoravailable = DoctorAvailable::findOrFail($id);
        $doctoravailable->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','doctoravailable Record Updated');
        return redirect('admin/doctor-available');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('doctoravailable-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        DoctorAvailable::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','doctoravailable Delete button clicked');
        return redirect('admin/doctor-available');
    }
}
