<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\User;
use Auth;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['meetings']  = Meeting::all();
        return view('meeting/home',$data);
    }

    public function create()
    {
        return view('meeting/create');
    }
    public function store(Request $request)
    {

        $this->validate($request,[
          'title'       => 'required|max:255',
          'waktu'       => 'required|max:255',
          'place'       => 'required|max:255',
          'description' => 'required',
        ]);

        $meeting = User::find(Auth::user()->id);
        $meeting->meetings()->create([
          'title'       => $request->title,
          'waktu'       => $request->waktu,
          'place'       => $request->place,
          'description' => $request->description,
        ]);



        if (!$meeting) {
          return redirect('/')->with('message', 'data gagal di simpan');
        }else {
          return redirect('/home')->with('message', 'data berhasil di simpan');
        }
    }

    public function show($id)
    {
        $data['meeting']  = Meeting::find($id);
        $data['joined']   = $data['meeting']->joinUser;

        return view('meeting/show',$data);
    }

    public function edit($id)
    {
      $meeting = Meeting::find($id);
      if ($meeting->user_id != Auth::user()->id) return redirect()->route('home')->with('message', 'permission denied');

      return view('meeting/edit',compact('meeting'));
    }

    public function update(Request $request,$id)
    {

        $this->validate($request,[
          'title'       =>  'required|max:255',
          'waktu'       =>  'required|max:255',
          'place'       =>  'required|max:255',
          'description' =>  'required',
        ]);

        $meeting = Meeting::find($id);
        if ($meeting->user_id != Auth::user()->id) return redirect()->route('home')->with('message', 'permission denied');



        $meeting->update([
          'title'       => $request->title,
          'waktu'       => $request->waktu,
          'place'       => $request->place,
          'description' => $request->description,
        ]);

        return redirect()->route('home')->with('message', 'meeting updated');

    }

    public function destroy($id)
    {
      $meeting  = Meeting::find($id);
      if ($meeting->user_id != Auth::user()->id) return redirect()->route('home')->with('message', 'permission denied');

      $meeting->delete($id);

      return redirect()->route('home')->with('message', 'data deleted');

    }
}
