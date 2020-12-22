<?php

namespace App\Http\Controllers\Admin;

use DB;
use Helper;
use Session;
use Storage;
use App\User;
use App\Doctor;
use App\Account;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class DoctorController extends Controller
{

    public function index(Request $request)
    {
        if (!Helper::authCheck('doctor-show')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $doctor = Doctor::where('given_name', 'LIKE', "%$keyword%")
                ->orWhere('family_name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('languages_spoken', 'LIKE', "%$keyword%")
                ->orWhere('education', 'LIKE', "%$keyword%")
                ->orWhere('mobile_no', 'LIKE', "%$keyword%")
                ->orWhere('alternative_mobile_no', 'LIKE', "%$keyword%")
                ->orWhere('private_practice_address', 'LIKE', "%$keyword%")
                ->orWhere('qualification', 'LIKE', "%$keyword%")
                ->orWhere('professional_experiences', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doctor = Doctor::latest()->paginate($perPage);
        }
        Helper::activityStore('Show', 'doctor  Show All Record');
        return view('admin.doctor.index', compact('doctor'));
    }

    public function create()
    {
        if (!Helper::authCheck('doctor-create')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        Helper::activityStore('Create', 'doctor Add New button clicked');
        return view('admin.doctor.create');
    }

    public function store(Request $request)
    {
    //     $this->validate($request, [
    //         // 'given_name' => 'required',
    //         // 'family_name' => 'required',
    //         // 'username' => 'required || unique:users',
    //         // 'languages_spoken' => 'required',
    //         // 'education' => 'required',
    //         'mobile_no' => 'required',
    //         // 'alternative_mobile_no' => 'required',
    //         // 'private_practice_address' => 'required',
    //         // 'qualification' => 'required',
    //         // 'professional_experiences' => 'required',
    //         // 'patient_number' => 'required',
    //         // 'location' => 'required',
    //         // 'specialization' => 'required',
    //     ]);
        $requestData = $request->all();

        // dd($requestData );
        $permission = DB::table('roles')->where('name', 'doctor')->first()->permission;
        // dd($requestData);
        $code = mt_rand(5000,9999);
        $content = 'verify code: '.$code;
        $mobile_number = $request->alternative_mobile_no;
// dd($mobile_number);
        $this->smsSend($mobile_number, $content);
        $user = User::create([
            'name' => $requestData['given_name'],
            'username' => $requestData['given_name'],
            'role' => 'doctor',
            'code' => $code,
            'mobile_no' => $mobile_number,
            'permission' => $permission,
            'password' => Hash::make($code),
        ]);
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')->storeAS('uploads', rand() . '-' . $request->file('image')->getClientOriginalName());
            Storage::delete($request->file('oldimage'));
        }
        if ($request->hasFile('signature')) {
            $requestData['signature'] = $request->file('signature')->storeAS('uploads', rand() . '-' . $request->file('signature')->getClientOriginalName());
            Storage::delete($request->file('oldsignature'));
        }
        $requestData['user_id'] = $user->id;
        $doctor = Doctor::create($requestData);

        Account::create([
            'doctor_id' => $doctor->id,
        ]);
        return redirect('/sms/verify')->with('success', 'Registration Successfull');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor['user'] = User::findOrFail($doctor->user_id);
        Helper::activityStore('Store', 'doctor Single Record showed');
        return view('admin.doctor.show', compact('doctor'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('doctor-edit')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        $doctor = Doctor::findOrFail($id);
        Helper::activityStore('Edit', 'doctor Edit button clicked');
        return view('admin.doctor.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'given_name' => 'required',
            // 'family_name' => 'required',
            // 'languages_spoken' => 'required',
            // 'education' => 'required',
            'mobile_no' => 'required',
            // 'alternative_mobile_no' => 'required',
            // 'private_practice_address' => 'required',
            // 'qualification' => 'required',
            // 'professional_experiences' => 'required',
            // 'patient_number' => 'required',
            // 'location' => 'required',
            // 'specialization' => 'required',
        ]);
        $requestData = $request->all();
// dd($requestData);


        $imgdestination = '/storage/uploads/';
        if ($request->hasFile('image')) {
            $sliderimages = $request->file('image');
            $imgname = $this->generateUniqueFileName($sliderimages, $imgdestination);
    $requestData['image'] = $imgname;
    if($request->oldimage){
        Storage::delete($request->file('oldimage'));
    }
}
        if ($request->hasFile('signature')) {
            $sliderimages = $request->file('signature');
            $imgname = $this->generateUniqueFileName($sliderimages, $imgdestination);
    $requestData['signature'] = $imgname;

    Storage::delete($request->file('oldsignature'));
}



        $doctor = Doctor::findOrFail($id);
        $doctor->update($requestData);

        $user = User::findOrFail($doctor->user_id);
        $requestData['name'] = $requestData['given_name'];
        $requestData['username'] = $requestData['username'];
        $requestData['password'] = Hash::make($requestData['password']);
        $user->update($requestData);
        Session::flash('success', 'Successfully Updated!');
        Helper::activityStore('Update', 'doctor Record Updated');
        return redirect('admin/doctor');
    }

    public function destroy($id)
    {
        if (!Helper::authCheck('doctor-delete')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        Doctor::destroy($id);
        Session::flash('success', 'Successfully Deleted!');
        Helper::activityStore('Delete', 'doctor Delete button clicked');
        return redirect('admin/doctor');
    }
    public function generateUniqueFileName($image, $destinationPath)
    { $str = Str::random();
        $initial = "smartdoctor";
        $name = $initial. $str . time() . '.' . $image->getClientOriginalExtension();
        if ($image->move(public_path() . $destinationPath, $name)) {
            return $name;
        } else {
            return null;
        }
    }
    public function smsSend($phone_number, $ujumbe)
    {

        // dd($phone_number);
        $sid = "AC7d4002d3e850cb0be7c61501fb310d7f";
        $token = "3e42f35e62b0c3967f2a23b96f9036c5";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create($phone_number,
                array(
                    "from" => "+14159681376",
                    "body" => $ujumbe
                )
            );


    }
}
