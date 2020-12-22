<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use Storage;
use App\Chat;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('chat-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $chat = Chat::where('from', 'LIKE', "%$keyword%")
        //         ->orWhere('to', 'LIKE', "%$keyword%")
        //         ->orWhere('content', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $chat = Chat::latest()->paginate($perPage);
        // }
        if (Auth::user()->role == 'patient') {
            $chat = Chat::where('from', Auth::user()->id)->latest()->get();

        } elseif(Auth::user()->role == 'doctor') {
            $chat = Chat::where('from', Auth::user()->id)->latest()->get();
          
        }else{
            $chat = Chat::latest()->get();
        }
        Helper::activityStore('Show','chat  Show All Record');
        return view('admin.chat.index', compact('chat'));
    }
    public function inbox(Request $request)
    {
        if (!Helper::authCheck('chat-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
       
        if (Auth::user()->role == 'patient') {
            $chat = Chat::where('to', Auth::user()->id)->latest()->get();
            // dd($chat);
            
        } elseif(Auth::user()->role == 'doctor') {
            $chat = Chat::where('to', Auth::user()->id)->latest()->get();
            // dd($chat);

        }else{
            $chat = Chat::latest()->get();
        }
        Helper::activityStore('Show','chat  Show All Record');
        return view('admin.chat.inbox', compact('chat'));
    }

    public function create()
    {
        if (!Helper::authCheck('chat-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','chat Add New button clicked');
        return view('admin.chat.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'content' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['from'] = Auth::user()->id;
        
        Chat::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','chat Record Saved');
        return redirect('admin/chat');
    }


    public function show($id)
    {
        $chat = Chat::findOrFail($id);
        Helper::activityStore('Store','chat Single Record showed');
        return view('admin.chat.show', compact('chat'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('chat-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $chat = Chat::findOrFail($id);
        Helper::activityStore('Edit','chat Edit button clicked');
        return view('admin.chat.edit', compact('chat'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'content' => 'required'
		]);
        $requestData = $request->all();
        $requestData['from'] = Auth::user()->id;
        $chat = Chat::findOrFail($id);
        $chat->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','chat Record Updated');
        return redirect('admin/chat');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('chat-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Chat::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','chat Delete button clicked');
        return redirect('admin/chat');
    }
}