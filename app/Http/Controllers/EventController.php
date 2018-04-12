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
		return view('events', array('events' => Event::all()));
	}
	/**
	 * 
	 * 
	 */
	public function view($id)
	{
		return view('view', array('event' => Event::find($id)));
	}
	public function viewImg($eid, $id)
	{
		$event = Event::find($id);
		//return view('imgview', array('event' =>  event, 'img'=> 0);
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
	 * 
	 * @param $request The {@link Request} object.
	 * @return A JSON object containing the result.
	 */
	public function getAll(Request $request)
	{
		return response()->json([
				'responseText' => Event::where('name', 'LIKE', '%'.$request->input('query').'%')
				->get()
				->toJson()
		]);
	}
	/**
	 * 
	 * 
	 * 
	 */
	public function insertNew(Request $request)
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
	 */
	public function likeEvent(Request $request)
	{
		$event = Event::find($request->input('id'));
		if(!array_key_exists($event->id, $request->session()->get('likes')))
		{
			++$event->likes;
			$event->save();
			$likedEvents = $request->session()->get('likes');
			$likedEvents[$event->id] = $event;
			$request->session()->put('likes', $likedEvents);
		}
		return redirect()->route('view.event', array('id' => $event->id));
	}
	/**
	 * 
	 */
	public function unlikeEvent(Request $request)
	{
		$event = Event::find($request->input('id'));
		if(array_key_exists($event->id, $request->session()->get('likes')))
		{
			--$event->likes;
			$event->save();
			$likedEvents = $request->session()->get('likes');
			unset($likedEvents[$event->id]);
			$request->session()->put('likes', $likedEvents);
		}
		return redirect()->route('view.event', array('id' => $event->id));
	}
}
