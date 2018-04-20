<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

/**
 * The UserController is a Controller class which handles some user
 *functionality.
 */
class UserController extends Controller
{
    /**
     * Get the page containing the events by the user.
     *
     * @return The 'myevents' view.
     */
    public function events()
    {
        return view('myevents');
    }
    /**
     * Update the details of the user.
     *
     * <p>
     * The request requires a name and a phone (number).
     * </p>
     *
     * <p>
     * If the phone number is changed, it must be unique.
     * </p>
     *
     * @param $request The request from the client.
     * @return The result of the 'home' route.
     */
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
