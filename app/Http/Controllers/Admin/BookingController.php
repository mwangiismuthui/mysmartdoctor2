<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Helper;
use Session;
use App\XRay;
use App\Booking;
use App\BookingFee;
use App\LabReport;
use App\Medication;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        if (!Helper::authCheck('booking-show')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}

        if (Auth::user()->role == 'doctor') {
            $booking = Booking::where('time','!=',null)->where('doctor_id', Auth::user()->doctor->first()->id)->latest()->get();
        }
        elseif (Auth::user()->role == 'patient') {
            $booking = Booking::where('time','!=',null)->where('patient_id', Auth::user()->patient->first()->id)->latest()->get();
        }
         else {
            $booking = Booking::where('time','!=',null)->latest()->get();
        }

        Helper::activityStore('Show', 'booking  Show All Record');
        return view('admin.booking.index', compact('booking'));
    }

    public function viewBydoctorXray($id)
    {
        $xray = XRay::where('patient_id',$id)->get();
        return view('admin.x-ray.index', compact('xray'));

    }
    public function viewBydoctorLabreport($id)
    {
        $labreport = LabReport::where('patient_id',$id)->get();
        return view('admin.lab-report.index', compact('labreport'));

    }
    public function viewBydoctorMedication($id)
    {
        $medication = Medication::where('patient_id',$id)->get();
        return view('admin.medication.index', compact('medication'));

    }

    //doctor upcoming booking where they not set time
    public function upcoming(Request $request)
    {
        if (!Helper::authCheck('booking-show')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}

        if (Auth::user()->role == 'doctor') {
            $booking = Booking::where('doctor_id', Auth::user()->doctor->first()->id)->where('time',null)->latest()->get();
        }
        elseif (Auth::user()->role == 'patient') {
            $booking = Booking::where('patient_id', Auth::user()->patient->first()->id)->where('time',null)->latest()->get();
        }
        else {
            $booking = Booking::where('time',null)->latest()->get();
        }

        Helper::activityStore('Show', 'booking  Show All Record');
        return view('admin.booking.index', compact('booking'));
    }

    public function create()
    {
        if (!Helper::authCheck('booking-create')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        Helper::activityStore('Create', 'booking Add New button clicked');
        return view('admin.booking.create');
    }

    public function store(Request $request)
    {


        $starting_time = $_GET['starting_time'];
        $ending_time = $_GET['ending_time'];
        $date = $_GET['date'];
        $doctor_id = $_GET['doctor_id'];
        $id = $_GET['id'];


        $booking = Booking::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->latest()->first();
        if ($booking) {
            $booking_no = $booking->booking_no + 1;
        } else {
            $booking_no = 1;
        }
        $data = Booking::create([
           'date'=>$date,
           'time'=>$starting_time,
           'patient_id'=>Auth::user()->patient->id,
           'doctor_id'=>$doctor_id,
           'booking_no'=>$booking_no,
           'video_call_url'=>'room/join/'.Str::random(40)
        ]);
        DB::table('doctor_availables')->where('id',$id)->update(['status'=>'booked']);
        // $requestData['video_call_url'] = 'room/join/'.Str::random(40);
        // $booking = Booking::findOrFail($id);
        // $booking->update($requestData);

        // $this->validate($request, [
        //     // 'patient_id' => 'required',
        //     'doctor_id' => 'required',
        //     'date' => 'required',
        // ]);

        // $validation = Booking::where('doctor_id', $request->doctor_id)
        //     ->where('date', $request->date)->where('patient_id', Auth::user()->patient->first()->id)->first();
        // if ($validation) {
        //     return redirect('admin/booking')->with('error', 'Alrady you booked ');
        // }

        // $booking = Booking::where('doctor_id', $request->doctor_id)
        //     ->where('date', $request->date)
        //     ->latest()->first();
        // if ($booking) {
        //     $booking_no = $booking->booking_no + 1;
        // } else {
        //     $booking_no = 1;
        // }
        // $requestData = $request->all();


        // $old_date = $requestData['date'];
        // $new_date = date('Y-m-d H:i:s', strtotime($old_date));
        // $requestData['date']  = $new_date;

        // $old_time =   $requestData['time'];
        // $new_time = date('H:i:s', strtotime($old_time));
        // // dd($new_time);
        // $requestData['time']  = $new_time;

        // $selectedTime = $new_time;
        // $endTime = strtotime("+15 minutes", strtotime($selectedTime));
        // $end_time =  date('h:i:s', $endTime);

        // $checkadte = Booking::where('date',$new_date)->whereBetween('time', array($new_time, $end_time))->where('doctor_id', $request->doctor_id)->first();
        // if($checkadte){
        // Session::flash('error', 'this date and time already booked!');
        // return redirect()->back();
        // }
        // $requestData['booking_no'] = $booking_no;
        // $requestData['patient_id'] = Auth::user()->patient->first()->id;
        // $data = Booking::create($requestData);
        Session::flash('success', 'Successfully Saved!');
        Helper::activityStore('Store', 'booking Record Saved');

        return redirect('admin/invoice/booking/'.$data->id);
    }

    public function show($id)
    {
        $booking_fees = BookingFee::all()->first();
        dd($booking_fees);
        $booking = Booking::findOrFail($id);
        Helper::activityStore('Store', 'booking Single Record showed');
        return view('admin.booking.show', compact('booking','booking_fees'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('booking-edit')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        $booking_fees = BookingFee::all()->first();
        $booking = Booking::findOrFail($id);
        Helper::activityStore('Edit', 'booking Edit button clicked');
        return view('admin.booking.edit', compact('booking','booking_fees'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'patient_id' => 'required',
            // 'doctor_id' => 'required',
            // 'date' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['video_call_url'] = 'room/join/'.Str::random(40);
        $booking = Booking::findOrFail($id);
        $booking->update($requestData);
        Session::flash('success', 'Successfully Updated!');
        Helper::activityStore('Update', 'booking Record Updated');
        return redirect()->back();
    }

    public function destroy($id)
    {
        if (!Helper::authCheck('booking-delete')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        Booking::destroy($id);
        Session::flash('success', 'Successfully Deleted!');
        Helper::activityStore('Delete', 'booking Delete button clicked');
        return redirect('admin/booking');
    }
}
