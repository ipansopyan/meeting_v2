<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\User;
use Auth;


class JoinControlller extends Controller
{
    public function join($id)
    {
        $user      = Auth::user()->id;
        $meeting   = Meeting::find($id);

        if ($meeting->joinUser()->where('user_id', $user)->first()) {
          return redirect()->route('home')->with('message', 'anda sudah join');
        }

        $meeting->joinUser()->attach($user);


        return redirect()->route('home')->with('message', 'join berhasil');
    }

    public function unjoin($id)
    {
      $user      = Auth::user()->id;
      $meeting   = Meeting::find($id);

      if (!$meeting->joinUser()->where('user_id', $user)->first()) {
        return redirect()->route('home')->with('message', 'anda belum join');
      }

      $meeting->joinUser()->detach($user);

      return redirect()->route('home')->with('message', 'unjoin berhasil');

    }
}
