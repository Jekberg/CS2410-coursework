<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

/**
 * The {@code EventQueryController} is a {@link Controller} which manages
 * requests to read existing events in the events table.
 */
class EventQueryController extends Controller
{
	/**
	 * Get the events in the events table.
	 *
	 * <p>
	 *		The returned result may be affeced by the request parameters.
	 * </p>
	 *
	 * <p>
	 * 		The request may contain:
	 * 		<ul>
	 * 			<li>query: search name likeness.</li>
	 * 			<li>from: earliest allowable date.</li>
	 * 			<li>to: latest allowable date.</li>
	 * 		</ul>
	 * </p>
	 *
	 * @param $request The {@link Request} object.
	 * @return A JSON object containing the result.
	 */
	public function query(Request $request)
	{
		$events = Event::query();
		if($request->has('query'))
			$events = $events
					->where('name', 'LIKE', '%'.$request->input('query').'%');
		if($request->has('from'))
			$events = $events->where('date', '>=', $request->input('from'));
		if($request->has('to'))
			$events = $events->where('date', '<=', $request->input('to'));
		$events = $events->get();
		foreach($events as $event)
		{
			$event->name = htmlspecialchars($event->name);
			$event->description = htmlspecialchars($event->description);
		}
		return response()->json(array(
				'responseText' => $events
					->toJson()));
	}
}
