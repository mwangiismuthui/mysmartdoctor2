<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use DB;
use Session;
use Storage;
use App\User;
use App\Account;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use telesign\sdk\messaging\MessagingClient;

class PatientController extends Controller
{

    public function index(Request $request)
    {
        if (!Helper::authCheck('patient-show')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }

        if (Auth::user()->role == 'patient') {
            $patient = Patient::where('id', Auth::user()->first()->id)->latest()->get();
        } else {
            $patient = Patient::latest()->get();
        }

        Helper::activityStore('Show', 'patient  Show All Record');
        return view('admin.patient.index', compact('patient'));
    }

    public function create()
    {
        if (!Helper::authCheck('patient-create')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        Helper::activityStore('Create', 'patient Add New button clicked');
        return view('admin.patient.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'surname' => 'required',
            'telephone_number' => 'required',
            // 'username' => 'required || unique:users',
            'password' => 'required',
        ]);


        $requestData = $request->all();
//        dd($requestData);
        $permission = DB::table('roles')->where('name', 'patient')->first()->permission;
        $code = mt_rand(5000, 9999);
        $content = 'verify code: ' . $code;
        $mobile_number = $request->telephone_number;
        $this->smsSend($mobile_number, $content);
        $user = User::create([
            'name' => $requestData['first_name'] . ' ' . $requestData['surname'],
            'username' => $requestData['first_name'] . ' ' . $requestData['surname'],
            'code' => $code,
            'mobile_no' => $mobile_number,
            'role' => 'patient',
            'permission' => $permission,
            'password' => Hash::make($code),
        ]);

        if ($request->hasFile('image1')) {
            $requestData['image1'] = $request->file('image1')->storeAS('uploads', rand() . '-' . $request->file('image1')->getClientOriginalName());
            Storage::delete($request->file('oldimage1'));
        }
        if ($request->hasFile('image2')) {
            $requestData['image2'] = $request->file('image2')->storeAS('uploads', rand() . '-' . $request->file('image2')->getClientOriginalName());
            Storage::delete($request->file('oldimage2'));
        }
        if ($request->hasFile('image3')) {
            $requestData['image3'] = $request->file('image3')->storeAS('uploads', rand() . '-' . $request->file('image3')->getClientOriginalName());
            Storage::delete($request->file('oldimage3'));
        }
        if ($request->hasFile('image4')) {
            $requestData['image4'] = $request->file('image4')->storeAS('uploads', rand() . '-' . $request->file('image4')->getClientOriginalName());
            Storage::delete($request->file('oldimage4'));
        }
        if ($request->hasFile('image5')) {
            $requestData['image5'] = $request->file('image5')->storeAS('uploads', rand() . '-' . $request->file('image5')->getClientOriginalName());
            Storage::delete($request->file('oldimage5'));
        }
        if ($request->hasFile('image6')) {
            $requestData['image6'] = $request->file('image6')->storeAS('uploads', rand() . '-' . $request->file('image6')->getClientOriginalName());
            Storage::delete($request->file('oldimage6'));
        }
        if ($request->hasFile('image7')) {
            $requestData['image7'] = $request->file('image7')->storeAS('uploads', rand() . '-' . $request->file('image7')->getClientOriginalName());
            Storage::delete($request->file('oldimage7'));
        }
        if ($request->hasFile('image8')) {
            $requestData['image8'] = $request->file('image8')->storeAS('uploads', rand() . '-' . $request->file('image8')->getClientOriginalName());
            Storage::delete($request->file('oldimage8'));
        }

        if ($request->hasFile('Drugs')) {
            $requestData['Drugs'] = $request->file('Drugs')->storeAS('uploads', rand() . '-' . $request->file('Drugs')->getClientOriginalName());
            Storage::delete($request->file('oldDrugs'));
        }
        if ($request->hasFile('radilogy_views')) {
            $requestData['radilogy_views'] = $request->file('radilogy_views')->storeAS('uploads', rand() . '-' . $request->file('radilogy_views')->getClientOriginalName());
            Storage::delete($request->file('oldradilogy_views'));
        }
        $requestData['user_id'] = $user->id;
        $patient = Patient::create($requestData);
        Account::create([
            'patient_id' => $patient->id,
        ]);
        return redirect('/sms/verify')->with('success', 'Registration Successfull');
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        $patient['user'] = User::findOrFail($patient->user_id);
        Helper::activityStore('Store', 'patient Single Record showed');
        return view('admin.patient.show', compact('patient'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('patient-edit')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $patient = Patient::findOrFail($id);
        $patient['user'] = User::findOrFail($patient->user_id);
        Helper::activityStore('Edit', 'patient Edit button clicked');
        return view('admin.patient.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'surname' => 'required',
            'mobile_no' => 'required',
            'username' => 'required || unique:users',
            'password' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('image1')) {
            $requestData['image1'] = $request->file('image1')->storeAS('uploads', rand() . '-' . $request->file('image1')->getClientOriginalName());
            Storage::delete($request->file('oldimage1'));
        }
        if ($request->hasFile('image2')) {
            $requestData['image2'] = $request->file('image2')->storeAS('uploads', rand() . '-' . $request->file('image2')->getClientOriginalName());
            Storage::delete($request->file('oldimage2'));
        }
        if ($request->hasFile('image3')) {
            $requestData['image3'] = $request->file('image3')->storeAS('uploads', rand() . '-' . $request->file('image3')->getClientOriginalName());
            Storage::delete($request->file('oldimage3'));
        }
        if ($request->hasFile('image4')) {
            $requestData['image4'] = $request->file('image4')->storeAS('uploads', rand() . '-' . $request->file('image4')->getClientOriginalName());
            Storage::delete($request->file('oldimage4'));
        }
        if ($request->hasFile('image5')) {
            $requestData['image5'] = $request->file('image5')->storeAS('uploads', rand() . '-' . $request->file('image5')->getClientOriginalName());
            Storage::delete($request->file('oldimage5'));
        }
        if ($request->hasFile('image6')) {
            $requestData['image6'] = $request->file('image6')->storeAS('uploads', rand() . '-' . $request->file('image6')->getClientOriginalName());
            Storage::delete($request->file('oldimage6'));
        }
        if ($request->hasFile('image7')) {
            $requestData['image7'] = $request->file('image7')->storeAS('uploads', rand() . '-' . $request->file('image7')->getClientOriginalName());
            Storage::delete($request->file('oldimage7'));
        }
        if ($request->hasFile('image8')) {
            $requestData['image8'] = $request->file('image8')->storeAS('uploads', rand() . '-' . $request->file('image8')->getClientOriginalName());
            Storage::delete($request->file('oldimage8'));
        }

        $patient = Patient::findOrFail($id);
        $patient->update($requestData);
        $user = User::findOrFail($patient->user_id);
        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['fname'] = $requestData['first_name'] . ' ' . $requestData['surname'];
        $user->update($requestData);
        Session::flash('success', 'Successfully Updated!');
        Helper::activityStore('Update', 'patient Record Updated');
        return redirect('admin/patient');
    }

    public function destroy($id)
    {
        if (!Helper::authCheck('patient-delete')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        Patient::destroy($id);
        Session::flash('success', 'Successfully Deleted!');
        Helper::activityStore('Delete', 'patient Delete button clicked');
        return redirect('admin/patient');
    }

    public function smsSend($phone_number, $ujumbe)
    {

        $customer_id = "7DA612F0-5D00-46A9-BDBB-775AC3394E4A";
        $api_key = "QQBsG8hhiCZTFo17HMk7VkaKkY1MGAXh4f893McZ4GdFXeSbD8pzZe7ob2jtIv4eiZeg6NrkbSs9ghSE+lE19A==";

        $message = $ujumbe;
        $message_type = "ARN";

        $messaging_client = new MessagingClient($customer_id, $api_key);
        $response = $messaging_client->message($phone_number, $message, $message_type);

        dd($response->json);

//        $sid = "AC7d4002d3e850cb0be7c61501fb310d7f";
//        $token = "3e42f35e62b0c3967f2a23b96f9036c5";
//        $twilio = new Client($sid, $token);
//
//        $message = $twilio->messages
//            ->create($phone_number, // to
//                array(
//                    "from" => "+14159681376",
//                    "body" => $ujumbe
//                )
//            );
//
//        print($message->sid);

    }
}
