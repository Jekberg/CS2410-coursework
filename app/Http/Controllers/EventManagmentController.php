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
				'category' => 'required',
				'name' => 'unique:events',
				'description' => 'required',
				'address' => 'required',
				'postcode' => 'required',
				'date' => 'required',
				'time' => 'required',
				'file.*' => 'image'));
		$event = new Event();
		$event->category = $request->input('category');
		$event->name = $request->input('name');
		$event->description = $request->input('description');
		$event->date = $request->input('date');
		$event->time = $request->input('time');
		$event->address = $request->input('address');
		$event->postcode = $request->input('postcode');
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
