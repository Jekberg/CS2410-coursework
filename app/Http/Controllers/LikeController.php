<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class LikeController extends Controller
{
	/**
	 * 
	 * 
	 * @return 
	 */
	public function like(Request $request)
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
	public function unlike(Request $request)
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
