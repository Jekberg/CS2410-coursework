<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class LikeController extends Controller
{
	/**
	 * Like an existing event.
	 *
	 * <p>
	 * An event can only be liked if it does not exist within the session. Upon
	 * completion, the request will be redirected to the view.event route.
	 * </p>
	 *
	 * @param $request The request which was sent, containing an event ID and
	 * 			a session.
	 * @return The view which is returned by the view.event route.
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
	 * Unlike an existing event which has already been liked.
	 *
	 * <p>
	 * An event can only be unliked if it exist within the session. Upon
	 * completion, the request will be redirected to the view.event route.
	 * </p>
	 *
	 * @param $request The request which contains the event ID of the event
	 * 			unlike, and a session.
	 * @return The view whoich is returned by the view.event route.
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
