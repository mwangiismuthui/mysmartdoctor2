<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use App\BookingFee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingFeeController extends Controller
{

    public function index(Request $request)
    {
        if (!Helper::authCheck('bookingfee-show')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $bookingfee = BookingFee::where('fee', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $bookingfee = BookingFee::latest()->paginate($perPage);
        }
        Helper::activityStore('Show', 'bookingfee  Show All Record');
        return view('admin.booking-fee.index', compact('bookingfee'));
    }

    public function create()
    {
        if (!Helper::authCheck('bookingfee-create')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        Helper::activityStore('Create', 'bookingfee Add New button clicked');
        return view('admin.booking-fee.create');
    }

    public function store(Request $request)
    {
        if (BookingFee::all()->count() != 1) {
            $this->validate($request, [
                'fee' => 'required',
            ]);
            $requestData = $request->all();

            BookingFee::create($requestData);
            Session::flash('success', 'Successfully Saved!');
            Helper::activityStore('Store', 'bookingfee Record Saved');
            return redirect('admin/booking-fee');
            # code...
        }
        Session::flash('error', 'This fee already added !');
        return redirect('admin/booking-fee');
    }

    public function show($id)
    {
        $bookingfee = BookingFee::findOrFail($id);
        Helper::activityStore('Store', 'bookingfee Single Record showed');
        return view('admin.booking-fee.show', compact('bookingfee'));
    }

    public function edit($id)
    {
        if (Auth::user()->role != 'Super Admin') {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        $bookingfee = BookingFee::findOrFail($id);
        Helper::activityStore('Edit', 'bookingfee Edit button clicked');
        return view('admin.booking-fee.edit', compact('bookingfee'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'professional_fee' => 'required',
            'service_charge' => 'required',
        ]);
        $requestData = $request->all();

        $bookingfee = BookingFee::findOrFail($id);
        $bookingfee->update($requestData);
        Session::flash('success', 'Successfully Updated!');
        Helper::activityStore('Update', 'bookingfee Record Updated');
        return redirect()->back();
    }

    public function destroy($id)
    {
        if (!Helper::authCheck('bookingfee-delete')) {Session::flash('error', 'Permission Denied!');return redirect()->back();}
        BookingFee::destroy($id);
        Session::flash('success', 'Successfully Deleted!');
        Helper::activityStore('Delete', 'bookingfee Delete button clicked');
        return redirect('admin/booking-fee');
    }
}
