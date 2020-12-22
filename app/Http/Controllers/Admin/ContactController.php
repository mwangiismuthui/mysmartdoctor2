<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class ContactController extends Controller
{

     public function index(Request $request)
    {
        // if (!Helper::authCheck('contact-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $contact = Contact::where('name', 'LIKE', "%$keyword%")
                ->orWhere('mobile_number', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contact = Contact::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','contact  Show All Record');
        return view('admin.contact.index', compact('contact'));
    }


    public function create()
    {
        if (!Helper::authCheck('contact-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','contact Add New button clicked');
        return view('admin.contact.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'mobile_number' => 'required',
			'message' => 'required'
		]);
        $requestData = $request->all();
        
        Contact::create($requestData);
        Session::flash('success','Successfully Saved!');
        // Helper::activityStore('Store','contact Record Saved');
        return redirect()->back();
    }


    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        Helper::activityStore('Store','contact Single Record showed');
        return view('admin.contact.show', compact('contact'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('contact-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $contact = Contact::findOrFail($id);
        Helper::activityStore('Edit','contact Edit button clicked');
        return view('admin.contact.edit', compact('contact'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'mobile_number' => 'required',
			'message' => 'required'
		]);
        $requestData = $request->all();
        
        $contact = Contact::findOrFail($id);
        $contact->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','contact Record Updated');
        return redirect('admin/contact');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('contact-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Contact::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','contact Delete button clicked');
        return redirect('admin/contact');
    }
}