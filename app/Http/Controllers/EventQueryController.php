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
	public function getAll(Request $request)
	{
		$events = Event::where('name', 'LIKE', '%'.$request->input('query').'%')
				->get();
		foreach($events as $event)
		{
			$event->name = htmlspecialchars($event->name);
			$event->description = htmlspecialchars($event->description);
		}
		return response()->json([
				'responseText' => $events
				->toJson()
		]);
	}
}
