<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class PageController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('page-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $page = Page::where('page_name', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $page = Page::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','page  Show All Record');
        return view('admin.page.index', compact('page'));
    }


    public function create()
    {
        if (!Helper::authCheck('page-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','page Add New button clicked');
        return view('admin.page.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'page_name' => 'required',
			'content' => 'required',
			'slug' => 'required'
		]);
        $requestData = $request->all();
        
        Page::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','page Record Saved');
        return redirect('admin/page');
    }


    public function show($id)
    {
        $page = Page::findOrFail($id);
        Helper::activityStore('Store','page Single Record showed');
        return view('admin.page.show', compact('page'));
    }

    public function edit($slug)
    {
        if (!Helper::authCheck('page-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $page = Page::where('slug',$slug)->first();
        Helper::activityStore('Edit','page Edit button clicked');
        return view('admin.page.edit', compact('page'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'page_name' => 'required',
			'content' => 'required',
		]);
        $requestData = $request->all();
        
        $page = Page::findOrFail($id);
        $page->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','page Record Updated');
        return redirect()->back();
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('page-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Page::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','page Delete button clicked');
        return redirect('admin/page');
    }
}