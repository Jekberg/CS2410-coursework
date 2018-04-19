<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventQueryController extends Controller
{
	/**
	 *
	 *
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
