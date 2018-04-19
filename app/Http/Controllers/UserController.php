<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function events()
    {
        return view('myevents');
    }
    public function update(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:7'));
        if(Auth::user()->phone != $request->input('phone'))
            $this->validate($request, array(
                    'phone' => 'unique:users'));
        Auth::user()->name = $request->input('name');
        Auth::user()->phone = $request->input('phone');
        Auth::user()->save();
        return redirect()->route('home');
    }
}
