<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

/**
 * The {@code LikeController} is a {@link Controller} which manages liking and
 * unliking events.
 */
class LikeController extends Controller
{
	/**
	 * Like an existing event.
	 *
	 * <p>
	 * 		An event can only be liked if it does not exist within the session.
	 * 		Upon completion, the request will be redirected to the 'view.event'
	 *		route.
	 * </p>
	 *
	 * @param $request The request which was sent, containing an event ID and
	 * 			a session.
	 * @return The view which is returned by the view.event route.
	 */
	public function like(Request $request, $id)
	{
		$event = Event::find($id);
		if(isset($event)
				&& !in_array($event->id, $request->session()->get('likes')))
		{
			++$event->likes;
			$event->save();
			$likes = $request->session()->get('likes');
			array_push($likes, $event->id);
			$request->session()->put('likes', $likes);
		}
		return redirect()->route('view.event', array('id' => $id));
	}
	/**
	 * Unlike an existing event which has already been liked.
	 *
	 * <p>
	 * 		An event can only be unliked if it exist within the session. Upon
	 * 		completion, the request will be redirected to the 'view.event'
	 *		route.
	 * </p>
	 *
	 * @param $request The request which contains the event ID of the event
	 * 			unlike, and a session.
	 * @return The view whoich is returned by the view.event route.
	 */
	public function unlike(Request $request, $id)
	{
		$event = Event::find($id);
		if(isset($event)
				&& in_array($event->id, $request->session()->get('likes')))
		{
			--$event->likes;
			$event->save();
			$likes = $request->session()->get('likes');
			unset($likes[array_search($event->id, $likes)]);
			$request->session()->put('likes', $likes);
		}
		return redirect()->route('view.event', array('id' => $id));
	}
}
