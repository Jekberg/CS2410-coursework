<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Gate;
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
	public function update(Request $request, $id)
	{
		$this->validate($request, array(
				'category' => 'required',
				'name' => 'required',
				'description' => 'required',
				'address' => 'required',
				'postcode' => 'required',
				'date' => 'required',
				'time' => 'required',
				'file.*' => 'image'));
		$event = Event::find($id);
		if(Gate::allows('event-ownership', $event))
		{
			if($request->input('name') != $event->name)
				$this->validate($request, array(
						'name' => 'unique:events'));
			$event->category = $request->input('category');
			$event->name = $request->input('name');
			$event->description = $request->input('description');
			$event->address = $request->input('address');
			$event->postcode = $request->input('postcode');
			$event->date = $request->input('date');
			$event->time = $request->input('time');
			$event->save();
			if(isset($request->file))
				foreach($request->file as $file)
					$file->storeAs('public/uploads', Image::create(array(
							'name' => time() . $file->hashName(),
							'event_id' => $event->id))->name);
			foreach ($event->images as $img)
				if($request->has($img->id))
				{
					Storage::delete('/public/uploads' . $img->name);
					$img->delete();
				}
		}
		return redirect()->route('view.event', array('id' => $event->id));
	}
	public function delete(Request $request, $id)
	{
		$event = Event::find($id);
		if(Gate::allows('event-ownership', $event))
		{
			foreach($event->images as $img)
			{
				Storage::delete('/public/uploads/' . $img->name);
				$img->delete();
			}
			$event->delete();
		}
		return redirect()->route('welcome');
	}
}
