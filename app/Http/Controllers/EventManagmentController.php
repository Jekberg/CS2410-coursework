<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Image;

class EventManagmentController extends Controller
{
	/**
	 * 
	 * 
	 * 
	 */
	public function create(Request $request)
	{
		$this->validate($request, array(
				'file.*' => 'image'));
		$event = new Event();
		$event->category = $request->input('event-cat');
		$event->name = $request->input('event-name');
		$event->description = $request->input('event-desc');
		$event->date = $request->input('event-date');
		$event->time = $request->input('event-time');
		$event->address = $request->input('event-address');
		$event->postcode = $request->input('event-postcode');
		$event->user_id = Auth::user()->id;
		$event->save();
		foreach($request->file as $file)
		{
			$img = new Image();
			$img->name = time() . '_' . $file->hashName();
			$img->event_id = $event->id;
			$img->save();
			$file->storeAs('public/uploads', $img->name);
		}
		return redirect()->route('view.event', array('id' => $event->id));
	}
	/**
	 * 
	 * 
	 * 
	 */
	public function update(Request $request)
	{
		$this->validate($request, array(
				'file.*' => 'image'));
		return redirect()->route('view.event', array('id' => $event->id));
	}
}
