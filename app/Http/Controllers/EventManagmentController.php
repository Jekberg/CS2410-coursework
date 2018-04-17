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
		$event = Event::create(array(
				'category' => $request->input('category'),
				'name' => $request->input('name'),
				'description' => $request->input('description'),
				'date' => $request->input('date'),
				'time' => $request->input('time'),
				'address' => $request->input('address'),
				'postcode' => $request->input('postcode'),
				'user_id' => Auth::user()->id));
		foreach($request->file as $file)
			$file->storeAs('public/uploads', Image::create(array(
					'name' => time() . $file->hashName(),
					'event_id' => $event->id))->name);
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
