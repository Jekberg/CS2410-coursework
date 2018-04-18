<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Image;

class EventController extends Controller
{
	/**
	 *
	 *
	 */
    public function all()
	{
		return view('events');
	}
	/**
	 *
	 *
	 */
	public function lookFor(Request $request)
	{
		return view('events');
	}
	/**
	 *
	 *
	 */
	public function view($id)
	{
		return view('view', array('event' => Event::find($id)));
	}
	/**
	 *
	 *
	 * @return The 'newevent' view.
	 */
	public function makeNew()
	{
		return view('newevent');
	}
	/**
	 *
	 *
	 * @return The 'newevent' view.
	 */
	public function modify($id)
	{
		return view('edit', array('event' => Event::find($id)));
	}
}
