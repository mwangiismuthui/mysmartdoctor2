<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class TestimonialsController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('testimonial-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $testimonials = Testimonial::where('name', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $testimonials = Testimonial::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','testimonials  Show All Record');
        return view('admin.testimonials.index', compact('testimonials'));
    }


    public function create()
    {
        if (!Helper::authCheck('testimonial-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','testimonials Add New button clicked');
        return view('admin.testimonials.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'description' => 'required'
		]);
        $requestData = $request->all();
            if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
        }


        Testimonial::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','testimonials Record Saved');
        return redirect('admin/testimonials');
    }


    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        Helper::activityStore('Store','testimonials Single Record showed');
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('testimonial-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $testimonial = Testimonial::findOrFail($id);
        Helper::activityStore('Edit','testimonials Edit button clicked');
        return view('admin.testimonials.edit', compact('testimonial'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'description' => 'required'
		]);
        $imgdestination = '/storage/uploads/';
        if ($request->hasFile('image')) {
            $testimonialimages = $request->file('image');
            $imgname = $this->generateUniqueFileName($testimonialimages, $imgdestination);
    $requestData['image'] = $imgname;
    if($request->oldimage){
        Storage::delete($request->oldimage);
    }
}


        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','testimonials Record Updated');
        return redirect('admin/testimonials');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('testimonial-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Testimonial::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','testimonials Delete button clicked');
        return redirect('admin/testimonials');
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
}
