<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Gate;
use App\Event;
use App\Image;

/**
 * The {@code EventManagmentController} is a {@link Controller} class which
 * manages creating, updating and deleting events.
 */
class EventManagmentController extends Controller
{
	/**
	 * Create a new event.
	 *
	 * <p>
	 * 		Creating an event requires a category, name, description, address,
	 * 		postcode,date, time and files (images onyl).
	 * </p>
	 *
	 * <p>
	 * 		The new event requires a unique name.
	 * </p>
	 *
	 * <p>
	 * 		Uploaded image names will be stored in the images table and the
	 *		images will be stored in the 'public/storage' directory.
	 * </p>
	 *
	 * @param $request which was sent from the client.
	 * @return The result from the 'view.event' route.
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
	 * Update an event.
	 *
	 * <p>
	 * 		Updating an event requires a category, name, description, address,
	 * 		postcode,date and time. Optionally images may be removed or added
	 * 		(images onyl)
	 * </p>
	 *
	 * <p>
	 * 		If the event has a name changed, the new name must be unique.
	 * </p>
	 *
	 * <p>
	 * 		The current user must have access to edit the event.
	 * </p>
	 *
	 * <p>
	 * 		Uploaded image names will be stored in the images table and the
	 *		images will be stored in the 'public/storage' directory. Removed
	 *		images will be removed from the images table and from the
	 *		'public/uploads' directory.
	 * </p>
	 *
	 * @param $id The id of the event to edit.
	 * @param $request which was sent from the client.
	 * @return The result from the 'view.event' route if the user has access
	 * 			editing the event and event exists, otherwise, return 'error'
	 * 			view.
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
		if(Gate::allows('event-edit-access', $event))
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
			foreach ($event->images as $img)
				if($request->has($img->id))
				{
					Storage::delete('/public/uploads' . $img->name);
					$img->delete();
				}
			if(isset($request->file))
				foreach($request->file as $file)
					$file->storeAs('public/uploads', Image::create(array(
							'name' => time() . $file->hashName(),
							'event_id' => $event->id))->name);
		}
		else
			return view('error', array(
				'message' => "Hmm... Looks like you tried to edit an event "
						. "which belongs to someone else. If you see this "
						. " message, you probably tried to do something bad."));
		return redirect()->route('view.event', array('id' => $event->id));
	}
	/**
	 * Delete an event.
	 *
	 * <p>
	 * 		The current user must have access to edit the event.
	 * </p>
	 *
	 * <p>
	 * 		All images will be removed from the images table and from the
	 * 		'public/uploads' directory.
	 * </p>
	 *
	 * @param $id The id of the event to delete.
	 * @param $request which was sent from the client.
	 * @return The result from the 'welcome' route if the user has access
	 * 			deleting the event and event exists, otherwise, return 'error'
	 * 			view.
	 */
	public function delete(Request $request, $id)
	{
		$event = Event::find($id);
		if(Gate::allows('event-edit-access', $event))
		{
			foreach($event->images as $img)
			{
				Storage::delete('/public/uploads/' . $img->name);
				$img->delete();
			}
			$event->delete();
		}
		else
			return view('error', array(
				'message' => "Don't do it! If you delete this event you will "
					. "make a lot of people who will want to go to this event! "
					. "Hang on a bit... This is not yor evnet! "
					. "How did you get here?"));
		return redirect()->route('welcome');
	}
}
