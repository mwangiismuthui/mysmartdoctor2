<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('slider-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $slider = Slider::where('image', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $slider = Slider::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','slider  Show All Record');
        return view('admin.slider.index', compact('slider'));
    }


    public function create()
    {
        if (!Helper::authCheck('slider-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','slider Add New button clicked');
        return view('admin.slider.create');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        $imgdestination = '/storage/uploads/';
                if ($request->hasFile('image')) {
                    $sliderimages = $request->file('image');
                    $imgname = $this->generateUniqueFileName($sliderimages, $imgdestination);
            $requestData['image'] = $imgname;
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
        }

        Slider::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','slider Record Saved');
        return redirect('admin/slider');
    }


    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        Helper::activityStore('Store','slider Single Record showed');
        return view('admin.slider.show', compact('slider'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('slider-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $slider = Slider::findOrFail($id);
        Helper::activityStore('Edit','slider Edit button clicked');
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {


        $imgdestination = '/storage/uploads/';
                if ($request->hasFile('image')) {
                    $sliderimages = $request->file('image');
                    $imgname = $this->generateUniqueFileName($sliderimages, $imgdestination);
            $requestData['image'] = $imgname;
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
        }

        $slider = Slider::findOrFail($id);
        $slider->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','slider Record Updated');
        return redirect('admin/slider');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('slider-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Slider::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','slider Delete button clicked');
        return redirect('admin/slider');
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
