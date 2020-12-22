<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class AccountController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('account-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $account = Account::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('street_address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('post_code', 'LIKE', "%$keyword%")
                ->orWhere('phone_number', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('card', 'LIKE', "%$keyword%")
                ->orWhere('expiry_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $account = Account::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','account  Show All Record');
        return view('admin.account.index', compact('account'));
    }


    public function create()
    {
        if (!Helper::authCheck('account-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','account Add New button clicked');
        return view('admin.account.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'street_address' => 'required',
			'city' => 'required',
			'country' => 'required',
			'post_code' => 'required',
			'phone_number' => 'required',
			'email' => 'required',
			'card' => 'required',
			'expiry_date' => 'required'
		]);
        $requestData = $request->all();
        
        Account::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','account Record Saved');
        return redirect('admin/account');
    }


    public function show($id)
    {
        $account = Account::findOrFail($id);
        Helper::activityStore('Store','account Single Record showed');
        return view('admin.account.show', compact('account'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('account-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $account = Account::findOrFail($id);
        Helper::activityStore('Edit','account Edit button clicked');
        return view('admin.account.edit', compact('account'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'street_address' => 'required',
			'city' => 'required',
			'country' => 'required',
			'post_code' => 'required',
			'phone_number' => 'required',
			'email' => 'required',
			// 'card' => 'required',
			// 'expiry_date' => 'required'
		]);
        $requestData = $request->all();
        
        $account = Account::findOrFail($id);
        $account->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','account Record Updated');
        return redirect()->back();
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('account-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Account::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','account Delete button clicked');
        return redirect('admin/account');
    }
}